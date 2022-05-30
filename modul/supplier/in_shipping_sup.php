<?php require_once('../../Connections/hemera.php'); ?>
<?php
ob_start();
session_start();

date_default_timezone_set('Asia/Jakarta');

require '../../modul/phpmailler/PHPMailerAutoload.php';
require '../../modul/phpmailler/class.phpmailer.php';
require '../../modul/phpmailler/class.phpmaileroauth.php';


?>
<?php
$xhpp=$_POST['hf_hpp'];
$tglin=date('Y-m-d');

		
mysql_select_db($database_hemera, $hemera);
$query_rinsup = "UPDATE trx_ds SET
tgl_kirim='$tglin',
kirim_by='$_SESSION[HEM_kd_user]',
sts_kirim='$_POST[sapproval]',
alasan_kirim='$_POST[reason]'
WHERE kd_order='$_POST[hf_kdorder]'
";
$rinsup = mysql_query($query_rinsup, $hemera) or die(mysql_error());

mysql_select_db($database_hemera, $hemera);
$query_rtrx = "SELECT * FROM trx_ds WHERE kd_order='$_POST[hf_kdorder]'";
$rtrx = mysql_query($query_rtrx, $hemera) or die(mysql_error());
$row_rtrx = mysql_fetch_assoc($rtrx);
$totalRows_rtrx = mysql_num_rows($rtrx);

mysql_select_db($database_hemera, $hemera);
$query_rtrx_det = "SELECT * FROM trx_ds_detail WHERE kd_order='$_POST[hf_kdorder]'";
$rtrx_det = mysql_query($query_rtrx_det, $hemera) or die(mysql_error());
$row_rtrx_det = mysql_fetch_assoc($rtrx_det);
$totalRows_rtrx_det = mysql_num_rows($rtrx_det);

mysql_select_db($database_hemera, $hemera);
$query_rtrx_det2 = "SELECT * FROM trx_ds_detail WHERE kd_order='$_POST[hf_kdorder]'";
$rtrx_det2 = mysql_query($query_rtrx_det2, $hemera) or die(mysql_error());
$row_rtrx_det2 = mysql_fetch_assoc($rtrx_det2);
$totalRows_rtrx_det2 = mysql_num_rows($rtrx_det2);

mysql_select_db($database_hemera, $hemera);
$query_rcus = "SELECT * FROM ds_customer WHERE kd_order='$_POST[hf_kdorder]'";
$rcus = mysql_query($query_rcus, $hemera) or die(mysql_error());
$row_rcus = mysql_fetch_assoc($rcus);
$totalRows_rcus = mysql_num_rows($rcus);

mysql_select_db($database_hemera, $hemera);
$query_rds = "SELECT * FROM dropshiper WHERE kd_dropshiper='$row_rcus[kd_ds]'";
$rds = mysql_query($query_rds, $hemera) or die(mysql_error());
$row_rds = mysql_fetch_assoc($rds);
$totalRows_rds = mysql_num_rows($rds);

mysql_select_db($database_hemera, $hemera);
$query_rdsem = "SELECT email FROM user_ WHERE kd_user='$row_rds[kd_user]'";
$rdsem = mysql_query($query_rdsem, $hemera) or die(mysql_error());
$row_rdsem = mysql_fetch_assoc($rdsem);
$totalRows_rdsem = mysql_num_rows($rdsem);

	if ($_POST['sapproval']=="1") {$sts_konf=" Telah Terkirim";}
elseif ($_POST['sapproval']=="9") {$sts_konf=" Ter Reject Karena ".$_POST['reason'];}

//===============================================================================================================
$xemail=$row_rcus['email'];
//$xemail="herybarkan@gmail.com";
$email = $xemail;
//$to = $email; 
//$subject = "Pembayaran Order ". $xemail;

$mailz = new PHPMailer;

