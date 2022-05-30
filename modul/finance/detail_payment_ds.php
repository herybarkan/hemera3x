<?php require_once('../../Connections/hemera.php'); ?>
<?php
header("Access-Control-Allow-Origin: *");

   ob_start();
   session_start();
   
   error_reporting(0);
   @ini_set('display_errors', 0);
   
   if (!function_exists("GetSQLValueString")) {
   function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
   {
     if (PHP_VERSION < 6) {
       $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
     }
   
     $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
   
     switch ($theType) {
       case "text":
         $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
         break;    
       case "long":
       case "int":
         $theValue = ($theValue != "") ? intval($theValue) : "NULL";
         break;
       case "double":
         $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
         break;
       case "date":
         $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
         break;
       case "defined":
         $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
         break;
     }
     return $theValue;
   }
   }
   
   mysql_select_db($database_hemera, $hemera);
   $query_rpay = "SELECT  * FROM finance_trf_ds WHERE id_='$_GET[id_]'";
   $rpay = mysql_query($query_rpay, $hemera) or die(mysql_error());
   $row_rpay = mysql_fetch_assoc($rpay);
   $totalRows_rpay = mysql_num_rows($rpay);
   
   mysql_select_db($database_hemera, $hemera);
   $query_rrek_hem = "SELECT * FROM rekening_hemera WHERE id_='$row_rpay[rek_hemera]'";
   $rrek_hem = mysql_query($query_rrek_hem, $hemera) or die(mysql_error());
   $row_rrek_hem = mysql_fetch_assoc($rrek_hem);
   $totalRows_rrek_hem = mysql_num_rows($rrek_hem);
   
   
   $tglnow=date('Y-m-d');
   
   ?>
<h4 class="onboarding-title">Form Detail</h4>
<div class="element-wrapper">
   <h6 class="element-header">Detail Dropshipper Profit Payment</h6>
   <div class="element-box">
      <hr>
      <div class="row">
         <div class="col-sm-4">
            
            <div class="col-sm-12">
               <div class="form-group">
                  <label for="file_foto">Bank Penerima</label>
                  <br>
                 <?php echo $row_rpay['bank']; ?></div>
            </div>
            
            <div class="col-sm-12">
               <div class="form-group">
                  <label for="file_foto">Rekening Pengirim</label>
                  <br>
                 <?php echo $row_rpay['no_rek']; ?></div>
            </div>
            
            <div class="col-sm-12">
               <div class="form-group">
               <label for="file_foto">Atas Nama Pengirim</label>
                                                              
                  <br>
                  <?php echo $row_rpay['atas_nama']; ?>
               </div>
            </div>
            
            
            
         </div>
         
         <div class="col-sm-4">
            
            <div class="col-sm-12">
               <div class="form-group"><label for="file_foto">Nominal</label>
                  <br>
                  IDR <?php echo number_format($row_rpay['nominal'],0,",","."); ?>
               </div>
            </div>
            
            <div class="col-sm-12">
               <div class="form-group">
                  <label for="file_foto">Tgl Transfer</label>
                  <br>
                  <?php echo $row_rpay['tgl_payment']; ?>
               </div>
            </div>
            
            <div class="col-sm-12">
               <div class="form-group">
                  <label for="file_foto">No Rekening Hemera</label>
                  <br>
                  
                  <?php echo $row_rrek_hem['bank']; ?> - <?php echo $row_rrek_hem['no_rek']; ?>
               </div>
            </div>
            
         </div>
         <div class="col-sm-4">
            
            <div class="col-sm-12">
               <div class="form-group"><label for="file_foto">Bukti Transfer</label>
                  <br>
                  <?php //echo $row_rpay['bukti_transfer']; ?>
                  <img src="https://hemerapartner.com/admin/foto/pembayaran/<?php echo $row_rpay['bukti_trf']; ?>" width="300" /> 
               </div>
            </div>
            
         </div>
      </div>
   </div>
</div>
<?php
   mysql_free_result($rtrx);
   ?>