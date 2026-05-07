
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
		<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
		<!-- start complaint form -->
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					
					 <form class="login100-form validate-form" method="post" enctype="multipart/form-data">
						<div class="card-body row">
							<div class="col-lg-6 p-t-20">
								<label class="mdl-textfield__label" for="text">Email<span>&#42;</span></label><br/>
								<input class="mdl-textfield__input" type="text" name="site_email_id" id="site_email_id"value="<?php echo $details->site_email_id; ?>" required >
								<?=form_error('site_email_id')?>
							</div>
                            <div class="col-lg-6 p-t-20">
                                <label class="mdl-textfield__label" for="text">Mobile<span>&#42;</span></label><br/>
                                <input class="mdl-textfield__input" type="text" name="site_contact_no" id="site_contact_no" value="<?php echo $details->site_contact_no; ?>" required >
                                <?=form_error('site_contact_no')?>
                            </div>
							<div class="col-lg-6 p-t-20">
							<label class="mdl-textfield__label" for="text">Address<span>&#42;</span></label><br/>
								<textarea class="mdl-textfield__input" name="site_main_address" id="site_main_address"  rows="5"><?php echo $details->site_main_address; ?></textarea>
								<?=form_error('site_main_address')?>
								<script>
                                            CKEDITOR.replace('site_main_address',{ height:['100px']});
                                </script>
							</div>
							
							
							<div class="col-lg-6 p-t-20">
							<label class="mdl-textfield__label" for="text">Footer Content<span>&#42;</span></label><br/>
								<textarea class="mdl-textfield__input" name="footer_content" id="footer_content"  rows="5"><?php echo $details->footer_content; ?></textarea>
								<?=form_error('footer_content')?>
								<script>
                                            CKEDITOR.replace('footer_content',{ height:['100px']});
                                </script>
							</div>

							<div class="col-lg-6 p-t-20">
								<label class="mdl-textfield__label" for="text">Header Icon<span>&#42;</span></label><br/>
								<input class="mdl-textfield__input" type="file" id="image" name="image" value=""  >
								<br>
                                  <span style="color:#FF0000"> Required Image Dimension 500 x 500</span>
                                    <br><img id="img1" height="110px" width="130px" src="<?php echo base_url(); ?>images/<?php echo $details->site_logo_header; ?>" />
								<?=form_error('image')?>
							</div>
							<div class="col-lg-6 p-t-20">
								<label class="mdl-textfield__label" for="text">Footer Icon<span>&#42;</span></label><br/>
								<input class="mdl-textfield__input" type="file" name="site_logo_footer" id="site_logo_footer" value="<?php echo $details->site_logo_footer; ?>"  >
								<br>
                                     <span style="color:#FF0000"> Required Image Dimension 500 x 500</span>
                                    <br><img id="img2"  height="110px" width="130px" src="<?php echo base_url(); ?>images/<?php echo $details->site_logo_footer; ?>" />
								<?=form_error('site_logo_footer')?>
							</div>
			
							
							<div class="col-lg-6 p-t-20">
								<label class="mdl-textfield__label" for="text">Fav Icon<span>&#42;</span></label><br/>
								<input class="mdl-textfield__input" type="file" name="site_small_logo" id="site_small_logo" value="<?php echo $details->site_small_logo; ?>"  >
								<br>
                                     <span style="color:#FF0000"> Required Image Dimension 32 x 32</span>
                                    <br><img id="img3" height="110px" width="130px" src="<?php echo base_url(); ?>images/<?php echo $details->site_small_logo; ?>" />
								<?=form_error('site_small_logo')?>
							</div>
							
			
			
			
							 
                                 <div class="col-lg-12 p-t-20 text-center">

							

								<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink" type="submit" name="submit" value="submit">Submit</button>

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
var _URL = window.URL || window.webkitURL;
$("#image").change(function (e) {
    var file, img;
    if ((file = this.files[0])) 
    {
        img = new Image();
        img.onload = function (e) 
        {
            if(this.width == 500 && this.height == 500)
            {
              document.getElementById("img1").src = _URL.createObjectURL(file);;
            }
            else
            {
                alert("image must be in given formate");
                $('#image').val("");
            }
        }
        img.src = _URL.createObjectURL(file);
    };
});  

$("#site_logo_footer").change(function (e) {
    var file, img;
    if ((file = this.files[0])) 
    {
        img = new Image();
        img.onload = function (e) 
        {
            if(this.width == 500 && this.height == 500)
            {
              document.getElementById("img2").src = _URL.createObjectURL(file);;
            }
            else
            {
                alert("image must be in given formate");
                $('#site_logo_footer').val("");
            }
        }
        img.src = _URL.createObjectURL(file);
    };
});  
$("#site_small_logo").change(function (e) {
    var file, img;
    if ((file = this.files[0])) 
    {
        img = new Image();
        img.onload = function (e) 
        {
            if(this.width == 32 && this.height == 32)
            {
              document.getElementById("img3").src = _URL.createObjectURL(file);;
            }
            else
            {
                alert("image must be in given formate");
                $('#site_small_logo').val("");
            }
        }
        img.src = _URL.createObjectURL(file);
    };
});  


</script>