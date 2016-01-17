<?php namespace App\Http\Controllers;
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 12/30/2015
 * Time: 2:14 AM
 */

use App\DataBase\DataBase;
use App\Domain\Achievement;
use App\Domain\User;
use Illuminate\Support\Facades\Input;
use App\Domain\PracticeSchedule;

class CoachController extends Controller
{


    public function displayPracticeSchedulePage()
    {
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('coachViews.practiceSchedule')
            ->with('user',$user)
            ->with('sports',DataBase::getInstance()->loadSports())
            ->with('resources',DataBase::getInstance()->loadResource());
    }

    public function displayAchievementPage()
    {
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('coachViews.achievements')
            ->with('user',$user)
            ->with('sports',DataBase::getInstance()->loadSports());
    }

    public function addPracticeSchedule(){
        $practiceSchedule = new PracticeSchedule();
        $practiceSchedule->setSportName(Input::get('sport'));
        $practiceSchedule->setSessionID(7);
        $practiceSchedule->setDate(Input::get('date'));
        $startTime = strval(Input::get('start-hour'));
        $startTime = $startTime.':'.strval(Input::get('start-minute'));
        $practiceSchedule->setStartTime($startTime);
        $endTime = strval(Input::get('end-hour'));
        $endTime = $endTime.':'.strval(Input::get('start-minute'));
        $practiceSchedule->setEndTime($endTime);
        $databse = DataBase::getInstance();
        $databse->addPracticeSchedule1($practiceSchedule);
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('coachViews.practiceSchedule')
            ->with('user',$user)
            ->with('sports',DataBase::getInstance()->loadSports())
            ->with('resources',DataBase::getInstance()->loadResource());

    }

    public function addAchievement(){
        $achievement=new Achievement();
        $achievement->setAchievementID(8);
        $achievement->setSportName(Input::get('sport'));
        $achievement->setContest(Input::get('contest'));
        $achievement->setPlace(Input::get('place'));
        $achievement->setDate(Input::get('scheduleDay'));
        $database=Database::getInstance();
        $database->addAchievementt($achievement);
        $user=new User();
        $user->setName("Anthony Fernando");
        return view('coachViews.achievements')
            ->with('user',$user)
            ->with('sports',DataBase::getInstance()->loadSports());
    }

    public function getResources($sportName){
        $res = DataBase::getInstance()->loadResourceOf($sportName);
        return view('coachViews.ajexViews.resources')->with('resources',$res);
    }

    /*public function getReservedTimes(){
        $reservedList;
        return view('coachViews.ajexViews.reservedTimes')->with('reservedList',$reservedList);
    }*/

}