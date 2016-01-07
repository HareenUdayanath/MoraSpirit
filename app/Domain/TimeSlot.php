<?php namespace App\Domain;

/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 12/30/2015
 * Time: 12:28 AM
 */
class TimeSlot
{
    private $startTime;
    private $endTime;

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