<?php namespace App\Domain;

/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 12/30/2015
 * Time: 12:27 AM
 */
class Keeper extends User{
    private $resourceID;

        /**
         * @return the resource
         */
    public function getResourceID() {
        return $this->resourceID;
    }

    /**
     * @param resource the resource to set
     */
    public function setResource($resourceID) {
        $this->resourceID = $resourceID;
    }
}