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
					<h3>
						Cart Details(<?php echo $this->cart->total_items(); ?>)
					</h3>
					<div class="checkout wrapper no-margin">

							<div class="cart-info table-responsive">
								<table class="table table-bordered table-hover">
									<thead>
										<tr>
											<td class="image">Image</td>
											<td class="name">Product Name</td>
											<td class="model">Code</td>
											<td class="quantity">Quantity</td>
											<td class="price">Unit Price</td>
											<td class="total"> Sub-Total</td>
										</tr>
									</thead>
									<tbody>
										<?php
									        $contents = $this->cart->contents();
									        //print_r($contents);exit;
									        foreach ($contents as $value){
									        $id = $this->cart->total_items();
									    ?>
										<tr>
											<td class="image" data-label="Image">
												<a href="">
													<img src="<?= base_url($value['image']);?>" alt="<?= $value['name'];?>" title="<?= $value['name'];?>" height="80px" width="50px" />
												</a>
											</td>
											<td class="name" data-label="Product Name">
												<a href=""><?= $value['name'];?></a>
												<div class="cart-option"></div>
											</td>
												
											<td class="model" data-label="Model"><?= $value['code'];?></td>
											<td class="quantity" data-label="Quantity" >
												<form action="<?= base_url('Add_cart/Update_cart/'.$value['rowid']);?>" method="post">
													<input type="number" name="qty" value="<?php print $value['qty'];?>" >
													&nbsp;
													<button type="submit" class="btn btn-primary">Update</button>
												</form>
												<a href="<?php print base_url('remove/'.$value['rowid']);?>">
													<img src="<?= base_url('assets/front/images/remove.png');?>" alt="Remove" title="Remove" />
												</a>
											</td>
											<td class="price" data-label="Unit Price"  ><?= $value['price'];?> TK</td>
											<td class="total" data-label="Total">
												<?php
													$TotalPrice = $value['price']*$value['qty'];
													echo $TotalPrice.' Tk';
												?>
											</td>

											<input type="hidden" name="id" value="<?php print $value['id'];?>">
										</tr>
										<?php } ?>					
									</tbody>
								</table>
							</div>
					  
						<div class="row">
							<div  class="col-lg-9 col-md-9">  
								<div class="buttons clearfix">
									<div class="center pull-left">
										<?php 
											$customer_id = $this->session->userdata('customer_id');
											$shipping_id = $this->session->userdata('shipping_id');
											if($customer_id != NULL && $shipping_id == NULL){ ?>
												<a href="<?= base_url('Checkout/Shipping_form');?>" class="button btn btn-theme-default">
													<button type="submit" class="btn btn-success"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Checkout</button>
												</a>
										<?php	}else if( $customer_id != NULL && $shipping_id != NULL){ ?> 
												<a href="<?= base_url('Checkout/Payment_form');?>" class="button btn btn-theme-default">
													<button type="submit" class="btn btn-success"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Checkout</button>
												</a>
										<?php }else{ ?>
												<a href="<?= base_url('Checkout/index');?>" class="button btn btn-theme-default">
													<button type="submit" class="btn btn-success"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Checkout</button>
												</a>
										<?php } ?>
									</div>
									<div class="center pull-left">
										<a href="<?php print base_url('add_cart/remove_item');?>" class="button btn btn-theme-default ">
											<button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Remove All</button>
										</a>
									</div>

									<div class="center pull-left">
										<a href="<?= base_url('/');?>" class="button btn btn-theme-default ">
											<button type="submit" class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i> Continue Shopping</button>
										</a>
									</div>
								</div>
							</div>  
							
							<div class="col-lg-3 col-md-3">
								<div class="cart-total clearfix">
									<table id="total">
										
										<tr>
											<td class="right"><b>Grand Total:</b>&nbsp;</td>
											<td class="right pull-right">
												<?php
													$g_total = $this->cart->total();
													$sdata=array();
													$sdata['g_total']=$g_total;
													$this->session->set_userdata($sdata);
													echo $g_total.' tk';
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
<hr>