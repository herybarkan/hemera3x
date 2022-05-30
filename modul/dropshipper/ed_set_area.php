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
$query_rset = "UPDATE dropshipper_set SET
area='$area',
markup='$markup'
WHERE
kd_ds='$hf_kdds'";
$rset = mysql_query($query_rset, $hemera) or die(mysql_error());


header("Location: ../../index.php?com=set_area_markup_ds&layout=full");
}
header("Location: ../../index.php?com=set_area_markup_ds&layout=full");

?>