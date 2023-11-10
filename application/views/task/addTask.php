<?php include(APPPATH . 'views/layouts/header.php'); ?>
<?php include(APPPATH . 'views/layouts/nav.php'); ?>

<div class="container-fluid">
    
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6">
                            <p class="text-primary">Add Task</p>       

                    <img src="<?php echo base_url('ressources/hero.png'); ?>"class="img-fluid" />
                </div>

                <div class="col-lg-6">
                    <div class="card-body">
                      <?php echo form_open('task/save'); ?>
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="form-outline mb-4">
                <div class="form-outline">
                    <label class="form-label" for="form6Example1">Role</label>
                    <select id="choixRole" name="roles" class="form-control" required>
                        <option value="etudiant">Student</option>
                        <option value="enseignant">Teacher</option>
                        <option value="administrateur">Administrator</option>
                    </select>
                    <?php echo form_error('roles'); ?>

                </div>
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="form6Example3">Name</label>

                <select name="user_id" id="choixUtilisateur" class="form-control" required>
                </select>
                <?php echo form_error('user_id'); ?>

            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="form6Example3">Date</label>

                <input name="validation"  type="date" id="form6Example3" class="form-control" required />
                <?php echo form_error('validation'); ?>

            </div>


            <!-- Message input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form6Example7">Description </label>

                <textarea name="description" class="form-control" id="form6Example7" rows="4" required></textarea>
                <?php echo form_error('description'); ?>

            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Add</button>
            <?php echo form_close() ?>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<script>
    const selectRole = document.getElementById("choixRole");
    const selectUtilisateur = document.getElementById("choixUtilisateur");

    selectRole.addEventListener("change", function () {
        const selectedRole = selectRole.value;
                         

            $.ajax({
               
                url:'http://localhost/repository/monprojetci2/task/getUsersByRole',
                method: "GET",
                dataType: "json",
                data: { role: selectedRole },
                success: function (data) {
                    // Effacez les options actuelles
                    selectUtilisateur.innerHTML = "";

                    // Remplissez la liste déroulante avec les nouvelles options
                    data.forEach(user => {
                        const option = document.createElement("option");
                        option.value = user.id; // La valeur peut être l'ID de l'utilisateur
                        option.text = user.userName; // Le texte peut être le nom de l'utilisateur
                        selectUtilisateur.appendChild(option);
                    });
                }
               
            });
    });
</script>

</html>