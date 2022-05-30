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


$_file_ = $HTTP_POST_FILES['file_foto1'];
if(is_uploaded_file($_file_['tmp_name']) && $HTTP_POST_FILES['file_foto1']['error'] == 0){
	$errStr = "";
	$_name_1 = $_file_['name'];
	$_type_ = $_file_['type'];
	$_tmp_name_ = $_file_['tmp_name'];
	$_size_ = $_file_['size'];
	if($_size_ > MAX_SIZE && MAX_SIZE > 0){
		$errStr = "File troppo pesante";
	}
	$_ext_ = explode(".", $_name_1);
	$_ext_ = strtolower($_ext_[count($_ext_)-1]);
	if(!in_array($_ext_, $_accepted_extensions_) && count($_accepted_extensions_) > 0){
		$errStr = "Estensione non valida";
	}
	if(!is_dir(DESTINATION_FOLDER) && is_writeable(DESTINATION_FOLDER)){
		$errStr = "Cartella di destinazione non valida";
	}
		if(@copy($_tmp_name_,DESTINATION_FOLDER . "/" . $_name_1)){
			$sts_upload="success";
		} else {
			$sts_upload="fail";
		}
}

//========================================================================================================================================

$_file_ = $HTTP_POST_FILES['file_foto2'];
if(is_uploaded_file($_file_['tmp_name']) && $HTTP_POST_FILES['file_foto1']['error'] == 0){
	$errStr = "";
	$_name_2 = $_file_['name'];
	$_type_ = $_file_['type'];
	$_tmp_name_ = $_file_['tmp_name'];
	$_size_ = $_file_['size'];
	if($_size_ > MAX_SIZE && MAX_SIZE > 0){
		$errStr = "File troppo pesante";
	}
	$_ext_ = explode(".", $_name_2);
	$_ext_ = strtolower($_ext_[count($_ext_)-1]);
	if(!in_array($_ext_, $_accepted_extensions_) && count($_accepted_extensions_) > 0){
		$errStr = "Estensione non valida";
	}
	if(!is_dir(DESTINATION_FOLDER) && is_writeable(DESTINATION_FOLDER)){
		$errStr = "Cartella di destinazione non valida";
	}
		if(@copy($_tmp_name_,DESTINATION_FOLDER . "/" . $_name_2)){
			$sts_upload="success";
		} else {
			$sts_upload="fail";
		}
}

//========================================================================================================================================

$_file_ = $HTTP_POST_FILES['file_foto3'];
if(is_uploaded_file($_file_['tmp_name']) && $HTTP_POST_FILES['file_foto3']['error'] == 0){
	$errStr = "";
	$_name_3 = $_file_['name'];
	$_type_ = $_file_['type'];
	$_tmp_name_ = $_file_['tmp_name'];
	$_size_ = $_file_['size'];
	if($_size_ > MAX_SIZE && MAX_SIZE > 0){
		$errStr = "File troppo pesante";
	}
	$_ext_ = explode(".", $_name_3);
	$_ext_ = strtolower($_ext_[count($_ext_)-1]);
	if(!in_array($_ext_, $_accepted_extensions_) && count($_accepted_extensions_) > 0){
		$errStr = "Estensione non valida";
	}
	if(!is_dir(DESTINATION_FOLDER) && is_writeable(DESTINATION_FOLDER)){
		$errStr = "Cartella di destinazione non valida";
	}
		if(@copy($_tmp_name_,DESTINATION_FOLDER . "/" . $_name_3)){
			$sts_upload="success";
		} else {
			$sts_upload="fail";
		}
}

//========================================================================================================================================

$_file_ = $HTTP_POST_FILES['file_foto4'];
if(is_uploaded_file($_file_['tmp_name']) && $HTTP_POST_FILES['file_foto4']['error'] == 0){
	$errStr = "";
	$_name_4 = $_file_['name'];
	$_type_ = $_file_['type'];
	$_tmp_name_ = $_file_['tmp_name'];
	$_size_ = $_file_['size'];
	if($_size_ > MAX_SIZE && MAX_SIZE > 0){
		$errStr = "File troppo pesante";
	}
	$_ext_ = explode(".", $_name_4);
	$_ext_ = strtolower($_ext_[count($_ext_)-1]);
	if(!in_array($_ext_, $_accepted_extensions_) && count($_accepted_extensions_) > 0){
		$errStr = "Estensione non valida";
	}
	if(!is_dir(DESTINATION_FOLDER) && is_writeable(DESTINATION_FOLDER)){
		$errStr = "Cartella di destinazione non valida";
	}
		if(@copy($_tmp_name_,DESTINATION_FOLDER . "/" . $_name_4)){
			$sts_upload="success";
		} else {
			$sts_upload="fail";
		}
}

