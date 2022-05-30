<?php require_once('Connections/hemera.php'); ?>
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
$query_ruser = "SELECT user_.id_, user_.id_ AS idx, user_.kd_user, user_.nama, user_.nm_toko, user_.hp, user_.email, user_.foto, upload_pembayaran.atas_nama, upload_pembayaran.nominal, upload_pembayaran.bank, upload_pembayaran.dari_rek, user_grup.nm_grup, dropshiper.kd_dropshiper, dropshiper.nm_domain FROM upload_pembayaran JOIN user_ ON upload_pembayaran.email = user_.email  JOIN user_grup ON user_grup.kd_grup = user_.grup  JOIN dropshiper ON dropshiper.kd_user = user_.kd_user WHERE user_.grup='6'  AND user_.aktif='1'";
$ruser = mysql_query($query_ruser, $hemera) or die(mysql_error());
$row_ruser = mysql_fetch_assoc($ruser);
$totalRows_ruser = mysql_num_rows($ruser);
?>

<div class="element-wrapper">
   <h6 class="element-header">List of Profit Dropshipper</h6>
   <div class="element-box-tp">
      <div class="table-responsive">
         <table width="100%" class="table table-padded">
            <thead>
               <tr>
                  <th width="2%"></th>
                  <th width="16%">Name</th>
                  <th width="25%">Shop Name</th>
                  <th width="17%">Total Profit</th>
                  <th width="14%">Recent Profit</th>
                  <th width="7%"> Status</th>
                  <th width="19%">Actions</th>
               </tr>
            </thead>
            <tbody>
            <?php $tp=0; $rp=0; ?>
               <?php do { ?>
               <tr>
                   <td class="text-center">
                   <input class="form-control" type="checkbox">
                   </td>
                   <td>
                     <div class="user-with-avatar"><img alt="" src="foto/user/<?php echo $row_ruser['foto']; ?>"><span><?php echo $row_ruser['nama']; ?></span></div>
                   </td>
                   <td><?php echo $row_ruser['nm_toko']; ?></td>
                   <td class="nowrap">
                   <?php
/*mysql_select_db($database_hemera, $hemera);
$query_ptot = "SELECT
SUM(trx_ds_detail.hrg_satuan * trx_ds_detail.qty)-(product_master.harga_net * trx_ds_detail.qty) AS profit
FROM
product_master
JOIN trx_ds_detail
ON product_master.kd_product = trx_ds_detail.kd_prod 
JOIN trx_ds
ON trx_ds.kd_order = trx_ds_detail.kd_order WHERE trx_ds.kd_ds='$row_ruser[kd_dropshiper]' AND trx_ds_detail.sts_wd= '1' AND trx_ds.sts_kirim='1'";
$ptot = mysql_query($query_ptot, $hemera) or die(mysql_error());
$row_ptot = mysql_fetch_assoc($ptot);
$totalRows_ptot = mysql_num_rows($ptot);	*/

mysql_select_db($database_hemera, $hemera);
$query_ptot = "SELECT
SUM(trx_ds_detail.profit) AS profit
FROM
trx_ds_detail
JOIN trx_ds
ON trx_ds.kd_order = trx_ds_detail.kd_order WHERE trx_ds.kd_ds='$row_ruser[kd_dropshiper]' AND trx_ds_detail.sts_wd= '1' AND trx_ds.sts_kirim='1'";
$ptot = mysql_query($query_ptot, $hemera) or die(mysql_error());
$row_ptot = mysql_fetch_assoc($ptot);
$totalRows_ptot = mysql_num_rows($ptot);	

/*mysql_select_db($database_hemera, $hemera);
$query_ptotr = "SELECT
SUM(trx_ds_detail.hrg_satuan * trx_ds_detail.qty)-(product_master.harga_net * trx_ds_detail.qty) AS profit
FROM
product_master
JOIN trx_ds_detail
ON product_master.kd_product = trx_ds_detail.kd_prod 
JOIN trx_ds
ON trx_ds.kd_order = trx_ds_detail.kd_order WHERE trx_ds.kd_ds='$row_ruser[kd_dropshiper]' AND trx_ds_detail.sts_wd= '0' AND trx_ds.sts_kirim='1'";
$ptotr = mysql_query($query_ptotr, $hemera) or die(mysql_error());
$row_ptotr = mysql_fetch_assoc($ptotr);
$totalRows_ptotr = mysql_num_rows($ptotr);			*/	   

mysql_select_db($database_hemera, $hemera);
$query_ptotr = "SELECT
SUM(trx_ds_detail.profit) AS profit
FROM
trx_ds_detail
JOIN trx_ds
ON trx_ds.kd_order = trx_ds_detail.kd_order WHERE trx_ds.kd_ds='$row_ruser[kd_dropshiper]' AND trx_ds_detail.sts_wd= '0' AND trx_ds.sts_kirim='1'";
$ptotr = mysql_query($query_ptotr, $hemera) or die(mysql_error());
$row_ptotr = mysql_fetch_assoc($ptotr);
$totalRows_ptotr = mysql_num_rows($ptotr);				   
				   
				   ?>
                   <?php echo number_format($row_ptot['profit'],0,",","."); ?>
                   </td>
                   <td class="nowrap"><?php echo number_format($row_ptotr['profit'],0,",","."); ?></td>
                   <td class="nowrap">
                   
                   </td>
                   <td >
                   
                   
                   
                  <!--  <a href="javascript:void(0);" data-href="modul/dropshipper/cek_transfer.php?id_=<?php //echo $row_ruser['idx']; ?>" class="btn btn-success btn-sm text-white openPopup2">Payment</a>-->
                    
                    <a href="modul/finance/pembayaran_ds.php?kd_ds=<?php echo $row_ruser['kd_dropshiper']; ?>" class="btn btn-success btn-sm text-white"data-target=".bd-example-modal-lg" data-toggle="modal">Payment</a>
                   
                    
                   <!-- <a href="javascript:void(0);" data-href="modul/user/del_user.php?id_=<?php //echo $row_ruser['id_']; ?>" class="btn btn-danger btn-sm text-white openPopup">Reject</a>-->
                    
                                 
                   </td>
                </tr>
                
               <?php $tp+=$row_ptot['profit']; $rp+=$row_ptotr['profit']; ?>
                 <?php } while ($row_ruser = mysql_fetch_assoc($ruser)); ?>
                 
                 <tr>
                 <td colspan="2" ><span style="font-weight:900;">TOTAL</span></td>
                 <td>&nbsp;</td>
                 <td class="nowrap"><span style="font-weight:900;"><?php echo number_format($tp,0,",","."); ?></span></td>
                 <td class="nowrap"><span style="font-weight:900;"><?php echo number_format($rp,0,",","."); ?></span></td>
                 <td class="nowrap"></td>
                 <td >&nbsp;</td>
               </tr>
               
            </tbody>
         </table>
      </div>
   </div>
</div>

<div class="onboarding-modal modal fade animated" id="myModal" role="dialog">
    <div class="modal-dialog modal-xl modal-centered">
    	<div class="modal-content">
        	
        </div>
    </div>
</div>

<div aria-hidden="true" aria-labelledby="myLargeModalLabel" class="modal fade bd-example-modal-lg" role="dialog" tabindex="-1">
                              <div class="modal-dialog modal-lg">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel"> </h5>
                                       <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                       
                                    </div>
                                    
                                 </div>
                              </div>
                           </div>

<?php
mysql_free_result($ruser);
?>