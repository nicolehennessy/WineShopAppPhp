<?php
require_once 'Connection.php';
require_once 'GrapeTableGateway.php';


require 'ensureUserLoggedIn.php';

/*if (isset($_GET)&& isset($_GET['sortOrder'])){
    $sortOrder = $_GET['sortOrder'];
    $columnNames = array("grapeType","nameGrapeType","country","description");
        if(!in_array($sortOrder,$columnNames)){
            $sortOrder='nameGrapeType';
        }
}
else{
    $sortOrder='nameGrapeType';
} */

$connection = Connection::getInstance();
$grapeGateway = new GrapeTableGateway($connection);

$grapes = $grapeGateway->getGrapes();
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
        
        <div class="container">
            <h2>View Grapes</h2>
            <?php
            if (isset($message)) {
                echo '<p>'.$message.'</p>';
            }
            ?>
            <div class = "rowIcon">
                <div class="container">
                    <div class="active wine col-md-3 col-sm-3 col-xs-3">
                        <a href="viewWines.php"><img class="img-responsive" src="Images/wine.png"></a>
                    </div>
                    <div class="winery col-md-3 col-sm-3 col-xs-3">
                        <a href="viewWinerys.php"><img class="img-responsive" src="Images/winery.png"></a>
                    </div>
                    <div class="grape col-md-3 col-sm-3 col-xs-3">
                        <a href="viewGrapes.php"><img class="img-responsive" src="Images/grapes1.png"></a>
                    </div>
                </div>
		</div>
		
		<!--row 4-->
		<div class = "rowIconText">
                    <div class="container">
                        <div class="wineText col-md-3 col-sm-3 col-xs-3">
                            <a href="viewWines.php"><h2>Wine Table</h2></a>
                        </div>
                        <div class="wineryText col-md-3 col-sm-3 col-xs-3">
                            <a href="viewWinerys.php"><h2>Winery Table</h2></a>
                        </div>
                        <div class="grapeText col-md-3 col-sm-3 col-xs-3">
                            <a href="viewGrapes.php"><h2>Grape Table</h2></a>
                        </div>
                    </div>
		</div>
            <table class="table table-striped table-responsive">
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
            <p><a href="createGrapeForm.php"><h2>Create Grape</h2><img src="Images/add.png" class="img-responsive"></a>
        </div>
        <?php require 'footer.php'; ?>
        <?php require 'scripts.php'; ?>
    </body>
</html>