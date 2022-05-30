<?php require_once('../../Connections/hemera.php'); ?>
<?php
mysql_select_db($database_hemera, $hemera);
$query_rkecamatan = "SELECT * FROM kecamatan WHERE kabupaten_kota_id='$_GET[get_kec]'";
$rkecamatan = mysql_query($query_rkecamatan, $hemera) or die(mysql_error());
$row_rkecamatan = mysql_fetch_assoc($rkecamatan);
$totalRows_rkecamatan = mysql_num_rows($rkecamatan);
?>

<select name="skec" id="skec" required class="form-control" onChange="show_kel(document.getElementById('skec').value);">
                                          <option value="">pilih</option>
                                          <?php
do {  
?>
                                          <option value="<?php echo $row_rkecamatan['id']?>"><?php echo $row_rkecamatan['nama']?></option>
                                          <?php
} while ($row_rkecamatan = mysql_fetch_assoc($rkecamatan));
  $rows = mysql_num_rows($rkecamatan);
  if($rows > 0) {
      mysql_data_seek($rkecamatan, 0);
	  $row_rkecamatan = mysql_fetch_assoc($rkecamatan);
  }
?>
                                      </select>