<?php require_once('../../Connections/hemera.php'); ?>
<?php
ob_start();
session_start();

date_default_timezone_set('Asia/Jakarta');

require '../phpmailler/PHPMailerAutoload.php';
require '../phpmailler/class.phpmailer.php';
require '../phpmailler/class.phpmaileroauth.php';


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
$awal="DSP";

$kd_dropshiper = $awal.$kode.$zxtahun.$zxbulan.$zxtanggal.$zxjam.$zxmenit.$zxdetik;

$tglin=date('Y-m-d');

$xemail_toko="sistem@".$_POST['hf_nm_domain'];
$pass_email_toko="MiraHemeraSistem2021";

if ($_POST['sapproval']=="1")
{
	
	
mysql_select_db($database_hemera, $hemera);
$query_rinsup = "INSERT INTO dropshiper (
kd_dropshiper,
kd_user,
theme,
nm_toko,
nm_domain,
tagline_toko,
logo,
icon,
email_toko,
password_email_toko,
tgl_in,in_by
) VALUES (
'$kd_dropshiper',
'$_POST[hf_kduser]',
'1',
'$_POST[hf_nm_toko]',
'$_POST[hf_nm_domain]',
'Welcome to My Store',
'logo1.png',
'favicon-32x32.png',
'$xemail_toko',
'$pass_email_toko',
'$tglin',
'$_SESSION[HEM_kduser]')";
$rinsup = mysql_query($query_rinsup, $hemera) or die(mysql_error());

mysql_select_db($database_hemera, $hemera);
$query_rup = "UPDATE user_ SET
aktif='$_POST[sapproval]'
WHERE kd_user='$_POST[hf_kduser]'";
$rup = mysql_query($query_rup, $hemera) or die(mysql_error());

mysql_select_db($database_hemera, $hemera);
$query_rinmem = "INSERT INTO member (kd_user) VALUES ('$_POST[hf_kduser]')";
$rinmem = mysql_query($query_rinmem, $hemera) or die(mysql_error());

mysql_select_db($database_hemera, $hemera);
$query_rmenu = "INSERT INTO `ds_banner_category` (`kd_dropshipper`, `theme`, `id_foto`, `foto`, `title`, `sub_title`, `link`, `aktif`) VALUES
('$kd_dropshiper', '1', 1, 'banner-1.jpg', 'Sweatshirts & Hoodies', '', 'sweater', 1),
('$kd_dropshiper', '1', 2, 'banner-2.jpg', 'Men Jacket', '', 'mens', 1),
('$kd_dropshiper', '1', 3, 'banner-3.jpg', 'Women Outfits', '', 'women', 1),
('$kd_dropshiper', '1', 4, 'banner-4.jpg', 'Bags', '', 'bags', 1);
";
$rmenu = mysql_query($query_rmenu, $hemera) or die(mysql_error());

mysql_select_db($database_hemera, $hemera);
$query_rmenu2 = "INSERT INTO `ds_menu` (`kd_dropshipper`, `nm_menu`, `aktif`) VALUES
('$kd_dropshiper', 'Home', 1),
('$kd_dropshiper', 'Shop', 1),
('$kd_dropshiper', 'Promo', 1),
('$kd_dropshiper', 'Best Seller', 1),
('$kd_dropshiper', 'About', 1),
('$kd_dropshiper', 'Contact', 1);
";
$rmenu2 = mysql_query($query_rmenu2, $hemera) or die(mysql_error());

mysql_select_db($database_hemera, $hemera);
$query_rcmenu = "SELECT * FROM ds_menu WHERE kd_dropshipper='$kd_dropshiper' AND nm_menu='Shop'";
$rcmenu = mysql_query($query_rcmenu, $hemera) or die(mysql_error());
$row_rcmenu = mysql_fetch_assoc($rcmenu);
$totalRows_rcmenu = mysql_num_rows($rcmenu);


mysql_select_db($database_hemera, $hemera);
$query_rmenu3 = "INSERT INTO `ds_submenu` (`kd_dropshipper`, `id_menu`, `nm_submenu`, `aktif`) VALUES
('$kd_dropshiper', '$row_rcmenu[id_]', 'Store Choice', 1),
('$kd_dropshiper', '$row_rcmenu[id_]', 'New Arrival', 1),
('$kd_dropshiper', '$row_rcmenu[id_]', 'Customer Favorite', 1);
";
$rmenu3 = mysql_query($query_rmenu3, $hemera) or die(mysql_error());

mysql_select_db($database_hemera, $hemera);
$query_rmenu4 = "INSERT INTO `ds_slider` (`kd_dropshipper`, `theme`, `foto`, `text_large`, `text_small`, `text_small2`, `aktif`) VALUES
('$kd_dropshiper', '1', 'slide-1.jpg', 'SUMMER HEMERA', 'xxxx', 'aaaa', 1),
('$kd_dropshiper', '1', 'slide-2.jpg', 'PROMO', 'zzzz', 'ccccc', 1);
";
$rmenu4 = mysql_query($query_rmenu4, $hemera) or die(mysql_error());

