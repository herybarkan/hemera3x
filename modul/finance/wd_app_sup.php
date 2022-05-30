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

<h4 class="onboarding-title">Form Approval</h4>

<div class="element-wrapper">
                              <h6 class="element-header">Approval Supplier Withdrawal</h6>
                              <div class="element-box">
                                 <form action="modul/finance/in_wd_sup.php" method="post" enctype="multipart/form-data" id="fin">
                                    <!--<h5 class="form-header">Default Layout</h5>
                                    <div class="form-desc">Discharge best employed your phase each the of shine. Be met even reason consider logbook redesigns. Never a turned interfaces among asking</div>-->
                                    <!--<div class="form-group"><label for=""> Email address</label><input class="form-control" placeholder="Enter email" type="email"></div>-->
                                    <div class="row">
                                    
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="file_foto"> Suplier Code</label>
                                        <input name="hf_id" type="hidden" id="hf_id" value="<?php echo $row_rwd['id_']; ?>" />
                                        <br>
                                       <strong><?php echo $row_rsup['kd_suplier']; ?></strong>
                                       </div>
                                      </div>
                                      
                                      <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="file_foto"> Suplier Name</label><br>
                                        <strong><?php echo $row_rsup['nm_suplier']; ?></strong>
                                        </div>
                                      </div>
                                      
                                      <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="file_foto"> WD Code</label><br>
                                        <strong><?php echo $row_rwd['kd_wd']; ?></strong>
                                        </div>
                                      </div>
                                      
                                      <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="file_foto"> WD Amount</label><br>
                                        <strong>Rp. <?php echo number_format($row_rwd['nominal'],0,",","."); ?></strong>
                                        </div>
                                      
                                      </div>
                                      
                                    
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="file_foto"> Bank</label>
                                      <select name="sbank" class="form-control" id="sbank"  onchange="show_sku((document.getElementById('ssuplier').value),(document.getElementById('scolor').value),(document.getElementById('ssize').value));">
                                        <option value="0">Select</option>
                                        <?php
do {  
?>
                                        <option value="<?php echo $row_rbank['nm_bank']; ?>"><?php echo $row_rbank['nm_bank']; ?></option>
                                        <?php
} while ($row_rbank = mysql_fetch_assoc($rbank));
  $rows = mysql_num_rows($rbank);
  if($rows > 0) {
      mysql_data_seek($rbank, 0);
	  $row_rbank = mysql_fetch_assoc($rbank);
  }
?>
                                      </select>
                                      </div>
                                      </div>
                                      
                                      
                                      <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="file_foto"> No Rekening</label>
                                      <input name="no_rek" type="text" class="form-control" id="no_rek" value="<?php echo $row_rsup['no_rek']; ?>" >
                                      </div>
                                      </div>
                                      
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                         <label for="file_foto"> Atas Nama</label>
                                         <input name="atas_nama" type="text" class="form-control" id="atas_nama" value="<?php echo $row_rsup['atas_nama']; ?>" >
                                         </div>
                                       </div>
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                         <label for="file_foto">Bukti Transfer</label>
                                         <input name="file"  type="file" class="form-control" id="file" value="<?php echo $row_rsup['contact_person']; ?>">
                                         </div>
                                       </div>
                                    </div>
                                    
                                    <div class="form-buttons-w"><button class="btn btn-primary" type="submit"> Submit</button></div>
                                 </form>
                              </div>
</div>


<?php
mysql_free_result($rsup);
?>
