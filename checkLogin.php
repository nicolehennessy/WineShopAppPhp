<?php
require_once 'User.php';
require_once 'Connection.php';
require_once 'UserTableGateway.php';

$connection = Connection::getInstance();

$gateway = new UserTableGateway($connection);

$id = session_id();
if ($id == "") {
    session_start();
}

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);//Makes sure that users are unable to hack your code
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);//Makes sure that users are unable to hack your code

$errorMessage = array();
if ($username === FALSE || $username === '') {
    $errorMessage['username'] = 'Username must not be blank<br/>';//Outputs this error message if the username is blank
}

if ($password === FALSE || $password === '') {
    $errorMessage['password'] = 'Password must not be blank<br/>';//Outputs this error message if the password is blank
}

if (empty($errorMessage)) {
    $statement = $gateway->getUserByUsername($username);
    if ($statement->rowCount() != 1) {
        $errorMessage['username'] = 'Username not registered<br/>';//Outputs this error message if the username is not registered
    }
    else if ($statement->rowCount() == 1) {
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if ($password !== $row['password']) {
            $errorMessage['password'] = 'Invalid password<br/>';//Outputs this error message if the password is invalid
        }
    }
}

if (empty($errorMessage)) {
    $_SESSION['username'] = $username;
    header('Location: home.php');//brings you to the home page
}
else {
    require 'login.php';//brings you to the login page if you are unsuccessful
}










