<?php require_once('../../Connections/hemera.php'); ?>
<?php
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
$query_rwd = "SELECT * FROM wd_supplier WHERE id_='$_GET[id_]'";
$rwd = mysql_query($query_rwd, $hemera) or die(mysql_error());
$row_rwd = mysql_fetch_assoc($rwd);
$totalRows_rwd = mysql_num_rows($rwd);

mysql_select_db($database_hemera, $hemera);
$query_rsup = "SELECT * FROM suplier WHERE kd_suplier='$row_rwd[kd_supplier]'";
$rsup = mysql_query($query_rsup, $hemera) or die(mysql_error());
$row_rsup = mysql_fetch_assoc($rsup);
$totalRows_rsup = mysql_num_rows($rsup);

mysql_select_db($database_hemera, $hemera);
$query_rbank = "SELECT * FROM bank";
$rbank = mysql_query($query_rbank, $hemera) or die(mysql_error());
$row_rbank = mysql_fetch_assoc($rbank);
$totalRows_rbank = mysql_num_rows($rbank);
?>

<h4 class="onboarding-title">Withdrawal</h4>

<div class="element-wrapper">
                              <h6 class="element-header">Detail Supplier Withdrawal</h6>
                              <div class="element-box">
                                    <div class="row">
                                    
                                    <div class="col-sm-6">
                                    <table width="100%" border="0">
  <tr>
    <td><label for="file_foto"> Suplier Code</label></td>
    <td><strong><?php echo $row_rsup['kd_suplier']; ?></strong></td>
  </tr>
  <tr>
    <td><label for="file_foto"> Suplier Name</label></td>
    <td><strong><?php echo $row_rsup['nm_suplier']; ?></strong></td>
  </tr>
  <tr>
    <td><label for="file_foto"> WD Code</label></td>
    <td><strong><?php echo $row_rwd['kd_wd']; ?></strong></td>
  </tr>
  <tr>
    <td><label for="file_foto"> WD Amount</label></td>
    <td><strong>Rp. <?php echo number_format($row_rwd['nominal'],0,",","."); ?></strong></td>
  </tr>
  <tr>
    <td><label for="file_foto"> Bank</label></td>
    <td><?php echo $row_rwd['bank']; ?></td>
  </tr>
  <tr>
    <td><label for="file_foto"> No Rekening</label></td>
    <td><?php echo $row_rwd['no_rek']; ?></td>
  </tr>
  <tr>
    <td><label for="file_foto"> Atas Nama</label></td>
    <td><?php echo $row_rwd['atas_nama']; ?></td>
  </tr>
  <tr>
    <td><label for="file_foto"> Status</label></td>
    <td>
	<?php 
	if ($row_rwd['sts_wd']=="0") {echo "<span class=\"text-danger\">Not Yet Paid</span>";} 
	elseif ($row_rwd['sts_wd']=="1") {echo "<span class=\"text-success\">Already Paid</span>";} 
	?></td>
  </tr>
  <tr>
    <td><label for="file_foto"> Tgl Approval</label></td>
    <td><?php echo $row_rwd['tgl_wdx']; ?></td>
  </tr>
  <tr>
    <td><label for="file_foto"> Jam Approval</label></td>
    <td><?php echo $row_rwd['jam_wdx']; ?></td>
  </tr>
  <tr>
    <td><label for="file_foto"> Approved By</label></td>
    <td><?php echo $row_rwd['wdx_by']; ?></td>
  </tr>
</table>
                                   
                                  
                                     
                                
                                       </div>
                                       
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                         <label for="file_foto">Bukti Transfer</label><br>
                                         <img src="foto/trf_profit/<?php echo $row_rwd['bukti_trf']; ?>" width="200"/>
                                         </div>
                                       </div>
                                    </div>
                                    
                              </div>
</div>


<?php
mysql_free_result($rsup);
?>
