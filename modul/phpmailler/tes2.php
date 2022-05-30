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

// Subjek email
$mail->Subject = 'Notification DS';

// Mengatur format email ke HTML
$mail->isHTML(true);

// Konten/isi email
$mailContent = "<table width='80%' border='0' align='center'>
  <tr>
    <td width='26%'><img src='https://geotagging.indosatooredoo.com/babt/img/logo_indosat.png' width='220' height='104' /></td>
    <td width='74%' align='right'>GR - BABT Application &nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td colspan='2'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan='2' align='center' style='font-weight: bold; font-size: 24px;'>".$fap."</td>
  </tr>
</table><br>
<table width='80%' border='1' align='center' cellpadding='0' cellspacing='0'>
  <tr>
    <td width='50%'>Approved By</td>
    <td width='50%'>".$_SESSION['babt_real_name']."</td>
  </tr>
  <tr>
    <td>Level</td>
    <td>".$row_rgrup['nm_grup']."</td>
  </tr>
  <tr>
    <td>Date Approval</td>
    <td>".$tgl_now."</td>
  </tr>
  <tr>
    <td>Time Approval</td>
    <td>".$jam_now."</td>
  </tr>
  </table><br>
<table width='80%' border='0' align='center'>
  <tr bgcolor='#FFFFFF' style='color: #333'>
    <td style='font-size: 10pt'>Vendor Name</td>
    <td align='right' style='font-size: 9pt'><strong>".$row_rdata_line['vendor_name']."</strong></td>
    <td>&nbsp;</td>
    <td style='font-size: 10pt'>PO Number</td>
    <td align='right' style='font-size: 9pt'><strong>".$row_rdata_line['po_id']."</strong></td>
  </tr>
  <tr bgcolor='#EFEFEF' style='color: #333'>
    <td width='16%' style='font-size: 10pt'>Site ID</td>
    <td width='32%' align='right' bgcolor='#EFEFEF' style='font-size: 9pt'><strong>".$row_rdata_line['site_id']."</strong></td>
    <td width='4%'>&nbsp;</td>
    <td width='18%' style='font-size: 10pt'>Line Number</td>
    <td width='30%' align='right' style='font-size: 9pt'><strong>".$row_rdata_line['line_no']."</strong></td>
  </tr>
  <tr style='color: #333'>
    <td style='font-size: 10pt'>Site Name</td>
    <td align='right' style='font-size: 9pt'><strong>".$row_rdata_line['site_name']."</strong></td>
    <td>&nbsp;</td>
    <td style='font-size: 10pt'>Equipment Name</td>
    <td align='right' style='font-size: 9pt'><strong>".$row_rdata_line['nm_line']."</strong></td>
  </tr>
  <tr bgcolor='#EFEFEF' style='color: #333'>
    <td style='font-size: 10pt'>Cluster</td>
    <td align='right' style='font-size: 9pt'><strong>".$row_rdata_line['cluster']."</strong></td>
    <td>&nbsp;</td>
    <td style='font-size: 10pt'>Part NUmber</td>
    <td align='right' style='font-size: 9pt'><strong>".$row_rpn['nm_pn']."</strong></td>
  </tr>
  <tr style='color: #333'>
    <td style='font-size: 10pt'>Task ID</td>
    <td align='right' style='font-size: 9pt'><strong>".$row_rdata_line['task_id']."</strong></td>
    <td>&nbsp;</td>
    <td style='font-size: 10pt'>Uom</td>
    <td align='right' style='font-size: 9pt'><strong>".$row_rdata_line['measurement']."</strong></td>
  </tr>
  <tr bgcolor='#EFEFEF' style='color: #333'>
    <td style='font-size: 10pt'> Project Name</td>
    <td align='right' style='font-size: 9pt'><strong>".$row_rdata_line['nm_project']."</strong></td>
    <td>&nbsp;</td>
    <td style='font-size: 10pt'>PO Qty</td>
    <td align='right' style='font-size: 9pt'><strong>".number_format($row_rdata_line['qty'],0,',','.')."</strong></td>
  </tr>
  <tr style='color: #333'>
    <td style='font-size: 10pt'>GR Date</td>
    <td align='right' style='font-size: 9pt'><strong>".$row_rdata_line['tgl_in']."</strong></td>
    <td>&nbsp;</td>
    <td style='font-size: 10pt'>GR Qty</td>
    <td align='right' style='font-size: 9pt'><strong>".number_format($row_rdata_line['qty_in'],0,',','.')."</strong></td>
  </tr>
  </table>
  <p>&nbsp;</p>
<table width='80%' border='0' align='center' cellpadding='3' cellspacing='3'>
  <tr>
    <td width='50%' align='center'><a href='https://geotagging.indosatooredoo.com/babt/index.php' class='myButton'><img src='https://geotagging.indosatooredoo.com/babt/img/open_button.png' width='221' height='56' /> </a></td>
  </tr>
</table>
<p>&nbsp;</p>";
$mail->Body = $mailContent;


// Kirim email
if(!$mail->send()){
    echo 'Pesan tidak dapat dikirim.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
    echo 'Pesan telah terkirim';
}