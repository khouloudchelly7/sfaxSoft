<?php include('header.php'); ?>

<div class="container">
    <h1>Customer List</h1>
    <?php  if ($message = $this->session->flashdata('response')) {?>

<div class="alert alert-dismissible alert-success">
<div class="alert alert-success"> <?php echo $message ?>  </div>

</div>
    <?php } ?>
    <div class="row">
        <div class="col-lg-12">
     <?php echo anchor("home/create", "Create", array('class' => 'btn btn-primary')); ?>

        </div>


    <table class="table table-hover">

        <thead>
            

            <tr>
                <th scope="col">Id</th>

                <th scope="col">Customer Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Address </th>
                <th scope="col">City </th>
                <th scope="col">Country </th>
                <th scope="col">Action </th>

            </tr>

        </thead>
        <tbody>
<?php if (count($customers)) { ?>
    <?php foreach ($customers as $customer) { ?>
        <tr>
            <td><?php echo $customer->id; ?></td>
            <td><?php echo $customer->customerName; ?></td>
            <td><?php echo $customer->phone; ?></td>
            <td><?php echo $customer->address; ?></td>
            <td><?php echo $customer->city; ?></td>
            <td><?php echo $customer->country; ?></td>
            <td>
               <?php echo anchor("home/edit/{$customer->id}", "Update", array('class' => 'btn btn-primary')); ?>
               <?php echo anchor("home/delete/{$customer->id}", "Delete", array('class' => 'btn btn-danger')); ?>


            </td>
        </tr>
    <?php } ?>
<?php } else { ?>
    <tr>
        <td colspan="7">Aucun client n'a été trouvé.</td>
    </tr>
<?php } ?>







        </tbody>
    </table>
</div>
<?php include('footer.php'); ?>