<?php
//ini_set("display_errors", 1);displays possible errors with page

require_once 'Connection.php';//requires the connection file to connect to the db
require_once 'WineryTableGateway.php';/////requires the WineryTableGateway to read the wines

require 'ensureUserLoggedIn.php';

if (isset($_GET)&& isset($_GET['sortOrder'])){
    $sortOrder = $_GET['sortOrder'];
    $columnNames = array("wineryName","address","contactName","phoneNo","email","webAddress");
        if(!in_array($sortOrder,$columnNames)){
            $sortOrder='wineryName';
        }
}
else{
    $sortOrder='wineryName';
}    

$connection = Connection::getInstance();
$wineryGateway = new WineryTableGateway($connection);

$winerys = $wineryGateway->getWinerys($sortOrder);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <?php require "styles.php" ?>
        <script type="text/javascript" src="js/winery.js"></script>
        <title>The Wine Cellar</title>
    </head>
    <body>
         <?php require 'toolbar.php'?>
        <div class="container"> 
        <?php require 'header.php'?>
        <?php require 'mainMenu.php'?>
            <h2>View Winery's</h2>
            <?php
            if (isset($message)){
                echo '<p>'.$message.'</p>';
            }
            ?>
            <table class="table-striped">
                <thead>
                    <tr>
                        <th>Winery ID</th>
                        <th>Winery Name</th>
                        <th>Address</th>
                        <th>Contact Name</th>
                        <th>Phone No.</th>
                        <th>Email</th>
                        <th>Web Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $row = $winerys->fetch(PDO::FETCH_ASSOC);
                    while ($row){
                        echo '<tr>';
                        echo '<td>'.$row['id'].'</td>';
                        echo '<td>'.$row['wineryName'].'</td>';
                        echo '<td>'.$row['address'].'</td>';
                        echo '<td>'.$row['contactName'].'</td>';
                        echo '<td>'.$row['phoneNo'].'</td>';
                        echo '<td>'.$row['email'].'</td>';
                        echo '<td>'.$row['webAddress'].'</td>';
                        echo '<td>'
                        .'<a href="viewWinery.php?id='.$row['id'].'">View</a>'
                        .'<a href="editWinery.php?id='.$row['id'].'">Edit</a>'
                        .'<a class="deleteWinery" href="deleteWinery.php?id='.$row['id'].'">Delete</a>'
                        .'</td>';
                        echo '</tr>';

                        $row = $winerys->fetch(PDO::FETCH_ASSOC);
                    }
                    ?>
                </tbody>
            </table>
            <p><a href="createWineryForm.php">Create Winery</a></p>
        </div>
        
        <?php require 'footer.php'; ?>
        <?php require 'scripts.php'; ?>
    </body>
</html>

