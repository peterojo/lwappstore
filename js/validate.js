(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#signup").validate({
                rules: {
                    name: "required",
                    phone: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    country: "required",
					password: {
						required: true,
						minlength: 6
					},
					password_again: {
						required: true,
						minlength: 6,
						equalTo: "#password"
					},
					agree: "required"
                },
                messages: {
                    name: "Please enter your name",
                    phone: "Please enter your phone number",
                    email: "Please enter a valid email address",
                    country: "Please select a country",
					password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 6 characters long"
					},
					password_again: {
						required: "Please provide a password",
						minlength: "Your password must be at least 6 characters long",
						equalTo: "Please enter the same password as above"
					},
					agree: "You must agree to our terms and conditions"
                },
                submitHandler: function(form){
                	$.ajax({
						url: 'http://videoshare.loveworldapis.com/appstore/console/signup',
						type: 'post',
						data: $(form).serialize(),
						success: function(data) {
							
							alert(data);
						}
					});
                    form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);
