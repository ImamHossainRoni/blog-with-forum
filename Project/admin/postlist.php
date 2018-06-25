<?php
#include "../lib/Session.php";
#Session::checkSession();
?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>  

<?php 

include_once '../lib/Database.php';
include_once '../helpers/Format.php';
$db=new Database();
$fm=new Format();

?>  
  <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <?php
                if (isset($_GET['delpost'])) {
                	$delpost = $_GET['delpost'];
                	$delpostSql = "select * from tbl_post where id='$delpost'";
                	$delpostresult = $db->select($delpostSql);
                	if ($delpostresult) {
                		while ($del_img = $delpostresult->fetch_assoc()) {
                			$delimg = $del_img['image'];
                			unlink($delimg);
                		}
                	}
                	$delSql = "delete from tbl_post where id='$delpost'";
                	$delData= $db->delete($delSql);
                	if ($delData) {
                        echo "<span class='success'>Post Deleted Successfully.</span>";
                    }else{
                        echo "<span class='error'>Post Not Deleted.</span>";
                    }
                }
                ?>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="4%">No.</th>
							<th width="10%">Post Title</th>
							<th width="10%">Cat Name</th>
							<th width="15%">Description</th>
							<th width="10%">Category</th>
							<th width="10%">Image</th>
							<th width="10%">Author</th>
							<th width="10%">Tags</th>
							<th width="10%">Date</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$sql = "select tbl_post.*, tbl_category.name from tbl_post inner join tbl_category ON tbl_post.cat = tbl_category.id order by tbl_post.id desc";
					$result = $db->select($sql);
					if ($result) {
						$i = 0;
						while ($rows = $result->fetch_assoc()) {
							$i++;
					?>
					<tr class="odd gradeX">
						<td><?php echo $i; ?></td>
						<td><?php echo  $fm->textshorten($rows['title'], 30); ?></td>
						<td><?php echo  $fm->textshorten($rows['catName'], 30); ?></td>
						<td><?php echo $fm->textshorten($rows['body'], 40); ?></td>
						<td><?php echo $rows['name']; ?></td>
						<td><img width="50" height="50" src="<?php echo $rows['image']; ?>" alt=""></td>
						<td><?php echo $rows['author']; ?></td>
						<td><?php echo $rows['tags']; ?></td>
						<td class="center"><?php echo$fm->formatdate($rows['date']) ; ?></td>

						<td>

						<a href="editpost.php?editppostid=<?php echo $rows['id']; ?>">Edit</a>


						|| 


						<a onclick="return confirm('Are you sure to delete :(')" href="postlist.php?delpost=<?php echo $rows['id']; ?>">Delete</a>

						</td>

					</tr>
					<?php
						}
					}else{
						echo "<span class='error'>No Post found..</span>";
					}

					?>	
					</tbody>
				</table>
	
               </div>
            </div>
        </div>
 
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php
include 'inc/footer.php';
?>