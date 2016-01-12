<?php namespace App\Http\Controllers;


use App\DataBase\DataBase;
use App\Domain\User;
use Illuminate\Support\Facades\Input;

class KeeperController extends Controller
{
    public function getEqpRc()
    {
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('keeperViews.eqpRecieval')->with('user',$user);

    }

    public function getReserve()
    {
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('keeperViews.reserve')->with('user',$user);

    }

    public function getEqpLn()
    {
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('keeperViews.eqpLending')->with('user',$user);

    }

    public function getUpDt()
    {
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('keeperViews.update')->with('user',$user);

    }


}