<?php $data=get_site_details();?>        
          

        </div> 
        <!-- Main content End --><!-- Footer Start -->
        <footer id="rs-footer" class="rs-footer style2">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12 col-sm-12 footer-widget">
                            <div class="footer-logo mb-30">
                                <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/<?php echo $data->site_logo_footer;?>" alt=""></a>
                            </div>
                              <div class="textwidget white-color pb-30"><p><?php echo $data->footer_content;?></p>
                              </div>
                              <ul class="footer-social md-mb-30">  
                            <?php  
                            $so_links = $this->db->get_where('social_links',array('status' =>'Active'))->result();
                            if ($so_links) 
                            { 
                                $fa_icon = '';
                                foreach ($so_links as $key) 
                                { 
                                     if ($key->social_name=='facebook') {
                                        $fa_icon='fa fa-facebook'; 
                                     }
                                     if ($key->social_name=='instagram') {
                                         $fa_icon='fa fa-instagram'; 
                                     }
                                     if ($key->social_name=='pinterest') {
                                        $fa_icon='fa fa-pinterest-p';  
                                     } 
                                     if ($key->social_name=='twitter') {
                                        $fa_icon='fa fa-twitter';  
                                     } 
                                     if ($key->social_name=='youtube') {
                                        $fa_icon='fa fa-youtube';  
                                     } 
                                    ?>
                                    <li><a href="<?php echo $key->social_link; ?>" target="_blank"><span class="<?php echo $fa_icon; ?>"></span></a></li> 
                                <?php 
                                }
                            }
                            ?>
                                                                           
                              </ul>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 pl-45 md-pl-15 md-mb-30">
                            <h3 class="widget-title">Useful links</h3>
                            <ul class="site-map">
                                <li><a href="<?php echo base_url();?>">Home</a></li>
                                <li><a href="<?php echo base_url();?>about-us">About Us</a></li>
                                <li><a href="#">Editorial Board</a></li>
                                <li><a href="#">Author Guidelines</a></li>
                                <li><a href="#">Archives</a></li>
                                <li><a href="#">Publication Ethics</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 md-mb-30">
                            <h3 class="widget-title">Contact Info</h3>
                            <ul class="address-widget">
                                <li>
                                    <i class="flaticon-location"></i>
                                    <div class="desc"><?php echo $data->site_main_address;?></div>
                                </li>
                                <li>
                                    <i class="flaticon-call"></i>
                                    <div class="desc">
                                       <a href="tel:<?php echo $data->site_contact_no;?>"><?php echo $data->site_contact_no;?></a>
                                    </div>
                                </li>
                                <li>
                                    <i class="flaticon-email"></i>
                                    <div class="desc">
                                        <a href="mailto:<?php echo $data->site_email_id;?>"><?php echo $data->site_email_id;?></a>
                                    </div>
                                </li>
                               
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12">
                            
                            <form  method="post" id="subscribeForm1" action="">
                                <h3 class="widget-title">Newsletter</h3>
                                <p class="widget-desc white-color"></p>
                                <div id="check_subscription"></div>
                                <p>
                                    <input type="email" id="email1" name="email1" placeholder="Your email address" required="">
                                    <em class="paper-plane"><input type="submit" value="Sign up"></em>
                                    <i class="flaticon-send"></i>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">                    
                    <div class="row y-middle">
                        <div class="col-lg-6 text-right md-mb-10 order-last">
                            <ul class="copy-right-menu">
                                <li><a href="<?php echo base_url();?>">Home</a></li>
                                <li><a href="<?php echo base_url();?>about-us">About</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">FAQs</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <div class="copyright">
                                <p>&copy; 2021 Journal of Omni Materials All Rights Reserved. Developed By <a href="#">Dotphi</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End -->

        <!-- start scrollUp  -->
        <div id="scrollUp" class="orange-color">
            <i class="fa fa-angle-up"></i>
        </div>
        <!-- End scrollUp  -->

        <!-- Search Modal Start -->
        <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span class="flaticon-cross"></span>
            </button>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="search-block clearfix">
                        <form>
                            <div class="form-group">
                                <input class="form-control" placeholder="Search Here..." type="text">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Modal End -->

         <!-- modernizr js -->
        <script src="<?php echo base_url();?>js/modernizr-2.8.3.min.js"></script>
        <!-- jquery latest version -->
        <script src="<?php echo base_url();?>js/jquery.min.js"></script>
        <!-- Bootstrap v4.4.1 js -->
        <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
        <!-- Menu js -->
        <script src="<?php echo base_url();?>js/rsmenu-main.js"></script> 
        <!-- op nav js -->
        <script src="<?php echo base_url();?>js/jquery.nav.js"></script>
        <!-- Time Circle js -->
        <script src="<?php echo base_url();?>js/time-circle.js"></script>
        <!-- owl.carousel js -->
        <script src="<?php echo base_url();?>js/owl.carousel.min.js"></script>
        <!-- wow js -->
        <script src="<?php echo base_url();?>js/wow.min.js"></script>
        <!-- Skill bar js -->
        <script src="<?php echo base_url();?>js/skill.bars.jquery.js"></script>
        <script src="<?php echo base_url();?>js/jquery.counterup.min.js"></script> 
         <!-- counter top js -->
        <script src="<?php echo base_url();?>js/waypoints.min.js"></script>
        <!-- swiper js -->
        <script src="<?php echo base_url();?>js/swiper.min.js"></script>   
        <!-- particles js -->
        <script src="<?php echo base_url();?>js/particles.min.js"></script>  
        <!-- magnific popup js -->
        <script src="<?php echo base_url();?>js/jquery.magnific-popup.min.js"></script>      
        <script src="<?php echo base_url();?>js/jquery.easypiechart.min.js"></script>      
        <!-- plugins js -->
        <script src="<?php echo base_url();?>js/plugins.js"></script>
        <!-- pointer js -->
        <script src="<?php echo base_url();?>js/pointer.js"></script>
        <!-- contact form js -->
        <script src="<?php echo base_url();?>js/contact.form.js"></script>
        <!-- main js -->
        <script src="<?php echo base_url();?>js/main.js"></script>
        
        
