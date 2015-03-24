<?php

require_once 'Connection.php';
//require_once 'WineTableGateway.php';
require_once 'GrapeTableGateway.php';


$sessionId = session_id();
if ($sessionId == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
//$wineGateway = new WineTableGateway($connection);
$grapeGateway = new GrapeTableGateway($connection);

//$wines = $wineGateway->getWineById($id);
$grapes = $grapeGateway->getGrapes();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/winery.js"></script>
        <?php require "styles.php" ?>
        <title>The Wine Cellar</title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        
        <div class="container">
            <h2>View Grape Details</h2>
            <?php
            if (isset($message)) {
                echo '<p>'.$message.'</p>';
            }
            ?>
            <table class="table table-striped table-responsive">
                <tbody>
                    <?php
                    $grape = $grapes->fetch(PDO::FETCH_ASSOC);
                    echo '<tr>';
                    echo '<td>Grape ID</td>'
                    . '<td>' . $grape['id'] . '</td>';
                    echo '</tr>';
                     echo '<td>Grape Type</td>'
                    . '<td>' . $grape['grapeType'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Name of Grape Type</td>'
                    . '<td>' . $grape['nameGrapeType'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Country of Origin</td>'
                    . '<td>' . $grape['country'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Description</td>'
                    . '<td>' . $grape['description'] . '</td>';
                    echo '</tr>';
                    ?>
                </tbody>
            </table>
            <p>
                <a href="viewGrape.php?id=<?php echo $grape['id']; ?>">
                    View Grape</a>
                <a href="editGrapeForm.php?id=<?php echo $grape['id']; ?>">
                    Edit Grape</a>
                <a class="deleteGrape" href="deleteGrape.php?id=<?php echo $grape['id']; ?>">
                    Delete Grape</a>
            </p>
            <!--<h3>Grape's Assigned to <php echo $wine['name']; ?></h3>
            <php if ($wines->rowCount() !== 0) { ?>
                <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Year Made</th>
                            <th>Type</th>
                            <th>Tempurature</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <php
                        $row = $wines->fetch(PDO::FETCH_ASSOC);
                        while ($row) {
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['yearMade'] . '</td>';
                            echo '<td>' . $row['type'] . '</td>';
                            echo '<td>' . $row['tempurature'] . '</td>';
                            echo '<td>' . $row['description'] . '</td>';
                            echo '<td>'
                            . '<a href="viewWine.php?id='.$row['id'].'">View</a> '
                            . '<a href="editWineForm.php?id='.$row['id'].'">Edit</a> '
                            . '<a class="deleteWine" href="deleteWine.php?id='.$row['id'].'">Delete</a> '
                            . '</td>';
                            echo '</tr>';

                            $row = $wines->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                    </tbody>
                </table>

            <php } else { ?>
                <p>There are no grapes assigned to this wine.</p>
            <php } ?>-->
         </div>
        <?php require 'footer.php'; ?>
        <?php require 'scripts.php'; ?>
    </body>
</html>

