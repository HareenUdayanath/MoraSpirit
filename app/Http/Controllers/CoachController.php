<?php namespace App\Http\Controllers;
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 12/30/2015
 * Time: 2:14 AM
 */

use App\DataBase\DataBase;
use App\Domain\Achievement;
use App\Domain\TimeSlot;
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
        $practiceSchedule->setSessionID(10);
        $practiceSchedule->setResourceID(1);
        $practiceSchedule->setDate(Input::get('date'));
        $str1=Input::get('start-am-pm');
        $str2=Input::get('end-am-pm');

        $startTime = strval(Input::get('start-hour'));
        if($str1=="am"){
            $startTime = $startTime.':'.strval(Input::get('start-minute'));
        }else{
            $startTime = strval(intval($startTime)+12).':'.strval(Input::get('start-minute'));
        }

        $practiceSchedule->setStartTime($startTime);
        $endTime = strval(Input::get('end-hour'));
        if($str2=="am"){
            $endTime = $endTime.':'.strval(Input::get('end-minute'));
        }else{
            $endTime = strval(intval($endTime)+12).':'.strval(Input::get('end-minute'));
        }

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
        $achievement->setStudentID(Input::get('index-number'));
        $achievement->setSportName(Input::get('sport'));
        $achievement->setContest(Input::get('contest'));
        $achievement->setPlace(Input::get('place'));
        $achievement->setDate(Input::get('scheduleDay'));
        $achievement->setDescription(Input::get('description'));
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

    public function getReservedTimes($resourceName,$date){
        $reservedList=DataBase::getInstance()->getResourceReservedTime($resourceName,$date);
        return view('coachViews.ajexViews.reservedTimes')->with('reservedList',$reservedList);
    }

    /*public function compareReservedTime($st1,$st2){
        $timeSlot=new TimeSlot();
        $startTime=$timeSlot->getStartTime();
        $endTime=$timeSlot->getEndTime();
        $str1=explode(":",$startTime);
        $startTimeValue=intval($str1[0]);
        $str2=explode(":",$endTime);
        $endTimeValue=intval($str2[0]);
        if($st1==$startTimeValue ){
            echo "start time error";
        }elseif( $st2==$endTimeValue){
            echo "end time error";
        }
    }*/
    public function getStdName($ID){
        $name=DataBase::getInstance()->getStudentName($ID);
        return view('coachViews.ajexViews.studentName')->with('stdName',$name);
    }

    public function loadAchiPage(){
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('coachViews.loadAchievement')
            ->with('user',$user);
    }

    public function loadAchievement($ID){
        $achievement=Database::getInstance()->getAchievement($ID);
        return view('coachViews.ajexViews.achieveList')->with('achieve',$achievement);
    }
     public function displayCoachHome(){
         $user = new User();
         $user->setName("Anthony Fernando");
         return view('coachViews.coachHome')
             ->with('user',$user);
     }
    public function displayDelSession(){
        $sessionID=DataBase::getInstance()->getAllSessionID();
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('coachViews.deleteSchedule')
            ->with('user',$user)
            ->with('sessionID',$sessionID);
    }

    public function deleteSession(){
        $sessionID=Input::get('sessionID');
        DataBase::getInstance()->deleteSessionID($sessionID);
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('coachViews.deleteSchedule')
            ->with('user',$user)
            ->with('sessionID',DataBase::getInstance()->getAllSessionID());
    }

}