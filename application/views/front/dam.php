
<section class="section section-height-1 bg-primary border-0 m-15">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 col-xl-7 text-right text-lg-start mb-4 mb-lg-0">
				<h3 class="text-color-light text-transform-none text-5 line-height-2 line-height-lg-1 mb-1"> <?php echo $dam->news_title; ?> / <?php echo $cement->news_title; ?> </h3> </div>
		</div>
	</div>
</section>

<div class="main" role="main">
    <div class="container my-5 pt-4">
        <div class="row align-items-center justify-content-center mb-5">
            <?php if(isset($dam) && $dam->news_status == 'Active'): ?>
            <div class="col-lg-12 pb-sm-4 pb-lg-0 mb-5 mb-lg-0">

                
                <div class="">
                    <p><strong>धरण माहिती</strong></p>
                    <?php echo $dam->news_description; ?>
                </div>


              
            </div>
            <?php endif; ?>
            <?php if(isset($cement) && $cement->news_status == 'Active'): ?>
            <div class="col-lg-12 pb-sm-4 pb-lg-0 mb-5 mb-lg-0">

                <p><strong>सिमेंट बंधारे</strong></p>
                <div class="">
                    <?php echo $cement->news_description; ?>
                </div>


              
            </div>
            <?php endif; ?>
            
        </div>
    </div>
</div>


