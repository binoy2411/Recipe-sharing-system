<?php
//error_reporting(0);
include_once "Profile.php";
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
$myrecipe = mysql_query("SELECT * FROM recipe WHERE userid='$userid'");

$cwdir = getcwd();


//counting no of favourites
$myrecipe1 = mysql_query("SELECT * FROM recipe WHERE userid='$userid'");
while($result=mysql_fetch_row($myrecipe1))
{
	$id1 = $result[0];
	$favcount = mysql_query("SELECT * FROM favourites WHERE recipeid='$id1'");
		$favcount = mysql_num_rows($favcount);
		$check = mysql_query("SELECT * FROM favouritecount WHERE recipeid='$id1'");
		if((mysql_num_rows($check))==0)
			$storeit = mysql_query("INSERT into favouritecount(recipeid,favcount) VALUES('$id1','$favcount')");
		else 
			$storeit = mysql_query("UPDATE favouritecount SET favcount='$favcount' WHERE recipeid='$id1'");
}

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
		
    </div>



	
	<nav class="navbar navbar-inverse navbar-fixed-bottom">
	  <?php if(isset($_SESSION['uname'])): ?>
		<ul class="nav navbar-nav navbar-left">
		  <li><a href="#">Favourites</a></li>
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
					 <li><a href="signout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out &nbsp; &nbsp;</a></li>
		  </li>
		</ul>
		
	  </nav>
	  
	  <div class="row" style="background:white;">
<br><br>	  
            <?php while($rows= mysql_fetch_row($myrecipe)) { ?>
			<?php $dishname = $rows[2]; $description = $rows[3]; $cuisine = $rows[4]; $dishtype = $rows[5]; $ingredients = $rows[6]; $date = $rows[8]; $time = substr($date,0,10)?>
			<div class="row" style="background:white;" id="<?php echo $rows[0]; ?>">
			<div class="col-md-1"></div>
            <div class="col-md-2">
				 <?php if(file_exists($cwdir ."/img/recipes/" .$rows[0] .".jpg")): ?>
				  <img src="<?php echo "img/recipes/" .$rows[0] .".jpg"; ?>" style="height:200;width:200;border:3px solid black" >
				  <?php endif; ?>
				  <?php if(file_exists($cwdir ."/img/recipes/" .$rows[0] .".png")): ?>
				  <img src="<?php echo "img/recipes/" .$rows[0] .".png"; ?>" style="height:200;width:200;border:3px solid black">
				  <?php endif; ?>
				  <?php if(!file_exists($cwdir ."/img/recipes/" .$rows[0] .".jpg") && !file_exists($cwdir ."/img/recipes/" .$rows[0] .".png")): ?>
				  &nbsp &nbsp <img src="img/dish.png" style="height:200;width:200;border:3px solid black" >
				  <?php endif; ?><br><br>
				  <form method="post" enctype="multipart/form-data" action="recipepicchange.php?id=<?php echo $rows[0]; ?>">
				<input type="hidden" name="MAX_FILE_SIZE" value="512000" />
                <input id="<?php echo $rows[0]; ?>" type="file" name="recipe_picture" required/>
				<input type="submit" value="Change Picture" name="recipepic">
				</form>
				<?php
					if(!empty($_FILES))
				{
					echo "hello";
					if(file_exists($cwdir ."/img/recipes/" .$rows[0] .".jpg")) 
						unlink($cwdir ."/img/recipes/" .$rows[0] .".jpg");
					
					else if(file_exists($cwdir ."/img/recipes/" .$rows[0] .".png")) 
						unlink($cwdir ."/img/recipes/" .$rows[0] .".png");
				}
				?>
				</div>
            <div class="col-md-5">
              <a href="allrecipe.php?id=<?php echo $rows[0]; ?>" style="text-decoration:NONE"> <h3><?php echo $dishname; ?></h3></a>
			  <p class="pull-right"><span class="label label-default"><?php echo $cuisine; ?></span> <span class="label label-default"><?php echo $dishtype; ?>
			  </span>
                  <ul class="list-inline">&nbsp <li><?php echo "Uploaded on: " .$time; ?></li></ul><br>
                  <p><i>"<?php echo $description; ?>"</i></p>
                  
       
			   </div>
			  <div class="col-md-2">
			  <br><br>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <img src="img/fav-yes.png">
				<?php $current = mysql_query("SELECT * FROM favouritecount WHERE recipeid='$rows[0]'");
					$aboutcurrent = mysql_fetch_assoc($current);
					if((mysql_num_rows($current))==0) $totalfav=0; else $totalfav=$aboutcurrent['favcount']; ?>
				<h3 style="color:orange;text-align:center"> <?php echo $totalfav ." Favourites"; ?> </h3>
			  </div>
			   </div>
			   <hr>
		  <?php } ?>
		  <br><br><br><br><br>
		  </div>
            
</body>
</html>