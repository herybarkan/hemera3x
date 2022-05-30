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
$query_rnew = "SELECT ds_customer.nm_depan, ds_customer.nm_belakang, ds_customer.alamat, ds_customer.propinsi, ds_customer.kota, ds_customer.kd_pos, ds_customer.no_hp, ds_customer.email, ds_customer.catatan, ds_customer.tgl_in, ds_customer.jam_in, ds_customer.kd_order, trx_ds.hrg_tot, trx_ds.hrg_shipping, trx_ds.hrg_grand, trx_ds.sts_order, trx_ds.sts_bayar, trx_ds.sts_proses, trx_ds.sts_terima, trx_ds.kd_ds FROM ds_customer JOIN trx_ds ON ds_customer.kd_order = trx_ds.kd_order WHERE trx_ds.kd_ds='$_GET[kd_ds]' AND trx_ds.sts_order='1' AND trx_ds.sts_bayar='0'";
$rnew = mysql_query($query_rnew, $hemera) or die(mysql_error());
$row_rnew = mysql_fetch_assoc($rnew);
$totalRows_rnew = mysql_num_rows($rnew);

mysql_select_db($database_hemera, $hemera);
$query_rpayed = "SELECT ds_customer.nm_depan, ds_customer.nm_belakang, ds_customer.alamat, ds_customer.propinsi, ds_customer.kota, ds_customer.kd_pos, ds_customer.no_hp, ds_customer.email, ds_customer.catatan, ds_customer.tgl_in, ds_customer.jam_in, ds_customer.kd_order, trx_ds.hrg_tot, trx_ds.hrg_shipping, trx_ds.hrg_grand, trx_ds.sts_order, trx_ds.sts_bayar, trx_ds.sts_proses, trx_ds.sts_terima, trx_ds.kd_ds FROM ds_customer JOIN trx_ds ON ds_customer.kd_order = trx_ds.kd_order WHERE trx_ds.kd_ds='$_GET[kd_ds]' AND trx_ds.sts_order='1' AND trx_ds.sts_bayar='1'  AND trx_ds.sts_proses='0'";
$rpayed = mysql_query($query_rpayed, $hemera) or die(mysql_error());
$row_rpayed = mysql_fetch_assoc($rpayed);
$totalRows_rpayed = mysql_num_rows($rpayed);

mysql_select_db($database_hemera, $hemera);
$query_rproc = "SELECT ds_customer.nm_depan, ds_customer.nm_belakang, ds_customer.alamat, ds_customer.propinsi, ds_customer.kota, ds_customer.kd_pos, ds_customer.no_hp, ds_customer.email, ds_customer.catatan, ds_customer.tgl_in, ds_customer.jam_in, ds_customer.kd_order, trx_ds.hrg_tot, trx_ds.hrg_shipping, trx_ds.hrg_grand, trx_ds.sts_order, trx_ds.sts_bayar, trx_ds.sts_proses, trx_ds.sts_terima, trx_ds.kd_ds FROM ds_customer JOIN trx_ds ON ds_customer.kd_order = trx_ds.kd_order WHERE trx_ds.kd_ds='$_GET[kd_ds]' AND trx_ds.sts_order='1' AND trx_ds.sts_bayar='1'  AND trx_ds.sts_proses='1'  AND trx_ds.sts_kirim='0'";
$rproc = mysql_query($query_rproc, $hemera) or die(mysql_error());
$row_rproc = mysql_fetch_assoc($rproc);
$totalRows_rproc = mysql_num_rows($rproc);

mysql_select_db($database_hemera, $hemera);
$query_rship = "SELECT ds_customer.nm_depan, ds_customer.nm_belakang, ds_customer.alamat, ds_customer.propinsi, ds_customer.kota, ds_customer.kd_pos, ds_customer.no_hp, ds_customer.email, ds_customer.catatan, ds_customer.tgl_in, ds_customer.jam_in, ds_customer.kd_order, trx_ds.hrg_tot, trx_ds.hrg_shipping, trx_ds.hrg_grand, trx_ds.sts_order, trx_ds.sts_bayar, trx_ds.sts_proses, trx_ds.sts_terima, trx_ds.kd_ds FROM ds_customer JOIN trx_ds ON ds_customer.kd_order = trx_ds.kd_order WHERE trx_ds.kd_ds='$_GET[kd_ds]' AND trx_ds.sts_order='1' AND trx_ds.sts_bayar='1'  AND trx_ds.sts_proses='1'  AND trx_ds.sts_kirim='1'";
$rship = mysql_query($query_rship, $hemera) or die(mysql_error());
$row_rship = mysql_fetch_assoc($rship);
$totalRows_rship = mysql_num_rows($rship);



