<?php require_once('Connections/hemera.php'); ?>
<?php
ob_start();
session_start();

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
$query_rds = "SELECT * FROM dropshiper";
$rds = mysql_query($query_rds, $hemera) or die(mysql_error());
$row_rds = mysql_fetch_assoc($rds);
$totalRows_rds = mysql_num_rows($rds);


mysql_select_db($database_hemera, $hemera);
$query_rcek_sup = "SELECT * FROM suplier WHERE kd_user='$_SESSION[HEM_kd_user]'";
$rcek_sup = mysql_query($query_rcek_sup, $hemera) or die(mysql_error());
$row_rcek_sup = mysql_fetch_assoc($rcek_sup);
$totalRows_rcek_sup = mysql_num_rows($rcek_sup);

$xsds=$_POST['sds'];
$xtgl=$_POST['tgl'];
$xcustomer=$_POST['customer'];

	if ($xsds!="") {$qsds=" AND trx_ds.kd_ds='$xsds'";}
elseif ($xsds=="") {$qsds="";}

	if ($xtgl!="") {$qtgl=" AND tgl_wdx='$xtgl'";}
elseif ($xtgl=="") {$qtgl="";}

	if ($xcustomer!="") {$qcustomer=" AND ds_customer.nm_depan LIKE '%$xcustomer%' OR ds_customer.nm_belakang LIKE '%$xcustomer%'";}
elseif ($xcustomer=="") {$qcustomer="";}

mysql_select_db($database_hemera, $hemera);
$query_rorder = "SELECT * FROM wd_supplier WHERE kd_supplier='$row_rcek_sup[kd_suplier]' $qtgl ORDER BY id_ DESC";
$rorder = mysql_query($query_rorder, $hemera) or die(mysql_error());
$row_rorder = mysql_fetch_assoc($rorder);
$totalRows_rorder = mysql_num_rows($rorder);

mysql_select_db($database_hemera, $hemera);
$query_rtdw = "SELECT SUM(nominal) AS tot_wd FROM wd_supplier WHERE kd_supplier='$row_rcek_sup[kd_suplier]' AND sts_wd='1'";
$rtdw = mysql_query($query_rtdw, $hemera) or die(mysql_error());
$row_rtdw = mysql_fetch_assoc($rtdw);
$totalRows_rtdw = mysql_num_rows($rtdw);

mysql_select_db($database_hemera, $hemera);
$query_rtinc = "SELECT SUM(nominal) AS tot_income FROM income_supplier WHERE kd_supplier='$row_rcek_sup[kd_suplier]' AND sts_wd='0'";
$rtinc = mysql_query($query_rtinc, $hemera) or die(mysql_error());
$row_rtinc = mysql_fetch_assoc($rtinc);
$totalRows_rtinc = mysql_num_rows($rtinc);

mysql_select_db($database_hemera, $hemera);
$query_rtpen = "SELECT SUM(nominal) AS tot_pen FROM income_supplier WHERE kd_supplier='$row_rcek_sup[kd_suplier]'";
$rtpen = mysql_query($query_rtpen, $hemera) or die(mysql_error());
$row_rtpen = mysql_fetch_assoc($rtpen);
$totalRows_rtpen = mysql_num_rows($rtpen);
?>
<script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
</script>


<div class="element-wrapper">
<div class="element-actions">
<form class="form-inline justify-content-sm-end" id="fsearch" name="fsearch" method="POST" action="index.php?com=xpenarikan_sup&layout=full">
<!--<select name="sds" class="form-control form-control-sm" id="sds">
  <option value="">Select</option>
  <?php
//do {  
?>
  <option value="<?php //echo $row_rds['kd_dropshiper']?>"><?php //echo $row_rds['nm_toko']?></option>
  <?php
/*} while ($row_rds = mysql_fetch_assoc($rds));
  $rows = mysql_num_rows($rds);
  if($rows > 0) {
      mysql_data_seek($rds, 0);
	  $row_rds = mysql_fetch_assoc($rds);
  }*/
?>
</select>-->

<input name="tgl" type="date" class="form-control form-control-sm" id="tgl" placeholder="tgl"/>
<input name="bt_search" type="submit" class="btn btn-outline-info btn-rounded" style="margin-left:10px;" value="Search"/>

