<?php
require_once 'Connection.php';//Requires the connection.php file
require_once 'WineTableGateway.php';//Requires the wineTableGateway.php file

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
$gateway = new WineTableGateway($connection);

$gateway->deleteWine($id);

header("Location: viewWines.php");//When successful brings the user to the home page
?>