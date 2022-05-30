<?php require_once('../../Connections/hemera.php'); ?>
<?php
mysql_select_db($database_hemera, $hemera);
$query_rkabupaten = "SELECT * FROM kabupaten WHERE provinsi_id='$_GET[get_kab]'";
$rkabupaten = mysql_query($query_rkabupaten, $hemera) or die(mysql_error());
$row_rkabupaten = mysql_fetch_assoc($rkabupaten);
$totalRows_rkabupaten = mysql_num_rows($rkabupaten);
?>

<select name="skab" id="skab" required class="form-control" onChange="show_kec(document.getElementById('skab').value);">
                                          <option value="">pilih</option>
                                          <?php
do {  
?>
                                          <option value="<?php echo $row_rkabupaten['id']?>"><?php echo $row_rkabupaten['nama']?></option>
                                          <?php
} while ($row_rkabupaten = mysql_fetch_assoc($rkabupaten));
  $rows = mysql_num_rows($rkabupaten);
  if($rows > 0) {
      mysql_data_seek($rkabupaten, 0);
	  $row_rkabupaten = mysql_fetch_assoc($rkabupaten);
  }
?>
                                      </select>