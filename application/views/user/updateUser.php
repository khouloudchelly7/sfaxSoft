<?php include(APPPATH . 'views/layouts/header.php'); ?>
<?php include(APPPATH . 'views/layouts/nav.php'); ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6">
                                                <p class="text-primary">Update User</p>       

                    <img src="https://images.ctfassets.net/rz1oowkt5gyp/1IgVe0tV9yDjWtp68dAZJq/36ca564d33306d407dabe39c33322dd9/TaskManagement-hero.png" class="img-fluid" />
                </div>

                <div class="col-lg-6">
                    <div class="card-body">
                        <?php echo form_open('user/update/' . $userupdate->id); ?>
                          

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example1cg">Your Name</label>
                            <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="userName"  value="<?php echo $userupdate->userName; ?>" required />
                          <?php echo form_error('userName'); ?>

                        </div>

                       <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3cg">Your Email</label>
                            <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="email" value="<?php echo $userupdate->email; ?>"required />
                            <?php echo form_error('email'); ?>

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example4cg">Password</label>
                            <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password" required min="4"/>
                            <?php echo form_error('password'); ?>

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                            <input type="password" id="form3Example4cdg" class="form-control form-control-lg" name="conf_password"  required min="4" />
                            <?php echo form_error('conf_password'); ?>

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="choixRole">Role</label>
                            <select id="choixRole" name="roles" class="form-control form-control-lg "required >
                                <option value="etudiant">Student</option>
                                <option value="enseignant">Teacher</option>
                                <option value="administrateur">Administrator</option>
                            </select>
                            <?php echo form_error('roles'); ?>

                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-block btn-lg gradient-custom-4 text-body">Update</button>
                        </div>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    var selectRole = document.getElementById("choixRole");
    var roleValue = "<?php echo $userupdate->role ?>";
    for (let i = 0; i < selectRole.options.length; i++) {
        
        if (selectRole.options[i].value === roleValue) {
            selectRole.selectedIndex = i;
            break;
        }
    }
</script>



</body>
</html>