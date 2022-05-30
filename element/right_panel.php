<?php
ob_start();
session_start();

?>
<?php
 if ($_SESSION['HEM_grup'] =='6') {
?>
<div class="content-panel">
                     <div class="content-panel-close"><i class="os-icon os-icon-close"></i></div>
                     
                     <div class="element-wrapper">
                        <h6 class="element-header">Quick Links</h6>
                        <div class="element-box-tp">
                           <div class="el-buttons-list full-width">
                           <a class="btn btn-white btn-sm" href="index.php?com=list_choose_master_product&layout=full">
                           <!--<i class="os-icon os-icon-delivery-box-2"></i>-->
                           <span>Master Product</span></a>
                           
                           <a class="btn btn-white btn-sm" href="index.php?com=new_order_ds&layout=full">
                           <!--<i class="os-icon os-icon-window-content"></i>-->
                           <span>New Order</span></a>
                           
                           <a class="btn btn-white btn-sm" href="index.php?com=payed_order_ds&layout=full">
                           <!--<i class="os-icon os-icon-window-content"></i>-->
                           <span>Paid Order</span></a>
                           
                           <a class="btn btn-white btn-sm" href="index.php?com=proses_order_ds&layout=full">
                           <!--<i class="os-icon os-icon-window-content"></i>-->
                           <span>Proccessed Order</span></a>
                           
                           <a class="btn btn-white btn-sm" href="index.php?com=shipped_order_ds&layout=full">
                           <!--<i class="os-icon os-icon-window-content"></i>-->
                           <span>Shipped Order</span></a>
                           
                           <a class="btn btn-white btn-sm" href="index.php?com=pembayaran_ds&layout=full">
                           <!--<i class="os-icon os-icon-wallet-loaded"></i>-->
                           <span>Profit Payment</span></a>
                           
                           </div>
                        </div>
                     </div>
                     
                     <!--<div class="col-sm-12 d-xxxl-none">
                           <div class="element-wrapper">
                              <h6 class="element-header">Top Selling Today</h6>
                              <div class="element-box">
                                 <div class="el-chart-w">
                                    <canvas height="120" id="donutChart" width="120"></canvas>
                                    <div class="inside-donut-chart-label"><strong>142</strong><span>Total Orders</span></div>
                                 </div>
                                 <div class="el-legend condensed">
                                    <div class="row">
                                       <div class="col-auto col-xxxxl-6 ml-sm-auto mr-sm-auto col-6">
                                          <div class="legend-value-w">
                                             <div class="legend-pin legend-pin-squared" style="background-color: #6896f9;"></div>
                                             <div class="legend-value">
                                                <span>Prada</span>
                                                <div class="legend-sub-value">14 Pairs</div>
                                             </div>
                                          </div>
                                          <div class="legend-value-w">
                                             <div class="legend-pin legend-pin-squared" style="background-color: #85c751;"></div>
                                             <div class="legend-value">
                                                <span>Maui Jim</span>
                                                <div class="legend-sub-value">26 Pairs</div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-6 d-lg-none d-xxl-block">
                                          <div class="legend-value-w">
                                             <div class="legend-pin legend-pin-squared" style="background-color: #806ef9;"></div>
                                             <div class="legend-value">
                                                <span>Gucci</span>
                                                <div class="legend-sub-value">17 Pairs</div>
                                             </div>
                                          </div>
                                          <div class="legend-value-w">
                                             <div class="legend-pin legend-pin-squared" style="background-color: #d97b70;"></div>
                                             <div class="legend-value">
                                                <span>Armani</span>
                                                <div class="legend-sub-value">12 Pairs</div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>-->
 <?php
 }
 
 elseif ($_SESSION['HEM_grup'] =='1') {
?>
<div class="content-panel">
                     <div class="content-panel-close"><i class="os-icon os-icon-close"></i></div>
                     
                     <div class="element-wrapper">
                        <h6 class="element-header">Quick Links</h6>
                        <div class="element-box-tp">
                           <div class="el-buttons-list full-width">
                           <a class="btn btn-white btn-sm" href="index.php?com=list_master_product&layout=full">
                           <!--<i class="os-icon os-icon-delivery-box-2"></i>-->
                           <span>Master Product</span></a>
                           
                           <a class="btn btn-white btn-sm" href="index.php?com=new_order_adm&layout=full">
                           <!--<i class="os-icon os-icon-window-content"></i>-->
                           <span>New Order</span></a>
                           
                           <a class="btn btn-white btn-sm" href="index.php?com=payed_order_adm&layout=full">
                           <!--<i class="os-icon os-icon-window-content"></i>-->
                           <span>Paid Order</span></a>
                           
                           <a class="btn btn-white btn-sm" href="index.php?com=proses_order_adm&layout=full">
                           <!--<i class="os-icon os-icon-window-content"></i>-->
                           <span>Proccessed Order</span></a>
                           
                           <a class="btn btn-white btn-sm" href="index.php?com=shipped_order_adm&layout=full">
                           <!--<i class="os-icon os-icon-window-content"></i>-->
                           <span>Shipped Order</span></a>
                           
                           <a class="btn btn-white btn-sm" href="index.php?com=all_status_order_adm&layout=full">
                           <!--<i class="os-icon os-icon-window-content"></i>-->
                           <span>All Status Order</span></a>
                           
                           <a class="btn btn-white btn-sm" href="index.php?com=pembayaran_adm&layout=full">
                           <!--<i class="os-icon os-icon-wallet-loaded"></i>-->
                           <span>Profit Payment</span></a>
                           
                           </div>
                        </div>
                     </div>
 <?php
 }
 ?>
                    
                     
                     <?php
					 //
					 //include ('element/quick_link.php');
					 //include ('element/support_agent.php');
					 //include ('element/recent_activity.php');
					 //include ('element/team_member.php');
					 ?>
                     
                     
                     
                  </div>