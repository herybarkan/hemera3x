<?php require_once('../../Connections/hemera.php'); ?>
<?php
ob_start();
session_start();

date_default_timezone_set('Asia/Jakarta');


$tglin=date('Y-m-d');

$hf_kdds= $_POST['hf_kd_ds'];
$area=$_POST['sarea'];
$markup=$_POST['markup'];

if ($_POST['sarea']!="" && $_POST['markup']!="")
{
mysql_select_db($database_hemera, $hemera);
$query_rset = "INSERT INTO dropshipper_set (
kd_ds,
area,
markup
) VALUES (
'$hf_kdds',
'$area',
'$markup')";
$rset = mysql_query($query_rset, $hemera) or die(mysql_error());


header("Location: ../../index.php");
}
header("Location: ../../index.php");

?>