<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index(){
		
		$this->load->view('index');
	}

	public function reg_success(){
		
		$this->load->view('login');
	}

	public function about(){
		
		$this->load->view('about');
	}


}//welcome
?>