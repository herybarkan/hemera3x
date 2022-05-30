<?php require_once('../../Connections/hemera.php'); ?>
<?php

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

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>label_post</title>
<style type="text/css">
.name_big {
	font-family: Consolas, Andale Mono, Lucida Console, Lucida Sans Typewriter, Monaco, Courier New, monospace;
}
</style>
</head>
	<style>
		.origin {
			margin-bottom: 5px;
			margin-top: 5px;
			margin-left: 5px;
		}	
		.data_ship {
			margin-bottom: 5px;
			margin-top: 5px;
			margin-left: 5px;
		}
    .origin p {
	font-size: 12px;
    line-height: 4px;
	margin-top: 2px;
	margin-bottom: 8px;
}
	.data_ship p {
	color: #FFFFFF;
    font-size: 12px;
	line-height: 4px;
	margin-top: 2px;
	margin-bottom: 8px;
		}
		.name_del{
		 position: relative;
         bottom: 5px;
		 left: 5px;
		 font-size: 14px;
		}
		.name_big{
		 position: relative;
         left: 15px;
         bottom: 10px;
		 font-size: 22px;
		}
		.name_shipment{
		 position: relative;
         left: 15px;
         bottom: 15px;
		 font-size: 22px;
		}
		.name_tel{
		 position: relative;
         left: 15px;
         bottom: 15px;
		 font-size: 22px;
		}
		.name_adr{
		 position: relative;
         left: 15px;
         bottom: 15px;
		 font-size: 16px;
		}
		.podval{
		display: inline-block;
		position: relative;
        bottom: 10px;
		}
		.left_podval{
			display: inline-block;
			font-size: 32px;
			margin-left: 7px;
		}
		.right_podval{
		font-size: 16px;
		margin-left: 12px;	
		}
    .name_shipment {
	font-family: Consolas, Andale Mono, Lucida Console, Lucida Sans Typewriter, Monaco, Courier New, monospace;
}
    .origin p {
	font-family: Consolas, Andale Mono, Lucida Console, Lucida Sans Typewriter, Monaco, Courier New, monospace;
}
    .data_ship p {
	font-family: Consolas, Andale Mono, Lucida Console, Lucida Sans Typewriter, Monaco, Courier New, monospace;
}
    .name_tel {
	font-family: Consolas, Andale Mono, Lucida Console, Lucida Sans Typewriter, Monaco, Courier New, monospace;
}
    .podval .left_podval {
	font-family: Consolas, Andale Mono, Lucida Console, Lucida Sans Typewriter, Monaco, Courier New, monospace;
}
    .podval .right_podval {
	font-family: Consolas, Andale Mono, Lucida Console, Lucida Sans Typewriter, Monaco, Courier New, monospace;
}
    .name_adr {
	font-family: Consolas, Andale Mono, Lucida Console, Lucida Sans Typewriter, Monaco, Courier New, monospace;
}
    </style>	

