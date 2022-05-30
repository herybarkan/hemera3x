<?php require_once('../Connections/hemera.php'); ?>
<?php
//======================================================================================================================================
$xemail=$_GET['xemail'];
$email = $xemail;
$to = $email; 
$subject = "Konfirmasi Transfer Pembayaran partner dropshipper ". $xemail;


$headers = "From:sistem@hemerapartner.com";
$headers .= "\r\nReply-To: ".$to."";
$headers .= "\r\nContent-Type: text/html; charset=UTF-8";
$headers .= "\r\nMIME-Version: 1.0";

         $message = '<table width="90%" border="0" align="center">'.
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
'   <td style="text-align: center">Terimakasih sudah Melakukan Pendaftaran Dropshipper di Hemera Partner</td>'.
' </tr>'.
' <tr>'.
'   <td style="text-align: center"><br>Silahkan Lakukan pembayaran dengan Transfer ke <br>
                                    <br> - Bank BCA no Rekening 62333333333 atas nama mira
                                    <br> - Bank Mandiri no Rekening 8978787867 atas nama mira
                                    <br> - Bank BNI no Rekening 564533333 atas nama mira
									<br>
									<br>
									Kemudian lakukan konfirmasi pembayaran dengan klik tombol dibawah ini<br><br>
									</td> '.
' </tr>'.
' <tr>'.
'   <td style="text-align: center"><a href="https://hemerapartner.com/index.php?com=upload_pembayaran&xemail='. $_GET['xemail'].'""><img src="https://hemerapartner.com/assets/images/pembayaran.png" height="50" /></a></td>'.
' </tr>'.
'</table>';
         
         $header = "From:sistem@hemerapartner.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
		$retval = mail($to,$subject,$message,$header);
         
         if( $retval == true ) 
		 	{
            	//echo "Message sent successfully..."; 
				$xsts="success";
         }else {
            //echo "Message could not be sent..."; 
			$xsts="fail";
         }
		 


?>
    <section class="page-header single-header bg_img oh" data-background="./assets/images/page-header.png">
        <div class="bottom-shape d-none d-md-block">
            <img src="assets/css/img/page-header2.png" alt="css">
        </div>
    </section>
    <!--============= Header Section Ends Here =============-->


    <!--============= Pricing Section Starts Here =============-->
    <section class="pricing-section oh padding-bottom-2 single-pricing">
        <div class="container">
            <div class="section-header cl-white mw-100 mb-4">
                <h2 class="title mt-0">Hemera Plans Dropshipper</h2>
                <p>
                    Start for free, buy it when you <i class="fas fa-heart"></i> it
                </p>
            </div>
            <div class="tab-up">
                <!--<ul class="tab-menu pricing-menu">
                    <li class="active">Monthly</li>
                    <li>Yearly</li>
                </ul>-->
                <div class="tab-area">
                    <div class="tab-item active">
                        <div class="pricing-slider-wrapper">
                            <div class="pricing-slider owl-theme owl-carousel">
                            
                                <div class="pricing-item-2">
                                    <h5 class="cate"> </h5>
                                    <div class="thumb">
                                        <img src="assets/images/pricing/pricing1.png" alt="pricing">
                                    </div>
                                    <h2 class="title">Rp. 1.200.000</h2>
                                    <span class="info">Per Bulan</span>
                                    <ul class="pricing-content-3">
                                        <li>Domain dengan nama sendiri</li>
                                        <li>Website Ecommerse sendiri</li>
                                        <li>Ribuan Item Produk Siap Jual</li>
                                        <li>Sistem Pengiriman dari pusat</li>
                                        <li>Laporan Penjualan dan Profit</li>
                                        
                                    </ul>
                                    <span class="info">Silahkan Lakukan pembayaran dengan Transfer ke 
                                    <br> - Bank BCA no Rekening 62333333333 atas nama mira
                                    <br> - Bank Mandiri no Rekening 8978787867 atas nama mira
                                    <br> - Bank BNI no Rekening 564533333 atas nama mira
                                    </span>
                                    <span class="info">Kemudian lakukan konfirmasi pembayaran dengan klik tombol dibawah ini</span>
                                    <a href="?com=upload_pembayaran&xemail=<?php echo $_GET['xemail']; ?>" class="get-button">Konfirmasi Pembayaran<i class="flaticon-right"></i></a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!--<div class="text-center mt-70">
                <a href="pricing-plan.html#0" class="show-feature">Show all features</a>
            </div>-->
        </div>
    </section>
    <!--============= Pricing Section Ends Here =============-->



