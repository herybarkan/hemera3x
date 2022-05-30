<?php require_once('../../Connections/hemera.php'); ?>
<?php
ob_start();
session_start();

date_default_timezone_set('Asia/Jakarta');



if (phpversion() > "4.0.6") {
	$HTTP_POST_FILES = &$_FILES;
}
define("MAX_SIZE",900000000000);
define("DESTINATION_FOLDER", "../../foto/");
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
$awal="REG";

$kd_reg = $awal.$kode.$zxtahun.$zxbulan.$zxtanggal.$zxjam.$zxmenit.$zxdetik;

$tglin=date('Y-m-d');

$xkd_suplier = mysql_real_escape_string($_POST['kd_suplier']);
$xnm_suplier = mysql_real_escape_string($_POST['nm_suplier']);
$xalamat_suplier = mysql_real_escape_string($_POST['alamat_suplier']);
$xcontact_person = mysql_real_escape_string($_POST['contact_person']);
$xemail = mysql_real_escape_string($_POST['email']);
$xno_hp = mysql_real_escape_string($_POST['no_hp']);

mysql_select_db($database_hemera, $hemera);
$query_rinsup = "INSERT INTO suplier (
kd_suplier,
nm_suplier,
alamat,
contact_person,
email,
no_hp,
foto,
tgl_in,
in_by
) VALUES (
'$xkd_suplier',
'$xnm_suplier',
'$xalamat_suplier',
'$xcontact_person',
'$xemail',
'$xno_hp',
'$_name_',
'$tglin',
'$_SESSION[HEM_kduser]'
)";
$rinsup = mysql_query($query_rinsup, $hemera) or die(mysql_error());

//header("Location: ../../index.php?com=product_suplier");
?>