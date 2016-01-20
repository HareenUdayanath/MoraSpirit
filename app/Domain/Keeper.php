<?php namespace App\Domain;

/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 12/30/2015
 * Time: 12:27 AM
 */
class Keeper extends User{
    private $resourceName;

        /**
         * @return the resource
         */
    public function getResourceName() {
        return $this->resourceName;
    }

    /**
     * @param resource the resource to set
     */
    public function setResourceName($resourceName) {
        $this->resourceName = $resourceName;
    }
}