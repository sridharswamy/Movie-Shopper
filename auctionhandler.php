
<?php
session_start();
$conn = mysql_connect("localhost","root","");
$db=mysql_select_db("moviecol", $conn);
$bidderid=$_SESSION['user_id'];
$auctionitemid=$_SESSION['auctionitemid'];
$bid=$_POST['bid'];

echo 'Bidder id: '. $bidderid.'<br>';
echo 'Item id: '. $auctionitemid.'<br>';
echo 'Bid Amount: '.$bid.'<br>';
//inserting data order
 $sql = "INSERT INTO auctiondata VALUES('','".$bidderid."','".$auctionitemid."','".$bid."')";

//declare in the order variable
$query = mysql_query($sql);	//order executes
if(!$query){
	echo "Registration Failed. Please retry!";
	//echo "<script>
//alert('There are no fields to generate a report');
//</script>";
//header("Location: http://localhost/bookstore/register.php");
//	header('Refresh:2,url=http://localhost/MovieShopper/login.php');

	} else{
	echo " Bid was Successful";
	
//	header("Location: http://localhost/MovieShopper/login.php");

	}
?>


