<?php require_once('../../Connections/hemera.php'); ?>
<?php


$xnm_size = mysql_real_escape_string($_POST['nm_size']);
$xkd_size = mysql_real_escape_string($_POST['kd_size']);

mysql_select_db($database_hemera, $hemera);
$query_rkat = "DELETE FROM product_size WHERE id_='$_GET[id_]'";
$rkat = mysql_query($query_rkat, $hemera) or die(mysql_error());

header("Location: ../../index.php?com=product_size");
?>