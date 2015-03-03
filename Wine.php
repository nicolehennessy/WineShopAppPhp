<?php
class Wine {//calls this class on other pages
    private $id;//creates an object called id
    private $name;//creates an object called name
    private $yearMade;//creates an object called yearMade
    private $type;//creates an object called type
    private $tempurature;//creates an object called tempurature
    private $description;//creates an object called description
    
    public function __construct($id, $n, $y, $ty, $t, $d) {//this creates a new simpleXMLElement
        $this->id = $id;//stores name in also in $id
        $this->name = $n;//stores name in also in $n
        $this->yearMade = $y;//stores name in also in $y
        $this->type = $ty;//stores name in also in $ty
        $this->tempurature = $t;//stores name in also in $t
        $this->description = $d;//stores name in also in $d
    }
    
    public function getWineID() { return $this->id; }//returns input id
    public function getName() { return $this->name; }//returns input name
    public function getYearMade() { return $this->yearMade; }//returns input yearMade
    public function getType() { return $this->type; }//returns input type
    public function getTempurature() { return $this->tempurature; }//returns input tempurature
    public function getDescription() { return $this->description; }//returns input description
}
