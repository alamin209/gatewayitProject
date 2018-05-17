<style type="text/css">
	tr td{
		padding: 10px;
	}
</style>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="topnavarea">
				<a href="<?= base_url('welcome/');?>" title="HomePage">Home</a> /<a href="#" class='txtLocation'>Grocery Bazar</a>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="leftmenuarea menudisplay">
				<div class="leftmenu">
					<?php include('leftmenu.php');?>
				</div>
			</div>
			
			<div class="rightcontentarea">
				<div class="headarea">
					<div class="headtext">Grocery Items</div>
				</div>

				<?php
                    $message = $this->session->userdata('message');
                    if (isset($message)) {
                       // echo '<div class="alert alert-success">' . $message . "</div>";
                        echo '<script>alert("Item Added");</script>';
                        $this->session->unset_userdata('message');
                    }

                ?>

				<div class="navigationarea">
					<div class="navigation">
						<div style="float:left;width:50%;padding: 18px 0 0 0;">Total <?php echo count($Grocery_items);?> items</div>
					</div>
				</div>

				<div class="innerproductarea">
					<table width="100%" border="1" >
						<tbody>

							<tr class="listtexttop">
								<td align="left" bgcolor="#ff6a00">Name</td>
								<td align="left" bgcolor="#ff6a00">Price / Unit</td>
								<td bgcolor="#ff6a00">Quantity</td>
								<td bgcolor="#ff6a00">Add</td>
							</tr>

							<?php
								foreach($Grocery_items as $items){
							?>
								
								<form action="<?= base_url('Add_cart/grocery_cart/'.$items->id);?>" method="post">
									<tr class="listdesign">
										<td align="left"><?= $items->prod_name; ?></td>
										<td align="left">Tk ৳<?= $items->prod_price; ?>&nbsp;/&nbsp;1 Kg</td>
										<td align="center">
											<select name="qty">
												<option value="0">0</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
												<option value="10">10</option>
											</select>
										</td>
										<td align="center">
											<button class="btn btn-primary">Add to cart</button>
										</td>
									</tr>
								</form>

							<?php } ?>
						</tbody>
					</table>
					<br clear="all"/>
					<p align="center">
						<a href="<?= base_url('Add_cart/show_cart');?>">
							<button class="btn btn-danger">Show your Busket</button>
						</a>
					</p>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>