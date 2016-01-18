<?php
session_start();
$con=mysql_connect("localhost","root","") or die("not connected");
$db=mysql_select_db("moviecol",$con) or die("NC");



print '<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Movie-Shopper</title>
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
print '<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>MOVIE</span>-SHOPPER</h1>
									<h2>C2C Video Rental Website</h2>
									<p>This is a C2C Video Rental Website  </p>
									<button type="button" class="btn btn-default get">Start now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/movie_rental.jpg" class="girl img-responsive" alt="" />
									
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>MOVIE</span>-SHOPPER</h1>
									<h2>100% Responsive Design</h2>
									<p>One-stop for all your Video Purchases </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/movie_rental.jpg" class="girl img-responsive" alt="" />
									
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>MOVIE</span>-SHOPPER</h1>
									<h2>Movies, TV Shows one click away</h2>
									<p> Scroll below to view our Products </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/movie_rental.jpg" class="girl img-responsive" alt="" />
									
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">';
			include 'leftbar.php';
print '				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Featured Items</h2>';
$result=mysql_query("select * from movie where id<20",$con);
$rows=mysql_num_rows($result);	

 
while($row=mysql_fetch_array($result))
{	
print '<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="'.$row['movie_poster'].'" width="100" height="400" alt="" />
										<h2>Rs.'.$row['cost'].'</h2>
										<p>'.$row['movie_title'].'</p>
										
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<p><h1><u>'.$row['movie_title'].'</u></h1></p>
											<br>
											<p><h5><font color=black><u> PLOT</font> </u></h5></p>
											<p>	'.$row['movie_plot'].'</p>
											
											<p><h5><font color=black><u> RELEASE DATE</font> </u></h5></p>
											<p>'.$row['movie_release'].'</p>
											
											<p><h5><u><font color=black> IMDB MOVIE RATING</font></U></h5></p>
											<p>'.$row['movie_rating'].'</p>
											
											<p><h5><u><font color=black> RUNTIME</font></U></h5></p>
											<p>'.$row['runtime'].'</p>
											</b>';
											print '<form method="POST" action="checkout.php">';
											
											print '<input type="hidden" name="id" value='.$row['id'].'>';
											print '<input type="submit" name='.$row['movie_title'].' value="Add to cart">
											</form>';
											
											print '
										</div>
									</div>
								</div>
							</div>
						</div>';
						}
						
?>						
					
				</div>
			</div>
		</div>
	</section>
	

<?php include 'footer.php';?>
  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>