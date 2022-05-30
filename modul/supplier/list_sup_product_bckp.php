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
$query_rsup = "SELECT * FROM suplier WHERE kd_user='$_SESSION[HEM_kd_user]'";
$rsup = mysql_query($query_rsup, $hemera) or die(mysql_error());
$row_rsup = mysql_fetch_assoc($rsup);
$totalRows_rsup = mysql_num_rows($rsup);


mysql_select_db($database_hemera, $hemera);
$query_rprod = "SELECT * FROM product_master WHERE kd_suplier='$row_rsup[kd_suplier]' ORDER BY id_ DESC";
$rprod = mysql_query($query_rprod, $hemera) or die(mysql_error());
$row_rprod = mysql_fetch_assoc($rprod);
$totalRows_rprod = mysql_num_rows($rprod);
?>

<?php //echo $_SESSION['HEM_kd_user']; ?>
<form action="modul/dropshipper/in_added_product.php" method="post" name="fselect">

<div class="element-wrapper">
   <h6 class="element-header">List of Master Product
   
   <!--<a href="?com=add_master_product&layout=full" ><button class="mr-2 mb-2 btn btn-outline-primary float-right" type="submit"> Pilih Product</button></a>-->
   
   </h6>
   <div class="element-box-tp">
      <div class="table-responsive">
         <table width="100%" id="example" class="table table-padded">
            <thead>
               <tr>
                  <th width="2%"></th>
                  <th width="15%">&nbsp;</th>
                  <th width="15%">SKU</th>
                  <th width="24%">Product Name</th>
                  <th width="13%">Net Price</th>
                  <th width="40%"> Description</th>
                  <th width="6%">Actions</th>
               </tr>
            </thead>
            <tbody>
               <?php do { ?>
               <tr>
                   <td class="text-center">
                   <input class="form-control" type="checkbox">
                   </td>
                   <td>
                   <div class="btn-group mr-1 mb-1">
                   <button aria-expanded="false" aria-haspopup="true" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton1" type="button">Click</button>
                    
                   <div aria-labelledby="dropdownMenuButton1" class="dropdown-menu" style="">
                   <a class="dropdown-item" href="modul/supplier/edit_master_product.php?id_=<?php echo $row_rprod['id_']; ?>" data-target=".bd-example-modal-lg" data-toggle="modal"> Update</a>
                   
                   <a class="dropdown-item" href="modul/supplier/del_master_product.php?id_=<?php echo $row_rprod['id_']; ?>" > Delete</a>
                   
                   <a class="dropdown-item" href="modul/supplier/detail_master_product.php?id_=<?php echo $row_rprod['id_']; ?>" data-target=".bd-example-modal-lg" data-toggle="modal"> Detail</a>
                   
                   <a class="dropdown-item" href="modul/supplier/foto_master_product.php?id_=<?php echo $row_rprod['id_']; ?>" data-target=".bd-example-modal-lg" data-toggle="modal"> Add Foto</a>
                   
                   </div>
                   </div>
                   </td>
                   <td><span class="onboarding-media"><?php echo $row_rprod['sku']; ?></span></td>
                   <td>
                     <div class="user-with-avatar">
                     <!--<a href="javascript:void(0);" data-href="modul/product/foto_product.php?id_=<?php //echo $row_rprod['foto_utama']; ?>" class="openPopup3">-->
                     <a href="modul/product/detail_gbr_product.php?foto=<?php echo $row_rprod['foto_utama']; ?>" data-target=".bd-example-modal-lg" data-toggle="modal">
                     
                     <img alt="" src="foto/product/<?php echo $row_rprod['foto_utama']; ?>">
                     
                     </a>
                     
                     <span class="text-left"><?php echo $row_rprod['nm_product']; ?>
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
                     </span></div>
                   </td>
                   <td class="text-center">IDR <?php echo number_format($row_rprod['harga_net'],0,",","."); ?></td>
                   <td><?php echo $row_rprod['deskripsi']; ?></td>
                   <td >
                   
                    
                    <center>
                    <a href="modul/supplier/edit_master_product.php?id_=<?php echo $row_rprod['id_']; ?>" class="btn btn-success btn-sm text-white"data-target=".bd-example-modal-lg" data-toggle="modal" style="width:100px;">Update</a>
                    </center>
                    
                    <center>
                    <a href="modul/supplier/del_master_product.php?id_=<?php echo $row_rprod['id_']; ?>" class="btn btn-danger btn-sm text-white" style="width:100px;">Delete</a>
                    </center>
                    
                    <center>
                    <a href="modul/supplier/detail_master_product.php?id_=<?php echo $row_rprod['id_']; ?>" class="btn btn-warning btn-sm "data-target=".bd-example-modal-lg" data-toggle="modal" style="width:100px;">Detail</a>
                    </center>
                    
                    <center>
                    <a href="modul/supplier/foto_master_product.php?id_=<?php echo $row_rprod['id_']; ?>" class="btn btn-info btn-sm text-white"data-target=".bd-example-modal-lg" data-toggle="modal" style="width:100px;">Add Foto</a>
                    </center>
                   </td>
                </tr>
                 <?php } while ($row_rprod = mysql_fetch_assoc($rprod)); ?>
               
            </tbody>
         </table>
      </div>
   </div>
</div>
<!--<a href="?com=add_master_product&layout=full" ><button class="mr-2 mb-2 btn btn-outline-primary float-right" type="submit"> Pilih Product</button></a>-->
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