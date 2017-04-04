<?php
error_reporting(0);
include_once "Profile.php";
if(empty($_GET['id']))
{
	header("HTTP/1.1 400 Bad Request");
	die();
}
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
$cwdir = getcwd();
$recipeid = $_GET['id'];
$recipedetails = mysql_query("SELECT * FROM recipe WHERE recipeid='$recipeid'");
$recipedetails = mysql_fetch_assoc($recipedetails);
$dishname = $recipedetails['dishname'];
$description = $recipedetails['description'];
$cuisine = $recipedetails['cuisine'];
$dishtype = $recipedetails['dishtype'];
$ingredients = $recipedetails['ingredients'];
$instruction = $recipedetails['instructions'];
$uploaddate = $recipedetails['uploaddate'];

$uploaderid = $recipedetails['userid'];
$uploaderinfo = mysql_query("SELECT * FROM users WHERE id='$uploaderid'");
$uploaderinfo = mysql_fetch_assoc($uploaderinfo);
$uploadername .= $uploaderinfo['firstname'] ." " .$uploaderinfo['lastname'];


$id1 = $recipeid;
					$favcount = mysql_query("SELECT * FROM favourites WHERE recipeid='$id1'");
					$favcount = mysql_num_rows($favcount);
					$change = mysql_query("UPDATE favouritecount SET favcount='$favcount' WHERE recipeid='$id1'");

if(isset($_POST['comment']))
{
	$cmnt=mysql_real_escape_string($_POST['cmnt']);
	$cmntadd = mysql_query("INSERT INTO comment(recipeid,userid,comment) VALUES('$id1','$userid','$cmnt')");
	$locate="allrecipe.php?id=".$id1;
	header("Location: $locate");
}	

$disp_cmnt=mysql_query("SELECT * FROM comment WHERE recipeid='$id1' ORDER by DATE DESC");

?>
<html>
  <head>
  <title>
	<?php echo $fnamee ." " .$lasname ?>
  </title>
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
	 <link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	
<div style="background:black">
	
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
          <a href="home.php"><img src="logo1.png"></a>
        </div>
		<?php if(isset($_SESSION['uname'])): ?>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li style="color: #ffffff; font-family: 'Helvetica Neue', sans-serif; font-size: 30px; font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;"><br>Welcome, <?php echo $fnamee ." " .$lasname ?> !&nbsp&nbsp</li>
          </ul>
        </div>
		<?php endif; ?>
		<?php if(!isset($_SESSION['uname'])): ?>
		<div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li style="color: #ffffff; font-family: 'Helvetica Neue', sans-serif; font-size: 37px; font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;"><br>Welcome, <?php echo $_SESSION['mail']; ?> !&nbsp&nbsp</li>
          </ul>
        </div>
		<?php endif; ?>
		</nav>
		
