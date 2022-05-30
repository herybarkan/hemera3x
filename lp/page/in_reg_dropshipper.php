<?php require_once('../Connections/hemera.php'); ?>
<?php

$xnama = mysql_real_escape_string($_POST['nama']);
$xnm_toko = mysql_real_escape_string($_POST['nm_toko']);
$xno_hp = mysql_real_escape_string($_POST['no_hp']);
$xemail = mysql_real_escape_string($_POST['email']);
$xpasswd = mysql_real_escape_string($_POST['passwd']);
$passx=md5($xpasswd);

srand ((double) microtime() * 10000000);
$input = array ("A", "B", "C", "D", "E","F","G","H","I","J","K","L","M","N","O","P","Q",
"R","S","T","U","V","W","X","Y","Z");
$rand_index = array_rand($input,8);
$kode= $input[$rand_index[3]].$input[$rand_index[5]].$input[$rand_index[4]].$input[$rand_index[2]].$input[$rand_index[1]];

$zxtahun=date('y');
$zxbulan=date('m');
$zxtanggal=date('d');
$zxjam=date('H');
$zxmenit=date('i');
$zxdetik=date('s');
$awal="REG-";

$tglin=date('Y-m-d');

$kd_reg = $awal.$kode.$zxtahun.$zxbulan.$zxtanggal.$zxjam.$zxmenit.$zxdetik;

mysql_select_db($database_hemera, $hemera);
$query_rcek = "SELECT username FROM user_ WHERE username = '$xemail'";
$rcek = mysql_query($query_rcek, $hemera) or die(mysql_error());
$row_rcek = mysql_fetch_assoc($rcek);
$totalRows_rcek = mysql_num_rows($rcek);

if ($row_rcek['username']=="")
{
mysql_select_db($database_hemera, $hemera);
$query_rin = "INSERT INTO user_ (
kd_user, 
nama, 
nm_toko, 
hp, 
email, 
username, 
password, 
grup,
tgl_in
) VALUES (
'$kd_reg',
'$xnama',
'$xnm_toko',
'$xno_hp',
'$xemail',
'$xemail',
'$passx',
'6',
'$tglin'
)";
$rin = mysql_query($query_rin, $hemera) or die(mysql_error());


//======================================================================================================================================
$email = $xemail;
//$email = "herybarkan@gmail.com";
$to = $email; 
$subject = "Verifikasi Akun Dropshipper ". $xemail;

//$email = "herybarkan@gmail.com, ".$xemail_peserta;
//$to = "{$email}"; 
//$to = "herybarkan@gmail.com"; 
//$subject = "Verifikasi Akun Dropshipper";

$headers = "From:sistem@hemerapartner.com";
$headers .= "\r\nReply-To: ".$to."";
$headers .= "\r\nContent-Type: text/html; charset=UTF-8";
$headers .= "\r\nMIME-Version: 1.0";

         $message = '<table width="90%" border="0" align="center">'.
' <tr>'.
'   <td align="center"><img src="https://hemerapartner.com/assets/images/favicon.png" width="176" height="176" /></td>'.
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
'   <td style="text-align: center">untuk verifikasi akun email '.$xemail.'. silahkan klik tombol dibawah ini.</td>'.
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
'   <td style="text-align: center"><a href="https://hemerapartner.com/page/cek_verifikasi_dropshipper.php?xemail='.$xemail.'"><img src="https://hemerapartner.com/assets/images/verifikasi.png" width="162" height="50" /></a></td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center">&nbsp;</td>'.
' </tr>'.
'</table>';
         
         $header = "From:sistem@hemerapartner.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
		$retval = mail($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully..."; $xsts="success";
         }else {
            echo "Message could not be sent..."; $xsts="fail";
         }
//=====================================================================================================
mysql_select_db($database_hemera, $hemera);
$query_rem = "SELECT email FROM email_hemera WHERE aktif = '1'";
$rem = mysql_query($query_rem, $hemera) or die(mysql_error());
//$row_rem = mysql_fetch_assoc($rem);
//$totalRows_rem = mysql_num_rows($rem);
$id_email=array();

do
	{
		$id_email[]= $row_rem['email'];
		
	} while ($row_rem = mysql_fetch_assoc($rem));

$array_id_email = implode(",", $id_email); 
$xid_email= $array_id_email;

$emailz = $xid_email;
//$email = "herybarkan@gmail.com";
$toz = $emailz; 
$subject = "Pendaftaran Akun Dropshipper ". $xemailz;

//$email = "herybarkan@gmail.com, ".$xemail_peserta;
//$to = "{$email}"; 
//$to = "herybarkan@gmail.com"; 
//$subject = "Verifikasi Akun Dropshipper";

$headers = "From:sistem@hemerapartner.com";
$headers .= "\r\nReply-To: ".$toz."";
$headers .= "\r\nContent-Type: text/html; charset=UTF-8";
$headers .= "\r\nMIME-Version: 1.0";

         $message = 'pendaftaran akun dropshipper baru<br>
		 atas nama: '.$xemail.'';
         
         $header = "From:sistem@hemerapartner.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
		$retval = mail($toz,$subject,$message,$header);
		
		 
         if( $retval == true ) {
            echo "Message sent successfully..."; $xsts="success";
         }else {
            echo "Message could not be sent..."; $xsts="fail";
         }

//=====================================================================================================

	header("Location:../index.php?com=konfirm_aktivasi&username=".$xemail."&sts=".$xsts."");
}
elseif ($row_rcek['username']!="")
{
	header("Location:../index.php?com=konfirm_error&username=".$xemail."&sts=".$xsts."");
}
?>

<?php
mysql_free_result($rin);


?>
