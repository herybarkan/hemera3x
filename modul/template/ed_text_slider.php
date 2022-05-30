<?php require_once('../../Connections/hemera.php'); ?>
<?php
ob_start();
session_start();

date_default_timezone_set('Asia/Jakarta');



mysql_select_db($database_hemera, $hemera);
$query_rslide = "UPDATE ds_slider SET
text_large= '$_POST[text_besar]',
text_small= '$_POST[text_kecil1]',
text_small2= '$_POST[text_kecil2]'
WHERE id_='$_POST[hf_id]'";
$rslide = mysql_query($query_rslide, $hemera) or die(mysql_error());



header("Location: ../../index.php?com=templates_ds");
