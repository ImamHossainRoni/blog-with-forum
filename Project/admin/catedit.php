<?php include '../Classes/Category.php'; ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
if(!isset($_GET['id']) || $_GET['id']==null)
{

 echo "<script>window.location ='catlist.php';</script>";
}else{
    $catid=$_GET['id'];
}
?>
<?php 
$cat=new Category();
if($_SERVER['REQUEST_METHOD']=='POST'){

    $catName=$_POST['name'];
 
    $updateCat=$cat->catUpdate($catName,$catid);
    
    }

 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock"> 
      <?php 
    if(isset($updateCat)){
        echo $updateCat;
    }
       ?>


    <?php 
 $getCat=$cat->getCatById($catid);
 if($getCat){
    while($result=$getCat->fetch_assoc()){


     ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name']; ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }} ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>