<body>
<table width="409" height="539"  border="1"  background="" bordercolor="#131313">
  <tbody>
    <tr>
      <td width="256" height="76" bordercolor="#131313" border="1">
	  <div class="origin">
        <p><?php echo $row_rds['nm_domain']; ?></p>
        <p><?php echo $row_rds['kd_dropshiper']; ?></p>
        <p>JAKARTA</p>
        <p><?php echo $row_rds['email_toko']; ?></p>
        <p><?php echo $row_rds['hp_toko']; ?></p>
      </div></td>
      <td width="137" border="1" bordercolor="#131313" bgcolor="#000000">
		  <div class="data_ship">
		    <p>SHP DATE: <?php echo $row_rcus['tgl_proses']; ?></p>
		    <p>ACTWGT: 1.00LB</p>
		    <p>CAD 1189W9500045LB01</p>
		    <p><strong>BILL: SENDER</strong></p>
		  </div>
	  </td>
    </tr>
    <tr>
      <td height="120" colspan="2" border="1" bordercolor="#131313">
	  <div class="name_del">TO</div>
      <div class="name_big"><strong><?php echo $row_rcus['nm_depan']; ?> <?php echo $row_rcus['nm_belakang']; ?></strong></div>
	  <div class="name_shipment"><strong> <?php echo $row_rcus['email']; ?></strong></div>
	  <div class="name_tel"><strong> <?php echo $row_rcus['no_hp']; ?></strong></div>
		<div class="name_adr"><strong><?php echo $row_rcus['alamat']; ?> <?php echo $row_rcus['kota']; ?>, <?php echo $row_rcus['propinsi']; ?></strong></div>
        <?php
		$nmx=$row_rcus['nm_depan']." ".$row_rcus['nm_belakang']."  ".$row_rcus['alamat']." ".$row_rcus['kota']." ".$row_rcus['propinsi'];
		?>
        </td>
    </tr>
    <tr>
      <td height="122" colspan="2" border="1" bordercolor="#131313">
		 <div class="bar_image"> 
		  <!--<img src="https://user-images.githubusercontent.com/1025588/31506377-88f45d4c-af77-11e7-9604-9d8035a56654.png" alt="" width="297" height="118" align="middle"/>-->
          <?php

 include "qrcode/qrlib.php"; 
  $tempdir = "temp/"; //Nama folder tempat menyimpan file qrcode
    if (!file_exists($tempdir)) //Buat folder bername temp
    mkdir($tempdir);

    //ambil logo
    $logopath="https://cdn.pixabay.com/photo/2018/05/08/18/25/facebook-3383596_960_720.png";

 //isi qrcode jika di scan
 $codeContents = $nmx; 

 //simpan file qrcode
 QRcode::png($codeContents, $tempdir.'qrwithlogo.png', QR_ECLEVEL_H, 10,4);


 // ambil file qrcode
 $QR = imagecreatefrompng($tempdir.'qrwithlogo.png');

 // memulai menggambar logo dalam file qrcode
 $logo = imagecreatefromstring(file_get_contents($logopath));
 
 imagecolortransparent($logo , imagecolorallocatealpha($logo , 0, 0, 0, 127));
 imagealphablending($logo , false);
 imagesavealpha($logo , true);

 $QR_width = imagesx($QR);
 $QR_height = imagesy($QR);

 $logo_width = imagesx($logo);
 $logo_height = imagesy($logo);

 // Scale logo to fit in the QR Code
 $logo_qr_width = $QR_width/8;
 $scale = $logo_width/$logo_qr_width;
 $logo_qr_height = $logo_height/$scale;

 imagecopyresampled($QR, $logo, $QR_width/2.3, $QR_height/2.3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);

 // Simpan kode QR lagi, dengan logo di atasnya
 imagepng($QR,$tempdir.'qrwithlogo.png');

  //menampilkan file qrcode 
 //echo '<div align="center"><h2>Create QR Code With Logo PHP</h2>';
 echo '<img src="'.$tempdir.'qrwithlogo.png'.'" width="297" height="118" align="middle"/>';
 //echo '<br><a href="https://www.maribelajarcoding.com">maribelajarcoding.com</a><div>';
 ?>
 
			<img src="https://<?php echo $row_rds['nm_domain']; ?>/assets/img/<?php echo $row_rds['logo']; ?>" alt="" width="90" height="40" align="middle" style="background-color:#CCC;"/> 
			 
	    </div>
		</td>
    </tr>
    <tr>
      <td height="190" colspan="2" border="1" bordercolor="#131313">
	    <div class="podval">
        <span class="left_podval">IDR <?php echo number_format($row_rcus['hrg_grand'],0,",","."); ?></span>
		<span class="right_podval"><?php echo $row_rcus['tgl_proses']; ?></span>  
		  <!--<img src="http://pngimg.com/uploads/barcode/barcode_PNG4.png" alt="" width="405" height="130" align="absmiddle"/>  -->
          <img src="barcode/barcode.php?text=<?php echo $row_rcus['kd_order']; ?>8&print=true&size=75" width="405" height="130" align="absmiddle"/>
      </div></td>
    </tr>
  </tbody>
</table>
</body>
</html>