mysql_select_db($database_hemera, $hemera);
$query_rdatax4 = "INSERT INTO `ds_shop_category` (`kd_dropshipper`, `nama`, `link`, `id_foto`, `foto`, `ukuran`, `aktif`) VALUES
('$kd_dropshiper', 'New Arrivals', 'New Arrivals', '1', 'banner-1.jpg', '570 x 550 Pixel', 1),
('$kd_dropshiper', 'Store Choice', 'Store Choice', '2', 'banner-2.jpg', '570 x 260 Pixel ', 1),
('$kd_dropshiper', 'Customer Favorite', 'Customer Favorite', '3', 'banner-3.jpg', '570 x 260 Pixel ',1)
";
$rdatax4 = mysql_query($query_rdatax4, $hemera) or die(mysql_error());

mysql_select_db($database_hemera, $hemera);
$query_rdatax5 = "INSERT INTO `ds_about` (`kd_ds`, `theme`, `image_atas`, `img1`, `img2`, `visi`, `misi`, `title`, `whoweare`, `visi_show`, `misi_show`, `aktif`) VALUES
('$kd_dropshiper', 1, 'about-header-bg.jpg', 'img-1.jpg', 'img-2.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh.', 'Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus.\r\nPraesent elementum hendrerit tortor. Sed semper lorem at felis.', 'Pellentesque odio nisi, euismod pharetra a ultricies\r\nin diam. Sed arcu. Cras consequat', 'Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Suspendisse potenti. Sed egestas, ante et vulputate volutpat, uctus metus libero eu augue.', 1, 1, 1);
";
$rdatax5 = mysql_query($query_rdatax5, $hemera) or die(mysql_error());

mysql_select_db($database_hemera, $hemera);
$query_rdatax6 = "INSERT INTO `ds_contact` (`kd_ds`, `theme`, `img_atas`, `kantor_alamat`, `kantor_telpon`, `kantor_email`, `toko_alamat`, `toko_telpon`, `toko_wa`, `toko_ig`, `toko_fb`, `aktif`) VALUES
('$kd_dropshiper', 1, 'contact-header-bg.jpg', '70 Washington Square South New York, NY 10012, United States', '021909090', 'velshop@gmail.com', 'jl. xxxx no 23', '081330393039', '081330393039', 'xxxx', 'cccccc', 1);
";
$rdatax6 = mysql_query($query_rdatax6, $hemera) or die(mysql_error());

mysql_select_db($database_hemera, $hemera);
$query_rdatax7 = "INSERT INTO `ds_inspired_you` (`kd_ds`, `theme`, `foto`, `aktif`) VALUES
('$kd_dropshiper', 1, 'img-3.jpg', 1),
('$kd_dropshiper', 1, 'igx.jpg', 1),
('$kd_dropshiper', 1, 'iy3.jpg', 1),
('$kd_dropshiper', 1, 'iy4.jpg', 1),
('$kd_dropshiper', 1, 'iy5.jpg', 1);
";
$rdatax7 = mysql_query($query_rdatax7, $hemera) or die(mysql_error());

mysql_select_db($database_hemera, $hemera);
$query_rdatax8 = "INSERT INTO `ds_right_panel` (`kd_ds`, `panel`, `text1`, `text2`, `text3`, `text4`, `foto`, `aktif`) VALUES
('$kd_dropshiper', 1, 'Belanja Mudah', 'Cepat & Aman', 'Produk Kami Berharga Terjangkau', 'Namun dengan Kualitas yg Premium', 'rrp1.jpg', '1'),
('$kd_dropshiper', 2, 'Waktunya Belanja', 'Lebih Hemat', 'Lebih Ekonomis', 'Buktikan aja', 't_rp1.jpg', '1'),
('$kd_dropshiper', 3, 'Pilihan Terbaik', 'Online Store', 'Produk Fashion', 'Kita', 'rp1.jpg', '1');
";
$rdatax8 = mysql_query($query_rdatax8, $hemera) or die(mysql_error());

//======================================================================================================================================
// create folder.....

$estructure = '../../'.$_POST['hf_nm_domain'].'';

/*
if(!mkdir($estructure, 0755, true)){
    echo "<br/><br/>ERROR: Fail to create the folder...<br/><br/>"; 
}  else echo "<br/><br/>!! Folder Created...<br/><br/>";
*/

chmod($estructure, 0755);

//extract zip
$zip = new ZipArchive;
if ($zip->open('../../master/mweb.zip') === TRUE) {
    $zip->extractTo('../../'.$_POST['hf_nm_domain'].'/');
    $zip->close();
    echo 'ok';
} else {
    echo 'failed';
}

//create id kdds
$text = $kd_dropshiper;
$kdds = var_export($text, true);
$var = "<?php\n\n\$kdds = $kdds;\n\n?>";
file_put_contents('../../'.$_POST['hf_nm_domain'].'/'.'file_kdds.php', $var);
//======================================================================================================================================

