<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_basic extends CI_Controller {

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
			$data['students'] = $this->studentModel->get_students();
			$data['message'] = $this->session->flashdata('message');
			$this->load->view('template_header', $data);
			$this->load->view('template_left');
			$this->load->view('student_view');
			$this->load->view('template_footer');

	}//Function
	
}