</div>



	
	<nav class="navbar navbar-inverse navbar-fixed-bottom">
	  <?php if(isset($_SESSION['uname'])): ?>
		<ul class="nav navbar-nav navbar-left">
		  <li><a href="myfavourites.php">Favourites</a></li>
		  <li><a href="people.php">Peoples</a></li>
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
					 <li><a href="signout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out&nbsp;&nbsp;</a></li>
		  </li>
		</ul>
		
	  </nav>
	  
	<div class="row" style="background:#f2f2f2">
		<br><br><br><br><br>
		<div class="col-md-1"></div>
		<div class="col-md-6">
		
		<h1 style="color:red"><?php echo $dishname; ?><span style="float:right"><?php echo $favcount; ?> <i class="glyphicon glyphicon-heart"></i></span></h1>
		<hr>
		
		<h4>Uploaded by: <a href="peopleprofile.php?user=<?php echo $uploaderid; ?>"><?php echo $uploadername; ?></a> on <?php echo substr($uploaddate,0,10); ?></h4>
		<p class="pull-right"><span class="label label-default"><?php echo $cuisine; ?></span> <span class="label label-default"><?php echo $dishtype; ?></p>
		<br><br>
		<h5><b> Description: </b></h5>
		<p>"<i><?php echo $description; ?></i>" </p> 
		</div>
		<div class="col-md-3">
				<br>
				<?php if(file_exists($cwdir ."/img/recipes/" .$recipeid .".jpg")): ?>
				  <img src="<?php echo "img/recipes/" .$recipeid	 .".jpg"; ?>" style="height:300;width:300;border:5px solid black" >
				  <?php endif; ?>
				  <?php if(file_exists($cwdir ."/img/recipes/" .$recipeid .".png")): ?>
				  <img src="<?php echo "img/recipes/" .$recipeid .".png"; ?>" style="height:300;width:300;border:5px solid black">
				  <?php endif; ?>
				  <?php if(!file_exists($cwdir ."/img/recipes/" .$recipeid .".jpg") && !file_exists($cwdir ."/img/recipes/" .$recipeid .".png")): ?>
				  &nbsp &nbsp <img src="img/dish.png" style="height:300;width:300;border:5px solid black" >
				  <?php endif; ?>
				  
		</div>
	</div>
	<div class="row" style="background:#f2f2f2">
		<br>
		<div class="col-md-1"></div>
		<div class="col-md-4">
		<h2 style="color:red">Ingredients</h2><hr>
		<?php $separator = "\r\n";
		$line = strtok($ingredients, $separator);
		echo "<ul><b>";
		while ($line !== false) {
			echo "<li>" .$line ."</li><br>";
			$line = strtok( $separator );
		} ?></b></ul>
		<br><br><br><br><br>
		</div>
		<div class="col-md-5">
			<h2 style="color:red">Instructions</h2><hr>
			<?php $separator = "\r\n";
			$line1 = strtok($instruction, $separator);
			echo "<ol><b>";
			while ($line1 !== false) {
				echo "<li>" .$line1 ."</li><br>";
				$line1 = strtok( $separator );
			}	 
			?></b></ol>
			<br><br><br><br><br>
		</div>
	
	</div>
	


 <h1 style="color:orange;font-weight:600;font-size:40;text-shadow:2px 2px 2px black;">&nbsp Comments	 </h1><hr>
	<div class="row" style="background:"id="a"> 
	<div class="col-lg-1"></div>
    <form class="form-horizontal" action="#a" method="post" role="form" style="font-family:Georgia, Serif;">
		<div class="col-lg-7">
			<b> <textarea name="cmnt" class="form-control"  rows="3" placeholder="Leave a comment or a suggestion etc..." style="background-color:#ddffbb"></textarea>
		</b>
		     <input type="submit" name="comment" value="comment" class="btn btn-success"style="float:right;"><br><br><br>
			</div>

	</form>
	</div>
	
<div class="row" style="background:" id="<?php echo $rows[0]; ?>" >
		<?php while($rows= mysql_fetch_row($disp_cmnt)) { ?>
			<?php $commentid = $rows[3]; $recipeid = $rows[0]; $userid1 = $rows[1]; $comment = $rows[2];$date = $rows[4]; $time = substr($date,0,10); $t=substr($date,11,19)?>
			<?php $getuser=mysql_query("SELECT * FROM users WHERE id='$userid1'");
				$getuser = mysql_fetch_assoc($getuser);
				$email=$getuser['email'];
				$frname=$getuser['firstname'];
				$laname=$getuser['lastname'];?>
		
			<div class="col-md-2"></div>
			
			<?php if(file_exists($cwdir ."/img/profile/" .$email ."/main.jpg")): ?>
				<div class="col-md-1">
					<img style="height:50px" height="10px" src="<?php echo "img/profile/" .$email ."/main.jpg"; ?>" width="50" height="50">
				</div>
			<?php endif; ?>
			
			<?php if(file_exists($cwdir ."/img/profile/" .$email ."/main.png")): ?>
				<div class="col-md-1">
					<img style="height:50px" height="10px" src="<?php echo "img/profile/" .$email ."/main.png"; ?>" width="50" height="50">
				</div>
			<?php endif; ?>
			
			<?php if(!file_exists($cwdir ."/img/profile/" .$email ."/main.jpg") && !file_exists($cwdir ."/img/profile/" .$email ."/main.png")): ?>
				<div class="col-md-1">
					<img style="height:50px" height="10px" src="img/user.jpg" width="50" height="50">
				</div>
			<?php endif; ?>	
			
			<div class="col-md-8" style="">
			<a href="<?php echo 'peopleprofile.php?user=' .$userid1; ?>"style="text-decoration:none;color:#ff4433;font-weight:800;font-size:18"><p> <?php echo $frname ." " .$laname; ?>  </p></a>
				
				<p><b><?php echo $comment; ?></b></p>
				<ul class="list-inline"><li style="float:right;"><?php echo $date; ?></li> </ul><br><br>
			</div>
			
		<?php } ?>
	</div>
		<br><br>
</body>
</html>