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
		$query = "select * from tbl_post where id = $id";
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

								<a href="post.php?id=<?php echo $result['id'];?>"><img src="admin/<?php echo $result["image"];?>" alt="Post" /></a>
							</div><!-- Entry Cover /- -->
							<div class="entry-content">
								<h3 class="entry-title"><a href="#" title="Our Writers Understand Lifestyle"><?php echo $result['title'];?></a></h3>
								<div class="post-meta">
									<span><a href="#"><i class="fa fa-user"></i> By <?php echo $result['author'];?></a></span>
									<span><a href="#"><i class="fa fa-clock-o"></i> <?php echo $result['date'];?></a></span>
									<span><a href="#"><i class="fa fa-comment"></i> Comments</a></span>
								</div>
								<?php echo $result['body'];?>

								<?php echo "<hr>";?>
								<h3>Leave a comment Here:</h3>

								<!-- commenting -->
								<form method="POST" id="comment_form" action="">
									<div class="form-group">
										<input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Enter Name" />
									</div>
									<div class="form-group">
										<textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
									</div>
									<div class="form-group">
										<input type="hidden" name="comment_id" id="comment_id" value="0" />
										
										<input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
									</div>
								</form>
								<span id="comment_message"></span>
								<br />
								<div id="display_comment"></div>

								<!-- commenting -->


							</div>

						</div>

						

					</div><!-- Content Area /- -->
					<?php }} ?>

					<?php include'inc/sidebar.php';?>

				</div><!-- Row /- -->
			</div><!-- Container /- -->
		</div><!-- Content Block /- -->


		<?php include'inc/footer.php';?>

		<script>
			$(document).ready(function(){

				$('#comment_form').on('submit', function(event){
					event.preventDefault();
					var form_data = $(this).serialize();
					var post_id = '<?php echo $id;?>';
					$.ajax({
						url:"add_comment.php?id="+post_id,
						method:"POST",
						data:form_data,
						dataType:"JSON",
						success:function(data)
						{
							if(data.error != '')
							{
								$('#comment_form')[0].reset();
								$('#comment_message').html(data.error);
								$('#comment_id').val('0');
								//load_comment();
							}
						}
					})
				});

				load_comment();

				function load_comment()
				{
					var post_id = '<?php echo $id;?>';
					$.ajax({
						url:"fetch_comment.php?id="+post_id,
						method:"POST",
						success:function(data)
						{
							$('#display_comment').html(data);
						}
					})
				}

				$(document).on('click', '.reply', function(){
					var comment_id = $(this).attr("id");
					$('#comment_id').val(comment_id);
					$('#comment_name').focus();
				});


				setInterval(function(){
					load_comment();

				},1000);

			});
		</script>
