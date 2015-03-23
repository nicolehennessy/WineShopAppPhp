<?php
require_once 'Connection.php';//requies the Connection.php
require_once 'GrapeTableGateway.php';//requies the GrapeTableGateway.php

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

//echo '<pre>';
//print_r($_POST);
//echo '</pre>';
$connection = Connection::getInstance();
$gateway = new GrapeTableGateway($connection);

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);//Makes sure that users are unable to hack your code. Int is used for whole numbers.
$idValid = filter_var($id, FILTER_VALIDATE_INT);//Makes sure that users are unable to hack your code. Int is used for whole numbers.
$grapeType = filter_input(INPUT_POST, 'grapeType', FILTER_SANITIZE_STRING);//Makes sure that users are unable to hack your code. String is used for characters.
$nameGrapeType = filter_input(INPUT_POST, 'nameGrapeType', FILTER_SANITIZE_STRING);//Makes sure that users are unable to hack your code. Int is used for whole numbers.
$country= filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);//Makes sure that users are unable to hack your code. String is used for characters.
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);//Makes sure that users are unable to hack your code. String is used for characters.

$errorMessage = array();
if ($grapeType == '') {
    $errorMessage['grapeType'] = 'Grape Type must not be blank<br/>';//displays an error message if its blank
}
if ($nameGrapeType == '') {
    $errorMessage['nameGrapeType'] = 'Name Grape Type must not be blank<br/>';//displays an error message if its blank
}
if ($country == '') {
    $errorMessage['country'] = 'Country Name must not be blank<br/>';//displays an error message if its blank
}
if ($description == '') {
    $errorMessage['description'] = 'Description must not be blank<br/>';//displays an error message if its blank
}

$gateway->updateGrape($grapeType, $nameGrapeType, $country, $description);

header('Location: viewGrapes.php');