// Konfigurasi SMTP
$mailz->isSMTP();
$mailz->Host = 'mail.'.$row_rds['nm_domain'];
$mailz->SMTPAuth = true;
$mailz->Username = $row_rds['email_toko'];
$mailz->Password = $row_rds['password_email_toko'];
$mailz->SMTPSecure = 'tls';
$mailz->Port = 587;
/*$mailz->smtpConnect(
	    array(
	        "ssl" => array(
	            "verify_peer" => false,
	            "verify_peer_name" => false,
	            "allow_self_signed" => true
	        )
	    )
	);*/

$mailz->setFrom($row_rds['email_toko'], 'Konfirmasi Order '.$sts_konf);
//$mailz->addReplyTo($row_rds['email_toko'], 'Konfirmasi Order');

// Menambahkan penerima
$mailz->addAddress($xemail);
//$mailz->addAddress('tambahlong@gmail.com');

// Subjek email
$mailz->Subject = 'Konfirmasi Order '.$sts_konf;

// Mengatur format email ke HTML
$mailz->isHTML(true);

         $mailContent = '<table width="78%" border="0" align="center">
  <tr>
    <td width="50%">&nbsp;</td>
    <td width="50%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">'.$row_rds['nm_toko'].'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><span style="font-size: 24px">Hallo! </span><br />
                                          '.$row_rcus['nm_depan'].' '.$row_rcus['nm_belakang'].'
                                       </td>
  </tr>
  <tr>
    <td colspan="2" align="center" style="font-size: 24px">Order Anda '.$sts_konf.'</td>
  </tr>
  <tr>
    <td colspan="2" align="center">Tanggal: '.$tglin.' KD Order: '.$row_rtrx['kd_order'].'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">
    <table width="81%" border="0" align="center">
                                             <tr>
                                                <td width="40%">Nm Product</td>
                                                <td width="16%" align="right">Harga</td>
                                                <td width="7%" align="right">Qty</td>
                                                <td width="22%" align="right">Total</td>
                                             </tr>';
                                          do { 
              						$mailContent .='
                                             <tr>
                                                
                                                <td>'.$row_rtrx_det['nm_prod'].'</td>
                                                <td align="right">'.number_format($row_rtrx_det['hrg_satuan'],0,",",".").'</td>
                                                <td align="right">'.$row_rtrx_det['qty'].'</td>
                                                <td align="right">'.number_format($row_rtrx_det['hrg_total'],0,",",".").'</td>
                                             </tr>';
											} while ($row_rtrx_det = mysql_fetch_assoc($rtrx_det));
              $mailContent .=' <tr>
                                               <td>&nbsp;</td>
                                               <td>&nbsp;</td>
                                               <td>Ongkir</td>
                                               <td>'.number_format($row_rtrx['hrg_shipping'],0,",",".").'</td>
                                               
                                             </tr>
                                             <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>TOTAL</td>
                                                <td>'.number_format($row_rtrx['hrg_grand'],0,",",".").'</td>
                                                
                                             </tr>
                                          </table>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">Terimakasih</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">&copy; '.$row_rds['nm_domain'].'</td>
  </tr>
</table>

';
         
$mailz->Body = $mailContent;


// Kirim email
if(!$mailz->send()){
    //echo 'Pesan tidak dapat dikirim.';
    //echo 'Mailer Error: ' . $mailz->ErrorInfo;
}else{
    //echo 'Pesan telah terkirim';
}
//===============================================================================================================

mysql_select_db($database_hemera, $hemera);
$query_rem = "SELECT email FROM email_hemera WHERE aktif = '1'";
$rem = mysql_query($query_rem, $hemera) or die(mysql_error());
$row_rem = mysql_fetch_assoc($rem);
$totalRows_rem = mysql_num_rows($rem);
$id_email=array();



$mail = new PHPMailer;

// Konfigurasi SMTP
$mail->isSMTP();
$mail->Host = 'mail.'.$row_rds['nm_domain'];
$mail->SMTPAuth = true;
$mail->Username = $row_rds['email_toko'];
$mail->Password = $row_rds['password_email_toko'];
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
/*$mail->smtpConnect(
	    array(
	        "ssl" => array(
	            "verify_peer" => false,
	            "verify_peer_name" => false,
	            "allow_self_signed" => true
	        )
	    )
	);*/

