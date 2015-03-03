<?php//allows a new user to register
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
$password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING);//Makes sure that users are unable to hack your code

$errorMessage = array();
if ($username === FALSE || $username === '') {
    $errorMessage['username'] = 'Username must not be blank<br/>';//Outputs this error message if the username is blank
}
else {
    // execute a query to see if username is in the database
    $statement = $gateway->getUserByUsername($username);
    
    // if the username is in the database then add an error message
    // to the errorMessage array
    if ($statement->rowCount() !== 0) {
        $errorMessage['username'] = 'Username already registered<br/>';//Outputs this error message if the username is already registered
    }
}

if ($password === FALSE || $password === '') {
    $errorMessage['password'] = 'Password must not be blank<br/>';//Outputs this error message if the password is blank
}

if ($password2 === FALSE || $password2 === '') {
    $errorMessage['password2'] = 'Password2 must not be blank<br/>';//Outputs this error message if the password2 is blank
}
else if ($password !== $password2) {
    $errorMessage['password2'] = 'Passwords must match<br/>';//Outputs this error message if the passwords do not match
}

if (empty($errorMessage)) {
    $gateway->insertUser($username, $password);
    $_SESSION['username'] = $username;
    header('Location: home.php');//Brings the user to the home page if successful
}
else {
    require 'register.php';//Reloads the register page if the user is unsuccessful
}










