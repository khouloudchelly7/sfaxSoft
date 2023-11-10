<?php include(APPPATH . 'views/layouts/header.php'); ?>
<?php include(APPPATH . 'views/layouts/nav.php'); ?>

<div class="container-fluid">
    <?php if ($this->session->flashdata('response')): ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('response'); ?>
        </div>
    <?php endif; ?>
    <div class="card-header">
        <image src="https://images.ctfassets.net/rz1oowkt5gyp/1IgVe0tV9yDjWtp68dAZJq/36ca564d33306d407dabe39c33322dd9/TaskManagement-hero.png"  class="img-fluid " />
    </div>
    <table id="dt-basic-checkbox" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="th-sm">UserName</th>
                <th class="th-sm">Email</th>
                <th class="th-sm">Role</th>
                <th class="th-sm">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?php echo $user->userName ?></td>
                    <td><?php echo $user->email ?></td>
                    <td><?php echo $user->role ?></td>
                    <td>
                        <a href="<?= base_url("User/edit/$user->id") ?>" class="btn btn-primary" onclick="return confirm('Are you sure?')">Update</a>
                        <a href="<?= base_url("User/delete/$user->id") ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>

                    <td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th>UserName</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>

            </tr>
        </tfoot>
    </table>
    <!--end table -->
</div>
</body>
</html>
