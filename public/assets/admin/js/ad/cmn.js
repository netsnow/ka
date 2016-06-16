window.onload=function(){ 

var isIE=!!window.ActiveXObject; 
var isIE6=isIE&&!window.XMLHttpRequest; 
var isIE8=isIE&&!!document.documentMode; 
var isIE7=isIE&&!isIE6&&!isIE8; 
if (isIE){ 
	if (isIE6){ 
		alert("ie6"); 
	}else if (isIE8){ 
		changeDivHeight(); 
	}else if (isIE7){ 
		changeDivHeight(); 
	} 
}
}

function changeDivHeight(){      
	var w = document.documentElement.clientWidth;
	
	if(w>1200){
		$("#logoBlock").css("width","10%");
		$("#titBlock").css("font-size","60px");
		$(".tit").css("font-size","120px");
		$("#infoBlock ul li").css("font-size","60px");
	}
	
	if(w>1600){
		$("#logoBlock").css("width","10%");
		$("#titBlock").css("font-size","80px");
		$(".tit").css("font-size","150px");
		$("#infoBlock ul li").css("font-size","80px");
	}

}



