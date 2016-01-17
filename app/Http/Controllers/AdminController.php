<?php namespace App\Http\Controllers;

use App\Domain\Equipment;
use App\Domain\Sport;
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
        return view('adminViews.adminEquipments')->with('user',$user);
    }

    public function displayResourcePage(){
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('adminViews.adminResources')->with('user',$user);
    }

    public function displayStudentPage(){
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('adminViews.adminStudents')->with('user',$user);
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
        $txt = "num of rows1 \n";
        $myfile = fopen("newfile.txt", "w");
        fwrite($myfile,$txt);
        for($i=0; $i<$rows;$i++){
            $util = new Utilization();
            $resourceID = $database->getResourceID(Input::get('resource'.$i));
            //fwrite($myfile, $resourceID);
            $util->setResourceID($resourceID);
            $util->setUtilization(Input::get('util'.$i));
            $sport->addUtilization($util);
        }
        fclose($myfile);
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
        $availability = 0;
        if (Input::get('equip-avail')=="Available"){
            $availability = 1;
        }
        $equip->setAvailability($availability);
        $equip->setSportName(Input::get('equip-sport'));
        $database->addEquipment($equip);
        return $this->displayEquipmentPage();
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

}