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

mysql_select_db($database_hemera, $hemera);
$query_ruser = "SELECT user_.id_, user_.kd_user, user_.nama, user_.hp, user_.email, user_.username, user_.grup, user_.foto, user_.tgl_in, user_grup.nm_grup FROM user_grup JOIN user_ ON user_grup.kd_grup = user_.grup ";
$ruser = mysql_query($query_ruser, $hemera) or die(mysql_error());
$row_ruser = mysql_fetch_assoc($ruser);
$totalRows_ruser = mysql_num_rows($ruser);

mysql_select_db($database_hemera, $hemera);
$query_rsup = "SELECT * FROM suplier ORDER BY id_ DESC";
$rsup = mysql_query($query_rsup, $hemera) or die(mysql_error());
$row_rsup = mysql_fetch_assoc($rsup);
$totalRows_rsup = mysql_num_rows($rsup);
?>

<div class="element-wrapper">
   <h6 class="element-header">List of Suplier
   
   <a href="?com=product_suplier"><button class="mr-2 mb-2 btn btn-outline-danger float-right" type="button"> Add Supplier</button></a>
   </h6>
   <div class="element-box-tp">
      <div class="table-responsive">
         <table width="100%" class="table table-padded">
            <thead>
               <tr>
                  <th width="4%"></th>
                  <th width="11%">Action</th>
                  <th width="11%">Suplier Code</th>
                  <th width="21%">Suplier Name</th>
                  <th width="15%">Contact Person</th>
                  <th width="19%">Email</th>
                  <th width="12%"> Mobile</th>
                  <th width="12%">Area</th>
               </tr>
            </thead>
            <tbody>
               <?php do { ?>
               <tr>
                   <td class="text-center">
                   <input class="form-control" type="checkbox">
                   </td>
                   <td align="center">
                   <center>
                    <a href="javascript:void(0);" data-href="modul/product/edit_supplier.php?id_=<?php echo $row_rsup['id_']; ?>" class="btn btn-success btn-sm text-white openPopup" style="width:60px;">Update</a>
                    </center>
                    <center>
                    <a href="javascript:void(0);" data-href="modul/product/del_supplier.php?id_=<?php echo $row_rsup['id_']; ?>" class="btn btn-danger btn-sm text-white openPopup" style="width:60px;">Delete</a>
                   </center>    
                   </td>
                   <td><?php echo $row_rsup['kd_suplier']; ?></td>
                   <td>
                     <div class="user-with-avatar"><img alt="" src="foto/<?php echo $row_rsup['foto']; ?>"><span class="text-center"><?php echo $row_rsup['nm_suplier']; ?></span></div>
                   </td>
                   <td><span class="text-center"><?php echo $row_rsup['contact_person']; ?></span></td>
                   <td class="text-center"><?php echo $row_rsup['email']; ?></td>
                   <td class="nowrap"><?php echo $row_rsup['no_hp']; ?></td>
                   <td class="nowrap"><?php echo $row_rsup['area']; ?></td>
                </tr>
                 <?php } while ($row_rsup = mysql_fetch_assoc($rsup)); ?>
               
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
<?php
mysql_free_result($ruser);

mysql_free_result($rsup);
?>