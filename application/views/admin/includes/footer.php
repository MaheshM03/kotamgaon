<?php $details=get_site_details();?>
		<div class="page-footer">
		   <div class="page-footer-inner"> <?php echo date('Y');?> &copy; <?php echo $details->title; ?>.
				<a href="#" target="_top" class="makerCss"></a>
			</div>
			<div class="scroll-to-top">
				<i class="icon-arrow-up"></i>
			</div>
		</div>
		<!-- end footer -->
	</div>
	<!-- start js include path -->



	<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/popper/popper.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
	<!-- bootstrap -->
	<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/sparkline/jquery.sparkline.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/pages/sparkline/sparkline-data.js"></script>
<!-- data tables -->
	<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js"></script>
	
	<!-- Common js-->
	<script src="<?php echo base_url(); ?>assets/js/app.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/layout.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/theme-color.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pages/table/table_data.js"></script>
	<!-- Material -->
	<script src="<?php echo base_url(); ?>assets/plugins/material/material.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/pages/material-select/getmdl-select.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/material-datetimepicker/moment-with-locales.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/material-datetimepicker/datetimepicker.js"></script>
	<!-- chart js -->
	<script src="<?php echo base_url(); ?>assets/plugins/chart-js/Chart.bundle.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/chart-js/utils.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/pages/chart/chartjs/home-data.js"></script>
	<!-- summernote -->
	<script src="<?php echo base_url(); ?>assets/plugins/summernote/summernote.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/pages/summernote/summernote-data.js"></script>
	<!-- end js include path -->
<!-- dropzone -->
	<script src="<?php echo base_url(); ?>assets/plugins/dropzone/dropzone.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/dropzone/dropzone-call.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pages/select2/select2-init.js"></script>
    <script src="<?php echo base_url(); ?>assets/lobibox-master/js/lobibox.js"></script>
    

<!--Data Table-->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/export/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/export/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/export/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/export/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/export/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/export/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/export/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/export/vfs_fonts.js"></script>


	<?php if($this->session->flashdata("success")){?>
		<script type="text/javascript"> 	
			Lobibox.notify('success', {
				msg: "<?php echo $this->session->flashdata('success'); ?>"
			});
		</script> 
	<?php } ?>

	<?php if($this->session->flashdata("fail")){?>
		<script type="text/javascript">  
			Lobibox.notify('error', {
				delay: 15000,
				msg: "<?php print_r($this->session->flashdata('fail')); ?>"
			});
		</script> 
	<?php } ?>
	

<script>
function goBack() {
  window.history.back();
}
</script>
</body>
</html>