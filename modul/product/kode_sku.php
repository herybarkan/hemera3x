<?php require_once('../../Connections/hemera.php'); ?>

<?php
mysql_select_db($database_hemera, $hemera);
$query_rcangka = "SELECT COUNT(id_) AS jml_prod FROM product_master";
$rcangka = mysql_query($query_rcangka, $hemera) or die(mysql_error());
$row_rcangka = mysql_fetch_assoc($rcangka);
$totalRows_rcangka = mysql_num_rows($rcangka);

$angka=$row_rcangka['jml_prod']+1;

	 if ($angka >= 1 && $angka < 10) {$pref="000";}
elseif ($angka >= 10 && $angka < 100) {$pref="00";}
elseif ($angka >= 100 && $angka < 1000) {$pref="0";}



?>

<?php
$ksup = $_GET['get_spl'];
$kcol = $_GET['get_col'];
$ksiz = $_GET['get_siz'];

$kx_sku = $ksup.$kcol.$ksiz.$pref.$angka;

?>
<input name="kd_sku" type="text" class="form-control" id="kd_sku" value="<?php echo $kx_sku; ?>">