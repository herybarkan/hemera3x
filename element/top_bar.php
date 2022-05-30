<?php require_once('Connections/hemera.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  
  	$_SESSION['HEM_user'] = NULL;
    $_SESSION['HEM_UserGroup'] = NULL;	
	$_SESSION['HEM_name'] = NULL;	
	$_SESSION['HEM_grup'] = NULL;	
	$_SESSION['HEM_foto'] = NULL;	
	$_SESSION['HEM_kd_user'] = NULL;	
	
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
  
  	unset	($_SESSION['HEM_user']);
    unset	($_SESSION['HEM_UserGroup']);	
	unset	($_SESSION['HEM_name']);	
	unset	($_SESSION['HEM_grup']);	
	unset	($_SESSION['HEM_foto']);	
	unset	($_SESSION['HEM_kd_user']);	
	
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
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

mysql_select_db($database_hemera, $hemera);
$query_ruserx = "SELECT
user_.id_,
user_.kd_user,
user_.nama,
user_.hp,
user_.email,
user_.username,
user_.grup,
user_.foto,
user_.tgl_in,
user_grup.nm_grup
FROM
user_grup
JOIN user_
ON user_grup.kd_grup = user_.grup 
WHERE kd_user='$_SESSION[HEM_kd_user]'";
$ruserx = mysql_query($query_ruserx, $hemera) or die(mysql_error());
$row_ruserx = mysql_fetch_assoc($ruserx);
$totalRows_ruserx = mysql_num_rows($ruserx);
?>
<div class="top-bar color-scheme-transparent">
                  <div class="top-menu-controls">
                     <!--<div class="element-search autosuggest-search-activator"><input placeholder="Start typing to search..."></div>-->
                     <!--<div class="messages-notifications os-dropdown-trigger os-dropdown-position-left">
                        <i class="os-icon os-icon-mail-14"></i>
                        <div class="new-messages-count">12</div>
                        <div class="os-dropdown light message-list">
                           <ul>
                              <li>
                                 <a href="index.html#">
                                    <div class="user-avatar-w"><img alt="" src="img/avatar1.jpg"></div>
                                    <div class="message-content">
                                       <h6 class="message-from">John Mayers</h6>
                                       <h6 class="message-title">Account Update</h6>
                                    </div>
                                 </a>
                              </li>
                              <li>
                                 <a href="index.html#">
                                    <div class="user-avatar-w"><img alt="" src="img/avatar2.jpg"></div>
                                    <div class="message-content">
                                       <h6 class="message-from">Phil Jones</h6>
                                       <h6 class="message-title">Secutiry Updates</h6>
                                    </div>
                                 </a>
                              </li>
                              <li>
                                 <a href="index.html#">
                                    <div class="user-avatar-w"><img alt="" src="img/avatar3.jpg"></div>
                                    <div class="message-content">
                                       <h6 class="message-from">Bekky Simpson</h6>
                                       <h6 class="message-title">Vacation Rentals</h6>
                                    </div>
                                 </a>
                              </li>
                              <li>
                                 <a href="index.html#">
                                    <div class="user-avatar-w"><img alt="" src="img/avatar4.jpg"></div>
                                    <div class="message-content">
                                       <h6 class="message-from">Alice Priskon</h6>
                                       <h6 class="message-title">Payment Confirmation</h6>
                                    </div>
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </div>-->
                     <!--<div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-left">
                        <i class="os-icon os-icon-ui-46"></i>
                        <div class="os-dropdown">
                           <div class="icon-w"><i class="os-icon os-icon-ui-46"></i></div>
                           <ul>
                              <li><a href="users_profile_small.html"><i class="os-icon os-icon-ui-49"></i><span>Profile Settings</span></a></li>
                              <li><a href="users_profile_small.html"><i class="os-icon os-icon-grid-10"></i><span>Billing Info</span></a></li>
                              <li><a href="users_profile_small.html"><i class="os-icon os-icon-ui-44"></i><span>My Invoices</span></a></li>
                              <li><a href="users_profile_small.html"><i class="os-icon os-icon-ui-15"></i><span>Cancel Account</span></a></li>
                           </ul>
                        </div>
                     </div>-->
                     <div class="logged-user-w">
                        <div class="logged-user-i">
                           <div class="avatar-w"><img alt="" src="foto/user/<?php echo $row_ruserx['foto']; ?>"></div>
                           <div class="logged-user-menu color-style-bright">
                              <div class="logged-user-avatar-info">
                                 <div class="avatar-w"><img alt="" src="foto/user/<?php echo $row_ruserx['foto']; ?>"></div>
                                 <div class="logged-user-info-w">
                                    <div class="logged-user-name"><?php echo $row_ruserx['nama']; ?></div>
                                    <div class="logged-user-role"><?php echo $row_ruserx['nm_grup']; ?></div>
                                 </div>
                              </div>
                              <div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
                              <ul>
                                 <!--<li><a href="apps_email.html"><i class="os-icon os-icon-mail-01"></i><span>Incoming Mail</span></a></li>-->
                                 <li><a href="?com=biodata_ds&layout=full"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a></li>
                                 <li><a href="?com=statement_ds"><i class="os-icon os-icon-coins-4"></i><span>Statement</span></a></li>
                                 <!--<li><a href="index.html#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a></li>-->
                                 <li><a href="<?php echo $logoutAction ?>"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
<?php
mysql_free_result($ruserx);
?>
