<?php require_once('../../Connections/hemera.php'); ?>
<?php
ob_start();
session_start();

error_reporting(0);
@ini_set('display_errors', 0);


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
$query_rpr = "SELECT * FROM product_master WHERE id_='$_GET[id_]'";
$rpr = mysql_query($query_rpr, $hemera) or die(mysql_error());
$row_rpr = mysql_fetch_assoc($rpr);
$totalRows_rpr = mysql_num_rows($rpr);

mysql_select_db($database_hemera, $hemera);
$query_rfoto = "SELECT * FROM product_foto WHERE kd_product='$row_rpr[kd_product]'";
$rfoto = mysql_query($query_rfoto, $hemera) or die(mysql_error());
$row_rfoto = mysql_fetch_assoc($rfoto);
$totalRows_rfoto = mysql_num_rows($rfoto);


mysql_select_db($database_hemera, $hemera);
$query_rskat = "SELECT * FROM sub_kategori WHERE id_kategori='$row_rpr[kategori]'";
$rskat = mysql_query($query_rskat, $hemera) or die(mysql_error());
$row_rskat = mysql_fetch_assoc($rskat);
$totalRows_rskat = mysql_num_rows($rskat);



?>

<?php
srand ((double) microtime() * 10000000);
$input = array ("A", "B", "C", "D", "E","F","G","H","I","J","K","L","M","N","O","P","Q",
"R","S","T","U","V","W","X","Y","Z");
$rand_index = array_rand($input,8);
$kode= $input[$rand_index[3]].$input[$rand_index[5]].$input[$rand_index[4]].$input[$rand_index[2]].$input[$rand_index[1]];

$zxtahun=date('y');
$zxbulan=date('m');
$zxtanggal=date('d');
$zxjam=date('H');
$zxmenit=date('i');
$zxdetik=date('s');
$awal="PROD";

$kd_prod = $awal.$kode.$zxtahun.$zxbulan.$zxtanggal.$zxjam.$zxmenit.$zxdetik;
?>

<script type="text/javascript" src="modul/product/ajax_sku.js"></script>
<script type="text/javascript" src="modul/product/ajax_kategori.js"></script>

<h4 class="onboarding-title">Form Update</h4>

<div class="element-wrapper">
                              <h6 class="element-header">Add Foto Master Product</h6>
                              <div class="element-box">
                                 <form action="modul/product/in_foto_master_product.php" method="post" enctype="multipart/form-data" id="fin">
                                    
                                    <div class="row">
                                    
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                        <label for="file_foto"> Product Code</label>
                                      
                                        <input name="hf_kd_product" type="hidden" id="hf_kd_product" value="<?php echo $row_rpr['kd_product']; ?>" />
                                        <input name="hf_sku" type="hidden" id="hf_sku" value="<?php echo $row_rpr['sku']; ?>" />
                                        <br>
                                      <?php echo $row_rpr['kd_product']; ?>
                                      
                                      </div>
                                      </div>
                                    
                                    
                                      
                                      <div class="col-sm-4">
                                      <div class="form-group">
                                        <label for="file_foto"> SKU</label>
                                       
                                      
                                      <br>
                                      <?php echo $row_rpr['sku']; ?>
                                      
                                      </div>
                                      </div>
                                      
                                      
                                      
                                      
                                      <div class="col-sm-4">
                                      <div class="form-group">
                                        <label for="file_foto"> Product Name</label>
                                      
                                      <br>
                                      <?php echo $row_rpr['nm_product']; ?>
                                      </div>
                                      </div>
                                      
                                      
                                      <div class="col-sm-4">
                                         <div class="form-group">
                                            <label for="file_foto">Foto 1</label>
                                          <input name="file_foto1" type="file" id="file_foto1" class="form-control"/>
                                         </div>
                                       </div>
                                       <div class="col-sm-8"></div>
                                       
                                        <div class="col-sm-4">
                                         <div class="form-group">
                                            <label for="file_foto">Foto 2</label>
                                          <input name="file_foto2" type="file" id="file_foto2" class="form-control"/>
                                         </div>
                                       </div>
                                       <div class="col-sm-8"></div>
                                       
                                        <div class="col-sm-4">
                                         <div class="form-group">
                                            <label for="file_foto">Foto 3</label>
                                          <input name="file_foto3" type="file" id="file_foto3" class="form-control"/>
                                         </div>
                                       </div>
                                       <div class="col-sm-8"></div>
                                       
                                        <div class="col-sm-4">
                                         <div class="form-group">
                                            <label for="file_foto">Foto 4</label>
                                          <input name="file_foto4" type="file" id="file_foto4" class="form-control"/>
                                         </div>
                                       </div>
                                       <div class="col-sm-8"></div>
                                       
                                        <div class="col-sm-4">
                                         <div class="form-group">
                                            <label for="file_foto">Foto 5</label>
                                          <input name="file_foto5" type="file" id="file_foto5" class="form-control"/>
                                         </div>
                                       </div>
                                       <div class="col-sm-8"></div>
                                      
                                      
                                      
                                    </div>
                                    
                                    <div class="row">
                                    <div class="col-2" style="padding:10px;">
                                      <img src="https://hemerapartner.com/admin/foto/product/<?php echo $row_rpr['foto_utama']; ?>" style="width:100%;" /> 
                                      </div>
                                      
                                      <?php do { ?>
                                        <div class="col-2" style="padding:10px;"> 
                                        <img src="foto/product/<?php echo $row_rfoto['foto']; ?>" style="width:100%;" /> 
                                        <a href="modul/product/del_foto.php?id_=<?php echo $row_rfoto['id_']; ?>" class="btn btn-danger btn-sm" style="margin-top:10px; ">Delete</a> 
                                        </div>
                                        <?php } while ($row_rfoto = mysql_fetch_assoc($rfoto)); ?>
                                        </div>
                                     
                                    
                                    
                                    
                                    <div class="form-buttons-w">
                                      <button class="btn btn-primary" type="submit"> Submit</button></div>
                                 </form>
                              </div>
</div>


<?php
mysql_free_result($rgrup);
?>
