<?php 
include "../lib/Session.php";
Session::init();
 ?>

<?php 

include "../lib/Database.php";
include "../helpers/Format.php";
?>
<?php
$db = new Database();
$fm = new Format();
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">

		<?php 
		if($_SERVER['REQUEST_METHOD']=="post"){
			$susername = $fm->validation($_POSt['username']);
			$password = $fm->validation(md5($_POSt['password']));

			$username = mysqli_real_escape_string($username);
			$password = mysqli_real_escape_string($password);


			$query = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password' ";
			$result = $db->select($query);
			if($result != false){
				$value = mysqli_fetch_array($result);
				$row = mysqli_num_rows($result);
				if($row > 0){
					session::set("login",true);
					session::set("username",$value['username']);
					session::set("id",$value['id']);
					header("Location:index.php");

				}else{
					echo "<span style='color:red;font-size:18px;'>No result found!!</span>";

				}
			}else{
				echo "<span style='color:red;font-size:18px;'>Username or Password not matched !!</span>";
			}
		}


		?>
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>