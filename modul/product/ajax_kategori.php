<?php require_once('../../Connections/hemera.php'); ?>
<?php
mysql_select_db($database_hemera, $hemera);
$query_rskat = "SELECT * FROM sub_kategori WHERE id_kategori='$_GET[get_kat]'";
$rskat = mysql_query($query_rskat, $hemera) or die(mysql_error());
$row_rskat = mysql_fetch_assoc($rskat);
$totalRows_rskat = mysql_num_rows($rskat);
?>
<select name="ssub_kategori" class="form-control" id="ssub_kategori">
                                        <option value="0">Select</option>
                                        <?php
do {  
?>
                                        <option value="<?php echo $row_rskat['id_']?>"><?php echo $row_rskat['nm_sub_kategori']?></option>
                                        <?php
} while ($row_rskat = mysql_fetch_assoc($rskat));
  $rows = mysql_num_rows($rskat);
  if($rows > 0) {
      mysql_data_seek($rskat, 0);
	  $row_rskat = mysql_fetch_assoc($rskat);
  }
?>
                                      </select>