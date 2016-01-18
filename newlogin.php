

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<script src="script.js"></script>
</head><!--/head-->


	<?php include 'header.php';?>
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>		

              <form name="login" action="LoginHandler.php" method="post">						
							<fieldset>
				<legend>Create a New Account</legend>
				<p>
					<label for="name">Name:</label><br />
					<input type="text" name="name" id="name" maxlength="25" class="validate-locally" />
					<span class="demo-input-info">E.g. John Smith, must be between 3 and 25 characters, letters and spaces only</span>
					<span class="demo-errors"></span>
				</p>

				<p>
					<label for="username">Username:</label><br />
					<input type="text" name="username" id="username" maxlength="15" class="validate-locally" />
					<span class="demo-input-info">E.g. johnsmith, must be between 3 and 15 alphanumeric characters</span>
					<span class="demo-errors"></span>
				</p>

				<p>
					<label for="username">Gender:</label><br />
					<select name="gender" id="gender">
						<option value="0">- Select a Value -</option>
						<option value="1">Male</option>
						<option value="2">Female</option>
					</select>
					<span class="demo-errors"></span>
				</p>

				<p>
					<label for="email">Email Address:</label><br />
					<input type="email" name="email" id="email" class="validate-locally" />
					<span class="demo-input-info">E.g. john@company.com</span>
					<span class="demo-errors"></span>
				</p>

				<p>
					<label for="password">Password:</label><br />
					<input type="password" name="password" id="password" class="validate-locally" />
					<span class="demo-input-info">Must be 6 characters minimum, alphanumeric</span>
					<span class="demo-errors"></span>
				</p>
				
				<p>
					<label for="confirm-password">Confirm Password:</label><br />
					<input type="password" name="confirm-password" id="confirm-password" class="validate-locally" />
					<span class="demo-errors"></span>
				</p>
				
				<p>
					<input type="checkbox" id="subscribe" name="subscribe" />
					<label for="subscribe">Subscribe to newsletter</label>
				</p>

				<p>
					<input type="submit" value="Create Account" name="submit" />
				</p>
				
				<p><small><em>Note: All fields are required!</em></small></p>
				
				<div class="ajax-message"></div> <!-- end ajax-message -->
			</fieldset>
	
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	

		<?php include 'footer.php';?>
  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>


<script>

function formValidation()
{
var name = document.registration.name;
var email = document.registration.email;
var passid = document.registration.password;
if(allLetter(name))
{
if(ValidateEmail(email))
{
if(passid_validation(passid,7,12))
{
}
}
}
return false;
}

function userid_validation(uid,mx,my)
{
var uid_len = uid.value.length;
if (uid_len == 0 || uid_len >= my || uid_len < mx)
{
alert("User Id should not be empty / length be between "+mx+" to "+my);
uid.focus();
return false;
}
return true;
}

function passid_validation(passid,mx,my)
{
var passid_len = passid.value.length;
if (passid_len == 0 ||passid_len >= my || passid_len < mx)
{
alert("Password should not be empty / length be between "+mx+" to "+my);
passid.focus();
return false;
}
return true;
}

function allLetter(uname)
{ 
var letters = /^[a-zA-Z ]*$/;
if(uname.value.match(letters))
{
return true;
}
else
{
alert('name must have alphabet characters only');
uname.focus();
return false;
}
}

function alphanumeric(uadd)
{ 
var letters = /^[ A-Za-z0-9_@./#&+- ]*$/;
if(uadd.value.match(letters))
{
return true;
}
else
{
alert('User address must have alphanumeric characters only');
uadd.focus();
return false;
}
}

function ValidateEmail(uemail)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(uemail.value.match(mailformat))
{
alert("Form Succesfully Submitted");
uid.focus();
return true;
}
else
{
alert("You have entered an invalid email address!");
uemail.focus();
return false;
}
} 
</script>