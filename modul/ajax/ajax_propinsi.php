<?php header("Access-Control-Allow-Origin: *"); ?>
<?php require_once('ekobi.php'); ?>
<?php

 
//include "db.php";
 
mysql_select_db($database_ekobi, $ekobi);
$query_rpropinsi = "SELECT * FROM provinsi";
$rpropinsi = mysql_query($query_rpropinsi, $ekobi) or die(mysql_error());
$row_rpropinsi = mysql_fetch_assoc($rpropinsi);
$totalRows_rpropinsi = mysql_num_rows($rpropinsi);
?>

<select name="sprop" id="sprop" required class="form-control" onChange="show_kab(document.getElementById('sprop').value);">
                                          <option value="">pilih</option>
                                          <?php
do {  
?>
                                          <option value="<?php echo $row_rpropinsi['id']?>"><?php echo $row_rpropinsi['nama']?></option>
                                          <?php
} while ($row_rpropinsi = mysql_fetch_assoc($rpropinsi));
  $rows = mysql_num_rows($rpropinsi);
  if($rows > 0) {
      mysql_data_seek($rpropinsi, 0);
	  $row_rpropinsi = mysql_fetch_assoc($rpropinsi);
  }
?>
                                      </select>