<div class="container-fluid font-questrial" style="min-height: 60vh">
    <div class="col-xl-3 col-lg-4 col-md-7 col-sm-10 mx-auto p-5 p-md-5 p-sm-5">
        <div class="card rounded-0">
            <div class="card-body px-4" style="padding-top: 5rem; padding-bottom: 5rem;">
                <form id="registration-form" name="registration-form">
                    <h1 class="fw-bold fs-3 text-uppercase mb-0">Registration</h1>
                    <p>Create an account</p>
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
                    <div class="d-flex flex-row-reverse pt-2">
                        <button id="btn-register" class="btn btn-info w-100 btn-lg py-2 rounded-pill">Register</button>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <div id="error-registration" class="form-text text-danger" style="display:none;">Failed to register. Please try again.</div>
                    </div>
                </form>
            </div>
            <div class="card-footer bg-white">
                <label class="text-black-50">Already have an account? <a class="link-dark text-decoration-none text-secondary" href="<?php echo get_site_url(); ?>/login">Login Now</a></label>
            </div>
        </div>
    </div>
</div>