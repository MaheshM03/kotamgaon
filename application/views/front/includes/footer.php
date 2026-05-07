<?php $data=get_site_details();?>



<style>
            .zoom {
            padding: 15px;
            transition: transform .2s; /* Animation */
            margin: 0 auto;
            }
            .zoom:hover {
            transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
            }
         </style>
         
          <section class="section bg-transparent position-relative border-0 z-index-1 m-0 p-0">
            
            <svg class="custom-svg-3" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 193 495">
               <path class="svg-fill-color-primary" d="M193,25.73L18.95,247.93c-13.62,17.39-10.57,42.54,6.82,56.16L193,435.09V25.73z"></path>
               <path fill="none" stroke="#FFF" stroke-width="1.5" stroke-miterlimit="10" d="M196,53.54L22.68,297.08c-12.81,18-8.6,42.98,9.4,55.79L196,469.53V53.54z"></path>
            </svg>
         </section>
         
         <footer id="footer" class="border-0 mt-0">
            <hr class="bg-light opacity-2 my-0">
            <div class="container pb-5">
               <div class="row text-center text-md-start py-4 my-5">
                  <div class="col-md-6 col-lg-3 mb-5 mb-md-0">
                     <h5 class="text-transform-none font-weight-bold text-color-light text-4-5 mb-4"> महत्वाच्या लिंक  </h5>
                     <ul class="list list-unstyled mb-0 text-4-4">
                        <li class='mb-0'><a href="https://gr.maharashtra.gov.in/1145/Government-Resolutions" target="_blank" >शासन निर्णय</a></li>
                        <li class='mb-0'><a href="https://zpnashik.maharashtra.gov.in/" target="_blank" >नाशिक जिल्हा परिषद</a></li>
                        <li class='mb-0'><a href="https://www.maharashtra.gov.in/1125"  >महाराष्ट्र शासन</a></li>
                        <li class='mb-0'><a href="https://www.mahaonline.gov.in/"  >महा ऑनलाईन</a></li>
                        <li class='mb-0'><a href="https://nashik.gov.in/en/services/rti/"  >माहिती अधिकार</a></li>
                     </ul>
                  </div>
                  <div class="col-md-6 col-lg-3 mb-5 mb-md-0">
                     <h5 class="text-transform-none font-weight-bold text-color-light text-4-5 mb-4">  महत्वाच्या लिंक </h5>
                     <ul class="list list-unstyled mb-0 text-4-4">
                        <li class='mb-0'><a href="https://ceoelection.maharashtra.gov.in/ceo/"  >मतदान यादीत नाव शोधणेसाठी</a></li>
                        <li class='mb-0'><a href="https://mahadbtmahait.gov.in/Farmer/Login/Login"  >कृषी विभाग महाडीबीटी</a></li>
                        <li class='mb-0'><a href="https://bhulekh.mahabhumi.gov.in/"  >७/१२ उतारा</a></li>
                     </ul>
                  </div>
                  <div class="col-md-6 col-lg-3 mb-5 mb-md-0">
            <h5 class="text-transform-none font-weight-bold text-color-light text-4-5">सोशल मीडिया</h5>
            <ul class="social-icons social-icons-clean-with-border">
               <li class="social-icons-instagram">
                  <a href="<?php echo $data->instagram;?>" class="no-footer-css" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
               </li>
               <li class="social-icons-twitter mx-2">
                  <a href="<?php echo $data->twitter;?>" class="no-footer-css" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
               </li>
               <li class="social-icons-facebook">
                  <a href="<?php echo $data->facebook;?>" class="no-footer-css" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
               </li>
               <li class="social-icon-youtube mx-2">
                  <a href="<?php echo $data->linkdin;?>" class="no-footer-css" target="_blank" title="youtube"><i class="fab fa-youtube"></i></a>
               </li>
            </ul>
         </div>
         <div class="col-md-6 col-lg-3 mb-5 mb-md-0">
            <h5 class="text-transform-none font-weight-bold text-color-light text-4-5">पत्ता </h5>
            <p class="list list-unstyled mb-1 text-4-4">
               <?php echo $data->title;?> <?php echo $data->address;?> <br>
               <a href="https://maps.app.goo.gl/q4noMhNmwp8j98eKA" target="_BLANK" data-hash="" data-hash-offset="0" data-hash-offset-lg="100" class="d-inline-block custom-text-underline-1 font-weight-bold border-color-primary text-decoration-none text-3-5 appear-animation animated maskUp appear-animation-visible" data-appear-animation="maskUp" data-appear-animation-delay="500" style="animation-delay: 500ms;">गेट डायरेक्शन्स</a><br>
            </p>
         </div>
               </div>
            </div>
            <div class="footer-copyright bg-light py-4">
               <div class="container py-2">
                  <div class="row">
                     <div class="col">
                        <p>© <?php echo date('Y'); ?>  <?php echo $data->title; ?> <?php echo $data->address; ?>— सर्व हक्क राखीव.  </p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="notice-top-bar bg-primary" data-sticky-start-at="100">
               <button class="hamburguer-btn hamburguer-btn-light notice-top-bar-close m-0 active" data-set-active="false">
               <span class="close">
               <span></span>
               <span></span>
               </span>
               </button>
               
            </div>
         </footer>
<script src="<?php echo base_url();?>assets/front/vendor/plugins/js/plugins.min.js"></script>
<script src="<?php echo base_url();?>assets/front/vendor/bootstrap-star-rating/js/star-rating.min.js"></script>
<script src="<?php echo base_url();?>assets/front/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.js"></script>
<!-- Theme Base, Components and Settings -->
<script src="<?php echo base_url();?>assets/front/js/theme.js"></script>
<!-- Current Page Vendor and Views -->
<script src="<?php echo base_url();?>assets/front/js/views/view.contact.js"></script>
<script src="<?php echo base_url();?>assets/front/js/views/view.shop.js"></script>
<!-- Demo -->
<script src="<?php echo base_url();?>assets/front/js/demos/demo-auto-services.js"></script>
<!-- Theme Custom -->
<script src="<?php echo base_url();?>assets/front/js/custom.js"></script>
<!-- Theme Initialization Files -->
<script src="<?php echo base_url();?>assets/front/js/theme.init.js"></script>
         
      </div>
   </body>
   
</html>