
      
<?php $data=get_site_details();?>    
<!DOCTYPE html>
<html>
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <!-- Basic -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title> <?php echo $data->title;?></title>
      <meta name="keywords" content="" />
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- Favicon -->
      <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/event/<?php echo $data->image3;?>" type="image/x-icon" />
      <link rel="apple-touch-icon" href="<?php echo base_url();?>assets/images/event/<?php echo $data->image3;?>">
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
      <!-- Web Fonts  -->
      <link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&amp;display=swap" rel="stylesheet" type="text/css">
      <!-- Vendor CSS -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/front/vendor/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/front/vendor/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/front/vendor/animate/animate.compat.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/front/vendor/simple-line-icons/css/simple-line-icons.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/front/vendor/owl.carousel/assets/owl.carousel.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/front/vendor/owl.carousel/assets/owl.theme.default.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/front/vendor/magnific-popup/magnific-popup.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/front/vendor/bootstrap-star-rating/css/star-rating.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/front/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.css">
      <!-- Theme CSS -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/theme.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/theme-elements.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/theme-blog.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/theme-shop.css">
      <!-- Demo CSS -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/demos/demo-auto-services.css">
      <!-- Skin CSS -->
      <link id="skinCSS" rel="stylesheet" href="<?php echo base_url();?>assets/front/css/skins/skin-auto-services.css">
      <!-- Theme Custom CSS -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/custom.css">
      <!-- Head Libs -->
      <script src="<?php echo base_url();?>assets/front/vendor/modernizr/modernizr.min.js"></script>
      <style>
         .skiptranslate iframe {
         display: none !important;
         } 
         .goog-te-gadget-simple span {
         color: #1d1a1a;
         }
         body {
         top: 0px !important; 
         }
         .header-top {
         background-color: #ec7b00;  !important;
         color: white !important;
         }
         .header-top a {
         color: white !important;
         }
         .header-top i {
         color: white !important;
         }
      </style>
   </head>
   <body>
      <div class="body">
      <header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAt': 54, 'stickySetTop': '-54px', 'stickyChangeLogo': false}">
         <div class="header-body header-body-bottom-border-fixed box-shadow-none border-top-0">
            <div class="header-top header-top-small-minheight header-top-simple-border-bottom">
               <div class="container py-2">
                  <div class="header-row justify-content-between">
                     <div class="header-column col-auto px-0">
                        <div class="header-row">
                           <div class="header-nav-top">
                              <ul class="nav nav-pills position-relative">
                                 <li class="nav-item d-none d-sm-block">
                                    <span class="d-flex align-items-center font-weight-medium ws-nowrap text-3 ps-0"><a href="mailto: <?php echo $data->email;?>" class="text-decoration-none text-color-dark text-color-hover-primary"><i class="icons icon-envelope font-weight-bold position-relative text-4 top-3 me-1"></i> <?php echo $data->email;?> </a></span>
                                 </li>
                                 <li class="nav-item nav-item-left-border nav-item-left-border-remove nav-item-left-border-sm-show">
                                    <span style="color:white !important;" class="d-flex align-items-center font-weight-medium ws-nowrap text-3">
                                    <i class="icons icon-phone font-weight-bold position-relative text-3 top-1 me-2" style="color:white !important;"></i>
                                    <?php echo $data->phone;?>
                                    </span>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="header-container container">
               <div class="header-row">
                  <div class="header-column w-100">
                     <div class="header-row justify-content-between">
                        <div class="header-column col-auto px-0">
                           <div class="header-row">
                              <div class="header-nav-top">
                                 <a href="<?php echo base_url();?>">
                                    <h2 style="display:inline; font-weight:bold; margin:0; padding:0;color: #ec7b00;">
                                     <?php echo $data->title;?>
                                    </h2>
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div class="header-nav-links justify-content-end pe-lg-4 me-lg-4">
                           <div class="header-nav-main header-nav-main-arrows header-nav-main-dropdown-no-borders header-nav-main-effect-3 header-nav-main-sub-effect-1">
                              <nav class="collapse">
                                 <ul class="nav nav-pills" id="mainNav">
                                    <li><a href="<?php echo base_url();?>" class="nav-link ">होम</a></li>
                                    <!--<li><a href="<?php echo base_url();?>padadhikari" class="nav-link ">प्रशासन</a></li>-->
                                    <li><a href="<?php echo base_url();?>education" class="nav-link ">शिक्षण विभाग</a></li>
                                    <li><a href="<?php echo base_url();?>health" class="nav-link ">आरोग्य विभाग</a></li>
                                    <li><a href="<?php echo base_url();?>dam" class="nav-link">धरण</a></li>
                                    <li><a href="<?php echo base_url();?>bachat-gat" class="nav-link">बचत गट</a></li>
                                    <li><a href="<?php echo base_url();?>kar-bharna" class="nav-link">कर भरणा</a></li>
                                    <li class="dropdown">
                                       <a href="#" class="nav-link dropdown-toggle ">योजना<i class="fas fa-chevron-down"></i></a>
                                       <ul class="dropdown-menu">
                                          <li><a href="https://pmaymis.gov.in/pmaymis2_2024/PMAY_SURVEY/EligiblityCheck.aspx"  target="_blank" class="dropdown-item">प्रधान मंत्री आवास योजना</a></li>
                                          <li><a href="https://water.maharashtra.gov.in/?attachment_id=6711" class="dropdown-item" target="_blank">जल जीवन मिशन</a></li>
                                          <li><a href="https://prd.cg.gov.in/VittAyog.aspx" target="_blank" class="dropdown-item">१५ वित्त आयोग</a></li>
                                          <li><a href="https://ratnagiri.gov.in/en/mgnrea/" class="dropdown-item">महात्मा गांधी राष्ट्रीय ग्रामीण रोजगार हमी योजना</a></li>
                                          <li><a href="https://obcbahujankalyan.maharashtra.gov.in/mr/schemes/48" target="_blank" class="dropdown-item">तांडा/वस्ती योजना</a></li>
                                          <li><a href="https://www.acswnagpur.in/scheme_description/60"  target="_blank" class="dropdown-item">अनुसूचीत जाती व नवबौध्द विकास योजना</a></li>
                                          <li><a href="https://www.mahaawaas.org/ramaigrm.html" target="_blank" class="dropdown-item">रमाई  आवास योजना</a></li>
                                          <li><a href="https://www.mahaawaas.org/shabrigrm.html" target="_blank" class="dropdown-item">शबरी आवास योजना</a></li>
                                       </ul>
                                    </li>
                                    <li><a href="<?php echo base_url();?>photo" class="nav-link ">गॅलरी</a></li>
                                    <li><a href="<?php echo base_url();?>contact" class="nav-link ">संपर्क</a></li>
                                 </ul>
                              </nav>
                           </div>
                        </div>
                        <button class="btn header-btn-collapse-nav ms-4" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
                        <i class="fas fa-bars"></i>
                        </button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>