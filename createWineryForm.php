<?php
require_once 'connection.php';
require_once 'WineryTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';//requires the user to be logged in before proceeding

$conn = Connection::getInstance();
$wineryGateway = new WineryTableGateway($conn);

$winerys = $wineryGateway->getWinerys();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>The Wine Cellar</title>
        <link rel="stylesheet" type="text/css" href=Css/style.css>
        <script type="text/javascript" src="js/winery.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?> 
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?><!--Requires the toolbar.php-->
        <h1>Create Winery Form</h1>
        <?php 
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';//outputs error message
        }
        ?>
        <form action="createWinery.php" 
              method="POST"
              onsubmit="return validateWineDetails(this);"><!--Validates the input from the user-->
            <table border="0">
                <tbody>
                    <tr>
                        <td>Name: </td>
                        <td>
                            <input type="text" name="wineryName" value="<?php
                            if (isset($_POST) && isset($_POST['wineryName'])) {
                            //gets the input from the user, and keeps it in the input field so that they don’t have to retype it
                                    echo $_POST['wineryName'];
                                }
                            ?>" />
                            <span id="nameError" class="error"><?php 
                                if (isset($errorMessage) && isset($errorMessage['wineryName'])) {
                                    echo $errorMessage['wineryName'];
                                }
                                ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Address: </td>
                        <td>
                            <input type="text" name="address" value="<?php
                            if (isset($_POST) && isset($_POST['address'])) {
                            //gets the input from the user, and keeps it in the input field so that they don’t have to retype it
                                    echo $_POST['address'];
                                }
                            ?>" />
                            <span id="addressError" class="error"><?php 
                                if (isset($errorMessage) && isset($errorMessage['address'])) {
                                    echo $errorMessage['address'];
                                }
                                ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Contact Name: </td>
                        <td>
                            <input type="text" name="contactName" value="<?php
                            if (isset($_POST) && isset($_POST['contactName'])) {
                            //gets the input from the user, and keeps it in the input field so that they don’t have to retype it
                                    echo $_POST['contactName'];
                                }
                            ?>" />
                            <span id="typeError" class="error"><?php 
                                if (isset($errorMessage) && isset($errorMessage['contactName'])) {
                                    echo $errorMessage['contactName'];
                                }
                                ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Phone No: </td>
                        <td>
                            <input type="text" name="phoneNo" value="<?php
                            if (isset($_POST) && isset($_POST['phoneNo'])) {
                            //gets the input from the user, and keeps it in the input field so that they don’t have to retype it
                                    echo $_POST['phoneNo'];
                                }
                            ?>" />
                            <span id="phoneNoError" class="error"><?php 
                                if (isset($errorMessage) && isset($errorMessage['phoneNo'])) {
                                    echo $errorMessage['phoneNo'];
                                }
                                ?></span>
                        </td>
                    </tr>
                    <tr>
                        <tr>
                        <td>Email: </td>
                        <td>
                            <input type="text" name="email" value="<?php
                            if (isset($_POST) && isset($_POST['email'])) {
                            //gets the input from the user, and keeps it in the input field so that they don’t have to retype it
                                    echo $_POST['email'];
                                }
                            ?>" />
                            <span id="emailError" class="error"><?php 
                                if (isset($errorMessage) && isset($errorMessage['email'])) {
                                    echo $errorMessage['email'];
                                }
                                ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Web Address: </td>
                        <td>
                            <input type="text" name="webAddress" value="<?php
                            if (isset($_POST) && isset($_POST['webAddress'])) {
                            //gets the input from the user, and keeps it in the input field so that they don’t have to retype it
                                    echo $_POST['webAddress'];
                                }
                            ?>" />
                            <span id="webAddressError" class="error"><?php 
                                if (isset($errorMessage) && isset($errorMessage['webAddress'])) {
                                    echo $errorMessage['webAddress'];
                                }
                                ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Create Winery" name="createWinery" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
        <?php require 'footer.php'; ?>
    </body>
</html>
