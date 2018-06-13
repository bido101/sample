var Login = function () {

	var handleLogin = function() {
		$('.login-form').validate({
	            errorElement: 'label', //default input error message container
	            errorClass: 'help-inline', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	                name: {
	                    required: true
	                },
	                password: {
	                    required: true
	                },
	                remember: {
	                    required: false
	                }
	            },

	            messages: {
	                name: {
	                    required: "Username is required!"
	                },
	                password: {
	                    required: "Password is required!"
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-error', $('.login-form')).show();
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.control-group').addClass('error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.control-group').removeClass('error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                error.addClass('help-small no-left-padding').insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {
	                form.submit();
	            }
	        });

	        $('.login-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.login-form').validate().form()) {
	                    $('.login-form').submit();
	                }
	                return false;
	            }
	        });
	}

	var handleForgetPassword = function () {
		$('.forget-form').validate({
	            errorElement: 'label', //default input error message container
	            errorClass: 'help-inline', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            ignore: "",
	            rules: {
	                email: {
	                    required: true,
	                    email: true
	                }
	            },	            
	            messages: {
	                email: {
	                    required: "Email is required!"
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   

	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.control-group').addClass('error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.control-group').removeClass('error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                error.addClass('help-small no-left-padding').insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {
	                form.submit();
	            }
	        });

	        $('.forget-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.forget-form').validate().form()) {
	                    $('.forget-form').submit();
	                }
	                return false;
	            }
	        });

	        //jQuery('#forget-password').click(function () {
	        //    jQuery('.login-form').hide();
	        //    jQuery('.forget-form').show();
	        //});

	        //jQuery('#back-btn').click(function () {
	        //    jQuery('.login-form').show();
	        //    jQuery('.forget-form').hide();
	        //});

	}

	var handleRegister = function () {

		function format(state) {
            if (!state.id) return state.text; // optgroup
            return "<img class='flag' src='assets/img/flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
        }

		$("#select2_sample4").select2({
		  	placeholder: '<i class="icon-map-marker"></i>&nbsp;Select a Country',
            allowClear: true,
            formatResult: format,
            formatSelection: format,
            escapeMarkup: function (m) {
                return m;
            }
        });

		$('#select2_sample4').change(function () {
            $('.register-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });

        $('.register-form').validate({
	            errorElement: 'label', //default input error message container
	            errorClass: 'help-inline', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            ignore: "",
	            rules: {	            
	            	name: {
	                    required: true
	                },    	                
	                email: {
	                    required: true,
	                    email: true
	                },	                	                
	                password: {
	                    required: true
	                },
	                password_confirmation: {
	                    equalTo: "#register_password"
	                },
	                tnc: {
	                    required: true
	                }
	            },

	            messages: { // custom messages for radio buttons and checkboxes
	                tnc: {
	                    required: "Please accept TNC first."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   

	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.control-group').addClass('error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.control-group').removeClass('error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                if (element.attr("name") == "tnc") { // insert checkbox errors after the container                  
	                    error.addClass('help-small no-left-padding').insertAfter($('#register_tnc_error'));
	                } else if (element.closest('.input-icon').size() === 1) {
	                    error.addClass('help-small no-left-padding').insertAfter(element.closest('.input-icon'));
	                } else {
	                	error.addClass('help-small no-left-padding').insertAfter(element);
	                }
	            },

	            submitHandler: function (form) {
	                form.submit();
	            }
	        });

			$('.register-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.register-form').validate().form()) {
	                    $('.register-form').submit();
	                }
	                return false;
	            }
	        });

	        //jQuery('#register-btn').click(function () {
	        //    jQuery('.login-form').hide();
	        //    jQuery('.register-form').show();
	        //});

	        //jQuery('#register-back-btn').click(function () {
	        //    jQuery('.login-form').show();
	        //    jQuery('.register-form').hide();
	        //});
	}

	var handleResetPassword = function () {

        $('.password-reset-form').validate({
	            errorElement: 'label', //default input error message container
	            errorClass: 'help-inline', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            ignore: "",
	            rules: {   	                
	                email: {
	                    required: true,
	                    email: true
	                },	                	                
	                password: {
	                    required: true
	                },
	                password_confirmation: {
	                    equalTo: "#pr-password"
	                }
	            },	           

	            invalidHandler: function (event, validator) { //display error alert on form submit   

	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.control-group').addClass('error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.control-group').removeClass('error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                if (element.attr("name") == "tnc") { // insert checkbox errors after the container                  
	                    error.addClass('help-small no-left-padding').insertAfter($('#register_tnc_error'));
	                } else if (element.closest('.input-icon').size() === 1) {
	                    error.addClass('help-small no-left-padding').insertAfter(element.closest('.input-icon'));
	                } else {
	                	error.addClass('help-small no-left-padding').insertAfter(element);
	                }
	            },

	            submitHandler: function (form) {
	                form.submit();
	            }
	        });

			$('.password-reset-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.password-reset-form').validate().form()) {
	                    $('.password-reset-form').submit();
	                }
	                return false;
	            }
	        });

	        //jQuery('#register-btn').click(function () {
	        //    jQuery('.login-form').hide();
	        //    jQuery('.register-form').show();
	        //});

	        //jQuery('#register-back-btn').click(function () {
	        //    jQuery('.login-form').show();
	        //    jQuery('.register-form').hide();
	        //});
	}
    
    return {
        //main function to initiate the module
        init: function () {
        	
            handleLogin();
            handleForgetPassword();
            handleRegister();
            handleResetPassword();        
            //var base_url = "http://prod.cgso-borongan.gov.ph";
            var getUrl = window.location;
			var baseUrl = getUrl .protocol + "//" + getUrl.host; //+ "/" + getUrl.pathname.split('/')[1];
            $.backstretch([
		        baseUrl+"/assets/img/bg/1.jpg",
		        baseUrl+"/assets/img/bg/2.jpg",
		        baseUrl+"/assets/img/bg/3.jpg",
		        baseUrl+"/assets/img/bg/4.jpg",
		        baseUrl+"/assets/img/bg/5.jpg",
		        baseUrl+"/assets/img/bg/6.jpg",
		        baseUrl+"/assets/img/bg/7.jpg",		        
		        baseUrl+"/assets/img/bg/8.jpg",
		        baseUrl+"/assets/img/bg/9.jpg",
		        baseUrl+"/assets/img/bg/10.jpg",
		        baseUrl+"/assets/img/bg/11.jpg",
		        baseUrl+"/assets/img/bg/12.jpg"
		        ], {
		          fade: 1000,
		          duration: 8000
		    });
	       
        }

    };

}();