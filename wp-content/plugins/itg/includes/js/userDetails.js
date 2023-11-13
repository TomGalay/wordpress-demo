console.log("userDetails");

jQuery(document).ready(function ($) {
    $('#user-details-form').validate({ // initialize the plugin
        rules: {
            first: {
                required: true,
                maxlength: 30,
            },
            middle: {
                required: true,
                maxlength: 30,
            },
            last: {
                required: true,
                maxlength: 30,
            },
            dob: {
                required: true,
            },
            mobile: {
                required: true,
                maxlength: 30,
            },
            address: {
                required: true,
                maxlength: 99,
            }
        },
        messages: {
            first: {
                required: 'Enter first name',
                maxlength: 'Max length of 30 characters',
            },
            middle: {
                required: 'Enter middle name',
                maxlength: 'Max length of 30 characters',
            },
            last: {
                required: 'Enter last name',
                maxlength: 'Max length of 30 characters',
            },
            dob: {
                required: 'Enter date of birth',
            },
            mobile: {
                required: 'Enter mobile number',
                maxlength: 'Max length of 30 characters',
            },
            address: {
                required: 'Enter address',
                maxlength: 'Max length of 99 characters',
            },
        },
        submitHandler: function (form) {
            // disable button
            $("#btn-continue").prop("disabled", true);

             // hide error messages
             $("#error-user-details").css("display", "none");

            // get values
            var first = document.getElementById('first').value;
            var middle = document.getElementById('middle').value;
            var last = document.getElementById('last').value;
            var dob = document.getElementById('dob').value;
            var mobile = document.getElementById('mobile').value;
            var address = document.getElementById('address').value;

            // send api request
            fetch(itgHomeUrl.siteUrl + "/wp-json/itg-api/v1/itg_add_user_details", {
                method: "POST",
                body: JSON.stringify({
                    first: first,
                    middle: middle,
                    last: last,
                    dob: dob,
                    mobile: mobile,
                    address: address,
                }),
                headers: {
                    "Content-type": "application/json; charset=UTF-8",
                    'X-WP-Nonce': itg.nonce,
                }
            })
                .then((response) => response.json())
                .then((json) => {
                    // redirect page
                    if (json.status == "success") {
                        window.location.replace(json.redirect);
                    }

                    // re-enable button
                    $("#btn-continue").prop("disabled", false);
                }
                );
        }
    });
});