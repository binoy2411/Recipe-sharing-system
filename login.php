<?php
session_start();
if(isset($_SESSION['mail']))
{
	header("HTTP/1.0 400 Bad Request");
	die();
}

include_once 'connections.php';
$errmsg = "";

if(isset($_POST['login']))
		{
			$logemail = mysql_real_escape_string($_POST['log_email']);
			$logpass = mysql_real_escape_string($_POST['log_password']);
			$logpass = md5($logpass);
			$x = mysql_query("SELECT * FROM users where email='$logemail' AND password='$logpass'");
			if((mysql_num_rows($x))>0)
				{
					$_SESSION['mail']=$_POST['log_email'];
					$errmsg = '';
					$y = mysql_query("SELECT firstname,lastname from users WHERE email='$logemail'");
					$y = mysql_fetch_assoc($y);
					$z = $y['firstname'];
					$zz = $y['lastname'];
					if($z=='')
						header("Location: ProfileUpdate.php");
					else
					{
						$_SESSION['uname'] = $z;
						$_SESSION['laname'] = $zz;
						header("Location: MyProfile.php");
					}
				}
			else
				{
					$errmsg = 'Invalid Email-ID and Password Combination!';
				}
}
?>
<!DOCTYPE html>
<html>
  <head>
   <title>Login</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="login.css" rel="stylesheet">


</head>

<body >

  		<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <img src="logo1.png" height="50px">
            </div>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="signup.php" style="color:white;">Sign up</a>
                    </li>
					<li>
                        <a href="#" style="color:white;">Log in</a>
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
			<a href="home.php"><div>Try<span>MyDish</span></div></a></div></a>
		</div>
		<br> <form name="login" action="#" method="post" id="loginForm">
		<div class="login">
				<input type="text" name="log_email" placeholder="username" name="user"><br><br>
				<input type="password" name="log_password"placeholder="password" name="password">
				<br><br>
				<p style="color:red"><?php echo $errmsg; ?>
				<br>
				<input type="submit" name="login" value="Login"><br>
				
		</div></form>

  </body>
</html>