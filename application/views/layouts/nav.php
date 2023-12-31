<nav class="mb-1 navbar navbar-expand-lg navbar-dark bg-primary lighten-1">
    <a class="navbar-brand" href="#">MySchol</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
            aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url("task") ?>">Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>

            <li class="nav-item">

                <?php
                $user = $this->session->userdata('user');
                if ($user->role == "administrateur") {
                    ?>
                    <a class="nav-link" href="<?= base_url("task/addTask") ?>">Add Task</a>
                    <?php
                }
                ?>
            </li>
            <li class="nav-item">
                <?php
                if ($user->role == "administrateur") {
                    ?>
                    <a class="nav-link" href="<?= base_url("auth/register") ?>">Add User</a>
                    <?php
                }
                ?>
            </li>
             <li class="nav-item">
                <?php
                if ($user->role == "administrateur") {
                    ?>
                    <a class="nav-link" href="<?= base_url("user") ?>">List User</a>
                    <?php
                }
                ?>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url("auth/logout") ?>">  Logout</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto nav-flex-icons">
            <li class="nav-item nav-link active">
                <?php
                if ($this->session->userdata('user')) {
                    $user = $this->session->userdata('user');
                    echo $user->email;
                }
                ?>
            </li>
            <li class="nav-item avatar">
                <a class="nav-link p-0" href="#">
                    <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.webp" class="rounded-circle z-depth-0"
                         alt="avatar image" height="35">
                </a>
            </li>
        </ul>
    </div>
</nav>