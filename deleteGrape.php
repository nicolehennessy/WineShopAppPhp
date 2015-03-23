<?php
require_once 'Connection.php';//Requires the connection.php file
require_once 'GrapeTableGateway.php';//Requires the GrapeTableGateway.php file

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';//Requires the ensureUserLoggedIn.php file

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];//gets the id to delete the wine

$connection = Connection::getInstance();
$gateway = new GrapeTableGateway($connection);

$gateway->deleteGrape($id);

header("Location: viewGrapes.php");//When successful brings the user to the home page
?>