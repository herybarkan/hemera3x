<?php require_once('../../Connections/hemera.php'); ?>
<?php


$xkategori = mysql_real_escape_string($_POST['nm_kategori']);

mysql_select_db($database_hemera, $hemera);
$query_rkat = "UPDATE kategori SET nm_kategori='$xkategori' WHERE id_='$_POST[hf_id]'";
$rkat = mysql_query($query_rkat, $hemera) or die(mysql_error());

header("Location: ../../index.php?com=category");
?>