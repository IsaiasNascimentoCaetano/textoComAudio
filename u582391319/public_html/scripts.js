var iframe;

var path = "";

function initFrame(){
		
	iframe = document.getElementById("editor").contentDocument;
	iframe.designMode = "on";
	
}

function italic(){
	
	iframe.execCommand("italic", false, null);
	iframe.focus();
		
}

function bold(){
	
	iframe.execCommand("bold", false, null);
	iframe.focus();
		
}

function underline(){
	
	iframe.execCommand("underline", false, null);
	iframe.focus();
	
}

function changeFont(value){
	
	iframe.execCommand("fontname", false, value);
	iframe.focus();
	
}

function changeFontSize(value){
	
	iframe.execCommand("fontsize", "", value);
	iframe.focus();
	
}

//Call the div with the form
function callDivImage(){
	
	document.getElementById("hiddenMusicForm").style.left = "9000px";
	document.getElementById("hiddenImageForm").style.left = "206px";
	
}

function callDivMusic(){
	
	document.getElementById("hiddenImageForm").style.left = "9000px";
	document.getElementById("hiddenMusicForm").style.left = "206px";
	
}

function exitDiv(){
	
	document.getElementById("hiddenMusicForm").style.left = "9000px";
	document.getElementById("hiddenImageForm").style.left = "9000px";
	
}

//Send image and music

//Get the navigator name
var nav = navigator.userAgent.toLowerCase();
var xmlHttp;

//init the xmlHttp
function initXmlHttp(){
	
	if(nav.indexOf("msie") != -1){
		
		var contr = (nav.indexOf('msie 5') != -1) ? 'Microsoft.XMLHTTP' : 'Msxml2.XMLHTTP';
		
		try{
			
			xmlHttp = new ActiveXObject(contr);
			
		}
		catch(e){
			
			alert("Erro no seu navegador");
			
		}
		
	}
	else{
		
		xmlHttp = new XMLHttpRequest();
		
	}
	
}

function sendImage(){
	
	event.preventDefault();
		
	initXmlHttp();
	
	if(!xmlHttp){
		
		alert("erro");
		
	}
	
	xmlHttp.onreadystatechange = function(){
		
		if(xmlHttp.readyState == 4 || xmlHttp.readyState == 0){
			
			//Get the text of iframe
			var temp = iframe.body.innerHTML;

			//clears the text of iframe
			iframe.body.innerHTML = "";

			//Insert the previous text plus the new 
			iframe.write(temp + "<br>" + xmlHttp.responseText);
			
			//clears the form 
			document.getElementsByClassName("file")[0].value = null;
			exitDiv();
			
			initFrame();

		}
		
	}	
	
	var formData = new FormData(document.getElementById("hiddenImageForm"));
		
	xmlHttp.open("POST", "classes/Request.php", true);
	xmlHttp.send(formData);
			
}

function sendMusic(){

	event.preventDefault();
		
	initXmlHttp();
	
	if(!xmlHttp){
		
		alert("erro");
		
	}
	
	xmlHttp.onreadystatechange = function(){
		
		if(xmlHttp.readyState == 4 || xmlHttp.readyState == 0){
						
			var temp = iframe.body.innerHTML;
			iframe.body.innerHTML = "";
			iframe.write(temp + xmlHttp.responseText);
			document.getElementsByClassName("file")[1].value = null;
			exitDiv();

			initFrame();

		}
		
	}	
	
	var formData = new FormData(document.getElementById("hiddenMusicForm"));
		
	xmlHttp.open("POST", "classes/Request.php", true);
	xmlHttp.send(formData);
	

}

function getData(){

	var data = iframe.body.innerHTML;
	document.getElementById("editorValue").value = data;		

}

function insertChapter(){

	event.preventDefault();

	initXmlHttp();

	if(!xmlHttp){

		alert("Erro");

	}

	xmlHttp.onreadystatechange = function(){

		if(xmlHttp.readyState == 4 || xmlHttp.readyState == 0){

			if(xmlHttp.responseText =! ""){
				
				window.location.replace("StoriePage.php?id=" + xmlHttp.responseText);

			}
			else{

				alert("Erro ao inserir história\n Tente mais tarde ");
				
			}

		}

	}

	var form = new FormData(document.getElementById("formChapter"));

	xmlHttp.open("POST", "insertChapter.php", true);
	xmlHttp.send(form);

}
