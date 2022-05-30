<?php require_once('Connections/hemera.php'); ?>
<?php
ob_start();
session_start();

mysql_select_db($database_hemera, $hemera);
$query_rorder = "SELECT ds_customer.nm_depan, ds_customer.nm_belakang, ds_customer.alamat, ds_customer.propinsi, ds_customer.kota, ds_customer.kd_pos, ds_customer.no_hp, ds_customer.email, ds_customer.catatan, ds_customer.tgl_in, ds_customer.jam_in, ds_customer.kd_order, trx_ds.hrg_tot, trx_ds.hrg_shipping, trx_ds.hrg_grand, trx_ds.sts_order, trx_ds.sts_bayar, trx_ds.sts_proses, trx_ds.sts_terima, trx_ds.kd_ds FROM ds_customer JOIN trx_ds ON ds_customer.kd_order = trx_ds.kd_order WHERE trx_ds.sts_order='1' AND trx_ds.sts_bayar='0' ORDER BY trx_ds.id_ DESC";
$rorder = mysql_query($query_rorder, $hemera) or die(mysql_error());
$row_rorder = mysql_fetch_assoc($rorder);
$totalRows_rorder = mysql_num_rows($rorder);

mysql_select_db($database_hemera, $hemera);
$query_rproc = "SELECT ds_customer.nm_depan, ds_customer.nm_belakang, ds_customer.alamat, ds_customer.propinsi, ds_customer.kota, ds_customer.kd_pos, ds_customer.no_hp, ds_customer.email, ds_customer.catatan, ds_customer.tgl_in, ds_customer.jam_in, ds_customer.kd_order, trx_ds.hrg_tot, trx_ds.hrg_shipping, trx_ds.hrg_grand, trx_ds.sts_order, trx_ds.sts_bayar, trx_ds.sts_proses, trx_ds.sts_terima, trx_ds.kd_ds FROM ds_customer JOIN trx_ds ON ds_customer.kd_order = trx_ds.kd_order WHERE trx_ds.sts_order='1' AND trx_ds.sts_bayar='1'  AND trx_ds.sts_proses='1'  AND trx_ds.sts_kirim='0' ORDER BY trx_ds.id_ DESC";
$rproc = mysql_query($query_rproc, $hemera) or die(mysql_error());
$row_rproc = mysql_fetch_assoc($rproc);
$totalRows_rproc = mysql_num_rows($rproc);

mysql_select_db($database_hemera, $hemera);
$query_rship = "SELECT ds_customer.nm_depan, ds_customer.nm_belakang, ds_customer.alamat, ds_customer.propinsi, ds_customer.kota, ds_customer.kd_pos, ds_customer.no_hp, ds_customer.email, ds_customer.catatan, ds_customer.tgl_in, ds_customer.jam_in, ds_customer.kd_order, trx_ds.hrg_tot, trx_ds.hrg_shipping, trx_ds.hrg_grand, trx_ds.sts_order, trx_ds.sts_bayar, trx_ds.sts_proses, trx_ds.sts_terima, trx_ds.kd_ds FROM ds_customer JOIN trx_ds ON ds_customer.kd_order = trx_ds.kd_order WHERE trx_ds.sts_order='1' AND trx_ds.sts_bayar='1'  AND trx_ds.sts_proses='1'  AND trx_ds.sts_kirim='1' ORDER BY trx_ds.id_ DESC";
$rship = mysql_query($query_rship, $hemera) or die(mysql_error());
$row_rship = mysql_fetch_assoc($rship);
$totalRows_rship = mysql_num_rows($rship);
?>

<div class="row">
                        <div class="col-sm-12">
                        <div class="element-wrapper">
                              <div class="element-actions">
                                 <!--<form class="form-inline justify-content-sm-end">
                                    <select class="form-control form-control-sm">
                                       <option value="Pending">Today</option>
                                       <option value="Active">Last Week </option>
                                       <option value="Cancelled">Last 30 Days</option>
                                    </select>
                                 </form>-->
                              </div>
                              <h6 class="element-header">Sales Dashboard</h6>
                              <div class="element-content">
                                 <div class="row">
                                    <div class="col-sm-4 col-xxxl-3">
                                       <a class="element-box el-tablo" href="index.php?com=new_order_adm&layout=full">
                                          <div class="label">New Order</div>
                                          <div class="value"><?php echo number_format($totalRows_rorder,0,",","."); ?></div>
                                          <!--<div class="trending trending-up-basic"><span>12%</span><i class="os-icon os-icon-arrow-up2"></i></div>-->
                                       </a>
                                    </div>
                                    <div class="col-sm-4 col-xxxl-3">
                                       <a class="element-box el-tablo" href="index.php?com=proses_order_adm&layout=full">
                                          <div class="label">Proccessed Order </div>
                                          <div class="value"><?php echo number_format($totalRows_rproc,0,",","."); ?></div>
                                          <!--<div class="trending trending-down-basic"><span>12%</span><i class="os-icon os-icon-arrow-down"></i></div>-->
                                       </a>
                                    </div>
                                    <div class="col-sm-4 col-xxxl-3">
                                       <a class="element-box el-tablo" href="index.php?com=shipped_order_adm&layout=full">
                                          <div class="label">Shipping Order</div>
                                          <div class="value"><?php echo number_format($totalRows_rship,0,",","."); ?> </div>
                                          <!--<div class="trending trending-down-basic"><span>9%</span><i class="os-icon os-icon-arrow-down"></i></div>-->
                                       </a>
                                    </div>
                                    <!--<div class="d-none d-xxxl-block col-xxxl-3">
                                       <a class="element-box el-tablo" href="index.html#">
                                          <div class="label">Refunds Processed</div>
                                          <div class="value">$294</div>
                                          <div class="trending trending-up-basic"><span>12%</span><i class="os-icon os-icon-arrow-up2"></i></div>
                                       </a>
                                    </div>-->
                                 </div>
                              </div>
                           </div>
                               </div>
                     </div>