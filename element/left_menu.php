<?php
ob_start();
session_start();

?>
<div class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
               <div class="logo-wx">
                  <a class="logo" href="index.php">
                     <!--<div class="logo-element"></div>
                     <div class="logo-label">Hemera Partner</div>-->
                  <img src="img/hemera_logo.png" width="80%" style="margin-top:15px; margin-left:15px;"> </a>
               </div>
               <?php
			   //
			   //include ('element/loged_user.php');
			   	   //include ('element/menu_action.php');
			   ?>
               
               <!--<div class="element-search autosuggest-search-activator"><input placeholder="Start typing to search..."></div>-->
               <!--<h1 class="menu-page-header">Page Headerxxx</h1>-->
               <?php
			   //
			   //include('modul/menu/side_nav_default.php');
			        if ($_SESSION['HEM_grup']=="1") {include('modul/menu/side_nav_admin.php');}
				elseif ($_SESSION['HEM_grup']=="6") {include ('modul/menu/side_nav_dropshipper.php');}
				elseif ($_SESSION['HEM_grup']=="8") {include ('modul/menu/side_nav_supplier.php');}
			   ?>
               <div class="side-menu-magic">
                  <h4>Hemera</h4>
                  <p>Help Center</p>
                  <div class="btn-w"><a class="btn btn-white btn-rounded" href="#" target="_blank">Contact Now</a></div>
               </div>
            </div>