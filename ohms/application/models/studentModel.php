<?php
class StudentModel extends CI_Model {
	
	//Function Or Method Construct
	public function __construct(){
		parent::__construct();
	}//Function
	
	//Function Or Method for Viewing Data between two tables 
	public function get_students(){
		$this->db->select('*')->from('student')->order_by("id", "ASC"); 
		$query = $this->db->get();
		return $query->result_object();		
	}//Function
	public function get_single_student($id=''){
		$this->db->select('*')->from('student')->where('id',$id)->order_by("id", "ASC"); 
		$query = $this->db->get();
		return $query->result_object();		
	}
	
	//Function Or Method for viewing Section dropdown 
	public function get_class(){
		$query = $this->db->query('SELECT id, name FROM class ORDER BY id ASC');
		$classList = $query->result();
		$class_name = array();
		$classes[0] = "-- Select Class --";
		if(!empty($classList)){
			foreach($classList as $class){
				$classes[$class->id] = $class->name;
			}//Foreach
		}
		$class_name = $classes;
		return $class_name;
	}//Function
	
	//Function Or Method for viewing Session dropdown 
	public function get_session(){
		$query = $this->db->query('SELECT id, session_name FROM session ORDER BY id ASC');
		$sessionList = $query->result();
		$session_name = array();
		$sessions[0] = "-- Select Session --";
		if(!empty($sessionList)){
			foreach($sessionList as $session){
				$sessions[$session->id] = $session->session_name;
			}//Foreach
		}
		$session_name = $sessions;
		return $session_name;
		
	}//Function
	
	//Function Or Method to Update/Edit Database
	public function edit($id = ''){
		$query = "select * from `student` where `id`='".$id."'";
		$result = $this->db->query($query);
		$studentList = $result->result();
		return $studentList;
	}//Function
	
	//Function Or Method to get Details
	public function studentDetails($id = ''){
		$query = "select * from `student` where `id`='".$id."'";
		$result = $this->db->query($query);
		$studentList = $result->result();
		return $studentList;
	}//Function
	
	//Function or Method get class
	public function get_class_details($class_id){
		$query = "select name from `class` where `id`='".$class_id."'";
		$result = $this->db->query($query);
		$studentClassArr = $result->result();
		if(!empty($studentClassArr)){
			$studentClassName = $studentClassArr[0];
		}else{
			$studentClassName = (object) array('name'=>'');
		}
		return $studentClassName;
	}//Function
	
	//Function or Method get section
	public function get_section_details($section_id){
		$query = "select name from `section` where `id`='".$section_id."'";
		$result = $this->db->query($query);
		$studentSectionArr = $result->result();
		if(!empty($studentSectionArr)){
			$studentSectionName = $studentSectionArr[0];
		}else{
			$studentSectionName = (object) array('name'=>'no section');
		}
		return $studentSectionName;
	}//Function
	
	//Function or Method get section
	public function get_group_details($group_id){
		$query = "select group_name from `group` where `id`='".$group_id."'";
		$result = $this->db->query($query);
		$studentGroupArr = $result->result();
		if(!empty($studentGroupArr)){
			$studentGroupName = $studentGroupArr[0];
		}else{
			$studentGroupName = (object) array('group_name'=>'no group');
		}
		return $studentGroupName;
	}//Function
	
	//Function Or Method to edit section
	public function get_section($class_id){
		
		//display class wise section
		$this->db->select('id, section_id')->from('class_section')->where('class_id', $class_id);
		$query = $this->db->get();
		$sectionList = $query->result();
		$section_name[0]='--Select Section--';
		if(!empty($sectionList)){
			foreach($sectionList as $section){
				$this->db->select('id, name')->from('section')->where('id', $section->section_id);
				$query = $this->db->get();
				$sectionNameList = $query->result();
				if(!empty($sectionNameList)){
					$section_name[0] = '--Select Section--';
					foreach($sectionNameList as $sectionName){
						if(!empty($sectionName)){
							$section_name[$sectionName->id] = $sectionName->name;		
						}
					}	
					
				}
			}
		}
		return $section_name;
		//display class wise section
		
	}//Function
	
	//Function Or Method to edit group
	public function get_group($class_id){
		
		//display class wise group
		$this->db->select('id, group_id')->from('class_group')->where('class_id', $class_id);
		$query = $this->db->get();
		$groupList = $query->result();
		$group_name[0] = '--Select Group--';
		if(!empty($groupList)){
			foreach($groupList as $group){
				$this->db->select('id, group_name')->from('group')->where('id', $group->group_id);
				$query = $this->db->get();
				$groupNameList = $query->result();	
				if(!empty($groupNameList)){
					foreach($groupNameList as $groupName){
						if(!empty($groupName)){
							$group_name[$groupName->id] = $groupName->group_name;
						}
					}
				}
			}
		}
		return $group_name;
		//display class wise group
		
	}//Function
	
