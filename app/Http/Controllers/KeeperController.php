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
        $resources=DataBase::getInstance()->loadResource();
        return view('keeperViews.reserve')->with('user',$user)
            ->with('resources',$resources)
            ->with('user',$user);;

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
        return view('KeeperViews.ajaxViews.restimes')->with('$reservedtimes',$upeqp);


    }



}