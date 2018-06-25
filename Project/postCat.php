<?php 

include "inc/header.php"; 
?>
<?php 
if(!isset($_GET['category']) || $_GET['category']== NULL){
	header("Location: 404.php");
}else{
	$id = $_GET['category'];
}
 ?>

<div class="container-fluid no-left-padding no-right-padding content-block blog-single">
	<!-- Container -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-xs-12">
					<div class="page-hear-title">

					</div>
				</div>
			</div>
		</div>
	
				<!-- Row -->
				<div class="row">
					<!-- Content Area -->
					<div class="col-md-8 col-sm-7 col-xs-12 content-area content-area-space">


                         <div class="type-post">
                         	<?php
		$query = "select * from tbl_post where cat = $id";
		$post = $db->select($query);
		if($post){
			while($result = $post->fetch_assoc()){
		?>

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
										<span><a href="#"><i class="fa fa-comment"></i> 3</a></span>
									</div>
									<?php echo $fm->textShorten($result['body']);?>
									<div class="read-more">
										<a href="post.php?id=<?php echo $result['id'];?>" title="Read More">Read More</a>
									</div>
								</div>
								<?php }} else{ echo "<h1>There is no post in this category :( </h1>";}?>
							</div><!-- Type Post /- -->
						

						

					</div><!-- Content Area /- -->
					

					<?php include'inc/sidebar.php';?>

				</div><!-- Row /- -->
			</div><!-- Container /- -->
		</div><!-- Content Block /- -->


		<?php include'inc/footer.php';?>