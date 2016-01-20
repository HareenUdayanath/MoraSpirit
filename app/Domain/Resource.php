<?php namespace App\Domain;

/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 12/30/2015
 * Time: 12:27 AM
 */
class Resource
{
    private $ID;
    private $name;
    private $location;

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
     * @return the name
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param name the name to set
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return the location
     */
    public function getLocation() {
        return $this->location;
    }

    /**
     * @param location the location to set
     */
    public function setLocation($location) {
        $this->location = $location;
    }

}