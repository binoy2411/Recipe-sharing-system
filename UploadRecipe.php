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

// Adding to Database recipeupload
if(isset($_POST['recipeupload']))
{
	$dishname = mysql_real_escape_string($_POST['dishname']);
	$description = mysql_real_escape_string($_POST['description']);
	$cuisine = mysql_real_escape_string($_POST['cuisine']);
	$dishtype = mysql_real_escape_string($_POST['dishtype']);
	$ingredients = mysql_real_escape_string($_POST['ingredients']);
	$instructions = mysql_real_escape_string($_POST['instructions']);
	$recipeadd = mysql_query("INSERT INTO recipe(userid,dishname,description,cuisine,dishtype,ingredients,instructions) VALUES('$userid','$dishname','$description','$cuisine','$dishtype','$ingredients','$instructions')");
	$_SESSION['uploadstatus']='ok';
	header("Location: MyProfile.php");
}
?>
<!DOCTYPE html>
<head>
<title>Upload Your Recipe</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
<style>
body{
	
	background-image: url('img/n.jpg');
	background-size: cover;
	background-attachment: fixed;

}
</style>	
</head>
<body>
	  	 <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:black;">
      <div class="container-fluid">
        <div class="navbar-header" style="position:fixed;color: white; font-family: 'Helvetica Neue', sans-serif; font-size: 17px; font-weight: bold;text-shadow: 4px 4px 2px #000000;">
            <a href="home.php"><img src="logo1.png" width="240" height="90"></a>
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspUpload your recipe here and let others check it out
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
					 <li><a href="signout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
		  </li>
		</ul>
		
	  </div>
	</nav>
	

    <br><br><br><br><br>
	<br>
    <div class="row" style="color:white">
      <div class="col-md-7">
        <form class="form-horizontal" action="#" method="post" role="form" style="color:white;font-family:Georgia, Serif;text-shadow: 2px 2px 2px black;font-size:20px;"><br>
          <div class="form-group">
            <label class="col-lg-3 control-label">Dish name:</label>
            <div class="col-lg-3">
              <input class="form-control" type="text" name="dishname" placeholder="Sushi" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Description:</label>
            <div class="col-lg-7">
              <textarea name="description" class="form-control"  rows="7"  style="background-image:url('img/o.jpg');background-size: 100%;" placeholder="Sushi is one of the most famous dishes in japan" required></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label" >Cuisine:</label>
             <div class="col-lg-3">
             <select name="cuisine" class="form-control" placeholder="Japanese" required>
						<option value="African">African</option>
						<option value="American">American</option>
						<option value="Asian">Asian</option>
						<option value="Caribbean">Caribbean</option>
						<option value="Chinese">Chinese</option>
						<option value="French">French</option>
						<option value="Greek">Greek</option>
						<option value="Indian">Indian</option>
						<option value="Italian">Italian</option>
						<option value="Japanese">Japanese</option>
						<option value="Jewish">Jewish</option>
						<option value="Mediterranean">Mediterranean</option>
						<option value="Mexican">Mexican</option>
						<option value="Middle Eastern">Middle Eastern</option>
						<option value="Moroccan">Moroccan</option>
						<option value="Spanish">Spanish</option>
						<option value="Thai">Thai</option>
						<option value="Other">Other</option>
				</select>
            </div>
          </div>
		     <div class="form-group">
           <label class="col-lg-3 control-label" >Dish type:</label>
            <div class="col-lg-3">
             <select name="dishtype" class="form-control" required>
						<option value="Appetizer">Appetizer</option>
						<option value="Beverage">Beverage</option>
						<option value="Dessert">Dessert</option>
						<option value="Main">Main</option>
						<option value="Snacks">Snacks</option>
						<option value="Salad">Salad</option>
						<option value="Soup">Soup</option>
						<option value="Side Dish : Grains">Side Dish : Grains</option>
					    <option value="Side Dish : Pasta">Side Dish : Pasta</option>
						<option value="Side Dish : Potato">Side Dish : Potato</option>
						<option value="Side Dish : Vegetable">Side Dish : Vegetable</option>
			</select>
            </div>
          </div>
		  <div class="form-group">
            <label class="col-lg-3 control-label">Ingredients:</label>
            <div class="col-lg-7">
              <textarea name="ingredients" class="form-control"  rows="7" placeholder="*Enter New Ingredients in New Line.." style="background-image:url('img/o.jpg');background-size: 100%;" required></textarea>
            </div>
          </div>
		  <div class="form-group">
            <label class="col-lg-3 control-label" >Instructions:</label>
            <div class="col-lg-7">
              <textarea name="instructions" class="form-control"  rows="10" placeholder="*Each Step in New Line.." style="background-image:url('img/o.jpg');background-repeat:no-repeat;background-size: 100% 180%;" required></textarea>
            </div>
          </div>
		  <br>
		  <div class="form-group">
           <label class="col-lg-5 control-label"></label><input type="submit" name="recipeupload" value="Upload Your Recipe" style="background:white;color:red" class="btn btn-lg">
          </div> 
		  <br><br><br><br>
        </form>
      </div>
	 <div class="col-md-1">
		 <br><br><br>
         <h1 style="color: white; font-family: 'Rouge Script', cursive; font-size: 35px; font-weight: normal;text-shadow: 2px 2px 2px red;position:fixed">"Part of the secret of success in life is to eat what you like and let the food fight it out inside."<br><br>&nbsp&nbsp-Mark Twain<br><br><br><br><br><br><br><br></h1>
	     </div>
  </div>
  </div>
</body>