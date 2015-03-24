<?php
//allows the user to view wine
require_once 'Connection.php';//requies the Connection.php
require_once 'WineTableGateway.php';//requies the WineTableGateway.php
//require_once 'GrapeTableGateway.php';

$session_id = session_id();
if ($session_id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';//ensures the user has logged in 

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();//Connects to the database
$wineGateway = new WineTableGateway($connection);
//$grapeGateway = new GrapeTableGateway($connection);

$wines = $wineGateway->getWineById($id);
//$grapes = $grapeGateway->getGrapesByWineId($id);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
         <?php require "styles.php" ?>
        <title>The Wine Cellar</title>
        <link rel="stylesheet" type="text/css" href=Css/style.css>
    </head>
    <body>
        <?php require 'toolbar.php' ?><!--Requires the toolbar.php-->
        <?php require 'header.php' ?>
        <div class="container">
            <h2>View Wine Details</h2>
            <?php 
            if (isset($message)) {
                echo '<p>'.$message.'</p>';
            }
            ?>
            <table class="table table-striped table-responsive">
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
                <p>
                <a href="viewWine.php?id=<?php echo $wine['id']; ?>"><!--links to the viewWine.php-->
                    View Wine</a>
                <a href="editWineForm.php?id=<?php echo $wine['id']; ?>"><!--links to the editWineForm.php-->
                    Edit Wine</a>
                <a href="deleteWine.php?id=<?php echo $wine['id']; ?>"><!--links to the deleteWine.php-->
                    Delete Wine</a>
            </p>
            </table>
            
            <!--<h2>Grapes Assigned to <php echo $wine['name']?></h2>
            <php if ($grapes->rowCount() !==0) {?>
                <table class="table-striped">
                    <thead>
                        <tr>
                            <th>Grape Type</th>
                            <th>Name of Grape Type</th>
                            <th>Country of Origin</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        php
                        $row = $grapes->fetch(PDO::FETCH_ASSOC);
                        while ($row) {
                            echo '<td>' . $row['grapeType'] . '</td>';
                            echo '<td>' . $row['nameGrapeType'] . '</td>';
                            echo '<td>' . $row['country'] . '</td>';
                            echo '<td>' . $row['description'] . '</td>';
                            echo '<td>'
                            . '<a href="viewGrape.php?id='.$row['id'].'">View</a> '
                            . '<a href="editGrapeForm.php?id='.$row['id'].'">Edit</a> '
                            . '<a class="deleteGrape" href="deleteGrape.php?id='.$row['id'].'">Delete</a> '
                            . '</td>';
                            echo '</tr>';

                            $row = $grapes->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                    </tbody>
                </table>
            <php }else {?>
                <p>There are no grapes assigned to this wine.</p>
            <php }?>-->
        </div>
        <?php require 'footer.php';?>
        <?php require 'scripts.php'; ?>
    </body>
</html>
