countUsers();
setInterval(countUsers, 3000);

function countUsers(){
	var ajax_url = 'js/usersJSON.php';
	var req = new XMLHttpRequest();

	req.onreadystatechange = function(){
		if (req.readyState === 4) {
			if (req.status === 200) {
				var text = document.querySelector('.banner-title');
				var cant = JSON.parse(req.responseText).count;
				if (cant == 0){
					text.innerHTML = "Coach de Espacios";
				}
				else if (cant == 1) {
					text.innerHTML = "Coach de Espacios <br> Ya tenemos " + cant + " usuario !";	
				}
				else{
					text.innerHTML = "Coach de Espacios <br> Ya somos " + cant + " usuarios!";
				}
			}
		}
	}
	req.open('GET', ajax_url);
	req.send();	
}