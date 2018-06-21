<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="topnavarea">
				<a href="" title="HomePage">Home</a> /<a href="" class='txtLocation'>product</a>
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
				<div class="innerbodyarea">
					<form action="<?= base_url('add_cart/'.$product_description->prod_id);?>" method="post" name="addtobasket" enctype="multipart/form-data">

						<div class="productsdetails">

							<div class="left">
								<div id="productImageWrapID_5337">
									<img src="<?= base_url($product_description->image);?>" alt="Live Plant in a boat" border="0" title="Live Plant in a boat" id="SPImage" />
								</div>
							</div>

							<div class="right">
								<h1><?= $product_description->prod_name; ?></h1>
								<div class="fileUploadError" id="fileUploadError">Please Complete All Fields</div>
								<table width="100%" border="0" align="left" cellpadding="3" cellspacing="3" style="margin-top:25px;">

									<tr>
										<th width="44%" height="33" scope="row">Price:</th>
										<td width="56%" height="33">
											<div class="pricedetails"> Tk ৳<?= $product_description->prod_price; ?> 
												<div class="txtSale" style="padding-top:10px;"></div>
											</div>
										</td>
									</tr>
                                    <?php foreach ($product_d  as $d ) {  ?>


                                    <tr>
                                        <?php if($product_description->prod_id ==$d->prod_id) { ?>
                                          <?php   if( !empty($d->op_extra)) {  ?>

                                            <th width="44%" height="33" scope="row"><?php echo $d->op_extra ?>:</th>
                                        <td>


                                                    <select class="form-control input-height" required id="usertype" name="extra">
<!--                                                <option value="">Select Option </option>-->
                                                        <?php foreach ($product_e as $product) { ?>
                                                        <?php if($product->prod_id ==$d->prod_id) { ?>
                                                    <option value="<?php echo $product->extr_id ?>"><?php echo $product->extra_name?></option>
                                                            <?php } ?>
                                                        <?php }  ?>
                                            </select>



                                        </td>
                                    </tr>

                                            <?php   }
                                        else
                                        {
                                           echo "";
                                        }
                                        }
                                            }  ?>

                                    <tr>
										<th height="33" scope="row">Stock:</th>
										<td height="33">Available</td>
									</tr>

									<tr>
										<th height="33" scope="row">Product Code:</th>
										<td height="33" style="line-height:normal;"><?= $product_description->prod_code; ?></td>
									</tr>

									<?php if($product_description->prod_catid == 37){ ?>

									<tr>
										<th height="33" scope="row">Select Cake Flavor:</th>
										<td height="33" style="line-height:normal;">
											<?php
												$prod_catid = $product_description->prod_catid;
												$select_flaver = $this->db->select('*')->from('tbl_flover_weight')->where('prod_catid',$prod_catid)->get()->result();
											?>
											<select name="flaver" class="form-control" style="text-align:center;">
												<?php foreach($select_flaver as $flavers){ ?>

														<option value="<?= $flavers->fw_id?>"><?= $flavers->flaver?></option>

												<?php } ?>
											</select>
										</td>
									</tr>

									<tr><td><p></p></td></tr>

									<tr>
										<th height="33" scope="row">Select Cake Weight:</th>
										<td height="33" style="line-height:normal;">
											<?php
												$prod_catid = $product_description->prod_catid;
												$select_weight = $this->db->select('*')->from('tbl_flover_weight')->where('prod_catid',$prod_catid)->get()->result();
											?>
											<select name="weight" class="form-control" style="text-align:center;">
												<option value="0">--Select Weight--</option>
												<?php
													foreach($select_weight as $weights){ ?>

														<option value="<?= $weights->fw_id?>"><?= $weights->weight.' (tk '.$weights->price.' )'?></option>
														
												<?php } ?>
											</select>
										</td>
									</tr>
									
									<?php } ?>

									<tr>
										<th height="33" scope="row"><div class="productdeshead" style="font-size:13px;">Quantity:</div></th>
										<td height="33" style="line-height:normal;">
											<select name="qty" style="text-align:center;">
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
									</tr>
								</table><br>

								<div class="pull-left"><br>
									<button type="submit" name="submit" class="btn btn-success">Add to Basket</button>
								</div>

								<!--<div class="productPriceWrapRight" id="list_add_button" >
									<a href="javascript:;" id="featuredProduct_859" onClick="return false;" title="Add to Basket" class="buybtn mobilebtn">Add to Basket</a>
								</div>-->

								<!-- <div class="productPriceWrapRight" id="upload_load_button" style="display:none;">
									<a href="#" title="Add to Basket" class="buybtn">Uploading..</a>
								</div>
							
								<div id="list_product_button" style='display:none;'>
									<span id="featuredProduct_5337">
										<a href="#" title="Add to Basket" class="buybtn" style="background-color:grey;color:#fff;" >Add to Basket</a>
									</span>
								</div> -->
							</div>
							<div class="clear"></div>
						</div>


						<div class="relatedproducts" style="font-size:14px !important">
							<div class="relatedhead">
								<div style="float:left;">Product Information</div>
								<div style="margin-right:80px;float:right;width:80px">
									
								</div>
								<br clear="all"/>
							</div>

							<p><?= $product_description->prod_desc; ?></p>
							<div id="messages"></div>
						</div>
					</form>

					<!--<div class="relatedproducts">
						<div class="relatedhead">Customers who bought this also bought…</div>
						<div class="actualProduct">
							<a href="" class="overlay-link">&nbsp;</a>
							<div class="productpic">
								<a href="">
									<img src="<?= base_url('assets/front/');?>images/uploads/thumbs/thumb_Hugo_Just-Different.jpg" alt="Hugo" border="0" title="Hugo" />
								</a>
							</div>
							<br clear="all"/>
							<div class="productshortdis" style="min-height:0px;">
								<h2 style="font-size:18px;"><a href="">Hugo Boss Just Different for Man, 125 ml</a></h2>
								<div class="price"><span style="font-size:18px;"> Tk ৳5930.00 <div class="txtSale"></div></span></div>
								<a href=""></a> <br /><span class="CatBoxStock" style="color:red;"></span>
							</div>
						</div>
					</div>-->
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>