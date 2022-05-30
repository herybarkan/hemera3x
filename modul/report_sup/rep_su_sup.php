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
$query_rcek_sup = "SELECT * FROM suplier WHERE kd_user='$_SESSION[HEM_kd_user]'";
$rcek_sup = mysql_query($query_rcek_sup, $hemera) or die(mysql_error());
$row_rcek_sup = mysql_fetch_assoc($rcek_sup);
$totalRows_rcek_sup = mysql_num_rows($rcek_sup);

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

mysql_select_db($database_hemera, $hemera);
$query_rbln2 = "SELECT * FROM bulan";
$rbln2 = mysql_query($query_rbln2, $hemera) or die(mysql_error());
$row_rbln2 = mysql_fetch_assoc($rbln2);
$totalRows_rbln2 = mysql_num_rows($rbln2);
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
                              <h6 class="element-header">Summary Grwowt Report</h6>
                              <div class="element-box">
                                 <h5 class="form-header">Transaction Periode <?php echo date('Y'); ?></h5>
                                 <div class="form-desc">Grafik Transaksi Berhasil dilihat dari view bulan</a></div>
                                 <div class="el-chart-w">
                                    
                                    
                                    <div id="container"></div>
                                    
                                 </div>
                              </div>
                           </div>
                        </div>

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
        name: 'Item Qty',
        data: [
		<?php do { ?>
		<?php
		mysql_select_db($database_hemera, $hemera);
$query_rorderx = "SELECT
SUM(trx_ds_detail.qty) AS tot_qty
FROM
product_master
JOIN trx_ds_detail
ON product_master.kd_product = trx_ds_detail.kd_prod 
JOIN trx_ds
ON trx_ds_detail.kd_order = trx_ds.kd_order
WHERE trx_ds.sts_order='1' AND 
trx_ds.sts_bayar='1' AND 
trx_ds.sts_proses='1' AND 
trx_ds.sts_kirim='1' AND 
product_master.kd_suplier='$row_rcek_sup[kd_suplier]' AND
YEAR(trx_ds.tgl_in)='$tahun' AND 
MONTH(trx_ds.tgl_in)='$row_rbln[id_]'
";
$rorderx = mysql_query($query_rorderx, $hemera) or die(mysql_error());
$row_rorderx = mysql_fetch_assoc($rorderx);
$totalRows_rorderx = mysql_num_rows($rorderx);
		?>
		<?php
		if ($row_rorderx['tot_qty']=="") {echo "0, ";}
		elseif ($row_rorderx['tot_qty']!="") {echo $row_rorderx['tot_qty'].", ";}
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