<?php
error_reporting(0);
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

$getrecipe = mysql_query("SELECT * FROM recipe WHERE userid!='$userid' ORDER by uploaddate DESC");

$popularrecipe = mysql_query("SELECT * FROM recipe,favouritecount WHERE recipe.recipeid=favouritecount.recipeid AND recipe.userid!='$userid' ORDER BY favouritecount.favcount DESC");

$followersrecipe = mysql_query("SELECT * FROM recipe,follow WHERE follow.followid='$userid' AND recipe.userid=follow.userid");

$followingrecipe = mysql_query("SELECT * FROM recipe,follow WHERE follow.userid='$userid' AND recipe.userid=follow.followid");
//get favcount of all recipes

?>
<html>
  <head>
  <title>
	<?php echo $fnamee ." " .$lasname ?>
  </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="browse.css" rel="stylesheet">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
	
	  	 <nav class="navbar navbar-inverse navbar-fixed" style="background-color:black;">
      <div class="container-fluid">
        <div class="navbar-header" style="color: white; font-family: 'Helvetica Neue', sans-serif; font-size: 17px; font-weight: bold;text-shadow: 4px 4px 2px #000000;">
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
	  <?php if(isset($_SESSION['uname'])): ?>
		<ul class="nav navbar-nav navbar-left">
		  <li><a href="myfavourites.php">Favourites</a></li>
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
		    <li><a onMouseOver="this.style.background='black';this.style.color='white'" href="viewuploads.php" onMouseOut="this.style.background='#fff';this.style.color='black'" style="background:#fff;">View Your Uploads</a></li>
			</ul>
				<?php endif; ?>
					 <li><a href="signout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out&nbsp;&nbsp;</a></li>
		  </li>
		</ul>
		
	  </nav>
	  	<div id="myCarousel" class="carousel slide" data-ride="carousel">

      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
	  
      <div class="carousel-inner" role="listbox">
	  
        <div class="item active">
          <img class="first-slide" src="img/rba.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
			<h2 style="text-shadow:3px 3px 2px black;color:white">Browse amongst the thousand of recipes to find your favorite</h2>
            </div>
          </div>
        </div>
		
        <div class="item">
          <img class="second-slide" src="img/rbb.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
			<h2 style="text-shadow:3px 3px 2px black;color:white">Prepare and serve the easy, quick and budget friendly dishes</h2>
            </div>
          </div>
        </div>
		
        <div class="item">
          <img class="third-slide" src="img/rbc.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
			<h2 style="text-shadow:3px 3px 2px black;color:white">Find all type of cuisines here, from Italian to Indian, from Thai to Mexican</h2>
            </div>
          </div>
        </div>
		
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
	
	  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">Filter Recipes...</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="BrowseRecipe.php">Most Recent</a></li>
      <li><a href="BrowseRecipe.php?filter=mostpopular">Most Popular</a></li>
	  <li><a href="BrowseRecipe.php?filter=followersrecipe">From Followers</a></li>
	  <li><a href="BrowseRecipe.php?filter=followingrecipe">From Following</a></li>
    </ul>
  </div>
