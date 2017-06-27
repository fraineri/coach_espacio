window.onload = function(){
	var txtName 	= document.getElementById('txtName');
	var txtSurname 	= document.getElementById('txtSurname');
	var txtEmail 	= document.getElementById('txtEmail');
	var txtUser 	= document.getElementById('txtUser');
	var txtPass 	= document.getElementById('txtPass');
	var txtRePass 	= document.getElementById('txtRePass');
	var button 		= document.getElementsByTagName('button')[0];
	var input = document.querySelector(".form-register-txtUsuario");
	var hayError = false;
	button.className = "form-button-register-blocked";
	button.innerHTML = "Faltan Datos";

	var flags = []; //First blur
	for (var i = 0; i < 6; i++) {
		flags[i] = true;
	}

	var errores = [];
	for (var i = 0; i < 6; i++) {
		errores[i] = true;
	}

	function checkFlags(){
		for (var i = 0; i < 6; i++) {
			if(flags[i]){
				return false;
			}
		}
		return true;
	}

	function checkErrores(){
		for (var i = 0; i < 6; i++) {
			if(errores[i]){
				button.className = "form-button-register-blocked";
				button.innerHTML = "Faltan Datos";
				return true;
			}
		}
		button.className = "form-button-register standard-button button-white";
		button.innerHTML = "REGISTRAR";
		return false;
	}

//Validador Nombre
	txtName.addEventListener('blur',function(){
		flags[0] = false;
		errores[0] = true;
		var RegExpression = /^[a-zA-Z\s]*$/;
		var lblError = this.nextElementSibling;
		if(this.value == ""){
			lblError.innerHTML = "Nombre obligatorio";
		}else if(!RegExpression.test(this.value)){
			lblError.innerHTML = "Caracteres invalidos";
		}else if(this.value.length > 30){
			lblError.innerHTML = "Nombre mayor a 30 caracteres";
		}else{
			var lblError = this.nextElementSibling;
			lblError.innerHTML = "";
			errores[0] = false;
			hayError = checkErrores();
		}
	});

//Validador Apellido
	txtSurname.addEventListener('blur',function(){
		flags[1] = false;
		errores[1] = true;
		var RegExpression = /^[a-zA-Z\s]*$/;
		var lblError = this.nextElementSibling;
		if(this.value == ""){
			lblError.innerHTML = "Apellido obligatorio";
		}else if(!RegExpression.test(this.value)){
			lblError.innerHTML = "Caracteres invalidos";
		}else{
			var lblError = this.nextElementSibling;
			lblError.innerHTML = "";
			errores[1] = false;
			hayError = checkErrores();
		}
	});

//Validador Email
	txtEmail.addEventListener('blur',function(){
		flags[2] = false;
		errores[2] = true;
		var RegExpression = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		var lblError = this.nextElementSibling;
		if(this.value == ""){
			lblError.innerHTML = "Email obligatorio";
		}else if(this.value.length > 70){
			lblError.innerHTML = "Email mayor a 70 caracteres";
		}else if(!RegExpression.test(this.value)){
			lblError.innerHTML = "Email invalido";
		}else{
			var lblError = this.nextElementSibling;
			lblError.innerHTML = "";
			errores[2] = false;
			hayError = checkErrores();
		}
	});

//Validador Usuario
	txtUser.addEventListener('blur',function(){
		flags[3] = false;
		errores[3] = true;
		var lblError = this.nextElementSibling;
		if(this.value == ""){
			lblError.innerHTML = "Usuario obligatorio";
		}else if(this.value.length > 20){
			lblError.innerHTML = "Usuario mayor a 20 caracteres";
		}else if(this.value.length < 6){
			lblError.innerHTML = "Usuario menor a 6 caracteres";
		}else{
			var lblError = this.nextElementSibling;
			lblError.innerHTML = "";
			errores[3] = false;
			hayError = checkErrores();
		}
	});

//Validador Contrasenia
	txtPass.addEventListener('blur',function(){
		flags[4] = false;
		errores[4] = true;
		var lblError = this.nextElementSibling;
		if(this.value == ""){
			lblError.innerHTML = "Contraseña obligatoria";
		}else if(this.value.length > 30){
			lblError.innerHTML = "Contraseña mayor a 20 caracteres";
		}else if(this.value.length < 8){
			lblError.innerHTML = "Contraseña menor a 8 caracteres";
		}else{
			var lblError = this.nextElementSibling;
			lblError.innerHTML = "";
			errores[4] = false;
			hayError = checkErrores();
		}
	});

//Validador ReContrasenia
	txtRePass.addEventListener('blur',function(){
		flags[5] = false;
		errores[5] = true;
		var lblError = this.nextElementSibling;
		if(this.value != txtPass.value || this.value == ""){
			lblError.innerHTML = "Contraseñas distintas";
		}else{
			var lblError = this.nextElementSibling;
			lblError.innerHTML = "";
			errores[5] = false;
			hayError = checkErrores();
		}
	});




	button.addEventListener('click',function(e){
		hayError = checkErrores();
		if(!hayError && checkFlags()){
			console.log("No hay errores");
		}else{
			e.preventDefault();
			console.log("Hay errores");
		}
		console.log("----------------------");
	});


//Validador usuario existente
	input.addEventListener('change', function(e){
		document.getElementById("user-lbl-error").innerHTML = " ";
		document.getElementById("user-lbl-ok").innerHTML = " ";
		if (input.value && input.value.length>6 && input.value.length<20) {
			var users;

			var req = new XMLHttpRequest();
			req.open("GET", "js/findUser.php?username="+input.value);
			req.send();
			req.onreadystatechange = function() {
				if (req.readyState == 4 && req.status == 200) {
					$response = JSON.parse(req.responseText);
					if ($response['exists']) {
						document.getElementById("user-lbl-error").innerHTML = "El usuario ingresado ya se encuentra en uso";
					} else{
						document.getElementById("user-lbl-ok").innerHTML = "El usuario esta disponible!";
					}
				}
			};	
		}
	})

}

