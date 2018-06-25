<?php 

include "inc/header.php"; 

?>
<?php 
$perPage= 5;
if(isset($_GET["page"])){
$page = $_GET["page"];
}else{
$page = 1;
}
$startFrom = ($page-1) * $perPage;
?>



	<div class="main-container">	
		<main class="site-main">			
			<!-- Content Block -->
			<div class="container-fluid no-left-padding no-right-padding content-block blog-category">
				<!-- Container -->
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="col-xs-12">
								<div class="page-hear-title">
									<h2>Forum</h2>
								</div>
							</div>
						</div>
					</div>
				
					<!-- Row -->
					<div class="row">
						<!-- Content Area -->
						<div class="col-md-8 col-sm-7 col-xs-12 content-area content-area-space no-left-padding no-right-padding">
							
							<div class="forum-parts col-xs-12">
							<?php 
							$query="select * from forummain  order by id desc limit $startFrom,$perPage ";
							$post = $db->select($query);
							$i=0;
							if($post){
							while($result = $post->fetch_assoc()){

								$i++;
							?>



								<div class="forum-post">
									<div class="col-md-12">
										<h3><a href="forum-single.html" title="Easy to use shortcodes in your blog posts"><?php echo $result['title']; ?></a></h3>
										<?php echo $result['body']; ?>

										<div class="post-meta">

											<span><input onclick="myFunction()" class='red-heart-checkbox' id='red-check<?php echo $i; ?>' type='checkbox'/><label for='red-check<?php echo $i; ?>'></label> <a href="">100+</a></span>
											<span><a href="#" data-toggle="tooltip" data-placement="top" title="Comment"><i class="fa fa-comment"></i></a> <a href="">5 replies</a></span>
											<span><a href="#" data-toggle="tooltip" data-placement="top" title="Share"><i class="fa fa-share"></i></a> <a href="">3</a></span>
											<span><a href="#"><i class="fa fa-clock-o"></i> <?php echo $fm->formatdate($result['date']);?></a></span>
											<script>
										function myFunction() {
										    document.getElementById("demo").innerHTML = "Hello World";
										}
										</script>
											<span><a href="#"><i class="fa fa-user"></i> By,<?php echo $result['author'];?></a></span>
										</div>
										<div class="read-more">
											<a href="forumDetails.php?id=<?php echo $result['id'];?>">View full</a>
										</div>
									</div>
								</div>
				
							
							


                            <?php }}?>


							</div>
						</div><!-- Content Area /- -->
						<!-- Widget Area -->
						<div class="col-md-4 col-sm-5 col-xs-12 widget-area widget-space">
							<!-- Widget : Categories -->
							<aside class="widget widget_search">
								<a class="ask-your-ques" href="" type="button" data-toggle="modal" data-target="#myModal">Ask your question</a>
							</aside><!-- Widget : Categories /- -->
								


									<!-- Modal -->
									<div id="myModal" class="modal fade" role="dialog">
									  <div class="modal-dialog">

										<!-- Modal content-->
										<div class="modal-content project-details-popup">
										  <img class="prof-icon" src="http://a5.mzstatic.com/us/r30/Purple5/v4/5a/2e/e9/5a2ee9b3-8f0e-4f8b-4043-dd3e3ea29766/icon128-2x.png">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										  <div class="modal-header">
											<img class="header-img" src="http://creativefan.com/files/2010/02/12142-fullsize-500x250.jpg">
										  </div>
										  <div class="modal-body">
											<div class="col-md-12">
												<form action="http://localhost/login_with_google_using_php/index.php" method="post" class="forum-ask-fields">
													<input type="text" name="title" placeholder="Your asking" required />
													<textarea name="body" rows="5" placeholder="Describe your question..."></textarea>
													<button type="submit">Submit</button>
												</form>
											</div>
										  </div>
										  <div class="modal-footer">  
										  </div>
										</div>

									  </div>
									</div>
								
								
							<!-- Widget : Categories -->
							<aside class="widget widget_search">
								<h3 class="widget-title">Search</h3>
								<form action="">
									<input type="text" placeholder="Enter keyword" required />
									<input type="submit" value="Search">
								</form>
							</aside><!-- Widget : Categories /- -->
							<!-- Widget : Categories -->
							<aside class="widget widget_categories">
								<h3 class="widget-title">Popular Site</h3>
								<ul>
									<li><a href="https://programabad.com" title="Audio">programabad</a></li>
									<li><a href="http://subeen.com/" title="Fashion">Subeen.com</a></li>
									<li><a href="http://jakir.me/" title="Story">jakir.me</a></li>
									<li><a href="http://www.webcoachbd.com/" title="Life Style">webcoachbd</a></li>
									<li><a href="#" title="Travel">Travel</a></li>
									<li><a href="#" title="Story">Story</a></li>
																	</ul>
							</aside><!-- Widget : Categories /- -->
							<!-- Widget : Recent Posts -->
							
							<!-- Widget : Newsletter -->
							
							<!-- Widget : Tag Cloud -->
							
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
					</div><!-- Row /- -->
					<div class="clearfix"></div>
					<nav class="ow-pagination">
						<ul class="pagination">
<?php 
						$query = "select *from forummain";
						$result = $db->select($query);
						$total_rows = mysqli_num_rows($result);
						$total_pages = ceil($total_rows/$perPage);

						echo"<li><a href='forum.php?page=1'>".'First Page'."</a></li>";
						for($i = 1;$i<= $total_pages;$i++){
							echo "<li><a href='forum.php?page=".$i."'>".$i."</a></li>";
						}
						echo "<li><a href='forum.php?page=$total_pages'>.".'Last Page'."</a></li>";?>
							


						</ul>
					</nav>
				</div><!-- Container /- -->
			</div><!-- Content Block /- -->			
		</main>
	</div>
	<?php include'inc/footer.php';?>