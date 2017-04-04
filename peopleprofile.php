<?php
session_start();
include_once 'connections.php';
if(!isset($_GET['user']))
{
	header("Location: HTTP/1.0 404 Not Found");
}
$_SESSION['currentpage'] = "";
$_SESSION['currentpage'] .= 'peopleprofile.php?user=' .$_GET['user'];
$cwdir = getcwd();
$loggedid = -1;
if(isset($_SESSION['mail']))
{
$loggedmail = $_SESSION['mail'];
$info = mysql_query("SELECT * FROM users WHERE email='$loggedmail'");
$info = mysql_fetch_assoc($info);
$loggedid = $info['id'];
$loggeduser = $info['firstname'];
}

$userid = $_GET['user'];
$fetchuser = mysql_query("SELECT * FROM users WHERE id='$userid'");
$fetchuser = mysql_fetch_assoc($fetchuser);
$fnamee = $fetchuser['firstname'];
$lasname = $fetchuser['lastname'];
$fnamee = ucfirst($fnamee);
$lasname = ucfirst($lasname);
$usermail = $fetchuser['email'];
$userid = $fetchuser['id'];
$usergender = ucfirst($fetchuser['gender']);
$userdob = $fetchuser['dob'];
$usercountry = $fetchuser['country'];
$userpro = $fetchuser['pro'];
$userphone = $fetchuser['phone'];
$userknown = $fetchuser['known'];
$userinterest = $fetchuser['interests'];
$people = mysql_query("SELECT * FROM users WHERE email!='$usermail' ORDER BY jointime DESC");
$people1 = mysql_query("SELECT * FROM users WHERE email!='$usermail' ORDER BY jointime DESC");

?>





<!DOCTYPE html>
<head>
<title> <?php echo $fnamee ?> </title>

	<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
</head>

