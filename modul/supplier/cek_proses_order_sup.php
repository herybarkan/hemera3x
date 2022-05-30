<?php require_once('../../Connections/hemera.php'); ?>
<?php
ob_start();
session_start();

error_reporting(0);
@ini_set('display_errors', 0);

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
$query_rcus = "SELECT  ds_customer.nm_depan,  ds_customer.nm_belakang,  ds_customer.alamat,  ds_customer.kota,  ds_customer.no_hp,  ds_customer.kd_order,  trx_ds.sts_bayar,  trx_ds.sts_proses,  trx_ds.sts_terima,  trx_ds.kd_ds,  trx_ds_detail.nm_prod,  trx_ds_detail.foto_utama,  trx_ds_detail.qty,  trx_ds_detail.hrg_satuan,  trx_ds_detail.hrg_total,  trx_ds_detail.sts_wd,  trx_ds.sts_order,  product_master.harga,  product_master.diskon,  product_master.harga_net,  product_master.kd_product,  product_master.kd_warna,  product_master.kd_size,  product_master.sku,  product_color.nm_color,  product_size.nm_size  FROM ds_customer  JOIN trx_ds ON ds_customer.kd_order = trx_ds.kd_order   JOIN trx_ds_detail ON trx_ds_detail.kd_order = trx_ds.kd_order   JOIN product_master ON product_master.kd_product = trx_ds_detail.kd_prod   JOIN product_color ON product_color.kd_color = product_master.kd_warna   JOIN product_size ON product_size.kd_size = product_master.kd_size  WHERE trx_ds_detail.kd_order='$_GET[kd_order]'";
$rcus = mysql_query($query_rcus, $hemera) or die(mysql_error());
$row_rcus = mysql_fetch_assoc($rcus);
$totalRows_rcus = mysql_num_rows($rcus);

mysql_select_db($database_hemera, $hemera);
$query_rds = "SELECT * FROM dropshiper WHERE kd_dropshiper='$row_rcus[kd_ds]'";
$rds = mysql_query($query_rds, $hemera) or die(mysql_error());
$row_rds = mysql_fetch_assoc($rds);
$totalRows_rds = mysql_num_rows($rds);

mysql_select_db($database_hemera, $hemera);
$query_rtrx = "SELECT * FROM trx_ds WHERE kd_order='$row_rcus[kd_order]'";
$rtrx = mysql_query($query_rtrx, $hemera) or die(mysql_error());
$row_rtrx = mysql_fetch_assoc($rtrx);
$totalRows_rtrx = mysql_num_rows($rtrx);

mysql_select_db($database_hemera, $hemera);
$query_rtrf = "SELECT * FROM trx_ds_bt WHERE kd_order='$row_rcus[kd_order]'";
$rtrf = mysql_query($query_rtrf, $hemera) or die(mysql_error());
$row_rtrf = mysql_fetch_assoc($rtrf);
$totalRows_rtrf = mysql_num_rows($rtrf);

mysql_select_db($database_hemera, $hemera);
$query_rdet = "SELECT * FROM trx_ds_detail WHERE kd_order='$row_rcus[kd_order]'";
$rdet = mysql_query($query_rdet, $hemera) or die(mysql_error());
$row_rdet = mysql_fetch_assoc($rdet);
$totalRows_rdet = mysql_num_rows($rdet);

?>
<div class="onboarding-side-by-side">
                <div class="onboarding-media">
                <h6 class="element-header">Cart</h6>
                <!--<img alt="" src="https://<?php //echo $row_rds['nm_domain']; ?>/foto/<?php //echo $row_rcus['bukti_trf']; ?>" width="280px">-->
                
                <?php //echo $row_rcus['bukti_trf']."<br>"; ?>
                <?php //echo $row_rcus['kd_order']."<br>"; ?>
                <?php //echo $row_rtrf['nominal']; ?>
                
                
                  
                  
                  
 
  <table width="300" border="1">
  <?php do { ?>
  <tr>
    <td><img alt="" src="https://hemerapartner.com/admin/foto/product/<?php echo $row_rdet['foto_utama']; ?>" width="60px"></td>
    <td><?php echo $row_rdet['nm_prod']; ?></td>
    <td><?php echo number_format($row_rdet['hrg_satuan'],0,",","."); ?></td>
  </tr>
  <?php } while ($row_rdet = mysql_fetch_assoc($rdet)); ?>
