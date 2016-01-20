<?php namespace App\Domain;

/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 12/30/2015
 * Time: 12:26 AM
 */
class Equipment
{
    private $itemNo;
    private $type;
    private $purchaseDate = null;
    private $availability;
    private $purchasePrice = null;
    private $condition;
    private $sportName;

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
     * @return the type
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @param type the type to set
     */
    public function setType($type) {
        $this->type = $type;
    }

    /**
     * @return the purchaseDate
     */
    public function getPurchaseDate() {
        return $this->purchaseDate;
    }

    /**
     * @param purchaseDate the purchaseDate to set
     */
    public function setPurchaseDate($purchaseDate) {
        if($purchaseDate!='')
            $this->purchaseDate = $purchaseDate;
    }

    /**
     * @return the purchaseType
     */
    public function getPurchasePrice() {
        return $this->purchasePrice;
    }

    /**
     * @param purchaseType the purchaseType to set
     */
    public function setPurchasePrice($purchasePrice) {
        if($purchasePrice!=''){
            $this->purchasePrice = $purchasePrice;
        }
    }

    /**
     * @return the condition
     */
    public function getCondition() {
        return $this->condition;
    }

    /**
     * @param condition the condition to set
     */
    public function setCondition($condition) {
        $this->condition = $condition;
    }

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

    /**
     * @return the availability
     */
    public function isAvailable() {
        return $this->availability;
    }

    /**
     * @param availability the availability to set
     */
    public function setAvailability($availability) {
        $this->availability = $availability;
    }
}