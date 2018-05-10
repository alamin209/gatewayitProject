<div class="row">
	<div class="col-sm-12">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title"><?php echo $this->lang->line('BASIC_INFORMATION'); ?></h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<?php 
						
						if(!empty($student->mobile)){
							$mobile = substr($student->mobile, 2);
						}else{
							$mobile = $student->mobile;
						}
						
						if(!empty($student->gardian_contact)){
							$gardian_contact = substr($student->gardian_contact, 2);
						}else{
							$gardian_contact = $student->gardian_contact;
						}
						
						$gender = ($student->gender == 1) ? 'Male' : 'Female';
					?>

					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="reg-no"><?php echo $this->lang->line('LBL_REGISTRATION_NO'); ?></label>
							<div class="col-sm-5"><?php echo $student->reg_no; ?></div>
							
						</div>
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="first-name"><?php echo $this->lang->line('LBL_FULL_NAME'); ?></label>
							<?php echo $student->first_name.' '.$student->last_name; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="mobile"><?php echo $this->lang->line('LBL_MOBILE'); ?></label>
							<?php echo $mobile; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email"><?php echo $this->lang->line('LBL_EMAIL'); ?></label>
							<?php echo $student->email; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="phone"><?php echo $this->lang->line('LBL_PHONE'); ?></label>
							<?php echo $student->phone; ?>
						</div>
					</div>
					
					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="user-name"><?php echo $this->lang->line('LBL_USER_NAME'); ?></label>
							<?php echo $student->user_name; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="date-of-birth"><?php echo $this->lang->line('LBL_DATE_OF_BIRTH'); ?></label>
							<?php echo $student->date_of_birth; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="gender"><?php echo $this->lang->line('LBL_GENDER'); ?></label>
							<?php echo $gender; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-5 no-padding-right" for="student-current-address"><?php echo $this->lang->line('LBL_STUDENT_CURRENT_ADDRESS'); ?></label>
							<?php echo $student->student_current_address; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-5 no-padding-right" for="student-permanent-address"><?php echo $this->lang->line('LBL_STUDENT_PERMANENT_ADDRESS'); ?></label>
							<?php echo $student->student_permanent_address; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-sm-12">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title"><?php echo $this->lang->line('STUDY_INFORMATION'); ?></h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="date-of-enrollment"><?php echo $this->lang->line('LBL_DATE_OF_ENROLLMENT'); ?></label>
							<?php echo $student->date_of_enrollment; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="enrolled-class"><?php echo $this->lang->line('LBL_ENROLLED_CLASS'); ?></label>
							<?php echo $student->enrolled_class; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="section-name"><?php echo $this->lang->line('LBL_SECTION_NAME'); ?></label>
							<?php echo $class_name->name; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group-name"><?php echo $this->lang->line('LBL_GROUP_NAME'); ?></label>
							<?php echo $section_name->name; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="session-name"><?php echo $this->lang->line('LBL_SESSION_NAME'); ?></label>
							<?php echo $group_name->group_name; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<div class="col-sm-12">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title"><?php echo $this->lang->line('GUARDIAN_INFORMATION'); ?></h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="father-name"><?php echo $this->lang->line('LBL_FATHER_NAME'); ?></label>
							<?php echo $student->father_name; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="mother-name"><?php echo $this->lang->line('LBL_MOTHER_NAME'); ?></label>
							<?php echo $student->mother_name; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="gardian-name"><?php echo $this->lang->line('LBL_GARDIAN_NAME'); ?></label>
							<?php echo $student->gardian_name; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="gardian-occupation"><?php echo $this->lang->line('LBL_GARDIAN_OCCUPATION'); ?></label>
							<?php echo $student->gardian_occupation; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="gardian-contact"><?php echo $this->lang->line('LBL_GARDIAN_CONTACT'); ?></label>
							<?php echo $gardian_contact; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="gardian-email"><?php echo $this->lang->line('LBL_GARDIAN_EMAIL'); ?></label>
							<?php echo $student->gardian_email; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="relation-with-gardian"><?php echo $this->lang->line('LBL_RELATION_WITH_GARDIAN'); ?></label>
							<?php echo $student->relation_with_gardian; ?>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>