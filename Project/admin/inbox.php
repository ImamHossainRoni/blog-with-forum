<?php
include "inc/header.php";
include "inc/sidebar.php";
?>
<?php 

include_once '../lib/Database.php';
include_once '../helpers/Format.php';
$db=new Database();
$fm=new Format();

?>  
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
                  <?php 
                    if (isset($_GET['seenid'])) {
                        $seen = $_GET['seenid'];
                  
                    $seenSql = "update tbl_contact set status='1' where id='$seen'";
                    $upcont = $db->update($seenSql);
                    if ($upcont) {
                        echo "success";
                    }else{
                        echo "failed";
                    }
                    }
                  ?>
                 
                    <thead>
                        <tr>
                            <th>Serial No.</th>
                            <th>Name</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
            <tbody>
                        <?php
                        $sql = "select * from tbl_contact where status='0' order by id desc";
                        $inbox = $db->select($sql);
                        if ($inbox) {
                            $i = 0;
                            while ($result= $inbox->fetch_assoc()) {
                                $i++;

                        ?>

                            <tr class="odd gradeX">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['fname']." ".$result['lname'];?></td>
                                <td><?php echo $fm->textShorten($result['body'],40);?></td>
                                <td><?php echo $fm->formatdate($result['date']);?></td>
                                <td><a href="viewmsg.php?msgid=<?php echo $result['id'];?>">View</a> || <a href="reply.php?msgid=<?php echo $result['id'];?>">Replay</a> || <a href="?seenid=<?php echo $result['id'];?>">Seen</a></td>
                            </tr>
                
                    <?php } } ?>
            </tbody>
                </table>
               </div>
            </div>
            <div class="box round first grid">
                <h2>Seen Message</h2>
                 <?php
                if (isset($_GET['delid'])) {
                    $delid = $_GET['delid'];
                    $delSql = "delete from tbl_contact where id='$delid'";
                    $delData= $db->delete($delSql);
                    if ($delData) {
                        echo "<span class='success'>Message Deleted Successfully.</span>";
                    }else{
                        echo "<span class='error'>Not Deleted.</span>";
                    }
                }
                ?>

                 <?php 
                    if (isset($_GET['unseenid'])) {
                        $unseen = $_GET['unseenid'];
                  
                    $seenSql = "update tbl_contact set status='0' where id='$unseen'";
                    $upcont = $db->update($seenSql);
                    if ($upcont) {
                        echo "success";
                    }else{
                        echo "failed";
                    }
                    }
                  ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
                    <thead>
                        <tr>
                            <th>Serial No.</th>
                            <th>Name</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
            <tbody>
                        <?php
                        $sql = "select * from tbl_contact where status='1' order by id desc";
                        $inbox = $db->select($sql);
                        if ($inbox) {
                            $i = 0;
                            while ($result= $inbox->fetch_assoc()) {
                                $i++;

                        ?>

                            <tr class="odd gradeX">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['fname']." ".$result['lname'];?></td>
                                <td><?php echo $fm->textShorten($result['body'],40);?></td>
                                <td><?php echo $fm->formatdate($result['date']);?></td>
                                <td><a href="viewmsg.php?msgid=<?php echo $result['id'];?>">View</a> || <a onclick="return confirm('Are you sure to delete?');" href="?delid=<?php echo $result['id'];?>">Delete</a> || <a href="?unseenid=<?php echo $result['id'];?>">Unseen</a></td>
                            </tr>
                
                    <?php } }?>
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