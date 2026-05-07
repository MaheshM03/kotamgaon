  
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
											    	<label class="mdl-textfield__label" for="text7">Title</label>
												<div class="mdl-textfield mdl-js-textfield txt-full-width">
													<input type="text" name="title" class="mdl-textfield__input"  > 
												
												</div>											 
											</div>
											<div class="col-lg-12 p-t-20">
											    <label class="mdl-textfield__label" for="text7">Sub Title</label>
												<div class="mdl-textfield mdl-js-textfield txt-full-width">
													<input type="text" name="sub_title" class="mdl-textfield__input"  > 
													
												</div>											 
											</div										
											<div class="col-lg-12 p-t-20">
												<label class="control-label col-md-6">Image
												</label>
												<div class="col-md-12">
													<input type="file" name="image" accept="image/*" required onchange="loadFile1(event)">
													<img id="image_preview"/></br>
													<span>Required Image Dimension 1600 x 600</span>
												</div>
											</div>					

										</div>									
										<div class="col-lg-12 p-t-20 text-center">
											<button type="submit"
												class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink" name="slider" value="slider">Submit</button>
											<a href="<?php echo base_url(); ?>Admin/slider"
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

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
 $('#cat_id').change(function(){
  var cat_id = $('#cat_id').val();
  if(cat_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>admin/fetch_subcatgory",
    method:"POST",
    data:{cat_id:cat_id},
    success:function(data)
    {
     $('#subcat_id').html(data);
    }
   });
  }
  else
  {
   $('#subcat_id').html('<option value="">Select Subcategory</option>');
  }
 });
 
});
</script>
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

  var url ='<strong>URL: </strong><?php echo base_url();?>animal/'+key; 
  $("#url").html(url);
}
function showSlug()
{ 
  document.getElementById('url').innerHTML='<strong>URL: </strong><?php echo base_url();?>'+getSlugString(document.getElementById('category_slug').value);
}
</script>