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
                if (isset($_GET['delf'])) {
                	$delpost = $_GET['delf'];
                	
                	$delSql = "delete from forummain where id='$delpost'";
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
							<th width="5%">No.</th>
							<th width="15%"> Title</th>
							<th width="15%">Description</th>
							<th width="10%">Author</th>
							<th width="10%">Date</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$sql = "select * from forummain";
					$result = $db->select($sql);
					if ($result) {
						$i = 0;
						while ($rows = $result->fetch_assoc()) {
							$i++;
					?>
					<tr class="odd gradeX">
						<td><?php echo $i; ?></td>
						<td><?php echo  $fm->textshorten($rows['title'], 30); ?></td>
						
						<td><?php echo $fm->textshorten($rows['body'], 40); ?></td>
						
					     <td><?php echo $rows['author']; ?></td>
						
						<td class="center"><?php echo$fm->formatdate($rows['date']) ; ?></td>

						<td>

						

						<a onclick="return confirm('Are you sure to delete :(')" href="forumdetails.php?delf=<?php echo $rows['id']; ?>">Delete</a>

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