

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
</head><!--/head-->


	<?php include 'header.php';?>
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>		

              <form name="login" action="LoginHandler.php" method="post">						
							<input type="text" placeholder="Email Address" name='email' />
							<input type="password" placeholder="Password" name='password'/>
							
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form name='registration' onSubmit="return formValidation();" method=post action="RegistrationHandler.php">	
							<input type="text" id='username1' placeholder="Name" name='name' onblur="validate('username', this.value)"/>
							<input type="email" id='email1' placeholder="Email Address" name='email' onblur="validate('email', this.value)"/>
							<input type="password" id='password1' placeholder="Password" name='password' onblur="validate('password', this.value)"/>
							<button type="submit" onClick="checkForm()" class="btn btn-default" value='Submit'>Signup</button>
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