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

class CoachController extends Controller
{
    public function addPracticeSchedule()
    {
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('coachViews.practiceSchedule')->with('user',$user);
    }

    public function addAchievement()
    {
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('coachViews.achievements')->with('user',$user);
    }

}