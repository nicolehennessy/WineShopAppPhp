<?php

require_once 'Connection.php';//requires the connection file to connect to the db
require_once 'WineryTableGateway.php';/////requires the WineryTableGateway to read the wines

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$wineryGateway = new ManagerTableGateway($connection);

$winerys = $wineryGateway->getWinerys();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/wine.js"></script>
        <title>The Wine Cellar</title>
    </head>
    <body>
        <?php require 'toolbar.php'?>
        <?php require 'header.php'?>
        <?php require 'mainMenu.php'?>
        <h2>View Winery's</h2>
        <?php
        if (isset($message)){
            echo '<p>'.$message.'</p>';
        }
        ?>
        <table>
            <thead>
                <tr>
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
                    
                    echo '<td>'.row['wineryName'].'</td>';
                    echo '<td>'.row['address'].'</td>';
                    echo '<td>'.row['contactName'].'</td>';
                    echo '<td>'.row['phoneNo'].'</td>';
                    echo '<td>'.row['email'].'</td>';
                    echo '<td>'.row['webAddress'].'</td>';
                    echo '<td>'
                    .'<a href="viewWiney.php?id='.$row['wineryId'].'">View</a>'
                    .'<a href="editWiney.php?id='.$row['wineryId'].'">Edit</a>'
                    .'<a class="deleteWinery" href="deleteWiney.php?id='.$row['wineryId'].'">Delete</a>'
                    .'</td>';
                    echo '</tr>';
                    
                    $row = $winerys->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <p><a href="createWineryForm.php">Create Winery</a></p>
        <?php require 'footer.php;' ?>
    </body>
</html>

