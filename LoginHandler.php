<?php
session_start();
$conn = mysql_connect("localhost", "root", "") or die("Couldnt connect to server, Error: ".mysql_error());
$db = mysql_select_db("moviecol", $conn) or die("Couldnt select DB, Error: ".mysql_error());
$email=$_REQUEST["email"];
$pwd=md5($_REQUEST["password"]);
$result = mysql_query("select * from users where email='$email' and password='$pwd'");
$_SESSION['LoggedIn'] = 'False';
//$result = mysql_query("select * from users where email='{$_REQUEST["email"]}' and password='({$_REQUEST["password"]}'");
if(mysql_num_rows($result)>0)
{
	$_SESSION['count']=0;
	$_SESSION['login']="1";
	$_SESSION['id']=$_REQUEST["id"];
	
	$_SESSION['name'] = $_REQUEST["name"];
	$_SESSION['email'] = $_REQUEST["email"];
	$_SESSION['password'] = $_REQUEST["password"];
	$_SESSION['LoggedIn'] = True;
	
	$sql=mysql_query("select id from users where email='{$_REQUEST["email"]}'");
	while($row=mysql_fetch_assoc($sql))
	$_SESSION['user_id'] = $row["id"];
	header('Location: http://localhost/MovieShopper/index.php');
	}
else
{
		header('Location: http://localhost/MovieShopper/login.php');
}

?>