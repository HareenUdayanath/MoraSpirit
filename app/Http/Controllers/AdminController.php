<?php namespace App\Http\Controllers;

use App\Domain\Coach;
use App\Domain\Equipment;
use App\Domain\Keeper;
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
        return view('adminViews.adminSports')->with('user',$user)->with('resources',DataBase::getInstance()->loadResource());
    }

    public function displayEquipmentPage(){
        $database = DataBase::getInstance();
        $equips = $database->loadEquipments();
        $sports = $database->loadSports();
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('adminViews.adminEquipments')->with('user',$user)->with('equips',$equips)->with('sports',$sports);
    }

    public function displayResourcePage(){
        $database = DataBase::getInstance();
        $keepers = $database->loadKeepers();
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('adminViews.adminResources')->with('user',$user)->with('keepers',$keepers);
    }

    public function displayStudentPage(){
        $database = DataBase::getInstance();
        $students = $database->loadStudents();
        $sports = $database->loadSports();
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('adminViews.adminStudents')->with('user',$user)->with('students',$students)->with('sports',$sports);
    }

    public function addNewUser(){
        $database = DataBase::getInstance();
        $user=null;
        $role = Input::get('user-role');
        if($role=='Coach'){
            $user = new Coach();
            $user->setSportName(Input::get('user-sport-or-res'));
        }elseif($role=='Keeper'){
            $user = new Keeper();
            $user->setResource(Input::get('user-sport-or-res'));
        }else{
            $user = new User();
        }
        $user->setID(Input::get('user-id'));
        $user->setName(Input::get('user-name'));
        $user->setContactNo(Input::get('contact-num'));
        $user->setPassword('abcd');
        $user->setRole($role);
        if($role=='Coach'){
            $database->addCoach($user);
        }elseif($role=='Keeper'){
            $database->addKeeper($user);
        }else{
            $database->addUser($user);
        }
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
        $users = $database->searchUserByName($name);
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

    public function loadSports($requester){
        $database = DataBase::getInstance();
        $sports = $database->loadSports();
        if ($requester=='user'){
            return view('adminViews.ajaxViews.sportResourceSelect')->with('role','Sport')->with('roleitem',$sports);
        }
        else if($requester==''){

        }
    }

    public function loadResources($requester){
        $database = DataBase::getInstance();
        $resources = $database->loadResource();
        if ($requester=='user'){
            return view('adminViews.ajaxViews.sportResourceSelect')->with('role','Resource')->with('roleitem',$resources);
        }
        else if($requester=='sport'){
            return view('adminViews.ajaxViews.sportDropDown');
        }
    }

    public  function loadStudent($id){
        $database = DataBase::getInstance();
        $student = $database->searchStudentByID($id);
        $sports = $database->loadSports();
        $myfile = fopen("newfile.txt", "w");
        //fwrite($myfile,$txt);
        /*foreach($student as $equip){
            fwrite($myfile,$equip->ID);
        }
        fclose($myfile);*/
        return view('adminViews.ajaxViews.editStudentForm')->with('student',$student[0])->with('sports',$sports);
    }

    public function loadUser($id){
        $database = DataBase::getInstance();
        $user = $database->searchUserByID($id);
        if($user[0]->Role=='Coach'){
            $coach=$database->getCoach($id);
            $sports = $database->loadSports();
            return view('adminViews.ajaxViews.editUserForm')->with('user',$user[0])->with('coach',$coach)->with('sports',$sports);
        }elseif($user[0]->Role=='Keeper'){
            $keeper=$database->getKeeper($id);
            $resource = $database->loadResource();
            return view('adminViews.ajaxViews.editUserForm')->with('user',$user[0])->with('keeper',$keeper)->with('resources',$resource);
        }
        return view('adminViews.ajaxViews.editUserForm')->with('user',$user[0]);
    }

    public function loadEquip($itemNo){
        $database = DataBase::getInstance();
        $equips = $database->searchEquipmentByID($itemNo);
        $sports = $database->loadSports();
        return view('adminViews.ajaxViews.editEquipmentForm')->with('equip',$equips[0])->with('sports',$sports);
    }

    public function loadUtils($sport){
        $database = DataBase::getInstance();
        $utils = $database->getUtils($sport);
        return view('adminViews.ajaxViews.utilizationTable')->with('utils',$utils);
    }

    public function updateStudent(){
        $database = DataBase::getInstance();
        $student = new Student();
        $student->setID(Input::get('std-id'));
        $student->setFirstName(Input::get('std-name'));
        $student->setDepartment(Input::get('std-dept'));
        $student->setFaculty(Input::get('std-faculty'));
        $student->setSportName(Input::get('std-sport'));
        $database->updateStudent($student);
        return $this->displayStudentPage();
    }

}