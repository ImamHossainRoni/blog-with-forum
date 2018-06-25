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
                <h2>Replay Message</h2>
        <?php
             if($_SERVER['REQUEST_METHOD'] == "POST"){

            $toemail = $fm->validation($_POST['toemail']);
            $fromemail = $fm->validation($_POST['fromemail']);
            $subject = $fm->validation($_POST['subject']);
            $body = mysqli_real_escape_string($db->link, $_POST['body']);
           $mainsent = mail($toemail, $subject, $body, $fromemail);
            if ( $mainsent) {
               echo "<span class='success'>Mail sent Successfully.</span>";
            }else{
                echo "<span class='error'>Something wrong!!.</span>";
            }
        }


        ?>
                <div class="block"> 

                 <?php
                $sql = "select * from tbl_contact where id='$msgid'";
                $inbox = $db->select($sql);
                if ($inbox) {
                    while ($result= $inbox->fetch_assoc()) {

                ?>              
                 <form action="" method="post" >
                    <table class="form">
                        <tr>
                            <td>
                                <label>To</label>
                            </td>
                            <td>
                                <input type="text" name='toemail' value="<?php echo $result['email'];?>" class="medium" readonly/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type="text" name='fromemail' class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                <input type="text" name='subject' class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce">
                               
                                </textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Send" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php } } ?>
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