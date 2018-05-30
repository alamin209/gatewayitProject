<div class="topcontainer">
	<div class="toparea">
		<div class="container">
			<div class="row">
				<div class="newmobilemenu">
					<ul>
						<li><a href="#" id="mobile_menu_close" class="menunew">Menu</a></li>
						<li><a href="" title="Sign In" class="loginnew">Login</a></li>
						<li><a href="" title="Sign Up" class="accountnew">Signup</a></li>
                        <li><a href="" title="Sign Up" class="aboutus">About Us</a></li>
                        <li><a href="" class="catnew">Catalog</a></li>
						<li><a href="" class="faqnew">FAQ</a></li>
						<li><a href="contact-us.html" class="contactnew">Contact</a></li>
						<li><a id="basketTitleWrapMobile" href="" class="cartnew">Basket</a></li>
					</ul>
				</div>

				<div class="topmenu">
					<ul>
						<li><a href="<?= base_url('welcome/');?>" alt="view homepage" title="View Homepage" class="shome">Home</a></li>
						<li><a href="<?= base_url('welcome/Catelog');?>" class="scat">View Catalog</a></li>
						<li><a href="<?= base_url('welcome/HowToOrder');?>" alt="learn how to order" title="Learn how to order gift to Bangladesh online" class="sorder">How to Order</a></li>
						<li><a href="<?= base_url('welcome/HowToPay');?>" alt="online payment in Bangladesh" title="Learn how to pay for your gift order to BD" class="spay">How to Pay</a></li>
						<li><a href="<?= base_url('welcome/FAQ');?>" alt="frequently asked questions" title="Frequently asked question about gift delivery" class="sfaq">FAQ</a></li>
						<!-- <li><a href="#" alt="track your gift order" title="Track your gift order" class="strack">Track Order</a></li> -->
					</ul>
				</div>

				<div class="topmenu2">
					<ul>
						<?php
							$customer_id = $this->session->userdata('customer_id');
							if($customer_id != NULL){ ?>

								<li><a href="<?= base_url('checkout/logout');?>" title="Sign In" class="saccount">Logout</a></li>

						<?php }else{ ?>

								<li><a href="<?= base_url('checkout/CustomerLogin')?>" title="Sign In" class="saccount">My Account</a></li>

						<?php } ?>

						<?php
							$name = $this->session->userdata('name');
							if(isset($name)){ ?>

								<li>
									<a href="<?= base_url('User/MyAccount');?>" class='saccount'>
									<?= $name ?></a>
								</li>

							<?php }else{ ?>
								<li><a href="<?= base_url('checkout/CustomerRegistration')?>" title="Sign Up" class="saccount">Sign Up</a></li>
						<?php } ?>
                        <li><a href="<?= base_url('welcome/About');?>" alt="about us" title="Contact" class="scontact">About Us</a></li>
						<li><a href="<?= base_url('welcome/Contact');?>" alt="contact us" title="Contact" class="scontact">Contact Us</a></li>
						<li><div id="basketTitleWrap"><a href="<?= base_url('add_cart/show_cart');?>" class="scart" id="basketItemsWrap">Shopping Cart(<?php echo $this->cart->total_items(); ?>)</a></div></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<script>

		$j("#mobile_menu_close").click(function() {

		  $j("#mobile_categories_menu").slideToggle( "swing", function() {

			//scrollToElement("#mobile_categories_menu");

		  });

		});


		$j("#mobile_menu_open").click(function() {

		  $j("#mobile_categories_menu").slideToggle( "swing", function() {

			//scrollToElement("#mobile_categories_menu");

		  });

		});

	</script>

	<div class="logoarea">
		<div class="container">
			<div class="row">
				<div class="col-md-6 logowidth">
					<div class="mobileicon"><a href="#" class="mobilemenu"></a></div>
					<div class="logo">
						<a href="<?= base_url('welcome/');?>"><img src="<?= base_url('assets/front/');?>images/logo.png"></a>
					</div>
					<div class="searchicon"><a href="#" class="searchmenu"></a></div>
				</div>
				<div class="callsearch">
					<div class="searcharea">
                        <form action="<?php echo base_url()?>Welcome/searchByProductName" method="post">
							<input name="searchStr" type="text" id="search" value="Search Gift" class="search" >
							<input name="Submit" type="submit" value="search" class="searchbtn" />
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>