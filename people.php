<?php
error_reporting(0);
include_once "Profile.php";
$_SESSION['currentpage'] = 'people';
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

function countfollowers()
{
	$allusers = mysql_query("SELECT * FROM users");
	while($rows = mysql_fetch_row($allusers))
	{
		$rowid = $rows[0];
		$countof = mysql_query("SELECT * FROM follow WHERE followid='$rowid'");
		$countof = mysql_num_rows($countof);
		$check = mysql_query("SELECT * FROM followercount WHERE userid='$rowid'");
		if((mysql_num_rows($check))==0)
			$storeit = mysql_query("INSERT into followercount(userid,followers) VALUES('$rowid','$countof')");
		else 
			$storeit = mysql_query("UPDATE followercount SET followers='$countof' WHERE userid='$rowid'");
	}
}

// To update the upload count in table users
$userupload = mysql_query("SELECT * FROM users,recipe WHERE users.id=recipe.userid AND users.id!='$userid'");
while($result = mysql_fetch_row($userupload))
	{
		$uid = $result[0];
		$recipecount = mysql_query("SELECT * FROM recipe WHERE userid='$uid'");
		$recipecount = mysql_num_rows($recipecount);
		$updatecount = mysql_query("UPDATE users SET uploadcount='$recipecount' WHERE id='$uid'");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title> <?php echo $fnamee ." " .$lasname ?> </title>

	<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<style>		.bgImageContainer{
    background-image:url('img/b.jpg'); 
	background-size:80%;
    width:1400px;
    height:800px;
    -webkit-filter: blur(0px) brightness(100%);

    z-index:0;
    position:fixed;
}
</style>
</head>
<body>
<div class="bgImageContainer">
</div>

	
	 <nav class="navbar navbar-inverse navbar-fixed" style="background-color:black;background-size:100%">
      <div class="container-fluid">
        <div class="navbar-header" style="color: white; font-family: 'Helvetica Neue', sans-serif; font-size: 17px; font-weight: bold;text-shadow: 4px 4px 2px #000000;">
            <a href="home.php"><img src="logo1.png" width="240" height="90"></a>
		 
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
	  <div class="container-fluid">
	  <?php if(isset($_SESSION['uname'])): ?>
		<ul class="nav navbar-nav navbar-left">
		  <li><a href="myfavourites.php">Favourites</a></li>
		  <li><a href="#">People</a></li>
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
	
	<div class="row" style="background:ivory">
	<div class="col-md-2">
			<ul class="nav nav-pills nav-stacked" style="background:black;color:red; position:fixed;" id="myTab">
			<br><h2 style="text-align:center"> Filters </h2><hr>
			<li style="color: #ffffff; font-family: 'Helvetica Neue', sans-serif; font-size: 20px; font-weight: bold;"><br><a data-toggle="tab" href="#recent" style="color:white;" onMouseOver="this.style.background='orange';this.style.color='white'" onMouseOut="this.style.background='black';this.style.color='white'"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp Recent First </a></li>
			<li style="color: #ffffff; font-family: 'Helvetica Neue', sans-serif; font-size: 20px; font-weight: bold;"><a data-toggle="tab" href="#bycountry" style="color:white;" onMouseOver="this.style.background='orange';this.style.color='white'" onMouseOut="this.style.background='black';this.style.color='white'"><i class="fa fa-flag" aria-hidden="true"></i>&nbsp By Country </a></li>
			<li style="color: #ffffff; font-family: 'Helvetica Neue', sans-serif; font-size: 20px; font-weight: bold;"><a data-toggle="tab" href="#mostpopular" style="color:white;" onMouseOver="this.style.background='orange';this.style.color='white'" onMouseOut="this.style.background='black';this.style.color='white'"><i class="fa fa-star" aria-hidden="true"></i>&nbsp Most Popular</a></li>
			
			<li style="color: #ffffff; font-family: 'Helvetica Neue', sans-serif; font-size: 20px; font-weight: bold;"><a data-toggle="tab" href="#mostuploads" style="color:white;" onMouseOver="this.style.background='orange';this.style.color='white'" onMouseOut="this.style.background='black';this.style.color='white'"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp Most Uploads</a>
			
			<br><br></li>
			<br><br><br><br><br><br><br><br>
			</ul>
			
		</div>
		<div class="col-md-10">
		<div class="tab-content"><br><br>
		<br>
		<div class="tab-pane active fade in" id="recent">
		<br><br><br>
					  <?php $people = mysql_query("SELECT * FROM users WHERE email!='$maill' ORDER BY jointime DESC"); ?>
					  <?php while($row=mysql_fetch_row($people)) { ?>
						<?php $currentid = $row[0]; $email = $row[1]; $fn = $row[4]; $ln = $row[5]; $gen = $row[6]; $birthdate = new DateTime($row[7]); $today   = new DateTime('today'); $age = $birthdate->diff($today)->y;?>		
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
						  <a href="<?php echo 'peopleprofile.php?user=' .$row[0]; ?>"><h2 class="featurette-heading" style="color: black; font-family: 'Rouge Script', cursive; font-size: 25px; font-weight: normal;  text-align: center;}"> <?php echo $fn ." " .$ln; ?>  </h2></a>
						  <p class="lead" style="color: orange; font-family: 'Verdana', sans-serif; font-size: 16px;text-align: center;"> Gender: <?php echo ucfirst($gen); ?>  |  Age: <?php echo $age; ?> | Country : <?php $ct = $row[8]; echo $ct; ?> <br> Join Date: <?php echo substr($row[10],0,10); ?></p>
						</div>
						<div class="col-md-3">
							<form action="follow.php" name="<?php echo $row[0]; ?>" method="post">
							<?php $currentid = $row[0]; $fw = mysql_query("SELECT * FROM follow WHERE userid='$userid' AND followid='$currentid'"); ?>
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
						<?php } ?>
						
						<br><br><br><br><br><br>
				</div>
		<div class="tab-pane fade in" id="bycountry">
					<form method="post" action="#" name="sortbycountry">
					<select id="user_time_zone" class="btn btn-lg" style="background:orange;color:red;" name="filterbycountry" required>
							<option value="">Country...</option>
							<option value="Afganistan">Afghanistan</option>
							<option value="Albania">Albania</option>
							<option value="Algeria">Algeria</option>
							<option value="American Samoa">American Samoa</option>
							<option value="Andorra">Andorra</option>
							<option value="Angola">Angola</option>
							<option value="Anguilla">Anguilla</option>
							<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
							<option value="Argentina">Argentina</option>
							<option value="Armenia">Armenia</option>
							<option value="Aruba">Aruba</option>
							<option value="Australia">Australia</option>
							<option value="Austria">Austria</option>
							<option value="Azerbaijan">Azerbaijan</option>
							<option value="Bahamas">Bahamas</option>
							<option value="Bahrain">Bahrain</option>
							<option value="Bangladesh">Bangladesh</option>
							<option value="Barbados">Barbados</option>
							<option value="Belarus">Belarus</option>
							<option value="Belgium">Belgium</option>
							<option value="Belize">Belize</option>
							<option value="Benin">Benin</option>
							<option value="Bermuda">Bermuda</option>
							<option value="Bhutan">Bhutan</option>
							<option value="Bolivia">Bolivia</option>
							<option value="Bonaire">Bonaire</option>
							<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
							<option value="Botswana">Botswana</option>
							<option value="Brazil">Brazil</option>
							<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
							<option value="Brunei">Brunei</option>
							<option value="Bulgaria">Bulgaria</option>
							<option value="Burkina Faso">Burkina Faso</option>
							<option value="Burundi">Burundi</option>
							<option value="Cambodia">Cambodia</option>
							<option value="Cameroon">Cameroon</option>
							<option value="Canada">Canada</option>
							<option value="Canary Islands">Canary Islands</option>
							<option value="Cape Verde">Cape Verde</option>
							<option value="Cayman Islands">Cayman Islands</option>
							<option value="Central African Republic">Central African Republic</option>
							<option value="Chad">Chad</option>
							<option value="Channel Islands">Channel Islands</option>
							<option value="Chile">Chile</option>
							<option value="China">China</option>
							<option value="Christmas Island">Christmas Island</option>
							<option value="Cocos Island">Cocos Island</option>
							<option value="Colombia">Colombia</option>
							<option value="Comoros">Comoros</option>
							<option value="Congo">Congo</option>
							<option value="Cook Islands">Cook Islands</option>
							<option value="Costa Rica">Costa Rica</option>
							<option value="Cote DIvoire">Cote D'Ivoire</option>
							<option value="Croatia">Croatia</option>
							<option value="Cuba">Cuba</option>
							<option value="Curaco">Curacao</option>
							<option value="Cyprus">Cyprus</option>
							<option value="Czech Republic">Czech Republic</option>
							<option value="Denmark">Denmark</option>
							<option value="Djibouti">Djibouti</option>
							<option value="Dominica">Dominica</option>
							<option value="Dominican Republic">Dominican Republic</option>
							<option value="East Timor">East Timor</option>
							<option value="Ecuador">Ecuador</option>
							<option value="Egypt">Egypt</option>
							<option value="El Salvador">El Salvador</option>
							<option value="Equatorial Guinea">Equatorial Guinea</option>
							<option value="Eritrea">Eritrea</option>
							<option value="Estonia">Estonia</option>
							<option value="Ethiopia">Ethiopia</option>
							<option value="Falkland Islands">Falkland Islands</option>
							<option value="Faroe Islands">Faroe Islands</option>
							<option value="Fiji">Fiji</option>
							<option value="Finland">Finland</option>
							<option value="France">France</option>
							<option value="French Guiana">French Guiana</option>
							<option value="French Polynesia">French Polynesia</option>
							<option value="French Southern Ter">French Southern Ter</option>
							<option value="Gabon">Gabon</option>
							<option value="Gambia">Gambia</option>
							<option value="Georgia">Georgia</option>
							<option value="Germany">Germany</option>
							<option value="Ghana">Ghana</option>
							<option value="Gibraltar">Gibraltar</option>
							<option value="Great Britain">Great Britain</option>
							<option value="Greece">Greece</option>
							<option value="Greenland">Greenland</option>
							<option value="Grenada">Grenada</option>
							<option value="Guadeloupe">Guadeloupe</option>
							<option value="Guam">Guam</option>
							<option value="Guatemala">Guatemala</option>
							<option value="Guinea">Guinea</option>
							<option value="Guyana">Guyana</option>
							<option value="Haiti">Haiti</option>
							<option value="Hawaii">Hawaii</option>
							<option value="Honduras">Honduras</option>
							<option value="Hong Kong">Hong Kong</option>
							<option value="Hungary">Hungary</option>
							<option value="Iceland">Iceland</option>
							<option value="India">India</option>
							<option value="Indonesia">Indonesia</option>
							<option value="Iran">Iran</option>
							<option value="Iraq">Iraq</option>
							<option value="Ireland">Ireland</option>
							<option value="Isle of Man">Isle of Man</option>
							<option value="Israel">Israel</option>
							<option value="Italy">Italy</option>
							<option value="Jamaica">Jamaica</option>
							<option value="Japan">Japan</option>
							<option value="Jordan">Jordan</option>
							<option value="Kazakhstan">Kazakhstan</option>
							<option value="Kenya">Kenya</option>
							<option value="Kiribati">Kiribati</option>
							<option value="Korea North">Korea North</option>
							<option value="Korea Sout">Korea South</option>
							<option value="Kuwait">Kuwait</option>
							<option value="Kyrgyzstan">Kyrgyzstan</option>
							<option value="Laos">Laos</option>
							<option value="Latvia">Latvia</option>
							<option value="Lebanon">Lebanon</option>
							<option value="Lesotho">Lesotho</option>
							<option value="Liberia">Liberia</option>
							<option value="Libya">Libya</option>
							<option value="Liechtenstein">Liechtenstein</option>
							<option value="Lithuania">Lithuania</option>
							<option value="Luxembourg">Luxembourg</option>
							<option value="Macau">Macau</option>
							<option value="Macedonia">Macedonia</option>
							<option value="Madagascar">Madagascar</option>
							<option value="Malaysia">Malaysia</option>
							<option value="Malawi">Malawi</option>
							<option value="Maldives">Maldives</option>
							<option value="Mali">Mali</option>
							<option value="Malta">Malta</option>
							<option value="Marshall Islands">Marshall Islands</option>
							<option value="Martinique">Martinique</option>
							<option value="Mauritania">Mauritania</option>
							<option value="Mauritius">Mauritius</option>
							<option value="Mayotte">Mayotte</option>
							<option value="Mexico">Mexico</option>
							<option value="Midway Islands">Midway Islands</option>
							<option value="Moldova">Moldova</option>
							<option value="Monaco">Monaco</option>
							<option value="Mongolia">Mongolia</option>
							<option value="Montserrat">Montserrat</option>
							<option value="Morocco">Morocco</option>
							<option value="Mozambique">Mozambique</option>
							<option value="Myanmar">Myanmar</option>
							<option value="Nambia">Nambia</option>
							<option value="Nauru">Nauru</option>
							<option value="Nepal">Nepal</option>
							<option value="Netherland Antilles">Netherland Antilles</option>
							<option value="Netherlands">Netherlands (Holland, Europe)</option>
							<option value="Nevis">Nevis</option>
							<option value="New Caledonia">New Caledonia</option>
							<option value="New Zealand">New Zealand</option>
							<option value="Nicaragua">Nicaragua</option>
							<option value="Niger">Niger</option>
							<option value="Nigeria">Nigeria</option>
							<option value="Niue">Niue</option>
							<option value="Norfolk Island">Norfolk Island</option>
							<option value="Norway">Norway</option>
							<option value="Oman">Oman</option>
							<option value="Pakistan">Pakistan</option>
							<option value="Palau Island">Palau Island</option>
							<option value="Palestine">Palestine</option>
							<option value="Panama">Panama</option>
							<option value="Papua New Guinea">Papua New Guinea</option>
							<option value="Paraguay">Paraguay</option>
							<option value="Peru">Peru</option>
							<option value="Phillipines">Philippines</option>
							<option value="Pitcairn Island">Pitcairn Island</option>
							<option value="Poland">Poland</option>
							<option value="Portugal">Portugal</option>
							<option value="Puerto Rico">Puerto Rico</option>
							<option value="Qatar">Qatar</option>
							<option value="Republic of Montenegro">Republic of Montenegro</option>
							<option value="Republic of Serbia">Republic of Serbia</option>
							<option value="Reunion">Reunion</option>
							<option value="Romania">Romania</option>
							<option value="Russia">Russia</option>
							<option value="Rwanda">Rwanda</option>
							<option value="St Barthelemy">St Barthelemy</option>
							<option value="St Eustatius">St Eustatius</option>
							<option value="St Helena">St Helena</option>
							<option value="St Kitts-Nevis">St Kitts-Nevis</option>
							<option value="St Lucia">St Lucia</option>
							<option value="St Maarten">St Maarten</option>
							<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
							<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
							<option value="Saipan">Saipan</option>
							<option value="Samoa">Samoa</option>
							<option value="Samoa American">Samoa American</option>
							<option value="San Marino">San Marino</option>
							<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
							<option value="Saudi Arabia">Saudi Arabia</option>
							<option value="Senegal">Senegal</option>
							<option value="Serbia">Serbia</option>
							<option value="Seychelles">Seychelles</option>
							<option value="Sierra Leone">Sierra Leone</option>
							<option value="Singapore">Singapore</option>
							<option value="Slovakia">Slovakia</option>
							<option value="Slovenia">Slovenia</option>
							<option value="Solomon Islands">Solomon Islands</option>
							<option value="Somalia">Somalia</option>
							<option value="South Africa">South Africa</option>
							<option value="Spain">Spain</option>
							<option value="Sri Lanka">Sri Lanka</option>
							<option value="Sudan">Sudan</option>
							<option value="Suriname">Suriname</option>
							<option value="Swaziland">Swaziland</option>
							<option value="Sweden">Sweden</option>
							<option value="Switzerland">Switzerland</option>
							<option value="Syria">Syria</option>
							<option value="Tahiti">Tahiti</option>
							<option value="Taiwan">Taiwan</option>
							<option value="Tajikistan">Tajikistan</option>
							<option value="Tanzania">Tanzania</option>
							<option value="Thailand">Thailand</option>
							<option value="Togo">Togo</option>
							<option value="Tokelau">Tokelau</option>
							<option value="Tonga">Tonga</option>
							<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
							<option value="Tunisia">Tunisia</option>
							<option value="Turkey">Turkey</option>
							<option value="Turkmenistan">Turkmenistan</option>
							<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
							<option value="Tuvalu">Tuvalu</option>
							<option value="Uganda">Uganda</option>
							<option value="Ukraine">Ukraine</option>
							<option value="United Arab Erimates">United Arab Emirates</option>
							<option value="United Kingdom">United Kingdom</option>
							<option value="United States of America">United States of America</option>
							<option value="Uraguay">Uruguay</option>
							<option value="Uzbekistan">Uzbekistan</option>
							<option value="Vanuatu">Vanuatu</option>
							<option value="Vatican City State">Vatican City State</option>
							<option value="Venezuela">Venezuela</option>
							<option value="Vietnam">Vietnam</option>
							<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
							<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
							<option value="Wake Island">Wake Island</option>
							<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
							<option value="Yemen">Yemen</option>
							<option value="Zaire">Zaire</option>
							<option value="Zambia">Zambia</option>
							<option value="Zimbabwe">Zimbabwe</option>
						</select> &nbsp &nbsp
						<button type="submit" name="bycountry" style="background:yellow" class="btn-lg fa fa-search"></button>	
						</form><br>
						<?php if(!isset($_POST['bycountry'])) : ?>
						<h3 style="color:orange"> People From All over the World<hr>
					  <?php $people1 = mysql_query("SELECT * FROM users WHERE email!='$maill' ORDER BY country"); ?>
					  <?php while($row=mysql_fetch_row($people1)) { ?>
						<?php $currentid = $row[0]; $email = $row[1]; $fn = $row[4]; $ln = $row[5]; $gen = $row[6]; $birthdate = new DateTime($row[7]); $today   = new DateTime('today'); $age = $birthdate->diff($today)->y;?>		
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
						  <a href="<?php echo 'peopleprofile.php?user=' .$row[0]; ?>"><h2 class="featurette-heading" style="color: black; font-family: 'Rouge Script', cursive; font-size: 25px; font-weight: normal;  text-align: center;}"> <?php echo $fn ." " .$ln; ?>  </h2></a>
						  <p class="lead" style="color: orange; font-family: 'Verdana', sans-serif; font-size: 16px;text-align: center;"> Gender: <?php echo ucfirst($gen); ?>  |  Age: <?php echo $age; ?> | Country : <?php $ct = $row[8]; echo $ct; ?></p>
						</div>
						<div class="col-md-3">
							<form action="follow.php" name="<?php echo $row[1]; ?>" method="post">
							<?php $currentid = $row[0]; $fw = mysql_query("SELECT * FROM follow WHERE userid='$userid' AND followid='$currentid'"); ?>
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
						<?php } ?>
						<?php endif; ?>
						<?php if(isset($_POST['bycountry'])) : ?>
						<?php $cntry = $_POST['filterbycountry'];?>
						<h3 style="color:orange"> People From <?php echo $cntry; ?><hr>
					  <?php $people1 = mysql_query("SELECT * FROM users WHERE email!='$maill' AND country='$cntry'"); ?>
					  <h4 style="color:red"><?php if((mysql_num_rows($people1))==0) echo "No Entries Found !"; ?></h4>
					  <?php while($row=mysql_fetch_row($people1)) { ?>
						<?php $currentid = $row[0]; $email = $row[1]; $fn = $row[4]; $ln = $row[5]; $gen = $row[6]; $birthdate = new DateTime($row[7]); $today   = new DateTime('today'); $age = $birthdate->diff($today)->y;?>		
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
						  <a href="<?php echo 'peopleprofile.php?user=' .$row[0]; ?>"><h2 class="featurette-heading" style="color: black; font-family: 'Rouge Script', cursive; font-size: 25px; font-weight: normal;  text-align: center;}"> <?php echo $fn ." " .$ln; ?>  </h2></a>
						  <p class="lead" style="color: orange; font-family: 'Verdana', sans-serif; font-size: 16px;text-align: center;"> Gender: <?php echo ucfirst($gen); ?>  |  Age: <?php echo $age; ?> | Country : <?php $ct = $row[8]; echo $ct; ?> <br> Join Date: <?php echo substr($row[10],0,10); ?></p>
						</div>
						<div class="col-md-3">
							<form action="follow.php" name="<?php echo $row[0]; ?>" method="post">
							<?php $currentid = $row[0]; $fw = mysql_query("SELECT * FROM follow WHERE userid='$userid' AND followid='$currentid'"); ?>
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
						<?php } ?>
						<?php endif; ?>
						<br><br><br><br><br><br>
				</div>
				
				<div class="tab-pane fade in" id="mostpopular">
				<br><br><br>
					  <?php countfollowers(); ?>	
					  <?php $people2 = mysql_query("SELECT * FROM users, followercount WHERE users.id=followercount.userid AND users.id!='$userid' ORDER BY followercount.followers DESC"); ?>
					  <?php while($row=mysql_fetch_row($people2)) { ?>
						<?php $currentid = $row[0]; $email = $row[1]; $fn = $row[4]; $ln = $row[5]; $gen = $row[6]; $birthdate = new DateTime($row[7]); $today   = new DateTime('today'); $age = $birthdate->diff($today)->y;?>		
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
						  <a href="<?php echo 'peopleprofile.php?user=' .$row[0]; ?>"><h2 class="featurette-heading" style="color: black; font-family: 'Rouge Script', cursive; font-size: 25px; font-weight: normal;  text-align: center;}"> <?php echo $fn ." " .$ln; ?>  </h2></a>
						  <p class="lead" style="color: orange; font-family: 'Verdana', sans-serif; font-size: 16px;text-align: center;"> Gender: <?php echo ucfirst($gen); ?>  |  Age: <?php echo $age; ?> | Country : <?php $ct = $row[8]; echo $ct; ?> <br> Followers : <?php echo $row[15]; ?></p>
						</div>
						<?php if($maill != $email): ?> 
						<div class="col-md-3">
							<form action="follow.php" name="<?php echo $row[0]; ?>" method="post">
							<?php $currentid = $row[0]; $fw = mysql_query("SELECT * FROM follow WHERE userid='$userid' AND followid='$currentid'"); ?>
							<input type="hidden" name="<?php echo $row[0]; ?>" value="follow">
							<?php $_SESSION['peoples'] = $people; ?>
							<?php if((mysql_num_rows($fw))>0): ?>
							<br>
							<input type="submit" name="<?php echo $row[0]; ?>" value="Following" class="btn-primary btn-lg" align="middle" style="background-color:purple">
							<?php endif; ?>
							<?php if((mysql_num_rows($fw))==0): ?>
							<br>
							<input type="submit" name="<?php echo $row[0]; ?>" value="Follow" class="btn-primary btn-lg" align="middle" style="background-color:orange">
							<?php endif; ?>
						 </form>
						</div>
						<?php endif; ?>
						</div>
						<br>
						<hr>
						<?php } ?>
						
						<br><br><br><br><br><br>
				</div>
				
				<div class="tab-pane fade in" id="mostuploads">
				<br><br><br>	
					  <?php $people3 = mysql_query("SELECT * FROM users WHERE id!='$userid' ORDER BY uploadcount DESC"); ?>
					  <?php while($row=mysql_fetch_row($people3)) { ?>
						<?php $currentid = $row[0]; $email = $row[1]; $fn = $row[4]; $ln = $row[5]; $gen = $row[6]; $birthdate = new DateTime($row[7]); $today   = new DateTime('today'); $age = $birthdate->diff($today)->y;?>		
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
						  <a href="<?php echo 'peopleprofile.php?user=' .$row[0]; ?>"><h2 class="featurette-heading" style="color: black; font-family: 'Rouge Script', cursive; font-size: 25px; font-weight: normal;  text-align: center;}"> <?php echo $fn ." " .$ln; ?>  </h2></a>
						  <p class="lead" style="color: orange; font-family: 'Verdana', sans-serif; font-size: 16px;text-align: center;"> Gender: <?php echo ucfirst($gen); ?>  |  Age: <?php echo $age; ?> | Country : <?php $ct = $row[8]; echo $ct; ?> <br> Number of Recipes Uploaded : <?php echo $row[13]; ?></p>
						</div>
						<?php if($maill != $email): ?> 
						<div class="col-md-3">
							<form action="follow.php" name="<?php echo $row[0]; ?>" method="post">
							<?php $currentid = $row[0]; $fw = mysql_query("SELECT * FROM follow WHERE userid='$userid' AND followid='$currentid'"); ?>
							<input type="hidden" name="<?php echo $row[0]; ?>" value="follow">
							<?php $_SESSION['peoples'] = $people; ?>
							<?php if((mysql_num_rows($fw))>0): ?>
							<br>
							<input type="submit" name="<?php echo $row[0]; ?>" value="Following" class="btn-primary btn-lg" align="middle" style="background-color:purple">
							<?php endif; ?>
							<?php if((mysql_num_rows($fw))==0): ?>
							<br>
							<input type="submit" name="<?php echo $row[0]; ?>" value="Follow" class="btn-primary btn-lg" align="middle" style="background-color:orange">
							<?php endif; ?>
						 </form>
						</div>
						<?php endif; ?>
						</div>
						<br>
						<hr>
						<?php } ?>
						
						<br><br><br><br><br><br>
				</div>
				</div>				
	</div>
	</div>
</body>
</html>