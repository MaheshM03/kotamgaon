

			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title"><?php echo $page_title;?></div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?php echo base_url(); ?>admin/dashboard">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active"><?php echo $page_title;?></li>
							</ol>
						</div>
					</div>
					<!-- start widget -->
					<div class="state-overview">
						<div class="row">
					
							
							<!--<div class="col-xl-4 col-md-6 col-12">
								<div class="info-box bg-b-yellow" style="background: linear-gradient(45deg,#FF1493,#FF1493);">
							
									<span class="info-box-icon push-bottom"><i class="fa fa-users"></i></span>
									<div class="info-box-content">
										<span class="info-box-text">Total Contact</span>
										<span class="info-box-number">0</span>


									</div>
									
								</div>
								
							</div>-->
							
						
						
							
				
				
							
					 

					


					</div>
					   
				</div>
			</div>
		</div>
<script src="<?php echo base_url(); ?>assets/js/canvasjs.min.js"> </script>
<script type="text/javascript">
	window.onload = function () {

	var chart = new CanvasJS.Chart("chartContainer", {
		theme: "light1", // "light2", "dark1", "dark2"
		animationEnabled: false, // change to true		
		title:{
			text: "Total PR Of Departments"
		},
		data: [
		{
			// Change type to "bar", "area", "spline", "pie",etc.
			type: "column",
			dataPoints:  <?php echo $graph; ?>
		}
		]
	});
	chart.render();

	}
	</script>






			
		
		
	