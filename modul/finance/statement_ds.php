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
$query_rds = "SELECT  * FROM dropshiper WHERE kd_dropshiper='$_SESSION[HEM_kd_ds]'";
$rds = mysql_query($query_rds, $hemera) or die(mysql_error());
$row_rds = mysql_fetch_assoc($rds);
$totalRows_rds = mysql_num_rows($rds);

mysql_select_db($database_hemera, $hemera);
$query_rpay = "SELECT  * FROM upload_pembayaran WHERE email='$row_rds[email_toko]'";
$rpay = mysql_query($query_rpay, $hemera) or die(mysql_error());
$row_rpay = mysql_fetch_assoc($rpay);
$totalRows_rpay = mysql_num_rows($rpay);
?>

<form action="modul/dropshipper/ed_unpublish_product.php" method="post" name="fselect">
<div class="element-wrapper">
   <h6 class="element-header">List of Dropshipper Paid
   
   <!--<a href="?com=add_master_product&layout=full" >
   <button class="mr-2 mb-2 btn btn-outline-primary float-right" type="submit"> Unpublish</button></a>-->
   
   </h6>
   <div class="element-box-tp">
      <div class="table-responsive">
         <table width="100%"  class="table table-padded wrap ">
            <thead>
               <tr>
                  <th width="4%"></th>
                  <th width="5%">No</th>
                  <th width="59%">Tgl Payment</th>
                  <th width="22%"> Payment</th>
                  <th width="10%">Actions</th>
               </tr>
            </thead>
            <tbody>
            <?php $x=1; $xqty=0; $xhp=0; $xdp=0; $sp=0; $zmargin=0;?>
               <?php do { ?>
               
               <tr>
                   <td class="text-center">
                   <input name="cb[]" type="checkbox" class="form-control" id="cb[]" value="<?php echo $row_rprod['kd_product']; ?>">
                   </td>
                   <td><span class="onboarding-media"><?php echo $x; ?></span></td>
                 <td><?php echo $row_rpay['tgl_trf']; ?></td>
                   <td align="right">IDR <?php echo number_format($row_rpay['nominal'],0,",","."); ?></td>
                   <td >
                   
                   <a href="javascript:void(0);" data-href="modul/finance/detail_statement.php?id_=<?php echo $row_rpay['id_']; ?>" class="btn btn-success btn-sm text-white openPopup" style="width:100px;">Detail</a>
                    
                    
                    
                                 
                   </td>
               </tr>
                
                <?php $x+=1; $xqty+=$row_rqty['jqty']; $xhp+=$hrg_hemera; $xdp+=$row_rorder['hrg_tot']; $sp+=$row_rorder['hrg_shipping']; $zmargin+=$xmargin; ?>
               
                 <?php } while ($row_rpay = mysql_fetch_assoc($rpay)); ?>
                 
                 <tr>
                 <td colspan="2"><span style="font-weight:900;">TOTAL</span></td>
                 <td>&nbsp;</td>
                 <td align="right">&nbsp;</td>
                 <td>&nbsp;</td>
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

mysql_free_result($rpay);
?>