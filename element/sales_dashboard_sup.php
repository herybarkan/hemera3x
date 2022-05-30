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

mysql_select_db($database_hemera, $hemera);
$query_rsup = "SELECT * FROM suplier WHERE kd_user='$_SESSION[HEM_kd_user]'";
$rsup = mysql_query($query_rsup, $hemera) or die(mysql_error());
$row_rsup = mysql_fetch_assoc($rsup);
$totalRows_rsup = mysql_num_rows($rsup);


mysql_select_db($database_hemera, $hemera);
$query_rtpr = "SELECT COUNT(id_) AS tot_pr FROM product_master WHERE kd_suplier='$row_rsup[kd_suplier]'";
$rtpr = mysql_query($query_rtpr, $hemera) or die(mysql_error());
$row_rtpr = mysql_fetch_assoc($rtpr);
$totalRows_rtpr = mysql_num_rows($rtpr);

mysql_select_db($database_hemera, $hemera);
$query_rtpr_sold = "SELECT  SUM(trx_ds_detail.qty) AS tot_prsold FROM trx_ds_detail  JOIN product_master ON  trx_ds_detail.kd_prod = product_master.kd_product JOIN  trx_ds ON  trx_ds_detail.kd_order = trx_ds.kd_order  WHERE product_master.kd_suplier='$row_rsup[kd_suplier]' AND  trx_ds.sts_bayar='1' ";
$rtpr_sold = mysql_query($query_rtpr_sold, $hemera) or die(mysql_error());
$row_rtpr_sold = mysql_fetch_assoc($rtpr_sold);
$totalRows_rtpr_sold = mysql_num_rows($rtpr_sold);

mysql_select_db($database_hemera, $hemera);
$query_rtpr_soldh = "SELECT SUM(trx_ds_detail.hrg_satuan) AS tharga FROM trx_ds_detail JOIN trx_ds ON trx_ds_detail.kd_order = trx_ds.kd_order  JOIN product_master ON product_master.kd_product = trx_ds_detail.kd_prod  WHERE trx_ds.sts_order='1' AND  trx_ds.sts_bayar='1' AND product_master.kd_suplier='$row_rsup[kd_suplier]'  GROUP BY product_master.kd_suplier ORDER BY trx_ds_detail.id_ DESC";
$rtpr_soldh = mysql_query($query_rtpr_soldh, $hemera) or die(mysql_error());
$row_rtpr_soldh = mysql_fetch_assoc($rtpr_soldh);
$totalRows_rtpr_soldh = mysql_num_rows($rtpr_soldh);

mysql_select_db($database_hemera, $hemera);
$query_rtnewor = "SELECT COUNT(DISTINCT(trx_ds.kd_order)) AS tot_new_order FROM trx_ds_detail JOIN trx_ds 				ON trx_ds_detail.kd_order = trx_ds.kd_order JOIN product_master ON product_master.kd_product = trx_ds_detail.kd_prod WHERE trx_ds.sts_order='1' AND trx_ds.sts_bayar='0' AND product_master.kd_suplier='$row_rsup[kd_suplier]'";
$rtnewor = mysql_query($query_rtnewor, $hemera) or die(mysql_error());
$row_rtnewor = mysql_fetch_assoc($rtnewor);
$totalRows_rtnewor = mysql_num_rows($rtnewor);

mysql_select_db($database_hemera, $hemera);
$query_rtpyor = "SELECT COUNT(DISTINCT(trx_ds.kd_order)) AS tot_paid_order FROM trx_ds_detail JOIN trx_ds 				ON trx_ds_detail.kd_order = trx_ds.kd_order JOIN product_master ON product_master.kd_product = trx_ds_detail.kd_prod WHERE trx_ds.sts_order='1' AND trx_ds.sts_bayar='1' AND trx_ds.sts_proses='0' AND product_master.kd_suplier='$row_rsup[kd_suplier]'";
$rtpyor = mysql_query($query_rtpyor, $hemera) or die(mysql_error());
$row_rtpyor = mysql_fetch_assoc($rtpyor);
$totalRows_rtpyor = mysql_num_rows($rtpyor);

mysql_select_db($database_hemera, $hemera);
$query_rtpsor = "SELECT COUNT(DISTINCT(trx_ds.kd_order)) AS tot_procc_order FROM trx_ds_detail JOIN trx_ds 				ON trx_ds_detail.kd_order = trx_ds.kd_order JOIN product_master ON product_master.kd_product = trx_ds_detail.kd_prod WHERE trx_ds.sts_order='1' AND trx_ds.sts_bayar='1' AND trx_ds.sts_proses='1'  AND trx_ds.sts_kirim='0' AND product_master.kd_suplier='$row_rsup[kd_suplier]'";
$rtpsor = mysql_query($query_rtpsor, $hemera) or die(mysql_error());
$row_rtpsor = mysql_fetch_assoc($rtpsor);
$totalRows_rtpsor = mysql_num_rows($rtpsor);

