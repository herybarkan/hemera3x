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
$query_rprod = "SELECT product_master.id_, product_master.sku, ds_product.hjual, ds_product.margin, product_master.kd_product, ds_product.hpp, product_master.nm_product,  product_master.kd_warna, product_master.kd_size, product_master.deskripsi, product_master.foto_utama FROM product_master JOIN ds_product ON product_master.kd_product = ds_product.kd_product WHERE kd_ds='$_SESSION[HEM_kd_ds]'  AND hjual!='0' AND ds_product.aktif='1' AND ds_product.published='0' ORDER BY ds_product.id_ DESC";
$rprod = mysql_query($query_rprod, $hemera) or die(mysql_error());
$row_rprod = mysql_fetch_assoc($rprod);
$totalRows_rprod = mysql_num_rows($rprod);
?>

<form action="modul/dropshipper/ed_publish_product.php" method="post" name="fselect">
<div class="element-wrapper">
   <h6 class="element-header">List of Master Ready Product
   
   <a href="?com=add_master_product&layout=full" ><button class="mr-2 mb-2 btn btn-outline-primary float-right" type="submit"> Publish</button></a>
   
   </h6>
   <div class="element-box-tp">
      <div class="table-responsive">
         <table width="100%" id="example" class="table table-padded">
            <thead>
               <tr>
                  <th width="2%"><input name="cball" type="checkbox"  id="cball"></th>
                  <th width="11%">SKU</th>
                  <th width="26%">Product Name</th>
                  <th width="18%">Net Price</th>
                  <th width="16%"> New Price</th>
                  <th width="18%">Margin</th>
                  <th width="9%">Actions</th>
               </tr>
            </thead>
            <tbody>
               <?php do { ?>
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

			   ?>
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
                     <span class="text-left">
					 <?php echo $row_rprod['nm_product']; ?>
                     <br>
                     <?php 
					 echo $row_rwr['nm_color']." - ".$row_rsz['nm_size']; 
					 ?>
                     </span>
                     
                     </div>
                   </td>
                   <td class="text-center">IDR <?php echo number_format($row_rprod['hpp'],0,",","."); ?></td>
                   <td>IDR 
                   <?php echo number_format($row_rprod['hjual'],0,",","."); ?></td>
                   <td>IDR <?php echo number_format($row_rprod['margin'],0,",","."); ?></td>
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

<a href="?com=add_master_product&layout=full" ><button class="mr-2 mb-2 btn btn-outline-primary float-right" type="submit"> Publish</button></a>
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