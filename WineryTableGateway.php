<?php

class WineryTableGateway{//allows the user to get, insert, update and delete wine from the database
    private $connection;
    
    public function __construct($c){
        $this->connection = $c;
    }
    public function getWinerys(){//allows the user to view the winerys in the database using SQL
        //executea query to get all winerys
        $sqlQuery = "SELECT * FROM winerys";

        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status){
            die("Could Not Retrieve Winerys");
        }

        return $statement;
    }
    
    public function getWineryById($id){//allows the user to view a winery in the database by id using SQL
    // execute a query to get the winery with the specified id
        $sqlQuery = "SELECT * FROM winerys WHERE id = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id"=>$id
        );
        $status = $statement->execute($params);
        
        if (!$status){
            die("Could not retrieve Winery");
        }
        return $statement;
    }
    public function insertWinery($wn,$a,$cn,$pn,$e,$wa){
        $sqlQuery = "INSERT INTO winerys".
                "(wineryName, address, conatctName, phoneNo, email, webAddress)".
                "VALUES (:wineryName, :address, :conatctName, :phoneNo, :email, :webAddress)";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array (
            "wineryName" => $wn,
            "address" => $a,
            "conatctName" => $cn,
            "phoneNo" => $pn,
            "email" => $e,
            "webAddress" => $wa
        );
        
        $status = $statement->execute($params);

        if (!$status) {
            die("Could not insert winery");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }
    public function deleteWinery($id) {
        $sqlQuery = "DELETE FROM winerys WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete winery");
        }

        return ($statement->rowCount() == 1);
    }

    public function updateManager($id, $wn,$a,$cn,$pn,$e,$wa) {
        $sqlQuery =
                "UPDATE managers SET " .
                "name = :name, " .
                "office = :office, " .
                "extension = :extension " .
                "WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id,
            "wineryName" => $wn,
            "address" => $a,
            "conatctName" => $cn,
            "phoneNo" => $pn,
            "email" => $e,
            "webAddress" => $wa
        );

        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }
    
}
