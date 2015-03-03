<?php

class UserTableGateway {//file creates a new user and checks if that user already exists in the database

    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getUserByUsername($username) {//returns a user object
        // execute a query to see if username is in the database
        $sqlQuery = "SELECT * FROM users WHERE username = :username";//SELECTs a user by username in the database by using an sql query
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "username" => $username
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve users");//If the code fails, this error message will show
        }
        
        return $statement;
    }
    
    public function insertUser($username, $password) {//adds a new user 
        $sqlInsert = "INSERT users(username, password) "//INSERTs a new user into the database
            . "VALUES (:username, :password)";
    
        $statement = $this->connection->prepare($sqlInsert);

        $params = array(
            "username" => $username,
            "password" => $password
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not insert new user");//If the code fails, this error message will show
        }
    }
}





