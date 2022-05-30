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

$xsds=$_POST['ssup'];
	if ($xsds!="") {$qsds=" WHERE product_master.kd_suplier='$xsds'";}
elseif ($xsds=="") {$qsds="";}

mysql_select_db($database_hemera, $hemera);
$query_rxsup = "SELECT * FROM suplier";
$rxsup = mysql_query($query_rxsup, $hemera) or die(mysql_error());
$row_rxsup = mysql_fetch_assoc($rxsup);
$totalRows_rxsup = mysql_num_rows($rxsup);

mysql_select_db($database_hemera, $hemera);
$query_rsup = "SELECT * FROM suplier WHERE kd_user='$_SESSION[HEM_kd_user]'";
$rsup = mysql_query($query_rsup, $hemera) or die(mysql_error());
$row_rsup = mysql_fetch_assoc($rsup);
$totalRows_rsup = mysql_num_rows($rsup);


mysql_select_db($database_hemera, $hemera);
$query_rprod = "SELECT * FROM product_master $qsds ORDER BY id_ DESC";
$rprod = mysql_query($query_rprod, $hemera) or die(mysql_error());
$row_rprod = mysql_fetch_assoc($rprod);
$totalRows_rprod = mysql_num_rows($rprod);
?>

<?php //echo $_SESSION['HEM_kd_user']; ?>

<div class="element-wrapper">

<div class="element-actions">
<form class="form-inline justify-content-sm-end" id="fsearch" name="fsearch" method="POST" action="index.php?com=list_sup_product_adm&layout=full">

<select name="ssup" class="form-control form-control-sm" id="ssup">
  <option value="">Pilih Supplier</option>
  <?php
do {  
?>
  <option value="<?php echo $row_rxsup['kd_suplier']?>"><?php echo $row_rxsup['nm_suplier']?></option>
  <?php
} while ($row_rxsup = mysql_fetch_assoc($rxsup));
  $rows = mysql_num_rows($rxsup);
  if($rows > 0) {
      mysql_data_seek($rxsup, 0);
	  $row_rxsup = mysql_fetch_assoc($rxsup);
  }
?>
</select>

<!--<input name="tgl" type="date" class="form-control form-control-sm" id="tgl" placeholder="tgl"/>

<input name="customer" type="text" class="form-control form-control-sm" id="customer" placeholder="customer"/>-->

<input name="bt_search" type="submit" class="btn btn-grey" style="margin-left:10px;" value="Search"/>

<a href="index.php?com=list_sup_product_adm&layout=full"><input name="bt_reload" type="button" class="btn btn-success" style="margin-left:10px;" value="Reload"/></a>
</form>
</div>

   <h6 class="element-header">List of Master Product</h6>
   <div class="element-box-tp">
      <div class="table-responsive">
         <table width="100%" class="table table-padded wrap">
            <thead>
               <tr>
                  <th width="2%"></th>
                  <th width="15%">&nbsp;</th>
                  <th width="15%">SKU</th>
                  <th width="15%">KD Supplier</th>
                  <th width="24%">Product Name</th>
                  <th width="13%">Net Price</th>
                  <th width="40%"> Description</th>
               </tr>
            </thead>
            <tbody>
               <?php do { ?>
               <tr style="height:200px;">
                   <td class="text-center">
                   <input class="form-control" type="checkbox">
                   </td>
                   <td>
                   <div class="btn-group mr-1 mb-1">
                   <button aria-expanded="false" aria-haspopup="true" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton1" type="button">Click</button>
                    
                   <div aria-labelledby="dropdownMenuButton1" class="dropdown-menu" style="z-index:999000 !important;">
                   <a class="dropdown-item" href="modul/supplier/edit_master_product.php?id_=<?php echo $row_rprod['id_']; ?>" data-target=".bd-example-modal-lg" data-toggle="modal"> Update</a>
                   
                   <a class="dropdown-item" href="modul/supplier/del_master_product.php?id_=<?php echo $row_rprod['id_']; ?>" > Delete</a>
                   
                   <a class="dropdown-item" href="modul/supplier/detail_master_product.php?id_=<?php echo $row_rprod['id_']; ?>" data-target=".bd-example-modal-lg" data-toggle="modal"> Detail</a>
                   
                   <a class="dropdown-item" href="modul/supplier/foto_master_product.php?id_=<?php echo $row_rprod['id_']; ?>" data-target=".bd-example-modal-lg" data-toggle="modal"> Add Foto</a>
                   
                   </div>
                   </div>
                   </td>
                   <td><span class="onboarding-media"><?php echo $row_rprod['sku']; ?></span></td>
                   <td><span class="onboarding-media"><?php echo $row_rprod['kd_suplier']; ?></span></td>
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
                </tr>
                 <?php } while ($row_rprod = mysql_fetch_assoc($rprod)); ?>
               
            </tbody>
         </table>
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