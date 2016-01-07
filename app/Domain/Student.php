<?php namespace App\Domain;

/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 12/30/2015
 * Time: 12:28 AM
 */
class Student
{
    private $ID;
    private $sportName;
    private $firstName;
    private $lastName;
    private $faculty;
    private $department;
    private $achievementList;

    protected function  __construct()
    {
        $this->achievementList = array();
    }

    public function addAchievement($achievement){
        array_push($this->achievementList,$achievement );
    }
    /**
     * @return the ID
     */
    public function getID() {
        return $this->ID;
    }

    /**
     * @param ID the ID to set
     */
    public function setID($ID) {
        $this->ID = $ID;
    }

    /**
     * @return the firstName
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * @param firstName the firstName to set
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    /**
     * @return the lastName
     */
    public function getLastName() {
        return $this->lastName;
    }

    /**
     * @param lastName the lastName to set
     */
    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    /**
     * @return the faculty
     */
    public function getFaculty() {
        return $this->faculty;
    }

    /**
     * @param faculty the faculty to set
     */
    public function setFaculty($faculty) {
        $this->faculty = $faculty;
    }

    /**
     * @return the department
     */
    public function getDepartment() {
        return $this->department;
    }

    /**
     * @param department the department to set
     */
    public function setDepartment($department) {
        $this->department = $department;
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
}