<?php include('header.php'); ?>
<div class="container">
    <legend>Create Customer </legend>

    <?php echo form_open('home/update/'. $customer->id, ['classe' => 'form-horizontal']); ?>
    <div class="row">
        <div class="col-lg-6">


            <div class="form-group">
                <label for="exampleInputPassword1">Customer Name</label>
                <input type="text" class="form-control" value="<?php echo $customer->customerName;?>" name="customerName" id="name" placeholder="customerName">
                <?php echo form_error('customerName'); ?> 

            </div>

        </div><br> 
        
        <div class="col-lg-6">

            <div class="form-group">
                <label for="exampleInputPassword1">Phone</label>
                <input type="text" name="phone" class="form-control" value="<?php echo $customer->phone;?>"id="exampleInputPassword1" placeholder="Phone">
                <?php echo form_error('phone'); ?>

            </div>
        </div>
        <br>
        <div class="col-lg-6">

            <div class="form-group">
                <label for="exampleInputPassword1">Address </label>
                <input type="text" name="address" class="form-control"value="<?php echo $customer->address;?>" id="exampleInputPassword1" placeholder="Address">
                <?php echo form_error('address'); ?>

            </div>
        </div>
        <br>
        <div class="col-lg-6">

            <div class="form-group">
                <label for="exampleInputPassword1">City</label>
                <input type="text" name="city"class="form-control" value="<?php echo $customer->city;?>"  id="exampleInputPassword1" placeholder="City">
                <?php echo form_error('city'); ?>

            </div>
        </div><br>
        <div class="col-lg-6">

            <div class="form-group">
                <label for="exampleInputPassword1">Country</label>
                <input type="text"name="country" class="form-control" value="<?php echo $customer->country;?>"  id="exampleInputPassword1" placeholder="Country">
                <?php echo form_error('country'); ?>

            </div>
        </div><br>
        <div class="col-lg-6">
    <button type="submit" class="btn btn-primary">Submit</button>

            <?php echo form_submit('reste', 'Reste', 'class="btn btn-default"'); ?>

        </div>

    </div>
    <fieldset>



</div>




</fieldset>
<?php echo form_close(); ?>

</div>
<?php include('footer.php'); ?>