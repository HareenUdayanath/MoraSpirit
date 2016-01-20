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
    private $sportList;
    private $name;
    private $dateOfBirth;
    private $gender;
    private $address;
    private $medicalCondition;
    private $bloodGroup;
    private $emergencyContactPerson;
    private $emergencyContactNumber;
    private $faculty;
    private $department;
    private $achievementList;

    public function  __construct()
    {
        $this->achievementList = array();
        $this->sportList = array();
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
     * @return the Name
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param Name the Name to set
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return the date of birth
     */
    public function getDateOfBirth() {
        return $this->dateOfBirth;
    }

    /**
     * @param name the date of birth to set
     */
    public function setDateOfBirth($dateOfBirth) {
        $this->dateOfBirth = $dateOfBirth;
    }

    /**
     * @return the gender
     */
    public function getGender() {
        return $this->gender;
    }

    /**
     * @param name the gender to set
     */
    public function setGender($gender) {
        $this->gender = $gender;
    }

    /**
     * @return the contactNo
     */
    public function getEmergencyContactNo() {
        return $this->emergencyContactNumber;
    }

    /**
     * @param contactNo the contactNo to set
     */
    public function setEmergencyContactNo($contactNo) {
        $this->emergencyContactNumber = $contactNo;
    }

    /**
     * @return the contactNo
     */
    public function getEmergencyContactPerson() {
        return $this->emergencyContactPerson;
    }

    /**
     * @param contactNo the contactNo to set
     */
    public function setEmergencyContactPerson($contactP) {
        $this->emergencyContactPerson = $contactP;
    }

    /**
     * @return the address
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * @param address the address to set
     */
    public function setAddress($address) {
        $this->address = $address;
    }

    /**
     * @return the medicalCondition
     */
    public function getMedicalCondition() {
        return $this->medicalCondition;
    }

    /**
     * @param address the address to set
     */
    public function setMedicalCondition($mc) {
        $this->medicalCondition = $mc;
    }

    /**
     * @return the bloodGroup
     */
    public function getBloodGroup() {
        return $this->bloodGroup;
    }

    /**
     * @param bloodGroup the bloodGroup to set
     */
    public function setBloodGroup($mc) {
        $this->bloodGroup = $mc;
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