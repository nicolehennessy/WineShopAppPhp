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
        <?php require "styles.php" ?>
        <script type="text/javascript" src="js/wine.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?> 
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?><!--Requires the toolbar.php-->
        <div class="container">
            <h1>Create Wine Form</h1>
            <?php 
            if (isset($errorMessage)) {
                echo '<p>Error: ' . $errorMessage . '</p>';//outputs error message
            }
            ?>
            <form action="createWine.php" 
                  method="POST"
                  onsubmit="return validateWineDetails(this);"><!--Validates the input from the user-->
                <table border="0">
                    <tbody>
                        <tr>
                            <td>Name: </td>
                            <td>
                                <input type="text" name="name" value="<?php
                                if (isset($_POST) && isset($_POST['name'])) {//gets the input from the user, and keeps it in the input field so that they don’t have to retype it
                                        echo $_POST['name'];
                                    }
                                ?>" />
                                <span id="nameError" class="error"><?php 
                                    if (isset($errorMessage) && isset($errorMessage['name'])) {
                                        echo $errorMessage['name'];
                                    }
                                    ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Year Made: </td>
                            <td>
                                <input type="number" name="yearMade" value="<?php
                                if (isset($_POST) && isset($_POST['yearMade'])) {//gets the input from the user, and keeps it in the input field so that they don’t have to retype it
                                        echo $_POST['yearMade'];
                                    }
                                ?>
                                       " />
                                <span id="yearMadeError" class="error"><?php 
                                    if (isset($errorMessage) && isset($errorMessage['yearMade'])) {
                                        echo $errorMessage['yearMade'];
                                    }
                                    ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Type: </td>
                            <td>
                                <input type="text" name="type" value="<?php
                                if (isset($_POST) && isset($_POST['type'])) {//gets the input from the user, and keeps it in the input field so that they don’t have to retype it
                                        echo $_POST['type'];
                                    }
                                ?>" />
                                <span id="typeError" class="error"><?php 
                                    if (isset($errorMessage) && isset($errorMessage['type'])) {
                                        echo $errorMessage['type'];
                                    }
                                    ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Tempurature: </td>
                            <td>
                                <input type="number" name="tempurature" value="<?php
                                if (isset($_POST) && isset($_POST['tempurature'])) {//gets the input from the user, and keeps it in the input field so that they don’t have to retype it
                                        echo $_POST['tempurature'];
                                    }
                                ?>" />
                                <span id="tempuratureError" class="error"><?php 
                                    if (isset($errorMessage) && isset($errorMessage['tempurature'])) {
                                        echo $errorMessage['tempurature'];
                                    }
                                    ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Description: </td>
                            <td>
                                <input type="text" name="description" value="<?php
                                if (isset($_POST) && isset($_POST['description'])) {//gets the input from the user, and keeps it in the input field so that they don’t have to retype it
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
                            <td>Winery</td>
                            <td>
                                <select name="winery_id">
                                    <option value="-1">No winery</option>
                                    <?php
                                    $wy = $winerys->fetch(PDO::FETCH_ASSOC);
                                    while ($wy) {
                                        echo '<option value="' . $wy['id'] . '">' . $wy['wineryName'] . '</option>';
                                        $wy = $winerys->fetch(PDO::FETCH_ASSOC);
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="Create Wine" name="createWine" />
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
