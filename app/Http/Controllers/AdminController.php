<?php namespace App\Http\Controllers;
use App\Domain\User;

/**
 * Created by PhpStorm.
 * User: Irfad Hussain
 * Date: 1/7/2016
 * Time: 6:38 PM
 */

class AdminController extends Controller
{
    public function displayHome(){
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('adminViews.admin')->with('user',$user);
    }
}