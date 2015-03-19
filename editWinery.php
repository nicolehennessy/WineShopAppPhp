<?php
require_once 'Winery.php';//requies the Winery.php
require_once 'Connection.php';//requies the Connection.php
require_once 'WineryTableGateway.php';//requies the WineryTableGateway.php

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

//echo '<pre>';
//print_r($_POST);
//echo '</pre>';
$connection = Connection::getInstance();
$gateway = new WineryTableGateway($connection);

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);//Makes sure that users are unable to hack your code. Int is used for whole numbers.
$idValid = filter_var($id, FILTER_VALIDATE_INT);
$wineryName = filter_input(INPUT_POST, 'wineryName', FILTER_SANITIZE_STRING);//Makes sure that users are unable to hack your code. String is used for characters.
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$contactName= filter_input(INPUT_POST, 'contactName', FILTER_SANITIZE_STRING);
$phoneNo= filter_input(INPUT_POST, 'phoneNo', FILTER_SANITIZE_STRING);
$email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$webAddress= filter_input(INPUT_POST, 'webAddress', FILTER_SANITIZE_STRING);

$errorMessage = array();
if ($wineryName == '') {
    $errorMessage['wineryName'] = 'Winery Name must not be blank<br/>';//displays an error message if its blank
}
if ($address == '') {
    $errorMessage['address'] = 'Address Made must not be blank<br/>';//displays an error message if its blank
}
if ($contactName == '') {
    $errorMessage['contactName'] = 'Contact Name must not be blank<br/>';//displays an error message if its blank
}
if ($phoneNo == '') {
    $errorMessage['phoneNo'] = 'PhoneNo must not be blank<br/>';//displays an error message if its blank
}
if ($email == '') {
    $errorMessage['email'] = 'Email must not be blank<br/>';//displays an error message if its blank
}
if ($webAddress == '') {
    $errorMessage['webAddress'] = 'Web Address must not be blank<br/>';//displays an error message if its blank
}

$gateway->updateWinery($id, $wineryName, $address, $contactName, $phoneNo, $email, $webAddress);

header('Location: viewWinerys.php');
