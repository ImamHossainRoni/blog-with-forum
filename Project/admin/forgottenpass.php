<?php
include "../lib/Session.php";
Session::checkLogin();
?>
<?php
include "../config/config.php";
include_once '../lib/Database.php';
include "../helpers/format.php";
?>

<?php
$obj = new Database();
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
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$email = $fm->validation($_POST['email']);

			$email = mysqli_real_escape_string($obj->link,$email);
			if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
				echo "<p style='text-align:center;color:red'>Invalid Email !!!.</p>";
			}else{
			$sql = "select * from  tbl_admin where email='$email' limit 1 ";
			$mailcheck = $obj->select($sql);
			if ($mailcheck != false) {
					while ($rows = $mailcheck->fetch_assoc()) {
						$userid   = $rows['adminId'];

						$username = $rows['adminUser'];
					
					$text = substr($email, 0, 3);
					$rand = rand(10000, 99999);
					$newpass = "$text$rand";
					$password = md5($newpass);
					$updateSql = "UPDATE tbl_admin set adminPass = '$password' where adminId = '$userid' ";
					$updateRow = $obj->update($updateSql);
					//var_dump($updateRow);

					$to      = '$email';
					$subject = 'New Password - www.roni.com';
					$message = 'Your username: {$username}\n Password: {$newpass}';
					$headers = 'From: innocentboyferari@gmail.com' . "\r\n" .
					    'Reply-To: imamhossainroni95@gmail.com' . "\r\n" .
					    'X-Mailer: PHP/' . phpversion();

					$sendmail = ini_set("SMTP", $headers);
					if ($sendmail) {
					echo "<p style='text-align:center;color:green'>A recovery email is already send!.</p>";
					}else{
						echo "<p style='text-align:center;color:red'>Failed to send email!.</p>";
					}
				}
			}else{
					echo "<p style='text-align:center;color:red'>Email doesn't exist !.</p>";
				}
		}
	}
	?>
		<form action="" method="post">
			<h1>Recover password</h1>
			<div>
				<input type="text" placeholder="Enter a valid email" required="" name="email"/>
			</div>
			<div style="margin-left:90px">
				<input type="submit" value="Get Password" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Imam Hossain Roni</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>