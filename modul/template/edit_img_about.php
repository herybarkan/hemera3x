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

$imgx=$_GET['img'];

//echo $imgx;
//echo $_GET['id_'];

mysql_select_db($database_hemera, $hemera);
$query_rabout = "SELECT id_, $imgx AS gambar FROM ds_about WHERE id_='$_GET[id_]'";
$rabout = mysql_query($query_rabout, $hemera) or die(mysql_error());
$row_rabout = mysql_fetch_assoc($rabout);
$totalRows_rabout = mysql_num_rows($rabout);

	if ($imgx=="image_atas") {$text="Ukuran Standar 1170 x 450 pixel";}
elseif ($imgx=="img1") {$text="Ukuran Standar 396 x 290 pixel";}
elseif ($imgx=="img2") {$text="Ukuran Standar 276 x 320 pixel";}

?>
<img src="https://hemerapartner.com/admin/img/template/about/<?php echo $row_rabout['gambar']; ?>" style="width:100%;" />
<br><br>
<div class="col-sm-12">
      <div class="element-wrapper">
         
         <h6 class="element-header">Update Image</h6>
         <div class="element-content">
   
<form action="modul/template/ed_image_about.php" method="POST" enctype="multipart/form-data" id="fup">
<div class="row">
                                    
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label for=""> Upload Image</label>
                                             <input name="file_foto" type="file" class="form-control" required="required">
                                            <input name="hf_id" type="hidden" id="hf_id" value="<?php echo $row_rabout['id_']; ?>" />
                                            <input name="hf_field" type="hidden" id="hf_field" value="<?php echo $imgx; ?>" />
                                          </div>
                                          <small><?php echo $text; ?></small>
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
