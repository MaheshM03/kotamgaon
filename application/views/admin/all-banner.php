

<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title"><?php echo $page_title;?></div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo base_url(); ?>admin/dashboard">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active"><?php echo $page_title;?></li>
				</ol>
			</div>
		</div>


		<!-- start new student list -->
		<div class="row">
			<div class="col-md-12">
				<div class="tabbable-line">

					<div class="tab-content">
						<div class="tab-pane active fontawesome-demo" id="tab1">
							<div class="row">
								<div class="col-md-12">
									<div class="card card-box">
										
										<div class="card-body ">
											<div class="row text-right" >
												<div class="col-md-12 col-sm-12 col-12">
													<div class="btn-group ">
											<a href="<?php echo base_url().'admin/add_banner';?>" id="addRow" class="btn btn-info">
																		Add New  <i class="fa fa-plus"></i>
																	</a>
													
													</div>
												</div>
											
											</div>
											<div class="table-scrollable">
												<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
													
													<thead>
														<tr>

															<th> Sr No </th>
															<th> Image</th>
															
															<th> Status</th>
															<th> Added On</th>
															<th> Action </th>
															
														</tr>
													</thead>
													<tbody>
														<?php 
														if($banners)
														{
															$i=1;
															foreach($banners as $banner)
															{
																?>
															<tr class="odd gradeX">

															<td class="left"><?php echo $i;?></td>
														
															<td><img  height="110px" width="130px" src="<?php echo base_url(); ?>assets/images/banner/<?php echo $banner->banner_image; ?>" /></td>
														
															<td><button class="btn-xs btn-success"><?php echo $banner->status;?></button></td>
														
															<td><?php echo date_in_format($banner->added_date); ?></td>
																<td class="text-center">
																<a class="btn btn-warning btn-xs" title="Edit" href="<?php echo base_url(); ?>Admin/edit_banner/<?php echo $banner->banner_id; ?>"><i class="fa fa-pencil"></i></a>	
																<a class="btn btn-danger btn-xs" title="Delete" href="<?php echo base_url(); ?>Admin/delete_banner/<?php echo $banner->banner_id; ?>"><i class="fa fa-trash"></i></a>	
															
															</td>
														</tr>
															<?php
															$i++;
														}
														}
														?>
														
														
													
													</tbody>
												</table>
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
		<!-- end new student list -->
	</div>
</div>
<!-- end page content -->

</div>
<!-- end page container -->
