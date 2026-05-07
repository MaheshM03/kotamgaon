

<div role="main" class="main">
    
  
<section class="section position-relative border-0 overflow-hidden m-0 p-0" style="height: 625px;">
           <div class="position-absolute top-0 left-0 right-0 bottom-0 animated fadeIn" style="animation-delay: 400ms;">
              <?php if (!empty($slider)): ?> 
              <?php $i = 0; foreach ($slider as $banner): ?>
              <div class="background-image-wrapper custom-background-style-0 position-absolute top-0 left-0 right-0 bottom-0 animated kenBurnsToRight" 
                 style="background-image: url(<?php echo base_url('assets/images/animal/'.$banner->image); ?>); 
                        background-position: center center; 
                        background-size: cover; 
                        background-repeat: no-repeat; 
                        animation-duration: 5s;">
              </div>
              
              <?php $i++; endforeach; ?>
              <?php endif; ?>
           </div>
           <div class="container position-relative py-sm-5 my-5">
           </div>
        </section>

            
<section class="section section-height-1 m-0 border-0">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-12">
            
            <?php if(isset($about) && $about->news_status == 'Active'): ?>
            <div class="post-content mb-4">
               <h4 class="text-decoration-none text-color-primary"><?php echo $about->news_title; ?></h4>
               <blockquote class="blockquote-primary">
                  
                     <?php echo $about->news_description; ?>
                 
                  
               </blockquote>
            </div>
            <?php endif; ?>
            <?php if(isset($location) && $location->news_status == 'Active'): ?>
            <div class="post-content mb-4">
               <h4 class="text-decoration-none text-color-primary"><?php echo $location->news_title; ?></h4>
               <blockquote class="blockquote-primary">
                  
                     <?php echo $location->news_description; ?>
                  
                  
               </blockquote>
            </div>
        <?php endif; ?>
           <?php if(isset($lokjeevan) && $lokjeevan->news_status == 'Active'): ?>
            <div class="post-content mb-4">
               <h4 class="text-decoration-none text-color-primary"><?php echo $lokjeevan->news_title; ?></h4>
               <blockquote class="blockquote-primary">
                  
                     <?php echo $lokjeevan->news_description; ?>
                  
                  
               </blockquote>
            </div>
        <?php endif; ?>
        
         <?php if(isset($culture) && $culture->news_status == 'Active'): ?>
            <div class="post-content mb-4">
               <h4 class="text-decoration-none text-color-primary"><?php echo $culture->news_title; ?></h4>
               <blockquote class="blockquote-primary">
                 
                     <?php echo $culture->news_description; ?>
                  
                  
               </blockquote>
            </div>
        <?php endif; ?>
        <?php if(isset($places) && $places->news_status == 'Active'): ?>
            <div class="post-content mb-4">
               <h4 class="text-decoration-none text-color-primary"><?php echo $places->news_title; ?></h4>
               <blockquote class="blockquote-primary">
                 
                     <?php echo $places->news_description; ?>
                  
                  
               </blockquote>
            </div>
        <?php endif; ?>
        <?php if(isset($nearby) && $nearby->news_status == 'Active'): ?>
            <div class="post-content mb-4">
               <h4 class="text-decoration-none text-color-primary"><?php echo $nearby->news_title; ?></h4>
               <blockquote class="blockquote-primary">
                 
                     <?php echo $nearby->news_description; ?>
                  
                  
               </blockquote>
            </div>
        <?php endif; ?>
            

           

         </div>
      </div>
   </div>
