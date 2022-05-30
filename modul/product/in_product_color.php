<?php require_once('../../Connections/hemera.php'); ?>
<?php


$xnm_color = mysql_real_escape_string($_POST['nm_color']);
$xkd_color = mysql_real_escape_string($_POST['kd_color']);

mysql_select_db($database_hemera, $hemera);
$query_rkat = "INSERT INTO product_color (kd_color,nm_color) VALUES ('$xkd_color','$xnm_color')";
$rkat = mysql_query($query_rkat, $hemera) or die(mysql_error());

header("Location: ../../index.php?com=product_color");
?>