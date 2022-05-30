<?php require_once('../Connections/hemera.php'); ?>
<?php
date_default_timezone_set('Asia/Jakarta');

$xemail = mysql_real_escape_string($_POST['hf_email']);
$xatas_nama = mysql_real_escape_string($_POST['atas_nama']);
$xnominal = mysql_real_escape_string($_POST['nominal']);
$xbank = mysql_real_escape_string($_POST['bank']);
$xdari_rekening = mysql_real_escape_string($_POST['dari_rekening']);
$xke_rekening = mysql_real_escape_string($_POST['ke_rekening']);

$tglin=date('Y-m-d');
$jamin=date('H:i:s');


mysql_select_db($database_hemera, $hemera);
$query_rcek = "SELECT username FROM user_ WHERE username = '$xemail'";
$rcek = mysql_query($query_rcek, $hemera) or die(mysql_error());
$row_rcek = mysql_fetch_assoc($rcek);
$totalRows_rcek = mysql_num_rows($rcek);

if (phpversion() > "4.0.6") {
	$HTTP_POST_FILES = &$_FILES;
}
define("MAX_SIZE",900000000000);
define("DESTINATION_FOLDER", "../foto/pembayaran/");
//define("no_error", "../index.php?com=upload&id_=".$_POST['hf_id']."&upload=success");
//define("yes_error", "../index.php?com=upload&id_=".$_POST['hf_id']."&upload=error");
$_accepted_extensions_ = "pdf, jpg, jpeg, png";
if(strlen($_accepted_extensions_) > 0){
	$_accepted_extensions_ = @explode(",",$_accepted_extensions_);
} else {
	$_accepted_extensions_ = array();
}
$_file_ = $HTTP_POST_FILES['filex'];
if(is_uploaded_file($_file_['tmp_name']) && $HTTP_POST_FILES['filex']['error'] == 0){
	$errStr = "";
	$_name_ = $_file_['name'];
	$_type_ = $_file_['type'];
	$_tmp_name_ = $_file_['tmp_name'];
	$_size_ = $_file_['size'];
	if($_size_ > MAX_SIZE && MAX_SIZE > 0){
		$errStr = "File troppo pesante";
	}
	$_ext_ = explode(".", $_name_);
	$_ext_ = strtolower($_ext_[count($_ext_)-1]);
	if(!in_array($_ext_, $_accepted_extensions_) && count($_accepted_extensions_) > 0){
		$errStr = "Estensione non valida";
	}
	if(!is_dir(DESTINATION_FOLDER) && is_writeable(DESTINATION_FOLDER)){
		$errStr = "Cartella di destinazione non valida";
	}
		if(@copy($_tmp_name_,DESTINATION_FOLDER . "/" . $_name_)){
			$sts_upload="success";
		} else {
			$sts_upload="fail";
		}
}

mysql_select_db($database_hemera, $hemera);
$query_rin = "INSERT INTO upload_pembayaran (
atas_nama, 
email, 
nominal, 
bank, 
dari_rek, 
ke_rek, 
tgl_trf, 
bukti_transfer,
tgl_in,
jam_in
) VALUES (
'$xatas_nama',
'$xemail',
'$xnominal',
'$xbank',
'$xdari_rekening',
'$xke_rekening',
'$_POST[tgl_transfer]',
'$_name_',
'$tglin',
'$jamin'
)";
$rin = mysql_query($query_rin, $hemera) or die(mysql_error());

//======================================================================================================================================
$email = $xemail;
//$email = "herybarkan@gmail.com";
$to = $email; 
$subject = "Verifikasi Pembayaran Dropshipper ". $xemail;

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
'   <td style="text-align: center">Terimakasih sudah Melakukan Transfer untuk Pendaftaran Dropshipper di Hemera Partner</td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center">Pembayaran anda sedang dalam proses pengecekan.<br> Silahkan ditunggu, Hasil pengecekan atau Aktivasi akan dikirim Via Email</td>'.
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
$subject = "Upload Bukti Transfer Dropshipper ". $xemailz;

//$email = "herybarkan@gmail.com, ".$xemail_peserta;
//$to = "{$email}"; 
//$to = "herybarkan@gmail.com"; 
//$subject = "Verifikasi Akun Dropshipper";

$headers = "From:sistem@hemerapartner.com";
$headers .= "\r\nReply-To: ".$toz."";
$headers .= "\r\nContent-Type: text/html; charset=UTF-8";
$headers .= "\r\nMIME-Version: 1.0";

         $message = 'Upload Bukti Transfer baru<br>
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

	header("Location:../index.php?com=konfirm_pembayaran&username=".$xemail."&sts=".$xsts."");

?>

<?php
mysql_free_result($rin);


?>
