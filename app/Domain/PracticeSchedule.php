<?php   namespace App\Domain;

/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 12/30/2015
 * Time: 12:27 AM
 */
class PracticeSchedule
{
    private $sessionID;
    private $sportName;
    private $resourceName;
    private $date;
    private $startTime;
    private $endTime;

    /**
     * @return the sessionID
     */
    public function getSessionID() {
        return $this->sessionID;
    }

    /**
     * @param sessionID the sessionID to set
     */
    public function setSessionID($sessionID) {
        $this->sessionID = $sessionID;
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
     * @return the date
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * @param date the date to set
     */
    public function setDate($date) {
        $array=explode('/',$date);
        $newDate=$array[2]."-".$array[0]."-".$array[1];
        $this->date = $newDate;
    }

    /**
     * @return the startTime
     */
    public function getStartTime() {
        return $this->startTime;
    }

    /**
     * @param startTime the startTime to set
     */
    public function setStartTime($startTime) {
        $this->startTime = $startTime;
    }

    /**
     * @return the endTime
     */
    public function getEndTime() {
        return $this->endTime;
    }

    /**
     * @param endTime the endTime to set
     */
    public function setEndTime($endTime) {
        $this->endTime = $endTime;
    }

    /**
     * @return the resourceName
     */
    public function getResourceName() {
        return $this->resourceName;
    }

    /**
     * @param resourceID the resourceName to set
     */
    public function setResourceName($resourceName) {
        $this->resourceName = $resourceName;
    }
}