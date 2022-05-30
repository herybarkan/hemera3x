<div class="content-i" >
                  <div class="content-box" >
                     <div class="big-error-w" style="width:80%; margin-top:-20px;">
                        <!--<h1>500</h1>-->
                        <i class="fa fa-globe fa-5x"></i>
                        <h5>Setting Domain</h5>
                        <h4>Cek Domain Available disini</h4>
                        <!--<form method="POST" action="#" id="fsearch" name="fsearch">
                           <div class="input-group">
                              <input class="form-control" placeholder="Masukan nama domain lalu klik Cek" type="text" id="nm_domain" name="nm_domain ">
                              <!--<div class="input-group-btn">-->
                              <!--<button class="btn btn-primary">Cek</button>-->
                              <!--</div>-->
                           <!--</div>
                        </form>-->
                        
            <form method="post" action="">
			<label>Domain Name : </label>
			<input type="hidden" value="74e1b6d17a204c8a8c8ede0f2ff1470cb060edcc" name="token"></input>
			<input type="hidden" value="true" name="direct"></input>
            
            <div class="input-group">
            <!--<div class="col-9">-->
			<input  placeholder="Masukan nama domain lalu klik Cek" class="form-control" type="text" name="domain"></input>
            <!--</div>
            <div class="col-2">-->
			<select class="form-control" name="ext">
				<option value=".com">.com</option>
                <option value=".id">.id</option>
				<option value=".net">.net</option>
				<option value=".org">.org</option>
				<option value=".info">.info</option>
				<option value=".co.id">.co.id</option>
				<option value=".net.id">.net.id</option>
				<option value=".or.id">.or.id</option>
				<option value="biz.id">.biz.id</option>
				<option value=".ac.id">.ac.id</option>
				<option value=".sch.id">.sch.id</option>
				<option value=".web.id">.web.id</option>
				<option value="dasa.id">.dasa.id</option>
				<option value=".my.id">.my.id</option>
			</select>
            <!--</div>
            <div class="col-1">-->
			<input class="btn btn-primary" name="cek" type="submit" value="Cek"></input>
            <!--</div>-->
            </div>
		</form>
                    <br>
                    <?php
        if (isset($_POST['cek'])) {
            $nama_domain = "$_POST[domain]"."$_POST[ext]";
            $arrHost = @gethostbynamel("$nama_domain");
            if (empty($arrHost)) {
                echo "<div class='hasildomain font-green'>Domain <u><b>$nama_domain</b></u> tersedia, Anda dapat menggunakan domain ini.</div>";
            }
            else {
                echo "<div class='hasildomain font-red'>Domain <u><b>$nama_domain</b></u> sudah digunakan, coba dengan domain lain.</div>";
            }
        }
        ?>
                    
                     </div>
                    
                  </div>
               </div>