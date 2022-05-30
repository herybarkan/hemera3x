<?php require_once('../../Connections/hemera.php'); ?>
<?php


$xsub_kategori = mysql_real_escape_string($_POST['nm_sub_kategori']);

mysql_select_db($database_hemera, $hemera);
$query_rkat = "UPDATE sub_kategori SET id_kategori='$_POST[skategori]', nm_sub_kategori='$xsub_kategori' WHERE id_='$_POST[hf_id]'";
$rkat = mysql_query($query_rkat, $hemera) or die(mysql_error());

header("Location: ../../index.php?com=sub_category");
?>