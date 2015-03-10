<?php
//ensures the user is logged in

$id = session_id();
if ($id == "") {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: loginForm.php");//If they have not logged in it brings the user to the login page
}


