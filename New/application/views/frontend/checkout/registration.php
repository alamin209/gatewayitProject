<section id="pav-slideshow" class="pav-slideshow hidden-xs">
    <div class="container">
        <div class="row">    
            <!-- Checkout -->
            <div class="col-lg-12 col-md-12">
                <div class="layerslider-wrapper hidden-xs" >
                    <div class="bannercontainer banner-boxed" style="padding: 5px 0px;margin: 0px 0px;">
                    
                        <div id="content" class="product-detail">
                            <div class="product-info">
                                <div class="row">

                                    <div class="col-md-12">
										<div class="panel panel-primary">
										    <div class="panel-heading"> <i class="fa fa-star" aria-hidden="true"></i>
										        If you don't have any Account.Then Please Registration first.
										    </div>

											<div class="panel-body">
												<?php
													if($this->session->userdata('message')){

														$message=$this->session->userdata('message');
														print '<span style="color:green;font-size:18px;margin:10px;">'.$message.'</span>';
														$this->session->unset_userdata('message');
													}
												?>
												<?php 
													if (validation_errors()) {
						                        ?>
						                            <div class="alert alert-danger">
						                                <?php
						                                echo validation_errors();
						                                ?>
						                            </div>

						                        <?php } ?>

												<form  id="userReg" class="form-vertical" action="<?= base_url('checkout/save_customer');?>" method="post">

													<div class="col-md-12">
														<p>
															<div class="alert alert-success">Your Invoice Information</div>
															<p style="color:red;">Please note that all fields that have an asterisk (*) are required in order to continue.</p>
														</p>

														<div class="col-md-6">

															<div class="form-group">
																<p>Your Personal Details</p>
															</div>

															<div class="form-group">
																<label>Customer First Name&nbsp;<span style="color:red;">*</span></label>
																<input type="text" name="firstname" value="" class="form-control" required>
															</div>

															<div class="form-group">
																<label>Customer Last Name&nbsp;<span style="color:red;">*</span></label>
																<input type="text" name="lastname" value="" class="form-control" required>
															</div>

															<div class="form-group">
																<label>Customer Email&nbsp;<span style="color:red;">*</span></label>
																<input type="text" name="email_address" value="" class="form-control" required>
															</div>
															
															<div class="form-group">
																<label>Password&nbsp;<span style="color:red;">*</span></label>
																<input  type="password" value="" id="password" name="password" class="form-control" required>
															</div>
															
															<div class="form-group">
																<label>Confirm Password&nbsp;<span style="color:red;">*</span></label>
																<input  type="password" value="" name="con_password" class="form-control" required>
															</div>
															
															<div class="form-group">
																<label>Customer Address&nbsp;<span style="color:red;">*</span></label>
																<textarea name="address" class="form-control" required></textarea>
															</div>

															<div class="form-group">
																<label>Customer Mobile No&nbsp;<span style="color:red;">*</span></label>
																<input  type="number" value="" name="mobile_no" class="form-control" required>
															</div>

														</div>

														<div class="col-md-6">

															<div class="form-group">
																<p>Your Address</p>
															</div>

															<div class="form-group">
	                                                            <label>Country</label>
	                                                            <select name="country" id="country" class="form-control">
	                                                                <option value="">Select Country</option>
	                                                                <?php getAllCountryList(); ?>
	                                                            </select>
                                                        	</div>

                                                        	<div class="form-group">
	                                                            <label>State/District</label>
	                                                            <select name="district" class="form-control" id="district">

	                                                            </select>
	                                                        </div>

															<div class="form-group">
																<label>Area/Town</label>
																<input  type="text" value="" name="post_code" class="form-control">
															</div>

															<div class="form-group">
																<label>Post/Zip Code&nbsp;<span
	                                                            style="color:red;">*</span></label>
																<input  type="number" value="" name="zip_code" class="form-control" required>
															</div>

															<div class="form-group">
																<label>Privacy Setting</label><br>
																<input  type="checkbox" value="" name="privacy">&nbsp;I have read, agree and understood the <a href="">terms & conditions</a>
															</div>

														</div>

														<div class="col-md-12">
															<div class="form-group text-center">
															   <button class="btn btn-success" id="btn">Submit & Continue</button>
															</div>
														</div>

													</div>
												</form>
											</div>
										</div><!---  panel-default -->

                                    </div><!-- col-md-12 -->
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

<script type="text/javascript">
    $(document).ready(function () {
        $('#userReg').validate({
            rules: {
                firstname: {
                    required: true
                },
                lastname: {
                    required: true
                },
                email_address: {
                    required: true,
                    email: true
                },
                address: {
                    required: true
                },
                mobile_no: {
                    required: true
                },
                zip_code: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                con_password: {
                    required: true,
                    equalTo: "#password"
                }

            }
        });

    });
    
</script>