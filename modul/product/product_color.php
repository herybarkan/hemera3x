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
$query_rkat = "SELECT * FROM kategori";
$rkat = mysql_query($query_rkat, $hemera) or die(mysql_error());
$row_rkat = mysql_fetch_assoc($rkat);
$totalRows_rkat = mysql_num_rows($rkat);

mysql_select_db($database_hemera, $hemera);
$query_rcol = "SELECT * FROM product_color";
$rcol = mysql_query($query_rcol, $hemera) or die(mysql_error());
$row_rcol = mysql_fetch_assoc($rcol);
$totalRows_rcol = mysql_num_rows($rcol);

?>
<div class="element-wrapper">
                              <h6 class="element-header">Product Color</h6>
                              <div class="element-box">
                                 <form action="modul/product/in_product_color.php" method="post" id="fin">
                                    <!--<h5 class="form-header">Default Layout</h5>
                                    <div class="form-desc">Discharge best employed your phase each the of shine. Be met even reason consider logbook redesigns. Never a turned interfaces among asking</div>-->
                                    <!--<div class="form-group"><label for=""> Email address</label><input class="form-control" placeholder="Enter email" type="email"></div>-->
                                    <div class="row">
                                      <div class="col-sm-6">
                                         <div class="form-group">
                                         <label for="file_foto">Color Code</label>
                                         <input name="kd_color" type="text" class="form-control" id="kd_color" ></div>
                                       </div>
                                       
                                       <div class="col-sm-6">
                                         <div class="form-group">
                                         <label for="file_foto"> Product Color</label>
                                         <input name="nm_color" type="text" class="form-control" id="nm_color" ></div>
                                       </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="form-buttons-w"><button class="btn btn-primary" type="submit"> Submit</button></div>
                                 </form>
                              </div>
                              
                              
</div>
                           
<div class="element-box">
   <h5 class="form-header">List of Product Color</h5>
   <!--<div class="form-desc">You can add class <code>.table-striped</code> and <code>.table</code> to a table element to get striped table:</div>-->
   <div class="table-responsive">
      <table width="100%" class="table table-striped">
         <thead>
            <tr>
               <th width="2%">No</th>
               <th width="19%">Color Code</th>
               <th width="60%">Color Name</th>
               <th width="19%" class="text-right">Options</th>
            </tr>
         </thead>
         <tbody>
         <?php $x=1; ?>
            <?php do { ?>
            <tr>
                <td><?php echo $x; ?></td>
                <td><span class="onboarding-media"><?php echo $row_rcol['kd_color']; ?></span></td>
                <td><span class="onboarding-media"><?php echo $row_rcol['nm_color']; ?></span></td>
                <td class="text-right">
                
                
                <!--<a href="javascript:void(0);" class="btn btn-success btn-sm text-white" data-target="#onboardingWideFormModal" data-toggle="modal" data-href="modul/user/update_grup_user.php?id_=<?php //echo $row_rgrupu['id_']; ?>">Update</a>-->
                
               
                
                <a href="javascript:void(0);" data-href="modul/product/update_product_color.php?id_=<?php echo $row_rcol['id_']; ?>" class="btn btn-success btn-sm text-white openPopup">Update</a>
                
                <a href="modul/product/del_product_color.php?id_=<?php echo $row_rcol['id_']; ?>" class="btn btn-danger btn-sm text-white">Delete</a>
                
               
                </td>
             </tr>
             <?php $x+=1; ?>
              <?php } while ($row_rcol = mysql_fetch_assoc($rcol)); ?>
         </tbody>
      </table>
   </div>
</div>

        

<!-- Modal -->
<div class="onboarding-modal modal fade animated" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg modal-centered">
    	<div class="modal-content">
        	<div class="onboarding-side-by-side">
                <div class="onboarding-media"><img alt="" src="img/bigicon5.png" width="200px"></div>
                	<div class="onboarding-content with-gradient">
                    	<!--<h4 class="onboarding-title">Example Request Information</h4>-->
                        	<!--<div class="onboarding-text">In this example you can see a form where you can request some additional information from the customer when they land on the app page. xxx
                            </div>
-->
            					<div class="modal-body">

            					</div>
            		</div>
            </div>
        </div>
    </div>
</div>
        



   
<?php
mysql_free_result($rkat);

mysql_free_result($rcol);
?>