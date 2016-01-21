<?php
/**
 * Created by PhpStorm.
 * User: Irfad Hussain
 * Date: 1/21/2016
 * Time: 2:08 AM
 */

namespace App\Domain;


class Involve
{
    private $studentID;
    private $sportName;

    public function getStudentID(){
        return $this->studentID;
    }

    public function setStudentID($studentID){
        $this->studentID = $studentID;
    }

    public function getSportName(){
        return $this->sportName;
    }

    public function setSportName($sportName){
        $this->sportName = $sportName;
    }

}