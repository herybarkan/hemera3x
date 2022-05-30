<?php header("Access-Control-Allow-Origin: *"); ?>
<?php require_once('../../Connections/hemera.php'); ?>
<?php
error_reporting(0);
@ini_set('display_errors', 0);

?>



<!--<h4 class="onboarding-title">Detail Gambar</h4>-->

<div class="element-wrapper">
                              <h6 class="element-header">Detail Gambar Product</h6>
                              <!--<div class="element-box">-->
   <img alt="" src="https://hemerapartner.com/admin/foto/product/<?php echo $_GET['foto']; ?>" style="width:100%;">                              
                                
  <!--</div>-->
</div>


