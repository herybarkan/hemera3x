<?php require_once('Connections/hemera.php'); ?>
<?php
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

if ($_POST['search']!="") {$xsearch=" AND product_color.nm_color LIKE '%$_POST[search]%' OR 
product_size.nm_size LIKE '%$_POST[search]%' OR
product_master.sku LIKE '%$_POST[search]%' OR
product_master.nm_product LIKE '%$_POST[search]%' OR
product_master.harga_net LIKE '%$_POST[search]%' OR
product_master.diskon LIKE '%$_POST[search]%' OR
product_master.deskripsi LIKE '%$_POST[search]%' OR
product_master.long_deskripsi LIKE '%$_POST[search]%' AND
product_master.aktif='1'";}


mysql_select_db($database_hemera, $hemera);
$query_rprod = "SELECT
product_color.nm_color,
product_size.nm_size,
product_master.id_,
product_master.kd_product,
product_master.kd_suplier,
product_master.kd_warna,
product_master.kd_size,
product_master.sku,
product_master.kategori,
kategori.nm_kategori,
product_master.sub_kategori,
sub_kategori.nm_sub_kategori,
product_master.nm_product,
product_master.foto_utama,
product_master.harga,
product_master.harga_net,
product_master.diskon,
product_master.berat,
product_master.panjang,
product_master.deskripsi,
product_master.long_deskripsi,
product_master.aktif
FROM
product_color
JOIN product_master
ON product_color.kd_color = product_master.kd_warna 
JOIN product_size
ON product_size.kd_size = product_master.kd_size 
LEFT JOIN kategori
ON kategori.id_ = product_master.kategori 
LEFT JOIN sub_kategori
ON sub_kategori.id_ = product_master.sub_kategori WHERE product_master.aktif='1' $xsearch ORDER BY id_ DESC";
$rprod = mysql_query($query_rprod, $hemera) or die(mysql_error());
$row_rprod = mysql_fetch_assoc($rprod);
$totalRows_rprod = mysql_num_rows($rprod);
?>

<div class="element-wrapper">
   <h6 class="element-header">List of Master Product
   
   <a href="?com=add_master_product&layout=full" ><button class="mr-2 mb-2 btn btn-outline-primary float-right" type="button"> Add Product</button></a>

   <!--<a href="javascript:void(0);" data-href="modul/product/file_upload.php" class="openPopup"><button class="mr-2 mb-2 btn btn-outline-danger float-right" type="button"> Images Upload</button></a>
   
   
   <a href="javascript:void(0);" data-href="modul/product/file_upload.php" class="openPopup"><button class="mr-2 mb-2 btn btn-outline-success float-right" type="button"> Mass Upload</button></a>-->
   </h6>
   
   <div class="element-actions">
<form class="form-inline justify-content-sm-end" id="fsearch" name="fsearch" method="POST" action="index.php?com=list_master_product&layout=full">



<input name="search" type="text" class="form-control form-control-sm" id="search" placeholder="search"/>

<input name="bt_search" type="submit" class="btn btn-grey" style="margin-left:10px;" value="Search"/>

<a href="index.php?com=list_master_product&layout=full"><input name="bt_reload" type="button" class="btn btn-success" style="margin-left:10px;" value="Reload"/></a>
</form>
</div>
<br><br>
   <div class="element-box-tp">
      <div class="table-responsive">
         <table width="100%" id="example" class="table table-padded">
            <thead>
               <tr>
                  <th width="2%"></th>
                  <th width="15%">SKU</th>
                  <th width="15%">Supp</th>
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
                   <td><span class="onboarding-media"><?php echo $row_rprod['sku']; ?></span></td>
                   <td><?php echo $row_rprod['kd_suplier']; ?></td>
                   <td>
                     <div class="user-with-avatar">
                     <!--<a href="javascript:void(0);" data-href="modul/product/foto_product.php?id_=<?php //echo $row_rprod['foto_utama']; ?>" class="openPopup3">-->
                     <a href="modul/product/detail_gbr_product.php?foto=<?php echo $row_rprod['foto_utama']; ?>" data-target=".bd-example-modal-lg" data-toggle="modal">
                     <img alt="" src="https://hemerapartner.com/admin/foto/product/<?php echo $row_rprod['foto_utama']; ?>">
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
                   <!--<center>
                    
                    
                    <a href="javascript:void(0);" data-href="modul/product/edit_master_product.php?id_=<?php //echo $row_rprod['id_']; ?>" class="btn btn-success btn-sm text-white openPopup" style="width:100px;">Update</a>
                    </center>-->
                    
                    <center>
                    <a href="modul/product/edit_master_product.php?id_=<?php echo $row_rprod['id_']; ?>" class="btn btn-success btn-sm text-white"data-target=".bd-example-modal-lg" data-toggle="modal" style="width:100px;">Update</a>
                    </center>
                    
                    <center>
                    <a href="modul/product/del_master_product.php?id_=<?php echo $row_rprod['id_']; ?>" class="btn btn-danger btn-sm text-white" style="width:100px;">Delete</a>
                    </center>
                    
                    <center>
                    <a href="modul/product/detail_master_product.php?id_=<?php echo $row_rprod['id_']; ?>" class="btn btn-warning btn-sm "data-target=".bd-example-modal-lg" data-toggle="modal" style="width:100px;">Detail</a>
                    </center>
                    
                    <center>
                    <a href="modul/product/foto_master_product.php?id_=<?php echo $row_rprod['id_']; ?>" class="btn btn-info btn-sm text-white"data-target=".bd-example-modal-lg" data-toggle="modal" style="width:100px;">Add Foto</a>
                    </center>
                   </td>
                </tr>
                 <?php } while ($row_rprod = mysql_fetch_assoc($rprod)); ?>
               
            </tbody>
         </table>
      </div>
   </div>
</div>

<div class="onboarding-modal modal fade animated" id="myModal" role="dialog">
    <div class="modal-dialog modal-xl modal-centered">
    	<div class="modal-content">
        	<div class="onboarding-side-by-side">
                <div class="onboarding-media"><img alt="" src="img/bigicon5.png" width="200px"></div>
                	<div class="onboarding-content with-gradient">
                    	<!--<h4 class="onboarding-title">Example Request Information</h4>-->
                        	<!--<div class="onboarding-text">In this example you can see a form where you can request some additional information from the customer when they land on the app page. xxx
                            </div>
-->
            					<div class="modal-body">

            					</div>
            		</div>
            </div>
        </div>
    </div>
</div>

<div class="onboarding-modal modal fade animated" id="myModal" role="dialog">
    <div class="modal-dialog modal-xl modal-centered">
    	<div class="modal-content">
        	
        </div>
    </div>
</div>

<div class="onboarding-modal modal fade animated" id="myModal3" role="dialog">
    <div class="modal-dialog modal-xl modal-centered">
    	<div class="modal-content3">
        	
        </div>
    </div>
</div>

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