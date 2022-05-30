<?php require_once('../../Connections/hemera.php'); ?>
<?php
ob_start();
session_start();

date_default_timezone_set('Asia/Jakarta');



mysql_select_db($database_hemera, $hemera);
$query_rabout = "UPDATE ds_about SET
visi= '$_POST[visi]',
misi= '$_POST[misi]',
title= '$_POST[title]',
whoweare= '$_POST[whoweare]'    
WHERE id_='$_POST[hf_id]'";
$rabout = mysql_query($query_rabout, $hemera) or die(mysql_error());



header("Location: ../../index.php?com=tabout");
