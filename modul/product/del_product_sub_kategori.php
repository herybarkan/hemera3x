<?php require_once('../../Connections/hemera.php'); ?>
<?php


$xsub_kategori = mysql_real_escape_string($_POST['nm_sub_kategori']);

mysql_select_db($database_hemera, $hemera);
$query_rkat = "DELETE FROM sub_kategori WHERE id_='$_GET[id_]'";
$rkat = mysql_query($query_rkat, $hemera) or die(mysql_error());

header("Location: ../../index.php?com=sub_category");
?>