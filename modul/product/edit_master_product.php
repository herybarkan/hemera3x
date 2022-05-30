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
$query_rsize = "SELECT * FROM product_size";
$rsize = mysql_query($query_rsize, $hemera) or die(mysql_error());
$row_rsize = mysql_fetch_assoc($rsize);
$totalRows_rsize = mysql_num_rows($rsize);

mysql_select_db($database_hemera, $hemera);
$query_rkat = "SELECT * FROM kategori";
$rkat = mysql_query($query_rkat, $hemera) or die(mysql_error());
$row_rkat = mysql_fetch_assoc($rkat);
$totalRows_rkat = mysql_num_rows($rkat);

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
                              <h6 class="element-header">Update Master Product</h6>
                              <div class="element-box">
                                 <form action="modul/product/ed_master_product.php" method="post" enctype="multipart/form-data" id="fin">
                                    
                                    <div class="row">
                                    
                                    <div class="col-sm-3">
                                      <div class="form-group">
                                        <label for="file_foto"> Product Code</label>
                                      <input name="kd_product" type="text" class="form-control" id="kd_product" value="<?php echo $row_rpr['kd_product']; ?>">
                                      <input name="hf_id" type="hidden" id="hf_id" value="<?php echo $row_rpr['id_']; ?>" />
                                      </div>
                                      </div>
                                    
                                    <div class="col-sm-3">
                                      <div class="form-group">
                                      <label for=""> Suplier Code</label>
                                      <select name="ssuplier" class="form-control" id="ssuplier"  onchange="show_sku((document.getElementById('ssuplier').value),(document.getElementById('scolor').value),(document.getElementById('ssize').value));">
                                        <option value="0" <?php if (!(strcmp(0, $row_rpr['kd_suplier']))) {echo "selected=\"selected\"";} ?>>Select</option>
                                        <?php
