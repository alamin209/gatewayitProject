<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {

	//Function or Method Construct
	public function __construct(){
		parent:: __construct();	
		
		// Check that the user is logged in
        if ($this->session->userdata('user_id') == null || $this->session->userdata('user_id') < 1) {
           //Prevent infinite loop by checking that this isn't the login controller             
            if ($this->router->class != 'login')
            {                        
                redirect(base_url());
            }
        }
		
		
		$this->load->model("studentModel");	
	}//Function
	
	//Function or Method Index
	public function index(){
			$data['message'] = array();
			$student_id = $this->session->userdata('user_id');
				if($this->session->userdata('login_type') == 'student'){
					$data['user_type']=$this->session->userdata('login_type');
					$data['students'] = $this->studentModel->get_single_student($student_id);
					$data['message'] = $this->session->flashdata('message');
					$this->load->view('template_header', $data);
					$this->load->view('template_left');
					$this->load->view('student_view');
					$this->load->view('template_footer');
			}
			else
			{
			$data['user_type']='admin';
			$data['message'] = array();
			$data['students'] = $this->studentModel->get_students();
			$data['message'] = $this->session->flashdata('message');
			$this->load->view('template_header', $data);
			$this->load->view('template_left');
			$this->load->view('student_view');
			$this->load->view('template_footer');
			}
	}//Function
	
	//Function or Method Create or Add New
	public function create(){
		
		$data['class_name'] = $this->studentModel->get_class();
		//echo '<pre>';print_r($data);exit;
		$data['section_name'] = array('0'=>'--Select Section--');
		$data['group_name'] = array('0'=>'--Select Group--');
		$data['session_name'] = $this->studentModel->get_session();
		$data['status_id'] = array(2 => '--Select Status--', 1 => 'Active', 0 => 'Inactive');
		$data['gender'] = array(0 => '--Select Gender--', 1 => 'Male', 2 => 'Female');
		
		$all_value = array(
								'id' => '', 
								'reg_no' => '',
								'first_name' => '',
								'last_name' => '',
								'mobile' => '',
								'email' => '',
								'phone' => '',
								'student_current_address' => '',
								'student_permanent_address' => '',
								'date_of_enrollment' => '',
								'enrolled_class' => '',
								'section_id' => '',
								'group_id' => '',
								'session_id' => '',
								'father_name' => '',
								'mother_name' => '',
								'date_of_birth' => '',
								'user_name' => '',
								'password' => '',
								'gender' => '',
								'gender' => '',
								'gardian_name' => '',
								'gardian_occupation' => '',
								'gardian_contact' => '',
								'gardian_email' => '',
								'relation_with_gardian' => '',
								'status_id' => ''
							);
							
		$data['student'] = (object) $all_value;	
		$data['error'] = '';
		$this->load->view('template_header', $data);
		$this->load->view('template_left');
		$this->load->view('student_form');
		$this->load->view('template_footer');
		
	}//Function
	
	//Function or Method Edit/Update
	public function edit($id=''){
						
		$studentList = $this->studentModel->edit($id);
		if(!empty($studentList)){
			$data['student'] = $studentList[0];
			$class_id = $studentList[0]->enrolled_class;
			$data['section_name'] = $this->studentModel->get_section($class_id);
			$data['group_name'] = $this->studentModel->get_group($class_id);
		}		
		$data['status_id'] = array(2 => '--Select Status--', 1 => 'Active', 0 => 'Inactive');
		$data['gender'] = array(0 => '--Select Gender--', 1 => 'Male', 2 => 'Female');
		$data['class_name'] = $this->studentModel->get_class();
		$data['session_name'] = $this->studentModel->get_session();
		$data['error'] = '';
		//call views file
		$this->load->view('template_header', $data);
		$this->load->view('template_left');
		$this->load->view('student_form');
		$this->load->view('template_footer');
			
	}//Function
	
	public function basic_edit($id=''){
						
		$studentList = $this->studentModel->edit($id);
		if(!empty($studentList)){
			$data['student'] = $studentList[0];
			$class_id = $studentList[0]->enrolled_class;
			$data['section_name'] = $this->studentModel->get_section($class_id);
			$data['group_name'] = $this->studentModel->get_group($class_id);
		}		
		$data['status_id'] = array(2 => '--Select Status--', 1 => 'Active', 0 => 'Inactive');
		$data['gender'] = array(0 => '--Select Gender--', 1 => 'Male', 2 => 'Female');
		$data['class_name'] = $this->studentModel->get_class();
		$data['session_name'] = $this->studentModel->get_session();
		$data['error'] = '';
		//call views file
		$this->load->view('template_header', $data);
		$this->load->view('template_left');
		$this->load->view('student_form_basic');
		$this->load->view('template_footer');
			
	}//Function
	
	public function guardian_edit($id=''){
						
		$studentList = $this->studentModel->edit($id);
		if(!empty($studentList)){
			$data['student'] = $studentList[0];
			$class_id = $studentList[0]->enrolled_class;
			$data['section_name'] = $this->studentModel->get_section($class_id);
			$data['group_name'] = $this->studentModel->get_group($class_id);
		}		
		$data['status_id'] = array(2 => '--Select Status--', 1 => 'Active', 0 => 'Inactive');
		$data['gender'] = array(0 => '--Select Gender--', 1 => 'Male', 2 => 'Female');
		$data['class_name'] = $this->studentModel->get_class();
		$data['session_name'] = $this->studentModel->get_session();
		$data['error'] = '';
		//call views file
		$this->load->view('template_header', $data);
		$this->load->view('template_left');
		$this->load->view('student_form_guardian');
		$this->load->view('template_footer');
			
	}//Function
	
	
	
	//Function or Method Save $_POST Value 
	public function save($id=''){
		if($this->input->post()){
			#$_Post the Value
			//$formDataArr = $this->input->post();
			$id = $this->input->post('id');
			$reg_no = $this->input->post('reg_no');
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$mobile = $this->input->post('mobile');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$student_current_address = $this->input->post('student_current_address');
			$student_permanent_address = $this->input->post('student_permanent_address');
			$date_of_enrollment = $this->input->post('date_of_enrollment');
			$enrolled_class = $this->input->post('class_id');
			$section_id = $this->input->post('section_id');
			$group_id = $this->input->post('group_id');
			$session_id = $this->input->post('session_id');
			$father_name = $this->input->post('father_name');
			$mother_name = $this->input->post('mother_name');
			$date_of_birth = $this->input->post('date_of_birth');
			$user_name = $this->input->post('user_name');
			$password = $this->input->post('password');
			$gender = $this->input->post('gender');
			$gardian_name = $this->input->post('gardian_name');
			$gardian_occupation = $this->input->post('gardian_occupation');
			$gardian_contact = $this->input->post('gardian_contact');
			$gardian_email = $this->input->post('gardian_email');
			$relation_with_gardian = $this->input->post('relation_with_gardian');
			$status_id = $this->input->post('status_id');
			#$_Post the Value
			$mobile = '88'.$mobile;
			$gardian_contact = '88'.$gardian_contact;
			#Validation a Form	
			$this->load->library('form_validation');
			$validate_student = array(
									array(
										 'field'   => 'reg_no', 
										 'label'   => 'Registration No', 
										 'rules'   => 'required'
									  ),
									array(
										 'field'   => 'first_name', 
										 'label'   => 'First Name', 
										 'rules'   => 'required'
									  ),
									array(
										 'field'   => 'last_name', 
										 'label'   => 'Last Name', 
										 'rules'   => 'required'
									  ),
									array(
										 'field'   => 'mobile', 
										 'label'   => 'Mobile', 
										 'rules'   => 'required'
									  ),
									array(
										 'field'   => 'student_current_address', 
										 'label'   => 'Student Current Address', 
										 'rules'   => 'required'
									  ),
									array(
										 'field'   => 'student_permanent_address', 
										 'label'   => 'Student Permanent Address', 
										 'rules'   => 'required'
									  ),
									array(
										 'field'   => 'class_id', 
										 'label'   => 'Class Name', 
										 'rules'   => 'is_natural_no_zero'
									  ),
									array(
										 'field'   => 'session_id', 
										 'label'   => 'Session Name', 
										 'rules'   => 'required'
									  ),
									array(
										 'field'   => 'father_name', 
										 'label'   => 'Father Name', 
										 'rules'   => 'required'
									  ),
									array(
										 'field'   => 'mother_name', 
										 'label'   => 'Mother Name', 
										 'rules'   => 'required'
									  ),
									array(
										 'field'   => 'date_of_birth', 
										 'label'   => 'Date of Birth', 
										 'rules'   => 'required'
									  ),
									array(
										 'field'   => 'user_name', 
										 'label'   => 'User Name', 
										 'rules'   => 'required'
									  ),
									  array(
										 'field'   => 'gardian_contact', 
										 'label'   => 'Guardian Contact', 
										 'rules'   => 'required'
									  ),
									  array(
										 'field'   => 'relation_with_gardian', 
										 'label'   => 'Relation with Guardian', 
										 'rules'   => 'required'
									  ),
									array(
										 'field'   => 'gender', 
										 'label'   => 'Gender', 
										 'rules'   => 'required'
									  )
								);

			$this->form_validation->set_rules($validate_student);
			//create object for validation
			$all_value = array(
								'id' => $id, 
								'reg_no' => $reg_no,
								'first_name' => $first_name,
								'last_name' => $last_name,
								'mobile' => $mobile,
								'email' => $email,
								'phone' => $phone,
								'student_current_address' => $student_current_address,
								'student_permanent_address' => $student_permanent_address,
								'date_of_enrollment' => $date_of_enrollment,
								'enrolled_class' => $enrolled_class,
								'section_id' => $section_id,
								'group_id' => $group_id,
								'session_id'=>$session_id,
								'father_name'=>$father_name,
								'mother_name'=>$mother_name,
								'date_of_birth'=>$date_of_birth,
								'user_name'=>$user_name,
								'gender'=>$gender,
								'gender'=>$gender,
								'gardian_name' => $gardian_name,
								'gardian_occupation' => $gardian_occupation,
								'gardian_contact' => $gardian_contact,
								'gardian_email' => $gardian_email,
								'relation_with_gardian' => $relation_with_gardian,
								'status_id' => $status_id
							);
			if(!empty($password)){
				$password = md5($password);
				$all_value['password'] = $password;
			}
			$data['student'] = (object) $all_value;
			$data['class_name'] = $this->studentModel->get_class();
			$data['section_name'] = $this->studentModel->get_section($enrolled_class);
			$data['group_name'] = $this->studentModel->get_group($enrolled_class);
			$data['status_id'] = array(2 => '--Select Status--', 1 => 'Active', 0 => 'Inactive');
			$data['session_name'] = $this->studentModel->get_session();
			$data['gender'] = array(0 => '--Select Gender--', 1 => 'Male', 2 => 'Female');
			$data['error'] = '';
			if($this->form_validation->run() == FALSE){
				//call views file
				$this->load->view('template_header', $data);
				$this->load->view('template_left');
				$this->load->view('student_form');
				$this->load->view('template_footer');
				return false;
			}//if
			#Validation a Form
			
			#file upload 
			$file_name = $_FILES['student_photo']['name'];
			if(!empty($file_name)){    
				$ext = strtolower(end(explode('.', $file_name)));      
				$student_photo = strtolower($this->session->userdata('user_id').'_'.uniqid().'.'.$ext);    //Check File Extension    
				$upload_config['file_name'] = $student_photo;
				$upload_config['upload_path'] = './uploads/';
				$upload_config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
				$upload_config['max_size']	= '512';
				$upload_config['max_width']  = 'auto';
				$upload_config['max_height']  = 'auto';
				$this->load->library('upload', $upload_config);
				if (! $this->upload->do_upload('student_photo')){ 
						$error = array('error' => $this->upload->display_errors());
						$this->load->view('template_header', $data);
						$this->load->view('template_left');
						$this->load->view('student_form', $error);
						$this->load->view('template_footer');
					
					return false;	
				}else{
					$data['student_photo'] = array('upload_data' => $this->upload->data());
					$all_value['photo'] = $student_photo;
				}
			}
		#end upload
			
			#start message
			$msg = (empty($id)) ? $first_name.' has been created successfully' : $first_name.' has been updated successfully';
			$message = array('message' => $msg);
			$this->session->set_flashdata($message);
			#end Message
			
			#Insert/Update
				if(empty($id)){	
					if($this->studentModel->save_student($all_value)){
						redirect('student');
					}//if
				}else{
					if($this->studentModel->save_student($all_value)){
						redirect('student');
					}//if
				}//else
			#End Insert/Update
			
		}else if(!empty($id)){
			redirect('student/edit');
		}else{
			redirect('student/create');
		}

	}//Function
	
	
	/////////////////////////////////////////////
	public function save_basic($id=''){
		if($this->input->post()){
			#$_Post the Value
			//$formDataArr = $this->input->post();
			$id = $this->input->post('id');
			$reg_no = $this->input->post('reg_no');
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$mobile = $this->input->post('mobile');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$student_current_address = $this->input->post('student_current_address');
			$student_permanent_address = $this->input->post('student_permanent_address');
			$date_of_birth = $this->input->post('date_of_birth');
			$user_name = $this->input->post('user_name');
			$password = $this->input->post('password');
			$gender = $this->input->post('gender');
			$mobile = '88'.$mobile;
			#Validation a Form	
			$this->load->library('form_validation');
			$validate_student = array(
									array(
										 'field'   => 'reg_no', 
										 'label'   => 'Registration No', 
										 'rules'   => 'required'
									  ),
									array(
										 'field'   => 'first_name', 
										 'label'   => 'First Name', 
										 'rules'   => 'required'
									  ),
									array(
										 'field'   => 'last_name', 
										 'label'   => 'Last Name', 
										 'rules'   => 'required'
									  ),
									array(
										 'field'   => 'mobile', 
										 'label'   => 'Mobile', 
										 'rules'   => 'required'
									  ),
									array(
										 'field'   => 'student_current_address', 
										 'label'   => 'Student Current Address', 
										 'rules'   => 'required'
									  ),
									array(
										 'field'   => 'student_permanent_address', 
										 'label'   => 'Student Permanent Address', 
										 'rules'   => 'required'
									  ),
									array(
										 'field'   => 'date_of_birth', 
										 'label'   => 'Date of Birth', 
										 'rules'   => 'required'
									  ),
									array(
										 'field'   => 'user_name', 
										 'label'   => 'User Name', 
										 'rules'   => 'required'
									  ),
									array(
										 'field'   => 'gender', 
										 'label'   => 'Gender', 
										 'rules'   => 'required'
									  )
								);

			$this->form_validation->set_rules($validate_student);
			//create object for validation
			$all_value = array(
								'id' => $id, 
								'reg_no' => $reg_no,
								'first_name' => $first_name,
								'last_name' => $last_name,
								'mobile' => $mobile,
								'email' => $email,
								'phone' => $phone,
								'student_current_address' => $student_current_address,
								'student_permanent_address' => $student_permanent_address,
								'date_of_birth'=>$date_of_birth,
								'user_name'=>$user_name,
								'gender'=>$gender
							);
			if(!empty($password)){
				$password = md5($password);
				$all_value['password'] = $password;
			}
			
			
			
			if($this->form_validation->run() == FALSE){
				$data['student'] = (object) $all_value;
				$data['class_name'] = $this->studentModel->get_class();
				$data['section_name'] = $this->studentModel->get_section($enrolled_class);
				$data['group_name'] = $this->studentModel->get_group($enrolled_class);
				$data['status_id'] = array(2 => '--Select Status--', 1 => 'Active', 0 => 'Inactive');
				$data['session_name'] = $this->studentModel->get_session();
				$data['gender'] = array(0 => '--Select Gender--', 1 => 'Male', 2 => 'Female');
				$data['error'] = '';
				//call views file
				$this->load->view('template_header', $data);
				$this->load->view('template_left');
				$this->load->view('student_form');
				$this->load->view('template_footer');
				return false;
			
			
			}//if
			#Validation a Form
			
			
			#start message
			$msg = (empty($id)) ? $first_name.' has been created successfully' : $first_name.' has been updated successfully';
			$message = array('message' => $msg);
			$this->session->set_flashdata($message);
			#end Message
			
			#Insert/Update
				if(empty($id)){	
					if($this->studentModel->save_student($all_value)){
						redirect('student');
					}//if
				}else{
					if($this->studentModel->save_student($all_value)){
						redirect('student');
					}//if
				}//else
			#End Insert/Update
	
		}//if
	////////////////
	
	}// End Save Basic
	/////////////////////////////////////////////
	public function save_guardian($id=''){
		if($this->input->post()){
			#$_Post the Value
			//$formDataArr = $this->input->post();
			$id = $this->input->post('id');
			$father_name = $this->input->post('father_name');
			$mother_name = $this->input->post('mother_name');
			$gardian_name = $this->input->post('gardian_name');
			$gardian_occupation = $this->input->post('gardian_occupation');
			$gardian_contact = $this->input->post('gardian_contact');
			$gardian_email = $this->input->post('gardian_email');
			$relation_with_gardian = $this->input->post('relation_with_gardian');
			$gardian_contact = '88'.$gardian_contact;
			#Validation a Form	
			$this->load->library('form_validation');
			$validate_student = array(
									array(
										 'field'   => 'father_name', 
										 'label'   => 'Father Name', 
										 'rules'   => 'required'
									  ),
									array(
										 'field'   => 'mother_name', 
										 'label'   => 'Mother Name', 
										 'rules'   => 'required'
									  ),
									  array(
										 'field'   => 'gardian_contact', 
										 'label'   => 'Guardian Contact', 
										 'rules'   => 'required'
									  ),
									  array(
										 'field'   => 'relation_with_gardian', 
										 'label'   => 'Relation with Guardian', 
										 'rules'   => 'required'
									  )
								);

			$this->form_validation->set_rules($validate_student);
			//create object for validation
			$all_value = array(
								'id' => $id, 
								'father_name'=>$father_name,
								'mother_name'=>$mother_name,
								'gardian_name' => $gardian_name,
								'gardian_occupation' => $gardian_occupation,
								'gardian_contact' => $gardian_contact,
								'gardian_email' => $gardian_email,
								'relation_with_gardian' => $relation_with_gardian,
							);
			
			
			
			if($this->form_validation->run() == FALSE){
				$data['student'] = (object) $all_value;
				$data['class_name'] = $this->studentModel->get_class();
				$data['section_name'] = $this->studentModel->get_section($enrolled_class);
				$data['group_name'] = $this->studentModel->get_group($enrolled_class);
				$data['status_id'] = array(2 => '--Select Status--', 1 => 'Active', 0 => 'Inactive');
				$data['session_name'] = $this->studentModel->get_session();
				$data['gender'] = array(0 => '--Select Gender--', 1 => 'Male', 2 => 'Female');
				$data['error'] = '';
				//call views file
				$this->load->view('template_header', $data);
				$this->load->view('template_left');
				$this->load->view('student_form');
				$this->load->view('template_footer');
				return false;
			
			
			}//if
			#Validation a Form
			
			
			#start message
			$msg = (empty($id)) ? $first_name.' has been created successfully' : $first_name.' has been updated successfully';
			$message = array('message' => $msg);
			$this->session->set_flashdata($message);
			#end Message
			
			#Insert/Update
				if(empty($id)){	
					if($this->studentModel->save_student($all_value)){
						redirect('student');
					}//if
				}else{
					if($this->studentModel->save_student($all_value)){
						redirect('student');
					}//if
				}//else
			#End Insert/Update
	
		}//if
	////////////////
	
	}// End Save Basic
	
	//Function or Method Delete
	public function delete($id=''){

		$message = 'Deleted successfully';
		$this->session->set_flashdata('message', $message);
		if($this->studentModel->delete_student($id)){
			redirect('student');	
		}//if
	}//Function
	
	//Function or Method display class wise section group
	public function display_section_group(){
		$class_id = $this->input->post('class_id');
		$this->studentModel->section_group($class_id);
	}//Function
	
	//Function or Method check exists Student
	public function ajax_check_exists($id = ''){
		$id = $this->input->post('id');
		$reg_no = $this->input->post('reg_no');
		$user_name = $this->input->post('user_name');
		$email = $this->input->post('email');
		$submit = $this->input->post('submit');
		$this->studentModel->check_ajax_exists($id,$reg_no,$user_name,$email,$submit);
	}
	//Function
	
	//function or method details
	public function details(){
		$id = $this->input->post('id');
		$studentList = $this->studentModel->studentDetails($id);

		if(!empty($studentList)){
			$data['student'] = $studentList[0];
			$class_id = $studentList[0]->enrolled_class;
			$section_id = $studentList[0]->section_id;
			$group_id = $studentList[0]->group_id;
			$data['class_name'] = $this->studentModel->get_class_details($class_id);
			$data['section_name'] = $this->studentModel->get_section_details($section_id);
			$data['group_name'] = $this->studentModel->get_group_details($group_id);
			$this->load->view('students_detail', $data);
		}	
		
	}//function
	
	public function id_card($id=''){
		$id = $this->input->post('id');
		$studentList = $this->studentModel->studentDetails($id);

		if(!empty($studentList)){
			$data['student'] = $studentList[0];
			$class_id = $studentList[0]->enrolled_class;
			$section_id = $studentList[0]->section_id;
			$group_id = $studentList[0]->group_id;
			$data['class_name'] = $this->studentModel->get_class_details($class_id);
			$data['section_name'] = $this->studentModel->get_section_details($section_id);
			$data['group_name'] = $this->studentModel->get_group_details($group_id);
			$this->load->view('id_card', $data);
		}
	}
	
	public function print_id($id=''){
		
		$studentList = $this->studentModel->studentDetails($id);
		//print_r($studentList);exit;
		if(!empty($studentList)){
			$data['student'] = $studentList[0];
			$class_id = $studentList[0]->enrolled_class;
			$section_id = $studentList[0]->section_id;
			$group_id = $studentList[0]->group_id;
			$data['class_name'] = $this->studentModel->get_class_details($class_id);
			$data['section_name'] = $this->studentModel->get_section_details($section_id);
			$data['group_name'] = $this->studentModel->get_group_details($group_id);
			$this->load->view('print_id_card',$data);
				
		}
	}
	
}//CI_Controller