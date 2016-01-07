<?php namespace App\Domain;

/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 12/30/2015
 * Time: 12:25 AM
 */
class Brrow
{
    private $itemNo;
    private $studentID;
    private $startDate;
    private $endDate;
    private $returned;

    /**
     * @return the itemNo
     */
    public function getItemNo() {
        return $this->itemNo;
    }

    /**
     * @param itemNo the itemNo to set
     */
    public function setItemNo($itemNo) {
        $this->itemNo = $itemNo;
    }

    /**
     * @return the studentID
     */
    public function getStudentID() {
        return $this->studentID;
    }

    /**
     * @param studentID the studentID to set
     */
    public function setStudentID($studentID) {
        $this->studentID = $studentID;
    }

    /**
     * @return the startDate
     */
    public function getStartDate() {
        return $this->startDate;
    }

    /**
     * @param startDate the startDate to set
     */
    public function setStartDate($startDate) {
        $this->startDate = $startDate;
    }

    /**
     * @return the endDate
     */
    public function getEndDate() {
        return $this->endDate;
    }

    /**
     * @param endDate the endDate to set
     */
    public function setEndDate($endDate) {
        $this->endDate = $endDate;
    }

    /**
     * @return the returned
     */
    public function isReturned() {
        return $this->returned;
    }

    /**
     * @param returned the returned to set
     */
    public function setReturned($returned) {
        $this->returned = $returned;
    }
}