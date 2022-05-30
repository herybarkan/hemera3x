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

$tahun=date('Y');

mysql_select_db($database_hemera, $hemera);
$query_rorder = "SELECT   dropshiper.nm_domain,   trx_ds.kd_ds,   SUM(trx_ds_detail.qty) AS qty,   SUM(trx_ds_detail.hrg_satuan) AS hrg_tot,      SUM(trx_ds.hrg_shipping) AS hrg_shipping,   trx_ds.tgl_in FROM product_master   JOIN trx_ds_detail ON product_master.kd_product = trx_ds_detail.kd_prod   JOIN trx_ds ON trx_ds_detail.kd_order = trx_ds.kd_order   JOIN dropshiper ON dropshiper.kd_dropshiper = trx_ds.kd_ds   WHERE trx_ds.sts_order='1'  AND  trx_ds.sts_bayar='1'  AND  trx_ds.sts_proses='1'  AND  trx_ds.sts_kirim='1'   GROUP BY trx_ds.kd_ds   ORDER BY trx_ds.id_ DESC ";
$rorder = mysql_query($query_rorder, $hemera) or die(mysql_error());
$row_rorder = mysql_fetch_assoc($rorder);
$totalRows_rorder = mysql_num_rows($rorder);

mysql_select_db($database_hemera, $hemera);
$query_rbln = "SELECT * FROM bulan";
$rbln = mysql_query($query_rbln, $hemera) or die(mysql_error());
$row_rbln = mysql_fetch_assoc($rbln);
$totalRows_rbln = mysql_num_rows($rbln);
?>

<style type="text/css">
.highcharts-figure, .highcharts-data-table table {
    min-width: 310px; 
    max-width: 800px;
    margin: 1em auto;
}

#container {
    height: 400px;
}

.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
	margin: 10px auto;
	text-align: center;
	width: 100%;
	max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

		</style>
        
<script src="bower_components/highcharts/code/highcharts.js"></script>
<script src="bower_components/highcharts/code/modules/exporting.js"></script>
<script src="bower_components/highcharts/code/modules/export-data.js"></script>
<script src="bower_components/highcharts/code/modules/accessibility.js"></script>

<div class="element-wrapper">

<div class="row">
                        <div class="col-sm-12">
                           <div class="element-wrapper">
                              <h6 class="element-header">Closed Transaction Report</h6>
                              <div class="element-box">
                                 <h5 class="form-header">Transaksi Berhasil periode <?php echo date('Y'); ?></h5>
                                 <div class="form-desc">Grafik Transaksi Berhasil dilihat dari view bulan</a></div>
                                 <div class="el-chart-w">
                                    
                                    
                                    <div id="container"></div>
                                    
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!--<div class="col-sm-4">
                           <div class="element-wrapper">
                              <h6 class="element-header">Small Infos</h6>
                              <div class="element-box el-tablo">
                                 <div class="label">Products Sold</div>
                                 <div class="value">574</div>
                                 <div class="trending trending-up"><span>12%</span><i class="os-icon os-icon-arrow-up2"></i></div>
                              </div>
                              <div class="element-box el-tablo">
                                 <div class="label">New Customers</div>
                                 <div class="value">12</div>
                                 <div class="trending trending-down-basic"><span>9%</span><i class="os-icon os-icon-graph-down"></i></div>
                              </div>
                              <div class="element-box el-tablo">
                                 <div class="label">Gross Profit</div>
                                 <div class="value">$2,507</div>
                                 <div class="trending trending-down-basic"><span>12%</span><i class="os-icon os-icon-arrow-2-down"></i></div>
                              </div>
                           </div>
                        </div>-->
                     </div>
                     
                     
<!--   <h6 class="element-header">List of Closed Transaction
   </h6>
