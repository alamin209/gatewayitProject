<div class="container">
	<div class="row">
		<div class="col-md-12">
			  <div class="topnavarea">
					<a href="<?= base_url('welcome/');?>" title="HomePage">Home</a> /&nbsp;My Account
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
					<div class="headtext">My Account
						<?php $UserID = $this->session->userdata('customer_id'); ?>
					</div>

					<?php
						if($this->session->userdata('message')){

							$message=$this->session->userdata('message');
							print '<span style="color:green;font-size:18px;margin:10px;">'.$message.'</span>';
							$this->session->unset_userdata('message');
						}
					?>
				</div>

				<div class="innerbodyarea">
					<div class="myaccountbox">
						<div class="myleft">
							<span>Order History &raquo;</span>View your past orders.
						</div>
						<div class="myright"><a href="<?= base_url('User/CheckHistory/'.$UserID);?>" class="myaccbtn">Check History</a></div> 
					</div>
        
					<div class="myaccountbox">
						<div class="myleft">
							<span>Personal Info &raquo;</span>Update your details.
						</div>
						<div class="myright"><a href="<?= base_url('User/UpdateCustomerInfo/'.$UserID);?>" class="myaccbtn">Check Info</a></div>
					</div>
        
					<div class="myaccountbox">
						<div class="myleft">
							<span>Change Password &raquo;</span>Keep your account Safe. 
						</div>
						<div class="myright"><a href="<?= base_url('User/ChangePassword');?>" class="myaccbtn">Change Now</a></div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
