<?php
include('header.php');
?>

<div class="inner_content_w3_agile_info">	
		<div class="registration admin_agile">								
			<div class="signin-form profile admin">
				<h4>Admin Change Password</h4>
				<?php
				if($this->session->userdata('exception')){
					print '<span style="color:red">'.$this->session->userdata('exception').'</span>';
					$this->session->unset_userdata('exception');
				}
				?>
				<div class="login-form">
					<form action="<?php print base_url('change_password');?>" method="post">
						<input type="password" name="new_password" value="" required="" placeholder="New Password">
						<input type="password" name="confirm_password" value="" required="" placeholder="Confirm_password">
						<div class="tp">
							<input type="submit" value="Update">
						</div>
						
					</form>
				</div>																					 
			</div>	
    </div> 					<!-- //inner_content_w3_agile_info-->
</div>
<?php
include('footer.php');
?>