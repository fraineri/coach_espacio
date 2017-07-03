function cambioTema(){
	var tema=document.querySelector(".horizontal-menu");
	if(tema.style.backgroundColor==="transparent"){
		tema.style.backgroundColor='rgba(147,112,219,0.5)';
		document.querySelector(".banner-title").style.backgroundColor='rgba(147,112,219,.5)';
	} else{
		tema.style.backgroundColor="transparent";
		document.querySelector(".banner-title").style.backgroundColor='rgba(52,221,221,.5)';
	}
}