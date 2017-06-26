
var cons = 0;

function slide_show(){
	if(cons >= listImages.length){
		cons = 0;		
	}

	document.querySelector(".banner").style.backgroundImage = 'url('+listImages[cons]+')';

	//Modifico Dot
	var dots = document.querySelector(".galery-dots").getElementsByTagName("li");
	for(var i = 0; i<dots.length; i++){
		if(i!=cons){
			dots[i].childNodes[0].className="image-dot";
		} else{
			dots[cons].childNodes[0].className="image-dot current";
		}
	}
	cons++;
}


function createDots(){
	var cant = listImages.length;
	var lista = document.querySelector(".galery-dots");
	for (var i = 0; i < cant; i++) {
		var li = document.createElement("li");
		li.className="dot-style";
		var button = document.createElement("button");
	
		button.type = "button";
		button.className="image-dot"
		button.innerHTML = "&#8226;";
		li.appendChild(button);
		lista.appendChild(li);

		button.addEventListener('click',function(e){
			cons = Array.from(lista.getElementsByTagName("li")).indexOf(e.target.parentNode);
			slide_show();
			clearInterval(timer);
			timer = setInterval(slide_show, time);
		})
	}
}

var time = 5000;
var timer;
var listImages=[];
var respImages=[
	'images/backgrounds/bg-small.jpg',
	'images/backgrounds/bg-small4.jpg',
	'images/backgrounds/bg-small3.jpg'
];
var desktopImages=[
	'images/backgrounds/0-Main8.jpg',
	'images/backgrounds/image1.jpg',
	'images/backgrounds/closet-1.jpg'
];

window.onload = function(){
 	var resp1 = window.matchMedia("(max-width: 480px)");
 	if (resp1.matches) {
 		listImages = respImages;
 	}
 	else{
 		listImages = desktopImages;
 	}

	createDots();
	timer = setInterval(slide_show,time);
	slide_show();
}