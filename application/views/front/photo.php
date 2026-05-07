<div role="main" class="main">
<section class="section section-height-1 bg-primary border-0 m-15">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-6 col-xl-7 text-right text-lg-start mb-4 mb-lg-0">
            <h3 class="text-color-light text-transform-none text-5 line-height-2 line-height-lg-1 mb-1">गॅलरी</h3>
         </div>
      </div>
   </div>
</section>
<div class="container my-5 pt-4 pb-5">
   <div class="row">
      <div class="col-lg-12 order-lg-2 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">
         <h1 class="word-rotator center slide font-weight-bold text-8 mb-3 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" style="animation-delay: 100ms;">
            <span>आम्ही </span>
            <span class="word-rotator-words bg-primary" style="width: 170.281px;">
            <b class="is-visible">स्वच्छता</b>
            <b class="is-hidden">आरोग्य  </b>
            <b class="is-hidden">पर्यावरण </b>
            </span>
            <span> करीता कटिबद्ध आहोत </span>
         </h1></br></br></br>
         <p class="lead appear-animation animated fadeInUpShorter appear-animation-visible" style="animation-delay: 300ms;" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">आमच्या ग्रामपंचायत मध्ये सांस्कृतिक, क्रीडा आणि सामाजिक आयोजन करून विविध प्रकारचे कार्यक्रम केले जातात.</p>
         <div class="divider divider-secondary divider-small">
            <hr>
         </div>
         <div class="post-image ms-0">
            <div class="lightbox" data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}, 'mainClass': 'mfp-with-zoom', 'zoom': {'enabled': true, 'duration': 300}}">
               <div class="row mx-0">
                  <div class="row">
                    
                    <?php if ($gallery): ?>
                    <?php foreach ($gallery as $value): ?>  
                     
                     <div class="col-6 col-md-3 p-1">
                        <a href="<?php echo base_url(); ?>assets/images/banner/<?php echo $value->banner_image; ?>" target="_blank">
                        <span class="thumb-info thumb-info-no-borders thumb-info-centered-icons">
                        <span class="thumb-info-wrapper">
                        <img src="<?php echo base_url(); ?>assets/images/banner/<?php echo $value->banner_image; ?>" style="height:270px;" class="img-fluid" alt="Gallery Image">
                        <span class="thumb-info-action">
                        <span class="thumb-info-action-icon thumb-info-action-icon-light">
                        <i class="fas fa-plus text-dark"></i>
                        </span>
                        </span>
                        </span>
                        </span>
                        </a>
                     </div>
                    <?php endforeach; ?>
                    <?php endif; ?>  
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>