<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 12/29/2015
 * Time: 11:38 PM
 */

namespace App\DataBase;
use App\Domain\Equipment;
use App\Domain\Sport;
use App\Domain\TimeSlot;
use DB;
use Illuminate\Support\Facades\Hash;

class DataBase{
    private static $instance;
    public static function getInstance(){
        if(null==static::$instance){
            static::$instance = new static();
        }
        return static::$instance;
    }

    protected function  __construct()
    {
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /*
     * Insert Data.........................
     * */
    public function addStudent($student){
        DB::insert('INSERT INTO Student VALUES(?,?,?,?,?,?,?,?,?,?,?)',
            [$student->getID(),$student->getName(),
                $student->getDateOfBirth(),$student->getGender(),$student->getAddress(),
                $student->getFaculty(),$student->getDepartment(),$student->getMedicalCondition(),
                $student->getBloodGroup(),$student->getEmergencyContactPerson(),$student->getEmergencyContactNo()]);
        foreach($student->getSportList() as $inv){
            DB::insert('INSERT INTO Involve VALUES(?,(SELECT ID FROM Sport WHERE SportName = ?))',[$inv->getStudentID(),$inv->getSportName()]);
        }
    }

    public function addResource($resource){
        DB::insert('INSERT INTO Resource VALUES(?,?,?)',
            [$resource->getID(),$resource->getName(),
                $resource->getLocation()]);
    }

    public function addPracticeSchedule($practiceSchedule){
        DB::insert('INSERT INTO PracticeSchedule VALUES(DEFAULT,(SELECT ID FROM Sport WHERE SportName = ?)
                          ,(SELECT ID FROM resource WHERE Name = ?),?,?,?)',
            [$practiceSchedule->getSportName(),
                $practiceSchedule->getResourceName(),$practiceSchedule->getDate(),
                $practiceSchedule->getStartTime(),$practiceSchedule->getEndTime()]);
    }

    public function addAchievement($achievement){
        DB::insert('INSERT INTO Achievement VALUES(DEFAULT,(SELECT ID FROM Sport WHERE SportName = ?),?,?,?,?)',
            [$achievement->getSportName(),$achievement->getContest(),$achievement->getDate(),$achievement->getPlace()
                ,$achievement->getDescription()]);
        DB::insert('INSERT INTO Achieve VALUES(?,DEFAULT)',
            [$achievement->getStudentID()]);
    }

    public function addEquipment($equipment){
        DB::insert('INSERT INTO Equipment VALUES(?,(SELECT ID FROM Sport WHERE SportName = ?),?,?,?,?,?)',
            [$equipment->getItemNo(),$equipment->getSportName(),$equipment->getType(),
                $equipment->getPurchaseDate(),$equipment->isAvailable(),
                $equipment->getPurchasePrice(),$equipment->getCondition()]);
    }

    public function addBookin($booking){

        DB::insert('INSERT INTO Booking VALUES(?,?,?,?,?,?)',
            [$booking->getResourceID(),$booking->getRequesterName(),
                $booking->getRequesterContactNo(),$booking->getDate(),$booking->getStartTime(),
                $booking->getEndTime()]);
    }

    public function addBorrow($borrow){
        DB::insert('INSERT INTO Borrow VALUES(?,?,?,?,?)',
            [$borrow->getItemNo(),$borrow->getStudentID(),
                $borrow->getStartDate(),$borrow->getEndDate(),
                $borrow->isReturned()]);
    }

    public function addSport($sport){
        DB::insert('INSERT INTO Sport VALUES(DEFAULT ,?)',[$sport->getSportName()]);
        foreach($sport->getUtilizationList() as $uti){
            DB::insert('INSERT INTO SportsResource VALUES((SELECT ID FROM Resource WHERE Name=?),(SELECT ID FROM Sport WHERE SportName = ?),?)',
                [$uti->getResourceName(),$uti->getSportName(),$uti->getUtilization()]);
        }
    }

