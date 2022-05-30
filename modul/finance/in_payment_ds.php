<?php require_once('../../Connections/hemera.php'); ?>
<?php
ob_start();
session_start();

date_default_timezone_set('Asia/Jakarta');



if (phpversion() > "4.0.6") {
	$HTTP_POST_FILES = &$_FILES;
}
define("MAX_SIZE",900000000000);
define("DESTINATION_FOLDER", "../../foto/trf_profit/");
//define("no_error", "../index.php?com=upload&id_=".$_POST['hf_id']."&upload=success");
//define("yes_error", "../index.php?com=upload&id_=".$_POST['hf_id']."&upload=error");
$_accepted_extensions_ = "jpg, jpeg, png, gif";
if(strlen($_accepted_extensions_) > 0){
	$_accepted_extensions_ = @explode(",",$_accepted_extensions_);
} else {
	$_accepted_extensions_ = array();
}
$_file_ = $HTTP_POST_FILES['file_foto'];
if(is_uploaded_file($_file_['tmp_name']) && $HTTP_POST_FILES['file_foto']['error'] == 0){
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

//========================================================================================================================================

?>
<?php
$tglin=date('Y-m-d');
$jamin=date('H:i:s');

		
mysql_select_db($database_hemera, $hemera);
$query_rinpay = "INSERT INTO finance_trf_ds (
tgl_payment, 
nominal, 
kd_ds, 
bank,
no_rek, 
atas_nama, 
bukti_trf, 
rek_hemera, 
sts_trf, 
alasan, 
trf_by
) VALUES (
'$_POST[tgl_trf]', 
'$_POST[nominal]', 
'$_POST[hf_kdds]', 
'$_POST[bank]', 
'$_POST[no_rek]', 
'$_POST[atas_nama]', 
'$_name_',
'$_POST[srek_hemera]', 
'$_POST[sapproval]',
'$_POST[reason]',
'$_SESSION[HEM_kd_user]'
)";
$rinpay = mysql_query($query_rinpay, $hemera) or die(mysql_error());

foreach($_POST['cbx'] as $key => $kdxx)
{

		echo " kd_product: ".$kdxx."<br>";
		mysql_select_db($database_hemera, $hemera);
		$query_rsts = "UPDATE trx_ds_detail SET 
		sts_wd='$_POST[sapproval]',
		wd_by='$_SESSION[HEM_kd_user]',
		tgl_wd='$_POST[tgl_trf]',
		jam_wd='$jamin'
		WHERE id_='$kdxx'";
		$rsts = mysql_query($query_rsts, $hemera) or die(mysql_error());


}
		

header("Location: ../../index.php?com=list_profit_adm_ds&layout=full");
?>