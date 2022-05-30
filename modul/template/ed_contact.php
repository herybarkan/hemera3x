<?php require_once('../../Connections/hemera.php'); ?>
<?php
ob_start();
session_start();

date_default_timezone_set('Asia/Jakarta');

mysql_select_db($database_hemera, $hemera);
$query_rcontact = "UPDATE ds_contact SET
kantor_alamat= '$_POST[alamat]',
kantor_telpon= '$_POST[telp_kantor]',
kantor_email= '$_POST[email_kantor]',
toko_alamat= '$_POST[alamat_toko]',   
toko_telpon= '$_POST[telpon_toko]',   
toko_wa= '$_POST[wa]',   
toko_ig= '$_POST[ig]',   
toko_fb= '$_POST[fb]'    
WHERE id_='$_POST[hf_id]'";
$rcontact = mysql_query($query_rcontact, $hemera) or die(mysql_error());



header("Location: ../../index.php?com=tcontact");
