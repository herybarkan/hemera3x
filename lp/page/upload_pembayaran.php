<?php require_once('../Connections/hemera.php'); ?>
<?php

mysql_select_db($database_hemera, $hemera);
$query_rcek = "SELECT username,nama FROM user_ WHERE username = '$_GET[xemail]'";
$rcek = mysql_query($query_rcek, $hemera) or die(mysql_error());
$row_rcek = mysql_fetch_assoc($rcek);
$totalRows_rcek = mysql_num_rows($rcek);

mysql_select_db($database_hemera, $hemera);
$query_rrek = "SELECT * FROM rekening_hemera WHERE aktif = '1'";
$rrek = mysql_query($query_rrek, $hemera) or die(mysql_error());
$row_rrek = mysql_fetch_assoc($rrek);
$totalRows_rrek = mysql_num_rows($rrek);

?>
    <!--============= Header Section Ends Here =============-->
    <section class="page-header single-header bg_img oh" data-background="./assets/images/page-header.png">
        <div class="bottom-shape d-none d-md-block">
            <img src="assets/css/img/page-header.png" alt="css">
        </div>
    </section>
    <!--============= Header Section Ends Here =============-->


    
    <!--============= Contact Section Starts Here =============-->
    <section class="contact-section padding-top padding-bottom">
        <div class="container">
            <div class="section-header mw-100 cl-white">
                <h2 class="title">Konfirmasi Pembayaran</h2>
                <p>Silahkan upload bukti transfer pembayaran</p>
            </div>
            <div class="row justify-content-center justify-content-lg-between">
                <div class="col-lg-7">
                    <div class="contact-wrapper">
                        <!--<h4 class="title text-center mb-30">Get in Touch</h4>-->
                        <form action="page/in_upload_bt.php" method="post" enctype="multipart/form-data" class="contact-form" id="freg">
                        	<div class="form-group">
                                <label for="name">Atas Nama </label>
                                <input name="atas_nama" type="text" required id="atas_nama" value="<?php echo $row_rcek['nama']; ?>">
                              <input name="hf_email" type="hidden" id="hf_email" value="<?php echo $_GET['xemail']; ?>" />
                        	</div>
                            
                            <div class="form-group">
                                <label for="name">Nominal Transfer</label>
                                <input name="nominal" type="text" required id="nominal">
                            </div>
                            <div class="form-group">
                                <label for="name">Bank Anda</label>
                                <input name="bank" type="text" required id="bank">
                            </div>
                            <div class="form-group">
                              <label for="name">No Rekening Anda</label>
                                <input name="dari_rekening" type="text" required id="dari_rekening">
                            </div>
                            <div class="form-group">
                                <label for="name">Ke Rekening</label>
                              <label for="ke_rekening"></label>
                                <select name="ke_rekening" id="ke_rekening">
                                  <option value="">Pilih</option>
                                  <?php
do {  
?>
                                  <option value="<?php echo $row_rrek['id_']?>"><?php echo $row_rrek['bank']?> - <?php echo $row_rrek['no_rek']?> - <?php echo $row_rrek['atas_nama']?></option>
                                  <?php
} while ($row_rrek = mysql_fetch_assoc($rrek));
  $rows = mysql_num_rows($rrek);
  if($rows > 0) {
      mysql_data_seek($rrek, 0);
	  $row_rrek = mysql_fetch_assoc($rrek);
  }
?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Tanggal Transfer</label>
                                <input name="tgl_transfer" type="date" required id="tgl_transfer">
                            </div>
                            <div class="form-group">
                                <label for="name">Upload File Bukti Transfer</label>
                                <input name="filex" type="file" required/>
                            </div>
                            
                            
                            <br>
                            <hr>
                            <br>
                            
                            <!--<div class="form-group">
                                <label for="name">Username</label>
                                <input name="uname" type="text" required id="uname">
                            </div>-->
                            <div class="form-group">
                                <input type="submit" value="Upload Bukti Transfer">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-content">
                        <div class="man d-lg-block d-none">
                            <img src="assets/images/contact/man.png" alt="bg">
                        </div>
                        <div class="section-header left-style">
                            <h3 class="title">Have questions?</h3>
                            <!--<p>Have questions about payments or price 
                                plans? We have answers!</p>
                            <a href="contact.html#0">Read F.A.Q <i class="fas fa-angle-right"></i></a>-->
                        </div>
                        <div class="contact-area">
                            <div class="contact-item">
                                <div class="contact-thumb">
                                    <img src="assets/images/contact/contact1.png" alt="contact">
                                </div>
                                <div class="contact-contact">
                                    <h5 class="subtitle">Email Us</h5>
                                    <a href="#">cs@hemerabymira.com</a>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-thumb">
                                    <img src="assets/images/contact/contact2.png" alt="contact">
                                </div>
                                <div class="contact-contact">
                                    <h5 class="subtitle">Call Us</h5>
                                    <a href="Tel:6202150103126">+62 021-50103126</a>
                                    <!--<a href="Tel:565656855">+1 (987) 664-32-11</a>-->
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-thumb">
                                    <img src="assets/images/contact/contact3.png" alt="contact">
                                </div>
                                <div class="contact-contact">
                                    <h5 class="subtitle">Visit Us</h5>
                                    <p>Mall taman palem<br> lt 2 blok D121</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Contact Section Ends Here =============-->


    <!--============= Map Section Starts Here =============-->
    <!--<div class="map-section padding-bottom-2">
        <div class="container">
            <div class="section-header">
                <div class="thumb">
                    <img src="assets/images/contact/earth.png" alt="contact">
                </div>
                <h3 class="title">We Are Easy To Find</h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="maps-wrapper">
                        <div class="maps"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <!--============= Map Section Ends Here =============-->


    <!--============= Do Section Starts Here =============-->
<!--    <div class="do-section padding-bottom padding-top-2">
        <div class="container">
            <div class="row mb-30-none justify-content-center">
                <div class="col-md-6">
                    <div class="do-item cl-white">
                        <h3 class="title">About Us</h3>
                        <p>Find out who we are and what we do!</p>
                        <a href="about.html"><i class="fas fa-angle-left"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="do-item cl-white">
                        <h3 class="title">Partners</h3>
                        <p>Become a Mosto
                            Solutions Partner!</p>
                        <a href="partners.html"><i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <!--============= Do Section Ends Here =============-->
    


