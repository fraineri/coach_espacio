window.onload = function(){
	if(document.querySelector('#actPsw').innerHTML
		|| document.querySelector('#reNewPsw').innerHTML){
		
		document.querySelector(".div-change-psw").style.display="flex";
	}else{
		document.querySelector(".div-change-psw").style.display="none";
	}
	document.getElementById("button-psw").addEventListener('click',function(){
		document.querySelector(".div-change-psw").style.display="flex";
	})
}