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
                                        
                                    <div class="col-md-5">
                                        <?php include('login.php');?>
                                    </div>

                                    <div class="col-md-1"></div>
                                    <div class="col-md-6">

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

													<div class="col-md-12">
														<p>
															<div class="alert alert-success">I do not have an account.</div>
															Register as a new customer and it will make order.
														</p>

														<div class="col-md-12">
															<div class="form-group text-center">
																<a href="<?= base_url('checkout/CustomerRegistration');?>">
																   <button class="btn btn-success" id="btn">Continue to checkout</button>
																</a>
															</div> 
														</div>

													</div>
												</form>
											</div>
										</div><!---  panel-default -->

                                    </div><!-- col-md-7 -->
                        
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