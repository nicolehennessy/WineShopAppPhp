<?php

require_once 'Connection.php';
require_once 'UserTableGateway.php';
require_once 'lib/password.php';

$connection = Connection::getInstance();

$gateway = new UserTableGateway($connection);

$id = session_id();
if ($id == "") {
    session_start();
}

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

$errorMessage = array();
if ($username === FALSE || $username === '') {
    $errorMessage['username'] = 'Username must not be blank<br/>';
}
else {
    // execute a query to see if username is in the database
    $statement = $gateway->getUserByUsername($username);

    // if the username is in the database then add an error message
    // to the errorMessage array
    if ($statement->rowCount() !== 0) {
        $errorMessage['username'] = 'Username already registered<br/>';
    }
}
if ($password === FALSE || $password === '') {
    $errorMessage['password'] = 'Password must not be blank<br/>';
}

if ($password2 === FALSE || $password2 === '') {
    $errorMessage['password2'] = 'Password2 must not be blank<br/>';
}
else if ($password !== $password2) {
    $errorMessage['password2'] = 'Passwords must match<br/>';
}

if ($email === FALSE || $email === '') {
    $errorMessage['email'] = 'Email must not be blank<br/>';
}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errorMessage['email'] = 'Invalid email format<br/>';
}


if (empty($errorMessage)) {
    //$hash = password_hash($password, PASSWORD_BCRYPT);
    //$gateway->insertUser($username, $hash, $email);
    $gateway->insertUser($username, $password, $email);
    $_SESSION['username'] = $username;
    header('Location: home.php');
}
else {
    require 'registerForm.php';
}