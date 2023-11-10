<?php include(APPPATH . 'views/layouts/header.php'); ?>
<?php include(APPPATH . 'views/layouts/nav.php'); ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6">
                            <p class="text-primary">Update Task</p>       

                    <img src="<?php echo base_url('ressources/hero.png'); ?>"class="img-fluid" />
                </div>

                <div class="col-lg-6">
                    <div class="card-body">
                        <?php echo form_open('task/update/' . $task->id); ?>
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

                            <select name="user_id" id="choixUtilisateur" class="form-control"required >
                            </select>
                            <?php echo form_error('user_id'); ?>

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form6Example3" >Date</label>

                            <input name="validation"  type="date" id="form6Example3" class="form-control" value="<?php echo $task->date_validation; ?>" required />
                            <?php echo form_error('validation'); ?>

                        </div>


                        <!-- Message input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form6Example7">Description </label>

                            <textarea name="description" class="form-control" id="form6Example7" rows="4" required  >
                                <?php echo $task->description; ?></textarea>
                            <?php echo form_error('description'); ?>

                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4">Update</button>
                        <?php echo form_close() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>



<script>

    var selectRole = document.getElementById("choixRole");
    var selectUtilisateur = document.getElementById("choixUtilisateur");
    var roleValue = "<?php echo $task->role ?>";
    var user_id = "<?php echo $task->user_id ?>";
    for (let i = 0; i < selectRole.options.length; i++) {
        if (selectRole.options[i].value === roleValue) {
            selectRole.selectedIndex = i;
            break;
        }
    }

    var selectedRole = selectRole.value;
    sendRequest();
    for (let i = 0; i < selectUtilisateur.options.length; i++) {
        if (selectUtilisateur.options[i].value === user_id) {
            selectUtilisateur.selectedIndex = i;
            break;
        }
    }
    selectRole.addEventListener("change", function () {
        selectedRole = selectRole.value;
        sendRequest();
    });

    function sendRequest() {
        $.ajax({
            url: 'http://localhost/repository/monprojetci2/task/getUsersByRole',
            method: "GET",
            dataType: "json",
            data: {role: selectedRole},
            success: function (data) {
                var selectUtilisateur = document.getElementById("choixUtilisateur");

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
    }

</script>

</html>

