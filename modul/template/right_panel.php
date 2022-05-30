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
$query_rds = "SELECT * FROM ds_right_panel WHERE kd_ds='$_SESSION[HEM_kd_ds]'";
$rds = mysql_query($query_rds, $hemera) or die(mysql_error());
$row_rds = mysql_fetch_assoc($rds);
$totalRows_rds = mysql_num_rows($rds);



?>

<script type="text/javascript" src="js/ajax_boxfront.js"></script>
<script type="text/javascript" src="js/ajax_crp1.js"></script>
<script type="text/javascript" src="js/ajax_crp2.js"></script>
<script type="text/javascript" src="js/ajax_crp3.js"></script>
<div class="row pt-4">
   <div class="col-sm-12">
      <div class="element-wrapper">
         
         <h6 class="element-header">Right Panel</h6>
         <div class="element-content">
            
            

<div class="element-box-tp">
<?php $x=1; ?>
                                      <?php do { ?>
                                       <div class="post-box" >
                                          <!--<div class="post-mediax" style="background-image: url('https://hemerapartner.com/admin/img/template/right_panel/<?php //echo $row_rds['foto']; ?>'); width:100%;">
                                          </div>-->
                                          <img src="https://hemerapartner.com/admin/img/template/right_panel/<?php echo $row_rds['foto']; ?>" style="width:150px;height:100%;" />
                                          <div class="post-content">
                                             <h6 class="post-title"><?php echo $row_rds['title']; ?></h6>
                                             <!--<div class="post-text">Curiously, view both tone emerged. There should which yards two and concepts amidst liabilities sitting of and, parents it wait </div>-->
                                             <div class="post-foot">
                                                <!--<div class="post-tags">
                                                   <div class="badge badge-primary">BTC</div>
                                                   <div class="badge badge-primary">Crypto</div>
                                                </div>-->
                                                <!--<a class="btn btn-outline-primary" href="modul/template/edit_box_front.php?id_bf=<?php e//cho $row_rds['id_']; ?>"  data-target=".bd-example-modal-lg" data-toggle="modal"><span>Edit</span><i class="os-icon os-icon-arrow-2-right"></i></a>-->
                                                
                                                <div class="element-content">
   
<form action="modul/template/ed_right_panel.php" method="POST" enctype="multipart/form-data" id="fup">
<div class="row">
                                    
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label for=""> Upload Image</label>
                                             <input name="file_foto" type="file" class="form-control">
                                            <input name="hf_id" type="hidden" id="hf_id" value="<?php echo $row_rds['id_']; ?>" />
                                          </div>
                                          
                                          <?php
										 	  if ($x=="1") {echo "<small>Ukuran Standar 277 x 300 pixel</small>";}
										  elseif ($x=="2") {echo "<small>Ukuran Standar 277 x 277 pixel</small>";}
										  elseif ($x=="3") {echo "<small>Ukuran Standar 280 x 500 pixel</small>";}
										  ?>
                                          <!--<small>Ukuran Standar 1920 x 700 pixel</small>-->
                                       </div>
                                       
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label for=""> Pilih Gambar yang tersedia di Server</label>
                                             <br>
                                             <a class="btn btn-grey" href="javascript:void(0);" onclick="show_rp<?php echo $x; ?>();"><i class="os-icon os-icon-plus-circle"></i><span>Browse File</span></a>
                                          </div>
                                       </div>
                                       
                                       <div class="col-sm-12">
                                       <div id="result_rp<?php echo $x; ?>"></div>
                                       </div>
                                       
                                      
                                    <br>
                                   
                                      
                                      <div class="col-sm-12">
                                      <div class="form-group">
                                        <label for="file_foto"> Text 1</label>
                                      <input name="text_1" type="text" class="form-control" id="text_1" value="<?php echo $row_rds['text1']; ?>" >
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-12">
                                      <div class="form-group">
                                        <label for="file_foto"> Text 2</label>
                                      <input name="text_2" type="text" class="form-control" id="text_2" value="<?php echo $row_rds['text2']; ?>" >
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-12">
                                      <div class="form-group">
                                        <label for="file_foto"> Text 3</label>
                                      <input name="text_3" type="text" class="form-control" id="text_3" value="<?php echo $row_rds['text3']; ?>" >
                                      </div>
                                      </div>
                                      
                                      <div class="col-sm-12">
                                      <div class="form-group">
                                        <label for="file_foto"> Text 4</label>
                                      <input name="text_4" type="text" class="form-control" id="text_4" value="<?php echo $row_rds['text4']; ?>" >
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
                                       </div>
                                       <?php $x+=1; ?>
                                       <?php } while ($row_rds = mysql_fetch_assoc($rds)); ?>
                                       
                                       
                                    </div>


            
         </div>
      </div>
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


<?php
mysql_free_result($rds);
?>
