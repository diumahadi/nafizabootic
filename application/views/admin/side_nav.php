<div class="col-md-3">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <!-- Main menu -->
            <li class="current"><a href="<?php echo base_url() ?>login/dashboard">
                    <i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url() ?>order/orders">
                    <i class="glyphicon glyphicon-tasks"></i> Orders (<?php echo $this->order_model->getTotalPendingOrders() ?>)</a></li>
            <li><a href="<?php echo base_url() ?>brand">
                    <i class="glyphicon glyphicon-tasks"></i> Brand</a></li>
            <li><a href="<?php echo base_url() ?>item">
                    <i class="glyphicon glyphicon-tasks"></i> Item</a></li>
            <li><a href="<?php echo base_url() ?>expense/expenseShow">
                    <i class="glyphicon glyphicon-tasks"></i> Expenses</a></li>
            <li><a href="<?php echo base_url() ?>slider">
                    <i class="glyphicon glyphicon-tasks"></i> Slider</a></li>
            <li><a href="<?php echo base_url() ?>contactus">
                    <i class="glyphicon glyphicon-tasks"></i> Contact Us</a></li>
            <li><a href="<?php echo base_url() ?>event">
                    <i class="glyphicon glyphicon-tasks"></i> Events</a></li>
            <li><a href="<?php echo base_url() ?>expense/expenseHead">
                    <i class="glyphicon glyphicon-tasks"></i> Expense Head</a></li>
            <li><a href="<?php echo base_url() ?>item_group">
                    <i class="glyphicon glyphicon-tasks"></i> Item Group</a></li>

            <?php	if($userInfo->authority=='ROLE_DEVELOPER' || $userInfo->authority=='ROLE_ADMIN') { ?>
                <li><a href="<?php echo base_url() ?>user"><i class="glyphicon glyphicon-tasks"></i> User</a></li>
                <li><a href="<?php echo base_url() ?>developer"><i class="glyphicon glyphicon-tasks"></i> Developer Payments</a></li>
            <?php } ?>
        </ul>
    </div>
</div>