<body>
	
	<div style="background:black">
        <nav class="navbar-inverse navbar-fixed-top">
          <a href="home.php"><img src="logo1.png"></a>
          <ul class="nav navbar-right">
            <li style="color: #ffffff; font-family: 'Helvetica Neue', sans-serif; font-size: 30px; font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;"><br><?php echo $fnamee ." " .$lasname ."'s Profile" ?> !&nbsp&nbsp</li>
          </ul>
    </nav>
	
	<nav class="navbar navbar-inverse navbar-fixed-bottom">
	  <div class="container-fluid">
	  <?php if(isset($_SESSION['uname'])): ?>
		<ul class="nav navbar-nav navbar-left">
		  <li><a href="#">Favourites</a></li>
		  <li><a href="people.php">Peoples</a></li>
		  <li><a href="UploadRecipe.php">Upload a Recipe</a></li>
		  <li><a href="BrowseRecipe.php">Browse Recipes</a></li>
		</ul>
		<?php endif; ?>
		<?php if(!isset($_SESSION['mail'])): ?>
		<ul class="nav navbar-nav navbar-left">
		  <li><h3 style="color:red"> Join the Network of Delicious Food Today !! Sign Up Now !</h3></li>
		</ul>
		<?php endif; ?>
		 <ul class="nav navbar-nav navbar-right">
			 <?php if(isset($_SESSION['uname'])): ?>
			  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Account<span class="caret"></span></a>
					<ul class="dropdown-menu">
			<li><a onMouseOver="this.style.background='black';this.style.color='white'" onMouseOut="this.style.background='#fff';this.style.color='black'" style="background:#fff;" href="MyProfile.php">View Your Profile</a></li>
			<li><a onMouseOver="this.style.background='black';this.style.color='white'" onMouseOut="this.style.background='#fff';this.style.color='black'" style="background:#fff;" href="ProfileUpdate.php">Edit Profile Information</a></li>
			<li><a onMouseOver="this.style.background='black';this.style.color='white'" href="changepassword.php" onMouseOut="this.style.background='#fff';this.style.color='black'" style="background:#fff;">Change Password</a></li>
		    <li><a onMouseOver="this.style.background='black';this.style.color='white'" href="viewuploads.php" onMouseOut="this.style.background='#fff';this.style.color='black'" style="background:#fff;">View Your Uploads</a></li>
			</ul>
			</li>
			<li><a href="signout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
			
			<?php endif; ?>
			<?php 	if(!isset($_SESSION['mail'])): ?>
			<li><a href="signup.php"><span class="glyphicon glyphicon-log-in"></span> Sign Up &nbsp &nbsp</a></li>
			<?php endif; ?>
		  
		</ul>
		
	  </div>
	</nav>
	
	
	<div class="row" style="background:white;">
	<br><br><br><br>	
	<div class="col-md-2" >
			<ul class="nav nav-pills nav-stacked" style="background:black;color:white; position:fixed;" id="myTab">
			<?php if(file_exists($cwdir ."/img/profile/" .$usermail ."/main.jpg")): ?>
				<li><br><br>&nbsp&nbsp<img src="<?php echo "img/profile/" .$usermail ."/main.jpg"; ?>" width="180" height="180" >&nbsp&nbsp</li>
			<?php endif; ?>
			<?php if(file_exists($cwdir ."/img/profile/" .$usermail ."/main.png")): ?>
				<li><br><br>&nbsp&nbsp<img src="<?php echo "img/profile/" .$usermail ."/main.png"; ?>" width="180" height="180" >&nbsp&nbsp</li>
			<?php endif; ?>
			<?php if(!file_exists($cwdir ."/img/profile/" .$usermail ."/main.jpg") && !file_exists($cwdir ."/img/profile/" .$usermail ."/main.png")): ?>
				<li><br><br>&nbsp&nbsp<img src="img/user.jpg" width="180" height="180" >&nbsp&nbsp</li>
			<?php endif; ?>
			<li style="color: #ffffff; font-family: 'Helvetica Neue', sans-serif; font-size: 20px; font-weight: bold;"><br><a data-toggle="tab" href="#personal" style="color:white;" onMouseOver="this.style.background='orange';this.style.color='white'" onMouseOut="this.style.background='black';this.style.color='white'"><i class="fa fa-user" aria-hidden="true"></i>&nbspPersonal Info</a></li>
			<li style="color: #ffffff; font-family: 'Helvetica Neue', sans-serif; font-size: 20px; font-weight: bold;"><a data-toggle="tab" href="#skills" style="color:white;" onMouseOver="this.style.background='orange';this.style.color='white'" onMouseOut="this.style.background='black';this.style.color='white'"><i class="fa fa-trophy" aria-hidden="true"></i>&nbspSkills  </a></li>
			<li style="color: #ffffff; font-family: 'Helvetica Neue', sans-serif; font-size: 20px; font-weight: bold;"><a data-toggle="tab" href="#following" style="color:white;" onMouseOver="this.style.background='orange';this.style.color='white'" onMouseOut="this.style.background='black';this.style.color='white'"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbspFollowing</a></li>
			<li style="color: #ffffff; font-family: 'Helvetica Neue', sans-serif; font-size: 20px; font-weight: bold;"><a data-toggle="tab" href="#followers" style="color:white;" onMouseOver="this.style.background='orange';this.style.color='white'" onMouseOut="this.style.background='black';this.style.color='white'"><i class="fa fa-users" aria-hidden="true"></i>&nbspFollowers</a>
			<br><br></li>
			</ul>
			<br><br><br>
		</div>

  <!-- Content -->
		<div class="col-md-10">    
			<div class="tab-content"><br><br>
				<div class="tab-pane active fade in" id="personal">
					<div class="col-md-7"> 
						  <h1 style="color: red; font-family: 'Helvetica Neue', sans-serif; font-size: 40px; font-weight: bold; letter-spacing: -1px;">Personal Information</h1><hr>
						  <br><h4 style=" color: #7c795d; font-family: 'Trocchi', serif; font-size: 25px;">Full Name : <?php echo $fnamee ." " .$lasname; ?></h4><br>
						  <h4 style=" color: #7c795d; font-family: 'Trocchi', serif; font-size: 25px;">Gender : <?php echo $usergender; ?></h4><br>
						  <h4 style=" color: #7c795d; font-family: 'Trocchi', serif; font-size: 25px;"> Date Of Birth : <?php echo $userdob; ?></h4><br>
						  <h4 style=" color: #7c795d; font-family: 'Trocchi', serif; font-size: 25px;">Are you a professional chef ?? : <?php  if($userpro==1) echo "Yes"; else echo "No"; ?></h4><br>
						  <br><br><br>
						  </div>
						  <div class="col-md-5"> 
						  <h1 style="color: red; font-family: 'Helvetica Neue', sans-serif; font-size: 40px; font-weight: bold; letter-spacing: -1px;">Contact Information</h1><hr>
						  <br><h4 style=" color: #7c795d; font-family: 'Trocchi', serif; font-size: 25px;">Contact Number : <?php echo $userphone; ?></h4><br>
						  <h4 style=" color: #7c795d; font-family: 'Trocchi', serif; font-size: 25px;">Email ID : <?php echo $usermail; ?></h4><br>
						  <h4 style=" color: #7c795d; font-family: 'Trocchi', serif; font-size: 25px;">Country : <?php echo $usercountry; ?></h4><br>
						  <!-- <center>
						  <i class="fa fa-facebook fa-2x" aria-hidden="true"></i>
						  <i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i>
						  <i class="fa fa-google-plus-square fa-2x" aria-hidden="true"></i>
						  <i class="fa fa-tumblr-square fa-2x" aria-hidden="true"></i>
						  </center> -->
					</div>
				</div>
	  
	  
				<div id="skills" class="tab-pane fade in" >
					<div class="col-md-6"> 
					<h2 style="color: #ff4411; font-size: 48px; font-family: 'Signika', sans-serif; padding-bottom: 10px; ">Cuisines Known</h2><hr>
					<h4 style="color: #000; font-family: 'Droid serif', serif; font-size: 30px; font-weight: 400;"><?php echo $userknown; ?></h4>
					<br><br>
					<h2 style="color: #ff4411; font-size: 48px; font-family: 'Signika', sans-serif; padding-bottom: 10px; ">Cuisines Interested In</h2><hr>
					<h4 style="color: #000; font-family: 'Droid serif', serif; font-size: 30px; font-weight: 400;"><?php echo $userinterest; ?></h4>
					</div>
					<div class="col-md-4"> 
						<img src="img/p.jpg" width="550" height="400">
					</div>
				</div>
					
					
				<div id="following" class="tab-pane fade in">
						<h2 style="color:red">People <?php echo $fnamee; ?> Follow</h2><hr>									
						<br>
						<?php if(isset($_SESSION['mail'])) : ?>
						<?php while($row=mysql_fetch_row($people)) { ?>
						<?php $currentid = $row[0]; $email = $row[1]; $fn = $row[4]; $ln = $row[5]; $gen = $row[6]; $birthdate = new DateTime($row[7]); $today   = new DateTime('today'); $age = $birthdate->diff($today)->y;?>
						<?php $followingquery = mysql_query("SELECT * FROM follow WHERE userid='$userid' AND followid='$currentid'");
							if((mysql_num_rows($followingquery))>0): ?>
									
						<div class="row featurette" id="<?php echo $row[0]; ?>">
						<div class="col-md-1"></div>
						<?php if(file_exists($cwdir ."/img/profile/" .$email ."/main.jpg")): ?>
							<div class="col-md-2">
							<img style="height:120px" src="<?php echo "img/profile/" .$email ."/main.jpg"; ?>" width="150" height="150">
							</div>
						<?php endif; ?>
						<?php if(file_exists($cwdir ."/img/profile/" .$email ."/main.png")): ?>
							<div class="col-md-2">
							<img style="height:120px" height="50" src="<?php echo "img/profile/" .$email ."/main.png"; ?>" width="150" height="150">
							</div>
						<?php endif; ?>
						<?php if(!file_exists($cwdir ."/img/profile/" .$email ."/main.jpg") && !file_exists($cwdir ."/img/profile/" .$email ."/main.png")): ?>
							<div class="col-md-2">
							<img style="height:120px" height="50" src="img/user.jpg" width="150" height="150">
							</div>
						<?php endif; ?>
						<div class="col-md-6">
						  <?php if($loggedid != $row[0] && isset($_SESSION['mail'])): ?>
						  <a href="<?php echo 'peopleprofile.php?user=' .$row[0]; ?>"><h2 class="featurette-heading" style="color: black; font-family: 'Rouge Script', cursive; font-size: 25px; font-weight: normal;  text-align: center;}"> <?php echo $fn ." " .$ln; ?> </h2></a>
						  <?php endif; ?>
						  <?php if($loggedid == $row[0] && isset($_SESSION['mail'])): ?>
						  <a href="<?php echo 'MyProfile.php'; ?>"><h2 class="featurette-heading" style="color: black; font-family: 'Rouge Script', cursive; font-size: 25px; font-weight: normal;  text-align: center;}"> <?php echo $fn ." " .$ln; ?> </h2></a>
						  <?php endif; ?>
						  <p class="lead" style="color: orange; font-family: 'Verdana', sans-serif; font-size: 16px;text-align: center;">Gender: <?php echo ucfirst($gen); ?>  |  Age: <?php echo $age; ?> | Country : <?php $ct = $row[8]; echo $ct; ?></p>
						</div>
						<div class="col-md-3">
						<?php if($loggedid != $row[0] && isset($_SESSION['mail'])): ?>
							<form action="follow.php" name="<?php echo $row[1]; ?>" method="post">
							<?php  $fw = mysql_query("SELECT * FROM follow WHERE userid='$userid' AND followid='$currentid'"); ?>
							<?php $forlogged = mysql_query("SELECT * FROM follow WHERE userid='$loggedid' AND followid='$currentid'"); ?>
							
							<input type="hidden" name="<?php echo $row[0]; ?>" value="follow">
							<?php $_SESSION['peoples'] = $people; ?>
							<?php if((mysql_num_rows($forlogged))>0): ?>
							<br><br>
							<center><input type="submit" name="<?php echo $row[0]; ?>" value="Following" class="btn-primary btn-lg"align="middle" style="background-color:purple"></center>
							<?php endif; ?>
							<?php if((mysql_num_rows($forlogged))==0): ?>
							<br><br>
							<center><input type="submit" name="<?php echo $row[0]; ?>" value="Follow" class="btn-primary btn-lg"align="middle" style="background-color:orange"></center>
							<?php endif; ?>
							</form>
						<?php endif; ?>
							</div>
						</div>
						<br>
						<hr>
						<?php endif; ?>
						<?php } ?>
						<?php endif; ?>
						<?php if(!isset($_SESSION['mail'])) : ?>
						<h2 style="color:orange">Sorry, You need to <a href="login.php">Login</a> to see this !</h2>
						<?php endif; ?>
						<br><br><br><br><br><br>
				</div>
						
					
				<div class="tab-pane fade in" id="followers">
					  <h2 style="color:red">People who follows <?php echo $fnamee; ?></h2><hr>
					  <br>
					  <?php if(isset($_SESSION['mail'])) : ?>
					  <?php while($row=mysql_fetch_row($people1)) { ?>
						<?php $currentid = $row[0]; $email = $row[1]; $fn = $row[4]; $ln = $row[5]; $gen = $row[6]; $birthdate = new DateTime($row[7]); $today   = new DateTime('today'); $age = $birthdate->diff($today)->y;?>
						<?php $followingquery = mysql_query("SELECT * FROM follow WHERE userid='$currentid' AND followid='$userid'");
							if((mysql_num_rows($followingquery))>0): ?>		
						<div class="row featurette" id="<?php echo $row[0]; ?>">
						<div class="col-md-1"></div>
						<?php if(file_exists($cwdir ."/img/profile/" .$email ."/main.jpg")): ?>
							<div class="col-md-2">
							<img style="height:120px" height="50px" src="<?php echo "img/profile/" .$email ."/main.jpg"; ?>" width="150" height="150">
							</div>
						<?php endif; ?>
						<?php if(file_exists($cwdir ."/img/profile/" .$email ."/main.png")): ?>
							<div class="col-md-2">
							<img style="height:120px" height="50px" src="<?php echo "img/profile/" .$email ."/main.png"; ?>" width="150" height="150">
							</div>
						<?php endif; ?>
						<?php if(!file_exists($cwdir ."/img/profile/" .$email ."/main.jpg") && !file_exists($cwdir ."/img/profile/" .$email ."/main.png")): ?>
							<div class="col-md-2">
							<img style="height:120px" height="50px" src="img/user.jpg" width="150" height="150">
							</div>
						<?php endif; ?>
						<div class="col-md-6">
						  <?php if($loggedid != $row[0] && isset($_SESSION['mail'])): ?>
						  <a href="<?php echo 'peopleprofile.php?user=' .$row[0]; ?>"><h2 class="featurette-heading" style="color: black; font-family: 'Rouge Script', cursive; font-size: 25px; font-weight: normal;  text-align: center;}"> <?php echo $fn ." " .$ln; ?> </h2></a>
						  <?php endif; ?>
						  <?php if($loggedid == $row[0] && isset($_SESSION['mail'])): ?>
						  <a href="<?php echo 'MyProfile.php'; ?>"><h2 class="featurette-heading" style="color: black; font-family: 'Rouge Script', cursive; font-size: 25px; font-weight: normal;  text-align: center;}"> <?php echo $fn ." " .$ln; ?> </h2></a>
						  <?php endif; ?>
						  <p class="lead" style="color: orange; font-family: 'Verdana', sans-serif; font-size: 16px;text-align: center;"> Gender: <?php echo ucfirst($gen); ?>  |  Age: <?php echo $age; ?> | Country : <?php $ct = $row[8]; echo $ct; ?></p>
						</div>
						<div class="col-md-3">
						<?php if($loggedid != $row[0] && isset($_SESSION['mail'])): ?>
							<form action="follow.php" name="<?php echo $row[1]; ?>" method="post">
							<?php  $fw = mysql_query("SELECT * FROM follow WHERE userid='$userid' AND followid='$currentid'"); ?>
							<?php $forlogged = mysql_query("SELECT * FROM follow WHERE userid='$loggedid' AND followid='$currentid'"); ?>
							<input type="hidden" name="<?php echo $row[0]; ?>" value="follow">
							<?php $_SESSION['peoples'] = $people; ?>
							<?php if((mysql_num_rows($forlogged))>0): ?>
							<br><br>
							<center><input type="submit" name="<?php echo $row[0]; ?>" value="Following" class="btn-primary btn-lg"align="middle" style="background-color:purple"></center>
							<?php endif; ?>
							<?php if((mysql_num_rows($forlogged))==0): ?>
							<br><br>
							<center><input type="submit" name="<?php echo $row[0]; ?>" value="Follow" class="btn-primary btn-lg"align="middle" style="background-color:orange"></center>
							<?php endif; ?>
							</form>
							<?php endif; ?>
						</div>
						</div>
						<br>
						<hr>
						<?php endif; ?>
						<?php } ?>
						<?php endif; ?>
						<?php if(!isset($_SESSION['mail'])) : ?>
						<h2 style="color:orange">Sorry, You need to <a href="login.php">Login</a> to see this !</h2>
						<?php endif; ?>
						<br><br><br><br><br><br>
				</div>
			</div>
		</div>
	</div>	<!-- Row -->
</body>
</html>