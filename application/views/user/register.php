<?php include(APPPATH . 'views/layouts/header.php'); ?>
<?php include(APPPATH . 'views/layouts/nav.php'); ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6">
                                                <p class="text-primary">Add User</p>       

                    <img src="<?php echo base_url('ressources/hero.png'); ?>"class="img-fluid" />
                </div>

                <div class="col-lg-6">
                    <div class="card-body">
                        <?php echo form_open('auth/saveUser'); ?>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example1cg">Your Name</label>
                            <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="userName" required />
                            <?php echo form_error('userName'); ?>

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3cg">Your Email</label>
                            <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="email" required />
                            <?php echo form_error('email'); ?>

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example4cg">Password</label>
                            <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password" required min="4" />
                            <?php echo form_error('password'); ?>

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                            <input type="password" id="form3Example4cdg" class="form-control form-control-lg" name="conf_password"  required min="4" />
                            <?php echo form_error('conf_password'); ?>

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="choixFruit">Role</label>
                            <select id="choixRole" name="roles" class="form-control form-control-lg "required >
                                <option value="etudiant">Student</option>
                                <option value="enseignant">Teacher</option>
                                <option value="administrateur">Administrator</option>
                            </select>
                            <?php echo form_error('roles'); ?>

                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-block btn-lg gradient-custom-4 text-body">Register</button>
                        </div>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>