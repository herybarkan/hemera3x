<?php require_once('../../Connections/hemera.php'); ?>
<?php

mysql_select_db($database_hemera, $hemera);
$query_rcek = "SELECT username FROM user_ WHERE username = '$_GET[xemail]'";
$rcek = mysql_query($query_rcek, $hemera) or die(mysql_error());
$row_rcek = mysql_fetch_assoc($rcek);
$totalRows_rcek = mysql_num_rows($rcek);


if ($row_rcek['username']!="")
{
mysql_select_db($database_hemera, $hemera);
$query_rin = "UPDATE user_ SET
aktif='1'
WHERE username='$_GET[xemail]'
";
$rin = mysql_query($query_rin, $hemera) or die(mysql_error());

$xemail=$_GET['xemail'];
$email = $xemail;
$to = $email; 
$subject = "Konfirmasi Akun Dropshipper ". $xemail;


$headers = "From:sistem@hemerapartner.com";
$headers .= "\r\nReply-To: ".$to."";
$headers .= "\r\nContent-Type: text/html; charset=UTF-8";
$headers .= "\r\nMIME-Version: 1.0";

         $message = '<table width="90%" border="0" align="center">'.
' <tr>'.
'   <td align="center"><img src="https://hemerapartner.com/lp/assets/images/favicon.png" width="176" height="176" /></td>'.
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
'   <td style="text-align: center">Terimakasih, Atas Pendaftaran Anda sebagai Dropshipper Partner</td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center">Silahkan cek email: '.$xemail.'. untuk melanjutkan proses berikutnya.</td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center">&nbsp;</td>'.
' </tr>'.
'   <td style="text-align: center">&nbsp;</td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center">&nbsp;</td>'.
' </tr>'.
'</table>';
         //$message .= "<h1>This is headline.</h1>";
         
         $header = "From:sistem@hemerapartner.com \r\n";
         //$header .= "Cc:afgh@somedomain.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         //$retval = mail ($to,$subject,$message,$header);

		$retval = mail($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully..."; $xsts="success";
         }else {
            echo "Message could not be sent..."; $xsts="fail";
         }
//=====================================================================================================

	header("Location:../../lp/index.php?com=konfirm_verifikasi&username=".$xemail."&sts=".$xsts."&ver=success");
}
elseif ($row_rcek['username']!="")
{
	header("Location:../../lp/index.php?com=konfirm_verifikasi&username=".$xemail."&sts=".$xsts."&ver=fail");
}
?>

<?php
mysql_free_result($rin);


?>
