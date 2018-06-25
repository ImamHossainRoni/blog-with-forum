<?php include'inc/header.php';?>

	<div class="main-container">
		
		
		
		<main class="site-main">
			
			<!-- Content Block -->
			<div class="container-fluid no-left-padding no-right-padding contact-section">
				<!-- Container -->
				<div class="container">
					<!-- Row -->
					<div class="row">
						<div class="col-md-5 col-sm-6 col-xs-12">
							<div class="contact-content">
								<h3>hi write to me</h3>
								<p>Rapidiously recaptiualize leveraged core competencies through out-of-the-box alignments. Efficiently impact client-focused sources whereas emerging action items. Efficiently grow premium web-readiness rather than. Synergistically fashion dynamic total linkage Rapid- iously recaptiualize leveraged core alignments.</p>
								<p><i class="fa fa-phone"></i> <b>phone:</b><a href="tel:+0081254798634">+0081254798634</a></p>
								<p><i class="fa fa-home"></i> <b>ADDRESS:</b><span>House-42,Road No-10,Sector-10,Uttara, Dhaka-1230, Bangladesh.</span></p>
								<p><i class="fa fa-envelope-o"></i> <b>EMAIL:</b><a href="mailto:imamhossainroni95@gmail.com">imamhossainroni95@gmail.com</a></p>
							</div>
						</div>
						<div class="col-md-7 col-sm-6 col-xs-12">
							<div class="contact-form">
								<h3>get in touch</h3>

<?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $fname = $fm->validation($_POST['fname']);
            $lname = $fm->validation($_POST['lname']);
            $email = $fm->validation($_POST['email']);
            $body = $fm->validation($_POST['body']);

            $fname = mysqli_real_escape_string($db->link,$fname);
            $lname = mysqli_real_escape_string($db->link,$lname);
            $email = mysqli_real_escape_string($db->link,$email);
            $body = mysqli_real_escape_string($db->link,$body);
            $errMsg = "";
            if (empty($fname)) {
                $errMsg = "<span class='error'>First Name must not be empty!.</span>";
            }elseif (empty($lname)) {
                $errMsg = "<span class='error'>Last Name must not be empty!.</span>";
            }elseif (empty($email)) {
                $errMsg = "<span class='error'>Email Name must not be empty!.</span>";
            }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errMsg = "<span class='error'>Invalid Email!.</span>";
            }
            elseif (empty($body)) {
                $errMsg = "<span class='error'>body Name must not be empty!.</span>";
            }else{
                $contSql = "Insert into tbl_contact(fname,lname,email,body) values('$lname','$fname','$email','$body')";
                $insertRow = $db->insert($contSql);
                if ($insertRow) {
                    echo "<span class='success'>Email send Successfully.</span>"; 
                }else{
                    echo "<span class='error'>Failed to send!!</span>"; 
                }
            }
        }
        if (isset($errMsg)) {
            echo $errMsg;
        }else{

        }

    ?>


								<form class="row" action="" method="post">
									<div class="col-md-6 form-group">
										<input type="text" class="form-control" placeholder="Your First Name*"  name="fname"  />
									</div>
									<div class="col-md-6 form-group">
										<input type="text" class="form-control" placeholder="Your Last Name*"  name="lname" />
									</div>
									<div class="col-md-6 form-group">
										<input type="text" class="form-control" placeholder="Your email address*"  name="email" />
									</div>
									<!-- <div class="col-md-6 form-group">
										<input type="text" class="form-control" placeholder="Subject*"  name="contact-subject" id="input_subject" />
									</div> -->
									<div class="col-md-12 form-group">
										<textarea class="form-control" placeholder="Your Message"  name="body"></textarea>
									</div>
									<div class="col-md-12 form-group">
										<input type="submit"  name="submit" />
									</div>
									
								</form>
							</div>
						</div>
					</div><!-- Row /- -->
				</div><!-- Container /- -->
			</div><!-- Content Block /- -->
		</main>
	</div>
	

<?php include'inc/footer.php';?>
