<?php require_once('../../Connections/hemera.php'); ?>
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
$query_ruser = "SELECT * FROM user_ WHERE kd_user='$_GET[kd_user]'";
$ruser = mysql_query($query_ruser, $hemera) or die(mysql_error());
$row_ruser = mysql_fetch_assoc($ruser);
$totalRows_ruser = mysql_num_rows($ruser);

mysql_select_db($database_hemera, $hemera);
$query_rgrup = "SELECT * FROM user_grup";
$rgrup = mysql_query($query_rgrup, $hemera) or die(mysql_error());
$row_rgrup = mysql_fetch_assoc($rgrup);
$totalRows_rgrup = mysql_num_rows($rgrup);
?>
<h4 class="onboarding-title">Form Update</h4>
<div class="element-wrapper">
                              <h6 class="element-header">Update Foto</h6>
                              <div class="element-box">
                                 <form action="modul/dropshipper/in_upload_foto.php" method="post" enctype="multipart/form-data" id="fin">
                                    <!--<h5 class="form-header">Default Layout</h5>
                                    <div class="form-desc">Discharge best employed your phase each the of shine. Be met even reason consider logbook redesigns. Never a turned interfaces among asking</div>-->
                                    <!--<div class="form-group"><label for=""> Email address</label><input class="form-control" placeholder="Enter email" type="email"></div>-->
                                    <div class="row">
                                    
                                    <div class="col-sm-12">
                                          <div class="form-group"><label for="file_foto">Foto</label>
                                          <div>
                                          <img alt="" src="foto/user/<?php echo $row_ruser['foto']; ?>" class="rounded" style="width:40%;">
                                          </div>
                                         </div>
                                       </div>
                                      
                                       <div class="col-sm-12">
                                          <div class="form-group"><label for="file_foto">Foto</label>
                                          <input name="file_foto" type="file" id="file_foto" class="form-control"/>
                                          <input name="hf_id" type="hidden" id="hf_id" value="<?php echo $row_ruser['id_']; ?>" />
                                         </div>
                                       </div>
                                    </div>
                                    <div class="form-buttons-w"><button class="btn btn-primary" type="submit"> Submit</button></div>
                                 </form>
                              </div>
</div>
<?php
mysql_free_result($rgrup);
?>
