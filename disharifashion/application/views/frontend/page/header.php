<!-- header_top -->
<div class="top_bg">
<div class="container">
<div class="header_top">
  <div class="top_left">
    <h2></h2>
  </div>
  <div class="top_right">
    <ul>
      <li><a href="<?= base_url('add_cart/show_cart');?>">Cart ( <?php echo $this->cart->total_items(); ?> )</a></li>|

      <?php 
        $customerName = $this->session->userdata('name');;
        if($customerName != NULL){ ?>

        <li><a href="#"><?php echo $this->session->userdata('name');?></a></li>|

      <?php }else{ ?>

      <li><a href="">Guest</a></li>|

      <?php } ?>

      <?php 
        $customer_id = $this->session->userdata('customer_id');
        if($customer_id != NULL){ ?>

        <li><a href="<?= base_url('checkout/logout');?>">Logout</a></li>|

      <?php }else{ ?>

        <li class="login" >
            <div id="loginContainer"><a href="#" id="loginButton"><span>Login</span></a>
                <div id="loginBox">                
                    <form id="loginForm">
                            <fieldset id="body">
                              <fieldset>
                                      <label for="email">Email Address</label>
                                      <input type="text" name="email" id="email">
                                </fieldset>
                                <fieldset>
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password">
                                 </fieldset>
                                <input type="submit" id="login" value="Sign in">
                              <label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>
                          </fieldset>
                        <span><a href="#">Forgot your password?</a></span>
               </form>
                </div>
            </div>
        </li>|

      <?php } ?>

    </ul>
  </div>
  <div class="clearfix"> </div>
</div>
</div>
</div>
<!-- header -->
<div class="header_bg">
<div class="container">
  <div class="header">
    <div class="logo">
      <a href="<?= base_url('welcome/');?>">
        <img src="<?= base_url('assets/front/');?>images/Dishari.png" alt=""/>
      </a>
    </div>
    <!-- start header_right -->
    <div class="header_right">
    <div class="create_btn">
      
    </div>
   
    <div class="search">
        <form action="" method="post">
          <input type="text" name="searchin" value="" placeholder="search...">
        <input name="submit" type="submit" value="">
      </form>
    </div>
    <div class="clearfix"> </div>
    </div>
    <!-- start header menu -->
    <ul class="megamenu skyblue">
      <li><a class="color1" href="<?= base_url('welcome/');?>">Home</a></li>
      <li><a class="color1" href="#">About US</a>
        <div class="megapanel">
          <div class="row">
            <div class="col1">
              <div class="h_nav">
                <h4>About</h4>
                <ul>
                  <li><a href="#">Mission</a></li>
                </ul> 
              </div>              
            </div>

          </div>
          <div class="row">
            <div class="col2"></div>
            <div class="col1"></div>
            <div class="col1"></div>
            <div class="col1"></div>
            <div class="col1"></div>
          </div>
            </div>
        </li>
        <li><a class="color1" href="<?= base_url('welcome/Contact');?>">Contact_Us</a></li>
     </ul> 
  </div>
</div>
</div>