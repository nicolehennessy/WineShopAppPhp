<?php
require_once 'Connection.php';
require_once 'WineryTableGateway.php';
require_once 'WineTableGateway.php';


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
$wineryGateway = new WineryTableGateway($connection);
$wineGateway = new WineTableGateway($connection);

$winerys = $wineryGateway->getWineryById($id);
$wines = $wineGateway->getWinesByWineryId($id);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/winery.js"></script>
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        <h2>View Winery Details</h2>
        <?php
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <table>
            <tbody>
                <?php
                $winery = $winerys->fetch(PDO::FETCH_ASSOC);
                echo '<tr>';
                echo '<td>Winery ID</td>'
                . '<td>' . $winery['id'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>Winery Name</td>'
                . '<td>' . $winery['wineryName'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>Winery Address</td>'
                . '<td>' . $winery['address'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>Winery Contact Name</td>'
                . '<td>' . $winery['contactName'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>Winery Phone No.</td>'
                . '<td>' . $winery['phoneNo'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>Winery Email</td>'
                . '<td>' . $winery['email'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>Winery Web Address</td>'
                . '<td>' . $winery['webAddress'] . '</td>';
                echo '</tr>';

                ?>
            </tbody>
        </table>
        <p>
            <a href="viewWinery.php?id=<?php echo $winery['id']; ?>">
                View Winery</a>
            <a href="editWineryForm.php?id=<?php echo $winery['id']; ?>">
                Edit Winery</a>
            <a class="deleteWinery" href="deleteWinery.php?id=<?php echo $winery['id']; ?>">
                Delete Winery</a>
        </p>
        <h3>Wine's Assigned to <?php echo $winery['wineryName']; ?></h3>
        <?php if ($wines->rowCount() !== 0) { ?>
            <table>
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
                    <?php
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
        <?php } else { ?>
            <p>There are no wines assigned to this winery.</p>
        <?php } ?>
        <?php require 'footer.php'; ?>
    </body>
</html>

