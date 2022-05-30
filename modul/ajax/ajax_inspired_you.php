<?php require_once('../../Connections/hemera.php'); ?>
<?php
ob_start();
session_start();

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
$query_rdata = "SELECT * FROM list_inspired_you WHERE aktif='1'";
$rdata = mysql_query($query_rdata, $hemera) or die(mysql_error());
$row_rdata = mysql_fetch_assoc($rdata);
$totalRows_rdata = mysql_num_rows($rdata);
?>


<div class="col-12">
<div class="row">
  <?php do { ?>
    <div class="col-3" style="padding:10px;">
      <img src="https://hemerapartner.com/admin/img/template/inspired_you/<?php echo $row_rdata['nm_foto']; ?>" style="width:100%;"> 
      <br>
      <input name="rb_slider" type="radio" value="<?php echo $row_rdata['nm_foto']; ?>"> Pilih
    </div>
    <?php } while ($row_rdata = mysql_fetch_assoc($rdata)); ?>

</div>
</div>
<?php
mysql_free_result($rdata);
?>
