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

ob_start();
session_start();

$maxRows_rorder = 5;
$pageNum_rorder = 0;
if (isset($_GET['pageNum_rorder'])) {
  $pageNum_rorder = $_GET['pageNum_rorder'];
}
$startRow_rorder = $pageNum_rorder * $maxRows_rorder;

mysql_select_db($database_hemera, $hemera);
$query_rorder = "SELECT ds_customer.nm_depan, ds_customer.nm_belakang, ds_customer.alamat, ds_customer.propinsi, ds_customer.kota, ds_customer.kd_pos, ds_customer.no_hp, ds_customer.email, ds_customer.catatan, ds_customer.tgl_in, ds_customer.jam_in, ds_customer.kd_order, trx_ds.hrg_tot, trx_ds.hrg_shipping, trx_ds.hrg_grand, trx_ds.sts_order, trx_ds.sts_bayar, trx_ds.sts_proses, trx_ds.sts_terima, trx_ds.kd_ds FROM ds_customer JOIN trx_ds ON ds_customer.kd_order = trx_ds.kd_order WHERE trx_ds.sts_order='1' AND trx_ds.sts_bayar='0' ORDER BY trx_ds.id_ DESC";
$query_limit_rorder = sprintf("%s LIMIT %d, %d", $query_rorder, $startRow_rorder, $maxRows_rorder);
$rorder = mysql_query($query_limit_rorder, $hemera) or die(mysql_error());
$row_rorder = mysql_fetch_assoc($rorder);

if (isset($_GET['totalRows_rorder'])) {
  $totalRows_rorder = $_GET['totalRows_rorder'];
} else {
  $all_rorder = mysql_query($query_rorder);
  $totalRows_rorder = mysql_num_rows($all_rorder);
}
$totalPages_rorder = ceil($totalRows_rorder/$maxRows_rorder)-1;


?>

