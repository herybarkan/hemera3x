<?php require_once('../../Connections/hemera.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}



mysql_select_db($database_hemera, $hemera);
$query_rcol = "SELECT * FROM product_size WHERE id_='$_GET[id_]'";
$rcol = mysql_query($query_rcol, $hemera) or die(mysql_error());
$row_rcol = mysql_fetch_assoc($rcol);
$totalRows_rcol = mysql_num_rows($rcol);

?>
<h4 class="onboarding-title">Form Update</h4>
<div class="element-wrapper">
                              <h6 class="element-header">Product Size</h6>
                              <div class="element-box">
                                 <form action="modul/product/ed_product_size.php" method="post" id="fin">
                                    <!--<h5 class="form-header">Default Layout</h5>
                                    <div class="form-desc">Discharge best employed your phase each the of shine. Be met even reason consider logbook redesigns. Never a turned interfaces among asking</div>-->
                                    <!--<div class="form-group"><label for=""> Email address</label><input class="form-control" placeholder="Enter email" type="email"></div>-->
                                    <div class="row">
                                      <div class="col-12">
                                         <div class="form-group">
                                         <label for="file_foto">  Size Code</label>
                                         <input name="kd_size" type="text" class="form-control" id="kd_size" value="<?php echo $row_rcol['kd_size']; ?>" >
                                         <input name="hf_id" type="hidden" id="hf_id" value="<?php echo $row_rcol['id_']; ?>" />
                                         </div>
                                       </div>
                                       
                                       <div class="col-12">
                                         <div class="form-group">
                                         <label for="file_foto"> Product Size</label>
                                         <input name="nm_size" type="text" class="form-control" id="nm_size" value="<?php echo $row_rcol['nm_size']; ?>" >
                                         </div>
                                       </div>
                                       
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="form-buttons-w">
                                      <button class="btn btn-primary" type="submit">
                                      Edit
                                      </button>
                                   </div>
                                 </form>
                              </div>
                              
                              
</div>

<!-- Modal -->

<?php

mysql_free_result($rcol);
?>
