// JavaScript Document
var xmlHttp = false;

function createXmlHttpRequest_kab() {
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
	
function show_kab(kab) {
	xmlHttp = createXmlHttpRequest_kab();
	
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0) {
		
			//var url = "http://localhost/jagathita-m/res/ajax_kabupaten.php";
			var url = "modul/ajax/ajax_kabupaten.php";
			
			
	
		url = url+"?get_kab="+kab;
		xmlHttp.onreadystatechange = handleRespon_kab;
		xmlHttp.open("GET", url, true)
		xmlHttp.send(null)
		}
		else {
			setTimeout ('show_kab(kab)', 1000);
			}
	}
	
function handleRespon_kab() {
	if (xmlHttp.readyState == 4) {
		if (xmlHttp.status == 200) {
			document.getElementById ('result_kab'). innerHTML = xmlHttp.responseText;
			//CKEDITOR.replace( 'description' );
			//CKEDITOR.replace( 'complainx' );
			jQuery('#skab').select2();
			//show_kec();
			return false;
			}
			else {
				alert ("Error Monjer= "+xmlHttp.statusText);
				}
		}
	}
	