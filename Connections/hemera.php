<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

error_reporting(0);
@ini_set('display_errors', 0);

include ('parser-php-version.php');

$hostname_hemera = "localhost";
$database_hemera = "hemera_db3";
$username_hemera = "root";
$password_hemera = "";
$hemera = mysql_pconnect($hostname_hemera, $username_hemera, $password_hemera) or trigger_error(mysql_error(),E_USER_ERROR); 
?>