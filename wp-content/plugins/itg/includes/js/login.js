console.log("login");

jQuery(document).ready(function ($) {
    $('#login-form').validate({ // initialize the plugin
        rules: {
            username: {
                required: true,
            },
            password: {
                required: true,
            }
        },
        messages: {
            username: {
                required: 'Enter username',
            },
            password: {
                required: 'Enter password',
            }
        },
        submitHandler: function (form) {
            // disable button
            $("#btn-login").prop("disabled", true);

            //hide error messages
            $("#error-login").css("display", "none");

            //get values
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            //send api request
            fetch(itgHomeUrl.siteUrl + "/wp-json/itg-api/v1/itg_login_user", {
                method: "POST",
                body: JSON.stringify({
                    username: username,
                    password: password
                }),
                headers: {
                    "Content-type": "application/json; charset=UTF-8"
                }
            })
                .then((response) => response.json())
                .then((json) => {
                    if (json.status == "success") {
                        window.location.replace(json.redirect);
                    } else {
                        // display error message 
                        $("#error-login").css("display", "block");
                    }

                    // re-enable button
                    $("#btn-login").prop("disabled", false);
                }
                );
        }
    });
});