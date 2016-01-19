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
        DB::insert('INSERT INTO Student VALUES(?,?,?,?,?)',
            [$student->getID(),$student->getFirstName(),
                $student->getLastName(),$student->getFaculty(),$student->getDepartment()]);
    }

    public function addResource($resource){
        DB::insert('INSERT INTO Resource VALUES(?,?,?,?)',
            [$resource->getID(),$resource->getName(),
                $resource->getLocation(),$resource->getKeeperID()]);
    }

    public function addPracticeSchedule($practiceSchedule){
        DB::insert('INSERT INTO PracticeSchedule VALUES(?,?,?,?,?,?)',
            [$practiceSchedule->getSessionID(),$practiceSchedule->getSportName(),
                $practiceSchedule->getResourceID(),$practiceSchedule->getDate(),
                $practiceSchedule->getStartTime(),$practiceSchedule->getEndTime()]);
    }

    public function addAchievement($achievement){
        DB::insert('INSERT INTO PracticeSchedule VALUES(?,?,?,?,?,?)',
            [$achievement->getAchievementID(),$achievement->getContest(),
                $achievement->getDate(),$achievement->getPlace(),
                $achievement->getSportName(),$achievement->getDescription()]);
        DB::insert('INSERT INTO Achieve VALUES(?,?))',
            [$achievement->getStudentID(),$achievement->getAchievementID()]);
    }

    public function addEquipment($equipment){
        DB::insert('INSERT INTO Equipment VALUES(?,?,?,?,?,?,?)',
            [$equipment->getItemNo(),$equipment->getType(),
                $equipment->getPurchaseDate(),$equipment->isAvailable(),
                $equipment->getPurchasePrice(),$equipment->getCondition(),
                $equipment->getSportName()]);
    }

    public function addBorrow($borrow){
        DB::insert('INSERT INTO Borrow VALUES(?,?,?,?,?)',
            [$borrow->getItemNo(),$borrow->getStudentID(),
                $borrow->getStartDate(),$borrow->getEndDate(),
                $borrow->isReturned()]);
    }

    public function addSport($sport){
        DB::insert('INSERT INTO Sport VALUES(?)',[$sport->getSportName()]);
        foreach($sport->getUtilizationList() as $uti){
            DB::insert('INSERT INTO SportsResources VALUES(?,?,?)',
                [$uti->getSportName(),$uti->getResourceID(),$uti->getUtilization()]);
        }
    }

    public function addAdmin($admin){
        DB::insert('INSERT INTO Admin VALUES(?)',[$admin->getID()]);
        $this->addUser($admin);
    }

    public function addKeeper($keeper){
        DB::insert('INSERT INTO Keeper VALUES(?,?)',
            [$keeper->getID(),$keeper->getResource()]);
        $this->addUser($keeper);
    }

    public function addCoach($coach){
        DB::insert('INSERT INTO Coach VALUES(?,?)',
            [$coach->getID(),$coach->getResource()]);
        $this->addUser($coach);
    }

    public function addUser($user){
        DB::insert('INSERT INTO Users VALUES(?,?,?,?)',
            [$user->getID(),$user->getName(),$user->getContactNo(),$user->getPassword()]);
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
        DB::update('UPDATE equipment SET Availability= ?,EquipCondition= ? WHERE ItemNo = ?',
            [$eqpAv,$eqpCon,$equipmentID]);

    }
    /*
     * Update data.............................................................................
     */

    /*
     * Load Data.................................................
     */

    public function loadSports(){
        return DB::select('SELECT * FROM Sport');
    }

    public function loadResource(){
        return DB::select('SELECT * FROM Resources');
    }

    public function loadResourceOf($sportName){
        return DB::select('SELECT * FROM Resource NATURAL JOIN
            (SELECT ResourceID as ID FROM SportsResources WHERE SportName = ?)'
            ,[$sportName]);
    }

    public function loadPracticeSchedule(){
        return DB::select('SELECT * FROM PracticeSchedule');
    }

    public function loadEquipments(){
        return DB::select('SELECT * FROM Equipment');
    }

    public function loadEquipmentsOf($sportName){
        return DB::select('SELECT * FROM Equipment WHERE SportName = ?'
                            ,[$sportName]);
    }

    public function loadAvailableEquipments(){
        return DB::select('SELECT * FROM Equipment WHERE Availability = TRUE');
    }

    public function getEquipment($equipmentNo){
        return DB::select('SELECT * FROM Equipment WHERE ItemNo = ?'
                            ,[$equipmentNo]);
    }

    public function getAvailableEquipments($equipmentType,$sportName){
        return DB::select('SELECT * FROM Equipment WHERE Type = ? AND
                            SportName = ? AND Availability = True'
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

    public function getResourceReservedTime($resourceID,$date){
        $timeSlotList = array();
        $timeSlots =  DB::select('SELECT StartTime,EndTime FROM Booking WHERE
                            Resources_ID = ? AND Date = ? '
                            ,[$resourceID,$date]);
        foreach($timeSlots as $ts){
            $timeSlot = new TimeSlot();
            $timeSlot->setStartTime($ts->StartTime);
            $timeSlot->setEndTime($ts->EndTime);
            array_push($timeSlotList,$timeSlot);
        }

        $timeSlots =  DB::select('SELECT StartTime,EndTime FROM PracticeSchedule
                 WHERE Resources_ID = ? AND Date = ? '
            ,[$resourceID,$date]);
        foreach($timeSlots as $ts){
            $timeSlot = new TimeSlot();
            $timeSlot->setStartTime($ts->StartTime);
            $timeSlot->setEndTime($ts->EndTime);
            array_push($timeSlotList,$timeSlot);
        }
        return $timeSlotList;
    }

    public function searchStudentByName($name){
        return DB::select('SELECT * FROM Student WHERE FirstName LIKE \'%'.$name.'%\' OR
               LastName LIKE \'%'.$name.'%\'');
    }

    public function searchStudentByIndex($index){
        return DB::select('SELECT * FROM Student WHERE ID = ?',[$index]);
    }

    public function loadUsers(){
      return DB::select('SELECT * FROM users');
    }

    public function loadUsersOf($ID){
        //echo $ID;
        return DB::select('SELECT Name FROM users WHERE ID = ?',[$ID]);
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
        $users = DB::select('SELECT * FROM users WHERE Name = ? AND Password = ?',[$username,$password]);
        if(count($users)<=0)
            return false;
        return true;
    }

    public function getE(){
        $eq = new Equipment();
        $eq->setItemNo('01');
        $eq->setType('bat');
        $eq->setPurchaseDate('01-01-2000');
        return $eq;
    }
}