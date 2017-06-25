
var cons = 0;

function slide_show(){
	var elemento = document.querySelector('.images-list').getElementsByTagName('li');	
	if(cons >= elemento.length){
		cons = 0;		
	}

	for(var n = cons; n < elemento.length; n++){
		elemento[n].className = 'selected';
		
		//Modifico Dot
		var dots = document.querySelector(".galery-dots").getElementsByTagName("li");
		dots[cons].childNodes[0].className="image-dot current";

		for(var i = 0; i<dots.length; i++){
			if(i!=cons){
				elemento[i].className = 'noselected';
				dots[i].childNodes[0].className="image-dot";
			}
		}
		cons++;
		break;
	}
}

var time = 5000;
var timer;

function createDots(){
	var cant = document.querySelector('.images-list').getElementsByTagName('li').length;
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


window.onload = function(){	
	createDots();
	//start();
	timer = setInterval(slide_show,time);
	slide_show();
}