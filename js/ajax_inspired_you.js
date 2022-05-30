// JavaScript Document
var xmlHttp = false;

function createXmlHttpRequest_iy() {
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
	
function show_iy(iy) {
	xmlHttp = createXmlHttpRequest_iy();
	
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0) {
		
			//var url = "http://localhost/jagathita-m/res/ajax_propinsi.php";
			var url = "modul/ajax/ajax_inspired_you.php";
	
		url = url+"?get_iy="+iy;
		xmlHttp.onreadystatechange = handleRespon_iy;
		xmlHttp.open("GET", url, true)
		xmlHttp.send(null)
		}
		else {
			setTimeout ('show_iy(iy)', 1000);
			}
	}
	
function handleRespon_iy() {
	if (xmlHttp.readyState == 4) {
		if (xmlHttp.status == 200) {
			document.getElementById ('result_iy'). innerHTML = xmlHttp.responseText;
			//CKEDITOR.replace( 'description' );
			//CKEDITOR.replace( 'complainx' );
			//jQuery('#sprop').select2();
			//show_kab();
			//jQuery('#sprop_org').select2();
			return false;
			}
			else {
				alert ("Error Monjer= "+xmlHttp.statusText);
				}
		}
	}
	