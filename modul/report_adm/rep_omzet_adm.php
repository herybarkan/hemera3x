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

$tahun=date('Y');

mysql_select_db($database_hemera, $hemera);
$query_ruser = "SELECT user_.id_, user_.id_ AS idx, user_.kd_user, user_.nama, user_.nm_toko, user_.hp, user_.email, user_.foto, upload_pembayaran.atas_nama, upload_pembayaran.nominal, upload_pembayaran.bank, upload_pembayaran.dari_rek, user_grup.nm_grup, dropshiper.kd_dropshiper, dropshiper.nm_domain FROM upload_pembayaran JOIN user_ ON upload_pembayaran.email = user_.email  JOIN user_grup ON user_grup.kd_grup = user_.grup  JOIN dropshiper ON dropshiper.kd_user = user_.kd_user WHERE user_.grup='6'  AND user_.aktif='1'";
$ruser = mysql_query($query_ruser, $hemera) or die(mysql_error());
$row_ruser = mysql_fetch_assoc($ruser);
$totalRows_ruser = mysql_num_rows($ruser);


mysql_select_db($database_hemera, $hemera);
$query_rbln = "SELECT * FROM bulan";
$rbln = mysql_query($query_rbln, $hemera) or die(mysql_error());
$row_rbln = mysql_fetch_assoc($rbln);
$totalRows_rbln = mysql_num_rows($rbln);

mysql_select_db($database_hemera, $hemera);
$query_ruser1 = "SELECT user_.id_, user_.id_ AS idx, user_.kd_user, user_.nama, user_.nm_toko, user_.hp, user_.email, user_.foto, upload_pembayaran.atas_nama, upload_pembayaran.nominal, upload_pembayaran.bank, upload_pembayaran.dari_rek, user_grup.nm_grup, dropshiper.kd_dropshiper, dropshiper.nm_domain FROM upload_pembayaran JOIN user_ ON upload_pembayaran.email = user_.email  JOIN user_grup ON user_grup.kd_grup = user_.grup  JOIN dropshiper ON dropshiper.kd_user = user_.kd_user WHERE user_.grup='6'  AND user_.aktif='1'";
$ruser1 = mysql_query($query_ruser1, $hemera) or die(mysql_error());
$row_ruser1 = mysql_fetch_assoc($ruser1);
$totalRows_ruser1 = mysql_num_rows($ruser1);

mysql_select_db($database_hemera, $hemera);
$query_ruser2 = "SELECT user_.id_, user_.id_ AS idx, user_.kd_user, user_.nama, user_.nm_toko, user_.hp, user_.email, user_.foto, upload_pembayaran.atas_nama, upload_pembayaran.nominal, upload_pembayaran.bank, upload_pembayaran.dari_rek, user_grup.nm_grup, dropshiper.kd_dropshiper, dropshiper.nm_domain FROM upload_pembayaran JOIN user_ ON upload_pembayaran.email = user_.email  JOIN user_grup ON user_grup.kd_grup = user_.grup  JOIN dropshiper ON dropshiper.kd_user = user_.kd_user WHERE user_.grup='6'  AND user_.aktif='1'";
$ruser2 = mysql_query($query_ruser2, $hemera) or die(mysql_error());
$row_ruser2 = mysql_fetch_assoc($ruser2);
$totalRows_ruser2 = mysql_num_rows($ruser2);

mysql_select_db($database_hemera, $hemera);
$query_ruser3 = "SELECT user_.id_, user_.id_ AS idx, user_.kd_user, user_.nama, user_.nm_toko, user_.hp, user_.email, user_.foto, upload_pembayaran.atas_nama, upload_pembayaran.nominal, upload_pembayaran.bank, upload_pembayaran.dari_rek, user_grup.nm_grup, dropshiper.kd_dropshiper, dropshiper.nm_domain FROM upload_pembayaran JOIN user_ ON upload_pembayaran.email = user_.email  JOIN user_grup ON user_grup.kd_grup = user_.grup  JOIN dropshiper ON dropshiper.kd_user = user_.kd_user WHERE user_.grup='6'  AND user_.aktif='1'";
$ruser3 = mysql_query($query_ruser3, $hemera) or die(mysql_error());
$row_ruser3 = mysql_fetch_assoc($ruser3);
$totalRows_ruser3 = mysql_num_rows($ruser3);