	//Function Or Method to Set Database
	public function save_student($all_value){
		$id = $all_value['id'];
		$user_id = $this->session->userdata('user_id');
		$created_by = $updated_by = $user_id;
		$created_datetime = $updated_datetime = date("Y-m-d h:i:s");
		$all_value['updated_by'] = $updated_by;
		$all_value['updated_datetime'] = $updated_datetime;
		
		if(empty($all_value['id'])){
			$all_value['created_by'] = $created_by;
			$all_value['created_datetime'] = $created_datetime;
		}

		if(!empty($id)){
			$this->db->where('id',$id);
			if($this->db->update('student', $all_value)){
				return true;
			}//IF
		}else{
			if ($this->db->insert('student', $all_value)){
				return true;
			}//IF
		}//Else
		
		return false;
	}//Function
	
	//Function Or Method to Delete
	function delete_student($id){
		$this->db->where('id',$id);
		
		if ($this->db->delete('student')){
			return true;
		}//IF
		
		return false;	
	}//Function
	
	//Function Or Method to query section and group
	function section_group($class_id){
		//if($class_id > 0){
			//display class wise section
			$this->db->select('id, section_id')->from('class_section')->where('class_id', $class_id);
			$query = $this->db->get();
			$sectionList = $query->result();
			$section_name[0] = '--Select Section--';
			echo '<div id="all-section-div">
						<label for="section-name">'.$this->lang->line('LBL_SECTION_NAME').'</label>
						<div class="row">
							<div class="col-xs-8 col-sm-11">
								<div class="input-group">';
			if(!empty($sectionList)){
				foreach($sectionList as $section){
					$this->db->select('id, name')->from('section')->where('id', $section->section_id);
					$query = $this->db->get();
					$sectionNameList = $query->result();
					
					if(!empty($sectionNameList)){
						foreach($sectionNameList as $sectionName){
							if(!empty($sectionName)){
								$section_name[$sectionName->id] = $sectionName->name;
							}
						}	
						
					}
				}
				
			}
			$section_name_dropdown = form_dropdown('section_id', $section_name, '','id="section_id"');
				echo $section_name_dropdown;
				echo 			'</div>
							</div>
						</div>
					</div>';
			//display class wise section
			
			//display class wise group
			$this->db->select('id, group_id')->from('class_group')->where('class_id', $class_id);
			$query = $this->db->get();
			$groupList = $query->result();	
			//echo $this->db->last_query();
			$group_name[0] = '--Select Group--';
			echo '<div id="all-group-div">
						<label for="group-name">'.$this->lang->line('LBL_GROUP_NAME').'</label>
						<div class="row">
							<div class="col-xs-8 col-sm-11">
								<div class="input-group">';
			if(!empty($groupList)){
				foreach($groupList as $group){
					$this->db->select('id, group_name')->from('group')->where('id', $group->group_id);
					$query = $this->db->get();
					$groupNameList = $query->result();	
					if(!empty($groupNameList)){
						foreach($groupNameList as $groupName){
							if(!empty($groupName)){
								$group_name[$groupName->id] = $groupName->group_name;
							}
						}
					}
				}
				
			}
			$group_name_dropdown = form_dropdown('group_id', $group_name, '','id="group_id"');
				echo $group_name_dropdown; 
				echo 			'</div>
							</div>
						</div>
					</div>';
			
		//}

	}//Function
	
	//Function or Method Student check
	public function check_ajax_exists($id,$reg_no,$user_name,$email,$submit){
		
		//query for user exists value check
		$query_reg = "select id from `student` where `reg_no`='$reg_no' and id<>'$id'";
		$query_reg = $this->db->query($query_reg);
		if($query_reg->num_rows > 0){
			echo '1';
		}
		
		$query_email = "select id from `student` where `email`='$email' and id<>'$id'";
		$query_email = $this->db->query($query_email);
		if($query_email->num_rows > 0){
			echo '2';
		}
		
		$query_user = "select id from `student` where `user_name`='$user_name' and id<>'$id'";
		$query_user = $this->db->query($query_user);
		if($query_user->num_rows > 0){
			echo '3';
		}
		
	}//Function

}//End CI_Model
?>