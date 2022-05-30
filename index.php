<?php
ob_start();
session_start();

error_reporting(0);
@ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Hemera Partner</title>
      <meta charset="utf-8">
      <meta content="ie=edge" http-equiv="x-ua-compatible">
      <meta content="template language" name="keywords">
      <meta content="hemera partner" name="author">
      <meta content="Hemera Partner" name="description">
      <meta content="width=device-width,initial-scale=1" name="viewport">
      <link href="favicon.png" rel="shortcut icon">
      <link href="apple-touch-icon.png" rel="apple-touch-icon">
      <!-- <link href="http://fast.fonts.net/cssapi/487b73f1-c2d1-43db-8526-db577e4c822b.css" rel="stylesheet"> -->
      <?php
      //
      include('element/list_css.php');
      ?>
   </head>
   <?php
   //echo $_SESSION['HEM_kd_user'];
   
   if ($_SESSION['HEM_kd_user']=="") 
   { 
   	include('modul/login/login.php');
   } elseif ($_SESSION['HEM_kd_user']!="") 
   {  ?>
   
   <?php //echo $_SESSION['HEM_kd_ds']; ?>
   
   <body class="menu-position-side menu-side-left full-screen with-content-panel">
   
      <div class="all-wrapper with-side-panel solid-bg-all">
         <?php
         //
         //include ('element/modal.php');
         //include ('element/search.php');
         include ('modul/menu/menu_mobile.php');
         include ('element/left_menu.php');
         include ('element/content.php');
         ?>
         </div>
         <div class="display-type"></div>
      </div>
      <?php
      //
      include('element/list_js.php');
      ?>
      <form action="modul/dropshipper/set_area.php" method="post">
      <div aria-labelledby="exampleModalLabel" class="modal fade" id="exampleModal1" role="dialog" tabindex="-1" aria-hidden="true" style="display: none;">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Setting Supplier</h5>
                                       <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
                                    </div>
                                    <div class="modal-body">
                                       
                                          <div class="form-group"><label for=""> Anda wajib melakukan setting Supplier dan menentukan Markup harga jual</label></div>
                                          <hr>
                                          <div class="row">
                                             <div class="col-sm-12">
                                             <input name="hf_kd_ds" type="hidden" value="<?php echo $_SESSION['HEM_kd_ds']; ?>">
                                                <div class="form-group"><label for=""> Area Supplier <br><small>pilih area produk dari suplier terdekat, karena akan mempengaruhi ongkir</small></label>
 <select name="sarea" class="form-control">
 <option> Pilih Area Supplier</option>
 <option value="BARAT"> Barat (Jakarta) </option>
 <option value="BARAT"> Timur (Bali) </option>
 </select>                                               
                                                </div>
                                             </div>
                                             <div class="col-sm-12">
                                                <div class="form-group"><label for="">Persentase Markup harga jual<br>
                                                <small>contoh 20% anda cukup ketik angka 20</small></label>
                                                <input class="form-control" type="number" name="markup"></div>
                                             </div>
                                          </div>
                                       
                                    </div>
                                    <div class="modal-footer"><button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button><button class="btn btn-primary" type="submit"> Save changes</button></div>
                                 </div>
                              </div>
                           </div>
                           </form>
   </body>
   <?php } ?>
   <script>
	$('#modal-detailx').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var modal = $(this)
            var title = button.data('title') 
            var href = button.attr('href') 
            //modal.find('.modal-title').html(title)
            modal.find('.modal-body').html('<i class=\"fa fa-spinner fa-spin\"></i>')
            $.post(href)
                .done(function( data ) {
                    modal.find('.modal-body').html(data)
                });
            })
			
	//=====================================================================================
	$('#modal-detailz').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var modal = $(this)
            var title = button.data('title') 
            var href = button.attr('href') 
            //modal.find('.modal-title').html(title)
            modal.find('.modal-body').html('<i class=\"fa fa-spinner fa-spin\"></i>')
            $.post(href)
                .done(function( data ) {
                    modal.find('.modal-content').html(data)
                });
            })
	</script>
    
     <script>
$('.bd-example-modal-lg').on('show.bs.modal', function (event) {
			

            var button = $(event.relatedTarget)
            var modal = $(this)
            var title = button.data('title') 
            var href = button.attr('href') 
            //modal.find('.modal-title').html(title)
            modal.find('.modal-body').html('<i class=\"fa fa-spinner fa-spin\"></i>')
            $.post(href)
                .done(function( data ) {
					//$('#summernote-basic').summernote();
					//$('#catatan').summernote();
                    modal.find('.modal-body').html(data);	
					
					//$("#default-example-modal-lg").on("shown.bs.modal", function() {
					//$('#datepicker-modal-2').datepicker();
					//$('#datepicker-modal-3').datepicker();
					//});

					//jQuery('#tgl_start').datepicker();
					//$('#sunit_usaha2[]').select2();
                });
				
				
            })
			
$('.bdx-example-modal-lg').on('show.bs.modal', function (event) {
		    
			var button = $(event.relatedTarget)
            var modal = $(this)
            var title = button.data('title') 
            var href = button.attr('href') 
            modal.find('.modal-body').html('<i class=\"fa fa-spinner fa-spin\"></i>')
            $.post(href)
                .done(function( data ) {
					
                    modal.find('.modal-body').html(data);	
					//$('.bd-example-modal-lg').modal('toggle');

					
                });
				
				
            })
			
			//var $body = $('body');
			//var target = $(e.target);
			
$('.bdx-example-modal-lg').on('hide.bs.modal', function (event) {
		    
			//$('.bd-example-modal-lg').modal('show');
			//$('.bdx-example-modal-lg').modal(
				//{
  					//keyboard: false
					//focus: true
					//$(this).removeData('bs.modal');

				//})

			//$(this).removeData('.bdx-example-modal-lg');
			//$body.removeClass('.bdx-example-modal-lg');
			
			//$(this).removeClass('modal');
			//$(this).removeData('.bdx-example-modal-lg').html();
			
  			//target.removeData('bs.modal').find(".modal-content").html('')
			//$(this).removeData('bs.modal').children().remove();
			
			setTimeout(function(){
           $("[data-dismiss=modal]").trigger({ type: "click" });
 },100)




	        })
			

</script>
    
<script>
$(document).ready(function(){
    $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
        $('.modal-body').load(dataURL,function(){
            $('#myModal').modal({show:true});
			const uploader = new Dropzone('#my-awesome-dropzone');

        });
    }); 
	
	//=================================================================
	$('.openPopup2').on('click',function(){
        var dataURL = $(this).attr('data-href');
        $('.modal-content').load(dataURL,function(){
            $('#myModal').modal({show:true});
			//const uploader = new Dropzone('#my-awesome-dropzone');

        });
    }); 
	
	//=================================================================
	$('.openPopup3').on('click',function(){
        var dataURL = $(this).attr('data-href');
        $('.modal-content').load(dataURL,function(){
            $('#myModal').modal({show:true});
			const uploader = new Dropzone('#my-awesome-dropzone');

        });
    }); 
});
</script>
</html>