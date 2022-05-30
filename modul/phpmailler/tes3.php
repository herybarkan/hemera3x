<?php
require 'PHPMailerAutoload.php';
require 'class.phpmailer.php';
require 'class.phpmaileroauth.php';
	
$mail = new PHPMailer;

// Konfigurasi SMTP
$mail->isSMTP();
$mail->Host = 'mail.hemerapartner.com';
$mail->SMTPAuth = false;
$mail->Username = 'sistem@hemerapartner.com';
$mail->Password = 'MiraHemera2021';
$mail->SMTPSecure = '';
$mail->Port = 25;
$mail->smtpConnect(
	    array(
	        "ssl" => array(
	            "verify_peer" => false,
	            "verify_peer_name" => false,
	            "allow_self_signed" => true
	        )
	    )
	);

$mail->setFrom('sistem@hemerapartner.com', 'Sitem Site');
$mail->addReplyTo('sistem@hemerapartner.com', 'Sitem Site');

// Menambahkan penerima
$mail->addAddress('herybarkan@gmail.com');
$mail->addAddress('tambahlong@gmail.com');

// Subjek email
$mail->Subject = 'Notification DS';

// Mengatur format email ke HTML
$mail->isHTML(true);

// Konten/isi email
$mailContent = ' 
    <html> 
    <head> 
        <title>Registrasi Dropshipper</title> 
    </head> 
    <body> 
        <center role="article" lang="en" style="width:100%;background-color:#f8f8f8">
   <div style="max-width:600px;margin:0 auto" class="m_-5409371775738285881email-container">
      <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin:auto">
         <tbody>
            <tr>
               <td style="padding:8px 20px 16px;background-color:#ffffff">
                  <h3 style="margin:0;font-family:Helvetica,Arial,sans-serif;font-weight:bold;font-size:20px;line-height:26px">
                     Registrasi Dropshipper Baru</h3>
                  <p style="margin:4px 0 0;font-family:Helvetica,Arial,sans-serif;font-size:14px;line-height:21px">Pendaftaran Dropshipper baru dengan data detail sebagai berikut:</p>
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
                                                         KD Registrasi</p>
                                                   </td>
                                                   <td width="50%" class="m_-5409371775738285881stack-column">
                                                      <p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:bold;line-height:21px">
                                                         '.$kd_reg.'
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
                                                         '.$xnama.'</p>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                          <table role="presentation" cellspacing="0" border="0" width="100%" style="margin-top:12px!important">
                                             <tbody>
                                                <tr>
                                                   <td width="50%" class="m_-5409371775738285881stack-column">
                                                      <p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:12px;line-height:18px;color:#727579">
                                                         Domain</p>
                                                   </td>
                                                   <td width="50%" class="m_-5409371775738285881stack-column">
                                                      <p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:bold;line-height:21px">
                                                         '.$_POST['xdomain'].'</p>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                          <table role="presentation" cellspacing="0" border="0" width="100%" style="margin-top:12px!important">
                                             <tbody>
                                                <tr>
                                                   <td width="50%" class="m_-5409371775738285881stack-column">
                                                      <p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:12px;line-height:18px;color:#727579">
                                                         Nama Toko</p>
                                                   </td>
                                                   <td width="50%" class="m_-5409371775738285881stack-column">
                                                      <p style="margin:0;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:bold;line-height:21px">
                                                         '.$xnm_toko.'</p>
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
                                                         '.$xemail.'</p>
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
                                                         '.$xno_hp.'</p>
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