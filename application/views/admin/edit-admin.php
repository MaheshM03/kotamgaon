
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title"><?=$page_title?></div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo base_url(); ?>Admin/dashboard">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active"><?=$page_title?></li>
				</ol>
			</div>
		</div>
		<!-- start complaint form -->
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					
					 <form class="login100-form validate-form" method="post" enctype="multipart/form-data">
						<div class="card-body row">
							<div class="col-lg-6 p-t-20">
								<label class="mdl-textfield__label" for="text">First Name<span>&#42;</span></label><br/>
								<input class="mdl-textfield__input" type="text" name="admn_first_name" id="admn_first_name"value="<?php echo $vps->admn_first_name; ?>" required >
								<?=form_error('admn_first_name')?>
							</div>
							<div class="col-lg-6 p-t-20">
								<label class="mdl-textfield__label" for="text">Last Name<span>&#42;</span></label><br/>
								<input class="mdl-textfield__input" type="text" name="admin_last_name" id="admin_last_name"value="<?php echo $vps->admin_last_name; ?>" required >
								<?=form_error('admin_last_name')?>
							</div>
							
							<div class="col-lg-6 p-t-20">
								<label class="mdl-textfield__label" for="text">Email<span>&#42;</span></label><br/>
								<input class="mdl-textfield__input" type="email" name="admin_email_id" id="" value="<?php echo $vps->admin_email_id; ?>" required >
								<?=form_error('admin_email_id')?>
							</div>
							
							<div class="col-lg-6 p-t-20">
								<label class="mdl-textfield__label" for="text">Mobile<span>&#42;</span></label><br/>
								<input class="mdl-textfield__input" type="text" name="admin_mobile" maxlength="10" id=""value="<?php echo $vps->admin_mobile; ?>" required>
								<?=form_error('admin_mobile')?>
							</div>
							<div class="col-lg-6 p-t-20">
								<label class="mdl-textfield__label" for="file">Photo<span>&#42;</span></label><br/>
								<input class="mdl-textfield__input" type="file" name="image"  id="" value="<?php echo $vps->image; ?>" >
								<?=form_error('image')?>
								<?php if($vps->image!=""){ ?>
															
								<img src="<?php echo base_url(); ?>assets/images/user/<?php echo $vps->image; ?>" width="100" height="100" alt="user-image">
												 
								<?php }else{ ?> 
								<img src="<?php echo base_url();?>images/team1.jpg" width="100" height="100" alt="user-image">
								<?php  } ?>
							</div>
							
							 
                                 <div class="col-lg-12 p-t-20 text-center">

							

								<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink" type="submit" name="edit" value="edit">Update</button>

								<button type="button"

									class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default" onclick="window.location.href='<?=base_url()?>admin/dashboard'">Cancel</button>

							</div>

								

									
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- end  complaint form -->
	</div>
</div>
<!-- end page content -->

</div>