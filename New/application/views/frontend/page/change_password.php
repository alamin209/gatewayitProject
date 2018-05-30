<div class="container">
	<div class="row">
		<div class="col-md-12">
			  <div class="topnavarea">
					<a href="<?= base_url('welcome/');?>" title="HomePage">Home</a> /&nbsp;Change Password
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
					<div class="headtext">Change Password</div>
				</div>

				<div class="innerbodyarea">
					<div class="panel panel-info">
					    <div class="panel-heading"> <i class="fa fa-unlock-alt" aria-hidden="true"></i>&nbsp;Please change your password here:
					    </div>
					    <div class="panel-body">
					        <?php
					            $message = $this->session->userdata('message');
					            if (isset($message)) {
					                echo '<div class="alert alert-danger">' . $message . "</div>";
					                $this->session->unset_userdata('message');
					            }
					        ?>
					        <form class="form-vertical" action="<?php print base_url('User/UpdatePassword');?>" method="post">
					        	<div class="form-group">
					                <label for="password">Old Password</label>
					                <input type="password" value="" name="old_password" class="form-control" placeholder="Enter your old password" required> 
					            </div>
					            <div class="form-group">
					                <label for="password">New Password</label>
					                <input type="password" value="" name="new_password" class="form-control" placeholder="Enter your new password" required> 
					            </div>
					            <div class="form-group">
					                <label for="password">Confirm Password</label>
					                <input type="password" value="" name="con_password" class="form-control" placeholder="Enter your confirm password" required>
					            </div>
					            <div class="form-group">
					                <button class="btn btn-danger" type="submit" name="login">Submit</button>
					            </div>
					        </form> 

					    </div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
