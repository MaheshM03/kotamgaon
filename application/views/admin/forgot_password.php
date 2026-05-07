<!DOCTYPE html>
<html>
<?php $details=get_site_details();?>     
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="RedstarHospital" />
	<title>Forgot Password</title>
	<!-- google font -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet"
		type="text/css" />
	<!-- icons -->
	<link href="<?php echo base_url(); ?>assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iconic/css/material-design-iconic-font.min.css">
	<!-- bootstrap -->
	<link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/pages/extra_pages.css">
	<!-- favicon -->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/event/<?php echo $details->image3; ?>" />
</head>

<body>
	<div class="limiter page-background">
		
		<div class="container-login100 ">
			<div class="wrap-login102">
			<form class="login100-form validate-form"  method ="post">
					<span class="login100-form-logo">
					<!--	<img alt="" src="<?php echo base_url(); ?>assets/images/logo-2.png"> -->
						<img alt="" src="<?php echo base_url(); ?>assets/admin.png">
					</span>
					<span class="login100-form-title p-b-34 p-t-27" style="font-weight: 550;">
						Forgot Password 
					</span>
					<?php 
					 	if($this->session->flashdata('success')!='')
	                    { ?>
			                <div class="alert alert-success">
		                        <a href="#" class="close" data-dismiss="alert">&times;</a>
		                        <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
		                    </div>
	                    <?php }
	                  ?>
	                  <?php   
					 	if($this->session->flashdata('fail')!='')
	                    { ?>
			                <div class="alert alert-danger">
		                        <a href="#" class="close" data-dismiss="alert">&times;</a>
		                        <strong>Fail!</strong> <?php echo $this->session->flashdata('fail'); ?>
		                    </div>
	                    <?php }
	                  ?>
					<div class="wrap-input100 validate-input" data-validate="Enter Email">
						<input class="input100" type="email" name="admin_email_id" placeholder="User Email" value="" required>
						<span class="focus-input100" ></span>
					</div>
					
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="profile" value="profile">
							Submit
						</button>
					</div>
					<!-- <?php echo base_url(); ?>signin/forgot_password -->
					<div class="text-center p-t-30">
						<a class="txt1" href="<?php echo base_url(); ?>Admin/login">
							Back To Login
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- start js include path -->
	<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
	<!-- bootstrap -->
	<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/pages/extra-pages/pages.js"></script>
	<!-- end js include path -->
</body>

</html>
