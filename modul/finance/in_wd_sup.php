<?php require_once('../../Connections/hemera.php'); ?>
<?php
ob_start();
session_start();

date_default_timezone_set('Asia/Jakarta');

$tglin=date('Y-m-d');
$jamin=date('H:i:s');

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
$awal="WD";

$kd_wdx = $awal.$kode.$zxtahun.$zxbulan.$zxtanggal.$zxjam.$zxmenit.$zxdetik;

if (phpversion() > "4.0.6") {
	$HTTP_POST_FILES = &$_FILES;
}
define("MAX_SIZE",900000000000);
define("DESTINATION_FOLDER", "../../foto/trf_profit/");

$_accepted_extensions_ = "jpg,jpeg,png,gif";
if(strlen($_accepted_extensions_) > 0){
	$_accepted_extensions_ = @explode(",",$_accepted_extensions_);
} else {
	$_accepted_extensions_ = array();
}
$_file_ = $HTTP_POST_FILES['file'];
if(is_uploaded_file($_file_['tmp_name']) && $HTTP_POST_FILES['file']['error'] == 0){
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
		if ($_name_ !="") {$_xfoto=$kd_wdx.".".$_ext_;}
	elseif ($_name_ =="") {$_xfoto="";}
	
		if(@copy($_tmp_name_,DESTINATION_FOLDER . "/" . $_xfoto)){
			$sts_upload="success";
		} else {
			$sts_upload="fail";
		}
}

//========================================================================================================================================


?>
<?php
	if ($_xfoto !="") {$xfoto="bukti_trf='$_xfoto',";}
elseif ($_xfoto =="") {$xfoto="";}

mysql_select_db($database_hemera, $hemera);
$query_rtrxds = "UPDATE wd_supplier SET
bank='$_POST[sbank]',
no_rek='$_POST[no_rek]',
atas_nama='$_POST[atas_nama]',
sts_wd='1',
$xfoto
tgl_wdx='$tglin',
jam_wdx='$jamin',
wdx_by='$_SESSION[HEM_kd_user]'
WHERE id_='$_POST[hf_id]'";
$rtrxds = mysql_query($query_rtrxds, $hemera) or die(mysql_error());


header("Location: ../../index.php?com=withrawal_sup&layout=full");
?>