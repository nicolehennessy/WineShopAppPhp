<?php
class User {//calls this class on other pages
    private $username;//creates an object called username
    private $password;//creates an object called password
    
    public function __construct($u, $p) {//this creates a new simpleXMLElement
        $this->username = $u;//stores username in also in $u
        $this->password = $p;//stores password in also in $p
    }
    
    public function getUsername() {
        return $this->username;//returns input username
    }

    public function getPassword() {
        return $this->password;//returns input password
    }    
}
