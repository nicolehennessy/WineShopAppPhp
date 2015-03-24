<nav class = "navbar navbar-default navbar-fixed-top" role="navigation">
    <div class ="container">
        <div class = "navbar-header page-scroll">
            <a class="navbar-brand" href="index.php">
                    <img class = "logo img-responsive" alt="Brand" src="images/logo.png">
            </a>
            <button type = "button" class="navbar-default navbar-toggle" data-toggle="collapse" data-target="#collapse"><!--Collapses the menu for smaller screens-->
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