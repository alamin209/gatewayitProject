
<?php
  $message=$this->session->userdata('message');
  if($message){
    echo '<div class="alert alert-danger">' . $message . "</div>";
    $this->session->unset_userdata('message');
  }
?>
<section id="pav-slideshow" class="pav-slideshow hidden-xs">
    <div class="container">
        <div class="row">   
            <!-- Checkout -->
            <div class="col-lg-12 col-md-12">
                <div class="layerslider-wrapper hidden-xs">
                    <div class="bannercontainer banner-boxed" style="padding: 5px 0px;margin: 0px 0px;">
                    
                        <div id="content" class="product-detail">
                            <div class="product-info">
                                <div class="row">

                                    <div class="col-md-12">
										<!--- shipping address -->
                                        <div class="panel panel-primary" >
                                            <div class="panel-heading"> <i class="fa fa-star" aria-hidden="true"></i>
                                                Shipping Information >>>
                                            </div>

                                            <div id="p3">
                                                <div class="panel-body">
													<form class="form-vertical" action="<?= base_url('Checkout/save_shipping');?>" method="post">
														<div class="col-md-12">
															<p>
																<div class="alert alert-success">Your Information</div>
																<p>
																	<?php
																		echo $this->session->userdata('name').'<br>';
																		echo $this->session->userdata('email_address').'<br>';
																		echo $this->session->userdata('mobile_no').'<br>';
																	?>
																</p>
															</p>

															<p>
																<div class="alert alert-success">Gift Delivery Address</div>
																<p style="color:red;">Please note that all fields that have an asterisk (*) are required in order to continue.</p>
															</p>

															<div class="col-md-5">

																<div class="form-group">
																	<label>Name&nbsp;<span style="color:red;">*</span></label>
																	<input  type="text" value="" name="name" class="form-control" required>
																</div>

																<div class="form-group">
																	<label>Email&nbsp;<span style="color:red;">*</span></label>
																	<input type="text" name="email" value="" class="form-control" required>
																</div>

																<div class="form-group">
																	<label>Mobile No&nbsp;<span style="color:red;">*</span></label>
																	<input  type="number" value="" name="phone" class="form-control" required>
																</div>

																<div class="form-group">
																	<label>House and Flat Details&nbsp;<span style="color:red;">*</span></label>
																	<textarea name="address" class="form-control" required></textarea>
																</div>

																<div class="form-group">
																	<label>Which Floor/Side</label>
																	<input  type="number" value="" name="floor" class="form-control">
																</div>

															</div>
															
															<div class="col-md-1"></div>
															
															<div class="col-md-5">
																
																<div class="form-group">
																	<label>Area Name</label>
																	<input  type="text" value="" name="area" class="form-control">
																</div>
																
																<div class="form-group">
																	<label>Zip Code</label>
																	<input  type="number" value="" name="zip_code" class="form-control">
																</div>

																<div class="form-group">
																	<label>Country&nbsp;<span
																	style="color:red;">*</span></label>
																	<select name="country" id="country" class="form-control">
																		<option value="">Select Country</option>
																		<?php getAllCountryList(); ?>
																	</select>
																</div>

																<div class="form-group">
																	<label>State/District&nbsp;<span style="color:red;">*</span></label>
																	<select name="district" class="form-control" id="district"
																	>

																	</select>
																</div>

																<div class="form-group">
																	<label>City&nbsp;<span style="color:red;">*</span></label>
																	<input  type="text" value="" name="city" class="form-control">
																</div>
															</div>
														</div>

														<div class="col-md-12">
															<div class="col-md-4"></div>
															<div class="col-md-4">
																<button class="btn btn-success" id="btn3">Submit & Continue</button>
															</div>
															<div class="col-md-4"></div>
														</div>
													</form>
                                                </div>
                                            </div><!--- p3 -->
                                        </div><!--- panel-default -->
                                        <!--- shipping address end -->
                                    </div><!-- col-md-8 -->
                                </div><!-- row -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Checkout end -->        
        </div>  
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function () {

        $('#country').change(function () {

            $.get("<?php echo base_url()?>super_admin/getStateByCountryId/" + this.value, function (data, status) {
                $('#district').html(data);
            });

        });

    });

</script>