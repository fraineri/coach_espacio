window.onload = function(){	
	var images = [
	  "images/backgrounds/0-Main8.jpg",
	  "images/backgrounds/image1.jpg",
	  "images/backgrounds/closet-1.jpg"
	];
	var i = 0;

	// Start the slide show
	console.log("url('" + images[i] + "')");
	setInterval(function() {
	  document.querySelector(".banner").style.backgroundImage = "url('" + images[i] + "')";
	  (i < images.length - 1) ? i++ : i = 0
	}, 2000);

}