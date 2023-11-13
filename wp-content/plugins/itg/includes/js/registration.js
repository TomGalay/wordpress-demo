console.log("registration");

jQuery(document).ready(function ($) {
    $('#registration-form').validate({ // initialize the plugin
        rules: {
            email: {
                required: true,
                email: true,
                maxlength: 30
            },
            username: {
                required: true,
                maxlength: 15
            },
            password: {
                required: true,
                maxlength: 30
            },
            "confirm-password": {
                equalTo: "#password",
            },
            referral: {
                required: true,
                maxlength: 30
            }
        },
        messages: {
            email: {
                required: 'Enter email',
                email: 'Enter valid email',
                maxlength: 'Max length of 30 characters',
                
            },
            username: {
                required: 'Enter username',
                maxlength: 'Max length of 15 characters',
            },
            password: {
                required: 'Enter password',
                maxlength: 'Max length of 30 characters',
            },
            "confirm-password": {
                equalTo: 'Confirm Password must be the same as Password',
                maxlength: 'Max length of 30 characters',
            },
            referral: {
                required: 'Enter referral code',
                maxlength: 'Max length of 30 characters',
            }
        },
        submitHandler: function (form) {
            // disable button
            $("#btn-register").prop("disabled", true);

            // hide error messages
            $("#error-registration").css("display", "none");

            // get values
            var email = document.getElementById('email').value;
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            //send api request
            fetch( itgHomeUrl.siteUrl + "/wp-json/itg-api/v1/itg_add_new_user", {
                method: "POST",
                body: JSON.stringify({
                    email: email,
                    username: username,
                    password: password,
                }),
                headers: {
                    "Content-type": "application/json; charset=UTF-8"
                }
            })
                .then((response) => response.json())
                .then((json) => {
                    // display results
                    console.log(json);
                    
                    if (json.status == "success") {
                        window.location.replace(itgHomeUrl.siteUrl+"/user-details");
                    } else {
                        //change error message
                        document.getElementById('error-registration').textContent = json.message;

                        // display error message 
                        $("#error-registration").css("display", "block");
                    }

                    // re-enable button
                    $("#btn-register").prop("disabled", false);
                }
                );
        }
    });
});