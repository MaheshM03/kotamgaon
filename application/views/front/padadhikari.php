	
			<div role="main" class="main">

				<section class="section section-height-1 bg-primary border-0 m-15">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-6 col-xl-7 text-right text-lg-start mb-4 mb-lg-0">
							
								<h3 class="text-color-light text-transform-none text-5 line-height-2 line-height-lg-1 mb-1">  ग्रामपंचायत प्रशासन </h3>
								
							</div>
							
						</div>
					</div>
				</section>

				<div class="container py-4">
    <!-- Filter Buttons -->
    <ul class="nav nav-pills sort-source justify-content-center mb-4" data-sort-id="portfolio" data-option-key="filter">
        
        <li class="nav-item" data-option-value=".1"><a class="nav-link active" href="#">ग्रा. पं. प्रशासन </a></li>
        <li class="nav-item" data-option-value=".2"><a class="nav-link" href="#">ग्रा. पं. कर्मचारी</a></li>
        <li class="nav-item" data-option-value=".3"><a class="nav-link" href="#">महसूल व इतर समन्वय</a></li>
        <li class="nav-item" data-option-value=".4"><a class="nav-link" href="#">सरपंच कार्यकालय</a></li>
    </ul>

    <!-- Members Grid -->
    <div class="row sort-destination" data-sort-id="portfolio">

        <!--<?php if(!empty($team)): ?>
        <?php foreach($team as $row): ?>
        <div class="col-sm-6 col-lg-3 isotope-item 1">
            <div class="thumb-info">
                <img src="<?php echo base_url('assets/images/medicinecat/'.$row->image); ?>" style="height:300px ;" class="img-fluid" alt="<?php echo $row->name; ?>">
                <div class="thumb-info-title">
                    <span class="thumb-info-inner"><?php echo $row->name; ?>   </span>
                    <span class="thumb-info-type"><?php echo $row->designation; ?></span>
                </div>
            </div></br>
        </div>
        <?php endforeach; ?>
        <?php endif; ?> -->

       

<div class="row align-items-center justify-content-center mb-5 isotope-item 2">
<div class="col-lg-12 pb-sm-4 pb-lg-0 mb-5 mb-lg-0">

    
    <div class="news-content">
        <?php echo $panchayat->news_description; ?>
    </div>


  
</div>
</div>

<div class="row align-items-center justify-content-center mb-5 isotope-item 2">
<div class="col-lg-12 pb-sm-4 pb-lg-0 mb-5 mb-lg-0">

    
    <div class="news-content">
        <?php echo $staff->news_description; ?>
    </div>


  
</div>
</div>

<div class="row align-items-center justify-content-center mb-5 isotope-item 3">
<div class="col-lg-12 pb-sm-4 pb-lg-0 mb-5 mb-lg-0">

    
    <div class="news-content">
        <?php echo $revenue->news_description; ?>
    </div>


  
</div>
</div>

<div class="row align-items-center justify-content-center mb-5 isotope-item 4">
<div class="col-lg-12 pb-sm-4 pb-lg-0 mb-5 mb-lg-0">

    
    <div class="news-content">
        <?php echo $sarpanch->news_description; ?>
    </div>


  
</div>
</div>





    </div>
</div>



					
				</section>


			</div> 
			
		