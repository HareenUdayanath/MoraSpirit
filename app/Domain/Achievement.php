<?php namespace App\Domain;

/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 12/30/2015
 * Time: 12:10 AM
 */
class Achievement
{
    private $studentID;
    private $achievementID;
    private $contest;
    private $date;
    private $place;
    private $sportName;
    private $description;

    /**
     * @return the achievementID
     */
    public function getAchievementID() {
        return $this->achievementID;
    }

    /**
     * @param achievementID the achievementID to set
     */
    public function setAchievementID($achievementID) {
        $this->achievementID = $achievementID;
    }

    /**
     * @return the contest
     */
    public function getContest() {
        return $this->contest;
    }

    /**
     * @param contest the contest to set
     */
    public function setContest($contest) {
        $this->contest = $contest;
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
     * @return the place
     */
    public function getPlace() {
        return $this->place;
    }

    /**
     * @param place the place to set
     */
    public function setPlace($place) {
        $this->place = $place;
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
     * @return the description
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param description the description to set
     */
    public function setDescription($description) {
        $this->description = $description;
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

}