<?php
//$email = $xemail;
$xemail = "herybarkan@gmail.com";
$to = $xemail; 
$subject = "Verifikasi Akun". $xemail;

$headers = "From:demo@jvmediastudio.com";
$headers .= "\r\nReply-To:{$xemail}";
$headers .= "\r\nContent-Type: text/html; charset=UTF-8";
$headers .= "\r\nMIME-Version: 1.0";

         $message = '<html xmlns="http://www.w3.org/1999/xhtml"><head><title>Preview Fullscreen</title><style type="text/css" media="screen">'.
'	body { padding:0 !important; margin:0 auto !important; display:block !important; min-width:100% !important; width:100% !important; background:#f4ecfa; -webkit-text-size-adjust:none }'.
'	a { color:#f3189e; text-decoration:none }'.
'	p { padding:0 !important; margin:0 !important } '.
'	img { margin: 0 !important; -ms-interpolation-mode: bicubic; /* Allow smoother rendering of resized image in Internet Explorer */ }'.
'		a[x-apple-data-detectors] { color: inherit !important; text-decoration: inherit !important; font-size: inherit !important; font-family: inherit !important; font-weight: inherit !important; line-height: inherit !important; }'.
'	'.
'	.btn-16 a { display: block; padding: 15px 35px; text-decoration: none; }'.
'	.btn-20 a { display: block; padding: 15px 35px; text-decoration: none; }'.
'		.l-white a { color: #ffffff; }'.
'	.l-black a { color: #282828; }'.
'	.l-pink a { color: #f3189e; }'.
'	.l-grey a { color: #6e6e6e; }'.
'	.l-purple a { color: #9128df; }'.
'		.gradient { background: linear-gradient(to right, #9028df 0%,#f3189e 100%); }'.
'		.btn-secondary { border-radius: 10px; background: linear-gradient(to right, #9028df 0%,#f3189e 100%); }'.
'				'.
'	/* Mobile styles */'.
'	@media only screen and (max-device-width: 480px), only screen and (max-width: 480px) {'.
'		.mpx-10 { padding-left: 10px !important; padding-right: 10px !important; }'.
'			.mpx-15 { padding-left: 15px !important; padding-right: 15px !important; }'.
'			u + .body .gwfw { width:100% !important; width:100vw !important; }'.
'			.td,'.
'		.m-shell { width: 100% !important; min-width: 100% !important; }'.
'		'.
'		.mt-left { text-align: left !important; }'.
'		.mt-center { text-align: center !important; }'.
'		.mt-right { text-align: right !important; }'.
'		'.
'		.me-left { margin-right: auto !important; }'.
'		.me-center { margin: 0 auto !important; }'.
'		.me-right { margin-left: auto !important; }'.
'			.mh-auto { height: auto !important; }'.
'		.mw-auto { width: auto !important; }'.
'			.fluid-img img { width: 100% !important; max-width: 100% !important; height: auto !important; }'.
'			.column,'.
'		.column-top,'.
'		.column-dir-top { float: left !important; width: 100% !important; display: block !important; }'.
'			.m-hide { display: none !important; width: 0 !important; height: 0 !important; font-size: 0 !important; line-height: 0 !important; min-height: 0 !important; }'.
'		.m-block { display: block !important; }'.
'			.mw-15 { width: 15px !important; }'.
'			.mw-2p { width: 2% !important; }'.
'		.mw-32p { width: 32% !important; }'.
'		.mw-49p { width: 49% !important; }'.
'		.mw-50p { width: 50% !important; }'.
'		.mw-100p { width: 100% !important; }'.
'			.mmt-0 { margin-top: 0 !important; }'.
'	}'.
'			</style>'.
'</head><body><center>'.
'	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin: 0; padding: 0; width: 100%; height: 100%;" data-bgcolor="Body" bgcolor="#f4ecfa" class="gwfw">'.
'		<tbody><tr>'.
'			<td style="margin: 0; padding: 0; width: 100%; height: 100%;" align="center" valign="top">'.
'				<!-- Top -->'.
'				<table width="100%" border="0" cellspacing="0" cellpadding="0" data-thumbnail="https://www.psd2newsletters.com/templates/purple/thumbnails/top.jpg" data-module="Top">'.
'					<tbody><tr>'.
'						<td align="center" valign="top" data-bgcolor="Body" data-primary-order="1" data-primary-type="bgcolor" bgcolor="#f4ecfa">'.
'							<table width="600" border="0" cellspacing="0" cellpadding="0" class="m-shell">'.
'								<tbody><tr>'.
'									<td class="td" style="width:600px; min-width:600px; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">'.
'										<table width="100%" border="0" cellspacing="0" cellpadding="0">'.
'											<tbody><tr>'.
'												<td class="mpx-10">'.
'													<table width="100%" border="0" cellspacing="0" cellpadding="0">'.
'												<tbody><tr>'.
'													<td data-bgcolor="Top" data-color="text-color-top" data-size="text-size-top" data-min="12" data-max="36" class="text-12 c-grey l-grey a-right py-20" style="font-size:12px; line-height:16px; font-family:\'PT Sans\', Arial, sans-serif; min-width:auto !important; color:#6e6e6e; text-align:right; padding-top: 20px; padding-bottom: 20px;">'.
'														<a href="*|view_online|*" target="_blank" class="link c-grey" style="text-decoration:none; color:#6e6e6e;"><span class="link c-grey" style="text-decoration:none; color:#6e6e6e;">View this email in your browser</span></a>'.
'													</td>'.
'												</tr>'.
'											</tbody></table>													</td>'.
'											</tr>'.
'										</tbody></table>'.
'									</td>'.
'								</tr>'.
'							</tbody></table>'.
'						</td>'.
'					</tr>'.
'				</tbody></table>'.
'				<!-- END Top -->'.
'					<!-- Logo -->'.
'				<table width="100%" border="0" cellspacing="0" cellpadding="0" data-thumbnail="https://www.psd2newsletters.com/templates/purple/thumbnails/logo.jpg" data-module="Logo">'.
'					<tbody><tr>'.
'						<td align="center" valign="top" data-bgcolor="Body" data-primary-order="1" data-primary-type="bgcolor" bgcolor="#f4ecfa">'.
'							<table width="600" border="0" cellspacing="0" cellpadding="0" class="m-shell">'.
'								<tbody><tr>'.
'									<td class="td" style="width:600px; min-width:600px; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">'.
'										<table width="100%" border="0" cellspacing="0" cellpadding="0">'.
'											<tbody><tr>'.
'												<td class="mpx-10">'.
'													<table width="100%" border="0" cellspacing="0" cellpadding="0">'.
'														<tbody><tr>'.
'															<td class="gradient pt-10" style="border-radius: 10px 10px 0 0; padding-top: 10px;" data-bgcolor="Logo" bgcolor="#f3189e">'.
'																<table width="100%" border="0" cellspacing="0" cellpadding="0">'.
'																	<tbody><tr>'.
'																		<td class="img-center p-30 px-15" style="border-radius: 10px 10px 0 0; font-size:0pt; line-height:0pt; text-align:center; padding: 30px; padding-left: 15px; padding-right: 15px;" data-bgcolor="bgcolor" bgcolor="#ffffff">'.
'																			<a href="#" target="_blank"><h4>HEMERA PARTNER</h4></a>'.
'																		</td>'.
'																	</tr>'.
'																</tbody></table>'.
'															</td>'.
'														</tr>'.
'													</tbody></table>'.
'												</td>'.
'											</tr>'.
'										</tbody></table>'.
'									</td>'.
'								</tr>'.
'							</tbody></table>'.
'						</td>'.
'					</tr>'.
'				</tbody></table>'.
'				<!-- END Logo -->'.
'					<!-- Intro -->'.
'				<table width="100%" border="0" cellspacing="0" cellpadding="0" data-thumbnail="https://www.psd2newsletters.com/templates/purple/thumbnails/intro-verification.jpg" data-module="Intro">'.
'					<tbody><tr>'.
'						<td align="center" valign="top" data-bgcolor="Body" data-primary-order="1" data-primary-type="bgcolor" bgcolor="#f4ecfa">'.
'							<table width="600" border="0" cellspacing="0" cellpadding="0" class="m-shell">'.
'								<tbody><tr>'.
'									<td class="td" style="width:600px; min-width:600px; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">'.
'										<table width="100%" border="0" cellspacing="0" cellpadding="0">'.
'											<tbody><tr>'.
'												<td class="mpx-10">'.
'													<table width="100%" border="0" cellspacing="0" cellpadding="0">'.
'														<tbody><tr>'.
'															<td class="py-25 px-50 mpx-15" data-bgcolor="Intro" bgcolor="#ffffff" style="padding-top: 25px; padding-bottom: 25px; padding-left: 50px; padding-right: 50px;">'.
'																<table width="100%" border="0" cellspacing="0" cellpadding="0">'.
'																	<tbody><tr>'.
'																		<td class="fluid-img img-center pb-50" style="font-size:0pt; line-height:0pt; text-align:center; padding-bottom: 50px;">'.
'																			<img data-crop="false" src="https://www.psd2newsletters.com/templates/purple/images/img_intro_2.png" width="253" height="300" border="0" alt="">'.
'																		</td>'.
'																	</tr>'.
'																	<tr>'.
'																		<td data-color="title-color-36" data-size="title-size-36" data-min="12" data-max="36" class="title-36 a-center pb-15" style="font-size:36px; line-height:40px; color:#282828; font-family:\'PT Sans\', Arial, sans-serif; min-width:auto !important; text-align:center; padding-bottom: 15px;">'.
'																			<strong>Verify Your Email Account</strong>'.
'																		</td>'.
'																	</tr>'.
'																	<tr>'.
'																		<td data-color="text-color-16" data-size="text-size-16" data-min="12" data-max="36" class="text-16 lh-26 a-center pb-25" style="font-size:16px; color:#6e6e6e; font-family:\'PT Sans\', Arial, sans-serif; min-width:auto !important; line-height: 26px; text-align:center; padding-bottom: 25px;">'.
'																			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'.
'																		</td>'.
'																	</tr>'.
'																	<tr>'.
'																		<td align="center">'.
'																			<!-- Button -->'.
'																			<table border="0" cellspacing="0" cellpadding="0" style="min-width: 200px;">'.
'																				<tbody><tr>'.
'																					 <td data-bgcolor="btn-color" data-color="btn-color" data-border-color="" data-border-size="btn-border" data-border-size-min="0" data-border-size-max="3" data-size="btn-size" data-min="12" data-max="36" class="btn-16 c-white l-white" bgcolor="#f3189e" style="font-size:16px; line-height:20px; mso-padding-alt:15px 35px; font-family:\'PT Sans\', Arial, sans-serif; text-align:center; font-weight:bold; text-transform:uppercase; border-radius:25px; min-width:auto !important; color:#ffffff;">'.
'																						<a href="#" target="_blank" class="link c-white" style="display: block; padding: 15px 35px; text-decoration:none; color:#ffffff;">'.
'																							<span class="link c-white" style="text-decoration:none; color:#ffffff;">SUBSCRIBE NOW</span>'.
'																						</a>'.
'																					</td>'.
'																				</tr>'.
'																			</tbody></table>'.
'																			<!-- END Button -->'.
'																		</td>'.
'																	</tr>'.
'																</tbody></table>'.
'															</td>'.
'														</tr>'.
'													</tbody></table>'.
'												</td>'.
'											</tr>'.
'										</tbody></table>'.
'									</td>'.
'								</tr>'.
'							</tbody></table>'.
'						</td>'.
'					</tr>'.
'				</tbody></table>'.
'				<!-- END Intro -->'.
'					<!-- Spacer 25px -->'.
'				<table width="100%" border="0" cellspacing="0" cellpadding="0" data-thumbnail="https://www.psd2newsletters.com/templates/purple/thumbnails/spacer-25.jpg" data-module="Spacer 25px">'.
'					<tbody><tr>'.
'						<td align="center" valign="top" data-bgcolor="Body" data-primary-order="1" data-primary-type="bgcolor" bgcolor="#f4ecfa">'.
'							<table width="600" border="0" cellspacing="0" cellpadding="0" class="m-shell">'.
'								<tbody><tr>'.
'									<td class="td" style="width:600px; min-width:600px; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">'.
'										<table width="100%" border="0" cellspacing="0" cellpadding="0">'.
'											<tbody><tr>'.
'												<td class="mpx-10">'.
'													<table width="100%" border="0" cellspacing="0" cellpadding="0">'.
'														<tbody><tr>'.
'															<td class="img" height="25" data-height="Spacer 25px" data-height-min="1" data-height-max="50" data-bgcolor="Spacer 25px" bgcolor="#ffffff" style="font-size:0pt; line-height:0pt; text-align:left;">&nbsp;</td>'.
'														</tr>'.
'													</tbody></table>'.
'												</td>'.
'											</tr>'.
'										</tbody></table>'.
'									</td>'.
'								</tr>'.
'							</tbody></table>'.
'						</td>'.
'					</tr>'.
'				</tbody></table>'.
'				<!-- END Spacer 25px -->'.
'					<!-- Footer -->'.
'				<table width="100%" border="0" cellspacing="0" cellpadding="0" data-thumbnail="https://www.psd2newsletters.com/templates/purple/thumbnails/footer.jpg" data-module="Footer">'.
'					<tbody><tr>'.
'						<td align="center" valign="top" data-bgcolor="Body" data-primary-order="1" data-primary-type="bgcolor" bgcolor="#f4ecfa">'.
'							<table width="600" border="0" cellspacing="0" cellpadding="0" class="m-shell">'.
'								<tbody><tr>'.
'									<td class="td" style="width:600px; min-width:600px; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">'.
'										<table width="100%" border="0" cellspacing="0" cellpadding="0">'.
'											<tbody><tr>'.
'												<td class="mpx-10">'.
'													<table width="100%" border="0" cellspacing="0" cellpadding="0">'.
'												<tbody><tr>'.
'													<td data-bgcolor="Footer" class="p-50 mpx-15" bgcolor="#949196" style="border-radius: 0 0 10px 10px; padding: 50px;">'.
'														<table width="100%" border="0" cellspacing="0" cellpadding="0">'.
'															<tbody><tr>'.
'																<td align="center" class="pb-20" style="padding-bottom: 20px;">'.
'																	<!-- Socials -->'.
'																	<table border="0" cellspacing="0" cellpadding="0">'.
'																		<tbody><tr>'.
'																			<td class="img" width="34" style="font-size:0pt; line-height:0pt; text-align:left;">'.
'																				<a href="#" target="_blank"><img src="https://www.psd2newsletters.com/templates/purple/images/ico_facebook.png" width="34" height="34" border="0" alt=""></a>'.
'																			</td>'.
'																			<td class="img" width="15" style="font-size:0pt; line-height:0pt; text-align:left;"></td>'.
'																			<td class="img" width="34" style="font-size:0pt; line-height:0pt; text-align:left;">'.
'																				<a href="#" target="_blank"><img src="https://www.psd2newsletters.com/templates/purple/images/ico_instagram.png" width="34" height="34" border="0" alt=""></a>'.
'																			</td>'.
'																			<td class="img" width="15" style="font-size:0pt; line-height:0pt; text-align:left;"></td>'.
'																			<td class="img" width="34" style="font-size:0pt; line-height:0pt; text-align:left;">'.
'																				<a href="#" target="_blank"><img src="https://www.psd2newsletters.com/templates/purple/images/ico_twitter.png" width="34" height="34" border="0" alt=""></a>'.
'																			</td>'.
'																			<td class="img" width="15" style="font-size:0pt; line-height:0pt; text-align:left;"></td>'.
'																			<td class="img" width="34" style="font-size:0pt; line-height:0pt; text-align:left;">'.
'																				<a href="#" target="_blank"><img src="https://www.psd2newsletters.com/templates/purple/images/ico_pinterest.png" width="34" height="34" border="0" alt=""></a>'.
'																			</td>'.
'																		</tr>'.
'																	</tbody></table>'.
'																	<!-- END Socials -->'.
'																</td>'.
'															</tr>'.
'															<tr>'.
'																<td data-color="text-color-footer" data-size="text-size-footer" data-min="12" data-max="36" class="text-14 lh-24 a-center c-white l-white pb-20" style="font-size:14px; font-family:\'PT Sans\', Arial, sans-serif; min-width:auto !important; line-height: 24px; text-align:center; color:#ffffff; padding-bottom: 20px;">'.
'																	Address name St. 12, City Name, State, Country Name'.
'																	<br>'.
'																	<a href="tel:+17384796719" target="_blank" class="link c-white" style="text-decoration:none; color:#ffffff;"><span class="link c-white" style="text-decoration:none; color:#ffffff;">(738) 479-6719</span></a> - <a href="tel:+13697181973" target="_blank" class="link c-white" style="text-decoration:none; color:#ffffff;"><span class="link c-white" style="text-decoration:none; color:#ffffff;">(369) 718-1973</span></a>'.
'																	<br>'.
'																	<a href="mailto:info@website.com" target="_blank" class="link c-white" style="text-decoration:none; color:#ffffff;"><span class="link c-white" style="text-decoration:none; color:#ffffff;">info@website.com</span></a> - <a href="www.website.com" target="_blank" class="link c-white" style="text-decoration:none; color:#ffffff;"><span class="link c-white" style="text-decoration:none; color:#ffffff;">www.website.com</span></a>'.
'																</td>'.
'															</tr>'.
'														</tbody></table>'.
'													</td>'.
'												</tr>'.
'											</tbody></table>													</td>'.
'											</tr>'.
'										</tbody></table>'.
'									</td>'.
'								</tr>'.
'							</tbody></table>'.
'						</td>'.
'					</tr>'.
'				</tbody></table>'.
'				<!-- END Footer -->'.
'					<!-- Bottom -->'.
'				<table width="100%" border="0" cellspacing="0" cellpadding="0" data-thumbnail="https://www.psd2newsletters.com/templates/purple/thumbnails/bottom.jpg" data-module="Bottom">'.
'					<tbody><tr>'.
'						<td align="center" valign="top" data-bgcolor="Body" data-primary-order="1" data-primary-type="bgcolor" bgcolor="#f4ecfa">'.
'							<table width="600" border="0" cellspacing="0" cellpadding="0" class="m-shell">'.
'								<tbody><tr>'.
'									<td class="td" style="width:600px; min-width:600px; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">'.
'										<table width="100%" border="0" cellspacing="0" cellpadding="0">'.
'											<tbody><tr>'.
'												<td class="mpx-10">'.
'													<table width="100%" border="0" cellspacing="0" cellpadding="0">'.
'												<tbody><tr>'.
'													<td data-bgcolor="Bottom" data-color="text-color-bottom" data-size="text-size-bottom" data-min="12" data-max="36" class="text-12 lh-22 a-center c-grey- l-grey py-20" style="font-size:12px; color:#6e6e6e; font-family:\'PT Sans\', Arial, sans-serif; min-width:auto !important; line-height: 22px; text-align:center; padding-top: 20px; padding-bottom: 20px;">'.
'														<a href="*|unsubscribe|*" target="_blank" class="link c-grey" style="text-decoration:none; color:#6e6e6e;"><span class="link c-grey" style="white-space: nowrap; text-decoration:none; color:#6e6e6e;">UNSUBSCRIBE</span></a> &nbsp;|&nbsp; <a href="*|view_online|*" target="_blank" class="link c-grey" style="text-decoration:none; color:#6e6e6e;"><span class="link c-grey" style="white-space: nowrap; text-decoration:none; color:#6e6e6e;">WEB VERSION</span></a> &nbsp;|&nbsp; <a href="#" target="_blank" class="link c-grey" style="text-decoration:none; color:#6e6e6e;"><span class="link c-grey" style="white-space: nowrap; text-decoration:none; color:#6e6e6e;">SEND TO A FRIEND</span></a>'.
'													</td>'.
'												</tr>'.
'											</tbody></table>													</td>'.
'											</tr>'.
'										</tbody></table>'.
'									</td>'.
'								</tr>'.
'							</tbody></table>'.
'						</td>'.
'					</tr>'.
'				</tbody></table>'.
'				<!-- END Bottom -->'.
'			</td>'.
'		</tr>'.
'	</tbody></table>'.
'</center>'.
''.
'/body></html>';

         //$message .= "<h1>This is headline.</h1>";
         
         $header = "From:system@hemerapartner.com \r\n";
         //$header .= "Cc:afgh@somedomain.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         //$retval = mail ($to,$subject,$message,$header);

		$retval = mail($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully..."; $xsts="success";
         }else {
            echo "Message could not be sent..."; $xsts="fail";
         }
?>