<?php require_once('../../Connections/hemera.php'); ?>
<?php
ob_start();
session_start();

date_default_timezone_set('Asia/Jakarta');


mysql_select_db($database_hemera, $hemera);
$query_rdf = "DELETE FROM product_foto WHERE id_='$_GET[id_]'";
$rdf = mysql_query($query_rdf, $hemera) or die(mysql_error());

header("Location: ../../index.php?com=list_master_product&layout=full");
?>