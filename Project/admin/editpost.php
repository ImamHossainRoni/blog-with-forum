

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
    if (!isset($_GET['editppostid']) || $_GET['editppostid'] == NULL) {
        echo "<script>window.location = 'postlist.php';</script>";
    }else{
        $postid = $_GET['editppostid'] ;
    }
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Post</h2>
        <?php
             if($_SERVER['REQUEST_METHOD'] == "POST"){
            $title = mysqli_real_escape_string($db->link, $_POST['title']);
            $cat = mysqli_real_escape_string($db->link, $_POST['cat']);
            $body = mysqli_real_escape_string($db->link, $_POST['body']);
            $tags = mysqli_real_escape_string($db->link, $_POST['tags']);
            $author = mysqli_real_escape_string($db->link, $_POST['author']);
            #$userid = mysqli_real_escape_string($db->link, $_POST['userid']);
            //upload image file
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['img']['name'];
            $file_size = $_FILES['img']['size'];
            $file_temp = $_FILES['img']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "upload/".$unique_image;

            if (empty($title) or empty($cat) or empty($body) or empty($tags) or empty($author)) {
                  echo "<span class='error'>Field must not be empty!!!.</span>";
            }else{
                if (!empty($file_name)) {
                    
                    if ($file_size >1048567) {
                         echo "<span class='error'>Image Size should be less then 1MB!</span>";
                    }elseif (in_array($file_ext, $permited) === false) {
                         echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                    }else{
                        
                     move_uploaded_file($file_temp, $uploaded_image);
                     $updatepostSql = "UPDATE tbl_post
                                SET
                                cat = '$cat',
                                title = '$title',
                                body = '$body',
                                img = '$uploaded_image',
                                author = '$author',
                                tags = '$tags',
                               
                                WHERE id='$postid'";
                     $updated = $db->update($updatepostSql);
                        if ($updated) {
                             echo "<span class='success'>Post updated Successfully.</span>"; 
                        }else{
                            echo "<span class='error'>Post Not updated.</span>";
                        }
                    }
            }else{
                $updatepostSql = "UPDATE tbl_post
                            SET
                            cat = '$cat',
                            title = '$title',
                            body = '$body',
                            author = '$author',
                            tags = '$tags'
                          
                            WHERE id='$postid'";
                 $updated = $db->update($updatepostSql);
                    if ($updated) {
                         echo "<span class='success'>Post updated Successfully.</span>"; 
                    }else{
                        echo "<span class='error'>Post Not updated.</span>";
                    }
            }
        }
     }

     ?>
                <div class="block"> 
        <?php
            $postSql = "select * from tbl_post where id='$postid'  ";
            $getPost = $db->select($postSql);
            if ($getPost) {
               while ($postresult = $getPost->fetch_assoc()) {

        ?>              
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name='title' value="<?php echo $postresult['title'];?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat">
                                    <option>Select Category</option>
                                    <?php
                                    $catSql = "select * from tbl_category order by id desc";
                                    $result = $db->select($catSql);
                                    if ($result) {
                                       while ($rows = $result->fetch_assoc()) {
                                    ?>
                                    <option 
                                    <?php if($postresult['cat']==$rows['id']){
                                        echo "selected='selected'";
                                    }?>
                                    value="<?php echo $rows['id'];?>"><?php echo $rows['name'];?></option>
                                    <?php } }else{ echo "No Category found !";} ?>
                                </select>
                            </td>
                        </tr>
                   
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                            <img src="<?php echo $postresult['image'];?>" width="200" height="80" alt="" /><br />
                                <input type="file" name="img" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce"   name="body"> <?php echo $postresult['body'];?> </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" name='tags' value="<?php echo $postresult['tags'];?>" />
                            </td>
                        </tr>



                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name='author' value="<?php echo $postresult['author'];?>" class="medium" />
                                
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
            <?php                     
               }
            }else{
                echo "<p>No post found !!!.</p>";
            } 
            ?>
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
<?php include 'inc/footer.php';?>