</nav>
	  <?php if($_GET['filter']!='mostpopular' && $_GET['filter']!='followersrecipe' && $_GET['filter']!='followingrecipe') : ?>
	  <h1 style="color:red">&nbsp Recently Uploaded Recipes	 </h1><hr>
	  <div class="row" style="background:white;"> 
            <?php while($rows= mysql_fetch_row($getrecipe)) { ?>
			<?php $dishname = $rows[2]; $description = $rows[3]; $cuisine = $rows[4]; $dishtype = $rows[5]; $ingredients = $rows[6]; $date = $rows[8]; $time = substr($date,0,10)?>
			<div class="row" style="background-image:url('img/z.jpg');background-size:120%;border:5px double black" id="<?php echo $rows[0]; ?>">
			<div class="col-md-1"></div>
            <div class="col-md-2"><br>
				 <?php if(file_exists($cwdir ."/img/recipes/" .$rows[0] .".jpg")): ?>
				  <img src="<?php echo "img/recipes/" .$rows[0] .".jpg"; ?>" style="height:200;width:200;border:3px solid black" >
				  <?php endif; ?>
				  <?php if(file_exists($cwdir ."/img/recipes/" .$rows[0] .".png")): ?>
				  <img src="<?php echo "img/recipes/" .$rows[0] .".png"; ?>" style="height:200;width:200;border:3px solid black">
				  <?php endif; ?>
				  <?php if(!file_exists($cwdir ."/img/recipes/" .$rows[0] .".jpg") && !file_exists($cwdir ."/img/recipes/" .$rows[0] .".png")): ?>
				  &nbsp &nbsp <img src="img/dish.png" style="height:200;width:200;border:3px solid black" >
				  <?php endif; ?><br>
				</div>
            <div class="col-md-5">
              <a href="allrecipe.php?id=<?php echo $rows[0]; ?>" style="text-decoration:NONE"> <h3><?php echo $dishname; ?></h3></a>
			  <p class="pull-right"><span class="label label-default"><?php echo $cuisine; ?></span> <span class="label label-default"><?php echo $dishtype; ?>
              <?php	$id1 = $rows[0];
					$favcount = mysql_query("SELECT * FROM favourites WHERE recipeid='$id1'");
					$favcount = mysql_num_rows($favcount);
					$change = mysql_query("UPDATE favouritecount SET favcount='$favcount' WHERE recipeid='$id1'");
							?>
				<?php $uploaderid = $rows[1];
					  $uploader = mysql_query("SELECT * FROM users WHERE id='$uploaderid'");
					  $uploader = mysql_fetch_assoc($uploader);
					  $uploaderfname = $uploader['firstname'];
					  $uploaderlname = $uploader['lastname']; ?>
			  <ul class="list-inline"><li><?php echo "Uploaded on: " .$time; ?></li> <li> <i class="glyphicon glyphicon-heart"></i><?php echo " " .$favcount; ?> Favourites</li><br><li>Uploaded by: <a href="peopleprofile.php?user=<?php echo $rows[1]; ?>"><?php echo $uploaderfname ." " .$uploaderlname; ?></a></li></ul><br>
			  
                  <p><i>"<?php echo $description; ?>"</i></p>
                  
       
			   </div>
			  <div class="col-md-2">
			  <br><br>
				<?php $checkfav = mysql_query("SELECT * FROM favourites WHERE userid='$userid' AND recipeid='$rows[0]'"); ?>
				<form method="post" action="addingfav.php" name="favourites">
				<?php if((mysql_num_rows($checkfav))==0) : ?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/fav-no.png"><br><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-md" name="<?php echo $rows[0]; ?>" value="Add to Favourites" style="color:white;background:red">
				<?php endif; ?>
				<?php if((mysql_num_rows($checkfav))>0) : ?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/fav-yes.png"><br><br>
				<input type="submit" class="btn btn-md" name="<?php echo $rows[0]; ?>" value="Remove From Favourites" style="color:white;background:red">
				<?php endif; ?>
				</form>
				</div>
			   </div>
			   <hr>
		  <?php } ?>
		  <br><br><br><br><br>
		  </div>
		  <?php endif; ?>
		  
		  
		  <?php if($_GET['filter']=='mostpopular') : ?>
		  <h1 style="color:red">&nbsp Most Popular Recipes</h1><hr>
		  <div class="row" style="background:white;"> 
            <?php while($rows= mysql_fetch_row($popularrecipe)) { ?>
			<?php $dishname = $rows[2]; $description = $rows[3]; $cuisine = $rows[4]; $dishtype = $rows[5]; $ingredients = $rows[6]; $date = $rows[8]; $time = substr($date,0,10)?>
			<div class="row" style="background-image:url('img/z.jpg');background-size:120%;border:5px double black" id="<?php echo $rows[0]; ?>">
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
				  <?php endif; ?>
				</div>
            <div class="col-md-5">
              <a href="allrecipe.php?id=<?php echo $rows[0]; ?>" style="text-decoration:NONE"> <h3><?php echo $dishname; ?></h3></a>
			  <p class="pull-right"><span class="label label-default"><?php echo $cuisine; ?></span> <span class="label label-default"><?php echo $dishtype; ?>
              <?php	$id1 = $rows[0];
					$favcount = mysql_query("SELECT * FROM favourites WHERE recipeid='$id1'");
					$favcount = mysql_num_rows($favcount);
							?>
			  <?php $uploaderid = $rows[1];
					  $uploader = mysql_query("SELECT * FROM users WHERE id='$uploaderid'");
					  $uploader = mysql_fetch_assoc($uploader);
					  $uploaderfname = $uploader['firstname'];
					  $uploaderlname = $uploader['lastname']; ?>
			  <ul class="list-inline"><li><?php echo "Uploaded on: " .$time; ?></li> <li> <i class="glyphicon glyphicon-heart"></i><?php echo " " .$favcount; ?> Favourites</li><br><li>Uploaded by: <a href="peopleprofile.php?user=<?php echo $rows[1]; ?>"><?php echo $uploaderfname ." " .$uploaderlname; ?></a></li></ul><br>
                  <p><?php echo $description; ?></p>
                  
       
			   </div>
			  <div class="col-md-2">
			  <br><br>
				<?php $checkfav = mysql_query("SELECT * FROM favourites WHERE userid='$userid' AND recipeid='$rows[0]'"); ?>
				<form method="post" action="addingfav.php" name="favourites">
				<?php if((mysql_num_rows($checkfav))==0) : ?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/fav-no.png"><br><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-md" name="<?php echo $rows[0]; ?>" value="Add to Favourites" style="color:white;background:red">
				<?php endif; ?>
				<?php if((mysql_num_rows($checkfav))>0) : ?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/fav-yes.png"><br><br>
				<input type="submit" class="btn btn-md" name="<?php echo $rows[0]; ?>" value="Remove From Favourites" style="color:white;background:red">
				<?php endif; ?>
				</form>
				</div>
			   </div>
			   <hr>
		  <?php } ?>
		  <br><br><br><br><br>
		  <?php endif; ?>
		  </div>
            
		 <?php if($_GET['filter']=='followersrecipe')  : ?>
		  <h1 style="color:red">&nbsp Recipes From your Followers</h1><hr>
		  <div class="row" style="background:white;"> 
            <?php while($rows= mysql_fetch_row($followersrecipe)) { ?>
			<?php $dishname = $rows[2]; $description = $rows[3]; $cuisine = $rows[4]; $dishtype = $rows[5]; $ingredients = $rows[6]; $date = $rows[8]; $time = substr($date,0,10)?>
			<div class="row" style="background-image:url('img/z.jpg');background-size:120%;border:5px double black" id="<?php echo $rows[0]; ?>">
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
				  <?php endif; ?>
				</div>
            <div class="col-md-5">
              <a href="allrecipe.php?id=<?php echo $rows[0]; ?>" style="text-decoration:NONE"> <h3><?php echo $dishname; ?></h3></a>
			  <p class="pull-right"><span class="label label-default"><?php echo $cuisine; ?></span> <span class="label label-default"><?php echo $dishtype; ?>
              <?php	$id1 = $rows[0];
					$favcount = mysql_query("SELECT * FROM favourites WHERE recipeid='$id1'");
					$favcount = mysql_num_rows($favcount);
							?>
			  <?php $uploaderid = $rows[1];
					  $uploader = mysql_query("SELECT * FROM users WHERE id='$uploaderid'");
					  $uploader = mysql_fetch_assoc($uploader);
					  $uploaderfname = $uploader['firstname'];
					  $uploaderlname = $uploader['lastname']; ?>
			  <ul class="list-inline"><li><?php echo "Uploaded on: " .$time; ?></li> <li> <i class="glyphicon glyphicon-heart"></i><?php echo " " .$favcount; ?> Favourites</li><br><li>Uploaded by: <a href="peopleprofile.php?user=<?php echo $rows[1]; ?>"><?php echo $uploaderfname ." " .$uploaderlname; ?></a></li></ul><br>
                  <p><?php echo $description; ?></p>
                  
       
			   </div>
			  <div class="col-md-2">
			  <br><br>
				<?php $checkfav = mysql_query("SELECT * FROM favourites WHERE userid='$userid' AND recipeid='$rows[0]'"); ?>
				<form method="post" action="addingfav.php" name="favourites">
				<?php if((mysql_num_rows($checkfav))==0) : ?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/fav-no.png"><br><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-md" name="<?php echo $rows[0]; ?>" value="Add to Favourites" style="color:white;background:red">
				<?php endif; ?>
				<?php if((mysql_num_rows($checkfav))>0) : ?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/fav-yes.png"><br><br>
				<input type="submit" class="btn btn-md" name="<?php echo $rows[0]; ?>" value="Remove From Favourites" style="color:white;background:red">
				<?php endif; ?>
				</form>
				</div>
			   </div>
			   <hr>
		  <?php } ?>
		  <br><br><br><br><br>
		  </div>
		  <?php endif; ?>
		  
		   <?php if($_GET['filter']=='followingrecipe')  : ?>
		  <h1 style="color:red">&nbsp Recipes From People You Follow</h1><hr>
		  <div class="row" style="background:white;"> 
            <?php while($rows= mysql_fetch_row($followingrecipe)) { ?>
			<?php $dishname = $rows[2]; $description = $rows[3]; $cuisine = $rows[4]; $dishtype = $rows[5]; $ingredients = $rows[6]; $date = $rows[8]; $time = substr($date,0,10)?>
			<div class="row"style="background-image:url('img/z.jpg');background-size:120%;border:5px double black" id="<?php echo $rows[0]; ?>">
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
				  <?php endif; ?>
				</div>
            <div class="col-md-5">
              <a href="allrecipe.php?id=<?php echo $rows[0]; ?>" style="text-decoration:NONE"> <h3><?php echo $dishname; ?></h3></a>
			  <p class="pull-right"><span class="label label-default"><?php echo $cuisine; ?></span> <span class="label label-default"><?php echo $dishtype; ?>
              <?php	$id1 = $rows[0];
					$favcount = mysql_query("SELECT * FROM favourites WHERE recipeid='$id1'");
					$favcount = mysql_num_rows($favcount);
							?>
			  <?php $uploaderid = $rows[1];
					  $uploader = mysql_query("SELECT * FROM users WHERE id='$uploaderid'");
					  $uploader = mysql_fetch_assoc($uploader);
					  $uploaderfname = $uploader['firstname'];
					  $uploaderlname = $uploader['lastname']; ?>
			  <ul class="list-inline"><li><?php echo "Uploaded on: " .$time; ?></li> <li> <i class="glyphicon glyphicon-heart"></i><?php echo " " .$favcount; ?> Favourites</li><br><li>Uploaded by: <a href="peopleprofile.php?user=<?php echo $rows[1]; ?>"><?php echo $uploaderfname ." " .$uploaderlname; ?></a></li></ul><br>
                  <p><?php echo $description; ?></p>
                  
       
			   </div>
			  <div class="col-md-2">
			  <br><br>
				<?php $checkfav = mysql_query("SELECT * FROM favourites WHERE userid='$userid' AND recipeid='$rows[0]'"); ?>
				<form method="post" action="addingfav.php" name="favourites">
				<?php if((mysql_num_rows($checkfav))==0) : ?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/fav-no.png"><br><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-md" name="<?php echo $rows[0]; ?>" value="Add to Favourites" style="color:white;background:red">
				<?php endif; ?>
				<?php if((mysql_num_rows($checkfav))>0) : ?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/fav-yes.png"><br><br>
				<input type="submit" class="btn btn-md" name="<?php echo $rows[0]; ?>" value="Remove From Favourites" style="color:white;background:red">
				<?php endif; ?>
				</form>
				</div>
			   </div>
			   <hr>
		  <?php } ?>
		  <br><br><br><br><br>
		  </div>
		  <?php endif; ?>
	  
	  
	  </body>
</html>