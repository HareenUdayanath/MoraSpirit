<?php namespace App\Domain;

/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 12/30/2015
 * Time: 12:25 AM
 */
class Booking
{
    private $resourceID;
    private $requesterName;
    private $requesterContactNo;
    private $date;
    private $startTime;
    private $endTime;

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
        $this->resourceID = $resourceID;
    }

    /**
     * @return the requesterName
     */
    public function getRequesterName() {
        return $this->requesterName;
    }

    /**
     * @param requesterName the requesterName to set
     */
    public function setRequesterName($requesterName) {
        $this->requesterName = $requesterName;
    }

    /**
     * @return the requesterContactNo
     */
    public function getRequesterContactNo() {
        return $this->requesterContactNo;
    }

    /**
     * @param requesterContactNo the requesterContactNo to set
     */
    public function setRequesterContactNo($requesterContactNo) {
        $this->requesterContactNo = $requesterContactNo;
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
        $this->date = $date;
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
}