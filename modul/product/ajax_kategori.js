// JavaScript Document
var xmlHttp = false;

function createXmlHttpRequest_kat() {
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
	
function show_kat(kat) {
	xmlHttp = createXmlHttpRequest_kat();
	
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0) {
		
			//var url = "http://localhost/jagathita-m/res/ajax_organisasi.php";
			var url = "modul/product/ajax_kategori.php";
			
			
	
		url = url+"?get_kat="+kat;
		xmlHttp.onreadystatechange = handleRespon_kat;
		xmlHttp.open("GET", url, true)
		xmlHttp.send(null)
		}
		else {
			setTimeout ('show_kat(kat)', 1000);
			}
	}
	
function handleRespon_kat() {
	if (xmlHttp.readyState == 4) {
		if (xmlHttp.status == 200) {
			document.getElementById ('result_kat'). innerHTML = xmlHttp.responseText;
			//CKEDITOR.replace( 'description' );
			//CKEDITOR.replace( 'complainx' );
			//jQuery('#item_rekening').select2();
			//show_peng();
        
			//jQuery('#sprop_org').select2();
			return false;
			}
			else {
				alert ("Terjadi Kesalahan, Periksa jaringan Internet anda= "+xmlHttp.statusText);
				}
		}
	}
	