$mail->setFrom($row_rds['email_toko'], 'Konfirmasi Order '.$sts_konf);
$mail->addReplyTo($row_rds['email_toko'], 'Konfirmasi Order '.$sts_konf);

// Menambahkan penerima
do
	{
		$mail->addAddress($row_rem['email']);
		
	} while ($row_rem = mysql_fetch_assoc($rem));
$mail->addAddress($row_rdsem['email']);
//$mail->addAddress('tambahlong@gmail.com');

// Subjek email
$mail->Subject = 'Konfirmasi Order '.$sts_konf;

// Mengatur format email ke HTML
$mail->isHTML(true);

         $mailContent ='
		 <table width="80%" border="0" align="center">
  <tr>
    <td width="50%">&nbsp;</td>
    <td width="50%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" style="font-size: 24px">Konfirmasi Order</td>
  </tr>
  <tr>
    <td colspan="2" align="center" style="font-size: 18px">Transaksi Pembelian baru '.$sts_konf.' dengan data detail sebagai berikut:</p>
               </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>KD Order</td>
    <td>'.$row_rcus['kd_order'].'</td>
  </tr>
  <tr>
    <td>Tgl Order</td>
    <td>'.$tglin.'</td>
  </tr>
  <tr>
    <td>Nama</td>
    <td>'.$row_rcus['nm_depan']." ".$row_rcus['nm_belakang'].'</td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>'.$row_rcus['alamat'].'</td>
  </tr>
  <tr>
    <td>No HP</td>
    <td>'.$row_rcus['no_hp'].'</p></td>
  </tr>
  <tr>
    <td>Email</td>
    <td>'.$row_rcus['email'].'</td>
  </tr>
  <tr>
    <td colspan="2">
    <table border="0" width="100%">
                                             <tbody>
                                             <tr>
                                                   <td width="40%" >Nm Product</td>
                                                   <td width="16%">
                                                      
                                                         Harga
                                                   </td>
                                                   <td width="16%" >
                                                      
                                                         Qty
                                                   </td>
                                                   <td width="16%">
                                                      
                                                         Total
                                                   </td>
                                                </tr>';
												
												 do { 
              						$mailContent .='
                                                <tr>
                                                   <td width="40%" >'.$row_rtrx_det2['nm_prod'].'</td>
                                                   <td width="16%" >
                                                      
                                                         Rp. '.number_format($row_rtrx_det2['hrg_satuan'],0,",",".").'
                                                      
                                                   </td>
                                                   <td width="16%" >
                                                      
                                                         '.$row_rtrx_det2['qty'].'
                                                      
                                                   </td>
                                                   <td width="16%" >
                                                      
                                                         Rp. '.number_format($row_rtrx_det2['hrg_total'],0,",",".").'
                                                      
                                                   </td>
                                                </tr>';
											} while ($row_rtrx_det2 = mysql_fetch_assoc($rtrx_det2));
              $mailContent .='	<tr>
                                                  <td >Ongkir</td>
                                                  <td >&nbsp;</td>
                                                  <td >&nbsp;</td>
                                                  <td >Rp. '.number_format($row_rtrx['hrg_shipping'],0,",",".").'</td>
                                                </tr>
                                                <tr>
                                                  <td >Total</td>
                                                  <td >&nbsp;</td>
                                                  <td >&nbsp;</td>
                                                  <td >Rp. '.number_format($row_rtrx['hrg_grand'],0,",",".").'</td>
                                                </tr>
                                             </tbody>
                                          </table>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">terimakasih</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>'; 
	


$mail->Body = $mailContent;


// Kirim email
if(!$mail->send()){
    echo 'Pesan tidak dapat dikirim.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
    echo 'Pesan telah terkirim';
}
//=========================================================================================
		
		

header("Location: ../../index.php?com=proses_order_sup&layout=full");
?>