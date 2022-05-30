<?php require_once('../../Connections/hemera.php'); ?>
<?php
ob_start();
session_start();

date_default_timezone_set('Asia/Jakarta');

?>
<?php

mysql_select_db($database_hemera, $hemera);
$query_rchpp = "SELECT * FROM ds_product WHERE id_='$_POST[hf_id]'";
$rchpp = mysql_query($query_rchpp, $hemera) or die(mysql_error());
$row_rchpp = mysql_fetch_assoc($rchpp);
$totalRows_rchpp = mysql_num_rows($rchpp);

		
			if ($_POST['new_price']!="") 
				{
					$margin=$_POST['new_price']-$row_rchpp['hpp'];
					
mysql_select_db($database_hemera, $hemera);
$query_rinsup = "UPDATE ds_product SET
hjual='$_POST[new_price]',
margin='$margin'
WHERE id_='$_POST[hf_id]'";
$rinsup = mysql_query($query_rinsup, $hemera) or die(mysql_error());
				}
				
				//echo $_POST['new_price']."<br>";
				//echo $_POST['hf_id'];
		
		

header("Location: ../../index.php?com=list_ds_published_product&layout=full");
?>