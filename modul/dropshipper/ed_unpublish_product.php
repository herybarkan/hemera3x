<?php require_once('../../Connections/hemera.php'); ?>
<?php
ob_start();
session_start();

date_default_timezone_set('Asia/Jakarta');

?>
<?php
$harga_baru=$_POST['harga_up'];
$tglin=date('Y-m-d');

foreach($_POST['cb'] as $key => $kdxx)
{

		echo " kd_product: ".$kdxx."<br>";
		//echo " hpp: ".$key[$xhpp]."<br>";
		
mysql_select_db($database_hemera, $hemera);
$query_rchpp = "SELECT kd_product, nm_product, harga_net FROM product_master WHERE kd_product='$kdxx'";
$rchpp = mysql_query($query_rchpp, $hemera) or die(mysql_error());
$row_rchpp = mysql_fetch_assoc($rchpp);
$totalRows_rchpp = mysql_num_rows($rchpp);

		echo " hpp: ".$row_rchpp['harga_net']."<br>";
		echo " harga baru: ".$harga_baru[$key]."<br>";
		
			if ($harga_baru[$key]!="") 
				{
					//$hrg_baru=$harga_baru[$key];
					$margin=$harga_baru[$key]-$row_rchpp['harga_net'];
					
				}
		elseif ($harga_baru[$key]=="") 
				{
					$margin="";
					
				}
		echo " margin: ".$margin."<br>";
		
		
mysql_select_db($database_hemera, $hemera);
$query_rinsup = "UPDATE ds_product SET
published='0'
WHERE kd_product='$kdxx'";
$rinsup = mysql_query($query_rinsup, $hemera) or die(mysql_error());
		
		
}

header("Location: ../../index.php?com=list_ds_published_product&layout=full");
?>