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
?>

<div class="element-wrapper">
   <h6 class="element-header">List of User</h6>
   <div class="element-box-tp">
      <div class="table-responsive">
         <table width="100%" class="table table-padded">
            <thead>
               <tr>
                  <th></th>
                  <th>Name</th>
                  <th>Website Name</th>
                  <th>Group</th>
                  <th> Status</th>
                  <th>Actions</th>
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
                   <td>
                     <div class="smaller lighter">I have enabled the software for you, you can try now...</div>
                   </td>
                   <td class="text-center"><a class="badge badge-success-inverted" href=""><?php echo $row_ruser['nm_grup']; ?></a></td>
                   <td class="nowrap"><span class="status-pill smaller green"></span><span>Active</span></td>
                   <td >
                   
                   
                    
                    <a href="javascript:void(0);" data-href="modul/user/edit_user.php?id_=<?php echo $row_ruser['id_']; ?>" class="btn btn-success btn-sm text-white openPopup">Update</a>
                    
                    <a href="javascript:void(0);" data-href="modul/user/del_user.php?id_=<?php echo $row_ruser['id_']; ?>" class="btn btn-danger btn-sm text-white openPopup">Delete</a>
                    
                                 
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
?>