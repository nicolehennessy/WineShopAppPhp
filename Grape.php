<?php
class Grape {//calls this class on other pages
    private $id;//creates an object called id
    private $grapeType;
    private $nameGrapeType;
    private $country;
    private $description;
    
    public function __construct($id,$gt,$ngt,$con,$descrip) {//this creates a new simpleXMLElement
        $this->id = $id;//stores name in also in $id
        $this->grapeType = $gt;
        $this->nameGrapeType = $ngt;
        $this->country = $con;
        $this->description = $descrip;
        
    }
    
    public function getGrapeByID() { return $this->id; }//returns input id
    public function getGrapeType() { return $this->grapeType; }
    public function getNameGrapeType() { return $this->nameGrapeType; }
    public function getCountry() { return $this->country; }
    public function getDescriptionOfGrape() { return $this->description; }
}
