<?php 
print '<div class="recommended_items"><!--recommended_items-->
		<h2 class="title text-center">recommended items</h2>
		<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
		<div class="item active">';
		for ($x=0; $x<3; $x++) {
								print '<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/1.jpg" alt="" />
													<h2>$56</h2>
													<p>Movie name</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>';
								}
									
		print '
								</div>
						<div class="item">';	
									
									for ($x=0; $x<3; $x++) {
									print '<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/1.jpg" alt="" />
													<h2>$56</h2>
													<p>Movie name</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>';
									}
print '								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->';
					?>