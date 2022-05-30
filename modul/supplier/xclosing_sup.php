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
$query_rds = "SELECT * FROM dropshiper";
$rds = mysql_query($query_rds, $hemera) or die(mysql_error());
$row_rds = mysql_fetch_assoc($rds);
$totalRows_rds = mysql_num_rows($rds);


mysql_select_db($database_hemera, $hemera);
$query_rcek_sup = "SELECT * FROM suplier WHERE kd_user='$_SESSION[HEM_kd_user]'";
$rcek_sup = mysql_query($query_rcek_sup, $hemera) or die(mysql_error());
$row_rcek_sup = mysql_fetch_assoc($rcek_sup);
$totalRows_rcek_sup = mysql_num_rows($rcek_sup);

$xsds=$_POST['sds'];
$xtgl=$_POST['tgl'];
$xcustomer=$_POST['customer'];

	if ($xsds!="") {$qsds=" AND trx_ds.kd_ds='$xsds'";}
elseif ($xsds=="") {$qsds="";}

	if ($xtgl!="") {$qtgl=" AND trx_ds.tgl_kirim='$xtgl'";}
elseif ($xtgl=="") {$qtgl="";}

	if ($xcustomer!="") {$qcustomer=" AND ds_customer.nm_depan LIKE '%$xcustomer%' OR ds_customer.nm_belakang LIKE '%$xcustomer%'";}
elseif ($xcustomer=="") {$qcustomer="";}

mysql_select_db($database_hemera, $hemera);
$query_rorder = "SELECT
product_master.kd_suplier,
product_master.harga_net,
trx_ds.id_,
trx_ds.kd_ds,
trx_ds.kd_vis,
trx_ds.kd_order,
trx_ds.hrg_tot,
trx_ds.hrg_shipping,
trx_ds.hrg_grand,
trx_ds.tgl_in,
trx_ds.jam_in,
trx_ds.sts_order,
trx_ds.tgl_cbt,
trx_ds.ver_bt_by,
trx_ds.sts_bayar,
trx_ds.alasan_bayar,
trx_ds.tgl_proses,
trx_ds.proses_by,
trx_ds.sts_proses,
trx_ds.alasan_proses,
trx_ds.tgl_kirim,
trx_ds.kirim_by,
trx_ds.sts_kirim,
trx_ds.alasan_kirim,
trx_ds.tgl_terima,
trx_ds.terima_by,
trx_ds.sts_terima,
trx_ds.alasan_terima,
trx_ds.sts_reject,
trx_ds_detail.kd_prod,
trx_ds_detail.nm_prod,
trx_ds_detail.foto_utama,
trx_ds_detail.qty,
trx_ds_detail.hrg_satuan,
trx_ds_detail.hrg_total,
trx_ds_detail.profit,
trx_ds_detail.sts_wd,
trx_ds_detail.wd_by,
trx_ds_detail.tgl_wd,
trx_ds_detail.jam_wd,
ds_customer.nm_depan,
ds_customer.nm_belakang,
ds_customer.alamat
FROM
trx_ds_detail
JOIN trx_ds
ON trx_ds_detail.kd_order = trx_ds.kd_order 
JOIN product_master
ON product_master.kd_product = trx_ds_detail.kd_prod 
JOIN ds_customer
ON ds_customer.kd_order = trx_ds_detail.kd_order
WHERE trx_ds.sts_order='1' AND 
trx_ds.sts_bayar='1' AND trx_ds.sts_proses='1' AND trx_ds.sts_kirim='1' AND product_master.kd_suplier='$row_rcek_sup[kd_suplier]' AND trx_ds.sts_tarik='0'
$qsds $qtgl $qcustomer 
GROUP BY
trx_ds.kd_order
ORDER BY
trx_ds_detail.id_ DESC";
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
<form class="form-inline justify-content-sm-end" id="fsearch" name="fsearch" method="POST" action="index.php?com=xclossing_sup&layout=full">
<!--<select name="sds" class="form-control form-control-sm" id="sds">
  <option value="">Select</option>
  <?php
//do {  
?>
  <option value="<?php //echo $row_rds['kd_dropshiper']?>"><?php //echo $row_rds['nm_toko']?></option>
  <?php
/*} while ($row_rds = mysql_fetch_assoc($rds));
  $rows = mysql_num_rows($rds);
  if($rows > 0) {
      mysql_data_seek($rds, 0);
	  $row_rds = mysql_fetch_assoc($rds);
  }*/
?>
</select>-->

