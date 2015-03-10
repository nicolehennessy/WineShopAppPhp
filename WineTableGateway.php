<?php
class WineTableGateway {//allows the user to get, insert, update and delete wine from the database
    
    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getWines() {//allows the user to view the wines in the database using SQL
        $sqlQuery = 'SELECT w.*, wy.name AS wineryName 
                 FROM wines w
                 LEFT JOIN winerys wy ON wy.id = w.winery_id';//This code joins the wine with the winery Table 
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            
            die('Could not retrieve wine details');//Outputs an error message
        }
        return $statement;
    }
    
    public function getWinesByWineryId($winery_Id) {//allows the user to view the wines in the database using SQL
        $sqlQuery = 'SELECT w.*, wy.name AS wineryName
                 FROM wines w
                 LEFT JOIN winerys wy ON wy.id = w.winery_id
                 Where w.winery_id = :wineryId';//Joins wine and winery table so in the table you can view the wine that belongs to a winery
        
        $params = array(
            'wineryId' => $winery_Id
        );
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute($params);
        
        if (!$status) {
            
            die('Could not retrieve wine details');//Outputs an error message
        }
        return $statement;
    }
    
    public function getWineById($id) {//allows the user to view a wine in the database by id using SQL
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT * FROM wine WHERE id = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve wine ID.");//Outputs an error message
        }
        
        return $statement;
    }
    
    public function insertWine($n, $y, $ty, $t, $d) {//allows the user to insert a wine in the database by id using SQL
        $sqlQuery = "INSERT INTO wine " .
                "(name, yearMade, type, tempurature, description) " .
                "VALUES (:name, :yearMade, :type, :tempurature, :description)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "name" => $n,
            "yearMade" => $y,
            "type" => $ty,
            "tempurature" => $t,
            "description" => $d,
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not insert wine");//Outputs an error message
        }
        
        $id = $this->connection->lastInsertID();
        
        return $id;
    }

    public function updateWine($id, $n, $y, $ty, $t, $d) {//allows the user to update a wine in the database by id using SQL
         $sqlQuery =
                "UPDATE wine SET " .
                "name = :name, " .
                "yearMade = :yearMade, " .
                "type = :type, " .
                "tempurature = :tempurature, " .
                "description = :description " .
                "WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id,
            "name" => $n,
            "yearMade" => $y,
            "type" => $ty,
            "tempurature" => $t,
            "description" => $d,
        );

        //echo '<pre>';
        //print_r($sqlQuery);
        //echo '</pre>';

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not update wine");//Outputs an error message
        }
        
        return ($statement->rowCount() == 1);
    }
    
    public function deleteWine($id) {//allows the user to delete a wine in the database by id using SQL
        $sqlQuery = "DELETE FROM wine WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete wine");//Outputs an error message
        }

        return ($statement->rowCount() == 1);
    }

}
