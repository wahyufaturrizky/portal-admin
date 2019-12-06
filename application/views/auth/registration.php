<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="post" action="<?php base_url('auth/regristration'); ?>">

                <div class="form-group">
                  <input value="<?= set_value('username');?>" type="text" id="username" name="username" class="form-control form-control-user" placeholder="Fullname">
                  <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                
                <div class="form-group">
                  <input value="<?= set_value('email');?>" type="text" id="email" name="email" class="form-control form-control-user" placeholder="Email Address">
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group row">

                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="repassword" name="repassword" placeholder="Repeat Password">
                  </div>

                </div>
                <button type="submit" href="" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
                <hr>

              </form>

              <div class="text-center">
                <a class="small" href="forgot-password.html" name="forgot_password" id="forgot_password">Forgot Password?</a>
              </div>

              <div class="text-center">
                <a class="small" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>