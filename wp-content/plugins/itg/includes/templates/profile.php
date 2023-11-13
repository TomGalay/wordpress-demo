<?php

global $wpdb;

// get user data
$current_user = wp_get_current_user();

// get user metadata
$current_user_meta = get_user_meta($current_user->ID);

?>

<section style="min-height: 60vh">
  <div class="container py-5 font-questrial">
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="mt-3 mb-0 pb-0"><?php echo $current_user->user_login; ?></h5>
            <p class="text-muted mb-4"><?php echo $current_user_meta['First Name'][0]; ?> <?php echo $current_user_meta['Last Name'][0]; ?></p>
            <div class="d-flex justify-content-center mb-2">
              <a id="btn-change-user-details" href="<?php echo get_site_url(); ?>/user-details" class="btn btn-outline-dark text-decoration-none m-1">Edit User Details</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $current_user_meta['First Name'][0]; ?> <?php echo $current_user_meta['Middle Name'][0]; ?> <?php echo $current_user_meta['Last Name'][0]; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $current_user->user_email; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Date of Birth</p>
              </div>
              <div class="col-sm-9">
                <?php
                $dob = "";
                if ($current_user_meta['DOB'][0]) {
                  $dob = date("F j, Y", strtotime($current_user_meta['DOB'][0]));
                }
                ?>
                <p class="text-muted mb-0"><?php echo $dob; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $current_user_meta['Mobile'][0]; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $current_user_meta['Address'][0]; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>