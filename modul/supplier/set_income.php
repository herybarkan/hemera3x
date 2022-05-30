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
$awal="WD";

$kd_wd = $awal.$kode.$zxtahun.$zxbulan.$zxtanggal.$zxjam.$zxmenit.$zxdetik;
?>
<?php
$hf_val=$_POST['hf_val'];


$xnom=0;
foreach($_POST['cb'] as $key => $kdxx)
{
		echo " kd_order: ".$kdxx."<br>";
		
mysql_select_db($database_hemera, $hemera);
$query_cek_nom = "SELECT
kd_order,
SUM(nominal) AS tot_nom
FROM
income_supplier WHERE kd_income='$kdxx'";
$cek_nom = mysql_query($query_cek_nom, $hemera) or die(mysql_error());
$row_cek_nom = mysql_fetch_assoc($cek_nom);
//$totalRows_cek_nom = mysql_num_rows($cek_nom);

echo " val: ".$row_cek_nom['tot_nom']."<br>";
echo " kd order: ".$row_cek_nom['kd_order']."<br>";

$xkdorder[]= $row_cek_nom['kd_order'];


mysql_select_db($database_hemera, $hemera);
$query_rtrxds = "UPDATE income_supplier SET
sts_wd='1',
tgl_wd='$tglin',
jam_wd='$jamin',
wd_by='$_SESSION[HEM_kd_user]'
WHERE kd_income='$kdxx'";
$rtrxds = mysql_query($query_rtrxds, $hemera) or die(mysql_error());
//$xnom+=$row_cek_nom['tot_harga_net'];
$xnom+=$row_cek_nom['tot_nom'];

}
echo "<br> total nominal: ".$xnom;
echo "<br>";

$array_class_xkdo = implode(",", $xkdorder); 
$xx_class_xkdo= $array_class_xkdo;
echo "kd_order: ".$xx_class_xkdo."";

mysql_select_db($database_hemera, $hemera);
$query_rwd = "INSERT INTO wd_supplier (
kd_wd, 
kd_supplier, 
kd_order,
tgl_wd, 
jam_wd, 
nominal
) VALUES (
'$kd_wd', 
'$row_rceksup[kd_suplier]', 
'$xx_class_xkdo',
'$tglin', 
'$jamin', 
'$xnom'
)";
$rwd = mysql_query($query_rwd, $hemera) or die(mysql_error());



header("Location: ../../index.php?com=xpenarikan_sup&layout=full");
?>