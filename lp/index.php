<?php
ob_start();
session_start();

error_reporting(0);
@ini_set('display_errors', 0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Hemera Business</title>

    <?php 
	//
	include ('element/list_css.php'); ?>
</head>

<body>
    <!--============= ScrollToTop Section Starts Here =============-->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <a href="index.php#0" class="scrollToTop"><i class="fas fa-angle-up"></i></a>
    <div class="overlay"></div>
    <?php
	//
	if ($_GET['com']=="")
	{
	include ('element/header.php'); 
	include ('element/banner5.php'); 
	include ('element/banner2.php'); 
	include ('element/feature.php'); 
	include ('element/reliable.php'); 
	//include ('element/realtime.php'); 
	//include ('element/pricing.php'); 
	include ('element/tesyimoni.php'); 
	include ('element/faq.php'); 
	include ('element/faq2.php'); 
	include ('element/trial.php'); 
	include ('element/footer.php'); 
	//include ('element/swap.php'); 
	}
	elseif ($_GET['com']=="about")
	{
		include ('element/header.php'); 
		include ('page/about.php'); 
		include ('element/footer.php'); 
		
	}
	elseif ($_GET['com']=="dropshipper")
	{
		include ('element/header.php'); 
		include ('page/dropshipper.php'); 
		include ('element/footer.php'); 
		
	}
	elseif ($_GET['com']=="supplier")
	{
		include ('element/header.php'); 
		include ('page/supplier.php'); 
		include ('element/footer.php'); 
		
	}
	elseif ($_GET['com']=="reg_dropshipper")
	{
		include ('element/header.php'); 
		include ('page/reg_dropshipper.php'); 
		include ('element/footer.php'); 
		
	}
	elseif ($_GET['com']=="plan")
	{
		include ('element/header.php'); 
		include ('page/plan.php'); 
		include ('element/footer.php'); 
		
	}
	elseif ($_GET['com']=="konfirm_error")
	{
		include ('element/header.php'); 
		include ('page/konfirm_error.php'); 
		include ('element/footer.php'); 
		
	}
	elseif ($_GET['com']=="konfirm_aktivasi")
	{
		include ('element/header.php'); 
		include ('page/konfirm_aktivasi.php'); 
		include ('element/footer.php'); 
		
	}
	elseif ($_GET['com']=="konfirm_verifikasi")
	{
		include ('element/header.php'); 
		include ('page/konfirm_verifikasi.php'); 
		include ('element/footer.php'); 
		
	}
	elseif ($_GET['com']=="upload_pembayaran")
	{
		include ('element/header.php'); 
		include ('page/upload_pembayaran.php'); 
		include ('element/footer.php'); 
		
	}
	elseif ($_GET['com']=="konfirm_pembayaran")
	{
		include ('element/header.php'); 
		include ('page/konfirm_pembayaran.php'); 
		include ('element/footer.php'); 
		
	}
	
	
	?>
   <?php 
   //
   include ('element/list_js.php'); ?>
</body>

</html>