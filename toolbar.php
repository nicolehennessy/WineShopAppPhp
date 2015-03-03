<?php
$session_id = session_id();
if ($session_id == "") {
    session_start();
}
echo '<ul>';
if (isset($_SESSION['username'])) {
    echo '<li><a href="home.php">Home<a></li>';//Links you to the home page
    echo '<li><a href="logout.php">Logout</a></li>';//if you are already logged in it links you to the logout
}
else {
    echo '<li><a href="index.php">Home</a></li>';//Links you to the home page
    echo '<li><a href="login.php">Login</a></li>';//if you are not logged in it links to the login
}
echo '</ul>';