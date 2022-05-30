<?php require_once('../../Connections/hemera.php'); ?>
<?php
ob_start();
session_start();

date_default_timezone_set('Asia/Jakarta');

if (phpversion() > "4.0.6") {
	$HTTP_POST_FILES = &$_FILES;
}
define("MAX_SIZE",900000000000);
define("DESTINATION_FOLDER", "../../img/template/right_panel/");
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

if ($_name_!="" && $_POST['rb_slider']=="")
{

mysql_select_db($database_hemera, $hemera);
$query_rslider = "UPDATE ds_right_panel SET
foto= '$_name_' WHERE id_='$_POST[hf_id]'";
$rslider = mysql_query($query_rslider, $hemera) or die(mysql_error());

}
elseif ($_name_=="" && $_POST['rb_slider']!="")
{

mysql_select_db($database_hemera, $hemera);
$query_rslider = "UPDATE ds_right_panel SET
foto= '$_POST[rb_slider]' WHERE id_='$_POST[hf_id]'";
$rslider = mysql_query($query_rslider, $hemera) or die(mysql_error());

}
/*elseif ($_name_=="" && $_POST['rb_slider']=="")
{

mysql_select_db($database_hemera, $hemera);
$query_rslider = "UPDATE ds_slider SET
foto= '$_POST[rb_slider]' WHERE id_='$_POST[hf_id]'";
$rslider = mysql_query($query_rslider, $hemera) or die(mysql_error());

}*/

$xtext_1=addslashes($_POST['text_1']);
$xtext_2=addslashes($_POST['text_2']);
$xtext_3=addslashes($_POST['text_3']);
$xtext_4=addslashes($_POST['text_4']);

mysql_select_db($database_hemera, $hemera);
$query_rslidex = "UPDATE ds_right_panel SET
text1= '$xtext_1',
text2= '$xtext_2',
text3= '$xtext_3',
text4= '$xtext_4'
WHERE id_='$_POST[hf_id]'";
$rslidex = mysql_query($query_rslidex, $hemera) or die(mysql_error());

header("Location: ../../index.php?com=right_panel");


/*echo "hf_id: ".$_POST['hf_id']."<br>";
echo "text 1: ".$_POST['text_1']."<br>";
echo "text 2: ".$_POST['text_2']."<br>";
echo "text 3: ".$_POST['text_3']."<br>";
echo "text 4: ".$_POST['text_4']."<br>";*/


?>