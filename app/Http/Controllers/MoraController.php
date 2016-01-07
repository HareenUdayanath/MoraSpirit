<?php namespace App\Http\Controllers;
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 12/30/2015
 * Time: 2:14 AM
 */

use App\DataBase\DataBase;
use App\Domain\User;
use Illuminate\Support\Facades\Input;

class MoraController extends Controller
{
    public function login()
    {
        return view('projectViews.login');
    }

    public function temp()
    {
        return view('layout.template');
    }

    public function seeUser()
    {
        return view('projectViews.showUsers')->with('users',DataBase::getInstance()->loadUsers());
    }

    public function register()
    {
        return view('projectViews.register');
    }

    public function first()
    {
        $database = DataBase::getInstance();
        $result = $database->checkUser(Input::get('username'),Input::get('password'));
        if($result)
            return view('home');
        else
            return view('projectViews.login');
    }

    public function addUser()
    {
        $database = DataBase::getInstance();
        $user = new User();
        $user->setID(Input::get('id'));
        $user->setName(Input::get('name'));
        $user->setContactNo(Input::get('contactNo'));
        $user->setPassword(Input::get('password'));
        $database->addUser($user);
        return view('projectViews.login');
    }

}