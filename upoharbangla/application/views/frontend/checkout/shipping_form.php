
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

                                                        <div class="col-md-6">

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
                                                                onchange="check_shipping_cost(this.value)">

                                                                </select>
                                                            </div>

                                                            <script type="text/javascript">

                                                                function check_shipping_cost(val) {
                                                                    $(document).ready(function () {
                                                                        $.ajax({
                                                                            url: "<?php echo base_url(); ?>super_admin/check_shippingCost/" + val,

                                                                            success: function (data, res) {

                                                                                if (res == "success") {
                                                                                    $("#shippingcost").css("display", "");

                                                                                    document.getElementById("shippingcost").value = data;

                                                                                    document.getElementById("output").innerHTML = "";

                                                                                } else {
                                                                                    $("#shippingcost").css("display", "none");
                                                                                    document.getElementById("output").innerHTML = res;
                                                                                }

                                                                            }

                                                                        });

                                                                    });

                                                                }

                                                            </script>

                                                            <div class="form-group">
                                                                <label>Shipping Cost</label>
                                                                <input type="number" name="shipping_cost" id="shippingcost" class="form-control" disabled />
                                                                <p id="output"></p>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>City&nbsp;<span style="color:red;">*</span></label>
                                                                <input  type="text" value="" name="city" class="form-control">
                                                            </div>

                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Relation&nbsp;<span style="color:red;">*</span></label>
                                                                <select name="relation" class="form-control">
                                                                    <option value="0">Please Select---</option>
                                                                    <option value="1">Father</option>
                                                                    <option value="2">Mother</option>
                                                                    <option value="3">Sister</option>
                                                                    <option value="4">Brother</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Gift Occassion&nbsp;<span style="color:red;">*</span></label>
                                                                <select name="occassion" class="form-control">
                                                                    <option value="0">Please Select---</option>
                                                                    <option value="1">Eid</option>
                                                                    <option value="2">Puja</option>
                                                                    <option value="3">Valentine Day</option>
                                                                    <option value="4">Marriged Day</option>
                                                                </select>
                                                            </div>
                                                            <p>We offer special free service of taking recipient's photo at the time of delivery, call before delivery and 7 red roses with each order. Photo confirmation will be emailed to you within 72 hours after delivery. Please select Yes/No for following options:</p>

                                                            <div class="form-group">
                                                                <label>Do you want us to take photo?&nbsp;<span style="color:red;">*</span></label>
                                                                <input type="radio"  name="take_photo" value="yes" checked />
                                                                <label for="radio" style="font-weight:normal">Yes</label>
                                                                &nbsp;&nbsp;&nbsp;
                                                                <input name="take_photo" type="radio" value="no"  />
                                                                <label for="radio" style="font-weight:normal">No</label>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Should we call before delivery?&nbsp;<span style="color:red;">*</span></label>
                                                                <input type="radio" name="give_call" value="yes" checked />
                                                                <label for="radio" style="font-weight:normal">Yes</label>
                                                                &nbsp;&nbsp;&nbsp;
                                                                <input name="give_call" type="radio" value="no"  />
                                                                <label for="radio" style="font-weight:normal">No</label>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Should we add 7 free red roses?&nbsp;<span style="color:red;">*</span></label>
                                                                <input name="rose" type="radio" value="yes" checked />
                                                                <label for="radio" style="font-weight:normal">Yes</label>
                                                                &nbsp;&nbsp;&nbsp;
                                                                <input name="rose" type="radio" value="no" />
                                                                <label for="radio" style="font-weight:normal">No</label>
                                                            </div>
                                                            <p>We will deliver gift at your selected date and time. Delivery is available from 7 am to 10 pm, 7 days a week.</p>
                                                            <div class="form-group">
                                                                <label>Delivery Time&nbsp;<span style="color:red;">*</span></label>
                                                                <input name="del_time" type="time" value="" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Delivery Date&nbsp;<span style="color:red;">*</span></label>
                                                                <input type="date" name="del_date"  value="" />
                                                            </div>

                                                            <!--<div class="form-group">
                                                                <label>Do you have a discount or promotional code?</label>
                                                                <input type="text" name="dis_code"  value="" />
                                                            </div>-->
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