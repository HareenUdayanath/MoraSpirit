<?php namespace App\Domain;

/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 12/30/2015
 * Time: 12:27 AM
 */
class Keeper extends User{
    private $resource;

        /**
         * @return the resource
         */
    public function getResource() {
        return $this->resource;
    }

    /**
     * @param resource the resource to set
     */
    public function setResource($resource) {
        $this->resource = $resource;
    }
}