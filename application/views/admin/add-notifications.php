  
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
	<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title"><?php echo $page_title; ?> </div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo base_url('home');?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active"><?php echo $page_title; ?></li>
				</ol>
			</div>
		</div> 

		<!-- start complaint form -->
			<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								
								 <form class="login100-form validate-form" method="post" enctype="multipart/form-data">
									<div class="card-body row"> 
										 
										<div class="col-md-12">
										    <label class="mdl-textfield__label" for="text7">सूचना</label> <br><br>
											<div class="col-lg-12 p-t-20">
												<div class="mdl-textfield mdl-js-textfield txt-full-width">
													<textarea class="mdl-textfield__input" name="notification" rows="5" id="text7" ></textarea>
													
													<script>
                                                         CKEDITOR.replace('notification',{ height:['100px']});
                                                    </script>
												</div>
											</div>
										</div>

										
										
									
										<div class="col-lg-12 p-t-20 text-center">
											<button type="submit"
												class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink" name="addnotification" value="addnotification">Submit</button>
											<a href="<?php echo base_url(); ?>Admin/notification_listing"
												class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</a>
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