<script>
$(document).ready(function(){

    $('#myform').submit(function(e){
       //alert("hiiii");die;
        e.preventDefault();
        var name = $('#name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var subject = $('#subject').val();
        var message = $('#message').val();

        var contact_error = false;
        var flg=1;

        var name_regex="^[a-zA-Z\\s]*$";
        //  var city_name_regex="^[a-zA-Z\\s]*$";

        var email_regex =/\b(^(\S+@).+((\.com)|(\.net)|(\.edu)|(\.mil)|(\.gov)|(\.org)|(\.info)|(\.in)|(\.biz)|(\.aero)|(\.coop)|(\.museum)|(\.name)|(\.pro)|(\..{2,2}))$)\b/gi;

        var phone_regex=/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;

        if(!name.match(name_regex) || name == "")
        {
            $('#check15').html('** Please Enter your Name **').css( "color", "red");
            $("#name").focus();
            var contact_error = true;
            return false;
        }


        if (!email.match(email_regex)|| email == "") 
        {
            $('#check15').html('** Please Enter Your Email Id **').css( "color", "red");
            $("#email").focus();
            var contact_error = true;
            return false;
        }


        if(!phone.match(phone_regex) || phone=="")
        {
            $('#check15').html('** Please Enter your Number **').css( "color", "red");
            $("#phone").focus();
            var contact_error = true;
            return false;
        }

        if (subject == "") 
        {
            $('#check15').html('** Please Enter Your subject **').css( "color", "red");
            $("#subject").focus();
            var contact_error = true;
            return false;
        }

        if (message == "") 
        {
            $('#check15').html('** Please Enter Your Message **').css( "color", "red");
            $("#message").focus();
            var contact_error = true;
            return false;
        }


        if(contact_error!=true)
        {
            $('#btn_contact1').attr({'disabled' : 'true', 'value' : 'Sending...' });  
            var form = $('#myform')[0];
            var formData = new FormData(form);
            $.ajax({
                url: "<?php echo base_url();?>home/submit_contact",
                type: "POST",
                data: formData,
                contentType: false,
                cache: false,
                processData:false,
                success: function(data) {


                    if(data=='sent')
                    {

                        $('#btn_contact1').removeAttr('disabled').attr('value', 'Sent');
                        $('#check15').html(data).css("color","white");
                        $('#check15').html('** Thank You! For Contacting Us. We shall call you back shortly! **').css( "color", "lightgreen");
                        $("#myform").get(0).reset();

                    }
                    else
                    {
                        $('#btn_contact1').removeAttr('disabled').attr('value', 'Retry');
                        $('#check15').html(data).css("color","red");
                    }
                }
            });
            return false;
        }
        else
        {
        alert("error");
        }
    });

});


// subscribe form
$(document).ready(function(){
        $('#subscribeForm1').submit(function(e){
           //alert('hi');
            e.preventDefault();
            var email1 = $('#email1').val();
            var error = false;
            var flg=1;
            
            var name_regex="^[a-zA-Z\\s]*$";
            var email_regex =/\b(^(\S+@).+((\.com)|(\.net)|(\.edu)|(\.mil)|(\.gov)|(\.org)|(\.info)|(\.in)|(\.biz)|(\.aero)|(\.coop)|(\.museum)|(\.name)|(\.pro)|(\..{2,2}))$)\b/gi;
            var mobile_regex=/\d{10}/;
    
        if (!email1.match(email_regex)|| email1 == "") 
        {
          $('#check_subscription').html('** Please Enter Your Email Id **').css( "color", "red");
          $("#email1").focus();
          var error = true;
          return false;
        }

        if(error!=true)
            {
                $('#submit').attr({'disabled' : 'true', 'value' : 'Sending...' });  
               var form1 = $('#subscribeForm1')[0];
                var formData = new FormData(form1);
                $.ajax({
                    url: "<?php echo site_url();?>home/submit_subscribe_form", 
                    type: "POST",             
                    data: formData,
                    contentType: false,       
                    cache: false,             
                    processData:false, 
                    success: function(data) {
                        if(data=='sent')
                        {
                            $('#submit').removeAttr('disabled').attr('value', 'Sent')
                            $('#check_subscription').html(data).css("color","green");
                            $("#subscribeForm1").get(0).reset();           
                        }
                        else
                        {
                            $('#submit').removeAttr('disabled').attr('value', 'Retry');
                            $('#check_subscription').html(data).css("color","red");
                            $("#subscribeForm1").get(0).reset();
                        }
                    }
                });
                return false;
            }
        });
    });

</script>
        
    </body>

</html>