<div class="container-fluid font-questrial" style="min-height: 60vh">
    <div class="col-xl-3 col-lg-4 col-md-7 col-sm-10 mx-auto p-md-5 p-sm-5">
        <div class="card rounded-0">
            <div class="card-body px-4" style="padding-top: 5rem; padding-bottom: 5rem;">
                <form id="login-form" name="login-form">
                    <h1 class="fw-bold fs-3 text-uppercase mb-0">Login</h1>
                    <p>View your account</p>
                    <div class="mb-3">
                        <input type="text" class="form-control border-dark" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control border-dark" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <a class="lost link-dark text-decoration-none text-info fw-bold" href="<?php echo get_site_url(); ?>/forget-password">Forgot password?</a>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <button id="btn-login" class="btn btn-info w-100 btn-lg py-2 rounded-pill" >Login</button>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <div id="error-login" class="form-text text-danger" style="display:none;">Username or Password is incorrect</div>
                    </div>
                </form>
            </div>
            <div class="card-footer bg-white">
                <label class="text-black-50">Don't have an account? <a class="link-dark text-decoration-none text-secondary" href="<?php echo get_site_url(); ?>/registration">Register Now</a></label>
            </div>
        </div>
    </div>
</div>