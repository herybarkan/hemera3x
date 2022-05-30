<?php require_once('Connections/hemera.php'); ?>
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
$query_rorder = "SELECT product_master.nm_product, product_master.harga_net,SUM(product_master.harga_net) AS thawal,  SUM(trx_ds_detail.qty) AS qty, trx_ds_detail.foto_utama, trx_ds_detail.hrg_satuan, trx_ds_detail.hrg_total, trx_ds.kd_ds, trx_ds.hrg_tot, trx_ds.kd_order, trx_ds.tgl_in, trx_ds.hrg_shipping, trx_ds.hrg_grand, ds_customer.nm_depan, ds_customer.nm_belakang, ds_customer.alamat, ds_customer.propinsi, ds_customer.kota, dropshiper.nm_domain FROM product_master JOIN trx_ds_detail ON product_master.kd_product = trx_ds_detail.kd_prod JOIN trx_ds ON trx_ds_detail.kd_order = trx_ds.kd_order JOIN ds_customer ON trx_ds.kd_order = ds_customer.kd_order JOIN dropshiper ON dropshiper.kd_dropshiper = trx_ds.kd_ds WHERE trx_ds.kd_ds='$_SESSION[HEM_kd_ds]' AND trx_ds.sts_order='1' AND trx_ds.sts_bayar='1' AND trx_ds.sts_proses='1' AND trx_ds.sts_kirim='1' GROUP BY trx_ds.kd_order  ORDER BY trx_ds.id_ DESC";
$rorder = mysql_query($query_rorder, $hemera) or die(mysql_error());
$row_rorder = mysql_fetch_assoc($rorder);
$totalRows_rorder = mysql_num_rows($rorder);
?>

<form action="modul/dropshipper/ed_unpublish_product.php" method="post" name="fselect">
<div class="element-wrapper">
   <h6 class="element-header">List of Closed Transaction
   
   <!--<a href="?com=add_master_product&layout=full" >
   <button class="mr-2 mb-2 btn btn-outline-primary float-right" type="submit"> Unpublish</button></a>-->
   
   </h6>
   <div class="element-box-tp">
      <div class="table-responsive">
         <table width="100%"  class="table table-padded">
            <thead>
               <tr>
                  <th width="10%">KD Order</th>
                  <th width="8%">Order Date</th>
                  <th width="26%">Customer</th>
                  <th width="4%">Qty</th>
                  <th width="14%">@ Hrg Awal</th>
                  <th width="14%">Tot Hrg Awal</th>
                  <th width="14%">@ Hrg Markup</th>
                  <th width="12%"> Hrg Jual</th>
                  <th width="12%">Ongkir</th>
                  <th width="12%">Hrg Total</th>
                  <th width="14%">Margin</th>
               </tr>
            </thead>
            <tbody>
            <?php $xqty=0; $xa=0; $xb=0; $xc=0 ?>
               <?php do { ?>
               <?php
mysql_select_db($database_hemera, $hemera);
$query_rqty = "SELECT COUNT(id_) AS jqty FROM trx_ds_detail WHERE kd_order='$row_rorder[kd_order]'";
$rqty = mysql_query($query_rqty, $hemera) or die(mysql_error());
$row_rqty = mysql_fetch_assoc($rqty);
$totalRows_rqty = mysql_num_rows($rqty);

mysql_select_db($database_hemera, $hemera);
$query_rharga = "SELECT SUM(product_master.harga_net) AS harga_net, trx_ds_detail.kd_order FROM product_master JOIN trx_ds_detail ON product_master.kd_product = trx_ds_detail.kd_prod WHERE trx_ds_detail.kd_order='$row_rorder[kd_order]'";
$rharga = mysql_query($query_rharga, $hemera) or die(mysql_error());
$row_rharga = mysql_fetch_assoc($rharga);
$totalRows_rharga = mysql_num_rows($rharga);
			   ?>
               <tr>
                   <td>
                   <span class="onboarding-media">
				   <?php echo $row_rorder['kd_order']; ?>
                   </span>
                    <a href="javascript:void(0);" data-href="modul/order/detail_order.php?kd_order=<?php echo $row_rorder['kd_order']; ?>" class="btn btn-success btn-sm text-white openPopup" style="width:100px;">Detail</a>
                 
                   </td>
                   <td><?php echo $row_rorder['tgl_in']; ?></td>
                   <td><?php echo $row_rorder['nm_depan']; ?> <?php echo $row_rorder['nm_belakang']; ?></td>
                   <td><?php echo $row_rorder['qty']; ?></td>
                   <td>IDR <?php 
				   $hrg_hemera=$row_rorder['harga_net'];
				   echo number_format($hrg_hemera,0,",","."); ?></td>
                   <td class="text-center">IDR <?php echo number_format($row_rorder['thawal'],0,",","."); ?></td>
                   <td class="text-center">IDR <?php echo number_format($row_rorder['hrg_total'],0,",","."); ?></td>
                   <td class="text-center">IDR <?php echo number_format($row_rorder['hrg_tot'],0,",","."); ?></td>
                   <td class="text-center">IDR <?php echo number_format($row_rorder['hrg_shipping'],0,",","."); ?></td>
                   <td class="text-center">IDR <?php echo number_format($row_rorder['hrg_grand'],0,",","."); ?></td>
                   <td>IDR 
				   <?php 
				   $margin=$row_rorder['hrg_tot']-$row_rorder['thawal'];
				   echo number_format($margin,0,",","."); ?></td>
                </tr>
               <?php $xqty+=$row_rqty['jqty']; $xa+=$hrg_hemera; $xb+=$row_rorder['hrg_tot']; $xc+=$margin ?>
                 <?php } while ($row_rorder = mysql_fetch_assoc($rorder)); ?>
               <tr>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td><span style="font-weight:900;"><?php echo number_format($xqty,0,",","."); ?></td>
                 <td><span style="font-weight:900;"><?php echo number_format($xa,0,",","."); ?></td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td><span style="font-weight:900;"><?php echo number_format($xb,0,",","."); ?></td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td><span style="font-weight:900;"><?php echo number_format($xc,0,",","."); ?></td>
               </tr>
            </tbody>
         </table>
         
        <!--<a href="?com=add_master_product&layout=full" ><button class="mr-2 mb-2 btn btn-outline-primary float-right" type="submit"> Unpublish</button></a>-->
      </div>
   </div>
</div>
</form>

<div class="onboarding-modal modal fade animated" id="myModal" role="dialog">
    <div class="modal-dialog modal-xl modal-centered">
    	<div class="modal-content">
        	<!--<div class="onboarding-side-by-side">
                <div class="onboarding-media"><img alt="" src="img/bigicon5.png" width="200px"></div>
                	<div class="onboarding-content with-gradient">-->
                    	
            					<div class="modal-body">

            					</div>
            		<!--</div>
            </div>
        </div>-->
        </div>
    </div>
</div>
<?php
mysql_free_result($rorder);
?>