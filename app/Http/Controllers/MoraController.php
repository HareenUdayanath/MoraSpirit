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
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Log;
use Auth;

class MoraController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>['login','home']]);
    }

    public function login(){
        Log::info(Input::all());
        if(Auth::attempt(['ID'=>Input::get('ID'),'password'=>Input::get('password')])){
            return redirect()->to('/');
        }

        return back()->with('errors',["Check your credentials"]);
    }

    public function home(){

        if(Auth::check()){
            return view('projectViews.home')->with('user',Auth::user());
        }
        //return view('auth.login');
        return view('projectViews.public');
    }

    public function loginView(){
        return view('auth.login');
    }

    public function getUsersOf($id)
    {
        $users =  DataBase::getInstance()->loadUsersOf($id);
        return View('projectViews.intest')->with('users',$users);
    }

    public function register()
    {
        return view('projectViews.register');
    }

    public function editProfileView()
    {
        return view('projectViews.editProfile')->with('user',Auth::user());
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
        $user->setPassword(Hash::make(Input::get('password')));
        //$user->timestamps = false;
        //$user->save();
        $database->addUser($user);
        return view('projectViews.login');
    }

    public function in()
    {
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('projectViews.in')->with('user',$user);

    }

    public function publicView(){
        return view('projectViews.public');
    }

}