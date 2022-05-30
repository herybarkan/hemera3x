<?php require_once('../../Connections/hemera.php'); ?>
<?php
ob_start();
session_start();

date_default_timezone_set('Asia/Jakarta');

$tglin=date('Y-m-d');
$jamin=date('H:i:s');


mysql_select_db($database_hemera, $hemera);
$query_rceksup = "SELECT * FROM suplier WHERE kd_user='$_SESSION[HEM_kd_user]'";
$rceksup = mysql_query($query_rceksup, $hemera) or die(mysql_error());
$row_rceksup = mysql_fetch_assoc($rceksup);
$totalRows_rceksup = mysql_num_rows($rceksup);



?>
<?php
srand ((double) microtime() * 10000000);
$input = array ("A", "B", "C", "D", "E","F","G","H","I","J","K","L","M","N","O","P","Q",
"R","S","T","U","V","W","X","Y","Z");
$rand_index = array_rand($input,8);
$kode= $input[$rand_index[3]].$input[$rand_index[5]].$input[$rand_index[4]].$input[$rand_index[2]].$input[$rand_index[1]];

$zxtahun=date('y');
$zxbulan=date('m');
$zxtanggal=date('d');
$zxjam=date('H');
$zxmenit=date('i');
$zxdetik=date('s');
$awal="TAR";

$kd_income = $awal.$kode.$zxtahun.$zxbulan.$zxtanggal.$zxjam.$zxmenit.$zxdetik;
?>
<?php
$hf_val=$_POST['hf_val'];


$xnom=0;
foreach($_POST['cb'] as $key => $kdxx)
{
		echo " kd_order: ".$kdxx."<br>";
		
		
		mysql_select_db($database_hemera, $hemera);
$query_cek_nom = "SELECT
product_master.kd_suplier,
SUM(product_master.harga_net) AS tot_harga_net,
trx_ds.kd_order
FROM
trx_ds_detail
JOIN trx_ds
ON trx_ds_detail.kd_order = trx_ds.kd_order 
JOIN product_master
ON product_master.kd_product = trx_ds_detail.kd_prod 
JOIN ds_customer
ON ds_customer.kd_order = trx_ds_detail.kd_order WHERE trx_ds.kd_order='$kdxx'";
$cek_nom = mysql_query($query_cek_nom, $hemera) or die(mysql_error());
$row_cek_nom = mysql_fetch_assoc($cek_nom);
//$totalRows_cek_nom = mysql_num_rows($cek_nom);

echo " val: ".$row_cek_nom['tot_harga_net']."<br>";

$xkdorder[]= $row_cek_nom['kd_order'];

mysql_select_db($database_hemera, $hemera);
$query_rtrxds = "UPDATE trx_ds SET
sts_tarik='1',
tgl_tarik='$tglin',
jam_tarik='$jamin',
tarik_by='$_SESSION[HEM_kd_user]',
kd_income='$kd_income'
WHERE kd_order='$kdxx'";
$rtrxds = mysql_query($query_rtrxds, $hemera) or die(mysql_error());
$xnom+=$row_cek_nom['tot_harga_net'];
}

$array_class_xkdo = implode(",", $xkdorder); 
$xx_class_xkdo= $array_class_xkdo;
echo "kd_order: ".$xx_class_xkdo."";

mysql_select_db($database_hemera, $hemera);
$query_rsaldo = "INSERT INTO income_supplier (kd_income, kd_supplier, kd_order, tgl_tarik, jam_tarik, nominal) VALUES ('$kd_income', '$row_rceksup[kd_suplier]', '$xx_class_xkdo', '$tglin', '$jamin', '$xnom')";
$rsaldo = mysql_query($query_rsaldo, $hemera) or die(mysql_error());



header("Location: ../../index.php?com=xincome_sup&layout=full");
?>