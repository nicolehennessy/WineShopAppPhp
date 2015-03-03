<?php

//links to the database of the college which is daneel

class Connection {
    private static $connection = NULL;
    // constructor
    public static function getInstance() {
        if (Connection::$connection === NULL) {
            $host = 'daneel'; 
            $database = 'N00131965'; 
            $username = 'N00131965'; //sets the correct username 
            $password = 'N00131965'; //sets the correct password 
            
            $dsn = 'mysql:dbname='.$database.";host=".$host;

            Connection::$connection = new PDO($dsn, $username, $password);//checks for the correct username and password 
            if (!Connection::$connection) {
                die("Could not connect to database!");
            }
        }
        
        return Connection::$connection;
    }
}





