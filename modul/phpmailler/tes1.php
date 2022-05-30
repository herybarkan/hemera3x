<?php
include "class.phpmailer.php";
include "class.smtp.php";

$mail = new PHPMailer;
$mail->IsSMTP();
$mail->SMTPSecure = ‘tls’;
$mail->Host = "localhost"; //hostname masing-masing provider email
$mail->SMTPDebug = 2;
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = "sistem@hemerapartnet.com"; //user email
$mail->Password = "MiraHemera2021"; //password email
$mail->SetFrom("sistem@hemerapartnet.com","Sistem Hemera"); //set email pengirim
$mail->Subject = "Pemberitahuan Email dari Website"; //subyek email
$mail->AddAddress("herybarkan@gmail.com","Heri Purnomo"); //tujuan email
$mail->MsgHTML("Testing…");
if($mail->Send()) echo "Message has been sent";
else echo "Failed to sending message";
?>