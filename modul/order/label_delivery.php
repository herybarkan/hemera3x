<?php require_once('../../Connections/hemera.php'); ?>
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
$query_rcus = "SELECT ds_customer.id_, ds_customer.kd_ds, ds_customer.kd_order, ds_customer.nm_depan, ds_customer.nm_belakang, ds_customer.alamat, ds_customer.propinsi, ds_customer.kota, ds_customer.kd_pos, ds_customer.no_hp, ds_customer.email, ds_customer.cb_member, ds_customer.catatan, trx_ds.hrg_tot, trx_ds.hrg_shipping, trx_ds.hrg_grand, trx_ds.tgl_in, trx_ds.jam_in, trx_ds.sts_order, trx_ds_bt.rek_hemera, trx_ds_bt.rek_customer, trx_ds_bt.bank_customer, trx_ds_bt.atas_nama, trx_ds_bt.tgl_trf, trx_ds_bt.nominal, trx_ds_bt.bukti_trf, trx_ds_bt.catatan AS catatan_0,trx_ds.tgl_kirim, trx_ds.tgl_proses FROM ds_customer JOIN trx_ds ON ds_customer.kd_order = trx_ds.kd_order  JOIN trx_ds_bt ON trx_ds_bt.kd_order = ds_customer.kd_order WHERE ds_customer.kd_order='$_GET[kd_order]'";
$rcus = mysql_query($query_rcus, $hemera) or die(mysql_error());
$row_rcus = mysql_fetch_assoc($rcus);
$totalRows_rcus = mysql_num_rows($rcus);

mysql_select_db($database_hemera, $hemera);
$query_rds = "SELECT * FROM dropshiper WHERE kd_dropshiper='$row_rcus[kd_ds]'";
$rds = mysql_query($query_rds, $hemera) or die(mysql_error());
$row_rds = mysql_fetch_assoc($rds);
$totalRows_rds = mysql_num_rows($rds);

mysql_select_db($database_hemera, $hemera);
$query_rnew = "SELECT ds_customer.nm_depan, ds_customer.nm_belakang, ds_customer.alamat, ds_customer.kota, ds_customer.no_hp, ds_customer.kd_order, trx_ds.sts_bayar, trx_ds.sts_proses, trx_ds.sts_terima, trx_ds.kd_ds, trx_ds_detail.nm_prod, trx_ds_detail.foto_utama, trx_ds_detail.qty, trx_ds_detail.hrg_satuan, trx_ds_detail.hrg_total, trx_ds_detail.sts_wd, trx_ds.sts_order, product_master.kd_warna, product_master.kd_size, product_master.harga, product_master.diskon, product_master.harga_net, product_master.kd_product FROM ds_customer JOIN trx_ds ON ds_customer.kd_order = trx_ds.kd_order  JOIN trx_ds_detail ON trx_ds_detail.kd_order = trx_ds.kd_order  JOIN product_master ON product_master.kd_product = trx_ds_detail.kd_prod  WHERE trx_ds_detail.kd_order='$_GET[kd_order]'";
$rnew = mysql_query($query_rnew, $hemera) or die(mysql_error());
$row_rnew = mysql_fetch_assoc($rnew);
$totalRows_rnew = mysql_num_rows($rnew);

mysql_select_db($database_hemera, $hemera);
$query_rongkir = "SELECT * FROM trx_ds WHERE kd_order='$_GET[kd_order]'";
$rongkir = mysql_query($query_rongkir, $hemera) or die(mysql_error());
$row_rongkir = mysql_fetch_assoc($rongkir);
$totalRows_rongkir = mysql_num_rows($rongkir);


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>label_post</title>


