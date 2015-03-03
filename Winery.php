<?php
class Winery {//calls this class on other pages
    private $id;//creates an object called id
    private $wineryName;//creates an object called name
    private $address;//creates an object called address
    private $contactName;//creates an object called contactName
    private $phoneNo;//creates an object called phoneNo
    private $email;//creates an object called email
    private $webAddress;//creates an object called webAddress
    
    public function __construct($id,$wn,$a,$cn,$pn,$e,$wa) {//this creates a new simpleXMLElement
        $this->id = $id;//stores name in also in $id
        $this->wineryName = $wn;
        $this->address = $a;
        $this->contactName = $cn;
        $this->phoneNo = $pn;
        $this->email = $e;
        $this->webAddress = $wa;
        
    }
    
    public function getWineryID() { return $this->id; }//returns input id
    public function getWineryName() { return $this->wineryName; }
    public function getAddress() { return $this->address; }
    public function getContactName() { return $this->conatctName; }
    public function getPhoneNo() { return $this->phoneNo; }
    public function getEmail() { return $this->email; }
    public function getWebAddress() { return $this->webAddress; }
}
