<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require "styles.php" ?>
        <title>The Wine Cellar</title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <!--<?//php require 'header.php' ?>-->
        <!--<?//php require 'mainMenu.php' ?>-->
        
        <div id="imageSlide"class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				<Img src="images/jumboTron.jpg" alt="JumboTron" class = "img-responsive "/>
				<div class="carousel-caption">
					<h1 class ="text-uppercase hidden-xs">from the earth to your table</h1>
					<p class ="hidden-xs">Our wines are  blah blah blah blah blah.</p>
					<!--<button href="signUp.html" type="button" class="btn btn-success hidden-xs" >Sign Up</button>
					<button href="signIn.html" type="button" class="btn btn-success hidden-xs" >Sign In</button>-->
				</div>
			</div>
		<div class="item">
			<Img src="images/jumboTron2.jpg" alt="JumboTron2" class = "img-responsive"/>
			<div class="carousel-caption">
				<h1 class ="text-uppercase hidden-xs">from the earth to your table</h1>
					<p class ="hidden-xs">Our wines are  blah blah blah blah blah.</p>
					<!--<button href="signUp.html" type="button" class="btn btn-success hidden-xs" >Sign Up</button>
					<button href="signIn.html" type="button" class="btn btn-success hidden-xs" >Sign In</button>-->
			</div>
		</div>
		<div class="item">
			<Img src="images/jumboTron3.jpg" alt="JumboTron3" class = "img-responsive"/>
			<div class="carousel-caption">
				<h1 class ="text-uppercase hidden-xs">from the earth to your table</h1>
					<p class ="hidden-xs">Our wines are  blah blah blah blah blah.</p>
					<!--<button href="signUp.html" type="button" class="btn btn-success hidden-xs" >Sign Up</button>
					<button href="signIn.html" type="button" class="btn btn-success hidden-xs" >Sign In</button>-->
			</div>
		</div>
		<ol class="carousel-indicators">
			<li data-target="#imageSlide" data-slide-to="0" class="active"></li>
			<li data-target="#imageSlide" data-slide-to="1" ></li>
			<li data-target="#imageSlide" data-slide-to="2" ></li>
		</ol>
		</div>
	</div>
		
		<!--row 3-->
		<div class = "row">
			<div class="container">
				<div class="latestAC col-lg-12">
					<div class="latest col-md-4 col-sm-4 col-xs-6">
						<Img src="images/latest.jpg" alt="" class = "img-responsive"/>
						<h2>Latest</h2>
						<p>Magnis modipsae que lib voloratati andigen daepeditem quiate re porem aut labor. Laceaque quiae sitiorem rest non restibusaes maio es dem tumquam core posae volor remped modis volor.</p>
					</div>
					<div class="latest col-md-4 col-sm-4 col-xs-6">
						<Img src="images/alchol.jpg" alt="" class = "img-responsive"/>
						<h2>Alcohol Free</h2>
						<p>Loratati andigen daepeditem quiate re porem aut labor. Laceaque quiae sitiorem rest non restibusaes maio es dem tumquam core posae volor remped modis volor.</p>
					</div>
					<div class="latest col-md-4 col-sm-4 col-xs-6">
						<Img src="images/comp.jpg" alt="" class = "img-responsive"/>
						<h2>Compettition</h2>
						<p>Andigen daepeditem quiate re porem aut labor. Laceaque quiae sitiorem rest non restibusaes maio es dem tumquam core posae volor remped modis volor.Laceaque quiae sitiorem rest non restibusaes maio es dem tumquam core posae volor remped modis volor.</p>
					</div>
				</div>
				
			</div>
		</div>

		<!--row 4-->
		<div class="background ">
			<div class="container">
				<div class="check col-lg-12 text-center">
					<h1 class="text-center">Check Out Our Latest App</h1>
					<p class="text-center">Magnis modipsae que lib voloratati andigen daepeditem quiate re porem aut labor.</p>
					<div class="buttonCheck">
						<button  type="button" class="btn btn-default col-sm-4 col-sm-push-4 col-md-4 col-md-push-4  col-lg-push-5"><img class="ios"src="images/phone.png">IOS 8</button>
						<button  type="button" class="btn btn-default col-sm-4 col-sm-push-4 col-md-4 col-md-push-4  col-lg-push-5"><img class="ios"src="images/android.png">ANDROID</button>
					</div>
					<Img src="images/checkApp.png" alt="" class = "app img-responsive"/>
				</div>
			</div>
		</div>
		
		<!--row 5-->
		<div class="row">
			<div class="container">
				<div class="social col-lg-12 text-center">
					<h1 class="text-center text-capitalize">Follow us on social media</h1>
					<p class="text-center ">Magnis modipsae que lib voloratati andigen daepeditem quiate re porem aut labor. Mandigen daepeditem quiate re porem aut labor.</p>
                                        <div class="insta col-lg-4 col-md-4 col-md-push-4 col-sm-4 col-sm-push-4 col-xs-4 col-xs-push-4">
                                                <a href="https://instagram.com/"><Img src="images/instagram.png" alt="" class = "img-responsive"/></a>
                                        </div>
                                        <div class="insta col-lg-4 col-md-4 col-md-push-4 col-sm-4 col-sm-push-4 col-xs-4 col-xs-push-4">
                                                <a href="https://www.facebook.com/"><Img src="images/facebook.png" alt="" class = "img-responsive"/></a>
                                        </div>
                                        <div class="insta col-lg-4 col-md-4 col-md-push-4 col-sm-4 col-sm-push-4 col-xs-4 col-xs-push-4">
                                                <a href="https://twitter.com/"><Img src="images/twitter.png" alt="" class = "img-responsive"/></a>
                                        </div>
				</div>
			</div>
		</div>

        <?php require 'footer.php'; ?>
        <?php require 'scripts.php'; ?>
                
    </body>
</html>
