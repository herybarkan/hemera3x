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
$query_rslider = "SELECT * FROM ds_slider WHERE kd_dropshipper='$_SESSION[HEM_kd_ds]'";
$rslider = mysql_query($query_rslider, $hemera) or die(mysql_error());
$row_rslider = mysql_fetch_assoc($rslider);
$totalRows_rslider = mysql_num_rows($rslider);
?>
<div class="row pt-4">
   <div class="col-sm-12">
      <div class="element-wrapper">
         
         <h6 class="element-header">Slider</h6>
         <div class="element-content">
            
            <table width="100%" border="0">
              <?php do { ?>
                <tr>
                  <td colspan="3"><img src="img/<?php echo $row_rslider['foto']; ?>" alt="Foto" style="width:100%;"> <a class="btn btn-outline-primary" href="modul/template/edit_slider.php?id_slider=<?php echo $row_rslider['id_']; ?>" style="margin-top:-75px; margin-left:10px;" data-target=".bd-example-modal-lg" data-toggle="modal"><span>Edit</span><i class="os-icon os-icon-arrow-2-right"></i></a></td>
                </tr>
                <?php } while ($row_rslider = mysql_fetch_assoc($rslider)); ?>
  
  
</table>
            
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
mysql_free_result($rslider);
?>