<input name="tgl" type="date" class="form-control form-control-sm" id="tgl" placeholder="tgl"/>
<input name="bt_search" type="submit" class="btn btn-outline-info btn-rounded" style="margin-left:10px;" value="Search"/>

<a href="index.php?com=xclossing_sup&layout=full">
<input name="bt_reload" type="button" class="btn btn-rounded btn-outline-danger" style="margin-left:10px;" value="Reload"/></a>
</form>
</div>
   <h6 class="element-header">List of Closed Order
   
   <!--<a href="?com=add_master_product&layout=full" >
   <button class="mr-2 mb-2 btn btn-outline-primary float-right" type="submit"> Unpublish</button></a>-->
   
   </h6>
   <div class="element-box-tp">
      <div class="table-responsive">
         <form action="modul/supplier/set_saldo.php" method="post" name="fsaldo">
         
         <table width="100%"  class="table table-padded wrap ">
            <thead>
               <tr>
                  <th width="2%" valign="bottom"><input name="cball" type="checkbox"  id="cball"></th>
                  <th width="6%">Action</th>
                  <th width="18%">Order No</th>
                  <th width="19%">Order Date</th>
                  <th width="17%">Customer</th>
                  <th width="20%">Product No</th>
                  <th width="18%"> Price</th>
               </tr>
            </thead>
            <tbody>
			<?php $gt=0; ?>
            
               <?php do { ?>
               <tr>
                   <td class="text-center">
                   <input name="cb[]" type="checkbox" class="form-control" id="cb[]" value="<?php echo $row_rorder['kd_order']; ?>">
                   </td>
                   <td align="center">
                    <a href="javascript:void(0);" data-href="modul/order/detail_order.php?kd_order=<?php echo $row_rorder['kd_order']; ?>" class="btn btn-success btn-sm text-white openPopup" style="width:100px;">Detail</a>
                    <br>
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
                   <strong><span style="color:#6C0"><?php echo $row_rdsx['nm_domain']; ?></span></strong>
                   </td>
                   <td><?php echo $row_rorder['tgl_in']; ?></td>
                   <td><?php echo $row_rorder['nm_depan']; ?> <?php echo $row_rorder['nm_belakang']; ?></td>
                   <td colspan="2">
                   <table width="100%" border="0">
                   <?php
mysql_select_db($database_hemera, $hemera);
$query_rdetpro = "SELECT
product_master.kd_product,
product_master.kd_suplier,
product_master.harga_net,
trx_ds.kd_order
FROM
trx_ds_detail
JOIN trx_ds
ON trx_ds_detail.kd_order = trx_ds.kd_order 
JOIN product_master
ON product_master.kd_product = trx_ds_detail.kd_prod 
JOIN ds_customer
ON ds_customer.kd_order = trx_ds_detail.kd_order WHERE trx_ds.kd_order='$row_rorder[kd_order]'";
$rdetpro = mysql_query($query_rdetpro, $hemera) or die(mysql_error());
$row_rdetpro = mysql_fetch_assoc($rdetpro);
$totalRows_rdetpro = mysql_num_rows($rdetpro);
				   ?>
                   <?php 
				   $z=0;
				   do { ?>
  <tr>
    <td width="47%"><?php echo $row_rdetpro['kd_product']; ?></td>
    <td width="53%"><?php echo number_format($row_rdetpro['harga_net'],0,",","."); ?></td>
    </tr>
    <?php 
	$z+=$row_rdetpro['harga_net'];
	} while ($row_rdetpro = mysql_fetch_assoc($rdetpro)); ?>
  <tr>
    <td style="background-color:#66CC66; color:#fff;">TOTAL</td>
    <td style="background-color:#66CC66; color:#fff;"><?php echo number_format($z,0,",","."); ?>
      <input name="hf_val[]" type="hidden" id="hf_val[]" value="<?php echo $z; ?>" /></td>
  </tr>
    
</table>
                   </td>
                </tr>
                <?php $gt+=$z; ?>
                 <?php } while ($row_rorder = mysql_fetch_assoc($rorder)); ?>
<tr>
              <td class="text-center">&nbsp;</td>
              <td colspan="4" align="left"><span style="font-weight:700; color:#F00;">TOTAL</span>
                
              </td>
              <td colspan="2" align="right"><span style="font-weight:700; color:#F00;">IDR.<?php echo number_format($gt,0,",","."); ?></span>
                
              </td>
              </tr>
            </tbody>
         </table>
         <div class="row">
         <div class="col-10"></div>
         <div class="col-2"><input name="bt_reload" type="submit" class="btn btn-danger btn-rounded float-right" style="margin-left:10px;" value="GET EARNINGS"/></div>
         </div>
         </form>
         
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

