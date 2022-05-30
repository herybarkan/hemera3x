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
<div class="layout-w">
            <div class="menu-mobile menu-activated-on-click color-scheme-dark">
               <div class="mm-logo-buttons-w">
                  <a class="mm-logo" href="index.php"><img src="img/logo.png"><span>Hemera Business</span></a>
                  <div class="mm-buttons">
                     <!--<div class="content-panel-open">
                        <div class="os-icon os-icon-grid-circles"></div>
                     </div>-->
                     <div class="mobile-menu-trigger">
                        <div class="os-icon os-icon-hamburger-menu-1"></div>
                     </div>
                  </div>
               </div>
               <div class="menu-and-user">
                  <div class="logged-user-w">
                     <div class="avatar-w"><img alt="" src="foto/user/<?php echo $row_ruserx['foto']; ?>"></div>
                     <div class="logged-user-info-w">
                        <div class="logged-user-name"><?php echo $row_ruserx['nama']; ?></div>
                        <div class="logged-user-role"><?php echo $row_ruserx['nm_grup']; ?></div>
                     </div>
                  </div>
                  <!--<ul class="main-menu">
                     <li >
                        <a href="index.php">
                           <div class="icon-w">
                              <div class="os-icon os-icon-layout"></div>
                           </div>
                           <span>Dashboard</span>
                        </a>
                     </li>
                     <li class="has-sub-menu">
                        <a href="#">
                           <div class="icon-w">
                              <div class="os-icon os-icon-layers"></div>
                           </div>
                           <span>Product</span>
                        </a>
                        <ul class="sub-menu">
                           <li><a href="?com=add_product">Add Product</a></li>
                              <li><a href="?com=list_product">List Product</a></li>
                              <li><a href="?com=category">Category </a></li>
                              <li><a href="?com=sub_category">Sub Category </a></li>
                        </ul>
                     </li>
                     <li class="has-sub-menu">
                        <a href="#">
                           <div class="icon-w">
                              <div class="os-icon os-icon-package"></div>
                           </div>
                           <span>Dropshiper</span>
                        </a>
                        <ul class="sub-menu">
                           <li><a href="?com=new_reg_ds">New Registration</a></li>
                              <li><a href="?com=payment_reg_ds">Payment Registration</a></li>
                              <li><a href="?com=list_of_ds">List of Dropshiper</a></li>
                              <li><a href="?com=set_domain_ds">Setting Domain</a></li>
                              <li><a href="?com=set_web_ds">Setting Web</a></li>
                              <li><a href="?com=templates_ds">Templates</a></li>
                        </ul>
                     </li>
                     <li class="has-sub-menu">
                        <a href="#">
                           <div class="icon-w">
                              <div class="os-icon os-icon-file-text"></div>
                           </div>
                           <span>Manage User</span>
                        </a>
                        <ul class="sub-menu">
                           <li><a href="?com=add_user">Add User</a></li>
                              <li><a href="?com=list_of_user&layout=full">List of User</a></li>
                              <li><a href="?com=group_of_user">Group of User</a></li>
                              <li><a href="?com=update_profile">Update Profile</a></li>
                        </ul>
                     </li>
                    
                     
                     
                  </ul>-->
                  <div class="mobile-menu-magic">
                     <h4>Hemera Business</h4>
                     <p>Help Centre</p>
                     <div class="btn-w"><a class="btn btn-white btn-rounded" href="#" target="_blank">Contact Now</a></div>
                  </div>
               </div>
            </div>