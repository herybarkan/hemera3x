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

mysql_select_db($database_hemera, $hemera);
$query_rbf = "SELECT * FROM ds_banner_category WHERE id_='$_GET[id_bf]'";
$rbf = mysql_query($query_rbf, $hemera) or die(mysql_error());
$row_rbf = mysql_fetch_assoc($rbf);
$totalRows_rbf = mysql_num_rows($rbf);
?>
<img src="https://hemerapartner.com/admin/img/template/box_front/<?php echo $row_rbf['foto']; ?>" style="height:250px;;" />
<br><br>
<div class="col-sm-12">
      <div class="element-wrapper">
         
         <h6 class="element-header">Update Image Box Front</h6>
         <div class="element-content">
   
<form action="modul/template/ed_boxfront.php" method="POST" enctype="multipart/form-data" id="fup">
<div class="row">
                                    
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label for=""> Upload Image</label>
                                             <input name="file_foto" type="file" class="form-control">
                                            <input name="hf_id" type="hidden" id="hf_id" value="<?php echo $row_rbf['id_']; ?>" />
                                          </div>
                                          <small>Ukuran Standar 1920 x 700 pixel</small>
                                       </div>
                                       
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label for=""> Pilih Gambar yang tersedia di Server</label>
                                             <br>
                                             <a class="btn btn-grey" href="#" onclick="show_bf('<?php echo $row_rbf['id_foto']; ?>');"><i class="os-icon os-icon-plus-circle"></i><span>Browse File</span></a>
                                          </div>
                                       </div>
                                       
                                       <div class="col-sm-12">
                                       <div id="result_bf"></div>
                                       </div>
                                       
                                       <br>
                                       <div class="col-sm-12">
                                      <div class="form-group">
                                        <label for="file_foto"> Title</label>
                                      <input name="title" type="text" class="form-control" id="title" value="<?php echo $row_rbf['title']; ?>" >
                                      </div>
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
