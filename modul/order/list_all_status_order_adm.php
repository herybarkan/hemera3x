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
   <h6 class="element-header">List of All Status Order</h6>
   <div class="element-box-tp">
      <div class="table-responsive">
         <table width="100%" class="table table-padded">
            <thead>
               <tr>
                  <th width="2%"></th>
                  <th width="17%">Name</th>
                  <th width="24%">Shop Name</th>
                  <th width="11%">New Order</th>
                  <th width="11%">Payed</th>
                  <th width="11%"> Proccessed</th>
                  <th width="11%">Shipped</th>
                  <th width="11%">Actions</th>
               </tr>
            </thead>
            <tbody>
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
mysql_select_db($database_hemera, $hemera);
$query_rnew = "SELECT ds_customer.nm_depan, ds_customer.nm_belakang, ds_customer.alamat, ds_customer.propinsi, ds_customer.kota, ds_customer.kd_pos, ds_customer.no_hp, ds_customer.email, ds_customer.catatan, ds_customer.tgl_in, ds_customer.jam_in, ds_customer.kd_order, trx_ds.hrg_tot, trx_ds.hrg_shipping, trx_ds.hrg_grand, trx_ds.sts_order, trx_ds.sts_bayar, trx_ds.sts_proses, trx_ds.sts_terima, trx_ds.kd_ds FROM ds_customer JOIN trx_ds ON ds_customer.kd_order = trx_ds.kd_order WHERE trx_ds.kd_ds='$row_ruser[kd_dropshiper]' AND trx_ds.sts_order='1' AND trx_ds.sts_bayar='0'";
$rnew = mysql_query($query_rnew, $hemera) or die(mysql_error());
$row_rnew = mysql_fetch_assoc($rnew);
$totalRows_rnew = mysql_num_rows($rnew);

mysql_select_db($database_hemera, $hemera);
$query_rpayed = "SELECT ds_customer.nm_depan, ds_customer.nm_belakang, ds_customer.alamat, ds_customer.propinsi, ds_customer.kota, ds_customer.kd_pos, ds_customer.no_hp, ds_customer.email, ds_customer.catatan, ds_customer.tgl_in, ds_customer.jam_in, ds_customer.kd_order, trx_ds.hrg_tot, trx_ds.hrg_shipping, trx_ds.hrg_grand, trx_ds.sts_order, trx_ds.sts_bayar, trx_ds.sts_proses, trx_ds.sts_terima, trx_ds.kd_ds FROM ds_customer JOIN trx_ds ON ds_customer.kd_order = trx_ds.kd_order WHERE trx_ds.kd_ds='$row_ruser[kd_dropshiper]' AND trx_ds.sts_order='1' AND trx_ds.sts_bayar='1'  AND trx_ds.sts_proses='0'";
$rpayed = mysql_query($query_rpayed, $hemera) or die(mysql_error());
$row_rpayed = mysql_fetch_assoc($rpayed);
$totalRows_rpayed = mysql_num_rows($rpayed);

mysql_select_db($database_hemera, $hemera);
$query_rproc = "SELECT ds_customer.nm_depan, ds_customer.nm_belakang, ds_customer.alamat, ds_customer.propinsi, ds_customer.kota, ds_customer.kd_pos, ds_customer.no_hp, ds_customer.email, ds_customer.catatan, ds_customer.tgl_in, ds_customer.jam_in, ds_customer.kd_order, trx_ds.hrg_tot, trx_ds.hrg_shipping, trx_ds.hrg_grand, trx_ds.sts_order, trx_ds.sts_bayar, trx_ds.sts_proses, trx_ds.sts_terima, trx_ds.kd_ds FROM ds_customer JOIN trx_ds ON ds_customer.kd_order = trx_ds.kd_order WHERE trx_ds.kd_ds='$row_ruser[kd_dropshiper]' AND trx_ds.sts_order='1' AND trx_ds.sts_bayar='1'  AND trx_ds.sts_proses='1'  AND trx_ds.sts_kirim='0'";
$rproc = mysql_query($query_rproc, $hemera) or die(mysql_error());
$row_rproc = mysql_fetch_assoc($rproc);
$totalRows_rproc = mysql_num_rows($rproc);

mysql_select_db($database_hemera, $hemera);
$query_rship = "SELECT ds_customer.nm_depan, ds_customer.nm_belakang, ds_customer.alamat, ds_customer.propinsi, ds_customer.kota, ds_customer.kd_pos, ds_customer.no_hp, ds_customer.email, ds_customer.catatan, ds_customer.tgl_in, ds_customer.jam_in, ds_customer.kd_order, trx_ds.hrg_tot, trx_ds.hrg_shipping, trx_ds.hrg_grand, trx_ds.sts_order, trx_ds.sts_bayar, trx_ds.sts_proses, trx_ds.sts_terima, trx_ds.kd_ds FROM ds_customer JOIN trx_ds ON ds_customer.kd_order = trx_ds.kd_order WHERE trx_ds.kd_ds='$row_ruser[kd_dropshiper]' AND trx_ds.sts_order='1' AND trx_ds.sts_bayar='1'  AND trx_ds.sts_proses='1'  AND trx_ds.sts_kirim='1'";
$rship = mysql_query($query_rship, $hemera) or die(mysql_error());
$row_rship = mysql_fetch_assoc($rship);
$totalRows_rship = mysql_num_rows($rship);

			   ?>
                   <?php echo number_format($totalRows_rnew,0,",","."); ?>
                   </td>
                   <td class="nowrap"><?php echo number_format($totalRows_rpayed,0,",","."); ?></td>
                   <td class="nowrap"><?php echo number_format($totalRows_rproc,0,",","."); ?></td>
                   <td class="nowrap"><?php echo number_format($totalRows_rship,0,",","."); ?></td>
                   <td >
                   
                   
                   
                  
                    
                    <a href="modul/order/detail_all_proccess.php?kd_ds=<?php echo $row_ruser['kd_dropshiper']; ?>" class="btn btn-success btn-sm text-white"data-target=".bd-example-modal-lg" data-toggle="modal" style="width:100px;">Detail</a>
                   
                   </td>
                </tr>
                 <?php } while ($row_ruser = mysql_fetch_assoc($ruser)); ?>
               
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
                           
<div aria-hidden="true" aria-labelledby="myLargeModalLabel" class="modal fade bdx-example-modal-lg" role="dialog" tabindex="-1">
                              <div class="modal-dialog modal-lg">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel"> </h5>
                                       <!--<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>-->
                                    </div>
                                    <div class="modal-body">
                                       
                                    </div>
                                    
                                 </div>
                              </div>
                           </div>

<?php
mysql_free_result($ruser);
?>