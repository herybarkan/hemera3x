<?php require_once('Connections/hemera.php'); ?>
<?php
ob_start();
session_start();

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

<div class="logged-user-w avatar-inline">
                  <div class="logged-user-i">
                     <div class="avatar-w"><img alt="" src="foto/user/<?php echo $row_ruserx['foto']; ?>"></div>
                     <div class="logged-user-info-w">
                        <div class="logged-user-name"><?php echo $row_ruserx['nama']; ?></div>
                        <div class="logged-user-role"><?php echo $row_ruserx['nm_grup']; ?></div>
                     </div>
                     <div class="logged-user-toggler-arrow">
                        <div class="os-icon os-icon-chevron-down"></div>
                     </div>
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
                           <li><a href="apps_email.html"><i class="os-icon os-icon-mail-01"></i><span>Incoming Mail</span></a></li>
                           <li><a href="users_profile_big.html"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a></li>
                           <li><a href="users_profile_small.html"><i class="os-icon os-icon-coins-4"></i><span>Billing Details</span></a></li>
                           <li><a href="index.html#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a></li>
                           <li><a href="index.html#"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a></li>
                        </ul>
                     </div>
                  </div>
               </div>