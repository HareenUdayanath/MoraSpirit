<?php namespace App\Domain;

/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 12/30/2015
 * Time: 12:27 AM
 */
class Sport
{
    private $sportName;
    private $sportID;
    private $utilizationList;


    public function  __construct()
    {
        $this->utilizationList = array();
    }

    /**
     * @return the sportName
     */
    public function getSportName() {
        return $this->sportName;
    }

    /**
     * @param sportName the sportName to set
     */
    public function setSportName($sportName) {
        $this->sportName = $sportName;
    }

    /**
     * @return the sportID
     */
    public function getSportID() {
        return $this->sportID;
    }

    /**
     * @param sportName the sportID to set
     */
    public function setSportID($sportID) {
        $this->sportID = $sportID;
    }

    public function addUtilization($utilization){
        $utilization->setSportName($this->sportName);
        array_push($this->utilizationList,$utilization );
    }

    /**
     * @return the utilizationList
     */
    public function getUtilizationList() {
        return $this->utilizationList;
    }

}