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
   
   mysql_select_db($database_hemera, $hemera);
   $query_ruser = "SELECT * FROM user_ WHERE kd_user='$_SESSION[HEM_kd_user]'";
   $ruser = mysql_query($query_ruser, $hemera) or die(mysql_error());
   $row_ruser = mysql_fetch_assoc($ruser);
   $totalRows_ruser = mysql_num_rows($ruser);
   
   mysql_select_db($database_hemera, $hemera);
   $query_rsup = "SELECT * FROM suplier WHERE kd_user='$_SESSION[HEM_kd_user]'";
   $rsup = mysql_query($query_rsup, $hemera) or die(mysql_error());
   $row_rsup = mysql_fetch_assoc($rsup);
   $totalRows_rsup = mysql_num_rows($rsup);
   
   mysql_select_db($database_hemera, $hemera);
   $query_rmem = "SELECT * FROM member WHERE kd_user='$_SESSION[HEM_kd_user]'";
   $rmem = mysql_query($query_rmem, $hemera) or die(mysql_error());
   $row_rmem = mysql_fetch_assoc($rmem);
   $totalRows_rmem = mysql_num_rows($rmem);
   
   mysql_select_db($database_hemera, $hemera);
   $query_rpropinsi = "SELECT * FROM propinsi";
   $rpropinsi = mysql_query($query_rpropinsi, $hemera) or die(mysql_error());
   $row_rpropinsi = mysql_fetch_assoc($rpropinsi);
   $totalRows_rpropinsi = mysql_num_rows($rpropinsi);
   
   mysql_select_db($database_hemera, $hemera);
   $query_rkabupaten = "SELECT * FROM kabupaten WHERE provinsi_id='$row_rmem[propinsi]'";
   $rkabupaten = mysql_query($query_rkabupaten, $hemera) or die(mysql_error());
   $row_rkabupaten = mysql_fetch_assoc($rkabupaten);
   $totalRows_rkabupaten = mysql_num_rows($rkabupaten);
   
   mysql_select_db($database_hemera, $hemera);
   $query_rkecamatan = "SELECT * FROM kecamatan WHERE kabupaten_kota_id='$row_rmem[kabupaten]'";
   $rkecamatan = mysql_query($query_rkecamatan, $hemera) or die(mysql_error());
   $row_rkecamatan = mysql_fetch_assoc($rkecamatan);
   $totalRows_rkecamatan = mysql_num_rows($rkecamatan);
   
   mysql_select_db($database_hemera, $hemera);
   $query_rkelurahan = "SELECT * FROM kelurahan WHERE kecamatan_id='$row_rmem[kecamatan]'";
   $rkelurahan = mysql_query($query_rkelurahan, $hemera) or die(mysql_error());
   $row_rkelurahan = mysql_fetch_assoc($rkelurahan);
   $totalRows_rkelurahan = mysql_num_rows($rkelurahan);
   
   ?>
<script type="text/javascript" src="js/ajax_kabupaten.js"></script>
<script type="text/javascript" src="js/ajax_kecamatan.js"></script>
<script type="text/javascript" src="js/ajax_kelurahan.js"></script>
<script>
   jQuery('#sprop').select2();
