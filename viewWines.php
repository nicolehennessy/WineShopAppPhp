<?php

require_once 'Connection.php';
require_once 'WineTableGateway.php';

require 'ensureUserLoggedIn.php';

if (isset($_GET)&& isset($_GET['sortOrder'])){
    $sortOrder = $_GET['sortOrder'];
    $columnNames = array("name","yearMade","type","tempurature","description","wineryName");
        if(!in_array($sortOrder,$columnNames)){
            $sortOrder='name';
        }
}
else{
    $sortOrder='name';
}    

if (isset($_GET)&& isset($_GET['filterName'])){
    $filterName = filter_input(INPUT_GET, 'filterName',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}
else{
    $filterName = NULL;
}

$connection = Connection::getInstance();
$gateway = new WineTableGateway($connection);

$statement = $gateway->getWines($sortOrder, $filterName);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <?php require "styles.php" ?>
        <script type="text/javascript" src="js/wine.js"></script>
        <title>The Wine Cellar</title>
    </head>
    <body>
        <?php require 'toolbar.php' ?><!--Requires the toolbar.php-->
        <?php require 'header.php' ?>
        
        <div class="container">
            <div class = "row">
                <h2>View Wine Details</h2>
                <?php 
                if (isset($message)) {
                    echo '<p>'.$message.'</p>';
                }
                ?>
            </div>
            
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
            
            <div class = "row">
                <div class="col-md-5">
                    <form class="form-horizontal" role="form" action="viewWines.php?sortOrder=<?php echo $sortOrder; ?>" method="GET">
                    <div class="form-group">
                            <label class="control-label" for="filterName">Filter By: Name</label>
                            <div>
                                <input type="text"
                                       name="filterName"
                                       class="form-control"
                                       value="<?php echo $filterName;?>" /><!--Remembers input from the user-->
                            </div>
                    </div>
                </div>
                    <div class="form-group">
                        <label class="control-label"></label>
                            <div class="col-sm-3">
                                <button type="submit" name="filterBtn" id="filterBtn" class="btn btn-success">Filter</button>
                            </div>
                    </form>
                </div>
                        
                <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th><a href="viewWines.php?sortOrder=name">Name</a></th>
                            <th><a href="viewWines.php?sortOrder=yearMade">Year Made</a></th>
                            <th><a href="viewWines.php?sortOrder=type">Type</a></th>
                            <th><a href="viewWines.php?sortOrder=tempurature">Tempurature</a></th>
                            <th><a href="viewWines.php?sortOrder=description">Description</a></th>
                            <th><a href="viewWines.php?sortOrder=wineryName">Winery</a></th>
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
               <p><a href="createWineForm.php"><h2>Create Wine</h2><img src="Images/add.png" class="img-responsive"></a>
            </div>
        </div>   
            <?php require 'footer.php'; ?>
            <?php require 'scripts.php'; ?>
    </body>
</html>

