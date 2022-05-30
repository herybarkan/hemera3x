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

         $mailContent = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
      <title>tellmail</title>
      <style type="text/css">
         body{width: 100%; background-color: #f0f3f8; margin:0; padding:0; -webkit-font-smoothing: antialiased;mso-margin-top-alt:0px; mso-margin-bottom-alt:0px; mso-padding-alt: 0px 0px 0px 0px;}
         p,h1,h2,h3,h4{margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0;}
         span.preheader{display: none; font-size: 1px;}
         html{width: 100%;}
         table{font-size: 12px;border: 0;}
         .menu-space{padding-right:25px;}
         a,a:hover { text-decoration:none; color:#FFF;}
         @media only screen and (max-width:640px)
         {
         body{width:auto!important;}
         table[class=main] {width:440px !important;}
         table[class=two-left] {width:420px !important; margin:0px auto;}
         table[class=full] {width:100% !important; margin:0px auto;}
         table[class=alaine] { text-align:center;}
         table[class=menu-space] {padding-right:0px;}
         table[class=banner] {width:438px !important;}
         table[class=menu] {width:438px !important; margin:0px auto; border-bottom:#e1e0e2 solid 1px;}
         table[class=date] {width:438px !important; margin:0px auto; text-align:center;}
         table[class=two-left-inner] {width:400px !important; margin:0px auto;}
         table[class=menu-icon] { display:block;}
         table[class=two-left-menu] {text-align:center;}
         }
         @media only screen and (max-width:479px)
         {
         body{width:auto!important;}
         table[class=main]  {width:310px !important;}
         table[class=two-left] {width:300px !important; margin:0px auto;}
         table[class=full] {width:100% !important; margin:0px auto;}
         table[class=alaine] { text-align:center;}
         table[class=menu-space] {padding-right:0px;}
         table[class=banner] {width:308px !important;}
         table[class=menu] {width:308px !important; margin:0px auto; border-bottom:#e1e0e2 solid 1px;}
         table[class=date] {width:308px !important; margin:0px auto; text-align:center;}
         table[class=two-left-inner] {width:280px !important; margin:0px auto;}
         table[class=menu-icon] { display:none;}
         table[class=two-left-menu] {width:310px !important; margin:0px auto;}
         }
      </style>
   </head>
   <body yahoo="fix" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#f0f3f8">
         <tr>
            <td align="center" valign="top">
               <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                     <td align="center" valign="top">
                        <table width="500" border="0" align="center" cellpadding="0" cellspacing="0" class="two-left-inner">
                           <tr>
                              <td height="60" align="center" valign="top" style="font-size:60px; line-height:60px;">&nbsp;</td>
                           </tr>
                        </table>
                     </td>
                  </tr>
               </table>
               <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                     <td align="center" valign="top">
                        <table width="500" border="0" align="center" cellpadding="0" cellspacing="0" class="two-left-inner">
                           <tr>
                              <td align="center" valign="top" style="background:#FFF;">
                                 <table width="440" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                       <td height="75" align="center" valign="top" style="font-size:75px; line-height:75px;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                       <td align="center" valign="top">
                                          <table width="110" border="0" align="center" cellpadding="0" cellspacing="0">
                                             <tr>
                                                <td align="center" valign="top" style="font-family:Open Sans, sans-serif, Verdana; font-size:22px; color:#4b4b4c; line-height:30px; font-weight:normal;"><a href="#"><img src="https://hemerapartner.com/assets/images/'.$row_rds['logo'].' width="110" height="25" alt="" /></a>
                                                   <br>
                                                   '.$row_rds['nm_toko'].'
                                                </td>
                                             </tr>
                                          </table>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td height="40" align="center" valign="top" style="font-size:40px; line-height:40px;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                       <td align="center" valign="top">
                                          <table width="85" border="0" align="center" cellpadding="0" cellspacing="0">
                                             <tr>
                                                <td height="85" align="center" valign="middle" style="background:#8dc63f; -moz-border-radius: 85px; border-radius: 85px;"><img src="https://hemerapartner.com/assets/images/email/tick.png" width="31" height="29" alt="" /></td>
                                             </tr>
                                          </table>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td height="40" align="center" valign="top" style="font-size:40px; line-height:40px;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                       <td align="center" valign="top" style="font-family:Open Sans, sans-serif, Verdana; font-size:22px; color:#4b4b4c; line-height:30px; font-weight:normal;">Hallo! <br />
                                          '.$row_rcus['nm_depan'].' '.$row_rcus['nm_belakang'].'
                                       </td>
                                    </tr>
                                    <tr>
                                       <td align="center" valign="top">&nbsp;</td>
                                    </tr>
                                    <tr>
                                       <td align="center" valign="top" style="font-family:Open Sans, sans-serif, Verdana; font-size:30px; color:#4b4b4c; line-height:30px; font-weight:bold;">Order Anda '.$sts_konf.'</td>
                                    </tr>
                                    <tr>
                                       <td align="center" valign="top">&nbsp;</td>
                                    </tr>
                                    <tr>
                                       <td align="center" valign="top" style="font-family:Open Sans, sans-serif, Verdana; font-size:13px; color:#71746f; line-height:22px; font-weight:normal;">
                                          <p>Tanggal: '.$tglin.'</p>
                                          <p>KD Order: '.$row_rtrx['kd_order'].'</p>
										  <br>
										  <p><h3>No Resi : '.$_POST['no_resi'].'</h3></p>
										  <br>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td align="center" valign="top">
                                          <table width="100%" border="0">
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
                                               <td>&nbsp;</td>
                                               <td>'.number_format($row_rtrx['hrg_shipping'],0,",",".").'</td>
                                             </tr>
                                             <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>TOTAL</td>
                                                <td>&nbsp;</td>
                                                <td>'.number_format($row_rtrx['hrg_grand'],0,",",".").'</td>
                                             </tr>
                                          </table>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td height="30" align="center" valign="top" style="font-size:30px; line-height:30px;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                       <td align="center" valign="top">Terimakasih</td>
                                    </tr>
                                    <tr>
                                       <td align="center" valign="top">
                                          <table width="85" border="0" align="center" cellpadding="0" cellspacing="0">
                                          </table>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td height="75" align="center" valign="top" style="font-size:75px; line-height:75px;">&nbsp;</td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
               </table>
               <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                     <td align="center" valign="top">
                        <table width="500" border="0" align="center" cellpadding="0" cellspacing="0" class="two-left-inner">
                           <tr>
                              <td align="center" valign="top">
                                 <table width="260" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                       <td height="40" align="center" valign="top" style="font-size:40px; line-height:40px;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                       <td align="center" valign="top" style="font-family:"Open Sans", sans-serif, Verdana; font-size:12px; color:#4b4b4c; line-height:30px; font-weight:normal;"> &copy; '.$row_rds['nm_domain'].'</td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
               </table>
               <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                     <td align="center" valign="top">&nbsp;</td>
                  </tr>
               </table>
            </td>
         </tr>
      </table>
   </body>
</html>

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
		 <html> 
    <head> 
        <title>Konfirmasi Pembayaran</title> 
    </head> 
    <body> 
        <center role="article" lang="en" style="width:100%;background-color:#f8f8f8">
   <div style="max-width:600px;margin:0 auto" class="m_-5409371775738285881email-container">
      <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin:auto">
         <tbody>
            <tr>
               <td style="padding:8px 20px 16px;background-color:#ffffff">
                  <h3 style="margin:0;font-family:Helvetica,Arial,sans-serif;font-weight:bold;font-size:20px;line-height:26px">
                     Konfirmasi Pengiriman Order</h3>
                  <p style="margin:4px 0 0;font-family:Helvetica,Arial,sans-serif;font-size:14px;line-height:21px">Transaksi Order '.$sts_konf.' dengan data detail sebagai berikut:</p>
               </td>
            </tr>
            <tr>
               <td style="padding:16px 20px;background-color:#ffffff">
                  <table role="presentation" cellspacing="0" border="0" width="100%">
                     <tbody>
                        <tr>
                           <td style="padding:16px;background-color:#f3f4f5;border-radius:8px">
                              <table role="presentation" cellspacing="0" border="0" width="100%">
                                 <tbody>
                                    <tr>
                                       <td>
                                          <table role="presentation" cellspacing="0" border="0" width="100%">
                                             <tbody>
                                                <tr>
                                                   <td width="50%" class="m_-5409371775738285881stack-column">
                                                      <p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:bold;line-height:21px">
                                                         Detail </p>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                          <table role="presentation" cellspacing="0" border="0" width="100%" style="margin-top:12px!important">
                                             <tbody>
                                                <tr>
                                                   <td width="50%" class="m_-5409371775738285881stack-column">
                                                      <p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:12px;line-height:18px;color:#727579">
                                                         KD Order</p>
                                                   </td>
                                                   <td width="50%" class="m_-5409371775738285881stack-column">
                                                      <p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:bold;line-height:21px">
                                                         '.$row_rcus['kd_order'].'
                                                      </p>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
										  <table role="presentation" cellspacing="0" border="0" width="100%" style="margin-top:12px!important">
                                             <tbody>
                                                <tr>
                                                   <td width="50%" class="m_-5409371775738285881stack-column">
                                                      <p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:12px;line-height:18px;color:#727579">
                                                         No Resi</p>
                                                   </td>
                                                   <td width="50%" class="m_-5409371775738285881stack-column">
                                                      <p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:bold;line-height:21px">
                                                         '.$_POST['no_resi'].'
                                                      </p>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                         <table role="presentation" cellspacing="0" border="0" width="100%" style="margin-top:12px!important">
                                             <tbody>
                                                <tr>
                                                   <td width="50%" class="m_-5409371775738285881stack-column">
                                                      <p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:12px;line-height:18px;color:#727579">
                                                         Tgl Order</p>
                                                   </td>
                                                   <td width="50%" class="m_-5409371775738285881stack-column">
                                                      <p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:bold;line-height:21px">
                                                         '.$tglin.'
                                                      </p>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
										  
                                          <table role="presentation" cellspacing="0" border="0" width="100%" style="margin-top:12px!important">
                                             <tbody>
                                                <tr>
                                                   <td width="50%" class="m_-5409371775738285881stack-column">
                                                      <p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:12px;line-height:18px;color:#727579">
                                                         Nama</p>
                                                   </td>
                                                   <td width="50%" class="m_-5409371775738285881stack-column">
                                                      <p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:bold;line-height:21px">
                                                         '.$row_rcus['nm_depan']." ".$row_rcus['nm_belakang'].'</p>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                          <table role="presentation" cellspacing="0" border="0" width="100%" style="margin-top:12px!important">
                                             <tbody>
                                                <tr>
                                                   <td width="50%" class="m_-5409371775738285881stack-column">
                                                      <p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:12px;line-height:18px;color:#727579">
                                                         Alamat</p>
                                                   </td>
                                                   <td width="50%" class="m_-5409371775738285881stack-column">
                                                      <p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:bold;line-height:21px">
                                                         '.$row_rcus['alamat'].'</p>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                          <table role="presentation" cellspacing="0" border="0" width="100%" style="margin-top:12px!important">
                                             <tbody>
                                                <tr>
                                                   <td width="50%" class="m_-5409371775738285881stack-column">
                                                      <p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:12px;line-height:18px;color:#727579">
                                                         No HP</p>
                                                   </td>
                                                   <td width="50%" class="m_-5409371775738285881stack-column">
                                                      <p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:bold;line-height:21px">
                                                         '.$row_rcus['no_hp'].'</p>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
<table role="presentation" cellspacing="0" border="0" width="100%" style="margin-top:12px!important">
                               <tbody>
                                                <tr>
                                                   <td width="50%" class="m_-5409371775738285881stack-column">
                                                      <p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:12px;line-height:18px;color:#727579">
                                                         Email</p>
                                                   </td>
                                                   <td width="50%" class="m_-5409371775738285881stack-column">
                                                      <p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:bold;line-height:21px">
                                                         '.$row_rcus['email'].'</p>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                          
                                          <table role="presentation" cellspacing="0" border="0" width="100%" style="margin-top:12px!important">
                                             <tbody>
                                             <tr>
                                                   <td width="40%" class="m_-5409371775738285881stack-column"><span style="margin: 0; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: bold; line-height: 21px">Nm Product</span></td>
                                                   <td width="16%" class="m_-5409371775738285881stack-column">
                                                      <p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:bold;line-height:21px">
                                                         Harga</p>
                                                   </td>
                                                   <td width="16%" class="m_-5409371775738285881stack-column">
                                                      <p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:bold;line-height:21px">
                                                         Qty</p>
                                                   </td>
                                                   <td width="16%" class="m_-5409371775738285881stack-column">
                                                      <p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:bold;line-height:21px">
                                                         Total</p>
                                                   </td>
                                                </tr>';
												
												 do { 
              						$mailContent .='
                                                <tr>
                                                   <td width="40%" class="m_-5409371775738285881stack-column">'.$row_rtrx_det2['nm_prod'].'</td>
                                                   <td width="16%" class="m_-5409371775738285881stack-column">
                                                      <p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:bold;line-height:21px">
                                                         Rp. '.number_format($row_rtrx_det2['hrg_satuan'],0,",",".").'
                                                      </p>
                                                   </td>
                                                   <td width="16%" class="m_-5409371775738285881stack-column">
                                                      <p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:bold;line-height:21px">
                                                         '.$row_rtrx_det2['qty'].'
                                                      </p>
                                                   </td>
                                                   <td width="16%" class="m_-5409371775738285881stack-column">
                                                      <p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:bold;line-height:21px">
                                                         Rp. '.number_format($row_rtrx_det2['hrg_total'],0,",",".").'
                                                      </p>
                                                   </td>
                                                </tr>';
											} while ($row_rtrx_det2 = mysql_fetch_assoc($rtrx_det2));
              $mailContent .='	<tr>
                                                  <td class="m_-5409371775738285881stack-column">Ongkir</td>
                                                  <td class="m_-5409371775738285881stack-column">&nbsp;</td>
                                                  <td class="m_-5409371775738285881stack-column">&nbsp;</td>
                                                  <td class="m_-5409371775738285881stack-column"><span style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:bold;line-height:21px">Rp. '.number_format($row_rtrx['hrg_shipping'],0,",",".").'</span></td>
                                                </tr>
                                                <tr>
                                                  <td class="m_-5409371775738285881stack-column">Total</td>
                                                  <td class="m_-5409371775738285881stack-column">&nbsp;</td>
                                                  <td class="m_-5409371775738285881stack-column">&nbsp;</td>
                                                  <td class="m_-5409371775738285881stack-column"><span style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:bold;line-height:21px">Rp. '.number_format($row_rtrx['hrg_grand'],0,",",".").'</span></td>
                                                </tr>
                                             </tbody>
                                          </table>
                                          
</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
         </tbody>
      </table>
      <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin:auto">
         <tbody>
            <tr>
               <td style="padding:24px 20px 0;background:#ffffff">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top:1px solid #e5e7e9">
                     <tbody>
                        <tr>
                           <td style="padding:4px 0 24px;font-family:sans-serif;font-size:12px;line-height:18px;color:#bdbec0;text-align:center">2021 www.hemerapartner.com
                             <p style="margin:0">&nbsp;</p>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
        </tbody>
     </table>
  </div>
</center>
    </body> 
    </html>'; 
	


$mail->Body = $mailContent;


// Kirim email
if(!$mail->send()){
    echo 'Pesan tidak dapat dikirim.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
    echo 'Pesan telah terkirim';
}
//=========================================================================================
		
		

header("Location: ../../index.php?com=proses_order_adm&layout=full");
?>