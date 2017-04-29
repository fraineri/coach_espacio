function firstForm(){
		$('.form-button-next').css('display','inline-block');
		$('.form-button-back').css('display','none');
	    $('.form-button-logup').css('display','none');
    	$(".form-logup-txtUsuario").css("display","block");
    	$(".form-logup-txtPass").css("display","block");
    	$(".form-logup-txtRePass").css("display","block");
    	$(".form-logup-txtNombre").css("display","none");
    	$(".form-logup-txtApellido").css("display","none");
    	$(".form-logup-txtEmail").css("display","none");
	}
	function secondForm(){
		$('.form-button-next').css('display','none');
		$('.form-button-back').css('display','inline-block');
	    $('.form-button-logup').css('display','inline-block');
    	$(".form-logup-txtUsuario").css("display","none");
    	$(".form-logup-txtPass").css("display","none");
    	$(".form-logup-txtRePass").css("display","none");
    	$(".form-logup-txtNombre").css("display","block");
    	$(".form-logup-txtApellido").css("display","block");
    	$(".form-logup-txtEmail").css("display","block");
	}
	$(document).ready(function(){
		/*
		$logupVisibility = false;
	    $(".form-login-icon").click(function(){
	    	if(!$logupVisibility){
	    		firstForm();
		        $logupVisibility = true;
		        $(".form-logup-container").fadeIn();
		        $(".form-login-icon").css("background-color","white");
		        $(".form-login-icon").css("color","rgb(52,221,221)");
		        $(".form-login-icon > i").removeClass("fa-pencil");
		        $(".form-login-icon > i").addClass("fa-times");
	    	}else{
	        	$logupVisibility = false;
	        	$(".form-logup-container").fadeOut();
	        	$(".form-login-icon").css("background-color","rgb(52,221,221)");
		        $(".form-login-icon").css("color","white");
		        $(".form-login-icon > i").removeClass("fa-times");
		        $(".form-login-icon > i").addClass("fa-pencil");		        
	    	}
	    });
	    */
	    $(".form-button-next").click(function(){
	    	secondForm();
	    });
	    $(".form-button-back").click(function(){
	    	firstForm();
	    });
	});