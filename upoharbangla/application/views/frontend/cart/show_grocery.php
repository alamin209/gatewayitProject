<section id="columns" class="offcanvas-siderbars">
	<div id="breadcrumb">
		<ol class="breadcrumb container">
			<li><a href=""><span>Home</span></a></li>
			<li><a href=""><span>Shopping Cart</span></a></li>
		</ol>
	</div>
	
	<div class="container">
		<div class="row">

			<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div id="content">
					<h1 style="color: #000;">Cart Details(<?php echo $this->cart->total_items(); ?>)</h1>
					<div class="checkout wrapper no-margin">

							<div class="cart-info table-responsive">
								<table class="table table-bordered table-hover">
									<thead>
										<tr>
											<td class="name">Product Name</td>
											<td class="quantity">Quantity</td>
											<td class="price">Unit Price</td>
											<td class="total"> Sub-Total</td>
										</tr>
									</thead>
									<tbody>
										<?php
									        $contents = $this->cart->contents();
									        foreach ($contents as $value){
									    ?>
										
										<tr>
											<td class="name" data-label="Product Name">
												<a href=""><?= $value['name'];?></a>
												<div class="cart-option"></div>
											</td>

											<td class="quantity" data-label="Quantity" >
												<form action="<?= base_url('Add_cart/Update_grocery_cart/'.$value['rowid']);?>" method="post">
													<input type="number" name="qty" value="<?php print $value['qty'];?>" >
													&nbsp;
													<input type="submit" class="" name="submit" value="Update" style="color: green;">
													&nbsp;
												</form>
												<a href="<?= base_url('Add_cart/remove_grocery/'.$value['rowid']); ?>" onclick="return confirm('Are you sure?');">Remove
												</a>
											</td>

											<td class="price" data-label="Unit Price">
												<?= $value['price'];?>.TK
											</td>

											<td class="total" data-label="Total">
												<?php
													$TotalPrice = $value['price']*$value['qty'];
													echo $TotalPrice.' Tk';
												?>
											</td>

										</tr>

										<?php } ?>
																
									</tbody>
								</table>
							</div>
					  
						<div class="row">
							<div  class="col-lg-9 col-md-9">  
								<div class="buttons clearfix">
									<div class="pull-left left">
										<?php 
											$customer_id = $this->session->userdata('customer_id');
											$shipping_id = $this->session->userdata('shipping_id');
											if($customer_id != NULL && $shipping_id == NULL){ ?>
												<a href="<?= base_url('Checkout/Shipping_form');?>" class="button btn btn-theme-default"><button class="btn btn-success">Checkout</button></a>
										<?php	}else if( $customer_id != NULL && $shipping_id != NULL){ ?> 
												<a href="<?= base_url('Checkout/Payment_form');?>" class="button btn btn-theme-default"><button class="btn btn-success">Checkout</button></a>
										<?php }else{ ?>
												<a href="<?= base_url('Checkout/index');?>" class="button btn btn-theme-default"><button class="btn btn-success">Checkout</button></a>
										<?php } ?>

											<a href="<?php print base_url('add_cart/remove_item');?>" class="button btn btn-theme-default "><button class="btn btn-danger">Remove All</button></a>
										
											<a href="<?= base_url('/');?>" class="button btn btn-theme-default "><button class="btn btn-primary">Continue Shopping</button></a>
										
									</div>
									
								</div>
							</div>  
							
							<div class="col-lg-3 col-md-3">
								<div class="cart-total clearfix">
									<table id="total">
										<tr>
											<td class="right"><b>Grand Total:</b></td>
											<td class="right pull-right">
												<?php
													$g_total = $this->cart->total();
													$sdata=array();
													$sdata['g_total']=$g_total;
													$this->session->set_userdata($sdata);
													echo $g_total.'tk';
												?>
											</td>
										</tr>
									</table>
								</div>
							</div>

						</div>
					</div>	
				</div>  
			</section> 
		</div>
	</div>
</section>