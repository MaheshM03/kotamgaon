
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
					
					<form method="post" enctype="multipart/form-data">
						<div class="card-body row">
							<div class="col-lg-12 p-t-20">
								<label class="mdl-textfield__label" for="text">Title<span>&#42;</span></label><br/>
								<input class="mdl-textfield__input" type="text" name="banner_title" id="banner_title" value="<?php echo $details->banner_title; ?>">
								<?=form_error('banner_title')?>
							</div>
							
					
							<div class="col-lg-12 p-t-20">
								<label class="mdl-textfield__label" for="text">Image<span>&#42;</span></label><br/>
								<input class="mdl-textfield__input" type="file" name="banner_image" id="banner_image" value="">
								<br><span style="color:#FF0000"> Required Image Dimension 740 x 590</span>
                                <br> <img id="img1" height="110px" width="130px" /> 
                               <?php if($details->banner_image==''){ ?>
                                <img id="img1" height="110px" width="130px" /> 
                                <?php }else{ ?>
                                <img src="<?php echo base_url(); ?>assets/images/banner/<?php echo $details->banner_image; ?>" height="110px" width="130px" /> 
                                <?php } ?>                                
								<?=form_error('banner_image')?>
							</div>
				
							<div class="col-lg-12 p-t-20 text-center">
							
								<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink" type="submit" name="submit" value="submit">Submit</button>
								<button type="button"
									class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default" onclick="window.location.href='<?=base_url()?>admin/banner_list'">Cancel</button>
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
$("#banner_image").change(function (e) {
    var file, img;
    if ((file = this.files[0])) 
    {
        img = new Image();
        img.onload = function (e) 
        {
           
              document.getElementById("img1").src = _URL.createObjectURL(file);;
           
        }
        img.src = _URL.createObjectURL(file);
    };
});  

</script>