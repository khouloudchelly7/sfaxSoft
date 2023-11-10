<body>
    <h1>Add Customer</h1>

    <?php echo validation_errors(); // Display any form validation errors ?>

    <form method="post" action="<?php echo site_url('Home/add_customer'); ?>">
        <label for="name">customerName:</label>
        <input type="text" name="customerName" id="customerName" value="<?php echo set_value('customerName'); ?>" required>
        <br>

          <label for="name">phone:</label>
        <input type="text" name="phone" id="phone" value="<?php echo set_value('phone'); ?>" required>
        <br>
  
        <label for="name">address:</label>
        <input type="text" name="address" id="address" value="<?php echo set_value('address'); ?>" required>
        <br>
        
       <label for="name">city:</label>
        <input type="text" name="city" id="city" value="<?php echo set_value('city'); ?>" required>
        <br>
        
          <label for="name">country:</label>
        <input type="text" name="country" id="country" value="<?php echo set_value('country'); ?>" required>
        <br>

        <input type="submit" value="Add Customer">
    </form>

    <p><a href="<?php echo site_url('Home'); ?>">Back to Customer List</a></p>
</body>
</html>
