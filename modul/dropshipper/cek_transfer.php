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
$query_ruser = "SELECT user_.id_, user_.kd_user, user_.nama, user_.nm_toko, user_.nm_domain, user_.hp, user_.email, user_.foto, upload_pembayaran.atas_nama, upload_pembayaran.nominal, upload_pembayaran.bank, upload_pembayaran.dari_rek, upload_pembayaran.ke_rek, upload_pembayaran.tgl_trf, upload_pembayaran.bukti_transfer, user_grup.nm_grup FROM upload_pembayaran RIGHT JOIN user_ ON upload_pembayaran.email = user_.email  JOIN user_grup ON user_grup.kd_grup = user_.grup  WHERE user_.grup='6' AND user_.id_='$_GET[id_]'";
$ruser = mysql_query($query_ruser, $hemera) or die(mysql_error());
$row_ruser = mysql_fetch_assoc($ruser);
$totalRows_ruser = mysql_num_rows($ruser);

mysql_select_db($database_hemera, $hemera);
$query_rgrup = "SELECT * FROM user_grup";
$rgrup = mysql_query($query_rgrup, $hemera) or die(mysql_error());
$row_rgrup = mysql_fetch_assoc($rgrup);
$totalRows_rgrup = mysql_num_rows($rgrup);
?>
<div class="onboarding-side-by-side">
                <div class="onboarding-media">
                <h6 class="element-header">Payment Evidence</h6>
                <img alt="" src="https://hemerapartner.com/admin/foto/pembayaran/<?php echo $row_ruser['bukti_transfer']; ?>" width="280px">
                
                </div>
                	<div class="onboarding-content with-gradient">
                    	
            					<div class="modal-body">

            					
<h4 class="onboarding-title">Form Checking</h4>
<div class="element-wrapper">
                              <h6 class="element-header">Payment Checking</h6>
                              <div class="element-box">
                                 <form action="modul/dropshipper/in_dropshipper.php" method="post" id="fin">
                                    <!--<h5 class="form-header">Default Layout</h5>
                                    <div class="form-desc">Discharge best employed your phase each the of shine. Be met even reason consider logbook redesigns. Never a turned interfaces among asking</div>-->
                                    <!--<div class="form-group"><label for=""> Email address</label><input class="form-control" placeholder="Enter email" type="email"></div>-->
                                    <div class="row">
                                    
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="file_foto"> From</label>
                                        <input name="hf_id" type="hidden" id="hf_id" value="<?php echo $row_ruser['id_']; ?>" />
                                      <span class="float-right text-primary"><?php echo $row_ruser['nama']; ?></span>
                                      <input name="hf_kduser" type="hidden" id="hf_kduser" value="<?php echo $row_ruser['kd_user']; ?>" />
                                      <input name="hf_nm_toko" type="hidden" id="hf_nm_toko" value="<?php echo $row_ruser['nm_toko']; ?>" />
                                      <input name="hf_email" type="hidden" id="hf_email" value="<?php echo $row_ruser['email']; ?>" />
                                      <input name="hf_nm_domain" type="hidden" id="hf_nm_domain" value="<?php echo $row_ruser['nm_domain']; ?>" />
                                      </div>
                                      </div>
                                      
                                      
                                      <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="file_foto"> Email</label>
                                        <span class="float-right text-primary"><?php echo $row_ruser['email']; ?></span></div>
                                      </div>
                                      
                                       <div class="col-sm-6">
                                         <div class="form-group"><label for="file_foto"> Nominal</label>
                                           <span class="float-right text-primary">IDR <?php echo number_format($row_ruser['nominal'],0,",","."); ?></span></div>
                                       </div>
                                       <div class="col-sm-6">
                                         <div class="form-group"><label for="file_foto">Bank From</label>
                                           <span class="float-right text-primary"><?php echo $row_ruser['bank']; ?></span></div>
                                       </div>
                                       
                                       <div class="col-sm-6">
                                         <div class="form-group"><label for="file_foto">Bank Account From</label>
                                           <span class="float-right text-primary"><?php echo $row_ruser['dari_rek']; ?></span></div>
                                       </div>
                                       
                                       <div class="col-sm-6">
                                         <div class="form-group">
                                           <label for="file_foto">Hemera Bank Account</label>
                                           <span class="float-right text-primary"><?php echo $row_ruser['ke_rek']; ?></span></div>
                                       </div>
                                       
                                      
                                      <div class="col-sm-6">
                                          <div class="form-group"><label for="file_foto">Date</label>
                                            <span class="float-right text-primary"><?php echo $row_ruser['tgl_trf']; ?></span></div>
                                       </div>
                                       
                                       <div class="col-sm-6">
                                          <div class="form-group"><label for="file_foto">Evidence</label>
                                            <span class="float-right text-primary"><a href="#" data-href="modul/dropshipper/det_transfer.php?id_=<?php echo $row_ruser['bukti_transfer']; ?>" class="openPopup2"><?php echo $row_ruser['bukti_transfer']; ?></a></span></div>
                                       </div>
                                       
                                       
                                      <div class="col-sm-6">
                                        <div class="form-group"><label for="file_foto">Approval</label>
                                            
                                            <select name="sapproval" required="required" class="form-control">
                                              <option>Pilih</option>
                                              <option value="1">Approve</option>
                                              <option value="9">Reject</option>
                                            </select>
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-6">
                                        <div class="form-group"><label for="file_foto">Reason</label>
                                            
                                            <input name="reason" type="text" class="form-control"/>
                                      </div>
                                       
                                    </div>
                                      
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    <div class="form-buttons-w"><button class="btn btn-primary" type="submit"> Submit</button></div>
                                    <span style="color:#F00;">Proses Approval agak sedikit lama..karena terdapat proses generate web...mohon ditunggu</span>
                                 </form>
                              </div>
</div>
</div>
            		</div>
            </div>
<?php
mysql_free_result($rgrup);
?>
