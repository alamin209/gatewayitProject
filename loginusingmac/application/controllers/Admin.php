<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		//$this->load->helper('cookie');

	}

	public function registration(){
		
		ob_start();
	    system('getmac');
	    $Content = ob_get_contents();
	    ob_clean();
	    $data['mac_address'] =  substr($Content, strpos($Content,'\\')-20, 17);

		$data['username'] = $this->input->post('username');
		$data['email'] = $this->input->post('email');
		$data['password'] = $this->input->post('password');

		$result = $this->Admin_model->save_user('tbl_user', $data);

		if($result){
			$sdata=array();
			$sdata['exception']="User save sucessfully";
			$this->session->set_userdata($sdata);
			redirect('welcome/reg_success');
		}else{
			$sdata=array();
			$sdata['exception']="Username and Password Invalid";
			$this->session->set_userdata($sdata);
			redirect('welcome/index');
		}

	}
	
	public function admin_login(){

		ob_start();
	    system('getmac');
	    $Content = ob_get_contents();
	    ob_clean();
	    $mac_address =  substr($Content, strpos($Content,'\\')-20, 17);
		
		$username = $this->input->post('username');
		$password =$this->input->post('password');

		$result = $this->Admin_model->check_admin_login($username, $password, $mac_address);

		if($result){
			$data['id']=$result->id;
			$data['username']=$result->username;
			$this->session->set_userdata($data);
			redirect('welcome/about');
		}else{
			$sdata=array();
			$sdata['exception']="Username and Password Invalid";
			$this->session->set_userdata($sdata);
			redirect('welcome');
		}
	}

	public function logout(){

		$id = $this->session->userdata('id');

		$this->session->unset_userdata('id');
		$this->session->unset_userdata('username');
		$query = $this->db->set('status',0)->where('id',$id)->update('tbl_admin');
		redirect('welcome/index');
	}

}//Admin

?>