<?php
require_once 'Connection.php';
require_once 'WineTableGateway.php';
require_once 'WineryTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';//requires the user to be logged in before proceeding

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new WineTableGateway($connection);
$wineryGateway = new WineryTableGateway($connection);

$statement = $gateway->getWineById($id);
if ($statement->rowCount() !== 1) {
    die("Illegal request");
}

$wine = $wines->fetch(PDO::FETCH_ASSOC);

$winery = $wineryGateway->getWinerys();


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>The Wine Cellar</title>
        <link rel="stylesheet" type="text/css" href=Css/style.css>
        <script type="text/javascript" src="js/wine.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        <h1>Edit Wine Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="editWineForm" name="editWineForm" action="editWine.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <table border="0">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name="name" value="<?php
                                if (isset($_POST) && isset($_POST['name'])) {//gets the input from the user, and keeps it in the input field so that they don’t have to retype it
                                    echo $_POST['name'];
                                }
                                else echo $row['name'];
                            ?>" />
                            <span id="emailError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['name'])) {
                                    echo $errorMessage['name'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Year Made</td>
                        <td>
                            <input type="text" name="yearMade" value="<?php
                                if (isset($_POST) && isset($_POST['yearMade'])) {
                                    echo $_POST['yearMade'];
                                }
                                else echo $row['yearMade'];
                            ?>" />
                            <span id="emailError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['yearMade'])) {
                                    echo $errorMessage['yearMade'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>
                            <input type="text" name="type" value="<?php
                                if (isset($_POST) && isset($_POST['type'])) {
                                    echo $_POST['type'];
                                }
                                else echo $row['type'];
                            ?>" />
                            <span id="mobileError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['type'])) {
                                    echo $errorMessage['type'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Tempurature</td>
                        <td>
                            <input type="text" name="tempurature" value="<?php
                                if (isset($_POST) && isset($_POST['tempurature'])) {
                                    echo $_POST['tempurature'];
                                }
                                else echo $row['tempurature'];
                            ?>" />
                            <span id="staffNumberError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['tempurature'])) {
                                    echo $errorMessage['tempurature'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <input type="text" name="description" value="<?php
                                if (isset($_POST) && isset($_POST['description'])) {
                                    echo $_POST['description'];
                                }
                                else echo $row['description'];
                            ?>" />
                            <span id="skillsError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['description'])) {
                                    echo $errorMessage['description'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Update Wine" name="updateWine" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
        <?php require 'footer.php'; ?>
    </body>
</html>
