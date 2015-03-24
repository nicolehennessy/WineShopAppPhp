<?php

class GrapeTableGateway{
    private $connection;
    
    public function __construct($c){
        $this->connection = $c;
    }
    
    public function getGrapes(){
        //allows the user to view the grapes in the database using SQL
        //executea query to get all grapes
        $sqlQuery = "SELECT * FROM grapetype";

        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status){
            die("Could Not Retrieve Grapes");
        }

        return $statement;
    }
    
    /*public function getGrapesByWineId($wineId){
        //allows the user to view the grapes in the database using SQL
        //executea query to get all grapes
        $sqlQuery = "SELECT * FROM grapetype WHERE id = :id";
        
        $params = array(
            "wine_id" => $wineId
        );
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute($params);

        if (!$status){
            die("Could Not Retrieve Grapes");
        }

        return $statement;
    }*/
    
    public function getGrapeById($id){
    //allows the user to view a grape in the database by id using SQL
    // execute a query to get the grape with the specified id
        $sqlQuery = "SELECT * FROM grapetype WHERE id = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id"=>$id
        );
        $status = $statement->execute($params);
        
        if (!$status){
            die("Could not retrieve Grapes");
        }
        return $statement;
    }
    
    public function insertGrape($gt,$ngt,$con,$descrip){
        $sqlQuery = "INSERT INTO grapetype ".
                "(grapeName, address, contactName, phoneNo, email, webAddress) ".
                "VALUES (:grapeName, :address, :conatctName, :phoneNo, :email, :webAddress)";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array (
            "grapeType" => $gt,
            "nameGrapeType" => $ngt,
            "country" => $con,
            "description" => $descrip
        );
        
        echo '<pre>'; 
        print_r($params);
        print_r($_POST);
        print_r($sqlQuery);
        echo '</pre>';
        
        $status = $statement->execute($params);

        if (!$status) {
            die("Could not insert grape.");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }
    
    public function deleteGrape($id) {
        $sqlQuery = "DELETE FROM grapetype WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete grape");
        }

        return ($statement->rowCount() == 1);
    }
    
    public function updateGrape($id,$gt,$ngt,$con,$descrip) {
        $sqlQuery =
                "UPDATE grapetype SET " .
                "grapeType = :grapeType, " .
                "nameGrapeType = :nameGrapeType, " .
                "country = :country, " .
                "description = :description " .
                "WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id,
            "grapeType" => $gt,
            "nameGrapeType" => $ngt,
            "country" => $con,
            "description" => $descrip
        );

        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }
}
