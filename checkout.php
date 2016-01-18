<?php
session_start();


$conn = mysql_connect("localhost", "root", "") or die("Couldnt connect to server, Error: ".mysql_error());
$db = mysql_select_db("moviecol", $conn) or die("Couldnt select DB, Error: ".mysql_error());
$pdtid=$_POST['id'];
$_SESSION['id2'][] = $pdtid;
$n=count($_SESSION['id2']);
echo 'Number of items in cart is: '.$n.'<br>';
print '<a href="shop.php"> Continue Shopping</a>';
//var_dump($_SESSION['id2']);
$totalcost=0;
echo '

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Checkout | E-Shopper</title>
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
</head><!--/head-->';

include 'header.php';
echo '

	<section id="cart_items">
		<div class="container">
			
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="id">Movie Id</td>
							<td class="movie name">Movie Title</td>
							<td class="price">Price</td>
							
							<td></td>
						</tr>
					</thead>
					<tbody>';

					
$_SESSION['count']=$n;
$x=0;
while($x<$n)
{
$currentmovie=$_SESSION['id2'][$x];
$result = mysql_query("select * from movie where id=$currentmovie");

if($result === FALSE) {
    die(mysql_error()); // TODO: better error handling
}


while($row=mysql_fetch_array($result))
{	
	print '				<tr>
							<td class="cart_product">
								<a href=""><img src="'.$row['movie_poster'].'" alt="" height=200 width=150></a>
							</td>
							<td class="cart_product_id">
								<p>'.$row['id'].'</p>
							</td>	
							<td class="cart_movie_name">
								<p>'.$row['movie_title'].'</p>
							</td>
							<td class="cart_price">
								<p>'.$row['cost'].'</p>
							</td>
						</tr>';
$totalcost+=$row['cost'];
}
$x++;
}
print '					<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>Rs.'.$totalcost.'</td>
									</tr>
									<tr>
										<td>Exo Tax</td>';
$tax=$totalcost*0.02;
print '										<td>Rs.'.$tax.'</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Rs.50</td>										
									</tr>
									<tr>
										<td>Total</td>';
$total=$totalcost+$tax+50;
$_SESSION['total']=$total;
print '									<td><span>Rs.'.$total.'</span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
				
		<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><h2><a href="#">PAYMENT OPTIONS</a></li></h2>
				</ol>
			</div><!--/breadcrums-->

			

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Card Information</p>
							<form action="creditcardhandler.php" method="post">
									Card Number: <input type="text" name="cardno">
									Card Issuer(Enter name in lowercase):<input type="text" name="cardtype">
									Expiration date (mm/yy):<input type="text" name="expdate">
									CVV number :<input type="password" name="cvv">
									Card Holder Name :<input type="text" name="chname">
									Amount Payable: Rs.<input type="text" value='.$total.' name="amount" readonly="readonly">
									Shipping Details:
									First Name:<input type="text" name="fname">
									Last Name:<input type="text" name="lname">
									Address: <input type="text" name="address">

									<button type="submit" class="btn btn-primary">Make Payment</button>
								</form>
						</div>
					</div>
										
				</div>
			</div>
		
		</div>
		
		
		
	</section> <!--/#cart_items-->';

 include 'footer.php';
print '
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>';

?>
