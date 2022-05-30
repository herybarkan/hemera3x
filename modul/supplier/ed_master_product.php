<?php require_once('../../Connections/hemera.php'); ?>
<?php
ob_start();
session_start();

date_default_timezone_set('Asia/Jakarta');



if (phpversion() > "4.0.6") {
	$HTTP_POST_FILES = &$_FILES;
}
define("MAX_SIZE",900000000000);
define("DESTINATION_FOLDER", "../../foto/product/");
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

$tglin=date('Y-m-d');

	if ($_name_!="") {$xfoto="foto_utama='$_name_',";}
elseif ($_name_=="") {$xfoto="";}

$xkd_suplier = mysql_real_escape_string($_POST['ssuplier']);
$xkd_warna = mysql_real_escape_string($_POST['scolor']);
$xkd_size = mysql_real_escape_string($_POST['ssize']);
$xsku = mysql_real_escape_string($_POST['kd_sku']);
$xkategori = mysql_real_escape_string($_POST['skategori']);
$xsub_kategori = mysql_real_escape_string($_POST['ssub_kategori']);
$xnm_product = mysql_real_escape_string($_POST['nm_product']);
$xharga = mysql_real_escape_string($_POST['harga']);
$xdiskon = mysql_real_escape_string($_POST['diskon']);
$xharga_net = mysql_real_escape_string($_POST['harga_net']);
$xberat = mysql_real_escape_string($_POST['berat']);
$xpanjang = mysql_real_escape_string($_POST['panjang']);
$xlebar = mysql_real_escape_string($_POST['lebar']);
$xtinggi = mysql_real_escape_string($_POST['tinggi']);
$xdeskripsi = mysql_real_escape_string($_POST['deskripsi']);
$xldeskripsi = mysql_real_escape_string($_POST['long_deskripsi']);

mysql_select_db($database_hemera, $hemera);
$query_rinsup = "UPDATE product_master SET
kd_suplier='$xkd_suplier',
kd_warna='$xkd_warna',
kd_size='$xkd_size',
sku='$xsku',
kategori='$xkategori',
sub_kategori='$xsub_kategori',
nm_product='$xnm_product',
harga='$xharga',
diskon='$xdiskon',
harga_net='$xharga_net',
berat='$xberat',
panjang='$xpanjang',
lebar='$xlebar',
tinggi='$xtinggi',
deskripsi='$xdeskripsi',
long_deskripsi='$xldeskripsi',
$xfoto
tgl_input='$tglin',
in_by='$_SESSION[HEM_kd_user]'
WHERE id_='$_POST[hf_id]'
";
$rinsup = mysql_query($query_rinsup, $hemera) or die(mysql_error());

header("Location: ../../index.php?com=list_sup_product&layout=full");
?>