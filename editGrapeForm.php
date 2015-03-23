<?php
require_once 'Connection.php';
require_once 'GrapeTableGateway.php';
require_once 'WineTableGateway.php';

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
$gateway = new GrapeTableGateway($connection);
$wineGateway = new WineTableGateway($connection);

$statement = $gateway->getGrapeById($id);
if ($statement->rowCount() !== 1) {
    die("Illegal request");
}

$grape = $grapes->fetch(PDO::FETCH_ASSOC);

$wine = $wineGateway->getWines();


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>The Wine Cellar</title>
        <?php require "styles.php" ?>
        <script type="text/javascript" src="js/grape.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        <div class="container">
            <h1>Edit Grape Form</h1>
            <?php
            if (isset($errorMessage)) {
                echo '<p>Error: ' . $errorMessage . '</p>';
            }
            ?>
            <form id="editGrapeForm" name="editGrapeForm" action="editGrape.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <table border="0">
                    <tbody>
                        <tr>
                            <td>Grape Type: </td>
                            <td>
                                <input type="text" name="grapeType" value="<?php
                                    if (isset($_POST) && isset($_POST['grapeType'])) {//gets the input from the user, and keeps it in the input field so that they don’t have to retype it
                                        echo $_POST['grapeType'];
                                    }
                                    else echo $row['grapeType'];
                                ?>" />
                                <span id="grapeTypeError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['grapeType'])) {
                                        echo $errorMessage['grapeType'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Name Grape Type:</td>
                            <td>
                                <input type="text" name="nameGrapeType" value="<?php
                                    if (isset($_POST) && isset($_POST['nameGrapeType'])) {
                                        echo $_POST['nameGrapeType'];
                                    }
                                    else echo $row['nameGrapeType'];
                                ?>" />
                                <span id="nameGrapeTypeError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['nameGrapeType'])) {
                                        echo $errorMessage['nameGrapeType'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Country: </td>
                            <td>
                                <input type="text" name="country" value="<?php
                                    if (isset($_POST) && isset($_POST['country'])) {
                                        echo $_POST['country'];
                                    }
                                    else echo $row['country'];
                                ?>" />
                                <span id="countryError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['country'])) {
                                        echo $errorMessage['country'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
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
                                <input type="submit" value="Update Grape" name="updateGrape" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        <?php require 'scripts.php'; ?>
        <?php require 'footer.php'; ?>
    </body>
</html>
