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
$query_rgrup = "SELECT * FROM user_grup";
$rgrup = mysql_query($query_rgrup, $hemera) or die(mysql_error());
$row_rgrup = mysql_fetch_assoc($rgrup);
$totalRows_rgrup = mysql_num_rows($rgrup);
?>
<script type="text/javascript" src="js/ajax_add_user.js"></script>

<div class="element-wrapper">
                              <h6 class="element-header">Add User</h6>
                              <div class="element-box">
                                 <form action="modul/user/in_user.php" method="post" enctype="multipart/form-data" id="fin">
                                    
                                    <div class="row">
                                    
                                    <div class="col-sm-6">
                                          <div class="form-group"><label for="file_foto"> Email</label>
                                         <input name="email" type="email" class="form-control" id="email" >
                                         </div>
                                       </div>
                                       
                                       <div class="col-sm-6">
                                          <div class="form-group"><label for="file_foto">Password</label>
                                         <input name="password"  type="password" class="form-control" id="password">
                                         </div>
                                       </div>
                                    
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="file_foto"> Name</label>
                                      <input name="nama" type="text" class="form-control" id="nama" >
                                      </div>
                                      </div>
                                      
                                      
                                      <div class="col-sm-6">
                                          <div class="form-group"><label for="file_foto">User Group</label>
                                          <select name="sgrup" class="form-control" id="sgrup" onchange="show_addu(document.getElementById('sgrup').value)">
                                            <option value="">Select</option>
                                            <?php
do {  
?>
                                            <option value="<?php echo $row_rgrup['kd_grup']?>"><?php echo $row_rgrup['nm_grup']?></option>
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
                                       
                                       <div class="col-6">
                                       <div id="result_addu"></div>
                                       </div>
                           
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="form-buttons-w"><button class="btn btn-primary" type="submit"> Submit</button></div>
                                 </form>
                              </div>
</div>
<?php
mysql_free_result($rgrup);
?>