-->   <!--<div class="element-box-tp">
      <div class="table-responsive">
         <table width="100%"  class="table table-padded wrap ">
            <thead>
               <tr>
                  <th width="2%"></th>
                  <th width="5%">No</th>
                  <th width="17%">Order Date</th>
                  <th width="11%">Dropshipper</th>
                  <th width="18%">Customer</th>
                  <th width="6%">Qty</th>
                  <th width="12%">Hemera Price</th>
                  <th width="11%"> Price</th>
                  <th width="11%">Margin</th>
                  <th width="7%">Actions</th>
               </tr>
            </thead>
            <tbody>
            <?php //$x=1; $xqty=0; $hpr=0; $pr=0; $mr=0; ?>
               <?php //do { ?>
               <?php
			   /*
mysql_select_db($database_hemera, $hemera);
$query_rqty = "SELECT COUNT(id_) AS jqty FROM trx_ds_detail WHERE kd_order='$row_rorder[kd_order]'";
$rqty = mysql_query($query_rqty, $hemera) or die(mysql_error());
$row_rqty = mysql_fetch_assoc($rqty);
$totalRows_rqty = mysql_num_rows($rqty);

mysql_select_db($database_hemera, $hemera);
$query_rharga = "SELECT SUM(product_master.harga_net) AS harga_net, trx_ds.kd_ds FROM product_master JOIN trx_ds_detail ON product_master.kd_product = trx_ds_detail.kd_prod  JOIN trx_ds ON trx_ds_detail.kd_order = trx_ds.kd_order WHERE trx_ds.kd_ds='$row_rorder[kd_ds]' GROUP BY trx_ds.kd_ds";
$rharga = mysql_query($query_rharga, $hemera) or die(mysql_error());
$row_rharga = mysql_fetch_assoc($rharga);
$totalRows_rharga = mysql_num_rows($rharga);
*/
			   ?>
               <tr>
                   <td class="text-center">
                   <input name="cb[]" type="checkbox" class="form-control" id="cb[]" value="<?php //echo $row_rprod['kd_product']; ?>">
                   </td>
                   <td><span class="onboarding-media"><?php //echo $x; ?></span></td>
                   <td><?php //echo $row_rorder['tgl_in']; ?></td>
                   <td><?php //echo $row_rorder['nm_domain']; ?></td>
                   <td><?php //echo $row_rorder['nm_depan']; ?> <?php //echo $row_rorder['nm_belakang']; ?></td>
                   <td><?php //echo $row_rqty['jqty']; ?></td>
                   <td>
				   <?php 
				   
				   //$hrg_hemera=$row_rharga['harga_net'];
				   //echo number_format($hrg_hemera,0,",","."); ?></td>
                   <td class="text-center"><?php //echo number_format($row_rorder['hrg_tot'],0,",","."); ?></td>
                   <td><?php 
				   //$margin=$row_rorder['hrg_tot']-$hrg_hemera;
				   //echo number_format($margin,0,",","."); ?></td>
                   <td >
                   
                   
                    
                    
                    <a href="javascript:void(0);" data-href="modul/order/detail_order.php?kd_order=<?php //echo $row_rorder['kd_order']; ?>" class="btn btn-success btn-sm text-white openPopup" style="width:100px;">Detail</a>
                    
                    
                    
                                 
                   </td>
                </tr>
                <?php //$x+=1; $xqty+=$row_rqty['jqty']; $hpr+=$hrg_hemera; $pr+=$row_rorder['hrg_tot']; $mr+=$margin; ?>
                 <?php //} while ($row_rorder = mysql_fetch_assoc($rorder)); ?>
                 
                 <tr>
                 <td colspan="2"><span style="font-weight:900;">TOTAL</span></td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td><span style="font-weight:900;"><?php //echo number_format($xqty,0,",","."); ?></span></td>
                 <td><span style="font-weight:900;"><?php //echo number_format($hpr,0,",","."); ?></span></td>
                 <td><span style="font-weight:900;"><?php //echo number_format($pr,0,",","."); ?></span></td>
                 <td><span style="font-weight:900;"><?php //echo number_format($mr,0,",","."); ?></span></td>
                 <td >&nbsp;</td>
               </tr>
               
            </tbody>
         </table>
         
      </div>
   </div>-->
</div>



<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total Closing'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:1f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Closing',
        data: [
		<?php do { ?>
		<?php
		mysql_select_db($database_hemera, $hemera);
$query_rorderx = "SELECT product_master.nm_product, product_master.harga_net, trx_ds_detail.qty, trx_ds_detail.foto_utama, trx_ds_detail.hrg_satuan, trx_ds_detail.hrg_total, trx_ds.kd_ds, trx_ds.hrg_tot, trx_ds.kd_order, trx_ds.tgl_in, trx_ds.hrg_shipping, trx_ds.hrg_grand, ds_customer.nm_depan, ds_customer.nm_belakang, ds_customer.alamat, ds_customer.propinsi, ds_customer.kota, dropshiper.nm_domain FROM product_master JOIN trx_ds_detail ON product_master.kd_product = trx_ds_detail.kd_prod JOIN trx_ds ON trx_ds_detail.kd_order = trx_ds.kd_order JOIN ds_customer ON trx_ds.kd_order = ds_customer.kd_order JOIN dropshiper ON dropshiper.kd_dropshiper = trx_ds.kd_ds WHERE trx_ds.sts_order='1' AND trx_ds.sts_bayar='1' AND trx_ds.sts_proses='1' AND trx_ds.sts_kirim='1' AND YEAR(trx_ds.tgl_in)='$tahun' AND MONTH(trx_ds.tgl_in)='$row_rbln[id_]'";
$rorderx = mysql_query($query_rorderx, $hemera) or die(mysql_error());
$row_rorderx = mysql_fetch_assoc($rorderx);
$totalRows_rorderx = mysql_num_rows($rorderx);
		?>
		<?php
		echo $totalRows_rorderx.", ";
		?>
		<?php } while ($row_rbln = mysql_fetch_assoc($rbln)); ?>
		//0, 0, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4
		]

    }]
});
		</script>

<?php
mysql_free_result($rorder);

mysql_free_result($rharga);
?>