<body>
<table width="90%" height="251"  border="0" align="center" bordercolor="#131313"  background="">
  <tbody>
    <tr>
      <td width="728" height="112" bordercolor="#131313" border="1">
	  
        <?php echo $row_rds['nm_domain']; ?><br>
        <?php echo $row_rds['kd_dropshiper']; ?><br>
        JAKARTA<br>
        <?php echo $row_rds['email_toko']; ?><br>
        <?php echo $row_rds['hp_toko']; ?><br>
      </td>
      <td width="301" height="112" colspan="2" bordercolor="#131313" border="1">
	  TO <br>
      <strong><?php echo $row_rcus['nm_depan']; ?> <?php echo $row_rcus['nm_belakang']; ?></strong><br>
	  <strong> <?php echo $row_rcus['email']; ?></strong><br>
	  <strong> <?php echo $row_rcus['no_hp']; ?></strong><br>
		<strong><?php echo $row_rcus['alamat']; ?> <?php echo $row_rcus['kota']; ?>, <?php echo $row_rcus['propinsi']; ?></strong><br>
        <?php
		$nmx=$row_rcus['nm_depan']." ".$row_rcus['nm_belakang']."  ".$row_rcus['alamat']." ".$row_rcus['kota']." ".$row_rcus['propinsi'];
		?>
        </td>
    </tr>
    
    <tr>
      <td height="122" colspan="2" valign="top" bordercolor="#131313" border="1">
      ORDER NO : <?php echo $row_rnew['kd_order']; ?>
      <table width="100%" border="1" cellpadding="3" cellspacing="0">
        <tr>
          <td width="4%" height="40">No</td>
          <td width="57%" height="40">Product Name</td>
          <td width="3%" height="40">Qty</td>
          <td width="18%" height="40" align="right">Price</td>
          <td width="18%" height="40" align="right">Total Price</td>
        </tr>
        <?php $x=1; $xqty=0; $p1=0; $p2=0; ?>
        <?php do { ?>
          <tr>
            <td><?php echo $x; ?></td>
            <td><?php echo $row_rnew['nm_prod']; ?> 
             <?php 
					 mysql_select_db($database_hemera, $hemera);
$query_rwr = "SELECT * FROM product_color WHERE kd_color='$row_rnew[kd_warna]'";
$rwr = mysql_query($query_rwr, $hemera) or die(mysql_error());
$row_rwr = mysql_fetch_assoc($rwr);
$totalRows_rwr = mysql_num_rows($rwr);

mysql_select_db($database_hemera, $hemera);
$query_rsz = "SELECT * FROM product_size WHERE kd_size='$row_rnew[kd_size]'";
$rsz = mysql_query($query_rsz, $hemera) or die(mysql_error());
$row_rsz = mysql_fetch_assoc($rsz);
$totalRows_rsz = mysql_num_rows($rsz);

					 echo $row_rwr['nm_color']." - ".$row_rsz['nm_size']; ?></td>
            <td align="center"><?php echo $row_rnew['qty']; ?></td>
            <td align="right"><?php echo number_format($row_rnew['hrg_satuan'],0,",","."); ?></td>
            <td align="right"><?php echo number_format($row_rnew['hrg_total'],0,",","."); ?></td>
          </tr>
          
          <?php $x+=1; $xqty+=$row_rnew['qty']; $p1+=$row_rnew['hrg_satuan']; $p2+=$row_rnew['hrg_total']; ?>
          <?php } while ($row_rnew = mysql_fetch_assoc($rnew)); ?>
          <tr>
            <td colspan="2" rowspan="3">&nbsp;</td>
            <td colspan="2" align="center">Ongkir</td>
            <td align="right"><?php echo number_format($row_rongkir['hrg_shipping'],0,",","."); ?></td>
          </tr>
          <tr>
            <td colspan="2" align="center">Asuransi</td>
            <td align="right">0</td>
          </tr>
          <tr>
            <td colspan="2" align="center">Pajak</td>
            <td align="right">0</td>
          </tr>
          <tr>
            <td colspan="2">TOTAL</td>
            <?php $gtotal=$p2+$row_rongkir['hrg_shipping']; ?>
            <td align="center"><?php echo number_format($xqty,0,",","."); ?></td>
            <td align="right"><?php echo number_format($p1,0,",","."); ?></td>
            <td align="right"><?php echo number_format($gtotal,0,",","."); ?></td>
          </tr>
      </table></td>
    </tr>
    
  </tbody>
</table>
</body>
</html>
<?php
mysql_free_result($rnew);
?>
