console.log("users");

jQuery(document).ready(function ($) {

    var table = $('#users').DataTable({
        order: [[0, 'desc']],
        dom: '<"itg-dt-buttons-margin" B>frtip',
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        buttons: {
            dom: {
                button: {
                    tag: 'button',
                    className: 'btn'
                }
            },
            buttons: [
                //'pageLength',
                {
                    extend: 'pageLength',
                    className: "btn-outline-dark"
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: ':not(.notexport)'
                    },
                    className: "btn-outline-dark"
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':not(.notexport)'
                    },
                    className: "btn-outline-dark"
                },
                {
                    text: 'Add User',
                    action: function () {
                        $('#add-user-modal').modal('toggle')
                    },
                    className: "btn-outline-dark"
                },
            ]
        },
        ajax: {
            url: 'fetch-user-data',
            dataSrc: 'data',
        },
        colReorder: true,
        responsive: true,
        columns: [
            { "data": "id" },
            { "data": "user_login" },
            { "data": "user_email" },
            { "data": "first" },
            { "data": "middle" },
            { "data": "last" },
            { "data": "dob" },
            { "data": "mobile" },
            { "data": "address" },
            {
                'data': null,
                defaultContent: '<button>Click!</button>',
                'render': function (data, type, row) {
                    return '<button id="' + data.id + '" class="btn-edit-user-details btn btn-outline-primary m-1">Edit</button>'
                },
                bSortable: false,
            },
        ],
        "columnDefs": [
            {"className": "dt-center", "targets": "_all"}
          ]
    });

    // add user
    $('#add-user-form').validate({ // initialize the plugin
        rules: {
            email: {
                required: true,
                email: true,
            },
            username: {
                required: true,
            },
            password: {
                required: true,
            },
            "confirm-password": {
                equalTo: "#password",
            },
        },
        messages: {
            email: {
                required: 'Enter email',
                email: 'Enter valid email'
            },
            username: {
                required: 'Enter username',
            },
            password: {
                required: 'Enter password',
            },
            "confirm-password": {
                equalTo: 'Confirm Password must be the same as Password',
            },
        },
        submitHandler: function (form) {
            // hide error message
            $("#error-add-user").css("display", "none");

            // disable button
            $("#btn-register").prop("disabled", true);

            // get values
            var email = document.getElementById('email').value;
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            // send api request
            fetch(itgHomeUrl.siteUrl + "/wp-json/itg-api/v1/itg_add_new_user_from_dashboard", {
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
                    // display response
                    console.log(json);

                    if (json.status == "success") {
                        // close modal
                        $('#add-user-modal').modal('toggle');

                        // reload table
                        table.ajax.reload();

                        // change id of add user details modal
                        document.getElementById('id').value = json.id;

                        // toggle modal
                        $('#add-user-details-modal').modal('toggle');
                    } else {
                        // display error message 
                        $("#error-add-user").css("display", "block");

                        // change error message
                        document.getElementById('error-add-user').textContent = json.message;
                    }
                    // re-enable button
                    $("#btn-register").prop("disabled", false);
                }
                );
        }
    });

    // add user details
    $('#add-user-details-form').validate({ // initialize the plugin
        rules: {
            first: {
                required: true,
            },
            middle: {
                required: true,
            },
            last: {
                required: true,
            },
            dob: {
                required: true,
            },
            mobile: {
                required: true
            },
            address: {
                required: true
            }
        },
        messages: {
            first: {
                required: 'Enter first name',
            },
            middle: {
                required: 'Enter middle name',
            },
            last: {
                required: 'Enter last name',
            },
            dob: {
                required: 'Enter date of birth',
            },
            mobile: {
                required: 'Enter mobile number',
            },
            address: {
                required: 'Enter address',
            },
        },
        submitHandler: function (form) {
            // hide error message
            $("#error-add-user-details").css("display", "none");

            // disable button
            $("#btn-continue").prop("disabled", true);

            // get values
            var id = document.getElementById('id').value;
            var first = document.getElementById('first').value;
            var middle = document.getElementById('middle').value;
            var last = document.getElementById('last').value;
            var dob = document.getElementById('dob').value;
            var mobile = document.getElementById('mobile').value;
            var address = document.getElementById('address').value;
            //var paid = document.getElementById('paid').value;

            // send api request
            fetch(itgHomeUrl.siteUrl + "/wp-json/itg-api/v1/itg_add_user_details_from_dashboard", {
                method: "POST",
                body: JSON.stringify({
                    id: id,
                    first: first,
                    middle: middle,
                    last: last,
                    dob: dob,
                    mobile: mobile,
                    address: address,
                    //paid: paid,
                }),
                headers: {
                    "Content-type": "application/json; charset=UTF-8",
                }
            })
                .then((response) => response.json())
                .then((json) => {
                    // display response
                    console.log(json);

                    if (json.status == "success") {
                        // close modal
                        $('#add-user-details-modal').modal('toggle');

                        // reload table
                        table.ajax.reload();
                    } else {
                        // display error message 
                        $("#error-add-user-details").css("display", "block");

                        // change error message
                        document.getElementById('error-add-user-details').textContent = json.message;
                    }
                    // re-enable button
                    $("#btn-continue").prop("disabled", false);
                }
                );
        }
    });

    // edit user details
    jQuery('#users tbody').on('click', '.btn-edit-user-details', function () {
        var userData = table.rows().data();
        var userCurrentRow;
        for (var i = 0; i < userData.length; i++) {
            if (userData[i].id == this.id) {
                userCurrentRow = userData[i];
                break;
            }
        }

        $('#edit-user-details-modal').modal('toggle');

        document.getElementById('edit-user-details-id').value = userCurrentRow.id;
        document.getElementById('edit-user-details-first').value = userCurrentRow.first;
        document.getElementById('edit-user-details-middle').value = userCurrentRow.middle;
        document.getElementById('edit-user-details-last').value = userCurrentRow.last;
        document.getElementById('edit-user-details-dob').value = userCurrentRow.dob;
        document.getElementById('edit-user-details-mobile').value = userCurrentRow.mobile;
        document.getElementById('edit-user-details-address').value = userCurrentRow.address;
    });

    // edit user details
    $('#edit-user-details-form').validate({ // initialize the plugin
        rules: {
            "edit-user-details-first": {
                required: true,
            },
            "edit-user-details-middle": {
                required: true,
            },
            "edit-user-details-last": {
                required: true,
            },
            "edit-user-details-dob": {
                required: true,
            },
            "edit-user-details-mobile": {
                required: true
            },
            "edit-user-details-address": {
                required: true
            },
        },
        messages: {
            "edit-user-details-first": {
                required: 'Enter first name',
            },
            "edit-user-details-middle": {
                required: 'Enter middle name',
            },
            "edit-user-details-last": {
                required: 'Enter last name',
            },
            "edit-user-details-dob": {
                required: 'Enter date of birth',
            },
            "edit-user-details-mobile": {
                required: 'Enter mobile number',
            },
            "edit-user-details-address": {
                required: 'Enter address',
            },
        },
        submitHandler: function (form) {
            // hide error message
            $("#error-edit-user-details").css("display", "none");

            // disable button
            $("#btn-edit-user-details").prop("disabled", true);

            // get values
            var id = document.getElementById('edit-user-details-id').value;
            var first = document.getElementById('edit-user-details-first').value;
            var middle = document.getElementById('edit-user-details-middle').value;
            var last = document.getElementById('edit-user-details-last').value;
            var dob = document.getElementById('edit-user-details-dob').value;
            var mobile = document.getElementById('edit-user-details-mobile').value;
            var address = document.getElementById('edit-user-details-address').value;

            // send api request
            fetch(itgHomeUrl.siteUrl + "/wp-json/itg-api/v1/itg_add_user_details_from_dashboard", {
                method: "POST",
                body: JSON.stringify({
                    id: id,
                    first: first,
                    middle: middle,
                    last: last,
                    dob: dob,
                    mobile: mobile,
                    address: address,
                }),
                headers: {
                    "Content-type": "application/json; charset=UTF-8",
                }
            })
                .then((response) => response.json())
                .then((json) => {
                    // display response
                    console.log(json);

                    if (json.status == "success") {
                        // close modal
                        $('#edit-user-details-modal').modal('toggle');

                        // reload table
                        table.ajax.reload();
                    } else {
                        // display error message 
                        $("#error-edit-user-details").css("display", "block");

                        // change error message
                        document.getElementById('error-edit-user-details').textContent = json.message;

                    }
                    // re-enable button
                    $("#btn-edit-user-details").prop("disabled", false);
                }
                );

        }
    });

});