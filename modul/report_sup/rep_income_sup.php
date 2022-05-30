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
$query_rcek_sup = "SELECT * FROM suplier WHERE kd_user='$_SESSION[HEM_kd_user]'";
$rcek_sup = mysql_query($query_rcek_sup, $hemera) or die(mysql_error());
$row_rcek_sup = mysql_fetch_assoc($rcek_sup);
$totalRows_rcek_sup = mysql_num_rows($rcek_sup);

mysql_select_db($database_hemera, $hemera);
$query_rorder = "SELECT * FROM wd_supplier WHERE kd_supplier='$row_rcek_sup[kd_suplier]' AND sts_wd='1' $qtgl ORDER BY id_ DESC";
$rorder = mysql_query($query_rorder, $hemera) or die(mysql_error());
$row_rorder = mysql_fetch_assoc($rorder);
$totalRows_rorder = mysql_num_rows($rorder);


?>

<form action="modul/dropshipper/ed_unpublish_product.php" method="post" name="fselect">
<div class="element-wrapper">
   <h6 class="element-header">Income Report
   
   <!--<a href="?com=add_master_product&layout=full" >
   <button class="mr-2 mb-2 btn btn-outline-primary float-right" type="submit"> Unpublish</button></a>-->
   
   </h6>
   <div class="element-box-tp">
      <div class="table-responsive">
         <table width="100%"  class="table table-padded">
            <thead>
               <tr>
                  <th width="7%">Action</th>
                  <th width="28%">Date</th>
                  <th width="26%">Time</th>
                  <th width="39%">Amount</th>
               </tr>
            </thead>
            <tbody>
            <?php $xqty=0; $xa=0; $xb=0; $xc=0 ?>
               <?php do { ?>
               <?php
mysql_select_db($database_hemera, $hemera);
$query_rcolor = "SELECT * FROM product_color WHERE kd_color='$row_rorder[kd_warna]'";
$rcolor = mysql_query($query_rcolor, $hemera) or die(mysql_error());
$row_rcolor = mysql_fetch_assoc($rcolor);
$totalRows_rcolor = mysql_num_rows($rcolor);


mysql_select_db($database_hemera, $hemera);
$query_rsize = "SELECT * FROM product_size WHERE kd_size='$row_rorder[kd_size]'";
$rsize = mysql_query($query_rsize, $hemera) or die(mysql_error());
$row_rsize = mysql_fetch_assoc($rsize);
$totalRows_rsize = mysql_num_rows($rsize);


			   ?>
               <tr>
                   <td>
                   <span class="onboarding-media">
				   
                   </span>
                    <a href="javascript:void(0);" data-href="modul/finance/detail_wd_sup.php?id_=<?php echo $row_rorder['id_']; ?>" class="btn btn-success btn-sm text-white openPopup" style="width:100px;">Detail</a>
                 
                   </td>
                   <td><?php echo $row_rorder['tgl_wdx']; ?></td>
                   <td><?php echo $row_rorder['jam_wdx']; ?></td>
                   <td><?php echo number_format($row_rorder['nominal'],0,",","."); ?></td>
                </tr>
               <?php $xqty+=$row_rorder['nominal']; ?>
                 <?php } while ($row_rorder = mysql_fetch_assoc($rorder)); ?>
               <tr>
                 <td colspan="3"><span style="font-weight:700; color:#F00;">TOTAL</span></td>
                 <td><span style="font-weight:900;"><span style="font-weight:700; color:#F00;"> IDR. <?php echo number_format($xqty,0,",","."); ?></span></td>
               </tr>
            </tbody>
         </table>
         
        <!--<a href="?com=add_master_product&layout=full" ><button class="mr-2 mb-2 btn btn-outline-primary float-right" type="submit"> Unpublish</button></a>-->
      </div>
   </div>
</div>
</form>

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
</div>
<?php
mysql_free_result($rorder);

mysql_free_result($rqty);
?>