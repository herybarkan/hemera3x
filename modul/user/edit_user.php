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
$query_ruser = "SELECT * FROM user_ WHERE id_='$_GET[id_]'";
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
                              <h6 class="element-header">Update User</h6>
                              <div class="element-box">
                                 <form action="modul/user/in_user.php" method="post" enctype="multipart/form-data" id="fin">
                                    <!--<h5 class="form-header">Default Layout</h5>
                                    <div class="form-desc">Discharge best employed your phase each the of shine. Be met even reason consider logbook redesigns. Never a turned interfaces among asking</div>-->
                                    <!--<div class="form-group"><label for=""> Email address</label><input class="form-control" placeholder="Enter email" type="email"></div>-->
                                    <div class="row">
                                    
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="file_foto"> Name</label>
                                      <input name="nama" type="text" class="form-control" id="nama" value="<?php echo $row_ruser['nama']; ?>" >
                                      <input name="hf_id" type="hidden" id="hf_id" value="<?php echo $row_ruser['id_']; ?>" />
                                      </div>
                                      </div>
                                      
                                      
                                      <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="file_foto"> Mobile Number</label>
                                      <input name="hp" type="text" class="form-control" id="hp" value="<?php echo $row_ruser['hp']; ?>" >
                                      </div>
                                      </div>
                                      
                                       <div class="col-sm-6">
                                          <div class="form-group"><label for="file_foto"> Email</label>
                                         <input name="email" type="email" class="form-control" id="email" value="<?php echo $row_ruser['email']; ?>">
                                         </div>
                                       </div>
                                       <div class="col-sm-6">
                                          <div class="form-group"><label for="file_foto">Password</label>
                                         <input name="password"  type="password" class="form-control" id="password">
                                         </div>
                                       </div>
                                       
                                       <div class="col-sm-6">
                                          <div class="form-group"><label for="file_foto">User Group</label>
                                          <select name="sgrup" class="form-control" id="sgrup">
                                            <option value="" <?php if (!(strcmp("", $row_ruser['grup']))) {echo "selected=\"selected\"";} ?>>Select</option>
                                            <?php
do {  
?>
                                            <option value="<?php echo $row_rgrup['kd_grup']?>"<?php if (!(strcmp($row_rgrup['kd_grup'], $row_ruser['grup']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rgrup['nm_grup']?></option>
                                            <?php
} while ($row_rgrup = mysql_fetch_assoc($rgrup));
  $rows = mysql_num_rows($rgrup);
  if($rows > 0) {
      mysql_data_seek($rgrup, 0);
	  $row_rgrup = mysql_fetch_assoc($rgrup);
  }
?>
                                          </select>
                                       </div>
                                       </div>
                                       
                                       <?php if ($row_ruser['foto']=="") { ?>
                                       <div class="col-sm-6">
                                          <div class="form-group"><label for="file_foto">Foto</label>
                                          <input name="file_foto" type="file" id="file_foto" class="form-control"/>
                                         </div>
                                       </div>
                                       <?php } elseif ($row_ruser['foto']!="") { ?>
                                       <div class="col-sm-6">
                                          <div class="form-group"><label for="file_foto">Foto</label>
                                          <div>
                                          <img alt="" src="foto/user/<?php echo $row_ruser['foto']; ?>" class="rounded" style="width:150px;">
                                          </div>
                                         </div>
                                       </div>
                                       <?php } ?>
                                       
                                      
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="form-buttons-w"><button class="btn btn-primary" type="submit"> Submit</button></div>
                                 </form>
                              </div>
</div>
<?php
mysql_free_result($rgrup);
?>
