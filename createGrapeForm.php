<?php
require_once 'connection.php';
require_once 'GrapeTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';//requires the user to be logged in before proceeding

$conn = Connection::getInstance();
$grapeGateway = new GrapeTableGateway($conn);

$grapes = $grapeGateway->getGrapes();
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
        <?php require 'mainMenu.php' ?><!--Requires the toolbar.php-->
        <div class="container">
            <h1>Create Grape Form</h1>
            <?php 
            if (isset($errorMessage)) {
                echo '<p>Error: ' . $errorMessage . '</p>';//outputs error message
            }
            ?>
            <form action="createGrape.php" 
                  method="POST"
                  onsubmit="return validateWineDetails(this);"><!--Validates the input from the user-->
                <table border="0">
                    <tbody>
                        <tr>
                            <td>Grape Type: </td>
                            <td>
                                <input type="text" name="grapeType" value="<?php
                                if (isset($_POST) && isset($_POST['grapeType'])) {
                                //gets the input from the user, and keeps it in the input field so that they don’t have to retype it
                                        echo $_POST['grapeType'];
                                    }
                                ?>" />
                                <span id="grapeTypeError" class="error"><?php 
                                    if (isset($errorMessage) && isset($errorMessage['grapeType'])) {
                                        echo $errorMessage['grapeType'];
                                    }
                                    ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Name of Grape Type: </td>
                            <td>
                                <input type="text" name="nameGrapeType" value="<?php
                                if (isset($_POST) && isset($_POST['nameGrapeType'])) {
                                //gets the input from the user, and keeps it in the input field so that they don’t have to retype it
                                        echo $_POST['nameGrapeType'];
                                    }
                                ?>" />
                                <span id="nameGrapeTypeError" class="error"><?php 
                                    if (isset($errorMessage) && isset($errorMessage['nameGrapeType'])) {
                                        echo $errorMessage['nameGrapeType'];
                                    }
                                    ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Country of Origin: </td>
                            <td>
                                <input type="text" name="country" value="<?php
                                if (isset($_POST) && isset($_POST['country'])) {
                                //gets the input from the user, and keeps it in the input field so that they don’t have to retype it
                                        echo $_POST['country'];
                                    }
                                ?>" />
                                <span id="countryError" class="error"><?php 
                                    if (isset($errorMessage) && isset($errorMessage['country'])) {
                                        echo $errorMessage['country'];
                                    }
                                    ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Description: </td>
                            <td>
                                <input type="text" name="description" value="<?php
                                if (isset($_POST) && isset($_POST['description'])) {
                                //gets the input from the user, and keeps it in the input field so that they don’t have to retype it
                                        echo $_POST['description'];
                                    }
                                ?>" />
                                <span id="descriptionError" class="error"><?php 
                                    if (isset($errorMessage) && isset($errorMessage['description'])) {
                                        echo $errorMessage['description'];
                                    }
                                    ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="Create Grape" name="createGrape" />
                            </td>
                        </tr>
                    </tbody>
                </table>

            </form>
        </div>
        <?php require 'footer.php'; ?>
        <?php require 'scripts.php'; ?>
    </body>
</html>
