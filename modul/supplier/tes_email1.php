<?php
require '../../modul/phpmailler/PHPMailerAutoload.php';
require '../../modul/phpmailler/class.phpmailer.php';
require '../../modul/phpmailler/class.phpmaileroauth.php';

$xemail="herybarkan@gmail.com";
$email = $xemail;
//$to = $email; 
//$subject = "Pembayaran Order ". $xemail;

$mailz = new PHPMailer;

// Konfigurasi SMTP
$mailz->isSMTP();
$mailz->Host = 'mail.hemerabymira.com';
$mailz->SMTPAuth = true;
$mailz->Username = 'sistem@hemerabymira.com';
$mailz->Password = 'MiraHemeraSistem2021';
$mailz->SMTPSecure = 'none';
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

$mailz->setFrom('sistem@hemerabymira.com', 'Konfirmasi Order '.$sts_konf);
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
                                       <td align="center" valign="top" style="font-family:Open Sans, sans-serif, Verdana; font-size:30px; color:#4b4b4c; line-height:30px; font-weight:bold;">Pembayaran Anda '.$sts_konf.'</td>
                                    </tr>
                                    <tr>
                                       <td align="center" valign="top">&nbsp;</td>
                                    </tr>
                                    <tr>
                                       <td align="center" valign="top" style="font-family:Open Sans, sans-serif, Verdana; font-size:13px; color:#71746f; line-height:22px; font-weight:normal;">
                                          <p>Tanggal: '.$tglin.'</p>
                                          <p>KD Order: '.$row_rtrx['kd_order'].'</p>
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
    echo 'Pesan tidak dapat dikirim.';
    echo 'Mailer Error: ' . $mailz->ErrorInfo;
}else{
    echo 'Pesan telah terkirim';
}
?>