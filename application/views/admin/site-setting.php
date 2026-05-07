  
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
										 
										<div class="col-md-6">
											<div class="col-lg-12 p-t-20">
											    <label class="mdl-textfield__label" for="text7">Title</label>
												<div class="mdl-textfield mdl-js-textfield txt-full-width">
													<input type="text" name="title" value="<?php echo $meter_data->title; ?>"class="mdl-textfield__input" required> 
												
												</div>
											
											</div>
											<div class="col-lg-12 p-t-20">
											   <label class="mdl-textfield__label" for="text7">Phone</label> 
												<div class="mdl-textfield mdl-js-textfield txt-full-width">
													<input type="text" name="phone" value="<?php echo $meter_data->phone; ?>"class="mdl-textfield__input" onkeyup="catsetSlug(this.value);" required> 
													
												</div>
											
											</div>
											<div class="col-lg-12 p-t-20">
											    <label class="mdl-textfield__label" for="text7">Email</label>
												<div class="mdl-textfield mdl-js-textfield txt-full-width">
													<input type="text" name="email" value="<?php echo $meter_data->email; ?>"class="mdl-textfield__input" onkeyup="catsetSlug(this.value);" required> 
													
												</div>
											
											</div>
											
											<div class="col-lg-12 p-t-20">
											    <label class="mdl-textfield__label" for="text7">Address</label>
												<div class="mdl-textfield mdl-js-textfield txt-full-width">
													
													
												    <input type="text" name="address" rows="5"  value="<?php echo $meter_data->address; ?>"class="mdl-textfield__input" required> 
												
												</div>
											</div>
										

										

											
											
										

										</div>

										<div class="col-md-6">
										    <!--<div class="col-lg-12 p-t-20">
												<label class="control-label col-md-6">Header Logo
												</label>
												<div class="col-md-12">
													<input type="file" name="img1" accept="image/*" onchange="loadFile1(event)">
													<?php if($meter_data->image1!=""){ ?>
															
															<img src="<?php echo base_url(); ?>assets/images/event/<?php echo $meter_data->image1; ?>" alt="Girl in a jacket" width="100" height="100">
																<img id="image_preview1"/></br>
																<span>Required Image Dimension 282 x 51</span>
													<?php }else{ ?> 
														<img id="image_preview1"/></br>
																<span>Required Image Dimension 282 x 51</span>
													<?php  } ?>
												</div>
											</div>
											<div class="col-lg-12 p-t-20">
												<label class="control-label col-md-6">Footer Logo
												</label>
												<div class="col-md-12">
													<input type="file" name="img2" accept="image/*" onchange="loadFile1(event)">
													<?php if($meter_data->image2!=""){ ?>
															
															<img src="<?php echo base_url(); ?>assets/images/event/<?php echo $meter_data->image2; ?>" alt="Girl in a jacket" width="100" height="100">
																	<img id="image_preview1"/></br>
																<span>Required Image Dimension 282 x 51</span>
													<?php }else{ ?> 
														<img id="image_preview1"/></br>
																<span>Required Image Dimension 282 x 51</span>
													<?php  } ?>
												</div>
											</div>-->
											<div class="col-lg-12 p-t-20">
												<label class="control-label col-md-6">Fav Icon
												</label>
												<div class="col-md-12">
													<input type="file" name="img3" accept="image/*" onchange="loadFile1(event)">
													<?php if($meter_data->image3!=""){ ?>
															
															<img src="<?php echo base_url(); ?>assets/images/event/<?php echo $meter_data->image3; ?>" alt="Girl in a jacket" width="100" height="100">
																<img id="image_preview1"/></br>
																<span>Required Image Dimension 50 x 50</span>
													<?php }else{ ?> 
														<img id="image_preview1"/></br>
																<span>Required Image Dimension 50 x 50</span>
													<?php  } ?>
												</div>
											</div>
										     
											
											
											
											</div>
									
										<div class="col-lg-12 p-t-20 text-center">
											<button type="submit"
												class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink" name="cat-btn" value="cat-submit">Submit</button>
											<a href="<?php echo base_url(); ?>admin/dashboard"
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
<!-- end page container --> 
<script language="javascript" type="text/javascript">
 
 function isNumber(evt) {      
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }
    
function catsetSlug(key)
{
  key = key.replace(/\s+/g, '-');
  key= key.replace(/\//g, "-");
  key=key.replace(/\-\-+/g,"-");
  key=key.replace(/\_\_+/g,"-");
  key=key.replace(/\_+/g,"-");
  key=key.replace('&',"and");
  key=key.replace('.',"-");

  key = key.toLowerCase();
  $("#category_slug").val(key);

  var url ='<strong>URL: </strong><?php echo base_url();?>event/'+key; 
  $("#url").html(url);
}
function showSlug()
{ 
  document.getElementById('url').innerHTML='<strong>URL: </strong><?php echo base_url();?>'+getSlugString(document.getElementById('category_slug').value);
}
</script>