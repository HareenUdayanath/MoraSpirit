<?php namespace App\Domain;

/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 12/30/2015
 * Time: 12:26 AM
 */
class Coach extends User{
    private $sportName;

    /**
     * @return the sportID
     */
    public function getSportName() {
        return $this->sportName;
    }

    /**
     * @param sportName the sportID to set
     */
    public function setSportName($sportName) {
        $this->sportName = $sportName;
    }
}