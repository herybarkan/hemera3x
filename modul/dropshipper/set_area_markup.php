<?php require_once('Connections/hemera.php'); ?>
<?php
ob_start();
session_start();

/*mysql_select_db($database_hemera, $hemera);
$query_dss = "SELECT * FROM dropshipper_set WHERE kd_ds='$_SESSION[HEM_kd_ds]'";
$dss = mysql_query($query_dss, $hemera) or die(mysql_error());
$row_dss = mysql_fetch_assoc($dss);
$totalRows_dss = mysql_num_rows($dss);*/

mysql_select_db($database_hemera, $hemera);
$query_rsup = "SELECT * FROM dropshipper_set WHERE kd_ds='$_SESSION[HEM_kd_ds]'";
$rsup = mysql_query($query_rsup, $hemera) or die(mysql_error());
$row_rsup = mysql_fetch_assoc($rsup);
$totalRows_rsup = mysql_num_rows($rsup);
?>

<div class="element-wrapper">
                              <h6 class="element-header">Setting Area Product Supplier & Markup Harga
                              <!--<a href="?com=list_master_product&layout=full" ><button class="mr-2 mb-2 btn btn-outline-primary float-right" type="button"> List Product</button></a>-->
                              </h6>
                              
                              
                              
                              <div class="element-box">
                                 <form action="modul/dropshipper/ed_set_area.php" method="post">
                                  <div class="form-group"><label for=""> Anda wajib melakukan setting Supplier dan menentukan Markup harga jual</label></div>
                                          <hr>
                                          <div class="row">
                                             <div class="col-sm-6">
                                             <input name="hf_kd_ds" type="hidden" value="<?php echo $_SESSION['HEM_kd_ds']; ?>">
                                                <div class="form-group"><label for=""> Area Supplier <br><small>pilih area produk dari suplier terdekat, karena akan mempengaruhi ongkir</small></label>
 <select name="sarea" class="form-control">
 <option> Pilih Area Supplier</option>
 <option value="BARAT"<?php if (!(strcmp($row_rsup['area'], "BARAT"))) {echo "selected=\"selected\"";} ?>> Barat (Jakarta) </option>
 <option value="TIMUR"<?php if (!(strcmp($row_rsup['area'], "TIMUR"))) {echo "selected=\"selected\"";} ?>> Timur (Bali) </option>
 </select>                                          
                                                </div>  
                                                </div>
                                                
                                                <div class="col-sm-6">
                                             
                                                <div class="form-group"><label for="">Persentase Markup harga jual<br>
                                                <small>contoh 20% anda cukup ketik angka 20</small></label>
                                                <input class="form-control" type="number" name="markup" value="<?php echo $row_rsup['markup']; ?>"></div>  
                                                </div>
                                                
                                                <div class="col-sm-6">
                                             
                                                <button class="btn btn-primary" type="submit"> Save changes</button>
                                                </div>
                                                
                                                
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