mysql_select_db($database_hemera, $hemera);
$query_rtship = "SELECT COUNT(DISTINCT(trx_ds.kd_order)) AS tot_ship_order FROM trx_ds_detail JOIN trx_ds 				ON trx_ds_detail.kd_order = trx_ds.kd_order JOIN product_master ON product_master.kd_product = trx_ds_detail.kd_prod WHERE trx_ds.sts_order='1' AND trx_ds.sts_bayar='1' AND trx_ds.sts_proses='1'  AND trx_ds.sts_kirim='1' AND product_master.kd_suplier='$row_rsup[kd_suplier]'";
$rtship = mysql_query($query_rtship, $hemera) or die(mysql_error());
$row_rtship = mysql_fetch_assoc($rtship);
$totalRows_rtship = mysql_num_rows($rtship);

mysql_select_db($database_hemera, $hemera);
$query_rtreject = "SELECT COUNT(DISTINCT(trx_ds.kd_order)) AS tot_reject_order FROM trx_ds_detail JOIN trx_ds 				ON trx_ds_detail.kd_order = trx_ds.kd_order JOIN product_master ON product_master.kd_product = trx_ds_detail.kd_prod WHERE trx_ds.sts_order='1' AND trx_ds.sts_bayar='9' AND product_master.kd_suplier='$row_rsup[kd_suplier]'";
$rtreject = mysql_query($query_rtreject, $hemera) or die(mysql_error());
$row_rtreject = mysql_fetch_assoc($rtreject);
$totalRows_rtreject = mysql_num_rows($rtreject);

mysql_select_db($database_hemera, $hemera);
$query_rtall = "SELECT COUNT(DISTINCT(trx_ds.kd_order)) AS tot_all_order FROM trx_ds_detail JOIN trx_ds 				ON trx_ds_detail.kd_order = trx_ds.kd_order JOIN product_master ON product_master.kd_product = trx_ds_detail.kd_prod WHERE product_master.kd_suplier='$row_rsup[kd_suplier]'";
$rtall = mysql_query($query_rtall, $hemera) or die(mysql_error());
$row_rtall = mysql_fetch_assoc($rtall);
$totalRows_rtall = mysql_num_rows($rtall);

mysql_select_db($database_hemera, $hemera);
$query_rtdw = "SELECT SUM(nominal) AS tot_wd FROM wd_supplier WHERE kd_supplier='$row_rsup[kd_suplier]' AND sts_wd='1'";
$rtdw = mysql_query($query_rtdw, $hemera) or die(mysql_error());
$row_rtdw = mysql_fetch_assoc($rtdw);
$totalRows_rtdw = mysql_num_rows($rtdw);

mysql_select_db($database_hemera, $hemera);
$query_rtinc = "SELECT SUM(nominal) AS tot_income FROM income_supplier WHERE kd_supplier='$row_rsup[kd_suplier]' AND sts_wd='0'";
$rtinc = mysql_query($query_rtinc, $hemera) or die(mysql_error());
$row_rtinc = mysql_fetch_assoc($rtinc);
$totalRows_rtinc = mysql_num_rows($rtinc);

mysql_select_db($database_hemera, $hemera);
$query_rtpen = "SELECT SUM(nominal) AS tot_pen FROM income_supplier WHERE kd_supplier='$row_rsup[kd_suplier]'";
$rtpen = mysql_query($query_rtpen, $hemera) or die(mysql_error());
$row_rtpen = mysql_fetch_assoc($rtpen);
$totalRows_rtpen = mysql_num_rows($rtpen);

