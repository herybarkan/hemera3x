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

	if ($xtgl!="") {$qtgl=" WHERE tgl_wdx='$xtgl'";}
elseif ($xtgl=="") {$qtgl="";}

	if ($xcustomer!="") {$qcustomer=" AND ds_customer.nm_depan LIKE '%$xcustomer%' OR ds_customer.nm_belakang LIKE '%$xcustomer%'";}
elseif ($xcustomer=="") {$qcustomer="";}

mysql_select_db($database_hemera, $hemera);
$query_rorder = "SELECT * FROM wd_supplier $qtgl ORDER BY id_ DESC";
$rorder = mysql_query($query_rorder, $hemera) or die(mysql_error());
$row_rorder = mysql_fetch_assoc($rorder);
$totalRows_rorder = mysql_num_rows($rorder);


?>
<script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
</script>


<div class="element-wrapper">
<div class="element-actions">
<form class="form-inline justify-content-sm-end" id="fsearch" name="fsearch" method="POST" action="index.php?com=withrawal_sup&layout=full">
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
<input name="bt_search" type="submit" class="btn btn-grey" style="margin-left:10px;" value="Search"/>

<a href="index.php?com=withrawal_sup&layout=full"><input name="bt_reload" type="button" class="btn btn-success" style="margin-left:10px;" value="Reload"/></a>
</form>
</div>
   <h6 class="element-header">List of Request Withdrawal Supplier<!--<a href="?com=add_master_product&layout=full" >
   <button class="mr-2 mb-2 btn btn-outline-primary float-right" type="submit"> Unpublish</button></a>-->
   
   </h6>
   
   
                     
                     
   <div class="element-box-tp">
      <div class="table-responsive">
         <!--<form action="modul/supplier/set_income.php" method="post" name="fsaldo">-->
         <!--<div class="row">
         <div class="col-10"></div>
         <div class="col-2"><input name="bt_reload" type="submit" class="btn btn-danger float-right" style="margin-left:10px;" value="Tarik ke Rekening"/></div>
         </div>-->
         <table width="100%"  class="table table-padded wrap ">
            <thead>
               <tr>
                  <th width="2%"></th>
                  <th width="15%"> WD code</th>
                  <th width="19%">Date</th>
                  <th width="25%">Time</th>
                  <th width="27%">Nominal</th>
                  <th width="12%">Action</th>
               </tr>
            </thead>
            <tbody>
               <?php do { ?>
               <tr>
                   <td class="text-center">
                   <input name="cb[]" type="checkbox" class="form-control" id="cb[]" value="<?php echo $row_rorder['kd_income']; ?>">
                   </td>
                   <td>
                   <a href="javascript:void(0);" data-href="modul/finance/detail_wd_sup.php?id_=<?php echo $row_rorder['id_']; ?>" class="openPopup">
				   <?php echo $row_rorder['kd_wd']; ?>
                   </a>
                   </td>
                   <td><span class="onboarding-media"><?php echo $row_rorder['tgl_wd']; ?></span></td>
                   <td><span class="onboarding-media"><?php echo $row_rorder['jam_wd']; ?></span></td>
                   <td>
                   <a href="javascript:void(0);" data-href="modul/order/detail_orderxx.php?kd_wd=<?php echo $row_rorder['kd_wd']; ?>" class="openPopup" style="width:100px;">
                   <strong>Rp. <?php echo number_format($row_rorder['nominal'],0,",","."); ?></strong>
                   </a>
                   </td>
                   <td>
                   <center>
                   <?php
				   if ($row_rorder['sts_wd']=="0") { ?>
                    <a href="javascript:void(0);" data-href="modul/finance/wd_app_sup.php?id_=<?php echo $row_rorder['id_']; ?>" class="btn btn-success btn-sm text-white openPopup" style="width:80px;">Approval</a>
                   <?php } 
				    elseif ($row_rorder['sts_wd']=="1") { echo "<span class=\"text-success\">Done</span>"; }?>
                    
                    </center>
                   </td>
                </tr>
                 <?php } while ($row_rorder = mysql_fetch_assoc($rorder)); ?>
               
            </tbody>
         </table>
         <!--</form>-->
         
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