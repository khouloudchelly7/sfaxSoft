<?php include(APPPATH . 'views/layouts/header.php'); ?>
<?php include(APPPATH . 'views/layouts/nav.php'); ?>

<div class="container-fluid">
     <?php if ($this->session->flashdata('response')): ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('response'); ?>
        </div>
    <?php endif; ?>
    <div class="card-header">
        <p class="text-primary">List Task</p>       

                    <img src="<?php echo base_url('ressources/hero.png'); ?>"class="img-fluid" />
    </div>
    <table id="dt-basic-checkbox" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="th-sm">Etat</th>
                <th class="th-sm">Description</th>
                <th class="th-sm">Created By</th>
                <th class="th-sm">Role</th>
                <th class="th-sm">Date validation</th>
                <?php
                $user = $this->session->userdata('user');
                if ($user->role == "administrateur") {
                    ?>
                    <th class="th-sm">Action</th>
                <?php } ?>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task) { ?>
                <tr>
                    <td>
                        <div class="form-check">
                            <input type="checkbox" class="etat-checkbox" data-task-id="<?php echo $task->id ?>" name="etat" value="<?php echo $task->id ?> "
                            <?php
                            if ($task->etat) {
                                echo 'checked';
                            }
                            ?>
                            <?php
                            if ($user->role == "administrateur" && $user->id != $task->user_id) {
                                echo 'disabled';
                            }
                            ?>

                                   >

                        </div>
                    </td>
                    <td><?php echo $task->description ?></td>
                    <td><?php echo $task->userName ?></td>
                    <td><?php echo $task->role ?></td>

                    <td><?php echo $task->date_validation ?></td>
                    <?php
                    $user = $this->session->userdata('user');
                    if ($user->role == "administrateur") {
                        ?>
                  <td>
    <a href="<?= base_url("Task/edit/$task->id") ?>" class="btn btn-primary" onclick="return confirm('Are you sure?')">Update</a>

    <a href="<?= base_url("Task/delete/$task->id") ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
</td>
                                <?php } ?>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Description</th>
                                    <th>Created By</th>
                                    <th>Role</th>
                                    <th>Date validation</th>
                                    <?php
                                    $user = $this->session->userdata('user');
                                    if ($user->role == "administrateur") {
                                        ?>
                                        <th>Action</th>
                                    <?php } ?>
                                </tr>
                            </tfoot>
                            </table>
                            <!--end table -->
                            </div>
                            <?php include(APPPATH . 'views/layouts/footer.php'); ?>


                            <script>
                                // Sélectionnez toutes les cases à cocher par leur classe
                                var checkboxes = document.querySelectorAll(".etat-checkbox");
                                function      confirmupdate(id) {
                                    var confirmation = confirm("Voulez-vous vraiment modifier cet élément ?");
                                    if (confirmation) {
                                        var URL = "<?php echo site_url('Task/edit/'); ?>" + "/" + id;
                                        console.log(URL);
                                        $.ajax({
                                            type: "POST",
                                            url: URL,
                                            success: function (response) {
                                                // Traitement de la réponse du serveur si nécessaire
                                                alert("modification réussie !");
                                            },
                                            error: function (error) {
                                                alert("Erreur lors de la modification : " + error.responseText);
                                            }
                                        });
                                    } else {
                                        // Annuler la suppression
                                        alert("Annuler la suppression");
                                    }
                                }

                                function confirmDelete(id) {
                                    var confirmation = confirm("Voulez-vous vraiment supprimer cet élément ?");
                                    if (confirmation) {
                                        var URL = "<?php echo site_url('Task/delete/'); ?>" + "/" + id;
                                        console.log(URL);
                                        $.ajax({
                                            type: "POST",
                                            url: URL,
                                            success: function (response) {
                                                // Traitement de la réponse du serveur si nécessaire
                                                alert("Suppression réussie !");
                                            },
                                            error: function (error) {
                                                alert("Erreur lors de la suppression : " + error.responseText);
                                            }
                                        });
                                    } else {
                                        // Annuler la suppression
                                        alert("Annuler la suppression");
                                    }
                                }

                                // Ajoutez un gestionnaire d'événement "change" à chaque case à cocher
                                checkboxes.forEach(function (checkbox) {
                                    checkbox.addEventListener("change", function () {
                                        var taskID = this.getAttribute("data-task-id");
                                        var isChecked = this.checked;
                                        console.log("Tâche ID : " + taskID + ", Est cochée : " + isChecked);
                                        const confirmation = confirm("Voulez-vous vraiment effectuer ce changement ?");
                                        if (confirmation) {
                                            alert("Changement accepté !");
                                            var postData = {
                                                taskID: taskID,
                                                isChecked: isChecked,
                                            };
                                            var controllerURL = "<?php echo site_url('Task/updateTaskStatus'); ?>";
                                            $.ajax({
                                                type: "POST",
                                                url: controllerURL,
                                                data: postData,
                                                success: function (response) {
                                                    // Traitement de la réponse du serveur si nécessaire
                                                    console.log(response);
                                                }
                                            });
                                        } else {
                                            // Annuler le changement en rétablissant l'état précédent
                                            this.checked = !isChecked;
                                            alert("Changement annulé !");
                                        }
                                    });
                                });







                            </script>
                            </body>
                            </html>
