<div class="panel panel-info">
    <div class="panel-heading"> <i class="fa fa-unlock-alt" aria-hidden="true"></i>
        Returning Customer
    </div>
    <div class="panel-body">
        <?php
            $message = $this->session->userdata('message');
            if (isset($message)) {
                echo '<div class="alert alert-danger">' . $message . "</div>";
                $this->session->unset_userdata('message');
            }
        ?>
        <form class="form-vertical" action="<?php print base_url('checkout/login_customer');?>" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input  type="email" value="" name="email_address" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" value="" name="password" class="form-control" placeholder="Enter your password" required> 
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit" name="login">Login</button>
                &nbsp;<a href="<?= base_url('#');?>">Need a Account?</a>
            </div>
        </form> 

    </div>
</div>