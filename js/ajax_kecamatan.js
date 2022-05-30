// JavaScript Document
var xmlHttp = false;

function createXmlHttpRequest_kec() {
	var xmlHttp = false;
	if (window.ActiveXObject) {
		xmlHttp = new ActiveXObject ("Microsoft.XMLHTTP");
		}
		else {
			xmlHttp = new XMLHttpRequest();
			}
	if (!xmlHttp) {
		alert ("Ajax Error");
		}
		return xmlHttp;
	}
	
function show_kec(kec) {
	xmlHttp = createXmlHttpRequest_kec();
	
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0) {
		
			//var url = "http://localhost/jagathita-m/res/ajax_kecamatan.php";
			var url = "modul/ajax/ajax_kecamatan.php";
			
			
	
		url = url+"?get_kec="+kec;
		xmlHttp.onreadystatechange = handleRespon_kec;
		xmlHttp.open("GET", url, true)
		xmlHttp.send(null)
		}
		else {
			setTimeout ('show_kec(kec)', 1000);
			}
	}
	
function handleRespon_kec() {
	if (xmlHttp.readyState == 4) {
		if (xmlHttp.status == 200) {
			document.getElementById ('result_kec'). innerHTML = xmlHttp.responseText;
			//CKEDITOR.replace( 'description' );
			//CKEDITOR.replace( 'complainx' );
			jQuery('#skec').select2();
			show_kel();
			return false;
			}
			else {
				alert ("Error Monjer= "+xmlHttp.statusText);
				}
		}
	}
	