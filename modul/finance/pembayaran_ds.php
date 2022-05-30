<?php require_once('../../Connections/hemera.php'); ?>
<?php
ob_start();
session_start();

error_reporting(0);
@ini_set('display_errors', 0);


$tglnow=date('Y-m-d');

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
$query_rtrx = "SELECT trx_ds.kd_order, trx_ds.tgl_in, trx_ds_detail.id_ AS id_trx, trx_ds_detail.hrg_satuan, trx_ds_detail.qty, trx_ds_detail.foto_utama, product_master.harga_net, product_master.kd_warna, product_master.kd_size, ((trx_ds_detail.hrg_satuan-product_master.harga_net)*trx_ds_detail.qty) AS profit, trx_ds_detail.nm_prod, trx_ds.kd_ds FROM product_master JOIN trx_ds_detail ON product_master.kd_product = trx_ds_detail.kd_prod  JOIN trx_ds ON trx_ds.kd_order = trx_ds_detail.kd_order WHERE trx_ds.kd_ds='$_GET[kd_ds]' AND trx_ds_detail.sts_wd= '0' AND trx_ds.sts_kirim='1'";
$rtrx = mysql_query($query_rtrx, $hemera) or die(mysql_error());
$row_rtrx = mysql_fetch_assoc($rtrx);
$totalRows_rtrx = mysql_num_rows($rtrx);

mysql_select_db($database_hemera, $hemera);
$query_cds = "SELECT * FROM dropshiper WHERE kd_dropshiper='$_GET[kd_ds]'";
$cds = mysql_query($query_cds, $hemera) or die(mysql_error());
$row_cds = mysql_fetch_assoc($cds);
$totalRows_cds = mysql_num_rows($cds);

mysql_select_db($database_hemera, $hemera);
$query_rrek_hem = "SELECT * FROM rekening_hemera";
$rrek_hem = mysql_query($query_rrek_hem, $hemera) or die(mysql_error());
$row_rrek_hem = mysql_fetch_assoc($rrek_hem);
$totalRows_rrek_hem = mysql_num_rows($rrek_hem);




?>

            					
<h4 class="onboarding-title">Form Action</h4>
<div class="element-wrapper">
                              <h6 class="element-header">Payment Dropshipper Profit</h6>
                              <form action="modul/finance/in_payment_ds.php" method="post" enctype="multipart/form-data" id="fin">
                              <div class="element-box">
                                 <div class="table-responsive"><table width="100%" class="table table-striped"><thead><tr>
                                   <th width="10%">Images</th>
                                   <th width="37%">Product</th>
                                   <th width="17%">Buyer</th>
                                   <th width="13%" class="text-center">Date</th>
                                   <th width="23%" class="text-right">Profits</th></tr></thead><tbody>
                                   <?php $tox=0; ?>
                                     <?php do { ?>
                                     <?php
									 mysql_select_db($database_hemera, $hemera);
$query_rcolor = "SELECT * FROM product_color WHERE kd_color='$row_rtrx[kd_warna]'";
$rcolor = mysql_query($query_rcolor, $hemera) or die(mysql_error());
$row_rcolor = mysql_fetch_assoc($rcolor);
$totalRows_rcolor = mysql_num_rows($rcolor);

mysql_select_db($database_hemera, $hemera);
$query_rsize = "SELECT * FROM product_size WHERE kd_size='$row_rtrx[kd_size]'";
$rsize = mysql_query($query_rsize, $hemera) or die(mysql_error());
$row_rsize = mysql_fetch_assoc($rsize);
$totalRows_rsize = mysql_num_rows($rsize);
									 ?>
                                     <tr>
                                       <td>
                                       <input name="cbx[]" type="checkbox" value="<?php echo $row_rtrx['id_trx']; ?>" checked="checked" />
                                       <img alt="" src="foto/product/<?php echo $row_rtrx['foto_utama']; ?>">
                                       </td>
                                       <td>
                                       <?php echo $row_rtrx['nm_prod']; ?>
                                       <br />
                                       <?php echo $row_rcolor['nm_color']; ?> - <?php echo $row_rsize['nm_size']; ?></td>
                                       <td>
                                       <?php
									   mysql_select_db($database_hemera, $hemera);
$query_rcus = "SELECT * FROM ds_customer WHERE kd_order='$row_rtrx[kd_order]'";
$rcus = mysql_query($query_rcus, $hemera) or die(mysql_error());
$row_rcus = mysql_fetch_assoc($rcus);
$totalRows_rcus = mysql_num_rows($rcus);
									   ?>
                                       <?php echo $row_rcus['nm_depan']; ?> <?php echo $row_rcus['nm_belakang']; ?> <br><?php echo $row_rcus['alamat']; ?></td>
                                       <td class="text-center"><?php echo $row_rtrx['tgl_in']; ?></td>
                                       <td class="text-right">IDR <?php echo number_format($row_rtrx['profit'],0,",","."); ?></td></tr>
                                     <?php $tox+=$row_rtrx['profit']; ?>
                                       <?php } while ($row_rtrx = mysql_fetch_assoc($rtrx)); ?>
                                       <tr>
                                       <td colspan="4">TOTAL</td>
                                       <td class="text-right">IDR <?php echo number_format($tox,0,",","."); ?></td>
                                     </tr>
                                   </tbody></table></div>
                                   
                                   <hr>
                                   
                                   
                                    <div class="row">
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                          <label for="file_foto">Bank Penerima</label>
                                            
                                            <input name="bank" type="text" required="required" class="form-control" value="<?php echo $row_cds['bank']; ?>"/>
                                          <input name="hf_kdds" type="hidden" id="hf_kdds" value="<?php echo $row_cds['kd_dropshiper']; ?>" />
                                          <input name="hf_kd_user" type="hidden" id="hf_kd_user" value="<?php echo $_SESSION['HEM_name']; ?>" />
                                      </div>
                                       
                                    </div>
                                      
                                      
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <label for="file_foto">No Rekening Penerima</label>
                                            
                                            <input name="no_rek" type="text" required="required" class="form-control" value="<?php echo $row_cds['no_rekening']; ?>"/>
                                      </div>
                                       
                                    </div>
                                      
                                       <div class="col-sm-6">
                                        <div class="form-group"><label for="file_foto">Atas Nama</label>
