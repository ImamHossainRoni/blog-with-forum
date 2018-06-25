			<!-- Widget Area -->
						<div class="col-md-4 col-sm-5 col-xs-12 widget-area widget-space">
							<aside class="widget widget_search">
								<h3 class="widget-title">Search</h3>
								<form action="search.php" method="get">
									<input type="text" name="search" placeholder="Enter keyword" required />
									<input type="submit" name="submit" value="search">
								</form>
							</aside><!-- Widget : Categories /- -->
							<!-- Widget : Categories -->
							<aside class="widget widget_categories">
								<h3 class="widget-title">CATEGORIES</h3>
								<ul>

									<?php 
									$query = "select * from tbl_category";
									$post = $db->select($query);
									if($post){
										while($result = $post->fetch_assoc()){

											?>
											<li><a href="postCat.php?category=<?php echo $result['id']; ?>"><?php echo $result['name'] ?></a></li>
											<?php }}else{  ?>		
											<li>No Category Created</li>
											<?php } ?>		
									
								</ul>
							</aside><!-- Widget : Categories /- -->
							<!-- Widget : Features Posts -->
							<aside class="widget widget_latestposts">
								<h3 class="widget-title">Popular Posts</h3>
								<div class="recent-post">
									<div class="latest-content">
										<a href="#" title="Recent Posts"><i><img src="assets/images/ftr-pp-1.jpg" class="wp-post-image" alt="Post"></i></a>
										<span><a href="#">March 20, 2017</a></span>
										<h5><a title="Collaboratively scale ethical total linkage " href="#">Collaboratively scale ethical total linkage </a></h5>
									</div>
									<div class="latest-content">
										<a href="#" title="Recent Posts"><i><img src="assets/images/wid-pp-1.jpg" class="wp-post-image" alt="Post"></i></a>
										<span><a href="#">March 20, 2017</a></span>
										<h5><a title="Collaboratively scale ethical total linkage " href="#">Collaboratively scale ethical total linkage </a></h5>
									</div>
									<div class="latest-content">
										<a href="#" title="Recent Posts"><i><img src="assets/images/wid-pp-2.jpg" class="wp-post-image" alt="Post"></i></a>
										<span><a href="#">March 20, 2017</a></span>
										<h5><a title="Collaboratively scale ethical total linkage " href="#">Collaboratively scale ethical total linkage </a></h5>
									</div>
									<div class="latest-content">
										<a href="#" title="Recent Posts"><i><img src="assets/images/wid-pp-3.jpg" class="wp-post-image" alt="Post"></i></a>
										<span><a href="#">March 20, 2017</a></span>
										<h5><a title="Collaboratively scale ethical total linkage " href="#">Collaboratively scale ethical total linkage </a></h5>
									</div>
								</div>
							</aside><!-- Widget : Recent Posts /- -->



							
							<!-- Widget : Newsletter -->
							<aside class="widget widget_subscribe">
								<h3 class="widget-title">newslletter</h3>
								<div class="subscribe-box">
									<div class="input-group">
										<input class="form-control" placeholder="Your Email" type="text">
										<span class="input-group-btn">
											<input type="submit" class="btn btn-default" value="Subscribe"/>
										</span>
									</div><!-- /input-group -->
								</div>
							</aside><!-- Widget : Newsletter -->
							<!-- Widget : Tag Cloud -->
							<aside id="tag_cloud" class="widget widget_tag_cloud">
								<h3 class="widget-title">Tags</h3>
								<div class="tagcloud">
									<a href="#" title="Travel">Travel</a>
									<a href="#" title="Creative">Creative</a>
									<a href="#" title="Fashion">Fashion</a>
									<a href="#" title="Food">food</a>
									<a href="#" title="Video">video</a>
									<a href="#" title="Ideas">ideas</a>
									<a href="#" title="Life">life</a>
									<a href="#" title="Style">style</a>
									<a href="#" title="Photography">Photography</a>
								</div>
							</aside><!-- Widget : Tag Cloud -->
							<!-- Widget : Social -->
							<aside class="widget widget_social">
								<h3 class="widget-title">Follow Us</h3>
								<ul>
									<li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#" title="Pinterest"><i class="fa fa-pinterest-p"></i></a></li>
									<li><a href="#" title="Skype"><i class="fa fa-skype"></i></a></li>
									<li><a href="#" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</aside><!-- Widget : Social /- -->
						</div><!-- Widget Area /- -->