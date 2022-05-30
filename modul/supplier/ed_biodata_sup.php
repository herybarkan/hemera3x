<?php require_once('../../Connections/hemera.php'); ?>
<?php
ob_start();
session_start();

date_default_timezone_set('Asia/Jakarta');



/*if (phpversion() > "4.0.6") {
	$HTTP_POST_FILES = &$_FILES;
}
define("MAX_SIZE",900000000000);
define("DESTINATION_FOLDER", "../../foto/user/");
//define("no_error", "../index.php?com=upload&id_=".$_POST['hf_id']."&upload=success");
//define("yes_error", "../index.php?com=upload&id_=".$_POST['hf_id']."&upload=error");
$_accepted_extensions_ = "jpg, jpeg, png, gif";
if(strlen($_accepted_extensions_) > 0){
	$_accepted_extensions_ = @explode(",",$_accepted_extensions_);
} else {
	$_accepted_extensions_ = array();
}
$_file_ = $HTTP_POST_FILES['file_logo'];
if(is_uploaded_file($_file_['tmp_name']) && $HTTP_POST_FILES['file_logo']['error'] == 0){
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
}*/

//========================================================================================================================================

$tglin=date('Y-m-d');


mysql_select_db($database_hemera, $hemera);
$query_rinsup = "UPDATE suplier SET
nm_suplier			='$_POST[sp_name]', 
alamat				='$_POST[alamat]', 
propinsi			='$_POST[sprop]',
kabupaten			='$_POST[skab]',
kecamatan			='$_POST[skec]',
kelurahan			='$_POST[skel]',
contact_person		='$_POST[cp]',
email				='$_POST[email]',
no_hp				='$_POST[no_hp]',
wa					='$_POST[wa]',
fb					='$_POST[fb]',
ig					='$_POST[ig]',
tw					='$_POST[tw]'
WHERE kd_user='$_SESSION[HEM_kd_user]'";
$rinsup = mysql_query($query_rinsup, $hemera) or die(mysql_error());

mysql_select_db($database_hemera, $hemera);
$query_rinsup2 = "UPDATE member SET
alamat='$_POST[alamat]',
propinsi='$_POST[sprop]',
kabupaten='$_POST[skab]',
kecamatan='$_POST[skec]',
kelurahan='$_POST[skel]',
whatsapp='$_POST[wa]',
facebook='$_POST[fb]',
instagram='$_POST[ig]',
twitter='$_POST[tw]'
WHERE kd_user='$_SESSION[HEM_kd_user]'";
$rinsup2 = mysql_query($query_rinsup2, $hemera) or die(mysql_error());

header("Location: ../../index.php?com=biodata_sup&layout=full");
?>