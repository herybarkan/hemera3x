<?php require_once('../../Connections/hemera.php'); ?>
<?php


$xnm_color = mysql_real_escape_string($_POST['nm_color']);
$xkd_color = mysql_real_escape_string($_POST['kd_color']);

mysql_select_db($database_hemera, $hemera);
$query_rkat = "UPDATE product_color SET kd_color='$xkd_color', nm_color='$xnm_color' WHERE id_='$_POST[hf_id]'";
$rkat = mysql_query($query_rkat, $hemera) or die(mysql_error());

header("Location: ../../index.php?com=product_color");
?>