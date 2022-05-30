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
$query_dss = "SELECT * FROM dropshipper_set WHERE kd_ds='$_SESSION[HEM_kd_ds]'";
$dss = mysql_query($query_dss, $hemera) or die(mysql_error());
$row_dss = mysql_fetch_assoc($dss);
$totalRows_dss = mysql_num_rows($dss);

mysql_select_db($database_hemera, $hemera);
$query_rprod = "SELECT product_master.id_, product_master.sku, ds_product.hjual, product_master.kd_product, ds_product.hpp, product_master.nm_product,product_master.kd_warna, product_master.kd_size, product_master.deskripsi, product_master.foto_utama FROM product_master JOIN ds_product ON product_master.kd_product = ds_product.kd_product WHERE kd_ds='$_SESSION[HEM_kd_ds]' AND hjual='0' AND product_master.aktif='1'  ORDER BY ds_product.id_ DESC";
$rprod = mysql_query($query_rprod, $hemera) or die(mysql_error());
$row_rprod = mysql_fetch_assoc($rprod);
$totalRows_rprod = mysql_num_rows($rprod);
?>

<form action="modul/dropshipper/ed_price_product.php" method="post" name="fselect">
<div class="element-wrapper">
   <h6 class="element-header">List of Master Added Product
   
   <a href="?com=add_master_product&layout=full" ><button class="mr-2 mb-2 btn btn-outline-primary float-right" type="submit"> Update Price</button></a>
   
   </h6>
   <div class="element-box-tp">
      <div class="table-responsive">
         <table width="100%" id="example" class="table table-padded">
            <thead>
               <tr>
                  <th width="2%"><input name="cball" type="checkbox"  id="cball"></th>
                  <th width="15%">SKU</th>
                  <th width="24%">Product Name</th>
                  <th width="13%">Net Price</th>
                  <th width="27%"> New Price + <?php echo $row_dss['markup']; ?> %</th>
                  <th width="19%">Actions</th>
               </tr>
            </thead>
            <tbody>
               <?php do { ?>
               <tr>
                   <td class="text-center">
                   <input name="cb[]" type="checkbox" class="form-control" id="cb[]" value="<?php echo $row_rprod['kd_product']; ?>" checked="checked">
                   </td>
                   <td><span class="onboarding-media"><?php echo $row_rprod['sku']; ?></span></td>
                   <td>
                     <div class="user-with-avatar">
                     <a href="modul/product/detail_gbr_product.php?foto=<?php echo $row_rprod['foto_utama']; ?>" data-target=".bd-example-modal-lg" data-toggle="modal">
                     <img alt="" src="https://hemerapartner.com/admin/foto/product/<?php echo $row_rprod['foto_utama']; ?>">
                     </a>
                     <span class="text-center"><?php echo $row_rprod['nm_product']; ?>
                     <br>
                     <?php 
					 mysql_select_db($database_hemera, $hemera);
$query_rwr = "SELECT * FROM product_color WHERE kd_color='$row_rprod[kd_warna]'";
$rwr = mysql_query($query_rwr, $hemera) or die(mysql_error());
$row_rwr = mysql_fetch_assoc($rwr);
$totalRows_rwr = mysql_num_rows($rwr);

mysql_select_db($database_hemera, $hemera);
$query_rsz = "SELECT * FROM product_size WHERE kd_size='$row_rprod[kd_size]'";
$rsz = mysql_query($query_rsz, $hemera) or die(mysql_error());
$row_rsz = mysql_fetch_assoc($rsz);
$totalRows_rsz = mysql_num_rows($rsz);

					 echo $row_rwr['nm_color']." - ".$row_rsz['nm_size']; ?>
                     </span>
                     
                     </div>
                   </td>
                   <td class="text-center">IDR <?php echo number_format($row_rprod['hpp'],0,",","."); ?></td>
                   <td><label for="harga_up[]"></label>
                   <?php 
				   $xmarkup=($row_rprod['hpp']*$row_dss['markup'])/100; 
				   $harga_baru=$row_rprod['hpp']+$xmarkup;
				   ?>
                   <input type="text" name="harga_up[]" id="harga_up[]" class="form-control" value="<?php echo $harga_baru; ?>"/></td>
                   <td >
                   
                   
                    
                    <!--<a href="javascript:void(0);" data-href="modul/dropshipper/detail_master_product.php?id_=<?php //echo $row_rprod['id_']; ?>" class="btn btn-success btn-sm text-white openPopup">Detail</a>-->
                    
                    <center>
                    <a href="modul/product/detail_master_product.php?id_=<?php echo $row_rprod['id_']; ?>" class="btn btn-warning btn-sm "data-target=".bd-example-modal-lg" data-toggle="modal" style="width:100px;">Detail</a>
                    </center>
                    
                    
                    
                                 
                   </td>
                </tr>
                 <?php } while ($row_rprod = mysql_fetch_assoc($rprod)); ?>
               
            </tbody>
         </table>
         
         
      </div>
   </div>
</div>

<a href="?com=add_master_product&layout=full" ><button class="mr-2 mb-2 btn btn-outline-primary float-right" type="submit"> Update Price</button></a>
</form>

<div aria-hidden="true" aria-labelledby="myLargeModalLabel" class="modal fade bd-example-modal-lg" role="dialog" tabindex="-1">
                              <div class="modal-dialog modal-lg">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel"> </h5>
                                       <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                       
                                    </div>
                                    
                                 </div>
                              </div>
                           </div>
<?php


mysql_free_result($rprod);
?>