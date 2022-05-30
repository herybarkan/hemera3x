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

mysql_select_db($database_hemera, $hemera);
$query_rsup = "SELECT * FROM suplier";
$rsup = mysql_query($query_rsup, $hemera) or die(mysql_error());
$row_rsup = mysql_fetch_assoc($rsup);
$totalRows_rsup = mysql_num_rows($rsup);

mysql_select_db($database_hemera, $hemera);
$query_rcolor = "SELECT * FROM product_color";
$rcolor = mysql_query($query_rcolor, $hemera) or die(mysql_error());
$row_rcolor = mysql_fetch_assoc($rcolor);
$totalRows_rcolor = mysql_num_rows($rcolor);

mysql_select_db($database_hemera, $hemera);
$query_rsize = "SELECT * FROM product_size";
$rsize = mysql_query($query_rsize, $hemera) or die(mysql_error());
$row_rsize = mysql_fetch_assoc($rsize);
$totalRows_rsize = mysql_num_rows($rsize);

mysql_select_db($database_hemera, $hemera);
$query_rkat = "SELECT * FROM kategori";
$rkat = mysql_query($query_rkat, $hemera) or die(mysql_error());
$row_rkat = mysql_fetch_assoc($rkat);
$totalRows_rkat = mysql_num_rows($rkat);



?>

<?php
srand ((double) microtime() * 10000000);
$input = array ("A", "B", "C", "D", "E","F","G","H","I","J","K","L","M","N","O","P","Q",
"R","S","T","U","V","W","X","Y","Z");
$rand_index = array_rand($input,8);
$kode= $input[$rand_index[3]].$input[$rand_index[5]].$input[$rand_index[4]].$input[$rand_index[2]].$input[$rand_index[1]];

$zxtahun=date('y');
$zxbulan=date('m');
$zxtanggal=date('d');
$zxjam=date('H');
$zxmenit=date('i');
$zxdetik=date('s');
$awal="PROD";

$kd_prod = $awal.$kode.$zxtahun.$zxbulan.$zxtanggal.$zxjam.$zxmenit.$zxdetik;
?>

<!--<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>-->
<script src="bower_components/ckeditor/ckeditor.js"></script>
<div class="element-wrapper">
                              <h6 class="element-header">Add Blog
                              <a href="?com=list_blog&layout=full" ><button class="mr-2 mb-2 btn btn-outline-primary float-right" type="button"> List Blog</button></a>
                              </h6>
                              <div class="element-box">
                                 <form action="modul/blog/in_blog.php" method="post" enctype="multipart/form-data" id="fin">
                                    
                                    <div class="row">
                                      <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="file_foto"> Date</label>
                                      <input name="tgl" type="date" class="form-control" id="tgl"  required="required">
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-6">
                                         <div class="form-group">
                                            <label for="file_foto">Picture</label>
                                          <input name="file_foto" type="file" id="file_foto" class="form-control" required="required"/>
                                         </div>
                                       </div>
                                      
                                      
                                      <div class="col-sm-12">
                                      <div class="form-group">
                                        <label for="file_foto"> Title</label>
                                      <input name="title" type="text" class="form-control" id="title" required="required" >
                                      </div>
                                      </div>
                                      
                                      
                                      
                                  <!--     <div class="col-sm-12">
                                      <div class="form-group">
                                        <label for="file_foto"> Content</label>
                                      <textarea name="content" ></textarea>
                                      </div>
                                      </div>
                                  -->  
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label for="file_foto"> Content</label>
                                    <textarea name="editor1" required="required"></textarea>
                                    	</div>
                                     </div>
                						<script>
                        					CKEDITOR.replace( 'editor1' );
                						</script>
                                    
                                    
                                    
                                    
                                    
                                    
                                    <div class="form-buttons-w"><button class="btn btn-primary" type="submit"> Submit</button></div>
                                 </form>
                              </div>
</div>


<?php
mysql_free_result($rgrup);
?>