//========================================================================================================================================

$_file_ = $HTTP_POST_FILES['file_foto5'];
if(is_uploaded_file($_file_['tmp_name']) && $HTTP_POST_FILES['file_foto5']['error'] == 0){
	$errStr = "";
	$_name_5 = $_file_['name'];
	$_type_ = $_file_['type'];
	$_tmp_name_ = $_file_['tmp_name'];
	$_size_ = $_file_['size'];
	if($_size_ > MAX_SIZE && MAX_SIZE > 0){
		$errStr = "File troppo pesante";
	}
	$_ext_ = explode(".", $_name_5);
	$_ext_ = strtolower($_ext_[count($_ext_)-1]);
	if(!in_array($_ext_, $_accepted_extensions_) && count($_accepted_extensions_) > 0){
		$errStr = "Estensione non valida";
	}
	if(!is_dir(DESTINATION_FOLDER) && is_writeable(DESTINATION_FOLDER)){
		$errStr = "Cartella di destinazione non valida";
	}
		if(@copy($_tmp_name_,DESTINATION_FOLDER . "/" . $_name_5)){
			$sts_upload="success";
		} else {
			$sts_upload="fail";
		}
}

//========================================================================================================================================





//$tglin=date('Y-m-d');

	if ($_name_1!="") 
		{
		$foto1=$_name_1;
		mysql_select_db($database_hemera, $hemera);
		$query_rdata1 = "INSERT INTO product_foto (kd_product, sku, foto) VALUES ('$_POST[hf_kd_product]', '$_POST[hf_sku]', '$foto1')
		";
		$rdata1 = mysql_query($query_rdata1, $hemera) or die(mysql_error());
		}
elseif ($_name_1=="") {$foto1="";}

	if ($_name_2!="") 
		{
		$foto2=$_name_2;
		mysql_select_db($database_hemera, $hemera);
		$query_rdata2 = "INSERT INTO product_foto (kd_product, sku, foto) VALUES ('$_POST[hf_kd_product]', '$_POST[hf_sku]', '$foto2')
		";
		$rdata2 = mysql_query($query_rdata2, $hemera) or die(mysql_error());
		}
elseif ($_name_2=="") {$foto2="";}

	if ($_name_3!="") 
		{
		$foto3=$_name_3;
		mysql_select_db($database_hemera, $hemera);
		$query_rdata3 = "INSERT INTO product_foto (kd_product, sku, foto) VALUES ('$_POST[hf_kd_product]', '$_POST[hf_sku]', '$foto3')
		";
		$rdata3 = mysql_query($query_rdata3, $hemera) or die(mysql_error());
		}
elseif ($_name_3=="") {$foto3="";}

	if ($_name_4!="") 
		{
		$foto4=$_name_4;
		mysql_select_db($database_hemera, $hemera);
		$query_rdata4 = "INSERT INTO product_foto (kd_product, sku, foto) VALUES ('$_POST[hf_kd_product]', '$_POST[hf_sku]', '$foto4')
		";
		$rdata4 = mysql_query($query_rdata4, $hemera) or die(mysql_error());
		}
elseif ($_name_4=="") {$foto4="";}

	if ($_name_5!="") 
		{
		$foto5=$_name_5;
		mysql_select_db($database_hemera, $hemera);
		$query_rdata5 = "INSERT INTO product_foto (kd_product, sku, foto) VALUES ('$_POST[hf_kd_product]', '$_POST[hf_sku]', '$foto5')
		";
		$rdata5 = mysql_query($query_rdata5, $hemera) or die(mysql_error());
		}
elseif ($_name_5=="") {$foto5="";}



header("Location: ../../index.php?com=list_sup_product&layout=full");
?>