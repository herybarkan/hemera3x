<div class="content-w">
               <?php
			   //
			   include('element/top_bar.php');
			   //include('element/breadcrumb.php');
			   ?>
               
               <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
               <div class="content-i">
                  <div class="content-box">
                     
                           <?php
						   //
						   if ($_GET['com']=="")
						   {
							   if ($_SESSION['HEM_grup'] =='1') 
							   {
								   include ('element/sales_dashboard_adm.php');
								   include ('element/order_dashboard_adm.php');
								
								}
								elseif ($_SESSION['HEM_grup'] =='6') 
							   {
								   include ('element/sales_dashboard_ds.php');
								   include ('element/order_dashboard_ds.php');
								
								}
								elseif ($_SESSION['HEM_grup'] =='8') 
							   {
								   include ('element/sales_dashboard_sup.php');
								   //include ('element/order_dashboard_sup.php');
								
								}
						   
						    
							//include ('element/visitor_dashboard.php');
							//include ('element/reorder_dashboard.php');
							//include ('element/seting_bottom.php');
							//include ('element/chat_bottom.php');
						   }
						   elseif ($_GET['com']=="list_of_user") {include ('modul/user/list_user.php');}
						   elseif ($_GET['com']=="add_user") {include ('modul/user/add_user.php');}
						   elseif ($_GET['com']=="group_of_user") {include ('modul/user/grup_user.php');}
						   elseif ($_GET['com']=="category") {include ('modul/product/product_kategori.php');}
						   elseif ($_GET['com']=="sub_category") {include ('modul/product/product_sub_kategori.php');}
						   elseif ($_GET['com']=="product_color") {include ('modul/product/product_color.php');}
						   elseif ($_GET['com']=="product_size") {include ('modul/product/product_size.php');}
						   elseif ($_GET['com']=="product_suplier") {include ('modul/product/add_suplier.php');}
						   elseif ($_GET['com']=="list_suplier") {include ('modul/product/list_suplier.php');}
						   elseif ($_GET['com']=="add_master_product") {include ('modul/product/add_master_product.php');}
						   elseif ($_GET['com']=="list_master_product") {include ('modul/product/list_master_product.php');}
						   elseif ($_GET['com']=="new_reg_ds") {include ('modul/dropshipper/new_reg_ds.php');}
						   elseif ($_GET['com']=="list_of_ds") {include ('modul/dropshipper/list_ds.php');}
						   
						   elseif ($_GET['com']=="new_order_adm") {include ('modul/order/list_new_order_adm.php');}
						   elseif ($_GET['com']=="payed_order_adm") {include ('modul/order/list_payed_order_adm.php');}
						   elseif ($_GET['com']=="proses_order_adm") {include ('modul/order/list_proses_order_adm.php');}
						   elseif ($_GET['com']=="shipped_order_adm") {include ('modul/order/list_shipped_order_adm.php');}
						   elseif ($_GET['com']=="closed_order_adm") {include ('modul/order/list_closed_order_adm.php');}
						   elseif ($_GET['com']=="reject_order_adm") {include ('modul/order/list_reject_order_adm.php');}
						   elseif ($_GET['com']=="all_status_order_adm") {include ('modul/order/list_all_status_order_adm.php');}
						   
						   elseif ($_GET['com']=="list_clossing_adm") {include ('modul/finance/list_closed_trx_adm.php');}
						   elseif ($_GET['com']=="pembayaran_adm") {include ('modul/finance/pembayaran_adm.php');}
						   
						   elseif ($_GET['com']=="rep_clossing_adm") {include ('modul/report_adm/rep_closed_trx_adm.php');}
						   elseif ($_GET['com']=="rep_profit_adm_ds") {include ('modul/report_adm/rep_profit_adm_ds.php');}
						   elseif ($_GET['com']=="rep_omzet_adm") {include ('modul/report_adm/rep_omzet_adm.php');}
						   
						   elseif ($_GET['com']=="list_profit_adm_ds") {include ('modul/finance/list_profit_adm_ds.php');}
						   elseif ($_GET['com']=="list_omzet_adm") {include ('modul/finance/list_omzet_adm.php');}
						   
						   elseif ($_GET['com']=="images_tpl_ds") {include ('modul/template/images_tpl_ds.php');}
						   elseif ($_GET['com']=="list_sup_product_adm") {include ('modul/product/list_sup_product_adm.php');}
						   elseif ($_GET['com']=="list_sup_trx") {include ('modul/order/list_sup_trx.php');}
						   elseif ($_GET['com']=="withrawal_sup") {include ('modul/finance/withrawal_sup.php');}
						   
						    
						   
						   
						   //dropshipper
						   elseif ($_GET['com']=="biodata_ds") {include ('modul/dropshipper/biodata_ds.php');}
						   elseif ($_GET['com']=="set_domain_ds") {include ('modul/dropshipper/set_domain.php');}
						   elseif ($_GET['com']=="list_choose_master_product") {include ('modul/dropshipper/list_choose_master_product.php');}
						   elseif ($_GET['com']=="list_ds_added_product") {include ('modul/dropshipper/list_ds_added_product.php');}
						   elseif ($_GET['com']=="list_ds_ready_product") {include ('modul/dropshipper/list_ds_ready_product.php');}
						   elseif ($_GET['com']=="list_ds_published_product") {include ('modul/dropshipper/list_ds_published_product.php');}
						   
						   elseif ($_GET['com']=="new_order_ds") {include ('modul/dropshipper/list_new_order.php');}
						   elseif ($_GET['com']=="payed_order_ds") {include ('modul/dropshipper/list_payed_order.php');}
						   elseif ($_GET['com']=="proses_order_ds") {include ('modul/dropshipper/list_proses_order.php');}
						   elseif ($_GET['com']=="shipped_order_ds") {include ('modul/dropshipper/list_shipped_order.php');}
						   elseif ($_GET['com']=="closed_order_ds") {include ('modul/dropshipper/list_closed_order.php');}
						   elseif ($_GET['com']=="reject_order_ds") {include ('modul/dropshipper/list_rejected_order.php');}
						   
						   elseif ($_GET['com']=="rep_clossing_ds") {include ('modul/report_ds/list_closed_trx.php');}
						   elseif ($_GET['com']=="rep_profit_ds") {include ('modul/report_ds/rep_profit_ds.php');}
						   
						   elseif ($_GET['com']=="templates_ds") {include ('modul/template/template_ds.php');}
						   elseif ($_GET['com']=="box_front") {include ('modul/template/box_front.php');}
						   elseif ($_GET['com']=="tlogo") {include ('modul/template/tlogo.php');}
						   elseif ($_GET['com']=="right_panel") {include ('modul/template/right_panel.php');}
						   elseif ($_GET['com']=="inspired_you") {include ('modul/template/inspired_you.php');}
						   elseif ($_GET['com']=="shop_category") {include ('modul/template/shop_category.php');}
						   elseif ($_GET['com']=="tabout") {include ('modul/template/tabout.php');}
						   elseif ($_GET['com']=="tcontact") {include ('modul/template/tcontact.php');}
						   
						   elseif ($_GET['com']=="pembayaran_ds") {include ('modul/finance/pembayaran_profit_ds.php');}
						   elseif ($_GET['com']=="statement_ds") {include ('modul/finance/statement_ds.php');}
						   elseif ($_GET['com']=="tes_datatable") {include ('modul/dropshipper/tables_datatables2.html');}
						   
						   elseif ($_GET['com']=="list_blog") {include ('modul/blog/list_blog.php');}
						   elseif ($_GET['com']=="add_blog") {include ('modul/blog/add_blog.php');}
						   elseif ($_GET['com']=="set_area_markup_ds") {include ('modul/dropshipper/set_area_markup.php');}
						   
						   //supplier
						   elseif ($_GET['com']=="biodata_sup") {include ('modul/supplier/biodata_sup.php');}
						   elseif ($_GET['com']=="list_sup_product") {include ('modul/supplier/list_sup_product.php');}
						   elseif ($_GET['com']=="add_sup_product") {include ('modul/supplier/add_sup_product.php');}
						   
						    elseif ($_GET['com']=="new_order_sup") {include ('modul/supplier/list_new_order_sup.php');}
							elseif ($_GET['com']=="payed_order_sup") {include ('modul/supplier/list_payed_order_sup.php');}
							elseif ($_GET['com']=="proses_order_sup") {include ('modul/supplier/list_proses_order_sup.php');}
							elseif ($_GET['com']=="shipped_order_sup") {include ('modul/supplier/list_shipped_order_sup.php');}
							elseif ($_GET['com']=="closed_order_sup") {include ('modul/supplier/list_closed_order_sup.php');}
							elseif ($_GET['com']=="reject_order_sup") {include ('modul/supplier/list_reject_order_sup.php');}
							elseif ($_GET['com']=="all_trx_sup") {include ('modul/supplier/list_all_trx_sup.php');}
							elseif ($_GET['com']=="xclossing_sup") {include ('modul/supplier/xclosing_sup.php');}
							elseif ($_GET['com']=="xincome_sup") {include ('modul/supplier/xincome_sup.php');}
							elseif ($_GET['com']=="xpenarikan_sup") {include ('modul/supplier/xpenarikan_sup.php');}
							elseif ($_GET['com']=="rep_product_sold_sup") {include ('modul/report_sup/rep_product_sold_sup.php');}
							elseif ($_GET['com']=="rep_income_sup") {include ('modul/report_sup/rep_income_sup.php');}
							elseif ($_GET['com']=="rep_su_sup") {include ('modul/report_sup/rep_su_sup.php');}
							elseif ($_GET['com']=="rep_delivery_sup") {include ('modul/report_sup/rep_delivery_sup.php');}
							
						   
						   ?>
                  </div>
                  <?php
				  //
				  if ($_GET['layout']!="full")
				  {
					  	  if ($_GET['com']=="") {include ('element/right_panel.php');}
					  elseif ($_GET['com']=="templates_ds") {include ('modul/panel/rp_template_ds.php');}
					  elseif ($_GET['com']=="box_front") {include ('modul/panel/rp_template_ds.php');}
					  elseif ($_GET['com']=="tlogo") {include ('modul/panel/rp_template_ds.php');}
					  elseif ($_GET['com']=="right_panel") {include ('modul/panel/rp_template_ds.php');}
					  elseif ($_GET['com']=="inspired_you") {include ('modul/panel/rp_template_ds.php');}
					  elseif ($_GET['com']=="shop_category") {include ('modul/panel/rp_template_ds.php');}
					  elseif ($_GET['com']=="tabout") {include ('modul/panel/rp_template_ds.php');}
					  elseif ($_GET['com']=="tcontact") {include ('modul/panel/rp_template_ds.php');}
				  //include ('element/right_panel_dark.php');
				  } 
				  ?>
               </div>
            </div>