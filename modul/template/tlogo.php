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
$query_rds = "SELECT * FROM dropshiper WHERE kd_dropshiper='$_SESSION[HEM_kd_ds]'";
$rds = mysql_query($query_rds, $hemera) or die(mysql_error());
$row_rds = mysql_fetch_assoc($rds);
$totalRows_rds = mysql_num_rows($rds);



?>
<div class="col-sm-12">
      <div class="element-wrapper">
         
         <h6 class="element-header">Update Logo</h6>
         <div class="element-content">
   
<form action="modul/template/ed_logo.php" method="POST" enctype="multipart/form-data" id="fup">
<div class="row">
                                    
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label for=""> Upload Image</label>
                                             <input name="file_foto" type="file" class="form-control">
                                            <input name="hf_id" type="hidden" id="hf_id" value="<?php echo $row_rds['id_']; ?>" />
                                          </div>
                                          <small>Ukuran Standar 1920 x 700 pixel</small>
                                       </div>
                                       
                                       <div class="col-sm-6">
                                         <div class="form-group">
                                             <label for=""> Logo saat ini</label>
                                             <br>
                                          <img src="https://hemerapartner.com/admin/img/template/logo/<?php echo $row_rds['logo']; ?>" width="105" /> </div>
                                          <small> ukuran logo 105 x 24 pixel. lebih bagus format png transparant</small>
                                       </div>
                                       
                                       
                                       
                                       
                                       <div class="col-sm-12">
                                          <div class="form-group">
                                             <div class="form-buttons-w"><button class="btn btn-primary" type="submit"> Submit</button></div>
                                          </div>
                                       </div>
                                       
                                       
                                    </div>
</form>
</div>
</div>
</div>