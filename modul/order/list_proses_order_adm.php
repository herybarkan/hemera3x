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

$xsds=$_POST['sds'];
$xtgl=$_POST['tgl'];
$xcustomer=$_POST['customer'];

	if ($xsds!="") {$qsds=" AND trx_ds.kd_ds='$xsds'";}
elseif ($xsds=="") {$qsds="";}

	if ($xtgl!="") {$qtgl=" AND ds_customer.tgl_in='$xtgl'";}
elseif ($xtgl=="") {$qtgl="";}

	if ($xcustomer!="") {$qcustomer=" AND ds_customer.nm_depan LIKE '%$xcustomer%' OR ds_customer.nm_belakang LIKE '%$xcustomer%'";}
elseif ($xcustomer=="") {$qcustomer="";}

mysql_select_db($database_hemera, $hemera);
$query_rorder = "SELECT ds_customer.nm_depan, ds_customer.nm_belakang, ds_customer.alamat, ds_customer.propinsi, ds_customer.kota, ds_customer.kd_pos, ds_customer.no_hp, ds_customer.email, ds_customer.catatan, ds_customer.tgl_in, ds_customer.jam_in, ds_customer.kd_order, trx_ds.hrg_tot, trx_ds.hrg_shipping, trx_ds.hrg_grand, trx_ds.sts_order, trx_ds.sts_bayar, trx_ds.sts_proses, trx_ds.sts_terima, trx_ds.kd_ds FROM ds_customer JOIN trx_ds ON ds_customer.kd_order = trx_ds.kd_order WHERE trx_ds.sts_order='1' AND trx_ds.sts_bayar='1'  AND trx_ds.sts_proses='1'  AND trx_ds.sts_kirim='0'  $qsds $qtgl $qcustomer ORDER BY trx_ds.id_ DESC";
$rorder = mysql_query($query_rorder, $hemera) or die(mysql_error());
$row_rorder = mysql_fetch_assoc($rorder);
$totalRows_rorder = mysql_num_rows($rorder);

mysql_select_db($database_hemera, $hemera);
$query_rds = "SELECT * FROM dropshiper";
$rds = mysql_query($query_rds, $hemera) or die(mysql_error());
$row_rds = mysql_fetch_assoc($rds);
$totalRows_rds = mysql_num_rows($rds);
?>
<script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
</script>


<div class="element-wrapper">
<div class="element-actions">
<form class="form-inline justify-content-sm-end" id="fsearch" name="fsearch" method="POST" action="index.php?com=proses_order_adm&layout=full">
<select name="sds" class="form-control form-control-sm" id="sds">
  <option value="">Select</option>
  <?php
do {  
?>
  <option value="<?php echo $row_rds['kd_dropshiper']?>"><?php echo $row_rds['nm_toko']?></option>
  <?php
} while ($row_rds = mysql_fetch_assoc($rds));
  $rows = mysql_num_rows($rds);
  if($rows > 0) {
      mysql_data_seek($rds, 0);
	  $row_rds = mysql_fetch_assoc($rds);
  }
?>
</select>

<input name="tgl" type="date" class="form-control form-control-sm" id="tgl" placeholder="tgl"/>

<input name="customer" type="text" class="form-control form-control-sm" id="customer" placeholder="customer"/>

<input name="bt_search" type="submit" class="btn btn-grey" style="margin-left:10px;" value="Search"/>

