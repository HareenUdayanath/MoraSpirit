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

class PublicController extends Controller
{

    public function publicView(){
        return view('publicViews.public');
    }

    public function loadPracticeSchedules(){

        return view('publicViews.practiceSchedules')
            ->with('practiceSchedules',DataBase::getInstance()->loadPracticeSchedule());
    }

    public function loadEquipments(){

        return view('publicViews.equipments')
            ->with('equipments',DataBase::getInstance()->loadAvailableEquipmentsWithSports());
    }

    public function loadResources(){

        return view('publicViews.resources')
            ->with('resources',DataBase::getInstance()->loadResource());
    }

    public function loadResourceFreeTimes($resourceID){
        $Name = DataBase::getInstance()->getNameOfResource($resourceID)[0]->Name;
        Log::info($Name);
        return view('publicViews.resourceFreeTimes')
            ->with('dates',DataBase::getInstance()->getReservedDatesFor($resourceID))
            ->with('resourceName',$Name);
    }

    public function getReservedTimes($resourceName,$date){
        $reservedList=DataBase::getInstance()->getResourceReservedTime($resourceName,$date);
        return view('publicViews.timeSlotTable')->with('reservedList',$reservedList);
    }

}