mysql_select_db($database_hemera, $hemera);
$query_rds = "SELECT user_.id_, user_.id_ AS idx, user_.kd_user, user_.nama, user_.nm_toko, user_.hp, user_.email, user_.foto, upload_pembayaran.atas_nama, upload_pembayaran.nominal, upload_pembayaran.bank, upload_pembayaran.dari_rek, user_grup.nm_grup, dropshiper.kd_dropshiper, dropshiper.nm_domain FROM upload_pembayaran JOIN user_ ON upload_pembayaran.email = user_.email  JOIN user_grup ON user_grup.kd_grup = user_.grup  JOIN dropshiper ON dropshiper.kd_user = user_.kd_user WHERE user_.grup='6'  AND user_.aktif='1'";
$rds = mysql_query($query_rds, $hemera) or die(mysql_error());
$row_rds = mysql_fetch_assoc($rds);
$totalRows_rds = mysql_num_rows($rds);

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
                              <h6 class="element-header">Omset Hemera</h6>
                              <div class="element-box">
                                 <h5 class="form-header">Omzet Hemera periode <?php echo date('Y'); ?></h5>
                                 <div class="form-desc">Grafik Omzet dilihat dari view Dropshipper</a></div>
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

<!--<div class="element-wrapper">
   <h6 class="element-header">List of Profit Dropshipper</h6>
   <div class="element-box-tp">
      <div class="table-responsive">
         <table width="100%" class="table table-padded">
            <thead>
               <tr>
                  <th width="2%"></th>
                  <th width="16%">Name</th>
                  <th width="25%">Shop Name</th>
                  <th width="17%">Total Profit</th>
                  <th width="14%">Recent Profit</th>
                  <th width="7%"> Status</th>
                  <th width="19%">Actions</th>
               </tr>
            </thead>
            <tbody>
            <?php //$tp=0; $rp=0; ?>
               <?php //do { ?>
               <tr>
                   <td class="text-center">
                   <input class="form-control" type="checkbox">
                   </td>
                   <td>
                     <div class="user-with-avatar"><img alt="" src="foto/user/<?php //echo $row_ruser['foto']; ?>"><span><?php //echo $row_ruser['nama']; ?></span></div>
                   </td>
                   <td><?php //echo $row_ruser['nm_toko']; ?></td>
                   <td class="nowrap">
                   <?php
				   /*
mysql_select_db($database_hemera, $hemera);
$query_ptot = "SELECT
SUM((trx_ds_detail.hrg_satuan-product_master.harga_net)*trx_ds_detail.qty) AS profit
FROM
product_master
JOIN trx_ds_detail
ON product_master.kd_product = trx_ds_detail.kd_prod 
JOIN trx_ds
ON trx_ds.kd_order = trx_ds_detail.kd_order WHERE trx_ds.kd_ds='$row_ruser[kd_dropshiper]' AND trx_ds_detail.sts_wd= '1' AND trx_ds.sts_kirim='1'";
$ptot = mysql_query($query_ptot, $hemera) or die(mysql_error());
$row_ptot = mysql_fetch_assoc($ptot);
$totalRows_ptot = mysql_num_rows($ptot);	

mysql_select_db($database_hemera, $hemera);
$query_ptotr = "SELECT
SUM((trx_ds_detail.hrg_satuan-product_master.harga_net)*trx_ds_detail.qty) AS profit
FROM
product_master
JOIN trx_ds_detail
ON product_master.kd_product = trx_ds_detail.kd_prod 
JOIN trx_ds
ON trx_ds.kd_order = trx_ds_detail.kd_order WHERE trx_ds.kd_ds='$row_ruser[kd_dropshiper]' AND trx_ds_detail.sts_wd= '0' AND trx_ds.sts_kirim='1'";
$ptotr = mysql_query($query_ptotr, $hemera) or die(mysql_error());
$row_ptotr = mysql_fetch_assoc($ptotr);
$totalRows_ptotr = mysql_num_rows($ptotr);				   
				   */
				   ?>
                   <?php //echo number_format($row_ptot['profit'],0,",","."); ?>
                   </td>
                   <td class="nowrap"><?php //echo number_format($row_ptotr['profit'],0,",","."); ?></td>
                   <td class="nowrap">
                   
                   </td>
                   <td >
                   
                   
                   
                    
                    <a href="modul/finance/pembayaran_ds.php?kd_ds=<?php //echo $row_ruser['kd_dropshiper']; ?>" class="btn btn-success btn-sm text-white"data-target=".bd-example-modal-lg" data-toggle="modal">Payment</a>
                   
                    
                    
                                 
                   </td>
                </tr>
                
               <?php //$tp+=$row_ptot['profit']; $rp+=$row_ptotr['profit']; ?>
                 <?php //} while ($row_ruser = mysql_fetch_assoc($ruser)); ?>
                 
                 <tr>
                 <td colspan="2" ><span style="font-weight:900;">TOTAL</span></td>
                 <td>&nbsp;</td>
                 <td class="nowrap"><span style="font-weight:900;"><?php //echo number_format($tp,0,",","."); ?></span></td>
                 <td class="nowrap"><span style="font-weight:900;"><?php //echo number_format($rp,0,",","."); ?></span></td>
                 <td class="nowrap"></td>
                 <td >&nbsp;</td>
               </tr>
               
            </tbody>
         </table>
      </div>
   </div>
