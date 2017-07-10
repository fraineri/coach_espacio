var title = document.querySelector('.contact-ppal-text');
var text = "Contactanos_";

window.onload=function(){
	animation();
	//setInterval(animation,3000);
}

function animation(){
	title.innerHTML = "";
	console.log(text.length);

	for (var i = 0; i < text.length; i++) {
		waitSeconds(500);
		title.innerText += text[i];	
		//waitSeconds(2000);
	}
}


function waitSeconds(iMilliSeconds) {
    var counter= 0
        , start = new Date().getTime()
        , end = 0;
    while (counter < iMilliSeconds) {
        end = new Date().getTime();
        counter = end - start;
    }
}