<div class="container">
	<div class="row">
		<div class="col-md-12">
			  <div class="topnavarea">
					<a href="<?= base_url('welcome/');?>" title="HomePage">Home</a> /&nbsp;Personal Information
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
					<div class="headtext">Personal Information</div>
				</div>

				<div class="panel panel-primary">
				    <div class="panel-heading"> <i class="fa fa-star" aria-hidden="true"></i>
				        ---
				    </div>

					<div class="panel-body">

						<form  name="edit_country" id="userReg" class="form-vertical" action="<?= base_url('User/SaveUpdate');?>" method="post">

							<div class="col-md-12">

								<div class="col-md-6">
									<div class="form-group">
										<p>Your Personal Details</p>
									</div>

									<div class="form-group">
										<label>First Name&nbsp;<span style="color:red;">*</span></label>
										<input type="text" name="firstname" value="<?= $select_info->firstname;?>" class="form-control" required>
									</div>

									<div class="form-group">
										<label>Last Name&nbsp;<span style="color:red;">*</span></label>
										<input type="text" name="lastname" value="<?= $select_info->lastname;?>" class="form-control" required>
									</div>

									<div class="form-group">
										<label>Email&nbsp;<span style="color:red;">*</span></label>
										<input type="text" name="email_address" value="<?= $select_info->email_address;?>" class="form-control" required>
									</div>

									<div class="form-group">
										<label>Mobile No&nbsp;<span style="color:red;">*</span></label>
										<input  type="number" value="<?= $select_info->mobile_no;?>" name="mobile_no" class="form-control" required>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<p>Your Address</p>
									</div>

									<div class="form-group">
										<label>Address&nbsp;<span style="color:red;">*</span></label>
										<textarea name="address" class="form-control" required>
											<?= $select_info->address;?></textarea>
									</div>

									<div class="form-group">
										<label>Post/Zip Code&nbsp;<span
			                            style="color:red;">*</span></label>
										<input  type="number" value="<?= $select_info->zip_code;?>" name="zip_code" class="form-control" required>
									</div>

									<input  type="hidden" value="<?= $select_info->customer_id;?>" name="customer_id" class="form-control" required>

								</div>

								<div class="col-md-12">
									<div class="form-group text-center">
									   <button class="btn btn-success" id="btn">Update Account</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div><!---  panel-default -->

			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $('#country').change(function () {

            $.get("<?php echo base_url()?>super_admin/getStateByCountryId/" + this.value, function (data, status) {
                $('#district').html(data);
            });

        });

    });

</script>

<!-- <script type="text/javascript">

   document.forms['edit_country'].elements['country'].value='<?php echo $select_info->country?>';
   document.forms['edit_country'].elements['district'].value='<?php echo $select_info->district?>';
   
</script> -->
