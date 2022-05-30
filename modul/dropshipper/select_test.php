<?php require_once('../../Connections/hds.php'); ?>
<?php
mysql_select_db($database_hds, $hds);
$query_rsize = "SELECT product_size.kd_size, product_size.nm_size FROM product_size JOIN product_master ON product_size.kd_size = product_master.kd_size WHERE nm_product='$row_rcn[nm_product]' GROUP BY product_size.kd_size";
$rsize = mysql_query($query_rsize, $hds) or die(mysql_error());
$row_rsize = mysql_fetch_assoc($rsize);
$totalRows_rsize = mysql_num_rows($rsize);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <label for="rsize"></label>
  <select name="rsize" id="rsize">
  </select>
</form>
</body>

</html>