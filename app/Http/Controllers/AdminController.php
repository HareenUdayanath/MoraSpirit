<?php namespace App\Http\Controllers;

use App\Domain\User;
use App\DataBase\DataBase;

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

    public function displayAddUserPage(){
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('adminViews.adminAddUser')->with('user',$user)->with('user',$user)->with('users',DataBase::getInstance()->loadUsers());
    }

}