<?php require_once('../../Connections/hemera.php'); ?>
<?php


$xsub_kategori = mysql_real_escape_string($_POST['nm_sub_kategori']);

mysql_select_db($database_hemera, $hemera);
$query_rkat = "INSERT INTO sub_kategori (id_kategori, nm_sub_kategori) VALUES ('$_POST[skategori]','$xsub_kategori')";
$rkat = mysql_query($query_rkat, $hemera) or die(mysql_error());

header("Location: ../../index.php?com=sub_category");
?>