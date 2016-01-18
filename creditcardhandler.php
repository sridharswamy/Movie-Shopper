<?php
session_start();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop | E-Shopper</title>
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

<?php 
include 'header.php';

print '<section>
		<div class="container">
			<div class="row">';
				include 'leftbar.php';
print '				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Transaction Summary</h2>';
						
$conn= mysql_connect("localhost","root","");
$db=mysql_select_db("moviecol", $conn);

$cardno=$_POST['cardno'];
$cardtype=$_POST['cardtype'];
$expdate=$_POST['expdate'];
$cvv=$_POST['cvv'];
$amount=$_POST['amount'];
$transaction=true;
$total=$_SESSION['total'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$address=$_POST['address'];

$result = mysql_query("select * from creditcard where cardno=$cardno and cvv=$cvv");

if(mysql_num_rows($result)>0)
{
	
	while($row=mysql_fetch_assoc($result))
	{
	$balance=$row["balance"];
	$expiryindb=$row["expdate"];
	$cardtypeindb=$row["cardtype"];
	echo "Rs.".$amount." is the bill amount<br>";
	echo "Rs.".$balance." is the balance in your credit card<br>";
	if($balance<$total)
	{
	echo "Insufficient Balance";
	$transaction=false;
	}
	if($cardtype!=$cardtypeindb)
	{
	echo "Enter the correct card type";
	$transaction=false;
	}
	if($expdate!=$expiryindb)
	{
	echo "Enter the expiry date";
	$transaction=false;
	}
	if($transaction==true)
	{
	
	echo "Your transaction was successful<br>";
	$currentbalance=$balance-$total;
	 $sql = "Update creditcard set balance=$currentbalance where cardno=$cardno";

	//declare in the order variable
	$query = mysql_query($sql);	//order executes
	echo "Your current balance is Rs.".$currentbalance;
	echo "<h3>Shipping Details</h3>" ;
	echo "First Name: ".$fname."<br>";
	echo "Last Name: ".$lname."<br>";
	echo "Address: ".$address."<br>";
	
	}
	}
	
}


?>