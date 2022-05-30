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
$query_rabout = "SELECT * FROM ds_about WHERE kd_ds='$_SESSION[HEM_kd_ds]'";
$rabout = mysql_query($query_rabout, $hemera) or die(mysql_error());
$row_rabout = mysql_fetch_assoc($rabout);
$totalRows_rabout = mysql_num_rows($rabout);
?>

<div class="element-wrapper">
                              <h6 class="element-header">Update Page About
                              <!--<a href="?com=list_master_product&layout=full" ><button class="mr-2 mb-2 btn btn-outline-primary float-right" type="button"> List Product</button></a>-->
                              </h6>
                              
                              <div class="element-box">

                                    <div class="row">
                                      <div class="col-sm-12">
                                      <img src="img/template/about/<?php echo $row_rabout['image_atas']; ?>" alt="Foto" style="width:100%;">
                                      <a class="btn btn-outline-primary" href="modul/template/edit_img_about.php?id_=<?php echo $row_rabout['id_']; ?>&img=image_atas" style="margin-top:-75px; margin-left:10px;" data-target=".bd-example-modal-lg" data-toggle="modal"><span>Edit</span><i class="os-icon os-icon-arrow-2-right"></i></a>
                                      </div>
                                    </div>  
                                    
                                    <br>
                                    
                                    <div class="row">
                                      <div class="col-sm-6">
                                      <img src="img/template/about/<?php echo $row_rabout['img1']; ?>" alt="Foto" style="width:100%;">
                                      <a class="btn btn-outline-primary" href="modul/template/edit_img_about.php?id_=<?php echo $row_rabout['id_']; ?>&img=img1" style="margin-top:-75px; margin-left:10px;" data-target=".bd-example-modal-lg" data-toggle="modal"><span>Edit</span><i class="os-icon os-icon-arrow-2-right"></i></a>
                                      </div>
                                      
                                      <div class="col-sm-6">
                                      <img src="img/template/about/<?php echo $row_rabout['img2']; ?>" alt="Foto" style="width:100%;">
                                      <a class="btn btn-outline-primary" href="modul/template/edit_img_about.php?id_=<?php echo $row_rabout['id_']; ?>&img=img2" style="margin-top:-75px; margin-left:10px;" data-target=".bd-example-modal-lg" data-toggle="modal"><span>Edit</span><i class="os-icon os-icon-arrow-2-right"></i></a>
                                      </div>
                                      
                                   </div>
                                    
                              </div>
                              
                              <div class="element-box">
                                 <form action="modul/template/ed_about.php" method="post" enctype="multipart/form-data" id="fin">
                                    
                                    <div class="row">
                                      <div class="col-sm-12">
                                      <div class="form-group">
                                        <label for="file_foto"> Visi</label>
                                      <textarea name="visi" cols="" rows="4" class="form-control"><?php echo $row_rabout['visi']; ?></textarea>
                                      <input name="hf_id" type="hidden" id="hf_id" value="<?php echo $row_rabout['id_']; ?>" />
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-12">
                                      <div class="form-group">
                                        <label for="file_foto"> Misi</label>
                                      <textarea name="misi" cols="" rows="4" class="form-control"><?php echo $row_rabout['misi']; ?></textarea>
                                      </div>
                                      </div>
                                    
                                    
                                     <div class="col-sm-12">
                                      <div class="form-group">
                                        <label for="file_foto"> Description</label>
                                      <textarea name="title" cols="" rows="8" class="form-control" id="title"><?php echo $row_rabout['title']; ?></textarea>
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-12">
                                      <div class="form-group">
                                        <label for="file_foto"> Who we are</label>
                                      <textarea name="whoweare" cols="" rows="8" class="form-control" id="whoweare"><?php echo $row_rabout['whoweare']; ?></textarea>
                                      </div>
                                      </div>
                                   </div>
                                    
                                    
                                    
                                    
                                    <div class="form-buttons-w"><button class="btn btn-primary" type="submit"> Update</button></div>
                                 </form>
                              </div>
</div>

<div aria-hidden="true" aria-labelledby="myLargeModalLabel" class="modal fade bd-example-modal-lg" role="dialog" tabindex="-1">
                              <div class="modal-dialog modal-lg">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel"> </h5>
                                       <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                       
                                    </div>
                                    
                                 </div>
                              </div>
                           </div>
