<?php header("Access-Control-Allow-Origin: *"); ?>
<?php require_once('../../Connections/hemera.php'); ?>
<?php
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
$query_rgrup = "SELECT * FROM user_grup";
$rgrup = mysql_query($query_rgrup, $hemera) or die(mysql_error());
$row_rgrup = mysql_fetch_assoc($rgrup);
$totalRows_rgrup = mysql_num_rows($rgrup);

mysql_select_db($database_hemera, $hemera);
$query_rsup = "SELECT * FROM suplier";
$rsup = mysql_query($query_rsup, $hemera) or die(mysql_error());
$row_rsup = mysql_fetch_assoc($rsup);
$totalRows_rsup = mysql_num_rows($rsup);

mysql_select_db($database_hemera, $hemera);
$query_rcolor = "SELECT * FROM product_color";
$rcolor = mysql_query($query_rcolor, $hemera) or die(mysql_error());
$row_rcolor = mysql_fetch_assoc($rcolor);
$totalRows_rcolor = mysql_num_rows($rcolor);

mysql_select_db($database_hemera, $hemera);
$query_rfoto = "SELECT * FROM product_foto WHERE kd_product='$row_rpr[kd_product]'";
$rfoto = mysql_query($query_rfoto, $hemera) or die(mysql_error());
$row_rfoto = mysql_fetch_assoc($rfoto);
$totalRows_rfoto = mysql_num_rows($rfoto);

mysql_select_db($database_hemera, $hemera);
$query_rkat = "SELECT * FROM kategori WHERE id_='$row_rpr[kategori]'";
$rkat = mysql_query($query_rkat, $hemera) or die(mysql_error());
$row_rkat = mysql_fetch_assoc($rkat);
$totalRows_rkat = mysql_num_rows($rkat);

mysql_select_db($database_hemera, $hemera);
$query_rskat = "SELECT * FROM sub_kategori WHERE id_='$row_rpr[sub_kategori]'";
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

<h4 class="onboarding-title">Detail</h4>

<div class="element-wrapper">
                              <h6 class="element-header">Detail Master Product</h6>
                              <div class="element-box">
                                 
                                    
                                    <div class="row">
                                    
                                    <div class="col-sm-3">
                                      <div class="form-group">
                                        <label for="file_foto"> <span style="color:#39F">Product Code</span></label>
                                      
                                      <?php echo $row_rpr['kd_product']; ?>
                                      </div>
                                      </div>
                                    
                                    <div class="col-sm-3">
                                      <div class="form-group">
                                      <label for=""> <span style="color:#39F">Suplier Code </span></label>
                                      <br>
                                      <?php echo $row_rpr['kd_suplier']; ?>
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-3">
                                      <div class="form-group">
                                      <label for=""> <span style="color:#39F">Color Code </span></label>
                                      <br>
                                      <?php echo $row_rpr['kd_warna']; ?>
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-3">
                                      <div class="form-group">
                                      <label for=""> <span style="color:#39F">Size Code</span></label>
                                      <br>
                                      <?php echo $row_rpr['kd_size']; ?>
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-4">
                                      <div class="form-group">
                                        <label for="file_foto"> <span style="color:#39F">SKU</span></label>
                                        <br>
                                      <?php echo $row_rpr['sku']; ?>
                                      
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-4">
                                      <div class="form-group">
                                      <label for=""> <span style="color:#39F">Category</span></label>
                                      <br>
                                      
                                      <?php echo $row_rkat['nm_kategori']; ?></div>
                                      </div>
                                      
                                      <div class="col-sm-4">
                                      <div class="form-group">
                                      <label for=""> <span style="color:#39F">Sub Category</span></label>
                                      <br>
                                      
                                      <?php echo $row_rskat['nm_sub_kategori']; ?></div>
                                      </div>
                                      
                                      
                                      
                                      <div class="col-sm-12">
                                      <div class="form-group">
                                        <label for="file_foto"> <span style="color:#39F">Product Name</span></label>
                                      <br>		
                                      <?php echo $row_rpr['nm_product']; ?>
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-4">
                                      <div class="form-group">
                                        <label for="file_foto"> <span style="color:#39F">Price</span></label>
                                      <br>
                                      IDR <?php echo number_format($row_rpr['harga'],0,",","."); ?>
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-4">
                                      <div class="form-group">
                                        <label for="file_foto"> <span style="color:#39F">Discount</span></label>
                                      <br>
                                      IDR <?php echo number_format($row_rpr['diskon'],0,",","."); ?>
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-4">
                                      <div class="form-group">
                                        <label for="file_foto"> <span style="color:#39F">Net Price</span></label>
                                      <br>
                                      IDR <?php echo number_format($row_rpr['harga_net'],0,",","."); ?>
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-2">
                                      <div class="form-group">
                                        <label for="file_foto"> <span style="color:#39F">Weight</span></label>
                                      <br>
                                      <?php echo $row_rpr['berat']; ?>
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-2">
                                      <div class="form-group">
                                        <label for="file_foto"> <span style="color:#39F">Long</span></label>
                                      <br>
                                      <?php echo $row_rpr['panjang']; ?>
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-2">
                                      <div class="form-group">
                                        <label for="file_foto"> <span style="color:#39F">Width</span></label>
                                      <br>
                                      <?php echo $row_rpr['lebar']; ?>
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-2">
                                      <div class="form-group">
                                        <label for="file_foto"> <span style="color:#39F">Height</span></label>
                                      <br>
                                      <?php echo $row_rpr['tinggi']; ?>
                                      </div>
                                      </div>
                                      <div class="col-sm-4">
                                         <div class="form-group">
                                            <label for="file_foto"><span style="color:#39F">Cover Picture</span></label>
                                         <br> 
                                         </div>
                                      </div>
                                      
                                      
                                       <div class="col-sm-12">
                                      <div class="form-group">
                                        <label for="file_foto"> <span style="color:#39F">Description</span></label>
                                      <br>
                                      <?php echo $row_rpr['deskripsi']; ?>
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-12">
                                      <div class="form-group">
                                        <label for="file_foto"> <span style="color:#39F">Long Description</span></label>
                                      <br>
                                      <?php echo $row_rpr['long_deskripsi']; ?>
                                      </div>
                                      </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    <!--<div class="form-buttons-w">
                                      <button class="btn btn-primary" type="submit"> Update</button>
                                      </div>-->
                                      <div class="row">
                                      <div class="col-sm-12">
                                      <div class="form-group">
                                        <label for="file_foto"> <span style="color:#39F">Foto</span></label>
                                      <br>
                                      
                                      </div>
                                      </div>
                                      
                                      <div class="col-3" style="padding:10px;">
                                      <img src="foto/product/<?php echo $row_rpr['foto_utama']; ?>" style="width:100%;" /> 
                                      </div>
                                      
                                      <?php if ($row_rfoto['id_']!="") { ?>
                                      <?php do { ?>
                                        <div class="col-3" style="padding:10px;"> 
                                        
                                        <img src="foto/product/<?php echo $row_rfoto['foto']; ?>" style="width:100%;" /> </div>
                                        <?php } while ($row_rfoto = mysql_fetch_assoc($rfoto)); 
									  	}
										?>
                                        
                                        </div>
                                
  </div>
</div>


<?php
mysql_free_result($rgrup);

mysql_free_result($rfoto);
?>
