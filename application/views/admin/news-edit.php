  
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
													<input type="text" name="cat_name" value="<?php echo $meter_data->news_title; ?>"class="mdl-textfield__input"  required> 
													
												</div>
												
											</div>
											<div class="col-lg-12 p-t-20">
											    	<label class="mdl-textfield__label" for="text7">Description</label>
												<div class="mdl-textfield mdl-js-textfield txt-full-width">
												    
													<textarea class="mdl-textfield__input" name="cat_description" rows="5" id="text7" ><?php echo $meter_data->news_description; ?></textarea>
												
													<script>
                                                         CKEDITOR.replace('cat_description',{ height:['150px']});
                                                    </script>
												</div>
											</div>
											
											

								
										</div>

										
										
									
										<div class="col-lg-12 p-t-20 text-center">
											<button type="submit"
												class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink" name="cat-btn" value="cat-submit">Submit</button>
											<a href="<?php echo base_url(); ?>Admin/services_list"
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

  var url ='<strong>URL: </strong><?php echo base_url();?>news/'+key; 
  $("#url").html(url);
}
function showSlug()
{ 
  document.getElementById('url').innerHTML='<strong>URL: </strong><?php echo base_url();?>'+getSlugString(document.getElementById('category_slug').value);
}
</script>