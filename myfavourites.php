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
$myfavrecipe = mysql_query("SELECT * FROM recipe,favourites WHERE favourites.userid='$userid' AND favourites.recipeid=recipe.recipeid");

$cwdir = getcwd();

?>
<html>
  <head>
  <title>
	<?php echo $fnamee ." " .$lasname ?>
  </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="background-image:url('img/c.jpg');background-size:100%;	background-attachment: fixed;">
	

	
      
  	 <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:black;">
      <div class="container-fluid">
        <div class="navbar-header" style="position:fixed;color: white; font-family: 'Helvetica Neue', sans-serif; font-size: 17px; font-weight: bold;text-shadow: 4px 4px 2px #000000;">
            <a href="home.php"><img src="logo1.png" width="240" height="90"></a>
		  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLook for your favourites here</h1></li>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
		 
            <li style="color: #ffffff; font-family: 'Helvetica Neue', sans-serif; font-size: 37px; font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;"><br><?php echo $fnamee ." " .$lasname ?>&nbsp&nbsp</li>
			<li><img src="<?php echo "img/profile/" .$_SESSION['mail'] ."/main.jpg"; ?>"  height="80" width="80" class="img-circle" ></li>
          </ul>
        </div>
      </div>
    </nav>



	
	<nav class="navbar navbar-inverse navbar-fixed-bottom">
	  <?php if(isset($_SESSION['uname'])): ?>
		<ul class="nav navbar-nav navbar-left">
		  <li><a href="#">Favourites</a></li>
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
		
	  </nav>
	  
	  <div class="row" ">
<br>	  
<h1 style="color:red">&nbsp &nbsp Your Favourites </h1><hr>
            <?php while($rows= mysql_fetch_row($myfavrecipe)) { ?>
			<?php $dishname = $rows[2]; $description = $rows[3]; $cuisine = $rows[4]; $dishtype = $rows[5]; $ingredients = $rows[6]; $date = $rows[8]; $time = substr($date,0,10) ;$likedate = substr($rows[11],0,10); ?>
			<div class="row"  id="<?php echo $rows[0]; ?>">
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
				</div>
            <div class="col-md-5">
               <a href="allrecipe.php?id=<?php echo $rows[0]; ?>" style="text-decoration:NONE"> <h3><?php echo $dishname; ?></h3></a>
			  <p class="pull-right"><span class="label label-default"><?php echo $cuisine; ?></span> <span class="label label-default"><?php echo $dishtype; ?>
			  <?php	$id1 = $rows[0];
					$favcount = mysql_query("SELECT * FROM favourites WHERE recipeid='$id1'");
					$favcount = mysql_num_rows($favcount);
					$change = mysql_query("UPDATE favouritecount SET favcount='$favcount' WHERE recipeid='$id1'");
							?>
			   <ul class="list-inline"><li><?php echo "Uploaded on: " .$time; ?></li> <li> <i class="glyphicon glyphicon-heart"></i><?php echo " " .$favcount; ?> Favourites</li><br><li><?php echo "Liked on: " .$likedate; ?></li></ul><br>
                  <p><i>"<?php echo $description; ?>"</i></p>
                  
				
			   </div>
			 <div class="col-md-2">
			 <?php $id1 = $rows[0]; ?>
				<form method="post" action="removefav.php">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/fav-yes.png"><br><br>
				<input type="submit" class="btn btn-md" name="<?php echo $rows[0]; ?>" value="Remove From Favourites" style="color:white;background:red">
				</form>
			 </div>
			   </div>
			   <hr>
		  <?php } ?>
		  <br><br><br><br><br>
		  </div>
            
</body>
</html>