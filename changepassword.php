<?php
include_once "Profile.php";
$usermail = $_SESSION['mail'];
$info = mysql_query("SELECT * FROM users WHERE email='$usermail'");
$info = mysql_fetch_assoc($info);
$userpass = $info['password'];

$wrongpass = "";
$errmatch = "";
$errsame = "";

if(isset($_POST['changepass']))
{
	$input1 = mysql_real_escape_string($_POST['currentpass']);
	$input2 = mysql_real_escape_string($_POST['repass']);
	$input3 = mysql_real_escape_string($_POST['newpass']);
	
	$input1 = md5($input1);
	$input2 = md5($input2);
	$input3 = md5($input3);
	if($input1 != $userpass)
	{
		$wrongpass = "Incorrect Existing Password!!";
	}
	else if($input3 != $input2)
	{
		$errmatch = "Password do not match !";
	}
	else if($input1 == $input2)
	{
		$errsame = "Please Enter a New Password !";
	}
	else
	{
		if(mysql_query("UPDATE users SET password='$input3' WHERE email='$usermail'"))
		{
			$_SESSION['changedpass'] = 'ok';
			header("Location: MyProfile.php");
		}
	}
	
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>
	<?php echo $fnamee ." " .$lasname ?>
  </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="cp.css" rel="stylesheet">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<html>


	  	 <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:black;">
      <div class="container-fluid">
        <div class="navbar-header" style="position:fixed;color: white; font-family: 'Helvetica Neue', sans-serif; font-size: 17px; font-weight: bold;text-shadow: 4px 4px 2px #000000;">
            <a href="home.php"><img src="logo1.png" width="240" height="90"></a>
         </h1>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
		<?php if(isset($_SESSION['uname'])): ?>
          <ul class="nav navbar-nav navbar-right">
		 
            <li style="color: #ffffff; font-family: 'Helvetica Neue', sans-serif; font-size: 37px; font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;"><br><?php echo $fnamee ." " .$lasname ?>&nbsp&nbsp</li>
			<li><img src="<?php echo "img/profile/" .$_SESSION['mail'] ."/main.jpg"; ?>"  height="80" width="80" class="img-circle" ></li>
          </ul>
		  <?php endif; ?>
		<?php if(!isset($_SESSION['uname'])): ?>
          <ul class="nav navbar-nav navbar-right">
            <li style="color: #ffffff; font-family: 'Helvetica Neue', sans-serif; font-size: 37px; font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;"><br>Welcome, <?php echo $_SESSION['mail']; ?> !&nbsp&nbsp</li>
          </ul>
		<?php endif; ?>
        </div>
      </div>
    </nav>


	
	<nav class="navbar navbar-inverse navbar-fixed-bottom">
	  <div class="container-fluid">
	  <?php if(isset($_SESSION['uname'])): ?>
		<ul class="nav navbar-nav navbar-left">
		  <li><a href="#">Favourites</a></li>
		  <li><a href="people.php">People</a></li>
		  <li><a href="UploadRecipe.php">Upload a Recipe</a></li>
		  <li><a href="#">Browse Recipes</a></li>
		</ul>
		<?php endif; ?>
		<ul class="nav navbar-nav navbar-right">
			 <?php if(isset($_SESSION['uname'])): ?>
			  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Account<span class="caret"></span></a>
					<ul class="dropdown-menu">
			<li><a onMouseOver="this.style.background='black';this.style.color='white'" onMouseOut="this.style.background='#fff';this.style.color='black'" style="background:#fff;" href="MyProfile.php">View Your Profile</a></li>
			<li><a onMouseOver="this.style.background='black';this.style.color='white'" onMouseOut="this.style.background='#fff';this.style.color='black'" style="background:#fff;" href="ProfileUpdate.php">Edit Profile Information</a></li>
			<li><a onMouseOver="this.style.background='black';this.style.color='white'" href="changepassword.php" onMouseOut="this.style.background='#fff';this.style.color='black'" style="background:#fff;">Change Password</a></li>
		    <li><a onMouseOver="this.style.background='black';this.style.color='white'" href="#" onMouseOut="this.style.background='#fff';this.style.color='black'" style="background:#fff;">View Your Uploads</a></li>
			</ul>
				<?php endif; ?>
					 <li><a href="signout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
		  </li>
		</ul>
		
	  </div>
	</nav>

<body>

	<br><br><br><br><br>
	<h1>Change Your Password</h1>
	<br><br><br>
	<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-7">
	<form method="post" action="#" class="form-horizontal" role="form" style="color:white;">
		<div class="form-group">
            <label class="col-lg-4 control-label" style="font-size:20px;">Existing Password: </label>
            <div class="col-lg-3">
              <input class="form-control" type="password" autocomplete="off" name="currentpass" required>
			  <p style="color:red"> <?php echo $wrongpass; ?> </p>
            </div>
		</div>
		<br>	
		<div class="form-group">
            <label class="col-lg-4 control-label" style="font-size:20px;">New Password: </label>
            <div class="col-lg-3">
              <input class="form-control" type="password" autocomplete="off" name="newpass" required>
			   <p style="color:red"> <?php echo $errsame; ?> </p>
            </div>
		</div>
		<br>
		
		<div class="form-group">
            <label class="col-lg-4 control-label" style="font-size:20px;">New Password Again: </label>
            <div class="col-lg-3">
              <input class="form-control" type="password" autocomplete="off" name="repass" required>
			  <p style="color:red"> <?php echo $errmatch; ?> </p>
            </div>
		</div>	
	<br>
		
		<div class="form-group">
			<div class="col-md-1"></div>
            <div class="col-lg-3">
              <input type="submit" class="btn-success btn-lg" value="Change Password" name="changepass" style="background-color:red">
            </div>
			<div class="col-lg-3">
              <input type="reset" class="btn-success btn-lg" value="Reset Fields" name="reset" style="background-color:orange">
            </div>
		</div>
		
	</form>
	<br><br><br><br><br><br>
	         <h1 style="color: white; font-family: 'Rouge Script', cursive; font-size: 30px; font-weight: normal;text-shadow: 2px 2px 2px red;">"We all eat, & it would be a sad waste of oppurtunity to eat badly"<br><br>&nbsp&nbsp-Anna Thomas<br><br><br></h1>

	</div>
	 <div class="col-md-3">
		 <br><br><br>
         <h1 style="color: white; font-family: 'Rouge Script', cursive; font-size: 30px; font-weight: normal;text-shadow: 2px 2px 2px red;">"People who love to eat are always the best people in the world."<br><br>&nbsp&nbsp-Julia Child</h1>
	 </div>
	</div>
	<br><br><br><br><br>
	</div>
</body>
</html>