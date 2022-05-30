// JavaScript Document
var xmlHttp = false;

function createXmlHttpRequest_sldr() {
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
	
function show_sldr(sldr) {
	xmlHttp = createXmlHttpRequest_sldr();
	
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0) {
		
			//var url = "http://localhost/jagathita-m/res/ajax_propinsi.php";
			var url = "modul/ajax/ajax_slider.php";
	
		url = url+"?get_sldr="+sldr;
		xmlHttp.onreadystatechange = handleRespon_sldr;
		xmlHttp.open("GET", url, true)
		xmlHttp.send(null)
		}
		else {
			setTimeout ('show_sldr(sldr)', 1000);
			}
	}
	
function handleRespon_sldr() {
	if (xmlHttp.readyState == 4) {
		if (xmlHttp.status == 200) {
			document.getElementById ('result_sldr'). innerHTML = xmlHttp.responseText;
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
	