</section>

            
    <div class="row justify-content-center">
       <div class="col-lg-9 col-xl-8 text-center">
          <p></p>
          <div class="overflow-hidden">
             <h2 class="font-weight-bold text-color-dark line-height-4 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="250"> प्रशासन</h2>
          </div>
          <div class="d-inline-block custom-divider divider divider-primary divider-small my-0">
             <hr class="my-0 appear-animation" data-appear-animation="customLineProgressAnim" data-appear-animation-delay="650">
          </div>
       </div>
    </div>
    <div class="container">
       <div class="row sort-destination news-content" data-sort-id="portfolio">

        <?php if(!empty($team)): ?>
        <?php foreach($team as $row): ?>
        <div class="col-lg-4 text-center px-lg-5 mb-5 mb-lg-0">
          <a href="#" class="text-decoration-none">
             <div class="custom-icon-box-style-1 appear-animation"
                data-appear-animation="fadeInRightShorterPlus"
                data-appear-animation-delay="250"
                data-plugin-options="{'accY': -200}">
                <div class="team-img">
                   <img width="180" style="height:180px" src="<?php echo base_url('assets/images/medicinecat/'.$row->image); ?>" alt="<?php echo $row->name; ?>">
                </div>
                <h3 class="text-transform-none font-weight-bold text-color-dark line-height-3 text-4-5 px-3 px-xl-5 my-2">
                   <?php echo $row->name; ?>
                </h3>
                <p><?php echo $row->designation; ?></p>
             </div>
          </a>
       </div>
        
        <?php endforeach; ?>
        <?php endif; ?> 
       
      
                  
       
            </div>
</div>
   
    
            




            
            
         </div>
         
        <section class="section bg-transparent position-relative border-0 z-index-1 m-0 p-0">
   <div class="container py-4">
      <div class="row align-items-center text-center py-5">

         <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4 zoom">
            <img src="<?php echo base_url();?>assets/front/uploaded/logos/logo_68037a5da60496.94638573.png" alt="Logo 1" class="img-fluid" style="max-width: 90px;">
         </div>

         <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4 zoom">
            <img src="<?php echo base_url();?>assets/front/uploaded/logos/logo_68037928202a06.85547777.png" alt="Logo 2" class="img-fluid" style="max-width: 90px;">
         </div>

         <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4 zoom">
            <img src="<?php echo base_url();?>assets/front/uploaded/logos/logo_68037941f078d7.20118725.png" alt="Logo 3" class="img-fluid" style="max-width: 90px;">
         </div>

         <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4 zoom">
            <img src="<?php echo base_url();?>assets/front/uploaded/logos/logo_68037947459095.89171967.png" alt="Logo 4" class="img-fluid" style="max-width: 90px;">
         </div>

         <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4 zoom">
            <img src="<?php echo base_url();?>assets/front/uploaded/logos/logo_6803794d10e069.92720268.png" alt="Logo 5" class="img-fluid" style="max-width: 90px;">
         </div>

         <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4 zoom">
            <img src="<?php echo base_url();?>assets/front/uploaded/logos/logo_6803795f485741.44653380.png" alt="Logo 6" class="img-fluid" style="max-width: 90px;">
         </div>

         <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4 zoom">
            <img src="<?php echo base_url();?>assets/front/uploaded/logos/logo_68037963e47053.44347447.png" alt="Logo 7" class="img-fluid" style="max-width: 90px;">
         </div>

         <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4 zoom">
            <img src="<?php echo base_url();?>assets/front/uploaded/logos/logo_6803796888ef63.48948834.png" alt="Logo 8" class="img-fluid" style="max-width: 90px;">
         </div>

         <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4 zoom">
            <img src="<?php echo base_url();?>assets/front/uploaded/logos/logo_6803796de49868.98496682.png" alt="Logo 9" class="img-fluid" style="max-width: 90px;">
         </div>

         <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4 zoom">
            <img src="<?php echo base_url();?>assets/front/uploaded/logos/logo_680379747af206.78587922.png" alt="Logo 10" class="img-fluid" style="max-width: 90px;">
         </div>

         <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4 zoom">
            <img src="<?php echo base_url();?>assets/front/uploaded/logos/logo_68037979b3d145.39312309.png" alt="Logo 11" class="img-fluid" style="max-width: 90px;">
         </div>

        

      </div>
   </div>
</section>