?>
<script type="text/javascript">
function MM_showHideLayers() { //v9.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) 
  with (document) if (getElementById && ((obj=getElementById(args[i]))!=null)) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}
</script>



            					
<h4 class="onboarding-title">Form Action</h4>
<div class="element-wrapper">
                              <h6 class="element-header">Payment Dropshipper Profit</h6>
                              
                              
  <form action="modul/finance/in_payment_ds.php" method="post" enctype="multipart/form-data" id="fin">
                              <div class="element-box">
                                 <div class="table-responsive">
                                 
                                 <!--<button class="mr-2 mb-2 btn btn-outline-primary" type="button"> NEW ORDER </button>-->
                                 <h5 class="form-header">LIST NEW ORDER </h5>
                                  <div class="table-responsive">
                                 <table id="dataTable1" width="100%" class="table table-striped"><thead><tr>
                                   <th width="2%">No</th>
                                   <th width="22%">KD Order</th>
                                   <th width="20%">Buyer</th>
                                   <th width="17%" class="text-center">Date</th>
                                   <th width="5%" class="text-center">Qty</th>
                                   <th width="11%" class="text-right">H Jual</th>
                                   <th width="11%" class="text-right">Shipping</th>
                                   <th width="12%" class="text-right">H Total</th>
                                 </tr>
                                 </thead><tbody>
                                   <?php $xa=1; $tox=0; $rship=0; $ht=0; ?>
                                   <?php do { ?>
                                   <tr>
                                     <td><?php echo $xa; ?></td>
                                     <td>
                                       <a href="modul/order/detail_order.php?kd_order=<?php echo $row_rnew['kd_order']; ?>" data-target=".bdx-example-modal-lg" data-toggle="modal"><?php echo $row_rnew['kd_order']; ?></a>
                                     </td>
                                     <td>
                                       <?php
									   mysql_select_db($database_hemera, $hemera);
$query_rcus = "SELECT * FROM ds_customer WHERE kd_order='$row_rnew[kd_order]'";
$rcus = mysql_query($query_rcus, $hemera) or die(mysql_error());
$row_rcus = mysql_fetch_assoc($rcus);
$totalRows_rcus = mysql_num_rows($rcus);

mysql_select_db($database_hemera, $hemera);
$query_rqty = "SELECT COUNT(id_) AS jqty FROM trx_ds_detail WHERE kd_order='$row_rnew[kd_order]'";
$rqty = mysql_query($query_rqty, $hemera) or die(mysql_error());
$row_rqty = mysql_fetch_assoc($rqty);
$totalRows_rqty = mysql_num_rows($rqty);
									   ?>
                                       <?php echo $row_rnew['nm_depan']; ?> <?php echo $row_rnew['nm_belakang']; ?><br>
                                     <?php echo $row_rnew['alamat']; ?> 
                                     
                                     
                                     
                                     </td>
                                     <td class="text-center">
                                     <?php echo $row_rnew['tgl_in']; ?></td>
                                     <td class="text-center"><?php echo $row_rqty['jqty']; ?></td>
                                     <td class="text-right"><?php echo number_format($row_rnew['hrg_tot'],0,",","."); ?></td>
                                       <td class="text-right"><?php echo number_format($row_rnew['hrg_shipping'],0,",","."); ?></td>
                                       <td class="text-right"><?php echo number_format($row_rnew['hrg_grand'],0,",","."); ?></td>
                                     </tr>
                                   <?php $xa+=1; $tox+=$row_rnew['hrg_tot']; $rship+=$row_rnew['hrg_shipping']; $ht+=$row_rnew['hrg_grand']; ?>
                                     <?php } while ($row_rnew = mysql_fetch_assoc($rnew)); ?>
                                     <tr>
                                       <td colspan="5">TOTAL</td>
                                       <td class="text-right">IDR <?php echo number_format($tox,0,",","."); ?></td>
                                       <td class="text-right">IDR <?php echo number_format($rship,0,",","."); ?></td>
                                       <td class="text-right">IDR <?php echo number_format($ht,0,",","."); ?></td>
                                   </tr>
                                   </tbody></table>
                                   </div>
                                   
                                   <br>
                                   <h5 class="form-header">LIST PAID ORDER </h5>
                                   <table width="100%" class="table table-striped"><thead><tr>
                                   <th width="2%">No</th>
                                   <th width="22%">KD Order</th>
                                   <th width="20%">Buyer</th>
                                   <th width="17%" class="text-center">Date</th>
                                   <th width="5%" class="text-center">Qty</th>
                                   <th width="11%" class="text-right">H Jual</th>
                                   <th width="11%" class="text-right">Shipping</th>
                                   <th width="12%" class="text-right">H Total</th>
                                 </tr>
                                 </thead><tbody>
                                   <?php $xb=1; $tox=0;  $rship=0; $ht=0; ?>
                                   <?php do { ?>
                                   <tr>
                                     <td><?php echo $xb; ?></td>
                                     <td>
                                     <?php echo $row_rpayed['kd_order']; ?></td>
                                     <td>
                                       <?php
									   mysql_select_db($database_hemera, $hemera);
$query_rcus = "SELECT * FROM ds_customer WHERE kd_order='$row_rnew[kd_order]'";
$rcus = mysql_query($query_rcus, $hemera) or die(mysql_error());
$row_rcus = mysql_fetch_assoc($rcus);
$totalRows_rcus = mysql_num_rows($rcus);

mysql_select_db($database_hemera, $hemera);
$query_rqty = "SELECT COUNT(id_) AS jqty FROM trx_ds_detail WHERE kd_order='$row_rpayed[kd_order]'";
$rqty = mysql_query($query_rqty, $hemera) or die(mysql_error());
$row_rqty = mysql_fetch_assoc($rqty);
$totalRows_rqty = mysql_num_rows($rqty);
									   ?>
                                       <?php echo $row_rpayed['nm_depan']; ?> <?php echo $row_rpayed['nm_belakang']; ?><br>
                                     <?php echo $row_rpayed['alamat']; ?></td>
                                     <td class="text-center"><?php echo $row_rpayed['tgl_in']; ?></td>
                                     <td class="text-center"><?php echo $row_rqty['jqty']; ?></td>
                                     <td class="text-right"><?php echo number_format($row_rpayed['hrg_tot'],0,",","."); ?></td>
                                       <td class="text-right"><?php echo number_format($row_rpayed['hrg_shipping'],0,",","."); ?></td>
                                       <td class="text-right"><?php echo number_format($row_rpayed['hrg_grand'],0,",","."); ?></td>
                                     </tr>
                                   <?php $xb+=1; $tox+=$row_rpayed['hrg_tot'];  $rship+=$row_rpayed['hrg_shipping']; $ht+=$row_rpayed['hrg_grand']; ?>
                                     <?php } while ($row_rpayed = mysql_fetch_assoc($rpayed)); ?>
                                     <tr>
                                       <td colspan="5">TOTAL</td>
                                       <td class="text-right">IDR <?php echo number_format($tox,0,",","."); ?></td>
                                       <td class="text-right">IDR <?php echo number_format($rship,0,",","."); ?></td>
                                       <td class="text-right">IDR <?php echo number_format($ht,0,",","."); ?></td>
                                   </tr>
                                   </tbody></table>
                                   
                                   <br>
                                   <h5 class="form-header">LIST PROCCESED ORDER </h5>
                                   <table width="100%" class="table table-striped"><thead><tr>
                                   <th width="2%">No</th>
                                   <th width="22%">KD Order</th>
                                   <th width="20%">Buyer</th>
                                   <th width="17%" class="text-center">Date</th>
                                   <th width="5%" class="text-center">Qty</th>
                                   <th width="11%" class="text-right">H Jual</th>
                                   <th width="11%" class="text-right">Shipping</th>
                                   <th width="12%" class="text-right">H Total</th>
                                 </tr>
                                 </thead><tbody>
                                   <?php $xc=1; $tox=0;  $rship=0; $ht=0; ?>
                                   <?php do { ?>
                                   <tr>
                                     <td><?php echo $xc; ?></td>
                                     <td>
                                     <?php echo $row_rproc['kd_order']; ?></td>
                                     <td>
                                       <?php
									   mysql_select_db($database_hemera, $hemera);
$query_rcus = "SELECT * FROM ds_customer WHERE kd_order='$row_rnew[kd_order]'";
$rcus = mysql_query($query_rcus, $hemera) or die(mysql_error());
$row_rcus = mysql_fetch_assoc($rcus);
$totalRows_rcus = mysql_num_rows($rcus);

mysql_select_db($database_hemera, $hemera);
$query_rqty = "SELECT COUNT(id_) AS jqty FROM trx_ds_detail WHERE kd_order='$row_rproc[kd_order]'";
$rqty = mysql_query($query_rqty, $hemera) or die(mysql_error());
$row_rqty = mysql_fetch_assoc($rqty);
$totalRows_rqty = mysql_num_rows($rqty);
									   ?>
                                       <?php echo $row_rproc['nm_depan']; ?> <?php echo $row_rproc['nm_belakang']; ?><br>
                                     <?php echo $row_rproc['alamat']; ?></td>
                                     <td class="text-center"><?php echo $row_rproc['tgl_in']; ?></td>
                                     <td class="text-center"><?php echo $row_rqty['jqty']; ?></td>
                                     <td class="text-right"><?php echo number_format($row_rproc['hrg_tot'],0,",","."); ?></td>
                                       <td class="text-right"><?php echo number_format($row_rproc['hrg_shipping'],0,",","."); ?></td>
                                       <td class="text-right"><?php echo number_format($row_rproc['hrg_grand'],0,",","."); ?></td>
                                     </tr>
                                   <?php $xc+=1; $tox+=$row_rproc['hrg_tot'];  $rship+=$row_rproc['hrg_shipping']; $ht+=$row_rproc['hrg_grand']; ?>
                                     <?php } while ($row_rproc = mysql_fetch_assoc($rproc)); ?>
                                     <tr>
                                       <td colspan="5">TOTAL</td>
                                       <td class="text-right">IDR <?php echo number_format($tox,0,",","."); ?></td>
                                       <td class="text-right">IDR <?php echo number_format($rship,0,",","."); ?></td>
                                       <td class="text-right">IDR <?php echo number_format($ht,0,",","."); ?></td>
                                   </tr>
                                   </tbody></table>
                                   
                                    <br>
                                   <h5 class="form-header">LIST SHIPPED ORDER </h5>
                                   <table width="100%" class="table table-striped"><thead><tr>
                                   <th width="2%">No</th>
                                   <th width="22%">KD Order</th>
                                   <th width="20%">Buyer</th>
                                   <th width="17%" class="text-center">Date</th>
                                   <th width="5%" class="text-center">Qty</th>
                                   <th width="11%" class="text-right">H Jual</th>
                                   <th width="11%" class="text-right">Shipping</th>
                                   <th width="12%" class="text-right">H Total</th>
                                 </tr>
                                 </thead><tbody>
                                   <?php $xd=1; $tox=0;  $rship=0; $ht=0; ?>
                                   <?php do { ?>
                                   <tr>
                                     <td><?php echo $xd; ?></td>
                                     <td>
                                     <?php echo $row_rship['kd_order']; ?></td>
                                     <td>
                                       <?php
									   mysql_select_db($database_hemera, $hemera);
$query_rcus = "SELECT * FROM ds_customer WHERE kd_order='$row_rnew[kd_order]'";
$rcus = mysql_query($query_rcus, $hemera) or die(mysql_error());
$row_rcus = mysql_fetch_assoc($rcus);
$totalRows_rcus = mysql_num_rows($rcus);

mysql_select_db($database_hemera, $hemera);
$query_rqty = "SELECT COUNT(id_) AS jqty FROM trx_ds_detail WHERE kd_order='$row_rship[kd_order]'";
$rqty = mysql_query($query_rqty, $hemera) or die(mysql_error());
$row_rqty = mysql_fetch_assoc($rqty);
$totalRows_rqty = mysql_num_rows($rqty);
									   ?>
                                       <?php echo $row_rship['nm_depan']; ?> <?php echo $row_rship['nm_belakang']; ?><br>
                                     <?php echo $row_rship['alamat']; ?></td>
                                     <td class="text-center"><?php echo $row_rship['tgl_in']; ?></td>
                                     <td class="text-center"><?php echo $row_rqty['jqty']; ?></td>
                                     <td class="text-right"><?php echo number_format($row_rship['hrg_tot'],0,",","."); ?></td>
                                       <td class="text-right"><?php echo number_format($row_rship['hrg_shipping'],0,",","."); ?></td>
                                       <td class="text-right"><?php echo number_format($row_rship['hrg_grand'],0,",","."); ?></td>
                                     </tr>
                                   <?php $xd+=1; $tox+=$row_rship['hrg_tot'];  $rship+=$row_rship['hrg_shipping']; $ht+=$row_rship['hrg_grand']; ?>
                                     <?php } while ($row_rship = mysql_fetch_assoc($rship)); ?>
                                     <tr>
                                       <td colspan="5">TOTAL</td>
                                       <td class="text-right">IDR <?php echo number_format($tox,0,",","."); ?></td>
                                       <td class="text-right">IDR <?php echo number_format($rship,0,",","."); ?></td>
                                       <td class="text-right">IDR <?php echo number_format($ht,0,",","."); ?></td>
                                   </tr>
                                   </tbody></table>
                                   </div>
                              </div>
                              </form> 
                             
                                 
</div>

<div class="modal" id="myModal2" data-backdrop="static">
	<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">2nd Modal title</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div><div class="container"></div>
        <div class="modal-body">
          Content for the dialog / modal goes here.
          
        </div>
        
      </div>
    </div>
</div>
            
<?php

mysql_free_result($rnew);
?>
