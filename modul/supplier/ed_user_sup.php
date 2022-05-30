<?php require_once('../../Connections/hemera.php'); ?>
<?php
ob_start();
session_start();

date_default_timezone_set('Asia/Jakarta');

$tglin=date('Y-m-d');
$passx=md5($_POST['password']);

	if ($_POST['password']!="") {$xpass=", password='$passx'";}
elseif ($_POST['password']=="") {$xpass="";}

mysql_select_db($database_hemera, $hemera);
$query_rinsup = "UPDATE user_ SET
nama='$_POST[nama]',
nm_toko='$_POST[nm_toko]',
username='$_POST[username]'
$xpass
WHERE kd_user='$_SESSION[HEM_kd_user]'";
$rinsup = mysql_query($query_rinsup, $hemera) or die(mysql_error());

header("Location: ../../index.php?com=biodata_sup&layout=full");
?>