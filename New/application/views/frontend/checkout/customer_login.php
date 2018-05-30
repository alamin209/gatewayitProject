<section id="pav-slideshow" class="pav-slideshow hidden-xs">
    <div class="container">
        <div class="row">    
            <div class="col-lg-12 col-md-12">
                <div class="layerslider-wrapper hidden-xs" >
                    <div class="bannercontainer banner-boxed" style="padding: 5px 0px;margin: 0px 0px;">
                        <div id="content" class="product-detail">
                            <div class="product-info">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
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
										        <form class="form-vertical" action="<?php print base_url('User/user_login');?>" method="post">
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
										                &nbsp;<a href="<?= base_url('checkout/CustomerRegistration');?>">Need a Account?</a>
										            </div>
										        </form> 

										    </div>
										</div>
                                    </div><!-- col-md-8 -->
                                    <div class="col-md-2"></div>
                                </div><!-- row -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>     
        </div>  
    </div>
</section>