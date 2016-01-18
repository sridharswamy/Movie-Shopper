<body>	
	<!--header-->
	<header id="header">
		<!--header_top-->
		<div class="header_top">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i>9004621007</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> sridharn_93@yahoo.in</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://www.facebook.com/sridharn.93"><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
						
							<a href="index.php"><img src="images/home/logo.png" alt="" /></a>
						
						</div>
											</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-user"></i> Account</a></li>
								<li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href=""><i class="fa fa-shopping-cart"></i> Cart</a></li>

								<?php
								//session_start();							//load session data
								if(isset($_SESSION['LoggedIn']))
								{
								if($_SESSION['LoggedIn']=='True')
								echo '<li><a href="LogoutHandler.php" class="active">Logout</a></li>';
								}else
								{
								echo '<li><a href="login.php" class="active">Login</a></li>';
								}
								?>
							
							
							
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php">Home</a></li>
								<li><a href="search.php">Search</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.php">Products</a></li>
										<li><a href="product-details.php">Product Details</a></li> 
										<li><a href="checkout.php">Checkout</a></li> 
																			
							
									

                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Auction<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="auction.php">Web Auction</a></li>
										
                                    </ul>
                                </li> 
								
								
								
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<form name='restform' method="POST">
							<input type="text" name="name" placeholder="Search"/>
						</div>
						<input type="submit"  name="submit">
						</form>
	<?php
	if(isset($_POST['submit']))
	
	{
		$name = $_POST['name'];
		$url = "http://localhost/MovieShopper/rest.php/?name=$name";	
		$client = curl_init($url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($client);	
		$result = json_decode($response);
		echo "<br><br>Product : $name";
		echo "<br>Status : $result->status_message";
		echo "<br>Price : $result->data";
	}
?>
											</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
