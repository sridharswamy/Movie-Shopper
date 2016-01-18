
<?php
$conn = mysql_connect("localhost","root","");
$db=mysql_select_db("moviecol", $conn);

$name=$_POST['name'];
$email=$_POST['email'];
$pwd=md5($_POST['password']);

//inserting data order
 $sql = "INSERT INTO users VALUES('','".$name."','".$email."','".$pwd."')";

//declare in the order variable
$query = mysql_query($sql);	//order executes
if(!$query){
	echo "Registration Failed. Please retry!";
	//echo "<script>
//alert('There are no fields to generate a report');
//</script>";
//header("Location: http://localhost/bookstore/register.php");
	header('Refresh:2,url=http://localhost/MovieShopper/login.php');

	} else{
	echo "Successful";
	
	header("Location: http://localhost/MovieShopper/login.php");

	}
?>


