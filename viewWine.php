<?php
//allows the user to view wine
require_once 'Wine.php';//requies the Wine.php
require_once 'Connection.php';//requies the Connection.php
require_once 'WineTableGateway.php';//requies the WineTableGateway.php

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';//ensures the user has logged in 

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();//Connects to the database
$wineGateway = new WineTableGateway($connection);

$wines = $wineGateway->getWineById($id);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>The Wine Cellar</title>
        <link rel="stylesheet" type="text/css" href=Css/style.css>
    </head>
    <body>
        <?php require 'toolbar.php' ?><!--Requires the toolbar.php-->
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        <h2>View Wine Details</h2>
        <?php 
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <table>
            <tbody>
                <?php
                    $wine = $wines->fetch(PDO::FETCH_ASSOC);//Displays the information in a row
                    echo '<tr>';
                    echo '<td>ID</td>'
                    . '<td>' . $wine['id'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Name</td>'
                    . '<td>' . $wine['name'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Year Made</td>'
                    . '<td>' . $wine['yearMade'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Type</td>'
                    . '<td>' . $wine['type'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Tempurature</td>'
                    . '<td>' . $wine['tempurature'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Description</td>'
                    . '<td>' . $wine['description'] . '</td>';
                    echo '</tr>';
                ?>
            </tbody>
        </table>
        <p>
            <a href="editWineForm.php?id=<?php echo $wine['id']; ?>"><!--links to the editWineForm.php-->
                Edit Wine</a>
            <a href="deleteWine.php?id=<?php echo $wine['id']; ?>"><!--links to the deleteWine.php-->
                Delete Wine</a>
        </p>
    </body>
</html>
