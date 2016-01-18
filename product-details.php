<?php
session_start();
$conn = mysql_connect("localhost","root","");
$db=mysql_select_db("moviecol", $conn);
$id= $_SESSION['id'];
/*$countrec = $_SESSION['countrec'];
echo 'number of recommended movies is: '.$countrec;
$array=$_SESSION['recmovielist'];
echo implode("++",$array)."<br>";
$firstmovie=$_SESSION['firstmovie'];

//for( $x = 0, $max = count($array); $x < $max; ++$x ) {
//    echo $array[$x];
//}
*/
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
	 print '
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">';
							
$result = mysql_query("select * from movie where id=".$id);
while($row=mysql_fetch_array($result))
print '<img src='.$row['movie_poster'].' alt="" />';
print '
</div> 

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />';

print '								
								<span>
									<span>';
									
							$result = mysql_query("select * from movie where id=".$id);
							while($row=mysql_fetch_array($result))
							{
							print $row['movie_title'].'</span><br><br><br>';
							print '<b>Year : </b>'.$row['movie_year'].'</b><br>';
							print '<b>Movie Rating :</b> '.$row['movie_rating'].'</b><br>';
							print '<b>Movie Release :</b> '.$row['movie_release'].'<br>';
							print '<b>Movie Plot :</b> '.$row['movie_plot'].'</b><br>';
							print '<b>Runtime :</b> '.$row['runtime'].'</b><br>';
							print '<b>Cost : </b> Rs.'.$row['cost'].'<br>';
														}
				print '<form method="POST" action="checkout.php">';
									print '<input type="hidden" name="id" value='.$id.'>';
									print '<button type="submit" class="btn btn-primary" name='.$row['movie_title'].' value="Submit">Add to Cart</button>';
print '									</form>
								</span>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->';
					
					
?>
					</div>
			</div>
		</div>
	</section>';
	<?php 
include 'footer.php';
print '

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>';
?>