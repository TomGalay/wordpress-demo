<?php

// get user data
$current_user = wp_get_current_user();

// get user metadata
$current_user_meta = get_user_meta($current_user->ID);

// set placeholders
$placeholder_first = ($current_user_meta['First Name'][0] != null) ? $current_user_meta['First Name'][0] :  "";
$placeholder_middle = ($current_user_meta['Middle Name'][0] != null) ? $current_user_meta['Middle Name'][0] :  "";
$placeholder_last = ($current_user_meta['Last Name'][0] != null) ? $current_user_meta['Last Name'][0] :  "";
$placeholder_dob = ($current_user_meta['DOB'][0] != null) ? $current_user_meta['DOB'][0] :  "";
$placeholder_mobile = ($current_user_meta['Mobile'][0] != null) ? $current_user_meta['Mobile'][0] :  "";
$placeholder_address = ($current_user_meta['Address'][0] != null) ? $current_user_meta['Address'][0] :  "";
?>

<div class="container-fluid font-questrial" style="min-height: 60vh">
    <div class="col-xl-4 col-lg-5 col-md-7 col-sm-10 mx-auto p-lg-5 p-md-4 p-sm-5">
        <div class="card rounded-0">
            <div class="card-body px-4" style="padding-top: 5rem; padding-bottom: 5rem;">
                <form id="user-details-form" name="user-details-form">
                    <h1 class="fw-bold fs-3 text-uppercase mb-0">User Details</h1>
                    <p>Add details to your profile</p>
                    <div class="mb-3">
                        <input type="text" class="form-control border-dark" id="first" name="first" placeholder="First Name" value="<?php echo $placeholder_first ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control border-dark" id="middle" name="middle" placeholder="Middle Name" value="<?php echo $placeholder_middle ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control border-dark" id="last" name="last" placeholder="Last Name" value="<?php echo $placeholder_last ?>">
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input name="dob" type="date" class="form-control border-dark" id="dob" name="dob" aria-describedby="" max="<?php date('Y-m-d'); ?>" value="<?php echo $placeholder_dob ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control border-dark" id="mobile" name="mobile" placeholder="Mobile" value="<?php echo $placeholder_mobile ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control border-dark" id="address" name="address" placeholder="Address" value="<?php echo $placeholder_address ?>">
                    </div>
                    <div class="d-flex flex-row-reverse pt-2">
                        <button id="btn-continue" class="btn btn-info w-100 btn-lg py-2 rounded-pill">Continue</button>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <div id="error-user-details" class="form-text text-danger" style="display:none;">Failed to save user details</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>