$email = $_POST['hf_email'];
//$email = "herybarkan@gmail.com";
$to = $email; 
//$subject = "Konfirmasi Aktivasi Akun ". $email;

$mailz = new PHPMailer;

// Konfigurasi SMTP
$mailz->isSMTP();
$mailz->Host = 'mail.hemerapartner.com';
$mailz->SMTPAuth = true;
$mailz->Username = 'sistem@hemerapartner.com';
$mailz->Password = 'MiraHemera2021';
$mailz->SMTPSecure = 'tls';
$mailz->Port = 587;
/*$mailz->smtpConnect(
	    array(
	        "ssl" => array(
	            "verify_peer" => false,
	            "verify_peer_name" => false,
	            "allow_self_signed" => true
	        )
	    )
	);*/

$mailz->setFrom('sistem@hemerapartner.com', 'Registration');
$mailz->addReplyTo('sistem@hemerapartner.com', 'Registration');

// Menambahkan penerima
$mailz->addAddress($email);
//$mail->addAddress('tambahlong@gmail.com');

// Subjek email
$mailz->Subject = 'Konfirmasi Aktivasi Akun';

// Mengatur format email ke HTML
$mailz->isHTML(true);

         $mailContent = '<table width="90%" border="0" align="center">'.
' <tr>'.
'   <td align="center"><img src="https://hemerapartner.com/assets/images/favicon.png" width="176" height="176" /></td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center; font-weight: bold; font-size: 24px;">SELAMAT DATANG</td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center">DI HEMERA PARTNER</td>'.
' </tr>'.
' <tr>'.
'   <td>&nbsp;</td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center">Selamat, Akun Dropshipper anda Telah Aktif</td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center">Silahkan Login dengan menggunakan username dan password <br>yang sudah anda buat sebelumnya<br><br></td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center"><a href="https://hemerapartner.com/admin/index.php"><img src="https://hemerapartner.com/assets/images/login.png" height="50" /></a></td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center">&nbsp;</td>'.
' </tr>'.
'</table>';
         
$mailz->Body = $mailContent;


// Kirim email
if(!$mailz->send()){
    echo 'Pesan tidak dapat dikirim.';
    echo 'Mailer Error: ' . $mailz->ErrorInfo;
}else{
    echo 'Pesan telah terkirim';
}
///=====================================================================================================
header("Location: ../../index.php?com=new_reg_ds&layout=full");
}
elseif ($_POST['sapproval']=="9")
{
mysql_select_db($database_hemera, $hemera);
$query_rup = "UPDATE user_ SET
aktif='$_POST[sapproval]'
WHERE kd_user='$_POST[hf_kduser]'";
$rup = mysql_query($query_rup, $hemera) or die(mysql_error());

//======================================================================================================================================
$email = $_POST['hf_email'];
//$email = "herybarkan@gmail.com";
$to = $email; 
$subject = "Konfirmasi Aktivasi Akun ". $email;

$mail = new PHPMailer;

// Konfigurasi SMTP
$mail->isSMTP();
$mail->Host = 'mail.hemerapartner.com';
$mail->SMTPAuth = true;
$mail->Username = 'sistem@hemerapartner.com';
$mail->Password = 'MiraHemera2021';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
/*$mail->smtpConnect(
	    array(
	        "ssl" => array(
	            "verify_peer" => false,
	            "verify_peer_name" => false,
	            "allow_self_signed" => true
	        )
	    )
	);*/

$mail->setFrom('sistem@hemerapartner.com', 'Registration');
$mail->addReplyTo('sistem@hemerapartner.com', 'Registration');

// Menambahkan penerima
$mail->addAddress($email);
//$mail->addAddress('tambahlong@gmail.com');

// Subjek email
$mail->Subject = 'Konfirmasi Aktivasi Akun';

// Mengatur format email ke HTML
$mail->isHTML(true);

         $mailContent = '<table width="90%" border="0" align="center">'.
' <tr>'.
'   <td align="center"><img src="https://hemerapartner.com/assets/images/favicon.png" width="176" height="176" /></td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center; font-weight: bold; font-size: 24px;">SELAMAT DATANG</td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center">DI HEMERA PARTNER</td>'.
' </tr>'.
' <tr>'.
'   <td>&nbsp;</td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center">Maaf, Akun Dropshipper anda Tidak Bisa Aktif</td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center">Pembayaran anda tidak dapat di proses<br></td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center">Silahkan Hubungi Customer Servive Hemera Partner<br><br></td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center">&nbsp;</td>'.
' </tr>'.
'</table>';
         
$mail->Body = $mailContent;


// Kirim email
if(!$mail->send()){
    echo 'Pesan tidak dapat dikirim.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
    echo 'Pesan telah terkirim';
}
//=====================================================================================================
header("Location: ../../index.php?com=new_reg_ds&layout=full");
}


?>