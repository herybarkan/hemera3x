<?php require_once('../../Connections/hemera.php'); ?>
<?php

ob_start();
session_start();

error_reporting(0);
@ini_set('display_errors', 0);

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
$query_rgrupu = "SELECT * FROM user_grup WHERE id_='$_GET[id_]'";
$rgrupu = mysql_query($query_rgrupu, $hemera) or die(mysql_error());
$row_rgrupu = mysql_fetch_assoc($rgrupu);
$totalRows_rgrupu = mysql_num_rows($rgrupu);
?>
<h4 class="onboarding-title">Form Update</h4>

<div class="element-wrapper">
                              <h6 class="element-header">Group of User</h6>
                              <div class="element-box">
                                 <form action="modul/user/ed_grup_user.php" method="post" id="fupdate">
                                    <!--<h5 class="form-header">Default Layout</h5>
                                    <div class="form-desc">Discharge best employed your phase each the of shine. Be met even reason consider logbook redesigns. Never a turned interfaces among asking</div>-->
                                    <!--<div class="form-group"><label for=""> Email address</label><input class="form-control" placeholder="Enter email" type="email"></div>-->
                                    <div class="row">
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="file_foto"> Group Code</label>
                                      <input name="kd_grup" type="text" class="form-control" id="kd_grup" value="<?php echo $row_rgrupu['kd_grup']; ?>" ></div>
                                      </div>
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                         <label for="file_foto"> Group Name</label>
                                         <input name="nm_grup" type="text" class="form-control" id="nm_grup" value="<?php echo $row_rgrupu['nm_grup']; ?>" ></div>
                                       </div>
                                       <div class="col-sm-6"></div>
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="form-buttons-w"><button class="btn btn-primary" type="submit"> Update</button></div>
                                 </form>
                              </div>
                              
                              
</div>
<?php
mysql_free_result($rgrup);

mysql_free_result($rgrupu);
?>
