<?php require_once('../../Connections/hemera.php'); ?>
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
$query_rinc = "SELECT  * FROM income_supplier  WHERE kd_income='$_GET[kd_income]'";
$rinc = mysql_query($query_rinc, $hemera) or die(mysql_error());
$row_rinc = mysql_fetch_assoc($rinc);
$totalRows_rinc = mysql_num_rows($rinc);



?>
<div style="overflow:scroll; height:600px;">
<?php
$var = $row_rinc['kd_order'];
$array = explode(',', $var);
foreach ($array as $values)
{
//echo $values."<br>";

mysql_select_db($database_hemera, $hemera);
$query_rnew = "SELECT  ds_customer.nm_depan,  ds_customer.nm_belakang,  ds_customer.alamat,  ds_customer.kota,  ds_customer.no_hp,  ds_customer.kd_order,  trx_ds.sts_bayar,  trx_ds.sts_proses,  trx_ds.sts_terima,  trx_ds.kd_ds,  trx_ds_detail.nm_prod,  trx_ds_detail.foto_utama,  trx_ds_detail.qty,  trx_ds_detail.hrg_satuan,  trx_ds_detail.hrg_total,  trx_ds_detail.sts_wd,  trx_ds.sts_order,  product_master.harga,  product_master.diskon,  product_master.harga_net,  product_master.kd_product,  product_master.kd_warna,  product_master.kd_size,  product_master.sku,  product_color.nm_color,  product_size.nm_size  FROM ds_customer  JOIN trx_ds ON ds_customer.kd_order = trx_ds.kd_order   JOIN trx_ds_detail ON trx_ds_detail.kd_order = trx_ds.kd_order   JOIN product_master ON product_master.kd_product = trx_ds_detail.kd_prod   JOIN product_color ON product_color.kd_color = product_master.kd_warna   JOIN product_size ON product_size.kd_size = product_master.kd_size  WHERE trx_ds_detail.kd_order='$values'";
$rnew = mysql_query($query_rnew, $hemera) or die(mysql_error());
$row_rnew = mysql_fetch_assoc($rnew);
$totalRows_rnew = mysql_num_rows($rnew);

//===============================================================
?>

<h5 class="form-header">LIST ORDER <span class="float-right"><?php echo $row_rnew['kd_order']; ?></span></h5>

                                  <div class="table-responsive">
                                 <table id="dataTable1" width="100%" class="table table-striped"><thead><tr>
                                   <th width="3%">No</th>
                                   <th width="10%">Image</th>
                                   <th width="25%">Product</th>
                                   <th width="16%">Buyer</th>
                                   <th width="6%" class="text-center">Qty</th>
                                   <th width="13%" class="text-right">Hrg Supplier</th>
                                   <th width="14%" class="text-right">H Jual</th>
                                   <th width="13%" class="text-right">H Total</th>
                                 </tr>
                                 </thead><tbody>
                                   <?php $xa=1; $hhem=0; $hjual=0; $ht=0; ?>
                                   <?php do { ?>
                                   <tr>
                                     <td><?php echo $xa; ?></td>
                                     <td><img alt="" src="foto/product/<?php echo $row_rnew['foto_utama']; ?>" width="80"></td>
                                     <td><?php echo $row_rnew['nm_prod']; ?><?php echo $row_rnew['sku']; ?><br />
                                       <?php echo $row_rnew['nm_color']; ?> - <?php echo $row_rnew['nm_size']; ?><br />                                       
                                     <br /></td>
                                     <td><?php echo $row_rnew['nm_depan']; ?> <?php echo $row_rnew['nm_belakang']; ?>
                                     <?php echo $row_rnew['alamat']; ?></td>
                                     <td class="text-center"><?php echo $row_rnew['qty']; ?></td>
                                     <td class="text-right"><?php echo number_format($row_rnew['harga_net'],0,",","."); ?></td>
                                       <td class="text-right"><?php echo number_format($row_rnew['hrg_satuan'],0,",","."); ?></td>
                                       <td class="text-right"><?php echo number_format($row_rnew['hrg_total'],0,",","."); ?></td>
                                     </tr>
                                   <?php $xa+=1; $hjual+=$row_rnew['hrg_satuan']; $ht+=$row_rnew['hrg_total']; $hhem+=$row_rnew['harga_net']; ?>
                                     <?php } while ($row_rnew = mysql_fetch_assoc($rnew)); ?>
                                     <tr>
                                       <td colspan="5">TOTAL</td>
                                       <td class="text-right">IDR <?php echo number_format($hhem,0,",","."); ?></td>
                                       <td class="text-right">IDR <?php echo number_format($hjual,0,",","."); ?></td>
                                       <td class="text-right">IDR <?php echo number_format($ht,0,",","."); ?></td>
                                   </tr>
                                   </tbody></table>
                                   </div>
                                   <br><br>
                                   

<?php
//===============================================================
}
?>
</div>            					


                                   
            
<?php

mysql_free_result($rnew);
?>
