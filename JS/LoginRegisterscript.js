function TitleLogin(){
	checkHeight = $(".alert-login").height();
	checkText = $('.login').text();

	if(checkHeight == 0 && checkText == ""){
		$('.login').append('Sign In');

	}else if(checkHeight != 0){
		$('.login').empty();

	}
}

function TitleRegister(){
	checkHeight = $(".alert-register").height();
	checkText = $('.register').text();

	if(checkHeight == 0 && checkText == ""){
		$('.register').append('Register');

	}else if(checkHeight != 0){
		$('.register').empty();

	}
}

$(document).ready(function(){
	window.setInterval(function(){
		TitleLogin();
		TitleRegister();
	}, 10);

	// Loads Last Toggle Class
	$('.cont').toggleClass(window.localStorage.toggled);

	// Toggles Login and SignUp
	$('.img-btn').click(function(){
		if (window.localStorage.toggled != 's-signup' ) {
			$('.cont').toggleClass('s-signup', true );
			window.localStorage.toggled = 's-signup';
		 } else {
			$('.cont').toggleClass('s-signup', false );
			window.localStorage.toggled = "";
		 }
	});










	// Register
	$('.register-btn').click(function(){
		var $RegisterForm = $('#Register');
		if($RegisterForm.length){
			$RegisterForm.validate({
				rules:{
					"username":{
						required: true
					},
					"email":{
						required: true,
						email: true
					},
					"password":{
						required: true
					},
					"cpassword":{
						required: true,
						equalTo: "#password"
					},
				},
				groups:{
                    "password": "password cpassword",
                },
				messages:{
					"username":{
						required: '<li>Username is required</li>'
					},
					"email":{
						required: ' <li>Email is required</li>',
						email: ' <li>Email is invalid</li>'
					},
					"password":{
						required: ' <li>Password is required</li>'
					},
					"cpassword":{
						required: ' <li>Password is required</li>',
						equalTo: ' <li>Confirm Password should be the same as Password</li>'
					},
				},
				errorPlacement: function(error, element) {
					if (element.attr("name") == "username" || element.attr("name") == "email" || element.attr("name") == "password" || element.attr("name") == "cpassword") {
                        error.appendTo(".bullet");
						TitleRegister();

                    } else {
                        error.insertAfter(element);
						TitleRegister();

                    }

                }
			})
		}

		//Serialize form as array
		var form = $('#Register');
		var serializedForm = form.serializeArray();
		//trim values
		serializedForm.forEach(o => o.value = jQuery.trim(o.value));
		//turn it into a string if you wish
		serializedForm = $.param(serializedForm);

		$.ajax({
			url: 'Register.php',
			type: 'POST',
			data: serializedForm,
			dataType:"json",
			error: function() {
				alert('Register: Something is wrong');
			},
			success: function(data) {
				if(data.location){
					window.location.href = data.location;
				}
				if(data.loginfail){
					alert(data.loginfail);
				}
				
			}
		});		
	});


















	// Login
	$('.login-btn').click(function(){

		var $LoginForm = $('#Login');

		if($LoginForm.length){
			$LoginForm.validate({
				rules:{
					"usernamelogin":{
						required: true
					},
					"passwordlogin":{
						required: true
					},
				},
				messages:{
					"usernamelogin":{
						required: '<li>Username is required</li>'
					},
					"passwordlogin":{
						required: ' <li>Password is required</li>'
					},
				},
				errorPlacement: function(error, element) {
					error.appendTo(".bullet-login");
					TitleLogin();
                },
			})
		}

		//Serialize form as array
		var form = $('#Login');
		var serializedForm = form.serializeArray();
		//trim values
		serializedForm.forEach(o => o.value = jQuery.trim(o.value));
		//turn it into a string if you wish
		serializedForm = $.param(serializedForm);

		$.ajax({
			url: 'Login.php',
			type: 'POST',
			data: serializedForm,
			error: function() {
				alert('Login: Something is wrong');
			},
			success: function(data) {
				if(data.location){
					window.location.href = data.location;
				}
				
			}
		});
	});
	
});