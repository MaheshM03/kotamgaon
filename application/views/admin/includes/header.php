<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<?php $details=get_site_details();?>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="SmartUniversity" />
	<title><?php echo $details->title; ?></title>
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
	<link href="<?php echo base_url();?>assets/fonts/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
	<!--bootstrap -->
	<link href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/summernote/summernote.css" rel="stylesheet">
	<!-- data tables -->
	<link href="<?php echo base_url();?>assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet"	type="text/css" />
	<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/material/material.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/material_style.css">
	<!-- inbox style -->
	<link href="<?php echo base_url();?>assets/css/pages/inbox.min.css" rel="stylesheet" type="text/css" />
	<!-- Theme Styles -->
	<link href="<?php echo base_url();?>assets/css/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" />
	
	<link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/theme-color.css" rel="stylesheet" type="text/css" />
	<!-- dropzone -->
	<!-- <link href="<?php echo base_url();?>assets/css/plugins/dropzone/dropzone.css" rel="stylesheet" media="screen"> -->
	<!-- Date Time item CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.css" />
	<!-- custom-->
	<link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css" />
	<script>CKEDITOR.dtd.$removeEmpty['span'] = false;</script>
    <script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
	<!-- favicon -->
	<link rel=icon href="<?php echo base_url(); ?>assets/images/event/<?php echo $details->image3; ?>" sizes="20x20" type="image/png">
 <!--select2-->
    <link href="<?php echo base_url();?>assets/plugins/select2/css/select2.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lobibox-master/dist/css/lobibox.min.css"/>
    <!-- Data Table -->
    <link href="<?php echo base_url();?>assets/plugins/datatables/export/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    
