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
$query_rsup = "SELECT * FROM suplier WHERE kd_user='$_SESSION[HEM_kd_user]'";
$rsup = mysql_query($query_rsup, $hemera) or die(mysql_error());
$row_rsup = mysql_fetch_assoc($rsup);
$totalRows_rsup = mysql_num_rows($rsup);

mysql_select_db($database_hemera, $hemera);
$query_rorder = "SELECT product_master.kd_product, product_master.nm_product,  product_master.kd_suplier,  product_master.kd_warna,  product_master.kd_size,  product_master.sku,  product_master.foto_utama,  product_master.aktif,   trx_ds_detail.qty, trx_ds_detail.hrg_satuan, trx_ds.kd_order,  trx_ds.id_,  trx_ds.tgl_in,  trx_ds.sts_bayar  FROM trx_ds_detail JOIN product_master ON trx_ds_detail.kd_prod = product_master.kd_product  JOIN trx_ds ON trx_ds_detail.kd_order = trx_ds.kd_order WHERE product_master.kd_suplier='$row_rsup[kd_suplier]' AND trx_ds.sts_bayar='1' ";
$rorder = mysql_query($query_rorder, $hemera) or die(mysql_error());
$row_rorder = mysql_fetch_assoc($rorder);
$totalRows_rorder = mysql_num_rows($rorder);


?>

<form action="modul/dropshipper/ed_unpublish_product.php" method="post" name="fselect">
<div class="element-wrapper">
   <h6 class="element-header"> Product Sold Report
   
   <!--<a href="?com=add_master_product&layout=full" >
   <button class="mr-2 mb-2 btn btn-outline-primary float-right" type="submit"> Unpublish</button></a>-->
   
   </h6>
   <div class="element-box-tp">
      <div class="table-responsive">
         <table width="100%"  class="table table-padded">
            <thead>
               <tr>
                  <th width="10%">Action</th>
                  <th width="11%">Product Name</th>
                  <th width="17%">Color</th>
                  <th width="13%">Size</th>
                  <th width="9%">Qty</th>
                  <th width="9%">Nominal</th>
                  <th width="11%">Date Sold</th>
               </tr>
            </thead>
            <tbody>
            <?php $xqty=0; $xa=0; $xb=0; $xc=0; $hrg=0;?>
               <?php do { ?>
               <?php
mysql_select_db($database_hemera, $hemera);
$query_rcolor = "SELECT * FROM product_color WHERE kd_color='$row_rorder[kd_warna]'";
$rcolor = mysql_query($query_rcolor, $hemera) or die(mysql_error());
$row_rcolor = mysql_fetch_assoc($rcolor);
$totalRows_rcolor = mysql_num_rows($rcolor);


mysql_select_db($database_hemera, $hemera);
$query_rsize = "SELECT * FROM product_size WHERE kd_size='$row_rorder[kd_size]'";
$rsize = mysql_query($query_rsize, $hemera) or die(mysql_error());
$row_rsize = mysql_fetch_assoc($rsize);
$totalRows_rsize = mysql_num_rows($rsize);

mysql_select_db($database_hemera, $hemera);
$query_rqty = "SELECT SUM(qty) AS jqty FROM trx_ds_detail WHERE kd_prod='$row_rorder[kd_product]' AND kd_order='$row_rorder[kd_order]'";
$rqty = mysql_query($query_rqty, $hemera) or die(mysql_error());
$row_rqty = mysql_fetch_assoc($rqty);
$totalRows_rqty = mysql_num_rows($rqty);


			   ?>
               <tr>
                   <td>
                   <span class="onboarding-media">
				   <?php echo $row_rorder['kd_order']; ?>
                   </span>
                    <a href="javascript:void(0);" data-href="modul/order/detail_order.php?kd_order=<?php echo $row_rorder['kd_order']; ?>" class="btn btn-success btn-sm text-white openPopup" style="width:100px;">Detail</a>
                 
                   </td>
                   <td><p><?php echo $row_rorder['sku']; ?><?php echo $row_rorder['nm_product']; ?></p></td>
                   <td><?php echo $row_rcolor['nm_color']; ?></td>
                   <td><?php echo $row_rsize['nm_size']; ?></td>
                   <td><?php echo $row_rqty['jqty']; ?></td>
                   <td><?php echo $row_rorder['hrg_satuan']; ?></td>
                   <td class="text-center"><?php echo $row_rorder['tgl_in']; ?></td>
                </tr>
               <?php $xqty+=$row_rorder['qty']; $hrg+=$row_rorder['hrg_satuan']; ?>
                 <?php } while ($row_rorder = mysql_fetch_assoc($rorder)); ?>
               <tr>
                 <td colspan="4"><span style="font-weight:700; color:#F00;">TOTAL</span></td>
                 <td><span style="font-weight:900;"><span style="font-weight:700; color:#F00;"><?php echo number_format($xqty,0,",","."); ?></span></td>
                 <td><span style="font-weight:700; color:#F00;"><?php echo number_format($hrg,0,",","."); ?></span></td>
                 <td>&nbsp;</td>
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

mysql_free_result($rqty);

mysql_free_result($rsup);
?>