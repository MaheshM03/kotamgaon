  
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- <div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title"><?php echo $page_title; ?></div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo base_url('home');?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active"><?php echo $page_title; ?></li>
				</ol>
			</div>
		</div> -->
 

		<!-- start new student list -->
		<div class="row">
			<div class="col-md-12">
				<div class="tabbable-line">

					<div class="tab-content">
						<div class="tab-pane active fontawesome-demo" id="tab1">
							<div class="row">
								<div class="col-md-12">
									<div class="card card-box">
										<div class="card-head">
											<header><?php echo $page_title; ?></header>
											 <div class="pull-right">
												<!--	<div class="btn-group">
														<a href="<?php echo base_url(); ?>admin/services_add" id="addRow" class="btn btn-info">
															Add New <i class="fa fa-plus"></i>
														</a>													
													</div>-->
												</div>
										</div>
										<div class="card-body "> 
											<div class="table-scrollable">
												<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
													<thead>
														<tr>

															<th> Sr No </th>
															<th> Title </th>
															<th> Status </th>
															<th> Action </th>
														</tr>
													</thead>
													<tbody>
														<?php 
														if ($category_data) {
															$sr=1;
															foreach ($category_data as $value) {?>
															<tr class="odd gradeX">
																<td class="left"><?php echo $sr++; ?></td>
																<td><?php echo $value->news_title; ?></td>
																	
																												 
																 <td class="left">
                                                                    <?php if($value->news_status=='Active')
                                                                    { $class="btn-xs btn-success"; }
                                                                    else 
                                                                    { $class="btn-xs btn-danger";  } ?>
                                                                    <button class="<?php echo $class; ?>" title="Change Status" onClick="if(confirm('Are you sure to Change status??'))location.href='<?php echo base_url(); ?>Admin/change_status/<?php echo $value->news_id."/".$value->news_status; ?>'"><?php echo $value->news_status; ?></button>
                                                                </td>
																<td>
																	<a href="<?php echo base_url(); ?>Admin/services_edit/<?php echo $value->news_id; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>						
                                                                 
																</td>
															</tr>

														<?php
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
<script data-require="jquery@*" data-semver="2.0.3" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script data-require="bootstrap@*" data-semver="3.1.1" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
 
 <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                </div>
            
                <div class="modal-body">
                    <p>Do you want to proceed?</p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>

     <script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            
            $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
        });
    </script>