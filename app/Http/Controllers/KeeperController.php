<?php namespace App\Http\Controllers;


use App\DataBase\DataBase;
use App\Domain\Booking;
use App\Domain\Borrow;
use App\Domain\Equipment;
use App\Domain\User;
use Illuminate\Support\Facades\Input;
use Log;

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
        $resources=DataBase::getInstance()->loadResource();
        return view('keeperViews.reserve')->with('user',$user)
            ->with('resources',$resources)
            ->with('user',$user);

    }

    public function getSports()
    {
        $user = new User();
        $user->setName("Anthony Fernando");
        $sports = DataBase::getInstance()->loadSports();
        return view('keeperViews.eqpLending')
            ->with('sports',$sports)
            ->with('user',$user);

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



    public function getEq()
    {
        $database = DataBase::getInstance();
        return  $database->getEq();

    }

    public function loadeqp($sport){
        $eqp = DataBase::getInstance()->loadEquipmentsOf($sport);
        return view('KeeperViews.ajaxViews.eqp')->with('equipments',$eqp);
        //return view('KeeperViews.ajaxViews.eqp');
    }

    public function checkEqpAv($equipmentType,$sportName){
        $eqpnums = DataBase::getInstance()->getAvailableEquipments($equipmentType,$sportName);
        return view('KeeperViews.ajaxViews.reserve')->with('equipmentnums',$eqpnums);
        //return view('KeeperViews.ajaxViews.eqp');
    }

    public function eqpResDetails($stIndex,$itemNo){
        $resEqp = DataBase::getInstance()->loadEquipmentsOf($stIndex,$itemNo);
        return view('KeeperViews.ajaxViews.eqpRecieval')->with('equipments',$resEqp);
        //return view('KeeperViews.ajaxViews.eqp');
    }

    public function getUpEqp($eqpID){
        $upeqp = DataBase::getInstance()->getEquipment($eqpID);
        return view('KeeperViews.ajaxViews.eqpUpdate')->with('updateEqp',$upeqp);
        //return view('KeeperViews.ajaxViews.eqp');
    }

    public function getResTimes($resource,$date){
        $timelist =  DataBase::getInstance()->getResourceReservedTime($resource,$date);
        return view('KeeperViews.ajaxViews.restimes')->with('$reservedtimes',$timelist);


    }

    public function updateEq($eqpID,$eqpAv,$eqpCon){

        $db = DataBase::getInstance();
        $db->updateEquipmentDetails($eqpAv,$eqpCon,$eqpID);
        //$user = new User();
        //$user->setName("Anthony Fernando");
        //return view('keeperViews.update')->with('user',$user);

    }

    public function getBorrowedItems($stid){

        $eqplist = DataBase::getInstance()->getBorrowEquipment($stid);
        return view('KeeperViews.ajaxViews.borrowedList')->with('borrows',$eqplist);
    }

    public function getBrDetails($itemNo){

        $britem = DataBase::getInstance()->getBorrowedEqp($itemNo);
        return view('KeeperViews.ajaxViews.eqpRecieval')->with('recEqp',$britem);
    }

    public function addEqpRequest($eqType,$stID){

        $db = DataBase::getInstance();
        $db->addEquipmentRequest($eqType,$stID);

    }

    public function lendEquipment(){
        //$date=explode("/",$duedate);

        $lendEq = new Borrow();
        $lendEq-> setStudentID(Input::get('lendstid'));
        $lendEq-> setItemNo(Input::get('eqnums'));
        $lendEq->setReturned(false);
        $lendEq-> setStartDate(date("Y-m-d"));
        $date=explode("/",Input::get('birthday'));
        $lendEq-> setEndDate($date[2]."-".$date[0]."-".$date[1]);

        $db = DataBase::getInstance();
        $db->addBorrow($lendEq);
        return back();

    }

    public function setAvailability($eqpID){

        $db = DataBase::getInstance();
        $db->updateEquipmentAvailability($eqpID);
    }

    public function getReservedTimes($resourceName,$date){
        $reservedList=DataBase::getInstance()->getResourceReservedTime($resourceName,$date);
        return view('KeeperViews.ajaxViews.restimes')->with('reservedList',$reservedList);
    }

    public function addBooking(){
        $db = DataBase::getInstance();
        $bk=new Booking();
        $bk->setResourceID($db->getResourceID(Input::get('resource')));
        $bk->setRequesterName(Input::get('reqName'));
        $bk->setRequesterContactNo(Input::get('conNum'));
        $date=Input::get('resdate');
        $dateArr=explode("/",$date);
        Log::info($date);
        $newDate=$dateArr[2]."-".$dateArr[0]."-".$dateArr[1];
        $bk->setDate($newDate);
        $str1=Input::get('start-am-pm');
        $str2=Input::get('end-am-pm');

        $startTime = strval(Input::get('start-hour'));
        if($str1=="am"){
            $startTime = $startTime.':'.strval(Input::get('start-minute'));
        }else{
            $startTime = strval(intval($startTime)+12).':'.strval(Input::get('start-minute'));
        }
        Log::info($startTime);
        $bk->setStartTime($startTime);
        $endTime = strval(Input::get('end-hour'));
        if($str2=="am"){
            $endTime = $endTime.':'.strval(Input::get('end-minute'));
        }else{
            $endTime = strval(intval($endTime)+12).':'.strval(Input::get('end-minute'));
        }

        Log::info($endTime);
        $bk->setEndTime($endTime);
        Log::info('dddd');
        $db->addBookin($bk);
        Log::info('dddd');
        $user = new User();
        $user->setName("Anthony Fernando");
        $resources=DataBase::getInstance()->loadResource();
        return view('keeperViews.reserve')->with('user',$user)
            ->with('resources',$resources)
            ->with('user',$user);
    }


    public function displayKeeperHome(){
        $user = new User();
        $user->setName("Anthony Fernando");
        return view('keeperViews.keeperHome')
            ->with('user',$user);
    }


}