<?php
session_start();
if(isset($_SESSION['mail']))
{
	header("HTTP/1.0 400 Bad Request");
	die();
}

include_once 'connections.php';
$msg = '';

if(isset($_POST['register']))
	{
		$email = mysql_real_escape_string($_POST['email']);
		$phone = intval($_POST['phone']);
		$password = md5(mysql_real_escape_string($_POST['password']));
		if(mysql_query("INSERT INTO users(email,password,phone) VALUES('$email','$password','$phone')"))
		{
			$_SESSION['mail']=$_POST['email'];
			header("Location: ProfileUpdate.php");
		}
		else
		{
			$msg = "Email-ID already Registered";
		}
	}

?>
<!DOCTYPE html>
<html >
  <head>
    <title>Signup</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="signup.css" rel="stylesheet">


		

   </head> 
   <body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a href="home.php"><img src="logo1.png" height="50px"></a>
            </div>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#" style="color:white;">Sign up</a>
                    </li>
					<li>
                        <a href="login.php" style="color:white;">Log in</a>
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
	
	<div class="body"></div>
		<div class="header">
			<a href="home.php"><div>Try<span>MyDish</span></div></a>
		</div>
		<br> 
		<form name="register" action="#" method="post" id="signForm">
		<div class="signup">
            <input type="email" class="form-control" placeholder="Your Email *" id="email" name="email" required>
			<br>
            <input type="number" class="form-control" placeholder="Your Phone *" id="phone" name="phone" required>
			<br>
            <input type="password" class="form-control" placeholder="Your Password(size>8) *" id="password" name="password" required>
			<br>
            <input type="password" class="form-control" placeholder="Enter Your Password again *" id="repassword" required>
			<br>
			<p style="color:red"><?php echo $msg; ?>
			<br>
            <input type="submit" name="register" value="Register"/><br>		
		</div>
		</form>
		</div>	
		
  </body>
</html>
