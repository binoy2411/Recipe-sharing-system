<?php
session_start();
if(isset($_SESSION['mail']))
{
	header("Location: MyProfile.php");
}
?>
<!doctype html>
<html>
<head>
<title>Try My Dish</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="home.css" rel="stylesheet">
</head>
<body >
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <img src="logo1.png" height="50px">
            </div>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="signup.php" style="color:Yellow;">Sign up</a>
                    </li>
					<li>
                        <a href="login.php" style="color:Yellow;">Log in</a>
                    </li>
                   
                </ul>
        </div>
    </nav>
	
	
	<nav class="navbar navbar-inverse navbar-fixed-bottom">
        <div class="container">
            <div class="navbar-header page-scroll">
                <br><span style="color:grey;">Copyright @ trymydish.com 2016-17</span>
            </div>
                <ul class="nav navbar-nav navbar-right">
				    <li>
                        <a href="#" style="color:white;">Privacy Policy</a>
                    </li> 
					<li>
                        <a href="#" style="color:white;">Terms Of use</a>
                    </li> 
                    <li>
                        <a href="team.html" style="color:white;">Meet Our Team</a>
                    </li> 
                </ul>
        </div>
    </nav>
	
	
	
	<div id="myCarousel" class="carousel slide">
	<br><br>
        <div class="carousel-inner" role="listbox">
            <div class="active item">
                <img src="img/corousel1.jpg" alt="Slide1" />
				    <div class="container">
                         <div class="carousel-caption">
                         <h1 style="color: #ffffff; font-family: 'Helvetica Neue', sans-serif; font-size: 30px; font-weight: bold; text-shadow:4px 4px 4px black">Ready to share your recipe </h1>
                         <h3 style="color: #ffffff; font-family: 'Open Sans', sans-serif; font-size: 25px; font-weight: 300; line-height: 32px;text-shadow:4px 4px 4px black">Think your version of the dish is the best??</h3>
						 <h4 style="color: #ffffff; font-family: 'Raleway',sans-serif; font-size: 23px; font-weight: 600;margin: 0 0 24px;text-shadow:4px 4px 4px black">Then upload it and let the rest of the world try it</h4>
                         </div>
                    </div>
            </div>
            <div class="item">
                <img src="img/corousel2.jpg" alt="Slide2" />
					<div class="container">
                         <div class="carousel-caption">     
						 <h1 style="color: #ffffff; font-family: 'Helvetica Neue', sans-serif; font-size: 35px; font-weight: 800;text-shadow:2px 2px 2px orange;color:black;">Chefs and Experts</h1>
                         <h3 style="color: #ffffff; font-family: 'Open Sans', sans-serif; font-size: 30px; font-weight: 400;text-shadow:2px 2px 2px black;color:orange">Follow the worlds best cooking experts and learn their special recipes and tips</h3>
						 <h4 style="color: #ffffff; font-family: 'Raleway',sans-serif; font-size: 27px; font-weight: 600; margin: 0 0 24px;text-shadow:1px 1px 1px white;color:red">Learn from the best</h4>
                         </div>
                    </div>
            </div>
            <div class="item">
                <img src="img/corousel3.jpg" alt="Slide3" />
				     <div class="container">
                         <div class="carousel-caption">
                         <h1 style="color: #ffffff; font-family: 'Helvetica Neue', sans-serif;font-size: 35px; font-weight: 800;text-shadow:2px 2px 2px orange;color:black;">In a cooking mood ?? </h1>
                         <h3 style="color: #ffffff; font-family: 'Open Sans', sans-serif;  font-size: 30px; font-weight: 400;text-shadow:2px 2px 2px black;color:orange ">Search amongst the thousands of the most delicious and exotic recipes for your favourite</h3>
						 <h4 style="color: #ffffff; font-family: 'Raleway',sans-serif;font-size: 27px; font-weight: 600; margin: 0 0 24px;text-shadow:1px 1px 1px white;color:red ">Unlimited Cuisines</h4>
                        </div>
                    </div>
            </div>
        <ol class="carousel-indicators">
             <li data-target="#myCarousel" data-slide-to="0" ></li>
             <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
             <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
             <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
             <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
             <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
             <span class="sr-only">Next</span>
        </a>
    </div>
	     <script src="js/jquery.js"></script>
	   <script src="js/bootstrap.min.js"></script>
	  
</body>
</html>