</script>
<div class="content-box">
   <div class="row">
      <div class="col-sm-5">
         <div class="user-profile compact">
            <!--<div class="up-head-w" style="background-image:url('img/profile_bg1.jpg')">-->
            <div class="up-head-w" style="background-image:url('foto/user/<?php echo $row_ruser['foto']; ?>')">
               <div class="up-social">
                  <a href="users_profile_small.html#"><i class="os-icon os-icon-twitter"></i></a><a href="users_profile_small.html#"><i class="os-icon os-icon-facebook"></i></a>
               </div>
               <div class="up-main-info">
                  <h2 class="up-header"><?php echo $_SESSION['HEM_name']; ?></h2>
                  <h6 class="up-sub-header"><?php echo $row_rds['nm_domain']; ?></h6>
               </div>
               <svg class="decor" width="842px" height="219px" viewBox="0 0 842 219" preserveAspectRatio="xMaxYMax meet" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <g transform="translate(-381.000000, -362.000000)" fill="#FFFFFF">
                     <path class="decor-path" d="M1223,362 L1223,581 L381,581 C868.912802,575.666667 1149.57947,502.666667 1223,362 Z"></path>
                  </g>
               </svg>
            </div>
            <div class="up-controls">
               <div class="row">
                  <div class="col-sm-6">
                     <div class="value-pair">
                        <div class="label">Status:</div>
                        <div class="value badge badge-pill badge-success">Active</div>
                     </div>
                  </div>
                  <div class="col-sm-6 text-right">
                     <a class="btn btn-primary btn-sm openPopup" href="javascript:void(0);" data-href="modul/dropshipper/upload_foto.php?kd_user=<?php echo $_SESSION['HEM_kd_user']; ?>">
                     <i class="os-icon os-icon-image"></i><span>Upload Photo</span></a>
                  </div>
               </div>
            </div>
            <div class="up-contents">
               <div class="m-b">
                  <div class="row m-b">
                     <div class="col-sm-6 b-r b-b">
                        <div class="el-tablo centered padded-v">
                           <div class="value">0</div>
                           <div class="label">Products Sold</div>
                        </div>
                     </div>
                     <div class="col-sm-6 b-b">
                        <div class="el-tablo centered padded-v">
                           <div class="value">0</div>
                           <div class="label">Products List</div>
                        </div>
                     </div>
                  </div>
                  <!--<div class="padded">
                     <div class="os-progress-bar primary">
                        <div class="bar-labels">
                           <div class="bar-label-left"><span>Profile Completion</span><span class="positive">+10</span></div>
                           <div class="bar-label-right"><span class="info">72/100</span></div>
                        </div>
                        <div class="bar-level-1" style="width: 100%">
                           <div class="bar-level-2" style="width: 80%">
                              <div class="bar-level-3" style="width: 30%"></div>
                           </div>
                        </div>
                     </div>
                     <div class="os-progress-bar primary">
                        <div 
                           class="bar-labels">
                           <div class="bar-label-left"><span>Status Unlocked</span><span class="positive">+5</span></div>
                           <div class="bar-label-right"><span class="info">45/100</span></div>
                        </div>
                        <div class="bar-level-1" style="width: 100%">
                           <div class="bar-level-2" style="width: 30%">
                              <div class="bar-level-3" style="width: 10%"></div>
                           </div>
                        </div>
                     </div>
                     <div class="os-progress-bar primary">
                        <div class="bar-labels">
                           <div class="bar-label-left"><span>Followers</span><span class="negative">-12</span></div>
                           <div class="bar-label-right"><span class="info">74/100</span></div>
                        </div>
                        <div class="bar-level-1" style="width: 100%">
                           <div class="bar-level-2" style="width: 80%">
                              <div class="bar-level-3" style="width: 60%"></div>
                           </div>
                        </div>
                     </div>
                  </div>-->
               </div>
            </div>
         </div>
         <!--<div class="element-wrapper">
            <div class="element-box">
               <h6 class="element-header">User Activity</h6>
               <div class="timed-activities compact">
                  <div class="timed-activity">
                     <div class="ta-date"><span>21st Jan, 2017</span></div>
                     <div class="ta-record-w">
                        <div class="ta-record">
                           <div class="ta-timestamp"><strong>11:55</strong> am</div>
                           <div class="ta-activity">Created a post called <a href="users_profile_small.html#">Register new symbol</a> in Rogue</div>
                        </div>
                        <div class="ta-record">
                           <div class="ta-timestamp"><strong>2:34</strong> pm</div>
                           <div class="ta-activity">Commented on story <a href="users_profile_small.html#">How to be a leader</a> in <a href="users_profile_small.html#">Financial</a> category</div>
                        </div>
                        <div class="ta-record">
                           <div class="ta-timestamp"><strong>7:12</strong> pm</div>
                           <div class="ta-activity">Added <a href="users_profile_small.html#">John Silver</a> as a friend</div>
                        </div>
                     </div>
                  </div>
                  <div class="timed-activity">
                     <div class="ta-date"><span>3rd Feb, 2017</span></div>
                     <div class="ta-record-w">
                        <div class="ta-record">
                           <div class="ta-timestamp"><strong>9:32</strong> pm</div>
                           <div class="ta-activity">Added <a href="users_profile_small.html#">John Silver</a> as a friend</div>
                        </div>
                        <div class="ta-record">
                           <div class="ta-timestamp"><strong>5:14</strong> pm</div>
                           <div class="ta-activity">Commented on story <a href="users_profile_small.html#">How to be a leader</a> in <a href="users_profile_small.html#">Financial</a> category</div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            </div>-->
         <div class="element-wrapper">
            <div class="element-box">
               <h6 class="element-header">Login Account</h6>
               <form action="modul/supplier/ed_user_sup.php" method="POST" name="fuser">
                  <div class="row">
                     <!--<div class="col-sm-6">
                        <div class="form-group">
                           <label for=""> Name</label>
                           <input name="nama" required class="form-control" placeholder=" Name" value="<?php //echo $row_ruser['nama']; ?>" data-error="Please input your Name">
                           <div class="help-block form-text with-errors form-control-feedback"></div>
                        </div>
                     </div>-->
                     <!--<div class="col-sm-6">
                        <div class="form-group">
                           <label for="">Shop Name</label>
                           <input name="nm_toko" required class="form-control" placeholder="Shop Name" value="<?php //echo $row_ruser['nm_toko']; ?>" data-error="Please input your Shop Name">
                           <div class="help-block form-text with-errors form-control-feedback"></div>
                        </div>
                     </div>-->
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label for="">Username</label><input name="username" required class="form-control" placeholder="Username" value="<?php echo $row_ruser['username']; ?>" data-error="Please input your Username">
                           <div class="help-block form-text with-errors form-control-feedback"></div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label for="">Password</label>
                           <input class="form-control" data-error="Please input your Password" placeholder="Password" name="password">
                           <div class="help-block form-text with-errors form-control-feedback"></div>
                        </div>
                     </div>
                     <div class="col-sm-12">
                        <div class="form-group">
                           <div class="form-buttons-w"><button class="btn btn-primary" type="submit"> Submit</button></div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="col-sm-7">
         <div class="element-wrapper">
            <div class="element-box">
               <form method="post" id="formValidate" action="modul/supplier/ed_biodata_sup.php">
                  <div class="element-info">
                     <div class="element-info-with-icon">
                        <div class="element-info-icon">
                           <div class="os-icon os-icon-wallet-loaded"></div>
                        </div>
                        <div class="element-info-text">
                           <h5 class="element-inner-header">Profile Settings</h5>
                           <!--<div class="element-inner-desc">Validation of the form is made possible using powerful validator plugin for bootstrap. <a href="http://1000hz.github.io/bootstrap-validator/" target="_blank">Learn more about Bootstrap Validator</a></div>-->
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                       <div class="form-group">
                         <label for=""> Supplier Code</label>
                          <input name="sp_code" type="text" readonly="readonly" class="form-control" id="sp_code" value="<?php echo $row_rsup['kd_suplier']; ?>">
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                          <label for=""> Supplier Name</label>
                           <input name="sp_name" type="text" required class="form-control"  value="<?php echo $row_rsup['nm_suplier']; ?>" data-error="Your Data is invalid">
                           <div class="help-block form-text with-errors form-control-feedback"></div>
                        </div>
                     </div>
                  </div>
                  
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                          <label for=""> Contact Person</label>
                           <input class="form-control" data-error="Your Data is invalid" placeholder="Contact Person" required type="text" name="cp" value="<?php echo $row_rsup['contact_person']; ?>" >
                           <div class="help-block form-text with-errors form-control-feedback"></div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                          <label for=""> Email</label>
                           <input class="form-control" data-error="Your Data is invalid" placeholder="Enter Email" required type="email" name="email" value="<?php echo $row_ruser['username']; ?>" >
                           <div class="help-block form-text with-errors form-control-feedback"></div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                          <label for=""> Mobile Number</label>
                           <input name="no_hp" type="text" required class="form-control" placeholder="Enter Mobile Number" value="<?php echo $row_rsup['no_hp']; ?>" data-error="Your Data is invalid">
                           <div class="help-block form-text with-errors form-control-feedback"></div>
                        </div>
                     </div>
                     <!--<div class="col-sm-6">
                        <div class="form-group">
                           <label for=""> Logo</label>
                           <input name="file_logo" type="file" class="form-control">
                        </div>
                     </div>-->
                  </div>
                  <legend><span>Data Supplier</span></legend>
                  <div class="form-group">
                    <label for=""> Office Address</label>
                     <input name="alamat"  type="text" class="form-control" id="alamat" value="<?php echo $row_rsup['alamat']; ?>" data-error="Your Data is invalid">
                     <div class="help-block form-text with-errors form-control-feedback"></div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label for=""> Propinsi</label>
                           <select name="sprop" id="sprop" class="form-control select2" onChange="show_kab(document.getElementById('sprop').value);">
                              <option value="" <?php if (!(strcmp("", $row_rmem['propinsi']))) {echo "selected=\"selected\"";} ?>>Pilih</option>
                              <?php
                                 do {  
                                 ?>
                              <option value="<?php echo $row_rpropinsi['id']?>"<?php if (!(strcmp($row_rpropinsi['id'], $row_rmem['propinsi']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rpropinsi['nama']?></option>
                              <?php
                                 } while ($row_rpropinsi = mysql_fetch_assoc($rpropinsi));
                                   $rows = mysql_num_rows($rpropinsi);
                                   if($rows > 0) {
                                       mysql_data_seek($rpropinsi, 0);
                                 	  $row_rpropinsi = mysql_fetch_assoc($rpropinsi);
                                   }
                                 ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label for=""> Kabupaten</label>
                           <div id="result_kab">
                              <select name="skab" class="form-control  select2" id="skab">
                                 <option value="" <?php if (!(strcmp("", $row_rmem['kabupaten']))) {echo "selected=\"selected\"";} ?>>Pilih</option>
                                 <?php
                                    do {  
                                    ?>
                                 <option value="<?php echo $row_rkabupaten['id']?>"<?php if (!(strcmp($row_rkabupaten['id'], $row_rmem['kabupaten']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rkabupaten['nama']?></option>
                                 <?php
                                    } while ($row_rkabupaten = mysql_fetch_assoc($rkabupaten));
                                      $rows = mysql_num_rows($rkabupaten);
                                      if($rows > 0) {
                                          mysql_data_seek($rkabupaten, 0);
                                    	  $row_rkabupaten = mysql_fetch_assoc($rkabupaten);
                                      }
                                    ?>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label for=""> Kecamatan</label>
                           <div id="result_kec">
                              <select name="skec" class="form-control  select2" id="skec">
                                 <option value="" <?php if (!(strcmp("", $row_rmem['kecamatan']))) {echo "selected=\"selected\"";} ?>>Pilih</option>
                                 <?php
                                    do {  
                                    ?>
                                 <option value="<?php echo $row_rkecamatan['id']?>"<?php if (!(strcmp($row_rkecamatan['id'], $row_rmem['kecamatan']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rkecamatan['nama']?></option>
                                 <?php
                                    } while ($row_rkecamatan = mysql_fetch_assoc($rkecamatan));
                                      $rows = mysql_num_rows($rkecamatan);
                                      if($rows > 0) {
                                          mysql_data_seek($rkecamatan, 0);
                                    	  $row_rkecamatan = mysql_fetch_assoc($rkecamatan);
                                      }
                                    ?>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label for=""> Kelurahan</label>
                           <div id="result_kel">
                              <select name="skel" class="form-control select2" id="skel">
                                 <option value="" <?php if (!(strcmp("", $row_rmem['kelurahan']))) {echo "selected=\"selected\"";} ?>>Pilih</option>
                                 <?php
                                    do {  
                                    ?>
                                 <option value="<?php echo $row_rkelurahan['id']?>"<?php if (!(strcmp($row_rkelurahan['id'], $row_rmem['kelurahan']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rkelurahan['nama']?></option>
                                 <?php
                                    } while ($row_rkelurahan = mysql_fetch_assoc($rkelurahan));
                                      $rows = mysql_num_rows($rkelurahan);
                                      if($rows > 0) {
                                          mysql_data_seek($rkelurahan, 0);
                                    	  $row_rkelurahan = mysql_fetch_assoc($rkelurahan);
                                      }
                                    ?>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--<div class="form-group">
                     <label for=""> Regular select</label>
                     <select class="form-control">
                        <option value="New York">New York</option>
                        <option value="California">California</option>
                        <option value="Boston">Boston</option>
                        <option value="Texas">Texas</option>
                        <option value="Colorado">Colorado</option>
                     </select>
                     </div>-->
                  <!--<div class="form-group">
                     <label for=""> Multiselect</label>
                     <select class="form-control select2" multiple="true">
                        <option selected="true">New York</option>
                        <option selected="true">California</option>
                        <option>Boston</option>
                        <option>Texas</option>
                        <option>Colorado</option>
                     </select>
                     </div>-->
                  <!--<fieldset class="form-group">
                     <legend><span>Section Example</span></legend>
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label for=""> First Name</label><input class="form-control" data-error="Please input your First Name" placeholder="First Name" required="required">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label for="">Last Name</label><input class="form-control" data-error="Please input your Last Name" placeholder="Last Name" required="required">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group"><label for=""> Date of Birth</label><input class="single-daterange form-control" placeholder="Date of birth" value="04/12/1978"></div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label for="">Twitter Username</label>
                              <div class="input-group">
                                 <div class="input-group-prepend">
                                    <div class="input-group-text">@</div>
                                 </div>
                                 <input class="form-control" placeholder="Twitter Username">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group"><label for="">Date Range Picker</label><input class="multi-daterange form-control" value="03/31/2017 - 04/06/2017"></div>
                     <div class="form-group"><label> Example textarea</label><textarea class="form-control" rows="3"></textarea></div>
                     </fieldset>-->
                  <legend><span>Data Social Media</span></legend>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                          <label for=""> Whats App</label>
                           <input name="wa"  type="text" class="form-control" placeholder="Enter Wa Number" value="<?php echo $row_rsup['wa']; ?>" data-error="Your Data is invalid">
                           <div class="help-block form-text with-errors form-control-feedback"></div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                          <label for=""> Facebook</label>
                           <input name="fb" type="text" class="form-control" id="fb" placeholder="Enter Facebook" value="<?php echo $row_rsup['fb']; ?>" data-error="Your Data is invalid">
                           <div class="help-block form-text with-errors form-control-feedback"></div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                          <label for=""> Instagram</label>
                           <input name="ig" type="text" class="form-control" id="ig" placeholder="Enter Instagram" value="<?php echo $row_rsup['ig']; ?>" data-error="Your Data is invalid">
                           <div class="help-block form-text with-errors form-control-feedback"></div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                          <label for=""> Twitter</label>
                           <input name="tw" type="text" class="form-control" id="tw" placeholder="Enter Twitter" value="<?php echo $row_rsup['tw']; ?>" data-error="Your Data is invalid">
                           <div class="help-block form-text with-errors form-control-feedback"></div>
                        </div>
                     </div>
                  </div>
                  <br><br>
                  <!--<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox">I agree to terms and conditions</label></div>-->
                  <div class="form-buttons-w"><button class="btn btn-primary" type="submit"> Submit</button></div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="onboarding-modal modal fade animated" id="myModal" role="dialog">
   <div class="modal-dialog modal-xl modal-centered">
      <div class="modal-content">
         <div class="onboarding-side-by-side">
            <div class="onboarding-media"><img alt="" src="img/bigicon5.png" width="200px"></div>
            <div class="onboarding-content with-gradient">
               <!--<h4 class="onboarding-title">Example Request Information</h4>-->
               <!--<div class="onboarding-text">In this example you can see a form where you can request some additional information from the customer when they land on the app page. xxx
                  </div>
                  -->
               <div class="modal-body">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php
   mysql_free_result($ruser);
   ?>