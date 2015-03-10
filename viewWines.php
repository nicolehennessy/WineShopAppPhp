<?php
require_once 'Connection';
require_once 'WineTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new WineTableGateway($connection);

$statement = $gateway->getWines();
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
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Year Made</th>
                    <th>Type</th>
                    <th>Tempurature</th>
                    <th>Description</th>
                    <th>Winery</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {
                    echo '<tr>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['yearMade'] . '</td>';
                    echo '<td>' . $row['type'] . '</td>';
                    echo '<td>' . $row['tempurature'] . '</td>';
                    echo '<td>' . $row['description'] . '</td>';
                    echo '<td>' . $row['wineryName'] . '</td>';
                    echo '<td>'
                    . '<a href="viewWine.php?id='.$row['id'].'">View</a> '
                    . '<a href="editWineForm.php?id='.$row['id'].'">Edit</a> '
                    . '<a class="deleteWine" href="deleteWine.php?id='.$row['id'].'">Delete</a> '
                    . '</td>';
                    echo '</tr>';

                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <p><a href="createWineForm.php">Create Wine</a></p>
        <?php require 'footer.php'; ?>
    </body>
    
</html>

