<?php require_once('../../Connections/hemera.php'); ?>
<?php


$xkategori = mysql_real_escape_string($_POST['nm_kategori']);

mysql_select_db($database_hemera, $hemera);
$query_rkat = "INSERT INTO kategori (nm_kategori) VALUES ('$xkategori')";
$rkat = mysql_query($query_rkat, $hemera) or die(mysql_error());

header("Location: ../../index.php?com=category");
?>