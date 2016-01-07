<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 12/29/2015
 * Time: 11:38 PM
 */

namespace App\DataBase;
use App\Domain\Sport;
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
    /*
     * Update data.............................................................................
     */

    /*
     * Load Data.................................................
     */

    public function loadSports(){

        /*$sportList = array();
        $sports = DB::select('SELECT * FROM Sport');
        if(count($sports)<=0) {
            $sport = new Sport();
            $sport
            array_push($sportList, $utilization);
        }
        return true;*/
    }

    public function loadUsers(){
      return DB::select('SELECT * FROM users');
    }

    //DB::statement("UPDATE favorite_contents,
    // contents SET favorite_contents.type = contents.type where favorite_contents.content_id = contents.id");
    /*
     * Check Data...........................
     * */

    public function checkUser($username,$password){
        $users = DB::select('SELECT * FROM users WHERE Name = ? AND Password = ?',[$username,$password]);
        if(count($users)<=0)
            return false;
        return true;
    }


}