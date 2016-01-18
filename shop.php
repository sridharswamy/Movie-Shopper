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

<?php include 'header.php';?>


	
	
	<section>
		<div class="container">
			<div class="row">
				<?php include 'leftbar.php'?>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Featured Items</h2>
<?php 

$con=mysql_connect("localhost","root","") or die("not connected");
$db=mysql_select_db("moviecol",$con) or die("NC");

$result=mysql_query("select * from movie",$con);

$result1 = mysql_query("SELECT * FROM movie", $con);
$num_rows = mysql_num_rows($result1);

$pages=ceil($num_rows/18);
$_SESSION['cart']=array();


while($row=mysql_fetch_array($result))
{	
print '<div class="col-sm-4">';

print $row['id'];
print '
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="'.$row['movie_poster'].'" width="100" height="350" alt="" />
										<h2>Rs.'.$row['cost'].'</h2>
										<p>'.$row['movie_title'].'</p>
										</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>Rs.'.$row['cost'].'</h2>
											<p>'.$row['movie_title'].'</p>
											<br>
											<p><h5><font color=black><u> PLOT</font> </u></h5></p>
											<p>'.$row['movie_plot'].'</p>
											
											<p><h5><font color=black><u> RELEASE DATE</font> </u></h5></p>
											<p>'.$row['movie_release'].'</p>
											
											<p><h5><u><font color=black>IMDB MOVIE RATING</font></U></h5></p>
											<p>'.$row['movie_rating'].'</p>
											
											<p><h5><u><font color=black> RUNTIME</font></U></h5></p>
											<p>'.$row['runtime'].'</p>
											
											
											
											<form method="POST" action="checkout.php">';
											
											print '<input type="hidden" name="id" value='.$row['id'].'>';
											print '<input type="submit" name='.$row['movie_title'].' formaction="checkout.php" value="Add to cart">
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>';
}
?>
					
	</div>				<ul class="pagination">
						<?php
							for($x=1;$x<=$pages;$x++)
							{
							print '<li><a href="">'.$x.'</a></li>';
							}
						?>
							<li><a href="">&raquo;</a></li>
						</ul>

					</div><!--features_items-->

	<?php include 'recommend.php'?>			
	</div>
			</div>
		</div>
	</section>
	<?php include 'footer.php';?>

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>