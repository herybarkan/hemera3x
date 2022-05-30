<!DOCTYPE html>
<html>
   <head>
      <title>Delivery Order</title>
      <meta charset="utf-8">
      <meta content="ie=edge" http-equiv="x-ua-compatible">
      <meta content="template language" name="keywords">
      <meta content="Tamerlan Soziev" name="author">
      <meta content="Admin dashboard html template" name="description">
      <meta content="width=device-width,initial-scale=1" name="viewport">
      <link href="../../favicon.png" rel="shortcut icon">
      <link href="../../apple-touch-icon.png" rel="apple-touch-icon">
      <!-- <link href="http://fast.fonts.net/cssapi/487b73f1-c2d1-43db-8526-db577e4c822b.css" rel="stylesheet"> -->
      <link href="../../bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
      <link href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
      <link href="../../bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
      <link href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
      <link href="../../bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
      <link href="../../bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
      <link href="../../bower_components/slick-carousel/slick/slick.css" rel="stylesheet">
      <link href="../../css/main-version=4.5.0.css" rel="stylesheet">
   </head>
<body>

<div class="element-wrapper">
                        <div class="element-box">
                           <h5 class="form-header">Bordered and Striped Table</h5>
                           <div class="form-desc">You can add class <code>.table-bordered</code>, <code>.table-striped</code> and <code>.table</code> to a table element to get striped table:</div>
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered">
                                 <thead>
                                    <tr>
                                       <th>Customer Name</th>
                                       <th>Orders</th>
                                       <th>Location</th>
                                       <th class="text-center">Status</th>
                                       <th class="text-right">Order Total</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>John Mayers</td>
                                       <td>12</td>
                                       <td><img alt="" src="../../img/flags-icons/us.png" width="25px"></td>
                                       <td class="text-center">
                                          <div class="status-pill green" data-title="Complete" data-toggle="tooltip"></div>
                                       </td>
                                       <td class="text-right">$354</td>
                                    </tr>
                                    <tr>
                                       <td>Kelly Brans</td>
                                       <td>45</td>
                                       <td><img alt="" src="../../img/flags-icons/ca.png" width="25px"></td>
                                       <td class="text-center">
                                          <div class="status-pill red" data-title="Cancelled" data-toggle="tooltip"></div>
                                       </td>
                                       <td class="text-right">$94</td>
                                    </tr>
                                    <tr>
                                       <td>Tim Howard</td>
                                       <td>112</td>
                                       <td><img alt="" src="../../img/flags-icons/uk.png" width="25px"></td>
                                       <td class="text-center">
                                          <div class="status-pill green" data-title="Complete" data-toggle="tooltip"></div>
                                       </td>
                                       <td class="text-right">$156</td>
                                    </tr>
                                    <tr>
                                       <td>Joe Trulli</td>
                                       <td>1,256</td>
                                       <td><img alt="" src="../../img/flags-icons/es.png" width="25px"></td>
                                       <td class="text-center">
                                          <div class="status-pill yellow" data-title="Pending" data-toggle="tooltip"></div>
                                       </td>
                                       <td class="text-right">$1,120</td>
                                    </tr>
                                    <tr>
                                       <td>Fred Kolton</td>
                                       <td>74</td>
                                       <td><img alt="" src="../../img/flags-icons/fr.png" width="25px"></td>
                                       <td class="text-center">
                                          <div class="status-pill green" data-title="Complete" data-toggle="tooltip"></div>
                                       </td>
                                       <td class="text-right">$74</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     
 <script src="../../bower_components/jquery/dist/jquery.min.js"></script><script src="../../bower_components/popper.js/dist/umd/popper.min.js"></script><script src="../../bower_components/moment/moment.js"></script><script src="../../bower_components/chart.js/dist/Chart.min.js"></script><script src="../../bower_components/select2/dist/js/select2.full.min.js"></script><script src="../../bower_components/jquery-bar-rating/dist/jquery.barrating.min.js"></script><script src="../../bower_components/ckeditor/ckeditor.js"></script><script src="../../bower_components/bootstrap-validator/dist/validator.min.js"></script><script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script><script src="../../bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js"></script><script src="../../bower_components/dropzone/dist/dropzone.js"></script><script src="../../bower_components/editable-table/mindmup-editabletable.js"></script><script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script><script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script><script src="../../bower_components/fullcalendar/dist/fullcalendar.min.js"></script><script src="../../bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script><script src="../../bower_components/tether/dist/js/tether.min.js"></script><script src="../../bower_components/slick-carousel/slick/slick.min.js"></script><script src="../../bower_components/bootstrap/js/dist/util.js"></script><script src="../../bower_components/bootstrap/js/dist/alert.js"></script><script src="../../bower_components/bootstrap/js/dist/button.js"></script><script src="../../bower_components/bootstrap/js/dist/carousel.js"></script><script src="../../bower_components/bootstrap/js/dist/collapse.js"></script><script src="../../bower_components/bootstrap/js/dist/dropdown.js"></script><script src="../../bower_components/bootstrap/js/dist/modal.js"></script><script src="../../bower_components/bootstrap/js/dist/tab.js"></script><script src="../../bower_components/bootstrap/js/dist/tooltip.js"></script><script src="../../bower_components/bootstrap/js/dist/popover.js"></script><script src="../../js/demo_customizer-version=4.5.0.js"></script><script src="../../js/main-version=4.5.0.js"></script>
   </body>
</html>