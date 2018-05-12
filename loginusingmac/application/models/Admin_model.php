<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	public function save_user($tblName, $data){

		$result = $this->db->insert($tblName, $data);
		return $result;
	}

	public function check_admin_login($username, $password, $mac_address){

		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$this->db->where('mac_address',$mac_address);
		$query = $this->db->get();
		$result = $query->row();
		return $result;

	}

}
?>