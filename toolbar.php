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
?>
<nav class = "navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class ="container">
        <div class = "navbar-header page-scroll">
            <a class="navbar-brand" href="index.php">
                    <img class = "logo img-responsive" alt="Brand" src="images/logo.png">
            </a>
            <button type = "button" class="navbar-inverse navbar-toggle" data-toggle="collapse" data-target="#collapse"><!--Collapses the menu for smaller screens-->
                    <span class = "sr-only">ToggleNavigation</span>
                    <span class = "icon-bar"></span>
                    <span class = "icon-bar"></span>
                    <span class = "icon-bar"></span>
            </button>
        </div>
        <div class = "collapse navbar-collapse" id = "collapse"><!--Controls main Navigation-->
            <ul class = "nav navbar-nav navbar-right">
                <li class="active"><a href="home.php" >HOME</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">TABLES<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="viewWines.php">Wine</a></li>
                            <li><a href="viewWinerys.php">Winery</a></li>
                            <li><a href="viewGrapes.php">Grape</a></li>
                        </ul>
                    </li>
                    <li class="text-uppercase"><a href="register.php">Sign Up</a></li>
                    <li class="text-uppercase"><a href="login.php">Sign In</a></li>
                    <li class="text-uppercase"><a href="logout.php">Sign Out</a></li>
            </ul>
        </div>
    </div>
</nav>