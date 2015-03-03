<?php

$id = session_id();
if ($id == "") {
    session_start();
}

$_SESSION['username'] = NULL;
unset($_SESSION['username']);

header("Location: login.php");//Brings the user to the log in page