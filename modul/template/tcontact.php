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
$query_rcontact = "SELECT * FROM ds_contact WHERE kd_ds='$_SESSION[HEM_kd_ds]'";
$rcontact = mysql_query($query_rcontact, $hemera) or die(mysql_error());
$row_rcontact = mysql_fetch_assoc($rcontact);
$totalRows_rcontact = mysql_num_rows($rcontact);
?>

<div class="element-wrapper">
                              <h6 class="element-header">Update Page Contact
                              <!--<a href="?com=list_master_product&layout=full" ><button class="mr-2 mb-2 btn btn-outline-primary float-right" type="button"> List Product</button></a>-->
                              </h6>
                              
                              <div class="element-box">

                                    <div class="row">
                                      <div class="col-sm-12">
                                      <img src="img/template/contact/<?php echo $row_rcontact['img_atas']; ?>" alt="Foto" style="width:100%;">
                                      <a class="btn btn-outline-primary" href="modul/template/edit_img_contact.php?id_=<?php echo $row_rcontact['id_']; ?>" style="margin-top:-75px; margin-left:10px;" data-target=".bd-example-modal-lg" data-toggle="modal"><span>Edit</span><i class="os-icon os-icon-arrow-2-right"></i></a>
                                      </div>
                                    </div>  
                                    
                                    <br>
                                    
                                    
                                    
                              </div>
                              
                              <div class="element-box">
                                 <form action="modul/template/ed_contact.php" method="post" enctype="multipart/form-data" id="fin">
                                    
                                    <div class="row">
                                    
                                   
                                      
                                      <div class="col-sm-12">
                                      <div class="form-group">
                                        <label for="file_foto"> Alamat</label>
                                      <textarea name="alamat" cols="" rows="4" class="form-control"><?php echo $row_rcontact['kantor_alamat']; ?></textarea>
                                      <input name="hf_id" type="hidden" id="hf_id" value="<?php echo $row_rcontact['id_']; ?>" />
                                      </div>
                                      </div>
                                      
                                       <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="file_foto"> Telepon Kantor</label>
                                      <input name="telp_kantor" type="text" class="form-control" id="telp_kantor" value="<?php echo $row_rcontact['kantor_telpon']; ?>" >
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="file_foto"> Email Kantor</label>
                                      <input name="email_kantor" type="text" class="form-control" id="email_kantor" value="<?php echo $row_rcontact['kantor_email']; ?>" >
                                      </div>
                                      </div>
                                      
                                       <div class="col-sm-6">
                                       <div class="form-group">
                                        <label for="file_foto"> Alamat Toko</label>
                                      <input name="alamat_toko" type="text" class="form-control" id="alamat_toko" value="<?php echo $row_rcontact['toko_alamat']; ?>" >
                                      </div>
                                      </div>
                                      
                                       <div class="col-sm-6">
                                       <div class="form-group">
                                        <label for="file_foto"> Telepon Toko</label>
                                      <input name="telpon_toko" type="text" class="form-control" id="telpon_toko" value="<?php echo $row_rcontact['toko_telpon']; ?>" >
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-6">
                                       <div class="form-group">
                                        <label for="file_foto"> Whatsapp</label>
                                      <input name="wa" type="text" class="form-control" id="wa" value="<?php echo $row_rcontact['toko_wa']; ?>" >
                                      </div>
                                      </div>
                                      
                                       <div class="col-sm-6">
                                       <div class="form-group">
                                        <label for="file_foto"> Instagram</label>
                                      <input name="ig" type="text" class="form-control" id="ig" value="<?php echo $row_rcontact['toko_ig']; ?>" >
                                      </div>
                                      </div>
                                      
                                       <div class="col-sm-6">
                                       <div class="form-group">
                                        <label for="file_foto"> Facebook</label>
                                      <input name="fb" type="text" class="form-control" id="fb" value="<?php echo $row_rcontact['toko_fb']; ?>" >
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
