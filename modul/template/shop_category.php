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
$query_rds = "SELECT * FROM ds_shop_category WHERE kd_dropshipper='$_SESSION[HEM_kd_ds]'";
$rds = mysql_query($query_rds, $hemera) or die(mysql_error());
$row_rds = mysql_fetch_assoc($rds);
$totalRows_rds = mysql_num_rows($rds);


?>

<script type="text/javascript" src="js/ajax_shop_category.js"></script>
<div class="row pt-4">
   <div class="col-sm-12">
      <div class="element-wrapper">
         
         <h6 class="element-header">Shop Category</h6>
         <div class="element-content">
            
            

<div class="element-box-tp">
                                      <?php do { ?>
                                       <div class="post-box" style="height:218px;">
                                          <div class="post-media" style="background-image: url('https://hemerapartner.com/admin/img/template/shop_category/<?php echo $row_rds['foto']; ?>')"></div>
                                          <div class="post-content">
                                             <!--<h6 class="post-title"><?php //echo $row_rds['title']; ?></h6>-->
                                             <!--<div class="post-text">Curiously, view both tone emerged. There should which yards two and concepts amidst liabilities sitting of and, parents it wait </div>-->
                                             <div class="post-foot">
                                                <!--<div class="post-tags">
                                                   <div class="badge badge-primary">BTC</div>
                                                   <div class="badge badge-primary">Crypto</div>
                                                </div>-->
                                                <a class="btn btn-outline-primary" href="modul/template/edit_shop_category.php?id_sc=<?php echo $row_rds['id_']; ?>"  data-target=".bd-example-modal-lg" data-toggle="modal"><span>Edit</span><i class="os-icon os-icon-arrow-2-right"></i></a>
                                             </div>
                                          </div>
                                       </div>
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
