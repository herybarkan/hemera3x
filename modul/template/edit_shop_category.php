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
$query_rbf = "SELECT * FROM ds_shop_category WHERE kd_dropshipper='$_SESSION[HEM_kd_ds]' AND id_='$_GET[id_sc]'";
$rbf = mysql_query($query_rbf, $hemera) or die(mysql_error());
$row_rbf = mysql_fetch_assoc($rbf);
$totalRows_rbf = mysql_num_rows($rbf);
?>
<img src="https://hemerapartner.com/admin/img/template/shop_category/<?php echo $row_rbf['foto']; ?>" style="height:218px;;" />
<br><br>
<div class="col-sm-12">
      <div class="element-wrapper">
         
         <h6 class="element-header">Update Image Shop Category</h6>
         <div class="element-content">
   
<form action="modul/template/ed_shop_category.php" method="POST" enctype="multipart/form-data" id="fup">
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
                                             <a class="btn btn-grey" href="#" onclick="show_sc();"><i class="os-icon os-icon-plus-circle"></i><span>Browse File</span></a>
                                          </div>
                                       </div>
                                       
                                       <div class="col-sm-12">
                                       <div id="result_sc"></div>
                                       </div>
                                       
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                            <label for="">Nama</label>
                                             <input name="nama" class="form-control" id="nama" value="<?php echo $row_rbf['nama']; ?>">
                                             <div class="help-block form-text with-errors form-control-feedback"></div>
                                          </div>
                                       </div>
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                            <label for="">Link</label>
                                             <input name="link" class="form-control" id="link" value="<?php echo $row_rbf['link']; ?>">
                                             <div class="help-block form-text with-errors form-control-feedback"></div>
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
