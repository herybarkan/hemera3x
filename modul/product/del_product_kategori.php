<?php require_once('../../Connections/hemera.php'); ?>
<?php


$xkategori = mysql_real_escape_string($_POST['nm_kategori']);

mysql_select_db($database_hemera, $hemera);
$query_rkat = "DELETE FROM kategori WHERE id_='$_GET[id_]'";
$rkat = mysql_query($query_rkat, $hemera) or die(mysql_error());

header("Location: ../../index.php?com=category");
?>