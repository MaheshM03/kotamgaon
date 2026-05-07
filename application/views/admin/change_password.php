  
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title"><?php echo $page_title; ?> </div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo base_url('Distributor/dashboard');?>">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active"><?php echo $page_title; ?></li>
				</ol>
			</div>
		</div> 
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
					</div>
					<div class="card-body">
						<div class="mdl-tabs mdl-js-tabs">
							<div class="mdl-tabs__panel is-active p-t-20" id="profile-tab">
								<div class="card card-topline-aqua">									 
									<div class="card-body no-padding height-9">
										<form method="post" id="form_sample_1" class="form-horizontal"> 
											<div class="form-body">
												<div class="form-group row">
													<label class="control-label col-md-3">Current Password
														<span class="required" aria-required="true"> * </span>
													</label>
													<div class="col-md-4">
														<input type="text" name="curr_password" data-required="1" class="form-control" required>
													</div>
												</div>

												<div class="form-group row">
													<label class="control-label col-md-3">New Password
														<span class="required" aria-required="true"> * </span>
													</label>
													<div class="col-md-4">
														<input type="password" name="new_password" data-required="1" class="form-control" required>
													</div>
												</div>

												<div class="form-group row">
													<label class="control-label col-md-3">Confirm Password
														<span class="required" aria-required="true"> * </span>
													</label>
													<div class="col-md-4">
														<input type="password" name="con_password" data-required="1" class="form-control" required>
													</div>
												</div> 
												 
											</div>
											<div class="form-group">
												<div class="offset-md-3 col-md-9">
													<button type="submit" class="btn btn-info m-r-20" name="profile-btn" value="profile-submit">Submit</button>
													<button type="reset" class="btn btn-default">Cancel</button>
												</div>
											</div>
										</form>
									</div>									 
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end page content -->

</div>
<!-- end page container --> 
 