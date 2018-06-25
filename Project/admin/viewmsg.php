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
<?php
    if (!isset($_GET['msgid']) || $_GET['msgid'] == NULL) {
        echo "<script>window.location = 'inbox.php';</script>";
    }else{
        $msgid = $_GET['msgid'] ;
    }
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>View Message</h2>
        <?php
             if($_SERVER['REQUEST_METHOD'] == "POST"){

             echo "<script>window.location = 'inbox.php';</script>";
        }


        ?>
                <div class="block"> 

                 <?php
                $sql = "select * from tbl_contact where id='$msgid'";
                $inbox = $db->select($sql);
                if ($inbox) {
                    $i = 0;
                    while ($result= $inbox->fetch_assoc()) {
                        $i++;

                ?>              
                 <form action="" method="post" >
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name='name' value="<?php echo $result['fname']." ".$result['lname'] ;?>" class="medium" readonly />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" name='name' value="<?php echo $result['email'];?>" class="medium" readonly/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input type="text" name='name' value="<?php echo $fm->formatdate($result['date']);?>" class="medium" readonly/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea name="body" rows="10" cols="75" readonly="1">
                                    <?php echo $result['body'];?>
                                </textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Back to inbox" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php } }else echo "<script>window.location = 'inbox.php'; </script>"; ?>
                </div>
            </div>
        </div>

<!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
<?php
include 'inc/footer.php';
?>