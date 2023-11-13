<!-- Add User Modal -->
<div class="modal fade" id="add-user-modal" tabindex="-1" aria-labelledby="add-user-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h1 class="fw-bold fs-3 text-uppercase mb-0">Add user</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="fw-bolder fs-6">Step 1 of 2</p>
                <hr class="">
                <form id="add-user-form" name="add-user-form">
                    <div class="mb-3">
                        <input type="email" class="form-control border-dark" id="email" name="email" placeholder="Email Address">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control border-dark" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control border-dark" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control border-dark" id="confirm-password" name="confirm-password" placeholder="Confirm Password">
                    </div>
            </div>
            <div class="modal-footer border-0">
                <button id="btn-register" class="btn btn-primary w-100 btn-lg py-2 rounded-pill">Add User</button>
                <button type="button" class="btn btn-outline-secondary w-100 btn-lg py-2 rounded-pill" data-bs-dismiss="modal">Close</button>
                <div id="error-add-user" class="form-text text-danger" style="display:none;">Error. Failed to add record.</div>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Add User Details Modal -->
<div class="modal fade" id="add-user-details-modal" tabindex="-1" aria-labelledby="add-user-details-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h1 class="fw-bold fs-3 text-uppercase mb-0">Add user details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="fw-bolder fs-6">Step 2 of 2</p>
                <hr class="">
                <form id="add-user-details-form" name="add-user-details-form">
                    <div class="mb-3">
                        <input type="text" class="form-control border-dark" id="id" name="id" placeholder="ID" style="display:none;" disabled>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control border-dark" id="first" name="first" placeholder="First Name">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control border-dark" id="middle" name="middle" placeholder="Middle Name">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control border-dark" id="last" name="last" placeholder="Last Name">
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input name="dob" type="date" class="form-control border-dark" id="dob" name="dob" aria-describedby="" max="<?php date('Y-m-d'); ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control border-dark" id="mobile" name="mobile" placeholder="Mobile">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control border-dark" id="address" name="address" placeholder="Address">
                    </div>
            </div>
            <div class="modal-footer border-0">
                <button id="btn-continue" class="btn btn-primary w-100 btn-lg py-2 rounded-pill">Add User Details</button>
                <button type="button" class="btn btn-outline-secondary w-100 btn-lg py-2 rounded-pill" data-bs-dismiss="modal">Close</button>
                <div id="error-add-user-details" class="form-text text-danger" style="display:none;">Error. Failed to add record.</div>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit User Details Modal -->
<div class="modal fade" id="edit-user-details-modal" tabindex="-1" aria-labelledby="edit-user-details-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h1 class="fw-bold fs-3 text-uppercase mb-0">Edit user details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-user-details-form" name="edit-user-details-form">
                    <div class="mb-3">
                        <label for="edit-user-details-id" class="form-label">ID</label>
                        <input type="text" class="form-control border-dark" id="edit-user-details-id" name="edit-user-details-id" placeholder="ID" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="edit-user-details-first" class="form-label">First Name</label>
                        <input type="text" class="form-control border-dark" id="edit-user-details-first" name="edit-user-details-first" placeholder="First Name">
                    </div>
                    <div class="mb-3">
                        <label for="edit-user-details-middle" class="form-label">Middle Name</label>
                        <input type="text" class="form-control border-dark" id="edit-user-details-middle" name="edit-user-details-middle" placeholder="Middle Name">
                    </div>
                    <div class="mb-3">
                        <label for="edit-user-details-last" class="form-label">Last Name</label>
                        <input type="text" class="form-control border-dark" id="edit-user-details-last" name="edit-user-details-last" placeholder="Last Name">
                    </div>
                    <div class="mb-3">
                        <label for="edit-user-details-dob" class="form-label">Date of Birth</label>
                        <input name="dob" type="date" class="form-control border-dark" id="edit-user-details-dob" name="edit-user-details-dob" aria-describedby="" max="<?php date('Y-m-d'); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="edit-user-details-mobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control border-dark" id="edit-user-details-mobile" name="edit-user-details-mobile" placeholder="Mobile">
                    </div>
                    <div class="mb-3">
                        <label for="edit-user-details-address" class="form-label">Address</label>
                        <input type="text" class="form-control border-dark" id="edit-user-details-address" name="edit-user-details-address" placeholder="Address">
                    </div>
            </div>
            <div class="modal-footer border-0">
                <button id="btn-edit-user-details" class="btn btn-primary w-100 btn-lg py-2 rounded-pill">Edit User Details</button>
                <button type="button" class="btn btn-outline-secondary w-100 btn-lg py-2 rounded-pill" data-bs-dismiss="modal">Close</button>
                <div id="error-edit-user-details" class="form-text text-danger" style="display:none;">Error. Failed to edit record.</div>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid p-3 bg-white font-questrial" style="min-height: 60vh">
    <h2>Users</h2>
    <table id="users" class="display compact" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th>Mobile</th>
                <th>Address</th>
                <th></th>
            </tr>
        </thead>
    </table>
</div>