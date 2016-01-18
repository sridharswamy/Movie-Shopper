<?php
session_start();
echo '


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product Details | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet"
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
</head><!--/head-->';
 include 'header.php';
print '

	<section>
		<div class="container">
			<div class="row">';
	 include 'leftbar.php';
if (!$_POST) {
	die("This file cannot be accessed directly!");
}


$expEmail = 			'/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
$expLettersOnly = 		'/^[a-zA-Z ]+$/';
$expLettersNumbers = 	'/^[a-zA-Z0-9]*$/';


function validateLength($fieldValue, $minLength) {
	return (strlen(trim($fieldValue)) > $minLength);
}



$name 				= $_POST["name"];


$email 				= $_POST["email"];	
$password 			= $_POST["password"];	

$errorExists 		= false;
$errors 			= "\tErrors: <ul>";

// Name
if (!validateLength($name, 2)) {
	$errorExists = true;
	$errors .= "<li>The name is too short!</li>";
}
if (preg_match($expLettersOnly, $name) !== 1) {
	$errorExists = true;
	$errors .= "<li>The name can only contain letters and spaces!</li>";
}


// Email
if (preg_match($expEmail, $email) !== 1) {
	$errorExists = true;
	$errors .= "<li>The email address format is invalid!</li>";
}

// Password
if (!validateLength($password, 5)) {
	$errorExists = true;
	$errors .= "<li>The password is too short!</li>";
}
if (preg_match($expLettersNumbers, $password) !== 1) {
	$errorExists = true;
	$errors .= "<li>The password can only contain alphanumeric characters!</li>";
}


$conn = mysql_connect("localhost", "root", "") or die("Couldnt connect to server, Error: ".mysql_error());
$db = mysql_select_db("moviecol", $conn) or die("Couldnt select DB, Error: ".mysql_error());
$email=$_REQUEST["email"];
$pwd=md5($_REQUEST["password"]);
$result = mysql_query("select * from users where email='$email'");
if(mysql_num_rows($result)>0)
{
$errorExists = true;
$errors .= "<li>The email id is already in use!</li>";
}
else
{
$sql = "INSERT INTO users VALUES('','".$name."','".$email."','".md5($password)."')";
$query = mysql_query($sql);	//order executes
}


// If no errors, echo the results
if (!$errorExists) {
	echo "<h3>Success! The form has been submitted!</h3>"
		. "<p>Details:</p>"
		. "<ul>"
		. "<li>Name: $name</li>"
		. "<li>Email: $email</li>"
		. "</ul>";
} else {
	echo "<center><h3>Error! Please address the following issues!</h3><b>"
		. $errors;
	echo "</b><a href=login.php> Go back to Login Page!</a>";
}	
?>