var resp1 = window.matchMedia("(max-width: 900px)");
if (!resp1.matches) {
	document.querySelector(".horizontal-menu").style.backgroundColor = "transparent";
	window.addEventListener("scroll",function(e){
		if (e.pageY >= 373) {
			document.querySelector(".horizontal-menu").style.backgroundColor = "rgba(250,250,250,1)";
		} else{
			document.querySelector(".horizontal-menu").style.backgroundColor = "transparent";
		}

	})
}