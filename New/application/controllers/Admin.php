<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Admin_model');
	}

	public function index(){

		$this->load->view('admin/index');
	}

	public function admin_login(){

		$result=$this->Admin_model->admin_login();

		if($result){

			$sdata=array();
			$sdata['id']=$result->id;
			$sdata['admin']=$result->username;
			$this->session->set_userdata($sdata);
			redirect('Super_admin');

		}else{

			$sdata=array();
			$sdata['exception']="Username and Password Invalid";
			$this->session->set_userdata($sdata);
			redirect('Admin');
		}
	}




}//Admin