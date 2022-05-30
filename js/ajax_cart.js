// JavaScript Document
var xmlHttp = false;

function createXmlHttpRequest_cart() {
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
	
function show_cart(kdds,kdvis,kdpro) {
	xmlHttp = createXmlHttpRequest_cart();
	
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0) {
		
			//var url = "http://localhost/jagathita-m/res/ajax_kabupaten.php";
			var url = "modul/ajax/ajax_cart.php";
			
			
	
		url = url+"?get_kdds="+kdds
				 +"&get_kdvis="+kdvis
				 +"&get_kdpro="+kdpro
		;
		xmlHttp.onreadystatechange = handleRespon_cart;
		xmlHttp.open("GET", url, true)
		xmlHttp.send(null)
		}
		else {
			setTimeout ('show_cart(kdds,kdvis,kdpro)', 1000);
			}
	}
	
function handleRespon_cart() {
	if (xmlHttp.readyState == 4) {
		if (xmlHttp.status == 200) {
			document.getElementById ('result_cart'). innerHTML = xmlHttp.responseText;
			//CKEDITOR.replace( 'description' );
			//CKEDITOR.replace( 'complainx' );
			//jQuery('#skab').select2();
			//show_kec();
			return false;
			}
			else {
				alert ("Error Monjer= "+xmlHttp.statusText);
				}
		}
	}
	