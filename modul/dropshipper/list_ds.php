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
$query_ruser = "SELECT user_.id_, user_.id_ AS idx, user_.kd_user, user_.nama, user_.nm_toko, user_.hp, user_.email, user_.foto, upload_pembayaran.atas_nama, upload_pembayaran.nominal, upload_pembayaran.bank, upload_pembayaran.dari_rek, user_grup.nm_grup, dropshiper.kd_dropshiper, dropshiper.nm_domain FROM upload_pembayaran JOIN user_ ON upload_pembayaran.email = user_.email  JOIN user_grup ON user_grup.kd_grup = user_.grup  JOIN dropshiper ON dropshiper.kd_user = user_.kd_user WHERE user_.grup='6'  AND user_.aktif='1'";
$ruser = mysql_query($query_ruser, $hemera) or die(mysql_error());
$row_ruser = mysql_fetch_assoc($ruser);
$totalRows_ruser = mysql_num_rows($ruser);
?>

<div class="element-wrapper">
   <h6 class="element-header">List of Active Dropshipper</h6>
   <div class="element-box-tp">
      <div class="table-responsive">
         <table width="100%" class="table table-padded">
            <thead>
               <tr>
                  <th width="3%"></th>
                  <th width="20%">Name</th>
                  <th width="41%">Domain Name</th>
                  <th width="41%">Shop Name</th>
                  <th width="8%"> Status</th>
                  <th width="17%">Actions</th>
               </tr>
            </thead>
            <tbody>
               <?php do { ?>
               <tr>
                   <td class="text-center">
                   <input class="form-control" type="checkbox">
                   </td>
                   <td>
                     <div class="user-with-avatar"><img alt="" src="foto/user/<?php echo $row_ruser['foto']; ?>"><span><?php echo $row_ruser['nama']; ?></span></div>
                   </td>
                   <td><?php echo $row_ruser['nm_domain']; ?></td>
                   <td><?php echo $row_ruser['nm_toko']; ?></td>
                   <td class="nowrap">
                   <?php 
				   if ($row_ruser['atas_nama']!="") { ?>
                   <span class="status-pill smaller green"></span>
                   <span>Transfer</span>
                   <?php } elseif ($row_ruser['atas_nama']=="") { ?>
				   <span class="status-pill smaller red"></span>
                   <span>No</span>
					<?php } ?>
                   </td>
                   <td >
                   
                   
                    <?php 
				   if ($row_ruser['atas_nama']!="") { ?>
                   <center>
                    <a href="javascript:void(0);" data-href="modul/dropshipper/cek_transfer.php?id_=<?php echo $row_ruser['idx']; ?>" class="btn btn-success btn-sm text-white openPopup2" style="width:100px;">Payment</a>
                    </center>
                    <?php } ?>
                    <!--<center>
                    <a href="javascript:void(0);" data-href="modul/user/del_user.php?id_=<?php //echo $row_ruser['id_']; ?>" class="btn btn-danger btn-sm text-white openPopup" style="width:100px;">Reject</a>
                    </center>-->
                                 
                   </td>
                </tr>
                 <?php } while ($row_ruser = mysql_fetch_assoc($ruser)); ?>
               
            </tbody>
         </table>
      </div>
   </div>
</div>

<div class="onboarding-modal modal fade animated" id="myModal" role="dialog">
    <div class="modal-dialog modal-xl modal-centered">
    	<div class="modal-content">
        	
        </div>
    </div>
</div>

<?php
mysql_free_result($ruser);
?>