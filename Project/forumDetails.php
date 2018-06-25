<?php 

include "inc/header.php"; 
?>
<?php 
if(!isset($_GET['id']) || $_GET['id']== NULL){
	echo "sorry";
}else{
	$id = $_GET['id'];
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
	
		<?php
		$query = "select * from forummain where id = $id";
		$post = $db->select($query);
		if($post){
			while($result = $post->fetch_assoc()){
				?>
			
				<!-- Row -->
				<div class="row">
					<!-- Content Area -->
					<div class="col-md-8 col-sm-7 col-xs-12 content-area content-area-space">



						<div class="type-post">
							<!-- Entry Cover -->
							<div class="entry-cover">

								
							</div><!-- Entry Cover /- -->
							<div class="entry-content">
								<h3 class="entry-title"><a href="#" title="Our Writers Understand Lifestyle"><?php echo $result['title'];?></a></h3>
								<?php echo "<hr>";?>
								<div class="post-meta">
									<span><a href="#"><i class="fa fa-user"></i> By <?php echo $result['author'];?></a></span>
									<span><a href="#"><i class="fa fa-clock-o"></i> <?php echo $result['date'];?></a></span>
									<span><a href="#"><i class="fa fa-comment"></i> Comments</a></span>
									<span><a href="#"><i class="fa fa-user"></i> By,<?php echo $result['author'];?></a></span>
								</div>
								<?php echo $result['body'];?>

								<?php echo "<hr>";?>
								<h3>write a comment Here:</h3>

								


							</div>

						</div>

						

					</div><!-- Content Area /- -->
					<?php }} ?>

					<?php include'inc/sidebar.php';?>

				</div><!-- Row /- -->
			</div><!-- Container /- -->
		</div><!-- Content Block /- -->


		<?php include'inc/footer.php';?>

		