</table>
                
                </div>
                	<div class="onboarding-content with-gradient">
                    	
            					<div class="modal-body">

            					
<h4 class="onboarding-title">Form Checking</h4>
<div class="element-wrapper">
                              <h6 class="element-header">Proccess Checking</h6>
                              <div class="element-box">
                                 <form action="modul/supplier/in_cek_proses_sup.php" method="post" id="fin">
                                    <!--<h5 class="form-header">Default Layout</h5>
                                    <div class="form-desc">Discharge best employed your phase each the of shine. Be met even reason consider logbook redesigns. Never a turned interfaces among asking</div>-->
                                    <!--<div class="form-group"><label for=""> Email address</label><input class="form-control" placeholder="Enter email" type="email"></div>-->
                                    <div class="row">
                                    
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="file_foto"> KD Order</label>
                                        <span class="float-right"><?php echo $_GET[kd_order]; ?></span>
                                      </div>
                                      </div>
                                      
                                      
                                      <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="file_foto"> Dropshipper</label>
                                        <span class="float-right text-primary"><?php echo $row_rds['nm_toko']; ?></span>
                                        <input name="hf_id" type="hidden" id="hf_id" value="<?php echo $row_ruser['id_']; ?>" />
                                        <input name="hf_kduser" type="hidden" id="hf_kduser" value="<?php echo $row_ruser['kd_user']; ?>" />
                                        <input name="hf_nm_toko" type="hidden" id="hf_nm_toko" value="<?php echo $row_ruser['nm_toko']; ?>" />
                                        <input name="hf_email" type="hidden" id="hf_email" value="<?php echo $row_ruser['email']; ?>" />
                                        <input name="hf_kdorder" type="hidden" id="hf_kdorder" value="<?php echo $row_rcus['kd_order']; ?>" />
                                      </div>
                                      </div>
                                      
                                       <div class="col-sm-6">
                                         <div class="form-group">
                                           <label for="file_foto"> Customer</label><span class="float-right text-primary"> <?php echo $row_rcus['nm_depan']; ?> <?php echo $row_rcus['nm_belakang']; ?></span></div>
                                       </div>
                                       <div class="col-sm-6">
                                         <div class="form-group">
                                           <label for="file_foto">Address</label>
                                           <span class="float-right text-primary">
                                           <?php echo $row_rcus['alamat']; ?> <?php echo $row_rcus['kota']; ?>
                                           </span>
                                           </div>
                                       </div>
                                       
                                       <div class="col-sm-6">
                                         <div class="form-group">
                                           <label for="file_foto">Total Belanja</label>
                                           <span class="float-right text-primary"><?php echo number_format($row_rtrx['hrg_grand'],0,",","."); ?></span></div>
                                       </div>
                                       
                                       <div class="col-sm-6">
                                         <div class="form-group">
                                           <label for="file_foto">Expedisi</label>
                                           <span class="float-right text-primary">JNE</span></div>
                                       </div>
                                       
                                      <div class="col-sm-6">
                                         <div class="form-group">
                                           <label for="file_foto">Biaya Expedisi</label>
                                           <span class="float-right text-primary"><?php echo number_format($row_rtrx['hrg_shipping'],0,",","."); ?></span></div>
                                       </div>
                                      <div class="col-sm-6"></div>
                                       
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="file_foto">Proccess</label>
                                            
                                            <select name="sapproval" required="required" class="form-control">
                                              <option>Pilih</option>
                                              <option value="1">Packaging</option>
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
                                    
                                    
                                    
                                    
                                    
                                    <div class="form-buttons-w"><button class="btn btn-primary" type="submit"> Submit</button>
                                    </div>
                                 </form>
                              </div>
</div>
</div>
            		</div>
            </div>
<?php
mysql_free_result($rgrup);

mysql_free_result($rcus);

mysql_free_result($rdet);
?>
