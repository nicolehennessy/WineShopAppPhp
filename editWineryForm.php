<?php

require_once 'Connection.php';
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
$gateway = new WineryTableGateway($connection);

$statement = $gateway->getWineryById($id);
if ($statement->rowCount() !== 1) {
    die("Illegal request");
}

$row = $statement->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <?php require "styles.php" ?>
        <title>The Wine Cellar</title>
        <script type="text/javascript" src="js/winery.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        <h1>Edit Winery Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="editWineryForm" name="editWineryForm" action="editWinery.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <table border="0">
                <tbody>
                    <tr>
                        <td>Winery Name</td>
                        <td>
                            <input type="text" name="wineryName" value="<?php
                                if (isset($_POST) && isset($_POST['wineryName'])) {//gets the input from the user, and keeps it in the input field so that they don’t have to retype it
                                    echo $_POST['wineryName'];
                                }
                                else echo $row['wineryName'];
                            ?>" />
                            <span id="wineryNameError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['wineryName'])) {
                                    echo $errorMessage['wineryName'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <input type="text" name="address" value="<?php
                                if (isset($_POST) && isset($_POST['address'])) {
                                    echo $_POST['address'];
                                }
                                else echo $row['address'];
                            ?>" />
                            <span id="addressError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['address'])) {
                                    echo $errorMessage['address'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Contact Name</td>
                        <td>
                            <input type="text" name="contactName" value="<?php
                                if (isset($_POST) && isset($_POST['contactName'])) {
                                    echo $_POST['contactName'];
                                }
                                else echo $row['contactName'];
                            ?>" />
                            <span id="contactNameError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['contactName'])) {
                                    echo $errorMessage['contactName'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Phone No.</td>
                        <td>
                            <input type="text" name="phoneNo" value="<?php
                                if (isset($_POST) && isset($_POST['phoneNo'])) {
                                    echo $_POST['phoneNo'];
                                }
                                else echo $row['phoneNo'];
                            ?>" />
                            <span id="phoneNoError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['phoneNo'])) {
                                    echo $errorMessage['phoneNo'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="text" name="email" value="<?php
                                if (isset($_POST) && isset($_POST['email'])) {
                                    echo $_POST['email'];
                                }
                                else echo $row['email'];
                            ?>" />
                            <span id="emailError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['email'])) {
                                    echo $errorMessage['email'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Web Address</td>
                        <td>
                            <input type="text" name="webAddress" value="<?php
                                if (isset($_POST) && isset($_POST['webAddress'])) {
                                    echo $_POST['webAddress'];
                                }
                                else echo $row['email'];
                            ?>" />
                            <span id="webAddressError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['webAddress'])) {
                                    echo $errorMessage['webAddress'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Update Winery" name="updateWinery" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
        <?php require 'footer.php'; ?>
        <?php require "scripts.php" ?>
    </body>
</html>
