<?php

//$email = "herybarkan@gmail.com, ".$xemail_peserta;
//$to = "{$email}"; 
$to = "herybarkan@gmail.com"; 
$subject = "Verifikasi Akun Dropshipper";

$headers = "From:demo@jvmediastudio.com";
$headers .= "\r\nReply-To:{$to}";
$headers .= "\r\nContent-Type: text/html; charset=UTF-8";
$headers .= "\r\nMIME-Version: 1.0";

         $message = '<table width="90%" border="0" align="center">'.
' <tr>'.
'   <td align="center"><img src="https://jvmediastudio.com/demo/hemera/lp/assets/images/favicon.png" width="176" height="176" /></td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center; font-weight: bold; font-size: 24px;">SELAMAT DATANG</td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center">DI HEMERA PARTNER</td>'.
' </tr>'.
' <tr>'.
'   <td>&nbsp;</td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center">Terimakasih sudah bergabung menjadi member Dropshipper di Hemera Partner</td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center">untuk verifikasi akun email. silahkan klik tombol dibawah ini.</td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center">&nbsp;</td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center">Setelah itu anda bisa melanjutkan proses pembayaran </td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center">&nbsp;</td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center"><a href="#"><img src="https://jvmediastudio.com/demo/hemera/lp/assets/images/verifikasi.png" width="162" height="50" /></a></td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center">&nbsp;</td>'.
' </tr>'.
'</table>';
         //$message .= "<h1>This is headline.</h1>";
         
         $header = "From:demo@njvmediastudio.com \r\n";
         //$header .= "Cc:afgh@somedomain.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         //$retval = mail ($to,$subject,$message,$header);

		$retval = mail($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
		 
?>