<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent:: __construct();	
		
        if ($this->session->userdata('user_id') == null || $this->session->userdata('user_id') < 1) {
           //Prevent infinite loop by checking that this isn't the login controller               
            if ($this->router->class != 'login') 
            {                        
                redirect(base_url());
            }
        }

        $this->load->model("dashboard_model");
		
	}//Function
	
	public function index() {

		$data['notices'] = $this->dashboard_model->get_current_notice();
		$user_id = $this->session->userdata('user_id');
		$data['user_info'] = $this->db->select('*')->from('user')->where('id',$user_id)->get()->row();
		$this->load->view('backend/template_header');
		$this->load->view('backend/template_left');
		$this->load->view('backend/user_dashboard',$data);
		$this->load->view('backend/template_footer');
	}

}//Dashboard

?>