    public function addKeeper($keeper){
        $this->addUser($keeper);
        DB::insert('INSERT INTO Keeper VALUES(?,(SELECT ID FROM Resource WHERE Name=?))',
            [$keeper->getID(),$keeper->getResourceName()]);
    }

    public function addCoach($coach){
        $this->addUser($coach);
        DB::insert('INSERT INTO Coach VALUES(?,(SELECT ID FROM Sport WHERE SportName = ?))',
            [$coach->getID(),$coach->getSportName()]);
    }

    public function addUser($user){
        DB::insert('INSERT INTO User VALUES(?,?,?,?,?,?,?,?)',
            [$user->getID(),$user->getName(),$user->getDateOfBirth(),$user->getGender(),$user->getAddress(),$user->getRole(),$user->getContactNo(),$user->getPassword()]);
    }

    public function addEquipmentRequest($equipmentType,$studentID){
        DB::insert('INSERT INTO EquipmentRequest VALUES(?,?)',
            [$studentID,$equipmentType]);

    }

    public function updateEquipmentAvailability($equipmentID){
        DB::update('UPDATE equipment SET Availability= "1" WHERE ItemNo = ?',
            [$equipmentID]);

    }

    public function updateEquipmentDetails($eqpAv,$eqpCon,$equipmentID){
        DB::update('UPDATE equipment SET Availability= ?,EqCondition= ? WHERE ItemNo = ?',
            [$eqpAv,$eqpCon,$equipmentID]);

    }
    /*
     * Update data.............................................................................
     */

    /*
     * Load Data.................................................
     */

    public function loadSportsNames(){
        return DB::select('SELECT SportName FROM Sport');
    }

    public function loadResourceNames(){
        return DB::select('SELECT Name FROM Resource');
    }