/*=====================================================================================================*/

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
                              <h6 class="element-header">Supplier Dashboard</h6>
                              <?php //echo $_SESSION['HEM_kd_user']; ?>
                          <div class="element-content">
                                 <div class="row">
                                    <div class="col-sm-4 col-xxxl-3">
                                       <a class="element-box el-tablo" href="index.php?com=list_sup_product&layout=full">
                                          <div class="label">Total Product</div>
                                          <div class="value"><?php echo number_format($row_rtpr['tot_pr'],0,",","."); ?></div>
                                         
                                       </a>
                                    </div>
                                    <div class="col-sm-4 col-xxxl-3">
                                       <a class="element-box el-tablo" href="index.php?com=rep_product_sold_sup&layout=full">
                                          <div class="label">Product Sold</div>
                                          <div class="value"><?php echo number_format($row_rtpr_sold['tot_prsold'],0,",","."); ?></div>
                                          <!--<div class="trending trending-down-basic"><span>12%</span><i class="os-icon os-icon-arrow-down"></i></div>-->
                                       </a>
                                    </div>
                                    <div class="col-sm-4 col-xxxl-3">
                                       <a class="element-box el-tablo" href="index.php?com=rep_product_sold_sup&layout=full">
                                          <div class="label">Total Product Sold</div>
                                          <div class="value">IDR. <?php echo number_format($row_rtpr_soldh['tharga'],0,",","."); ?></div>
                                          <!--<div class="trending trending-down-basic"><span>9%</span><i class="os-icon os-icon-arrow-down"></i></div>-->
                                       </a>
                                    </div>
                                    <div class="col-sm-4 col-xxxl-3">
                                    
                                       <a class="element-box el-tablo" href="index.php?com=new_order_sup&layout=full">
                                       <div class="col-12" style="background-color:#F00; height:5px; margin-top:-22px; margin-bottom:15px; margin-left:-13px;"></div>
                                          <div class="label">New Order</div>
                                          <div class="value"><?php echo number_format($row_rtnewor['tot_new_order'],0,",","."); ?> </div>
                                          <!--<div class="trending trending-down-basic"><span>9%</span><i class="os-icon os-icon-arrow-down"></i></div>-->
                                       </a>
                                    </div>
                                    
                                    <div class="col-sm-4 col-xxxl-3">
                                       <a class="element-box el-tablo" href="index.php?com=payed_order_sup&layout=full">
                                          <div class="label">Paid Order</div>
                                          <div class="value"><?php echo number_format($row_rtpyor['tot_paid_order'],0,",","."); ?> </div>
                                          <!--<div class="trending trending-down-basic"><span>9%</span><i class="os-icon os-icon-arrow-down"></i></div>-->
                                       </a>
                                    </div>
                                    
                                    <div class="col-sm-4 col-xxxl-3">
                                       <a class="element-box el-tablo" href="index.php?com=rep_income_sup&layout=full">
                                       <div class="col-12" style="background-color:#4599CB; height:5px; margin-top:-22px; margin-bottom:15px; margin-left:-13px;"></div>
                                          <div class="label">Total Income</div>
                                          <div class="value">IDR. <?php echo number_format($row_rtpen['tot_pen'],0,",","."); ?> </div>
                                          <!--<div class="trending trending-down-basic"><span>9%</span><i class="os-icon os-icon-arrow-down"></i></div>-->
                                       </a>
                                    </div>
                                    
                                    <div class="col-sm-4 col-xxxl-3">
                                       <a class="element-box el-tablo" href="index.php?com=proses_order_sup&layout=full">
                                          <div class="label">Proccess Order</div>
                                          <div class="value"><?php echo number_format($row_rtpsor['tot_procc_order'],0,",","."); ?> </div>
                                          <!--<div class="trending trending-down-basic"><span>9%</span><i class="os-icon os-icon-arrow-down"></i></div>-->
                                       </a>
                                    </div>
                                    
                                    
                                    
                                    <div class="col-sm-4 col-xxxl-3">
                                       <a class="element-box el-tablo" href="index.php?com=shipped_order_sup&layout=full">
                                          <div class="label">Shipped Order</div>
                                          <div class="value"><?php echo number_format($row_rtship['tot_ship_order'],0,",","."); ?> </div>
                                          <!--<div class="trending trending-down-basic"><span>9%</span><i class="os-icon os-icon-arrow-down"></i></div>-->
                                       </a>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    <div class="col-sm-4 col-xxxl-3">
                                       <a class="element-box el-tablo" href="index.php?com=xpenarikan_sup&layout=full">
                                          <div class="label">Withdrawal</div>
                                          <div class="value">IDR. <?php echo number_format($row_rtdw['tot_wd'],0,",","."); ?> </div>
                                          <!--<div class="trending trending-down-basic"><span>9%</span><i class="os-icon os-icon-arrow-down"></i></div>-->
                                       </a>
                                    </div>
                                    
                                    <div class="col-sm-4 col-xxxl-3">
                                       <a class="element-box el-tablo" href="index.php?com=reject_order_sup&layout=full">
                                          <div class="label">Reject Order</div>
                                          <div class="value"><?php echo number_format($row_rtreject['tot_reject_order'],0,",","."); ?> </div>
                                          
                                       </a>
                                    </div>
                                    
                                    
                                   
                                    
                                    <div class="col-sm-4 col-xxxl-3">
                                       <a class="element-box el-tablo" href="index.php?com=all_trx_sup&layout=full">
                                          <div class="label">All Transaction</div>
                                          <div class="value"><?php echo number_format($row_rtall['tot_all_order'],0,",","."); ?> </div>
                                          <!--<div class="trending trending-down-basic"><span>9%</span><i class="os-icon os-icon-arrow-down"></i></div>-->
                                       </a>
                                    </div>
                                    
                                    <div class="col-sm-4 col-xxxl-3">
                                       <a class="element-box el-tablo" href="index.php?com=xpenarikan_sup&layout=full">
                                          <div class="label">Balance</div>
                                          <div class="value">IDR. <?php echo number_format($row_rtinc['tot_income'],0,",","."); ?></div>
                                          <!--<div class="trending trending-down-basic"><span>9%</span><i class="os-icon os-icon-arrow-down"></i></div>-->
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                               </div>
                     </div>
<?php
mysql_free_result($rtpr_sold);

mysql_free_result($rsup);

mysql_free_result($rtpr_soldh);

mysql_free_result($rtnewor);
?>
