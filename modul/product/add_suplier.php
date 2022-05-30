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
<div class="element-wrapper">
                              <h6 class="element-header">Add Suplier Product</h6>
                              <div class="element-box">
                                 <form action="modul/product/in_suplier.php" method="post" enctype="multipart/form-data" id="fin">
                                    <!--<h5 class="form-header">Default Layout</h5>
                                    <div class="form-desc">Discharge best employed your phase each the of shine. Be met even reason consider logbook redesigns. Never a turned interfaces among asking</div>-->
                                    <!--<div class="form-group"><label for=""> Email address</label><input class="form-control" placeholder="Enter email" type="email"></div>-->
                                    <div class="row">
                                    
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="file_foto"> Suplier Code</label>
                                      <input name="kd_suplier" type="text" class="form-control" id="kd_suplier" >
                                      </div>
                                      </div>
                                      
                                      
                                      <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="file_foto"> Suplier Name</label>
                                      <input name="nm_suplier" type="text" class="form-control" id="nm_suplier" >
                                      </div>
                                      </div>
                                      
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                         <label for="file_foto"> Suplier Address</label>
                                         <input name="alamat_suplier" type="text" class="form-control" id="alamat_suplier" >
                                         </div>
                                       </div>
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                         <label for="file_foto">Contact Person</label>
                                         <input name="contact_person"  type="text" class="form-control" id="contact_person">
                                         </div>
                                       </div>
                                       
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                         <label for="file_foto">Email</label>
                                         <input name="email"  type="email" class="form-control" id="email
                                         ">
                                         </div>
                                       </div>
                                       
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                         <label for="file_foto">Mobile Number</label>
                                         <input name="no_hp"  type="text" class="form-control" id="no_hp">
                                         </div>
                                       </div>
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                            <label for="file_foto">Image</label>
                                          <input name="file_foto" type="file" id="file_foto" class="form-control"/>
                                         </div>
                                       </div>
                                      
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="form-buttons-w"><button class="btn btn-primary" type="submit"> Submit</button>
                                    <a href="?com=list_suplier&layout=full"><button class="btn btn-success" type="button"> List Supplier</button></a>
                                    </div>
                                    
                                    
                                 </form>
                              </div>
</div>


<?php
mysql_free_result($rgrup);
?>
