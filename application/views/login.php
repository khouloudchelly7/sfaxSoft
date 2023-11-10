<?php include(APPPATH . 'views/layouts/header.php'); ?>
<section>
    <div class="container  mx-auto my-auto mx-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://png.pngtree.com/png-vector/20210530/ourmid/pngtree-edutech-illustration-boy-steaming-laptop-and-teacher-png-image_3395631.jpg"
                     class="img-fluid" alt="Sample image">

            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 mt-5">
                <?php echo form_open('auth/login'); ?>
             <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">Email address</label>

                    <input type="email" id="form3Example3" class="form-control form-control-lg"
                           placeholder="Enter a valid email address" name="email" required  />
                           <?php echo form_error('email'); ?>

                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                    <label class="form-label" for="form3Example4">Password</label>

                    <input type="password" id="form3Example4" class="form-control form-control-lg"
                           placeholder="Enter password" name="password" required  min="4"  />
                           <?php echo form_error('password'); ?>

                </div>

                <div class="text-center text-lg-start mt-4 pt-2">
                    <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>

                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>


</section>
