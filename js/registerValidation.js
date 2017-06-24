window.onload = function(){
	var txtName 	= document.getElementById('txtName');
	var txtSurname 	= document.getElementById('txtSurname');
	var txtEmail 	= document.getElementById('txtEmail');
	var txtUser 	= document.getElementById('txtUser');
	var txtPass 	= document.getElementById('txtPass');
	var txtRePass 	= document.getElementById('txtRePass');
	var button 		= document.getElementsByTagName('button')[0];


//Validador Nombre
	txtName.addEventListener('blur',function(){
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
		}
	});

//Validador Apellido
	txtSurname.addEventListener('blur',function(){
		var RegExpression = /^[a-zA-Z\s]*$/;
		var lblError = this.nextElementSibling;
		if(this.value == ""){
			lblError.innerHTML = "Apellido obligatorio";
		}else if(!RegExpression.test(this.value)){
			lblError.innerHTML = "Caracteres invalidos";
		}else{
			var lblError = this.nextElementSibling;
			lblError.innerHTML = "";
		}
	});

//Validador Email
	txtEmail.addEventListener('blur',function(){
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
		}
	});

//Validador Usuario
	txtUser.addEventListener('blur',function(){
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
		}
	});

//Validador Contrasenia
	txtPass.addEventListener('blur',function(){
		var lblError = this.nextElementSibling;
		if(this.value == ""){
			lblError.innerHTML = "Contraseña obligatoria";
		}else if(this.value.length > 30){
			lblError.innerHTML = "Contraseña mayor a 20 caracteres";
		}else if(this.value.length < 8){
			lblError.innerHTML = "Contraseña menor a 6 caracteres";
		}else{
			var lblError = this.nextElementSibling;
			lblError.innerHTML = "";
		}
	});

//Validador ReContrasenia
	txtRePass.addEventListener('blur',function(){
		var lblError = this.nextElementSibling;
		if(this.value != txtPass.value){
			lblError.innerHTML = "Contraseñas distintas";
		}else{
			var lblError = this.nextElementSibling;
			lblError.innerHTML = "";
		}
	});

	button.addEventListener('click',function(e){
	});
}