Penerima                                            
                                            <input name="atas_nama" type="text" required="required" class="form-control" value="<?php echo $row_cds['atas_nama']; ?>"/>
                                      </div>
                                       
                                    </div>
                                    
                                       <div class="col-sm-6">
                                        <div class="form-group"><label for="file_foto">Nominal</label>
                                            
                                            <input name="nominal" type="text" required="required" class="form-control" value="<?php echo $tox; ?>"/>
                                      </div>
                                       
                                    </div>
                                       
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                        <label for="file_foto">Tgl Transfer</label>
                                            
                                            <input name="tgl_trf" type="date" required="required" class="form-control" value="<?php echo $tglnow; ?>"/>
                                      </div>
                                       
                                    </div>
                                    
                                       
                                       
                                      <div class="col-sm-6">
                                        <div class="form-group"><label for="file_foto">Bukti Transfer</label>
                                            
                                            <input name="file_foto" type="file" class="form-control" required="required"/>
                                      </div>
                                       
                                    </div>
                                      
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <label for="file_foto">No Rekening Hemera</label>
                                            
                                           
                                          <label for="srek_hemera"></label>
                                            <select name="srek_hemera" id="srek_hemera" required="required" class="form-control">
                                              <option value="value">Pilih</option>
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_rrek_hem['id_']?>"><?php echo $row_rrek_hem['bank']?> - <?php echo $row_rrek_hem['no_rek']?></option>
                                              <?php
} while ($row_rrek_hem = mysql_fetch_assoc($rrek_hem));
  $rows = mysql_num_rows($rrek_hem);
  if($rows > 0) {
      mysql_data_seek($rrek_hem, 0);
	  $row_rrek_hem = mysql_fetch_assoc($rrek_hem);
  }
?>
                                            </select>
                                        </div>
                                       
                                    </div> 
                                      
                                       <div class="col-sm-6">
                                        <div class="form-group">
                                          <label for="file_foto">Petugas Transfer</label>
                                            <br>
                                            <button class="mr-2 mb-2 btn btn-outline-primary" type="button"> <?php echo $_SESSION['HEM_name']; ?></button>
                                            
                                      </div>
                                       
                                    </div>
                                       
                                       
                                      <div class="col-sm-6">
                                        <div class="form-group"><label for="file_foto">Approval</label>
                                            
                                            <select name="sapproval" required="required" class="form-control">
                                              <option>Pilih</option>
                                              <option value="1">Transfer</option>
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
                                
                                 
                              </div>
                              </form> 
                             
                                 
</div>
            
<?php
mysql_free_result($rtrx);
?>
