<?php require_once('Connections/hemera.php'); ?>
<?php
ob_start();
session_start();
?>
	  <script src="bower_components/jquery/dist/jquery.min.js"></script>
	  <script src="bower_components/popper.js/dist/umd/popper.min.js"></script>
      <script src="bower_components/moment/moment.js"></script>
      <script src="bower_components/chart.js/dist/Chart.min.js"></script>
      <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
      <script src="bower_components/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
      <!--<script src="bower_components/ckeditor/ckeditor.js"></script>-->
      <script src="bower_components/bootstrap-validator/dist/validator.min.js"></script>
      <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
      <script src="bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
      <script src="bower_components/dropzone/dist/dropzone.js"></script>
      <script src="bower_components/editable-table/mindmup-editabletable.js"></script>
      <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
      <script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
      <script src="bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
      <script src="bower_components/tether/dist/js/tether.min.js"></script>
      <script src="bower_components/slick-carousel/slick/slick.min.js"></script>
      <script src="bower_components/bootstrap/js/dist/util.js"></script>
      <script src="bower_components/bootstrap/js/dist/alert.js"></script>
      <script src="bower_components/bootstrap/js/dist/button.js"></script>
      <script src="bower_components/bootstrap/js/dist/carousel.js"></script>
      <script src="bower_components/bootstrap/js/dist/collapse.js"></script>
      <script src="bower_components/bootstrap/js/dist/dropdown.js"></script>
      <script src="bower_components/bootstrap/js/dist/modal.js"></script>
      <script src="bower_components/bootstrap/js/dist/tab.js"></script>
      <script src="bower_components/bootstrap/js/dist/tooltip.js"></script>
      <script src="bower_components/bootstrap/js/dist/popover.js"></script>
      <script src="js/dataTables.bootstrap4.min.js"></script>
      <script src="js/demo_customizer-version=4.5.0.js"></script>
      <script src="js/main-version=4.5.0.js"></script>
      
      
	 
      
      <script src="data_chart/close_bar1.php"></script>
      <script>
	  $(document).ready(function() {
    		$('#example').DataTable();
		} );
	  </script>
      
      <script>
	  //jQuery('#sprop').select2();
	  $("#cball").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
 });
	  </script>
<?php

mysql_select_db($database_hemera, $hemera);
$query_dss = "SELECT * FROM dropshipper_set WHERE kd_ds='$_SESSION[HEM_kd_ds]'";
$dss = mysql_query($query_dss, $hemera) or die(mysql_error());
$row_dss = mysql_fetch_assoc($dss);
$totalRows_dss = mysql_num_rows($dss);


 if ($row_dss['id_']=="" && $_SESSION['HEM_grup']=="6")
 { ?>
      <script type="text/javascript">
    $(window).on('load', function() {
        $('#exampleModal1').modal('show');
    });
</script>
<?php } ?>