<a href="index.php?com=xpenarikan_sup&layout=full"><input name="bt_reload" type="button" class="btn btn-rounded btn-outline-danger" style="margin-left:10px;" value="Reload"/></a>
</form>
</div>
   <h6 class="element-header">List of Request Withdrawal<!--<a href="?com=add_master_product&layout=full" >
   <button class="mr-2 mb-2 btn btn-outline-primary float-right" type="submit"> Unpublish</button></a>-->
   
   </h6>
   
   <div class="row pt-2">
                        <div class="col-6 col-sm-4 col-xxl-2">
                           <a class="element-box el-tablo centered trend-in-corner smaller" href="apps_crypto.html#">
                              <div class="label">Total Income</div>
                              <div class="value">Rp. <?php echo number_format($row_rtpen['tot_pen'],0,",","."); ?></div>
                              
                           </a>
                        </div>
                        
                        <div class="col-6 col-sm-4 col-xxl-2">
                           <a class="element-box el-tablo centered trend-in-corner smaller" href="apps_crypto.html#">
                              <div class="label">Total Withdrawal</div>
                              <div class="value text-danger">Rp. <?php echo number_format($row_rtdw['tot_wd'],0,",","."); ?></div>
                              
                           </a>
                        </div>
                        
                        <div class="col-6 col-sm-4 col-xxl-2">
                           <a class="element-box el-tablo centered trend-in-corner smaller" href="apps_crypto.html#">
                              <div class="label">Balance</div>
                              <div class="value  text-success">Rp. <?php echo number_format($row_rtinc['tot_income'],0,",","."); ?></div>
                              
                           </a>
                        </div>
                        
                        <!--<div class="col-6 col-sm-3 col-xxl-2">
                           <a class="element-box el-tablo centered trend-in-corner smaller" href="apps_crypto.html#">
                              <div class="label">Ripple Price</div>
                              <div class="value">$1,284</div>
                              
                           </a>
                        </div>-->
                        
                        
                     </div>
                     
                     
   <div class="element-box-tp">
      <div class="table-responsive">
         
         <table width="100%"  class="table table-padded wrap ">
            <thead>
               <tr>
                  <th width="2%"></th>
                  <th width="15%"> WD code</th>
                  <th width="24%">Date</th>
                  <th width="19%">Time</th>
                  <th width="31%">Amount</th>
                  <th width="9%">Status</th>
               </tr>
            </thead>
            <tbody>
            <?php $totpen=0; ?>
               <?php do { ?>
               <tr>
                   <td class="text-center">
                   <input name="cb[]" type="checkbox" class="form-control" id="cb[]" value="<?php echo $row_rorder['kd_income']; ?>">
                   </td>
                   <td>
                   <span class="onboarding-media">
                   <a href="javascript:void(0);" data-href="modul/finance/detail_wd_sup.php?id_=<?php echo $row_rorder['id_']; ?>" class="openPopup">
				   <?php echo $row_rorder['kd_wd']; ?>
                   </a>
                   </span>
                   </td>
                   <td><span class="onboarding-media"><?php echo $row_rorder['tgl_wd']; ?></span></td>
                   <td><span class="onboarding-media"><?php echo $row_rorder['jam_wd']; ?></span></td>
                   <td>
                   <a href="javascript:void(0);" data-href="modul/order/detail_orderxx.php?kd_wd=<?php echo $row_rorder['kd_wd']; ?>" class="openPopup" style="width:100px;">
                   <strong>IDR. <?php echo number_format($row_rorder['nominal'],0,",","."); ?></strong>
                   </a>
                   </td>
                   <td>
                   <center>
                   <?php 
				   if ($row_rorder['sts_wd']=="0") {echo "<span class=\"text-danger\">Waiting</span>";}
				   elseif ($row_rorder['sts_wd']=="1") {echo "<span class=\"text-success\">Done</span>";}
				   ?>
                   </center>
                   </td>
                </tr>
               <?php $totpen+=$row_rorder['nominal']; ?>
                 <?php } while ($row_rorder = mysql_fetch_assoc($rorder)); ?>
               <tr>
                 <td class="text-center">&nbsp;</td>
                 <td><span style="font-weight:700; color:#F00;">TOTAL</span></td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td><span style="font-weight:700; color:#F00;">IDR. <?php echo number_format($totpen,0,",","."); ?></span></td>
                 <td>&nbsp;</td>
               </tr>
            </tbody>
         </table>
         
         
        <!--<a href="?com=add_master_product&layout=full" ><button class="mr-2 mb-2 btn btn-outline-primary float-right" type="submit"> Unpublish</button></a>-->
      </div>
   </div>
</div>

<div class="onboarding-modal modal fade animated" id="myModal" role="dialog">
    <div class="modal-dialog modal-xl modal-centered">
    	<div class="modal-content">
        	<!--<div class="onboarding-side-by-side">
                <div class="onboarding-media"><img alt="" src="img/bigicon5.png" width="200px"></div>
                	<div class="onboarding-content with-gradient">-->
                    	
            					<div class="modal-body">

            					</div>
            		<!--</div>
            </div>
        </div>-->
    </div>
</div>
<?php
mysql_free_result($rorder);
?>