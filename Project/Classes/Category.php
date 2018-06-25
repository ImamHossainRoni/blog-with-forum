<?php 

include_once '../lib/Database.php';
include_once '../helpers/Format.php';

?>
<?php 

class Category 
{
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db=new Database();
		$this->fm=new Format();
	}
	public function catInsert($catName)
	{
     $catName=$this->fm->validation($catName);

     $catName=mysqli_real_escape_string($this->db->link,$catName);

     if(empty($catName))
     {
     	$msg="Category field must not be empty";
     	return $msg;
     }else{
     	$query = "INSERT INTO tbl_category(name) VALUES('$catName')";
     	$catInsert = $this->db->insert($query);
     	if($catInsert){
          $msg="<span class='success'>Category Inserted successfully.</span>";
          return $msg;
      }else{
        $msg="<span class='error'>Category not inserted.</span>";
        return $msg;
    }
}
}
	public function getAllCat()   #slect query for showing all the caltegory from db.
	{
		$query = "SELECT * FROM tbl_category ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function getCatById($catid) 
	{
		$query = "SELECT * FROM tbl_category WHERE id='$catid'";
		$result = $this->db->select($query);
		return $result;
	}
	public function catUpdate($catName,$catid)
	{
        $catName=$this->fm->validation($catName);
        $catid=mysqli_real_escape_string($this->db->link,$catid);
        

        if(empty($catName))
        {
          $msg="Category field must not be empty";
          return $msg;
      }
      else{
          $query = "UPDATE tbl_category
          SET 
          name='$catName'
          WHERE id='$catid'";
          $updated_row =$this->db-> update($query);
          if($updated_row){
              $msg="<span class='success'>Category Updated successfully.</span>";
              return $msg;
          }else{
            $msg="<span class='error'>Category not updated.</span>";
            return $msg; 
        }
    }
}
public function delCatById($catid)
{
    $query = "DELETE FROM tbl_category WHERE id='$catid'";
    $deldata=$this->db->delete($query);
    if ($deldata){
     $msg="<span class='success'>Category deleted successfully.</span>";
     return $msg;
 }else{
    $msg="<span class='error'>Category not DELETED.</span>";
    return $msg;
}
}
}


?>