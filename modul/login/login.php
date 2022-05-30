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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['uname'])) {
  $loginUsername=mysql_real_escape_string($_POST['uname']);
  $password=md5(mysql_real_escape_string($_POST['passwd']));
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "index.php?login=success";
  $MM_redirectLoginFailed = "index.php?login=fail";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_hemera, $hemera);
  
  $LoginRS__query=sprintf("SELECT username, password FROM user_ WHERE username=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $hemera) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
	
    mysql_select_db($database_hemera, $hemera);
	$query_cek_login = "SELECT * FROM user_ WHERE username='$loginUsername' AND aktif='1'";
	$cek_login = mysql_query($query_cek_login, $hemera) or die(mysql_error());
	$row_cek_login = mysql_fetch_assoc($cek_login);
	$totalRows_cek_login = mysql_num_rows($cek_login);
	
	mysql_select_db($database_hemera, $hemera);
	$query_cek_ds = "SELECT * FROM dropshiper WHERE kd_user='$row_cek_login[kd_user]'";
	$cek_ds = mysql_query($query_cek_ds, $hemera) or die(mysql_error());
	$row_cek_ds = mysql_fetch_assoc($cek_ds);
	$totalRows_cek_ds = mysql_num_rows($cek_ds);

    //declare two session variables and assign them
    $_SESSION['HEM_user'] = $loginUsername;
    $_SESSION['HEM_UserGroup'] = $loginStrGroup;	
	$_SESSION['HEM_name'] = $row_cek_login['nama'];	
	$_SESSION['HEM_grup'] = $row_cek_login['grup'];	
	$_SESSION['HEM_foto'] = $row_cek_login['foto'];	
	$_SESSION['HEM_kd_user'] = $row_cek_login['kd_user'];	 
	
	$_SESSION['HEM_kd_ds'] = $row_cek_ds['kd_dropshiper'];	    

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<body class="auth-wrapper">
      <div class="all-wrapper menu-side with-pattern">
         <div class="auth-box-w">
            <div class="logo-w">
            <a href="index.php"><img alt="" src="img/logo-big.png"></a>
            <!--<center><span><br>HEMERA BUSINESS</span></center>-->
            </div>
            
           <h4 class="auth-header">Login Form</h4>
            <form action="<?php echo $loginFormAction; ?>" method="POST" id="flogin">
               <div class="form-group">
                 <label for="">Username</label><input name="uname" class="form-control" id="uname" placeholder="Enter your username">
                  <div class="pre-icon os-icon os-icon-user-male-circle"></div>
               </div>
               <div class="form-group">
                 <label for="">Password</label><input name="passwd" type="password" class="form-control" id="passwd" placeholder="Enter your password">
                  <div class="pre-icon os-icon os-icon-fingerprint"></div>
               </div>
               <div class="buttons-w">
                  <button class="btn btn-primary">Log me in</button>
                  <div class="form-check-inline"><label class="form-check-label"><input class="form-check-input" type="checkbox">Remember Me</label></div>
               </div>
            </form>
         </div>
      </div>
   </body>