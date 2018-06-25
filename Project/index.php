<?php 

include "inc/header.php"; 

?>



<?php 
$perPage= 3;
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
		<div class="container-fluid no-left-padding no-right-padding content-block">
			<!-- Container -->
			<div class="container">
				<!-- Row -->
				<div class="row">
					<!-- Content Area -->


					<div class="col-md-8 col-sm-7 col-xs-12 content-area content-area-space no-left-padding no-right-padding">


						<div class="blog-onecolumn col-xs-12">
							<!-- Type Post -->

							<?php 
							$query="select * from tbl_post order by id desc limit $startFrom,$perPage";
							$post = $db->select($query);
							if($post){
								while($result = $post->fetch_assoc()){
									?>

									<div class="type-post">

										<!-- Entry Cover -->
										<div class="entry-cover">
											<a href="post.php?id=<?php echo $result['id'];?>"><img src="admin/<?php echo $result["image"];?>" alt="Post" /></a>
											<div class="entry-meta"><a href="#" title="Fashion"><?php echo $result['catName'];?></a></div>
										</div><!-- Entry Cover /- -->
										<div class="entry-content">
											<h3 class="entry-title"><a href="post.php?id=<?php echo $result['id'];?>" title="Our Writers Understand Lifestyle"><?php echo $result['title'];?></a></h3>
											<div class="post-meta">
												<span><a href="#"><i class="fa fa-user"></i> By,<?php echo $result['author'];?></a></span>
												<span><a href="#"><i class="fa fa-clock-o"></i> <?php echo $fm->formatdate($result['date']);?></a></span>
												

												<!-- <span><a href="#"><i class="fa fa-comment"></i> </a></span> -->

												
											</div>
											<?php echo $fm->textShorten($result['body']);?>
											<div class="read-more">
												<a href="post.php?id=<?php echo $result['id'];?>" title="Read More">Read More</a>
											</div>
										</div>
									</div><!-- Type Post /- -->
									<?php }}?>
								</div>

							</div><!-- Content Area /- -->

							<?php include'inc/sidebar.php';?>

						</div><!-- Row /- -->

						<div class="clearfix"></div>
						<nav class="ow-pagination">
							<ul class="pagination">

								<?php 
								$query = "select *from tbl_post";
								$result = $db->select($query);
								$total_rows = mysqli_num_rows($result);
								$total_pages = ceil($total_rows/$perPage);

								echo"<li><a href='index.php?page=1'>".'First Page'."</a></li>";
								for($i = 1;$i<= $total_pages;$i++){
									echo "<li><a href='index.php?page=".$i."'>".$i."</a></li>";
								}
								echo "<li><a href='index.php?page=$total_pages'>.".'Last Page'."</a></li>";?>



								


							</ul>
						</nav>
					</div><!-- Container /- -->
				</div><!-- Content Block /- -->			
			</main>		
		</div>


		<?php include'inc/footer.php';?>