<div class="row">
                        <div class="col-sm-8 col-xxxl-6">
                           <div class="element-wrapper">
                              <h6 class="element-header">Last 5  Orders</h6>
                              <div class="element-box">
                                 <div class="table-responsive">
                                    <table width="100%" class="table table-lightborder">
                                       <thead>
                                          <tr>
                                             <th>Customer</th>
                                             <th>Products</th>
                                             <th class="text-center">Dropshipper</th>
                                             <th class="text-right">Total</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php do { ?>
                                          <?php
										  mysql_select_db($database_hemera, $hemera);
$query_rds = "SELECT * FROM dropshiper WHERE kd_dropshiper='$row_rorder[kd_ds]'";
$rds = mysql_query($query_rds, $hemera) or die(mysql_error());
$row_rds = mysql_fetch_assoc($rds);
$totalRows_rds = mysql_num_rows($rds);

mysql_select_db($database_hemera, $hemera);
$query_rtrxdt = "SELECT * FROM trx_ds_detail WHERE kd_order='$row_rorder[kd_order]'";
$rtrxdt = mysql_query($query_rtrxdt, $hemera) or die(mysql_error());
$row_rtrxdt = mysql_fetch_assoc($rtrxdt);
$totalRows_rtrxdt = mysql_num_rows($rtrxdt);
										  ?>
                                          <tr>
                                              <td class="nowrap"><?php echo $row_rorder['nm_depan']; ?> <?php echo $row_rorder['nm_belakang']; ?></td>
                                              <td>
                                                <div class="cell-image-list">
                                                <?php do { ?>
                                                  <div class="cell-img" style="background-image: url('https://hemerapartner.com/admin/foto/product/<?php echo $row_rtrxdt['foto_utama']; ?>'); height:60px;"></div>
                                                  <?php } while ($row_rtrxdt = mysql_fetch_assoc($rtrxdt)); ?>
                                                  <!--<div class="cell-img" style="background-image: url('img/portfolio2.jpg')"></div>
                                                  <div class="cell-img" style="background-image: url('img/portfolio12.jpg')"></div>
                                                  <div class="cell-img-more">+ 5 more</div>-->
                                                 </div>
                                              </td>
                                              <td class="text-center">
                                                <?php echo $row_rds['nm_toko']; ?>
                                              </td>
                                              <td class="text-right"><?php echo number_format($row_rorder['hrg_grand'],0,",","."); ?></td>
                                           </tr>
                                            <?php } while ($row_rorder = mysql_fetch_assoc($rorder)); ?>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-4 d-xxxl-none">
                           <div class="element-wrapper">
                              <h6 class="element-header">Top Selling Today</h6>
                              <div class="element-box">
                                 <div class="el-chart-w">
                                    <canvas height="120" id="donutChart" width="120"></canvas>
                                    <div class="inside-donut-chart-label"><strong>142</strong><span>Total Orders</span></div>
                                 </div>
                                 <div class="el-legend condensed">
                                    <div class="row">
                                       <div class="col-auto col-xxxxl-6 ml-sm-auto mr-sm-auto col-6">
                                          <div class="legend-value-w">
                                             <div class="legend-pin legend-pin-squared" style="background-color: #6896f9;"></div>
                                             <div class="legend-value">
                                                <span>Prada</span>
                                                <div class="legend-sub-value">14 Pairs</div>
                                             </div>
                                          </div>
                                          <div class="legend-value-w">
                                             <div class="legend-pin legend-pin-squared" style="background-color: #85c751;"></div>
                                             <div class="legend-value">
                                                <span>Maui Jim</span>
                                                <div class="legend-sub-value">26 Pairs</div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-6 d-lg-none d-xxl-block">
                                          <div class="legend-value-w">
                                             <div class="legend-pin legend-pin-squared" style="background-color: #806ef9;"></div>
                                             <div class="legend-value">
                                                <span>Gucci</span>
                                                <div class="legend-sub-value">17 Pairs</div>
                                             </div>
                                          </div>
                                          <div class="legend-value-w">
                                             <div class="legend-pin legend-pin-squared" style="background-color: #d97b70;"></div>
                                             <div class="legend-value">
                                                <span>Armani</span>
                                                <div class="legend-sub-value">12 Pairs</div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!--<div class="d-none d-xxxl-block col-xxxl-6">
                           <div class="element-wrapper">
                              <div class="element-actions">
                                 <form class="form-inline justify-content-sm-end">
                                    <select class="form-control form-control-sm rounded">
                                       <option value="Pending">Today</option>
                                       <option value="Active">Last Week </option>
                                       <option value="Cancelled">Last 30 Days</option>
                                    </select>
                                 </form>
                              </div>
                              <h6 class="element-header">Inventory Stats</h6>
                              <div class="element-box">
                                 <div class="os-progress-bar primary">
                                    <div class="bar-labels">
                                       <div class="bar-label-left"><span class="bigger">Eyeglasses</span></div>
                                       <div class="bar-label-right"><span class="info">25 items / 10 remaining</span></div>
                                    </div>
                                    <div class="bar-level-1" style="width: 100%">
                                       <div class="bar-level-2" style="width: 70%">
                                          <div class="bar-level-3" style="width: 40%"></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="os-progress-bar primary">
                                    <div class="bar-labels">
                                       <div class="bar-label-left"><span class="bigger">Outwear</span></div>
                                       <div class="bar-label-right"><span class="info">18 items / 7 remaining</span></div>
                                    </div>
                                    <div class="bar-level-1" style="width: 100%">
                                       <div class="bar-level-2" style="width: 40%">
                                          <div class="bar-level-3" style="width: 20%"></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="os-progress-bar primary">
                                    <div class="bar-labels">
                                       <div class="bar-label-left"><span class="bigger">Shoes</span></div>
                                       <div class="bar-label-right"><span class="info">15 items / 12 remaining</span></div>
                                    </div>
                                    <div class="bar-level-1" style="width: 100%">
                                       <div class="bar-level-2" style="width: 60%">
                                          <div class="bar-level-3" style="width: 30%"></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="os-progress-bar primary">
                                    <div class="bar-labels">
                                       <div class="bar-label-left"><span class="bigger">Jeans</span></div>
                                       <div class="bar-label-right"><span class="info">12 items / 4 remaining</span></div>
                                    </div>
                                    <div class="bar-level-1" style="width: 100%">
                                       <div class="bar-level-2" style="width: 30%">
                                          <div class="bar-level-3" style="width: 10%"></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="mt-4 border-top pt-3">
                                    <div class="element-actions d-none d-sm-block">
                                       <form class="form-inline justify-content-sm-end">
                                          <select class="form-control form-control-sm form-control-faded">
                                             <option selected="true">Last 30 days</option>
                                             <option>This Week</option>
                                             <option>This Month</option>
                                             <option>Today</option>
                                          </select>
                                       </form>
                                    </div>
                                    <h6 class="element-box-header">Inventory History</h6>
                                    <div class="el-chart-w">
                                       <canvas data-chart-data="13,28,19,24,43,49,40,35,42,46,38,32,45" height="50" id="liteLineChartV3" width="300"></canvas>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>-->
                     </div>
<?php
mysql_free_result($rorder);
?>
