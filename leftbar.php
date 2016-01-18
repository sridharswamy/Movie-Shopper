<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											English
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Comedy </a></li>
											<li><a href="#">Romance </a></li>
											<li><a href="#">Horror </a></li>
											<li><a href="#">Adventure</a></li>
											<li><a href="#">Thriller </a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Hindi
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
										
											<li><a href="#">Comedy </a></li>
											<li><a href="#">Romance </a></li>
											<li><a href="#">Horror </a></li>
											<li><a href="#">Adventure</a></li>
											<li><a href="#">Thriller </a></li>
										
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Kids</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Top Movies</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
								<?php
								$con=mysql_connect("localhost","root","") or die("not connected");
								$db=mysql_select_db("moviecol",$con) or die("NC");
								$result=mysql_query("select * from movie ORDER BY movie_rating DESC",$con);
								$count=0;
								while($row=mysql_fetch_array($result))
								{
								if($count<10)
								{
								$count++;
								print $count.'] <a href="'.$row['movie_url'].'">'.$row['movie_title'].'</a><br>';
								}
								}
								?>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						
					
					</div>
				</div>
				