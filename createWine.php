<?php//allows the user to create wine
require_once 'Connection.php';//requies the Connection.php
require_once 'WineTableGateway.php';//requies the WineTableGateway.php

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new WineTableGateway($connection);

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);//Makes sure that users are unable to hack your code. Int is used for whole numbers.
$idValid = filter_var($id, FILTER_VALIDATE_INT);//Makes sure that users are unable to hack your code. Int is used for whole numbers.
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);//Makes sure that users are unable to hack your code. String is used for characters.
$yearMade = filter_input(INPUT_POST, 'yearMade', FILTER_SANITIZE_NUMBER_INT);//Makes sure that users are unable to hack your code. Int is used for whole numbers.
$yearMadeValid = filter_var($yearMade, FILTER_VALIDATE_INT);//Makes sure that users are unable to hack your code. Int is used for whole numbers.
$type= filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);//Makes sure that users are unable to hack your code. String is used for characters.
$tempurature = filter_input(INPUT_POST, 'tempurature', FILTER_SANITIZE_NUMBER_INT);//Makes sure that users are unable to hack your code. String is used for characters.
$tempuratureValid = filter_var($tempurature, FILTER_VALIDATE_FLOAT);//Makes sure that users are unable to hack your code.Float is used here as it is a decimal number
$description= filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);//Makes sure that users are unable to hack your code. String is used for characters.

$errorMessage = array();
if ($name == '') {
    $errorMessage['name'] = 'Name must not be blank<br/>';//displays an error message if its blank
}
if ($yearMade == '') {
    $errorMessage['yearMade'] = 'Year Made must not be blank<br/>';//displays an error message if its blank
}
if ($type == '') {
    $errorMessage['type'] = 'Type must not be blank<br/>';//displays an error message if its blank
}
if ($tempurature == '') {
    $errorMessage['tempurature'] = 'Tempurature must not be blank<br/>';//displays an error message if its blank
}
if ($description == '') {
    $errorMessage['description'] = 'Description must not be blank<br/>';//displays an error message if its blank
}

$id = $gateway->insertWine($name, $yearMade, $type, $tempurature, $description);
$message = "Wine created successfully";

header('Location: viewWines.php'); //brings you to the home page if successful

