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

    public function addUtilization($utilization){
        $utilization->setSportName(sportName);
        array_push($this->getUtilizationList(),$utilization );
    }

    /**
     * @return the utilizationList
     */
    public function getUtilizationList() {
        return $this->utilizationList;
    }

}