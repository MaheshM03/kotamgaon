  
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- <div class="page-bar">
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
		</div> --> 

		<!-- start complaint form -->
			<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header><?php echo $page_title; ?></header>									 
								</div>
								 <form class="login100-form validate-form" method="post" enctype="multipart/form-data">
									<div class="card-body row"> 
										 
										<div class="col-md-12">
										   
										
											<div class="col-lg-12 p-t-20">
												<div class="mdl-textfield mdl-js-textfield txt-full-width">
													<input type="text" name="name" class="mdl-textfield__input"  required> 
													<label class="mdl-textfield__label" for="text7"> Name</label>
												</div>
											
											</div>
											<div class="col-lg-12 p-t-20">
												<div class="mdl-textfield mdl-js-textfield txt-full-width">
													<input type="text" name="designation" class="mdl-textfield__input"  required> 
													<label class="mdl-textfield__label" for="text7"> Designation</label>
												</div>
											
											</div>
												<div class="col-lg-12 p-t-20">
												<div class="mdl-textfield mdl-js-textfield txt-full-width">
													<input type="text" name="team_description" class="mdl-textfield__input"  required> 
													<label class="mdl-textfield__label" for="text7"> Mobile</label>
												</div>
											
											</div>

										

											<div class="col-lg-12 p-t-20">
												<label class="control-label col-md-6">Image
												</label>
												<div class="col-md-12">
													<input type="file" name="image" accept="image/*" onchange="loadFile1(event)">
													<img id="image_preview"/></br>
													<span>Required Image Dimension 140 x 140</span>
												</div>
											</div>
									

										</div>
											<!--<div class="col-md-6">
											    <div class="col-lg-12 p-t-20">
												<div class="mdl-textfield mdl-js-textfield txt-full-width">
													<input type="text" name="fb"  class="mdl-textfield__input" required> 
													<label class="mdl-textfield__label" for="text7">Facebook</label>
												</div>
												
											</div>
											
											    <div class="col-lg-12 p-t-20">
												<div class="mdl-textfield mdl-js-textfield txt-full-width">
													<input type="text" name="insta"  class="mdl-textfield__input" required> 
													<label class="mdl-textfield__label" for="text7">Instagram</label>
												</div>
												
											</div>
											
										
											    <div class="col-lg-12 p-t-20">
												<div class="mdl-textfield mdl-js-textfield txt-full-width">
													<input type="text" name="twitter"  class="mdl-textfield__input" required> 
													<label class="mdl-textfield__label" for="text7">Twitter</label>
												</div>
												
											</div>
										
											    <div class="col-lg-12 p-t-20">
												<div class="mdl-textfield mdl-js-textfield txt-full-width">
													<input type="text" name="linkdin"  class="mdl-textfield__input" required> 
													<label class="mdl-textfield__label" for="text7">Linkdin</label>
												</div>
												
											</div>


											</div>-->

										

									
										<div class="col-lg-12 p-t-20 text-center">
											<button type="submit"
												class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink" name="medicine" value="medicine">Submit</button>
											<a href="<?php echo base_url(); ?>Admin/our_team_list"
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

  var url ='<strong>URL: </strong><?php echo base_url();?>medicine/'+key; 
  $("#url").html(url);
}
function showSlug()
{ 
  document.getElementById('url').innerHTML='<strong>URL: </strong><?php echo base_url();?>'+getSlugString(document.getElementById('category_slug').value);
}
</script>