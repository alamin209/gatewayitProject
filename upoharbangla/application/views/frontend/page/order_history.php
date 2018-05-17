<div class="container">
	<div class="row">
		<div class="col-md-12">
			  <div class="topnavarea">
					<a href="<?= base_url('welcome/');?>" title="HomePage">Home</a> /&nbsp;Order History
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
					<div class="headtext">Your Orders</div>
				</div>

				<div class="innerbodyarea">
					<div class="panel panel-info">
					    <div class="panel-heading"></div>
					    <div class="panel-body">
					        <?php
					            $message = $this->session->userdata('message');
					            if (isset($message)) {
					                echo '<div class="alert alert-danger">' . $message . "</div>";
					                $this->session->unset_userdata('message');
					            }
					        ?>


					        <style type="text/css">
							    #status{
							        color:red;
							        text-transform: uppercase;
							    }
							</style>

							<div class="inner_content">
								<div class="inner_content_w3_agile_info">
									<div class="agile_top_w3_grids">
										<div class="block-content collapse in ">
							                <div class="alert alert-info" style="text-align: center;font-size: 16px;">
							                    Track your order
							                </div>
							                <div class="span12">
							                    <table id="sample-table-2" class="table table-striped table-bordered table-hover roni">
							                        <thead>
							                            <tr>
							                                <th>SN</th>
							                                <th>Order Id</th>
							                                <th>Order Date</th>
							                                <th>Order Total</th>
							                                <th>Order Status</th>
							                                <th>Action</th>
							                            </tr>
							                        </thead>
							                        <tbody>
							                        	<?php
							                        		if($order_info){
							                        		$i=0;
							                        		foreach ($order_info as $order) {                            		
							                                $i++;
							                        	?>
							                                <tr>
							                                    <td class="center"><?php echo $i;?></td>
							                                    <td class="center"><?php echo $order->order_id;?></td>
							                                    <td class="center"><?php echo $order->order_date;?></td>
							                                    <td class="center"><?php echo 'BDT '.$order->order_total;?></td>   
							                                    <td class="center" id="status"><?php print $order->order_status;?></td>
							                                       
							                                    <td class="center">
							                                        <a href="<?= base_url('User/ViewOrderDetails/'.$order->order_id) ?>">
							                                                View
							                                        </a>
							                                    </td>                        
							                                </tr>
							                            <?php } }else{ echo "nothing found"; } ?>
							                        </tbody>
							                    </table>

							                </div>
							            </div>				         
									</div>							
								</div>
							</div>

					    </div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
