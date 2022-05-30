<?php require_once('../../Connections/hemera.php'); ?>
<?php
mysql_select_db($database_hemera, $hemera);
$query_rkelurahan = "SELECT * FROM kelurahan WHERE kecamatan_id='$_GET[get_kel]'";
$rkelurahan = mysql_query($query_rkelurahan, $hemera) or die(mysql_error());
$row_rkelurahan = mysql_fetch_assoc($rkelurahan);
$totalRows_rkelurahan = mysql_num_rows($rkelurahan);
?>

<select name="skel" id="skel" required class="form-control">
                                          <option value="">pilih</option>
                                          <?php
do {  
?>
                                          <option value="<?php echo $row_rkelurahan['id']?>"><?php echo $row_rkelurahan['nama']?> - <?php echo $row_rkelurahan['kode_pos']?></option>
                                          <?php
} while ($row_rkelurahan = mysql_fetch_assoc($rkelurahan));
  $rows = mysql_num_rows($rkelurahan);
  if($rows > 0) {
      mysql_data_seek($rkelurahan, 0);
	  $row_rkelurahan = mysql_fetch_assoc($rkelurahan);
  }
?>
                                      </select>