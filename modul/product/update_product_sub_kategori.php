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
$query_rkat = "SELECT * FROM kategori";
$rkat = mysql_query($query_rkat, $hemera) or die(mysql_error());
$row_rkat = mysql_fetch_assoc($rkat);
$totalRows_rkat = mysql_num_rows($rkat);

mysql_select_db($database_hemera, $hemera);
$query_rsubkat = "SELECT * FROM sub_kategori WHERE id_='$_GET[id_]'";
$rsubkat = mysql_query($query_rsubkat, $hemera) or die(mysql_error());
$row_rsubkat = mysql_fetch_assoc($rsubkat);
$totalRows_rsubkat = mysql_num_rows($rsubkat);
?>
<h4 class="onboarding-title">Form Update</h4>
<div class="element-wrapper">
                              <h6 class="element-header">Edit Product Sub Category</h6>
                              <div class="element-box">
                                 <form action="modul/product/ed_product_sub_kategori.php" method="post" id="fin">
                                    <!--<h5 class="form-header">Default Layout</h5>
                                    <div class="form-desc">Discharge best employed your phase each the of shine. Be met even reason consider logbook redesigns. Never a turned interfaces among asking</div>-->
                                    <!--<div class="form-group"><label for=""> Email address</label><input class="form-control" placeholder="Enter email" type="email"></div>-->
                                    <div class="row">
                                      <div class="col-12">
                                         <div class="form-group">
                                         <label for="file_foto"> Product Category</label>
                                         <label for="skategori"></label>
                                         <select name="skategori" id="skategori" class="form-control">
                                           <option value="value" <?php if (!(strcmp("value", $row_rsubkat['id_kategori']))) {echo "selected=\"selected\"";} ?>>Select</option>
                                           <?php
do {  
?>
                                           <option value="<?php echo $row_rkat['id_']?>"<?php if (!(strcmp($row_rkat['id_'], $row_rsubkat['id_kategori']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rkat['nm_kategori']?></option>
                                           <?php
} while ($row_rkat = mysql_fetch_assoc($rkat));
  $rows = mysql_num_rows($rkat);
  if($rows > 0) {
      mysql_data_seek($rkat, 0);
	  $row_rkat = mysql_fetch_assoc($rkat);
  }
?>
                                         </select>
                                         <input name="hf_id" type="hidden" id="hf_id" value="<?php echo $row_rsubkat['id_']; ?>" />
                                         </div>
                                       </div>
                                       
                                       <div class="col-12">
                                         <div class="form-group">
                                         <label for="file_foto"> Product Sub Category</label>
                                         <input name="nm_sub_kategori" type="text" class="form-control" id="nm_sub_kategori" value="<?php echo $row_rsubkat['nm_sub_kategori']; ?>" ></div>
                                       </div>
                                       <div class="col-sm-6"></div>
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="form-buttons-w">
                                      <button class="btn btn-primary" type="submit"> Edit</button></div>
                                 </form>
                              </div>
                              
                              
</div>

<!-- Modal -->

<?php
mysql_free_result($rkat);

mysql_free_result($rsubkat);
?>
