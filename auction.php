<?php

session_start();
$conn = mysql_connect("localhost","root","");
$db=mysql_select_db("moviecol", $conn);
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Auction | E-Shopper</title>
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

	<section>
		<div class="container">
			<div class="row">';
				include 'leftbar.php';
echo '				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Auction</h2>
						<div class="single-blog-post">
							<h3>Latest arrived in store</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> English Movie</li>
									<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
									<li><i class="fa fa-calendar"></i> October 18, 2014</li>
								</ul>
								<span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span>
							</div>';
							$id=143;
							$_SESSION['auctionitemid']=$id;

$result = mysql_query("select * from auction where id=$id");
								
							while($row=mysql_fetch_array($result))
							{
								print '<big><b>Movie Title:</b><i><h4>   '.$row['movie_title'].'</big><b></h4><br>';

								print '<img src='.$row['movie_poster'].' alt="Image Not Available" height="400" width="300" />';
								echo '
							</a>
							
							<p>';
							print $row['movie_plot'];
							}
							echo '</p>
							<form name="auction" method=post action="auctionhandler.php">	
				            <div class="form-group col-md-6">
				                <input type="bid" id="bid" placeholder="Your Bid Amount" name="bid" />
				                 <input type="submit" name="submit"  value="Submit">
								 <br><br>
				            </div>
							
				        </form>
							<table border="3">
							<tr><th>Bid Amounts So far<th></tr>';
							$result = mysql_query("select * from auctiondata where item_id=$id");	
							$n=mysql_num_rows($result);
								
								echo 'Number of bids so far: '.$n;
							while($row=mysql_fetch_array($result))
							{
								print '<tr><td> Rs.'.$row['bidding_price'].'</td></tr>';
							}
							$maxbidding = mysql_query("select max(bidding_price) as maxbidprice from auctiondata where item_id=$id");	
							
print '							</table>';
while ($row = mysql_fetch_assoc($maxbidding)) {
    
echo 'Highest bid so far is Rs.'.$row['maxbidprice'];
}
print '							<div class="pager-area">
								<ul class="pager pull-right">
									<li><a href="#">Pre</a></li>
									<li><a href="#">Next</a></li>
								</ul>
							</div>
						</div>
					</div><!--/blog-post-area-->

					<div class="rating-area">
						<ul class="ratings">
							<li class="rate-this">Rate this item:</li>
							<li>
								<i class="fa fa-star color"></i>
								<i class="fa fa-star color"></i>
								<i class="fa fa-star color"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</li>
							<li class="color">(6 votes)</li>
						</ul>
						
					</div><!--/rating-area-->

					<div class="socials-share">
						<a href=""><img src="images/blog/socials.png" alt=""></a>
					</div><!--/socials-share-->

					
				</div>	
			</div>
		</div>
	</section>';
	
	
	include 'footer.php';
	
?>
  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>