</div>-->

<div class="onboarding-modal modal fade animated" id="myModal" role="dialog">
    <div class="modal-dialog modal-xl modal-centered">
    	<div class="modal-content">
        	
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
		<?php do { ?>
    	<?php
		echo "'".$row_ruser1['nm_toko']."', ";
		?>
		<?php } while ($row_ruser1 = mysql_fetch_assoc($ruser1)); ?>
		/*
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
            'Dec'*/
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total Nominal'
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
        name: 'Profit Recent',
        data: [
		<?php do { ?>
		<?php
		

mysql_select_db($database_hemera, $hemera);
$query_ptotrx = "
SELECT
trx_ds.kd_ds,
trx_ds_detail.kd_prod,
trx_ds_detail.qty,
SUM(trx_ds_detail.hrg_satuan) AS profit,
trx_ds.kd_order,
trx_ds.tgl_in,
trx_ds.sts_order,
trx_ds.sts_bayar,
trx_ds.sts_proses,
trx_ds.sts_kirim
FROM
trx_ds_detail
JOIN trx_ds
ON trx_ds_detail.kd_order = trx_ds.kd_order
WHERE
trx_ds.sts_order='1' AND
trx_ds.sts_bayar='1' AND
trx_ds.sts_proses='1' AND
trx_ds.sts_kirim='1' AND
trx_ds.kd_ds='$row_ruser2[kd_dropshiper]'";
$ptotrx = mysql_query($query_ptotrx, $hemera) or die(mysql_error());
$row_ptotrx = mysql_fetch_assoc($ptotrx);
$totalRows_ptotrx = mysql_num_rows($ptotrx);	

		?>
		<?php
			if ($row_ptotrx['profit']=="") {$xprofit="0";}
		elseif ($row_ptotrx['profit']!="") {$xprofit = $row_ptotrx['profit'];}
		echo $xprofit.", ";
		?>
		<?php } while ($row_ruser2 = mysql_fetch_assoc($ruser2)); ?>
		//0, 0, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4
		]

    }]
});
		</script>

<?php
mysql_free_result($ruser);
?>