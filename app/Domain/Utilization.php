<?php namespace App\Domain;

/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 12/30/2015
 * Time: 12:29 AM
 */
class Utilization
{
    private $sportName;
    private $resourceID;
    private $utilization;

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
     * @return the resourceID
     */
    public function getResourceID() {
        return $this->resourceID;
    }

    /**
     * @param resourceID the resourceID to set
     */
    public function setResourceID($resourceID) {
        $this->resourceID = resourceID;
    }

    /**
     * @return the utilization
     */
    public function getUtilization() {
        return $this->utilization;
    }

    /**
     * @param utilization the utilization to set
     */
    public function setUtilization($utilization) {
        $this->utilization = $utilization;
    }
}