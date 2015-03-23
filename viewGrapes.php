<?php
require_once 'Connection.php';
require_once 'GrapeTableGateway.php';


require 'ensureUserLoggedIn.php';

if (isset($_GET)&& isset($_GET['sortOrder'])){
    $sortOrder = $_GET['sortOrder'];
    $columnNames = array("grapeType","nameGrapeType","country","description");
        if(!in_array($sortOrder,$columnNames)){
            $sortOrder='nameGrapeType';
        }
}
else{
    $sortOrder='nameGrapeType';
} 

$connection = Connection::getInstance();
$grapeGateway = new GrapeTableGateway($connection);

$grapes = $grapeGateway->getGrapes($sortOrder);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/grape.js"></script>
        <?php require "styles.php" ?>
        <title>The Wine Cellar</title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        <div class="container">
            <h2>View Grapes</h2>
            <?php
            if (isset($message)) {
                echo '<p>'.$message.'</p>';
            }
            ?>
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
                    <?php
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
            <p><a href="createGrapeForm.php">Create Grape</a></p>
        </div>
        <?php require 'footer.php'; ?>
        <?php require 'scripts.php'; ?>
    </body>
</html>