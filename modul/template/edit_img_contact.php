<?php require_once('../../Connections/hemera.php'); ?>
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


//echo $imgx;
//echo $_GET['id_'];

mysql_select_db($database_hemera, $hemera);
$query_rcontact = "SELECT id_, img_atas AS gambar FROM ds_contact WHERE id_='$_GET[id_]'";
$rcontact = mysql_query($query_rcontact, $hemera) or die(mysql_error());
$row_rcontact = mysql_fetch_assoc($rcontact);
$totalRows_rcontact = mysql_num_rows($rcontact);


?>
<img src="https://hemerapartner.com/admin/img/template/contact/<?php echo $row_rcontact['gambar']; ?>" style="width:100%;" />
<br><br>
<div class="col-sm-12">
      <div class="element-wrapper">
         
         <h6 class="element-header">Update Image</h6>
         <div class="element-content">
   
<form action="modul/template/ed_image_contact.php" method="POST" enctype="multipart/form-data" id="fup">
<div class="row">
                                    
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label for=""> Upload Image</label>
                                             <input name="file_foto" type="file" class="form-control" required="required">
                                            <input name="hf_id" type="hidden" id="hf_id" value="<?php echo $row_rcontact['id_']; ?>" />
                                          </div>
                                          <small>Ukuran Standar 1170 x 450 pixel</small>
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
