<?php namespace App\Domain;

/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 12/30/2015
 * Time: 12:26 AM
 */
class Coach extends User{
    private $sportID;

    /**
     * @return the sportID
     */
    public function getSportID() {
        return $this->sportID;
    }

    /**
     * @param sportName the sportID to set
     */
    public function setSportID($sportID) {
        $this->sportID = $sportID;
    }
}