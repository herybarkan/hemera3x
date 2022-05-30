// JavaScript Document
var xmlHttp = false;

function createXmlHttpRequest_sku() {
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
	
function show_sku(spl,col,siz) {
	xmlHttp = createXmlHttpRequest_sku();
	
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0) {
		
			//var url = "http://localhost/jagathita-m/res/ajax_organisasi.php";
			var url = "modul/product/kode_sku.php";
			
			
	
		url = url+"?get_spl="+spl
		+"&get_col="+col
		+"&get_siz="+siz;
		xmlHttp.onreadystatechange = handleRespon_sku;
		xmlHttp.open("GET", url, true)
		xmlHttp.send(null)
		}
		else {
			setTimeout ('show_sku(spl,col,siz)', 1000);
			}
	}
	
function handleRespon_sku() {
	if (xmlHttp.readyState == 4) {
		if (xmlHttp.status == 200) {
			document.getElementById ('result_sku'). innerHTML = xmlHttp.responseText;
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
	