</head>
<!-- END HEAD -->

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
	<div class="page-wrapper">
		<!-- start header -->
		<div class="page-header navbar navbar-fixed-top">
			<div class="page-header-inner ">
				<!-- logo start -->
				<div class="page-logo">
					<a href="<?php echo base_url(); ?>admin/dashboard">
						
						<span style="font-size: 15px;" class="logo-default"><?php echo $details->title; ?><span> </a>
				</div>
				<!-- logo end -->
				<ul class="nav navbar-nav navbar-left in">
					<li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
				</ul>
			
				<!-- start mobile menu -->
				<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
					data-target=".navbar-collapse">
					<span></span>
				</a>
				<!-- end mobile menu -->
				<!-- start header menu -->
					<div class="top-menu">
					<ul class="nav navbar-nav pull-right">
						<li><a href="javascript:;" class="fullscreen-btn"><i class="fa fa-arrows-alt"></i></a></li>
						
						
						<!-- start manage user dropdown -->
						<li class="dropdown dropdown-user">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
								data-close-others="true">
							    <img alt="" class="img-circle " style="height: 30px;width: 30px;" src="<?php echo base_url(); ?>assets/images/user/<?php echo $_SESSION[admin_session_name]['image'];?>">
								<span class="username username-hide-on-mobile"><?php echo $_SESSION[admin_session_name]['first_name'];?> <?php echo $_SESSION[admin_session_name]['last_name'];?>   </span>
								<i class="fa fa-angle-down"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-default">
								<li>
									<a href="<?php echo base_url(); ?>admin/site_setting">
										<i class="icon-settings"></i> सेटिंग</a>
								</li>
								<li>
									<a href="<?php echo base_url(); ?>admin/change_password">
										<i class="icon-lock"></i> पासवर्ड बदला
									</a>
								</li>
								
								<li class="divider"> </li>
								
								<li>
									<a href="<?php echo base_url(); ?>admin/logout">
										<i class="icon-logout"></i> बाहेर पडा </a>
								</li>
							</ul>
						</li>
						<!-- end manage user dropdown -->
						
					</ul>
				</div>
			</div>
		</div>
		<!-- end header -->
		
		<!-- start page container -->
		<div class="page-container">
			<!-- start sidebar menu -->
			<div class="sidebar-container">
				<div class="sidemenu-container navbar-collapse collapse fixed-menu">
					<div id="remove-scroll" class="left-sidemenu">
						<ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false"
							data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
							<li class="sidebar-toggler-wrapper hide">
								<div class="sidebar-toggler">
									<span></span>
								</div>
							</li>
							<li class="sidebar-user-panel">
								<div class="user-panel">
									<div class="pull-left image">
									     <?php if($_SESSION[admin_session_name]['image']!=""){ ?>
															
											<img src="<?php echo base_url(); ?>assets/images/user/<?php echo $_SESSION[admin_session_name]['image'];?>" class="img-circle user-img-circle"
											alt="User Image" />
															 
											<?php }else{ ?> 
											<img src="<?php echo base_url();?>assets/img/logo.png" class="img-circle user-img-circle"
											alt="User Image" />
											<?php  } ?>
										
									</div>
									<div class="pull-left info">
										<p>  </p>
										<p><?php echo $_SESSION[admin_session_name]['first_name'];?></br> <?php echo $_SESSION[admin_session_name]['last_name'];?></p>
										
									</div>
								</div>
							</li>

                         <?php $session_id = $this->session->userdata(admin_session_name)['admin_type']; ?>
							
							<li class="nav-item active">
								<a href="<?php echo base_url(); ?>admin/dashboard" class="nav-link nav-toggle"> 
										<i class="material-icons">dashboard</i>
										<span class="title">डॅशबोर्ड</span>
								</a>
							</li>

						

						
                            
                            
                           	<li class="nav-item">

								<a href="#" class="nav-link nav-toggle"> 
									<i class="fa fa-newspaper-o" aria-hidden="true"></i>
									<span class="title">मास्टर</span>
								</a>
								<ul class="sub-menu" style="display: none;">
								    
            						<li class="nav-item">
            							<a href="<?php echo base_url().'Admin/slider';?>" class="nav-link nav-toggle"> 
            								<i class="fa fa-file-image-o"></i>
            								<span class="title">स्लायडर</span>
            							</a>
            						</li>
            						
            					
							<li class="nav-item">
            									<a href="<?php echo base_url().'Admin/services_list';?>" class="nav-link"> 
            										<i class="fa fa-folder" aria-hidden="true"></i>
            										<span class="title">विभाग</span>
            									</a>
            
            				</li>
    						<li class="nav-item">
    									<a href="<?php echo base_url().'Admin/banner_list';?>" class="nav-link"> 
    										<i class="fa fa-picture-o" aria-hidden="true"></i>
    										<span class="title">गॅलरी</span>
    									</a>
    
    						</li>
    						<!--<li class="nav-item">
                            		<a href="<?php echo base_url().'Admin/notification_listing';?>" class="nav-link nav-toggle"> 
                            			<i class="material-icons">subtitles</i>
                            			<span class="title">सूचना</span>
                            		</a>
                            </li>-->
                            
                            <li class="nav-item">
										<a href="<?php echo base_url().'Admin/our_team_list';?>" class="nav-link nav-toggle"> 
											<i class="fa fa-users"></i>
											<span class="title">प्रशासन </span>
										</a>
							</li>
            					
        							
        							<li class="nav-item">
										<a href="<?php echo base_url().'Admin/site_setting';?>" class="nav-link nav-toggle"> 
											<i class="fa fa-cog"></i>
											<span class="title">सेटिंग</span>
										</a>
									</li>
							</ul>
							</li>
							
						
						
							
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>admin/edit_profile" class="nav-link nav-toggle">
								    <i class="fa fa-user" aria-hidden="true"></i>
								     <span class="title">प्रोफाइल</span>
								</a>
							</li>		
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>admin/change_password" class="nav-link nav-toggle">
								    <i class="fa fa-key" aria-hidden="true"></i>
								     <span class="title">पासवर्ड बदला</span>
								</a>
							</li>		
							<li class="nav-item">
								<a href="<?php echo base_url(); ?>admin/logout" class="nav-link nav-toggle">
								    <i class="fa fa-sign-out"></i>
								     <span class="title">बाहेर पडा</span>
								</a>
							</li>

						
						</ul>
					</div>
				</div>
			</div>
			<!-- end sidebar menu -->