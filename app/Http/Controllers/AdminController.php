<?php namespace App\Http\Controllers;

use App\Domain\Equipment;
use App\Domain\Resource;
use App\Domain\Sport;
use App\Domain\Student;
use App\Domain\User;
use App\DataBase\DataBase;
use App\Domain\Utilization;
use Illuminate\Support\Facades\Input;

/**
 * Created by PhpStorm.
 * User: Irfad Hussain
 * Date: 1/7/2016
 * Time: 6:38 PM
 */

class AdminController extends Controller
{
    public function displayHomePage(){
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('adminViews.adminHome')->with('user',$user);
    }

    public function displayUserPage(){
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('adminViews.adminUsers')->with('user',$user)->with('users',DataBase::getInstance()->loadUsers());
    }

    public function displaySportPage(){
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('adminViews.adminSports')->with('user',$user);
    }

    public function displayEquipmentPage(){
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('adminViews.adminEquipments')->with('user',$user)->with('equips',DataBase::getInstance()->loadEquipments());
    }

    public function displayResourcePage(){
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('adminViews.adminResources')->with('user',$user);
    }

    public function displayStudentPage(){
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('adminViews.adminStudents')->with('user',$user)->with('students',DataBase::getInstance()->loadStudents());
    }

    public function addNewUser(){
        $database = DataBase::getInstance();
        $user = new User();
        $user->setID(Input::get('user-id'));
        $user->setName(Input::get('user-name'));
        $user->setContactNo(Input::get('contact-num'));
        $user->setPassword('abcd');
        $database->addUser($user);
        return $this->displayUserPage();
    }

    public function addNewSport(){
        $database = DataBase::getInstance();
        $sport = new Sport();
        $sport->setSportName(Input::get('sport-name'));
        $rows = Input::get('num-of-rows');
        for($i=0; $i<$rows;$i++){
            $util = new Utilization();
            $resourceID = $database->getResourceID(Input::get('resource'.$i));
            //fwrite($myfile, $resourceID);
            $util->setResourceID($resourceID);
            $util->setUtilization(Input::get('util'.$i));
            $sport->addUtilization($util);
        }
        $database->addSport($sport);
        return $this->displaySportPage();
    }

    public function addNewEquipment(){
        $database = DataBase::getInstance();
        $equip = new Equipment();
        $equip->setItemNo(Input::get('equip-id'));
        $equip->setType(Input::get('equip-type'));
        $purchDate = explode('/',Input::get('purch-date'));
        $purchDate = $purchDate[2].'/'.$purchDate[1].'/'.$purchDate[0];
        $equip->setPurchaseDate($purchDate);
        $equip->setPurchasePrice(Input::get('equip-price'));
        $equip->setCondition(Input::get('equip-cond'));
        $equip->setAvailability(Input::get('equip-avail'));
        $equip->setSportName(Input::get('equip-sport'));
        $database->addEquipment($equip);
        return $this->displayEquipmentPage();
    }

    public function addNewResource(){
        $database = DataBase::getInstance();
        $resource = new Resource();
        $resource->setID(Input::get('res-id'));
        $resource->setName(Input::get('res-name'));
        $resource->setLocation(Input::get('res-location'));
        $resource->setKeeperID(Input::get('res-keeper'));
        $database->addResource($resource);
        return $this->displayResourcePage();
    }

    public function addnewStudent(){
        $database = DataBase::getInstance();
        $student = new Student();
        $student->setID(Input::get('std-id'));
        $student->setFirstName(Input::get('std-name'));
        $student->setDepartment(Input::get('std-dept'));
        $student->setFaculty(Input::get('std-faculty'));
        $student->setSportName(Input::get('std-sport'));
        $database->addStudent($student);
        return $this->displayStudentPage();
    }

    public function searchUserID($ID){
        $database = DataBase::getInstance();
        $users = $database->searchUserByID($ID);
        return view('adminViews.ajaxViews.userTable')->with('users',$users);

    }

    public function searchUserName($name){
        $database = DataBase::getInstance();
        $users = $database->searchStudentByName($name);
        return view('adminViews.ajaxViews.userTable')->with('users',$users);
    }

    public function searchStudentID($ID){
        $database = DataBase::getInstance();
        $students = $database->searchStudentByID($ID);
        return view('adminViews.ajaxViews.studentTable')->with('students',$students);

    }

    public function searchStudentName($name){
        $database = DataBase::getInstance();
        $students = $database->searchStudentByName($name);
        return view('adminViews.ajaxViews.studentTable')->with('students',$students);
    }

    public function searchEquipID($ID){
        $database = DataBase::getInstance();
        $equips = $database->searchEquipmentByID($ID);
        return view('adminViews.ajaxViews.equipmentTable')->with('equips',$equips);

    }

    public function searchEquipType($name){
        $database = DataBase::getInstance();
        $equips = $database->searchEquipmentByType($name);
        /*$txt = "num of rows2 \n";
        $myfile = fopen("newfile.txt", "w");
        fwrite($myfile,$txt);
        foreach($equips as $equip){
            fwrite($myfile,$equip->ItemNo);
        }
        fclose($myfile);*/
        return view('adminViews.ajaxViews.equipmentTable')->with('equips',$equips);
    }

}