do {  
?>
                                        <option value="<?php echo $row_rsup['kd_suplier']?>"<?php if (!(strcmp($row_rsup['kd_suplier'], $row_rpr['kd_suplier']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rsup['nm_suplier']?></option>
                                        <?php
} while ($row_rsup = mysql_fetch_assoc($rsup));
  $rows = mysql_num_rows($rsup);
  if($rows > 0) {
      mysql_data_seek($rsup, 0);
	  $row_rsup = mysql_fetch_assoc($rsup);
  }
?>
                                      </select>
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-3">
                                      <div class="form-group">
                                      <label for=""> Color Code</label>
                                      <select name="scolor" class="form-control" id="scolor"  onchange="show_sku((document.getElementById('ssuplier').value),(document.getElementById('scolor').value),(document.getElementById('ssize').value));">
                                        <option value="0" <?php if (!(strcmp(0, $row_rpr['kd_warna']))) {echo "selected=\"selected\"";} ?>>Select</option>
                                        <?php
do {  
?>
                                        <option value="<?php echo $row_rcolor['kd_color']?>"<?php if (!(strcmp($row_rcolor['kd_color'], $row_rpr['kd_warna']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rcolor['nm_color']?></option>
                                        <?php
} while ($row_rcolor = mysql_fetch_assoc($rcolor));
  $rows = mysql_num_rows($rcolor);
  if($rows > 0) {
      mysql_data_seek($rcolor, 0);
	  $row_rcolor = mysql_fetch_assoc($rcolor);
  }
?>
                                      </select>
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-3">
                                      <div class="form-group">
                                      <label for=""> Size Code</label>
                                      <select name="ssize" class="form-control" id="ssize" onchange="show_sku((document.getElementById('ssuplier').value),(document.getElementById('scolor').value),(document.getElementById('ssize').value));">
                                        <option value="0" <?php if (!(strcmp(0, $row_rpr['kd_size']))) {echo "selected=\"selected\"";} ?>>Select</option>
                                        <?php
do {  
?>
                                        <option value="<?php echo $row_rsize['kd_size']?>"<?php if (!(strcmp($row_rsize['kd_size'], $row_rpr['kd_size']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rsize['nm_size']?></option>
                                        <?php
} while ($row_rsize = mysql_fetch_assoc($rsize));
  $rows = mysql_num_rows($rsize);
  if($rows > 0) {
      mysql_data_seek($rsize, 0);
	  $row_rsize = mysql_fetch_assoc($rsize);
  }
?>
                                      </select>
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-4">
                                      <div class="form-group">
                                        <label for="file_foto"> SKU</label>
                                        <div id="result_sku">
                                      <input name="kd_sku" type="text" class="form-control" id="kd_sku" value="<?php echo $row_rpr['sku']; ?>" >
                                      </div>
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-4">
                                      <div class="form-group">
                                      <label for=""> Category</label>
                                      <select name="skategori" class="form-control" id="skategori" onchange="show_kat(document.getElementById('skategori').value);">
                                        <option value="0" <?php if (!(strcmp(0, $row_rpr['kategori']))) {echo "selected=\"selected\"";} ?>>Select</option>
                                        <?php
do {  
?>
                                        <option value="<?php echo $row_rkat['id_']?>"<?php if (!(strcmp($row_rkat['id_'], $row_rpr['kategori']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rkat['nm_kategori']?></option>
                                        <?php
} while ($row_rkat = mysql_fetch_assoc($rkat));
  $rows = mysql_num_rows($rkat);
  if($rows > 0) {
      mysql_data_seek($rkat, 0);
	  $row_rkat = mysql_fetch_assoc($rkat);
  }
?>
                                      </select>
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-4">
                                      <div class="form-group">
                                      <label for=""> Sub Category</label>
                                      <div id="result_kat">
                                      <select name="ssub_kategori" class="form-control" id="ssub_kategori">
                                        <option value="0" <?php if (!(strcmp(0, $row_rpr['sub_kategori']))) {echo "selected=\"selected\"";} ?>>Select</option>
                                        <?php
do {  
?>
                                        <option value="<?php echo $row_rskat['id_']?>"<?php if (!(strcmp($row_rskat['id_'], $row_rpr['sub_kategori']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rskat['nm_sub_kategori']?></option>
                                        <?php
} while ($row_rskat = mysql_fetch_assoc($rskat));
  $rows = mysql_num_rows($rskat);
  if($rows > 0) {
      mysql_data_seek($rskat, 0);
	  $row_rskat = mysql_fetch_assoc($rskat);
  }
?>
                                      </select>
                                      </div>
                                      </div>
                                      </div>
                                      
                                      
                                      <div class="col-sm-12">
                                      <div class="form-group">
                                        <label for="file_foto"> Product Name</label>
                                      <input name="nm_product" type="text" class="form-control" id="nm_product" value="<?php echo $row_rpr['nm_product']; ?>" >
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-4">
                                      <div class="form-group">
                                        <label for="file_foto"> Price</label>
                                      <input name="harga" type="text" class="form-control" id="harga" value="<?php echo $row_rpr['harga']; ?>" >
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-4">
                                      <div class="form-group">
                                        <label for="file_foto"> Discount</label>
                                      <input name="diskon" type="text" class="form-control" id="diskon" value="<?php echo $row_rpr['diskon']; ?>" >
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-4">
                                      <div class="form-group">
                                        <label for="file_foto"> Net Price</label>
                                      <input name="harga_net" type="text" class="form-control" id="harga_net" value="<?php echo $row_rpr['harga_net']; ?>" >
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-2">
                                      <div class="form-group">
                                        <label for="file_foto"> Weight</label>
                                      <input name="berat" type="text" class="form-control" id="berat" value="<?php echo $row_rpr['berat']; ?>" >
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-2">
                                      <div class="form-group">
                                        <label for="file_foto"> Long</label>
                                      <input name="panjang" type="text" class="form-control" id="panjang" value="<?php echo $row_rpr['panjang']; ?>" >
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-2">
                                      <div class="form-group">
                                        <label for="file_foto"> Width</label>
                                      <input name="lebar" type="text" class="form-control" id="lebar" value="<?php echo $row_rpr['lebar']; ?>" >
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-2">
                                      <div class="form-group">
                                        <label for="file_foto"> Height</label>
                                      <input name="tinggi" type="text" class="form-control" id="tinggi" value="<?php echo $row_rpr['tinggi']; ?>" >
                                      </div>
                                      </div>
                                      <div class="col-sm-4">
                                         <div class="form-group">
                                            <label for="file_foto">Cover Picture</label>
                                          <input name="file_foto" type="file" id="file_foto" class="form-control"/>
                                         </div>
                                       </div>
                                      
                                      
                                       <div class="col-sm-12">
                                      <div class="form-group">
                                        <label for="file_foto"> Description</label>
                                      <textarea name="deskripsi" cols="" rows="4" class="form-control"><?php echo $row_rpr['deskripsi']; ?></textarea>
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-12">
                                      <div class="form-group">
                                        <label for="file_foto"> Long Description</label>
                                      <textarea name="long_deskripsi" cols="" rows="4" class="form-control"><?php echo $row_rpr['long_deskripsi']; ?></textarea>
                                      </div>
                                      </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="form-buttons-w">
                                      <button class="btn btn-primary" type="submit"> Update</button></div>
                                 </form>
                              </div>
</div>


<?php
mysql_free_result($rgrup);
?>
