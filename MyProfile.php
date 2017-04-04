<?php
error_reporting(0);
include_once "Profile.php";
$_SESSION['currentpage'] = 'MyProfile';
$maill = $_SESSION['mail'];
$info = mysql_query("SELECT * FROM users WHERE email='$maill'");
$info = mysql_fetch_assoc($info);
$userid = $info['id'];
$usergender = ucfirst($info['gender']);
$userdob = $info['dob'];
$usercountry = $info['country'];
$userpro = $info['pro'];
$userphone = $info['phone'];
$userknown = $info['known'];
$userinterest = $info['interests'];
$people = mysql_query("SELECT * FROM users WHERE email!='$maill' ORDER BY jointime DESC");
$people1 = mysql_query("SELECT * FROM users WHERE email!='$maill' ORDER BY jointime DESC");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <title>
	<?php echo $fnamee ." " .$lasname ?>
  </title>
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">	 
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="profile.css" rel="stylesheet">
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body >

<div class="bgImageContainer">
</div>
<div >
        <nav class="navbar-inverse navbar-fixed-top" style="background-color:#800000">
          <a href="home.php"><img src="logo1.png"></a>
          		<?php if(isset($_SESSION['uname'])): ?>
          <ul class="nav navbar-nav navbar-right">
            <li style="color: #ffffff; font-family: 'Helvetica Neue', sans-serif; font-size: 30px; font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;"><br>Welcome, <?php echo $fnamee ." " .$lasname ?> !&nbsp&nbsp</li>
          </ul>
		<?php endif; ?>
		<?php if(!isset($_SESSION['uname'])): ?>
          <ul class="nav navbar-nav navbar-right">
            <li style="color: #ffffff; font-family: 'Helvetica Neue', sans-serif; font-size: 37px; font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;"><br>Welcome, <?php echo $_SESSION['mail']; ?> !&nbsp&nbsp</li>
          </ul>
		<?php endif; ?>
    </nav>
	
		
 </div>

	


	
	<nav class="navbar navbar-inverse navbar-fixed-bottom">
	  <div class="container-fluid">
	  <?php if(isset($_SESSION['uname'])): ?>
		<ul class="nav navbar-nav navbar-left">
		  <li><a href="myfavourites.php">Favourites</a></li>
		  <li><a href="people.php">People</a></li>
		  <li><a href="UploadRecipe.php">Upload a Recipe</a></li>
		  <li><a href="BrowseRecipe.php">Browse Recipes</a></li>
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
				<?php endif; ?>
					 <li><a href="signout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out &nbsp; &nbsp;</a></li>
		  </li>
		</ul>
		
	  </div>
	</nav>
	<div class="row">
	<br><br><br><br>
		<div class="col-md-2" style="">
			<ul class="nav nav-pills nav-stacked" style="background-color:black;background-attachment:fixed;color:white; position:fixed;border:2px double white;" id="myTab">
			<?php if(file_exists($cwdir ."/img/profile/" .$_SESSION['mail'] ."/main.jpg")): ?>
				<li><br><br>&nbsp&nbsp<img src="<?php echo "img/profile/" .$_SESSION['mail'] ."/main.jpg"; ?>" width="180" height="180" style="border:1px double yellow">&nbsp&nbsp</li>
			<?php endif; ?>
            <?php if(file_exists($cwdir ."/img/profile/" .$_SESSION['mail'] ."/main.png")): ?>
				<li><br><br>&nbsp&nbsp<img src="<?php echo "img/profile/" .$_SESSION['mail'] ."/main.jpg"; ?>" width="180" height="180" style="border:1px double yellow">&nbsp&nbsp</li>
			<?php endif; ?>
			<?php if(!file_exists($cwdir ."/img/profile/" .$_SESSION['mail'] ."/main.jpg") && !file_exists($cwdir ."/img/profile/" .$_SESSION['mail'] ."/main.png")): ?>
				<li><br><br>&nbsp&nbsp<img src="img/user.jpg" width="180" height="180" >&nbsp&nbsp</li>
			<?php endif; ?>
			<li style="color: #ffffff; font-family: 'Helvetica Neue', sans-serif; font-size: 20px; font-weight: bold;"><br><a data-toggle="tab" href="#personal" style="color:white;" onMouseOver="this.style.background='orange';this.style.color='white'" onMouseOut="this.style.background='transparent';this.style.color='white'"><i class="fa fa-user" aria-hidden="true"></i>&nbsp Personal Info</a></li>
			<li style="color: #ffffff; font-family: 'Helvetica Neue', sans-serif; font-size: 20px; font-weight: bold;"><a data-toggle="tab" href="#skills" style="color:white;" onMouseOver="this.style.background='orange';this.style.color='white'" onMouseOut="this.style.background='transparent';this.style.color='white'"><i class="fa fa-trophy" aria-hidden="true"></i>&nbsp Skills  </a></li>
			<li style="color: #ffffff; font-family: 'Helvetica Neue', sans-serif; font-size: 20px; font-weight: bold;"><a data-toggle="tab" href="#following" style="color:white;" onMouseOver="this.style.background='orange';this.style.color='white'" onMouseOut="this.style.background='transparent';this.style.color='white'"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp Following</a></li>
			<li style="color: #ffffff; font-family: 'Helvetica Neue', sans-serif; font-size: 20px; font-weight: bold;"><a data-toggle="tab" href="#followers" style="color:white;" onMouseOver="this.style.background='orange';this.style.color='white'" onMouseOut="this.style.background='transparent';this.style.color='white'"><i class="fa fa-users" aria-hidden="true"></i>&nbsp Followers</a>
			<br><br></li>
			</ul>
			<br><br><br>
		</div>

  <!-- Content -->
		<div class="col-md-10" >    
			<div class="tab-content"><br><br>
				<div class="tab-pane active fade in" id="personal"  style="background-color:pink;color: black;">
					<div class="col-md-7"  > 
						  <h1 style=" color:black;font-family: 'Helvetica Neue', sans-serif; font-size: 40px; font-weight: bold; letter-spacing: -1px;text-shadow:1px 1px 5px yellow">Personal Information</h1><hr>
						  <br><h4 style="  font-family: 'Trocchi', serif; font-size: 25px;font-weight: bold;text-shadow:1px 1px 3px white">Full Name : <?php echo $fnamee ." " .$lasname; ?></h4><br>
						  <h4 style="  font-family: 'Trocchi', serif; font-size: 25px;font-weight: bold;text-shadow:1px 1px 3px white">Gender : <?php echo $usergender; ?></h4><br>
						  <h4 style="  font-family: 'Trocchi', serif; font-size: 25px;font-weight: bold;text-shadow:1px 1px 3px white"> Date Of Birth : <?php echo $userdob; ?></h4><br>
						  <h4 style=" font-family: 'Trocchi', serif; font-size: 25px;font-weight: bold;text-shadow:1px 1px 3px white">Are you a professional chef ?? : <?php  if($userpro==1) echo "Yes"; else echo "No"; ?></h4><br>
						  <br><br><br>
						  </div>
						  <div class="col-md-5"> 
						  <h1 style=" font-family: 'Helvetica Neue', sans-serif; font-size: 40px; font-weight: bold; letter-spacing: -1px;text-shadow:1px 1px 5px yellow">Contact Information</h1><hr>
						  <br><h4 style="  font-family: 'Trocchi', serif; font-size: 25px;font-weight: bold;text-shadow:1px 1px 3px white">Contact Number : <?php echo $userphone; ?></h4><br>
						  <h4 style="  font-family: 'Trocchi', serif; font-size: 25px;font-weight: bold;text-shadow:1px 1px 3px white">Email ID : <?php echo $_SESSION['mail']; ?></h4><br>
						  <h4 style="  font-family: 'Trocchi', serif; font-size: 25px;font-weight: bold;text-shadow:1px 1px 3px white">Country : <?php echo $usercountry; ?></h4><br>
						   <center>
						  <i class="fa fa-facebook fa-2x" aria-hidden="true"></i>&nbsp&nbsp
						  <i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i>&nbsp&nbsp
						  <i class="fa fa-google-plus-square fa-2x" aria-hidden="true"></i>&nbsp&nbsp
						  <i class="fa fa-tumblr-square fa-2x" aria-hidden="true"></i>
						  </center> 
					</div>
				</div>
	  
	  
				<div id="skills" class="tab-pane fade in" >
					<div class="col-md-6"> 
					<h2 style="color: #ff4411; font-size: 48px; font-family: 'Signika', sans-serif; padding-bottom: 10px;text-shadow:1px 1px 5px white;font-weight: bold; ">Cuisines Known</h2><hr>
					<i><h4 style="color: #000; font-family: 'Droid serif', serif; font-size: 30px; font-weight: 600;"><?php echo $userknown; ?></h4></i>
					<br><br>
					<h2 style="color: #ff4411; font-size: 48px; font-family: 'Signika', sans-serif; padding-bottom: 10px;text-shadow:1px 1px 5px white;font-weight: bold; ">Cuisines Interested In</h2><hr>
					<i><h4 style="color: #000; font-family: 'Droid serif', serif; font-size: 30px; font-weight: 600;"><?php echo $userinterest; ?></h4></i>
					</div>
					<div class="col-md-4"> 
						<img src="img/p.jpg" width="550" height="400">
					</div>
				</div>
					
					
				<div id="following" class="tab-pane fade in">
						<h2 style="color:red">People you Follow</h2><hr>									
						<br>
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
						  <a href="<?php echo 'peopleprofile.php?user=' .$row[0]; ?>"><h2 class="featurette-heading" style="color: black; font-family: 'Rouge Script', cursive; font-size: 25px; font-weight: bold;  text-align: center;}"> <?php echo $fn ." " .$ln; ?> </h2></a>
						  <p class="lead" style="color: black; font-family: 'Verdana', sans-serif; font-size: 16px;text-align: center;">Gender: <?php echo ucfirst($gen); ?>  |  Age: <?php echo $age; ?> | Country : <?php $ct = $row[8]; echo $ct; ?></p>
						</div>
						<div class="col-md-3">
							<form action="follow.php" name="<?php echo $row[1]; ?>" method="post">
							<?php  $fw = mysql_query("SELECT * FROM follow WHERE userid='$userid' AND followid='$currentid'"); ?>
							<input type="hidden" name="<?php echo $row[0]; ?>" value="follow">
							<?php $_SESSION['peoples'] = $people; ?>
							<?php if((mysql_num_rows($fw))>0): ?>
							<br>
							<center><input type="submit" name="<?php echo $row[0]; ?>" value="Following" class="btn-primary btn-lg"align="middle" style="background-color:purple"></center>
							<?php endif; ?>
							<?php if((mysql_num_rows($fw))==0): ?>
							<br>
							<center><input type="submit" name="<?php echo $row[0]; ?>" value="Follow" class="btn-primary btn-lg"align="middle" style="background-color:orange"></center>
							<?php endif; ?>
						 </form>
						</div>
						</div>
						<br>
						<hr>
						<?php endif; ?>
						<?php } ?>
						<br><br><br><br><br><br>
				</div>
						
					
				<div class="tab-pane fade in" id="followers">
					  <h2 style="color:red">People who follow you</h2><hr>
					  <br>
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
						  <a href="<?php echo 'peopleprofile.php?user=' .$row[0]; ?>"><h2 class="featurette-heading" style="color: black; font-family: 'Rouge Script', cursive; font-size: 25px; font-weight: bold;  text-align: center;}"> <?php echo $fn ." " .$ln; ?>  </h2></a>
						  <p class="lead" style="color: red; font-family: 'Verdana', sans-serif; font-size: 16px;text-align: center;"> Gender: <?php echo ucfirst($gen); ?>  |  Age: <?php echo $age; ?> | Country : <?php $ct = $row[8]; echo $ct; ?></p>
						</div>
						<div class="col-md-3">
							<form action="follow.php" name="<?php echo $row[1]; ?>" method="post">
							<?php  $fw = mysql_query("SELECT * FROM follow WHERE userid='$userid' AND followid='$currentid'"); ?>
							<input type="hidden" name="<?php echo $row[0]; ?>" value="follow">
							<?php $_SESSION['peoples'] = $people1; ?>
							<?php if((mysql_num_rows($fw))>0): ?>
							<br>
							<center><input type="submit" name="<?php echo $row[0]; ?>" value="Following" class="btn-primary btn-lg"align="middle" style="background-color:purple"></center>
							<?php endif; ?>
							<?php if((mysql_num_rows($fw))==0): ?>
							<br>
							<center><input type="submit" name="<?php echo $row[0]; ?>" value="Follow" class="btn-primary btn-lg"align="middle" style="background-color:orange"></center>
							<?php endif; ?>
						 </form>
						</div>
						</div>
						<br>
						<hr>
						<?php endif; ?>
						<?php } ?>
						<br><br><br><br><br><br>
				</div>
			</div>
		</div>
	</div>	<!-- Row -->
	
</body>
</html>
<?php
// Best Way to bring alert box without using GET in the URL :)
if(isset($_SESSION['changedpass']))
{
	echo '<script language="javascript">';
	echo 'alert("Password Changed Successfully")';
	echo '</script>';
	unset($_SESSION['changedpass']);
}
if(isset($_SESSION['uploadstatus']))
{
	echo '<script language="javascript">';
	echo 'alert("Recipe Uploaded Successfully")';
	echo '</script>';
	unset($_SESSION['uploadstatus']);
}
?>