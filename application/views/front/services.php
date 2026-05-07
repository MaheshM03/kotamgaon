<div role="main" class="main">
   <section class="section section-height-1 bg-primary border-0 m-15">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-lg-6 col-xl-7 text-right text-lg-start mb-4 mb-lg-0">
               <h3 class="text-color-light text-transform-none text-5 line-height-2 line-height-lg-1 mb-1">   कर भरणा  </h3>
            </div>
         </div>
      </div>
   </section>
   <div id="examples" class="container py-2">
      <div class="row pb-4">
         <div class="col mb-4 mb-lg-0">
            <div class="accordion accordion-modern-status accordion-modern-status-borders accordion-modern-status-arrow" id="accordion200">
              
               
               <div class="card card-default">
                  <div class="card-header" id="headingaccordion20019">
                     <h4 class="card-title m-0">
                        <a class="accordion-toggle text-color-dark font-weight-bold collapsed" data-bs-toggle="collapse" data-bs-target="#collapseaccordion20019" aria-expanded="false" aria-controls="collapseaccordion20019">
                         कर वसूली अहवाल                </a>
                     </h4>
                  </div>
                  <div id="collapseaccordion20019" class="collapse" aria-labelledby="headingaccordion20019" data-bs-parent="#accordion200" style="">
                     <div class="card-body pt-0">
                       <?php echo isset($certificates->news_description) ? $certificates->news_description : ''; ?>
                     </div>
                  </div>
               </div>
                <div class="card card-default">
                  <div class="card-header" id="headingaccordion20013">
                     <h4 class="card-title m-0">
                        <a class="accordion-toggle text-color-dark font-weight-bold collapsed" data-bs-toggle="collapse" data-bs-target="#collapseaccordion20013" aria-expanded="false" aria-controls="collapseaccordion20013">
                        घरपट्टी भरण्यासाठी इथे क्लिक करा                </a>
                     </h4>
                  </div>
                  <div id="collapseaccordion20013" class="collapse" aria-labelledby="headingaccordion20013" data-bs-parent="#accordion200" style="">
                     <div class="card-body pt-0">
                        <?php
                           $gharpattiDesc = isset($gharpatti->news_description) ? $gharpatti->news_description : '';
                        ?>

                        <?php if (!empty($gharpattiDesc)): ?>
                           <img src="<?php echo base_url('assets/front/uploaded/logos/'); ?>" alt="Gharpatti" />
                           <?php echo $gharpattiDesc; ?>
                        <?php else: ?>
                           <?php echo $gharpattiDesc; ?>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>

               <div class="card card-default">
                  <div class="card-header" id="headingaccordion200003">
                     <h4 class="card-title m-0">
                        <a class="accordion-toggle text-color-dark font-weight-bold collapsed" data-bs-toggle="collapse" data-bs-target="#collapseaccordion200003" aria-expanded="false" aria-controls="collapseaccordion200003">
                        पाणीपट्टी भरण्यासाठी इथे क्लिक करा            </a>
                     </h4>
                  </div>
                  <div id="collapseaccordion200003" class="collapse" aria-labelledby="headingaccordion200003" data-bs-parent="#accordion200" style="">
                     <div class="card-body pt-0">
                        <?php
                           $panipattiDesc = isset($panipatti->news_description) ? $panipatti->news_description : '';
                        ?>

                        <?php if (!empty($panipattiDesc)): ?>
                           <img src="<?php echo base_url('assets/front/uploaded/logos/'); ?>" alt="Panipatti" />
                           <?php echo $panipattiDesc; ?>
                        <?php else: ?>
                           <?php echo $panipattiDesc; ?>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>
               
            </div>
         </div>
      </div>
   </div>
</div>