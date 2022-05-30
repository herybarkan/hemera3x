<?php require_once('../../Connections/hemera.php'); ?>
<?php
mysql_select_db($database_hemera, $hemera);
$query_rsupp = "SELECT * FROM suplier WHERE kd_user=''";
$rsupp = mysql_query($query_rsupp, $hemera) or die(mysql_error());
$row_rsupp = mysql_fetch_assoc($rsupp);
$totalRows_rsupp = mysql_num_rows($rsupp);

mysql_select_db($database_hemera, $hemera);
$query_rdrp = "SELECT * FROM dropshiper ORDER BY id_ DESC";
$rdrp = mysql_query($query_rdrp, $hemera) or die(mysql_error());
$row_rdrp = mysql_fetch_assoc($rdrp);
$totalRows_rdrp = mysql_num_rows($rdrp);
?>

<?php 
if ($_GET['get_addu']=="8")
{
?>
<select name="sel_mem" id="sel_mem" required class="form-control">
<option value="">pilih</option>
<?php
do {  
?>
<option value="<?php echo $row_rsupp['id_']?>"><?php echo $row_rsupp['kd_suplier']?> - <?php echo $row_rsupp['nm_suplier']?>
</option>
<?php
} while ($row_rsupp = mysql_fetch_assoc($rsupp));
  $rows = mysql_num_rows($rsupp);
  if($rows > 0) {
      mysql_data_seek($rsupp, 0);
	  $row_rsupp = mysql_fetch_assoc($rsupp);
  }
?>
</select>
<?php
}
//elseif ($_GET['get_addu']=="6")
//{
?>
<!--<select name="sel_mem" id="sel_mem" required class="form-control">
<option value="">pilih</option>
--><?php
//do {  
?>
<!--<option value="<?php //echo $row_rdrp['id']?>"><?php //echo $row_rdrp['kd_user']?> - <?php //echo $row_rdrp['nm_toko']?>
</option>
--><?php
/*} while ($row_rdrp = mysql_fetch_assoc($rdrp));
  $rows = mysql_num_rows($rdrp );
  if($rows > 0) {
      mysql_data_seek($rdrp, 0);
	  $row_rdrp = mysql_fetch_assoc($rdrp);
  }*/
?>
</select>
<?php
//}
?>