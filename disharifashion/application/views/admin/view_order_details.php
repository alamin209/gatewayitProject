<?php include('header.php'); ?>

	<div class="inner_content">
		<!-- /inner_content_w3_agile_info-->
		<div class="inner_content_w3_agile_info">
			<!-- /agile_top_w3_grids-->
			<div class="agile_top_w3_grids">
                <?php
                	if($this->session->userdata('update')){

                		print '<div class="alert alert-success">'.$this->session->userdata('update').'</div>';
                		$this->session->unset_userdata('update');

                	}elseif($this->session->userdata('delete')){

                		print '<div class="alert alert-danger">'.$this->session->userdata('delete').'</div>';
                		$this->session->unset_userdata('delete');
                	}
                ?>
				<div class="block-content collapse in">				 
                    <div class="span12">
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover roni">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Customer Details</th>
                                    <th>Product Details</th>
                                    <th>Shipping Address</th>
                                    <th>Payment Method</th>
                                    <th>Product Image</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
                            		$i=0;
                                    $totalPrice = 0;
                            		foreach ($view_details as $order) {
                                    $i++;

                            	?>
                                    <tr>
                                        <td class="center"><?php print $i;?></td>
                                        <td class="center">
                                            <!-- <b>Id:</b> <?php print $order->order_custid;?><br> -->
                                            <b>Name:</b> <?php print $order->customer_name;?><br>
                                            <b>Email:</b> <?php print $order->customer_email;?><br>
                                            <b>Mobile:</b> <?php print $order->mobile;?><br>
                                            <b>Address:</b> <?php print $order->shipping_addr;?><br>
                                            <b>Post Code:</b> <?php print $order->place_code;?><br>
                                        </td>   
                                        <td class="center">
                                            <b>Product Code:</b> <?php print $order->product_code;?><br>
                                            <b>Product Catid:</b> <?php print $order->prod_catid;?><br>
                                            <b>Product SubCatid:</b> <?php print $order->prod_subcatid;?><br>
                                            <b>Quantity:</b> <?php print $order->quantity;?><br>
                                            <b>Total Price:</b> <?php print $order->amount.' tk';?><br>
                                            <b>Order Date:</b> <?php print $order->order_date;?><br>
                                        </td>
                                        <td class="center">
                                            <b>Name:</b> <?php print $order->receiver_name;?><br>
                                            <b>Address:</b> <?php print $order->address1;?><br>
                                            <b>Mobile No:</b> <?php print $order->rec_numberno;?><br>
                                            <b>City:</b> <?php print $order->city;?><br>
                                            <b>District:</b> <?php print $order->district;?><br>
                                        </td>
                                        <td class="center">
                                            <b>Payment by: </b> <?php print $order->payment;?><br>
                                        </td>  
                                        <td class="center">
                                            <a href="<?= base_url($order->product_image);?>" target="_blank">
                                            <img src="<?= base_url($order->product_image);?>" height="100" width="150">
                                        </td>
                                        <?php 
                                            $totalPrice = $totalPrice + $order->amount;
                                            //echo $totalPrice;
                                        ?>                   
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <div class="mini-cart-total">
                            <table align="center" height="150px" width="300px" border="1px" cellpadding="15px" cellpadding="25px">
                               
                                <tr class="btn-danger">
                                    <td class="right" align="center" colspan="2"><b>Pricing Details</b></td>
                                </tr>
                                <tr class="btn-primary">
                                    <td class="right"><b>Cart Sub Total:</b></td>
                                    <td class="right" align="center"><?= $totalPrice.'tk'; ?></td>
                                </tr>
                                
                                <tr class="btn-success">
                                    <td class="right"><b>Total Amount:</b></td>
                                    <td class="right" align="center">
                                        <?php echo $totalPrice.'tk'; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="right"><b>Action:</b></td>
                                    <td class="right">
                                        <div class="dropdown">
                                            <button class="btn btn-primary" type="button"
                                                data-toggle="dropdown">Delivery Pending<span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="<?= base_url('Super_admin/ProductDelivered/'.$order->cust_unique_name) ?>">
                                                        Product Delivered
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?= base_url('Super_admin/CancleOrder/'.$order->cust_unique_name) ?>">
                                                        Cancel Order
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                            </table>
                        </div>

                        <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
                        <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
                        <div id="pagination">
                            <?php //echo $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>				         
			</div>							
		</div><!-- //inner_content_w3_agile_info-->
	</div>

<?php include('footer.php'); ?>