<a href="index.php?com=proses_order_adm&layout=full"><input name="bt_reload" type="button" class="btn btn-success" style="margin-left:10px;" value="Reload"/></a>
</form>
</div>
   <h6 class="element-header">List of Proccessed Order
   
   <!--<a href="?com=add_master_product&layout=full" >
   <button class="mr-2 mb-2 btn btn-outline-primary float-right" type="submit"> Unpublish</button></a>-->
   
   </h6>
   <div class="element-box-tp">
      <div class="table-responsive">
         <table width="100%"  class="table table-padded wrap ">
            <thead>
               <tr>
                  <th width="2%"></th>
                  <th width="10%">KD Order</th>
                  <th width="8%">Order Date</th>
                  <th width="12%">Customer</th>
                  <th width="20%">Address</th>
                  <th width="6%">Qty</th>
                  <th width="10%"> Price</th>
                  <th width="12%"> Shipping</th>
                  <th width="10%">Total Price</th>
                  <th width="10%">Actions</th>
               </tr>
            </thead>
            <tbody>
               <?php do { ?>
               <tr>
                   <td class="text-center">
                   <input name="cb[]" type="checkbox" class="form-control" id="cb[]" value="<?php echo $row_rprod['kd_product']; ?>">
                   </td>
                   <td>
                   <span class="onboarding-media">
				   <?php echo $row_rorder['kd_order']; ?>
                   </span>
                   <?php
mysql_select_db($database_hemera, $hemera);
$query_rdsx = "SELECT * FROM dropshiper WHERE kd_dropshiper='$row_rorder[kd_ds]'";
$rdsx = mysql_query($query_rdsx, $hemera) or die(mysql_error());
$row_rdsx = mysql_fetch_assoc($rdsx);
$totalRows_rdsx = mysql_num_rows($rdsx);

mysql_select_db($database_hemera, $hemera);
$query_rqty = "SELECT COUNT(id_) AS jqty FROM trx_ds_detail WHERE kd_order='$row_rorder[kd_order]'";
$rqty = mysql_query($query_rqty, $hemera) or die(mysql_error());
$row_rqty = mysql_fetch_assoc($rqty);
$totalRows_rqty = mysql_num_rows($rqty);
				   ?>
                   <strong><span style="color:#6C0"><?php echo $row_rdsx['nm_toko']; ?></span></strong>
                   </td>
                   <td><?php echo $row_rorder['tgl_in']; ?></td>
                   <td><?php echo $row_rorder['nm_depan']; ?> <?php echo $row_rorder['nm_belakang']; ?></td>
                   <td><?php echo $row_rorder['alamat']; ?></td>
                   <td><?php echo $row_rqty['jqty']; ?></td>
                   <td class="text-center">IDR <?php echo number_format($row_rorder['hrg_tot'],0,",","."); ?></td>
                   <td>IDR 
                   <?php echo number_format($row_rorder['hrg_shipping'],0,",","."); ?></td>
                   <td>IDR <?php echo number_format($row_rorder['hrg_grand'],0,",","."); ?></td>
                   <td >
                   
                   
                    
                    <a href="javascript:void(0);" data-href="modul/order/detail_order.php?kd_order=<?php echo $row_rorder['kd_order']; ?>" class="btn btn-success btn-sm text-white openPopup" style="width:100px;">Detail</a>
                    <br>
                     <!--<a href="javascript:void(0);" data-href="modul/order/cek_proses_order.php?kd_order=<?php //echo $row_rorder['kd_order']; ?>" class="btn btn-danger btn-sm text-red openPopup"  style="width:100px;">Label</a>-->
                     
                     <a href="#" onclick="MM_openBrWindow('modul/order/label.php?kd_order=<?php echo $row_rorder['kd_order']; ?>','label','toolbar=yes,menubar=yes,resizable=yes,width=500,height=650')" class="btn btn-danger btn-sm text-red" style="width:100px;">Label</a>
                     <!--<br>
                     <a href="#" onclick="MM_openBrWindow('modul/order/receipt.php?kd_order=<?php //echo $row_rorder['kd_order']; ?>','label','toolbar=yes,menubar=yes,resizable=yes,width=900,height=1000')" class="btn btn-danger btn-sm text-red" style="width:100px;">Receipt</a>-->
                     
                     <br>
                     <a href="#" onclick="MM_openBrWindow('modul/order/label_delivery.php?kd_order=<?php echo $row_rorder['kd_order']; ?>','label','toolbar=yes,menubar=yes,resizable=yes,width=500,height=650')" class="btn btn-info btn-sm text-red" style="width:100px;">Delivery</a>
                     <br>
                     <a href="javascript:void(0);" data-href="modul/order/cek_shipping_order.php?kd_order=<?php echo $row_rorder['kd_order']; ?>" class="btn btn-warning btn-sm text-red openPopup" style="width:100px;">Shipping</a>
                    
                    
                    
                                 
                   </td>
                </tr>
                 <?php } while ($row_rorder = mysql_fetch_assoc($rorder)); ?>
               
            </tbody>
         </table>
         
        <!--<a href="?com=add_master_product&layout=full" ><button class="mr-2 mb-2 btn btn-outline-primary float-right" type="submit"> Unpublish</button></a>-->
      </div>
   </div>
</div>

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
<?php
mysql_free_result($rorder);
?>