    public function loadResourceOf($sportName){
        return DB::select('SELECT * FROM Resource NATURAL JOIN (SELECT ResourceID as ID FROM SportsResource WHERE SportID =
                      (SELECT ID FROM Sport WHERE SportName = ?))as A'
            ,[$sportName]);
    }

    public function loadPracticeSchedule(){
        return DB::select('SELECT * FROM PracticeSchedule LEFT JOIN Resource ON
                  PracticeSchedule.Resources_ID = Resource.ID ');
    }

    public function loadEquipments(){
        return DB::select('SELECT * FROM Equipment');
    }

    public function loadEquipmentsOf($sportName){
        return DB::select('SELECT * FROM Equipment WHERE SportID = (SELECT ID FROM Sport WHERE SportName=?)'
                            ,[$sportName]);
    }

    public function loadKeepers(){
        return DB::select('SELECT Name From User NATURAL JOIN Keeper');
    }

    public function loadAvailableEquipments(){
        return DB::select('SELECT * FROM Equipment WHERE Availability = TRUE');
    }

    public function loadAvailableEquipmentsWithSports(){
        return DB::select('SELECT * FROM Equipment LEFT JOIN Sport ON
                  Equipment.SportID = Sport.ID WHERE Availability = TRUE');
    }

    public function getEquipment($equipmentNo){
        $u= DB::select('SELECT * FROM Equipment LEFT JOIN Sport ON Equipment.SportID=Sport.ID WHERE ItemNo = ?'
                            ,[$equipmentNo]);
        Log::info($u);
        return $u;
    }

    public function getAvailableEquipments($equipmentType,$sportName){
        return DB::select('SELECT * FROM Equipment WHERE Type = ? AND SportID = (SELECT ID FROM Sport WHERE SportName= ? AND Availability = True)'
                            ,[$equipmentType,$sportName]);
    }

    public function getBorrowEquipment($studentID){
        return DB::select('SELECT * FROM borrow WHERE StudentID =?'
            ,[$studentID]);
    }

    public function getBorrowedEqp($itemNo){
        return DB::select('SELECT * FROM borrow WHERE ItemNo =?'
            ,[$itemNo]);
    }

    public function getResourceReservedTime($resourceName,$date){
        $timeSlotList = array();
        $timeSlots =  DB::select('SELECT StartTime,EndTime FROM Booking WHERE
                            Resources_ID = (SELECT ID FROM resource WHERE Name = ?) AND Date = ? '
                            ,[$resourceName,$date]);
        foreach($timeSlots as $ts){
            $timeSlot = new TimeSlot();
            $timeSlot->setStartTime($ts->StartTime);
            $timeSlot->setEndTime($ts->EndTime);
            array_push($timeSlotList,$timeSlot);
        }

        $timeSlots =  DB::select('SELECT StartTime,EndTime FROM PracticeSchedule
                 WHERE Resources_ID = (SELECT ID FROM resource WHERE Name = ?) AND Date = ? '
            ,[$resourceName,$date]);
        foreach($timeSlots as $ts){
            $timeSlot = new TimeSlot();
            $timeSlot->setStartTime($ts->StartTime);
            $timeSlot->setEndTime($ts->EndTime);
            array_push($timeSlotList,$timeSlot);
        }
        return $timeSlotList;
    }

    public function getReservedDatesFor($resourceID){
        $resDates = array();
        $datelist = DB::select('SELECT Date FROM Booking WHERE Resources_ID=?',[$resourceID]);
        foreach($datelist as $date){
            array_push($resDates,$date);
        }
        $datelist = DB::select('SELECT Date FROM PracticeSchedule WHERE Resources_ID=?',[$resourceID]);
        foreach($datelist as $date){
            array_push($resDates,$date);
        }
        return $resDates;
    }

    public function getSportIDofSport($sportname){
        $sportId = DB::select('SELECT ID FROM Sport WHERE sportName=?',[$sportname]);
        return $sportId[0];
    }

    public function getNameOfResource($id){
        return DB::select('SELECT Name FROM Resource WHERE ID=?',[$id]);
    }

    public function getResourceID($resourceName){
        $id = DB::select('SELECT ID FROM resource WHERE Name=?',[$resourceName]);
        return $id[0]->ID;
    }

    public function getKeepersResource($id){
        $keeper = DB::select('SELECT Name FROM Keeper LEFT OUTER JOIN Resource ON Keeper.Resources_ID=Resource.ID WHERE Keeper.ID=?',[$id]);
        return $keeper[0];
    }

    public function getCoachsSport($id){
        $coach = DB::select('SELECT SportName FROM Coach LEFT OUTER JOIN Sport ON Coach.SportID=Sport.ID WHERE Coach.ID=?',[$id]);
        return $coach[0];
    }

    public function getUtils($sport){
        return DB::select('SELECT Name,Utilization From SportsResources LEFT OUTER JOIN Resource ON SportsResources.ResourceID=Resource.ID WHERE SportName=?',[$sport]);
    }

    public function searchUserByID($ID){
        return DB::select('SELECT * FROM user WHERE ID LIKE \'%'.$ID.'%\'');
    }

    public function searchUserByName($name){
        return DB::select('SELECT * FROM user WHERE Name LIKE \'%'.$name.'%\'');
    }

    public function loadStudents(){
        return DB::select('SELECT * FROM student');
    }

    public function searchStudentByName($name){
        return DB::select('SELECT * FROM Student WHERE FirstName LIKE \'%'.$name.'%\'');
    }

    public function searchStudentByID($id){
        return DB::select('SELECT * FROM Student WHERE ID LIKE \'%'.$id.'%\'');
    }

    public function searchEquipmentByID($equipmentNo){
        return DB::select('SELECT * FROM Equipment WHERE ItemNo LIKE \'%'.$equipmentNo.'%\'');
    }

    public function searchEquipmentByType($equipType){
        return DB::select('SELECT * FROM Equipment WHERE EquipType LIKE \'%'.$equipType.'%\'');
    }


    public function loadUsers(){
      return DB::select('SELECT * FROM user');
    }

    public function loadUsersOf($ID){
        return DB::select('SELECT Name FROM user WHERE ID = ?',[$ID]);
    }

    //DB::statement("UPDATE favorite_contents,
    // contents SET favorite_contents.type = contents.type where favorite_contents.content_id = contents.id");
    /*
     * Check Data...........................
     * */

    public function checkEquipmentAvailability($equipmentNo){
        $avilabilities = DB::select('SELECT Availability FROM Equipment WHERE ItemNo = ?'
            ,[$equipmentNo]);
        if(count($avilabilities)<=0)
            return false;
        return $avilabilities->Availability;
    }

    public function checkUser($username,$password){
        $users = DB::select('SELECT * FROM user WHERE Name = ? AND Password = ?',[$username,$password]);
        if(count($users)<=0)
            return false;
        return true;
    }

    public function addPracticeSchedule1($practiceSchedule){
        DB::insert('INSERT INTO PracticeSchedule VALUES(?,?,?,?,?,?)',
            [$practiceSchedule->getSessionID(),$practiceSchedule->getSportName(),$practiceSchedule->getDate(),
                $practiceSchedule->getStartTime(),$practiceSchedule->getEndTime(),$practiceSchedule->getResourceName()]);
    }

    public function addAchievementt($achievement){
        DB::insert('INSERT INTO Achievement(AchievementID,Contest,Place,SportName,Date) VALUES(?,?,?,?,?)',
            [$achievement->getAchievementID(),$achievement->getContest(),
                $achievement->getPlace(),
                $achievement->getSportName(),$achievement->getDate()]);
    }

    public function getStudentName($studentID){
        $studentName=DB::select('SELECT Name FROM student WHERE ID = ? ',[$studentID]);
        return $studentName;
    }

    public function updateStudent($student){
        DB::update('UPDATE Student SET ID=?,FirstName=?,Faculty=?,Department=? WHERE ID=?',
            [$student->getID(),$student->getFirstName(),$student->getFaculty(),$student->getDepartment(),$student->getID()]);
    }

    public function updateUser($user){
        DB::update('UPDATE User SET ID=?,Name=?,DoB=?,Gender=?,Address=?,Role=?,ContactNo=? WHERE ID=?',[$user->getID(),$user->getName(),
            $user->getDateOfBirth(),$user->getGender(),$user->getAddress(),$user->getRole(),$user->getContactNo(),$user->getID()]);
    }

    public function updateKeeper($keeper){
        $this->updateUser($keeper);
        DB::update('UPDATE Keeper SET ID=?,Resource_ID=(SELECT ID FROM Resource WHERE Name = ?) WHERE ID=?',[$keeper->getID(),$keeper->getResourceName(),$keeper->getID()]);
    }

    public function updateCoach($coach){
        $this->updateUser($coach);
        DB::update('UPDATE Coach SET ID=?,SportID=(SELECT ID FROM Sport WHERE SportName = ?) WHERE ID=?',[$coach->getID(),$coach->getSportName(),$coach->getID()]);
    }

    public function resetPwd($id){
        DB::update('UPDATE User Set Password=? WHERE ID=?',[Hash::make('mora1234'),$id]);
    }

    public function getAchievement($ID){
        $achievement=DB::select('SELECT SportName,Date,Place,Contest,Description FROM Achievement WHERE ID= ?',[$ID]);
        return  $achievement;
    }

    public function getAllSessionID(){
        $sessionID=DB::select('SELECT SessionID FROM PracticeSchedule');
        return $sessionID;
    }

    public function deleteSessionID($sessionID){
        DB::delete('DELETE FROM PracticeSchedule WHERE sessionID = ?',[$sessionID]);

    }

}