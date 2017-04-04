<?php
//session_start();
include_once "Profile.php";
$cwdir = getcwd();
if(isset($_SESSION['mail']))
{
	$var1 = $_SESSION['mail'];
}
else
{
	header("HTTP/1.1 403 Forbidden");
	die();
}
if(isset($_SESSION['uname']))
{
	$var2 = $_SESSION['uname'];
	$var3 = $_SESSION['laname'];
	$var2 = ucfirst($var2);
	$var3 = ucfirst($var3);
	//Creating a user folder
	$path = $cwdir ."/img/profile/" .$var1;
	$_SESSION['imgpath'] = $path;
		if(!is_dir($path))
		{
			mkdir($cwdir ."/img/profile/" .$var1);
		}
//		else
//		{
//			echo "failed";
//		}
}
//echo $var1;

include_once 'connections.php';
//$x = mysql_query("SELECT id from users WHERE email='$var1'");
//$y = mysql_fetch_assoc($x);
//$z = $y['id'];
//echo $z;
if(isset($_POST['submit']))
		{
			$fname = mysql_real_escape_string($_POST['firstname']);
			$lname = mysql_real_escape_string($_POST['lastname']);
			$_SESSION['laname'] = $lname;
			if(!isset($_SESSION['uname']))
			{
				$gender = mysql_real_escape_string($_POST['gender']);
				$dob = $_POST['date'];
			}
			$country = mysql_real_escape_string($_POST['country']);
			$known = mysql_real_escape_string($_POST['known']);
			$interests = mysql_real_escape_string($_POST['interests']);
			if(($_POST['pro'])=="yes")
				$pro=1;	
			else $pro = 0;
			if(!isset($_SESSION['uname']))
			{
				if(mysql_query("UPDATE users SET firstname='$fname',lastname='$lname',gender='$gender',dob='$dob',country='$country',pro='$pro',known='$known',interests='$interests' WHERE email='$var1'"))
				{
					$_SESSION['uname'] = $fname;
					header("Location: MyProfile.php");
					
				}
			}
			else if(isset($_SESSION['uname']))
			{
				if(mysql_query("UPDATE users SET firstname='$fname',lastname='$lname',country='$country',pro='$pro',known='$known',interests='$interests' WHERE email='$var1'"))
				{
					header("Location: MyProfile.php");
				}
			}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title> <?php if(isset($_SESSION['uname'])) echo $fnamee ." " .$lasname; else echo $_SESSION['mail']; ?> </title>

	<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
</head>
 <body>
	  
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
       <!-- edit form column -->
	   
	  <div class="row" style="background-image:url(img/m.jpg);background-size:cover;">
	   <br><br><br><br>
	   <?php if(!isset($_SESSION['uname'])): ?>
	   <h2 style="color:orange"> &nbsp &nbsp Please Provide Following Details before Continuing </h2>
	   <?php endif; ?>
	   <?php if(isset($_SESSION['uname'])): ?>
	   <h2 style="color:orange"> &nbsp &nbsp Edit Your Personal Informations </h2>
	   <?php endif; ?>
	   <br>	
	  <div class="col-md-2">
	  </div>
	  
      <div class="col-md-7">
	  
		<br>
        <form method="post" class="form-horizontal" role="form" style="color:white;">
          <div class="form-group">
            <label class="col-lg-3 control-label" style="color:red;">First name:</label>
            <div class="col-lg-5">
              <input class="form-control" type="text" autocomplete="off" name="firstname" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-5">
              <input class="form-control" type="text" autocomplete="off" name="lastname" required>
            </div>
          </div>
		  <?php if(!isset($_SESSION['uname'])): ?>
          <div class="form-group">
            <label class="col-lg-3 control-label" style="color:red;">Gender:</label>
            <div class="col-lg-5">
              <input  type="radio" name="gender" value="male" required>Male
			  <input  type="radio" name="gender" value="female">Female
			  <input  type="radio" name="gender" value="other">Other
            </div>
          </div>
		  <?php endif; ?>
		  <?php if(!isset($_SESSION['uname'])): ?>
		  <div class="form-group">
            <label class="col-lg-3 control-label">Date of Birth:</label>
            <div class="col-lg-5">
              <input class="form-control" type="date" name="date">
            </div>
          </div>
          <?php endif; ?>
          <div class="form-group">
            <label class="col-lg-3 control-label" style="color:red;">Country:</label>
            <div class="col-lg-5">
              <div class="ui-select">
                <select id="user_time_zone" class="form-control" name="country" required>
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
						</select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Are you a professional chef ?:</label>
            <div class="col-md-5">
              <input  type="radio" name="pro" value="yes" required>Yes
			  <input  type="radio" name="pro" value="no">No
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" autocomplete="off" style="color:red;">Known Cuisines:</label>
            <div class="col-lg-5">
              <input class="form-control" type="text" name="known" placeholder="japanese,indian,chinese etc">
            </div>
          </div>
		  <div class="form-group">
            <label class="col-md-3 control-label" autocomplete="off">Interesting Cuisines:</label>
            <div class="col-lg-5">
              <input class="form-control" type="text" name="interests" placeholder="japanese,indian,chinese etc">
            </div>
          </div>
		  <br>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-5">
              <input type="submit" name="submit" class="btn btn-lg" style="background:orange" value="Submit">
              <span></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              <input type="reset" class="btn btn-lg" style="background:red" value="Reset"><br><br><br><br><br><br><br>
            </div>
			
          </div>
		  <br><br><br><br><br><br><br>
        </form>
		
      </div>
	  
	  <div class="col-md-2">
	  
        <div class="text-center">
		  <form enctype="multipart/form-data" action="profilepicupdate.php" method="POST">
		  <h3 style="color:orange" align="middle"> Profile Picture </h3>
		  <hr>
		  <?php if(isset($_SESSION['currentpic'])): ?>
		  <img src="<?php echo substr($_SESSION['currentpic'],26); ?>" height="120px" width="150px" alt="<?php echo $_SESSION['mail']; ?>">
		  <?php endif; ?>
		  <?php if(!isset($_SESSION['currentpic'])): ?>
		  <?php if(file_exists($cwdir ."/img/profile/" .$_SESSION['mail'] ."/main.jpg")): ?>
		  <img src="<?php echo "img/profile/" .$_SESSION['mail'] ."/main.jpg"; ?>" style='height:120px;width:150px'>
		  <?php endif; ?>
		  <?php if(file_exists($cwdir ."/img/profile/" .$_SESSION['mail'] ."/main.png")): ?>
		  <img src="<?php echo "img/profile/" .$_SESSION['mail'] ."/main.png"; ?>" style='height:120px;width:150px'>
		  <?php endif; ?>
		  <?php if(!file_exists($cwdir ."/img/profile/" .$_SESSION['mail'] ."/main.jpg") && !file_exists($cwdir ."/img/profile/" .$_SESSION['mail'] ."/main.png")): ?>
		  <img src="img/user.jpg" class="avatar img-circle" alt="avatar">
		  <?php endif; ?>
		  <?php endif; ?>
		  <br><br>
		  <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
          <input type="file" style="color:red" name="profilepic" required/>
		  <input type="submit" value="Update" style="color:black">
		  </form>
		  <hr>
		  <?php
			if(!empty($_FILES))
				{
				
					if(file_exists($path ."/main.png")) unlink($path ."/main.png");
					if(file_exists($path ."/main.jpg")) unlink($path ."/main.jpg");
				}
				
		  ?>
        </div>
      </div>	
	  
</div>	
 
</body>
</html>