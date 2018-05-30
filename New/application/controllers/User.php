<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
		$this->load->helper('admin_helper');
	}

	public function MyAccount(){

		$data = array();
		$data['slider'] = 0;
		$data['testimonial'] = 0;
		$data['footer_bottom'] = 0;
		$data['title'] = "Upohar Bangla | My Account";
		$data['All_Category'] = $this->Admin_model->category();
		$data['content'] = $this->load->view('frontend/page/my_account', $data, true);
		$this->load->view('frontend/index', $data);
	}

	public function UpdateCustomerInfo($UserID){

		$data = array();
		$data['slider'] = 0;
		$data['testimonial'] = 0;
		$data['footer_bottom'] = 0;
		$data['title'] = "Upohar Bangla | My Account";
		$data['All_Category'] = $this->Admin_model->category();
		$data['select_info'] = $this->db->select('*')->from('tbl_customer')->where('customer_id', $UserID)->get()->row();
		$data['content'] = $this->load->view('frontend/page/edit_customer', $data, true);
		$this->load->view('frontend/index', $data);
	}

	public function SaveUpdate(){

		$customer_id = $this->input->post('customer_id');
		$data['firstname'] = $this->input->post('firstname');
		$data['lastname'] = $this->input->post('lastname');
		$data['email_address'] = $this->input->post('email_address');
		$data['mobile_no'] = $this->input->post('mobile_no');
		$data['address'] = $this->input->post('address');
		$data['zip_code'] = $this->input->post('zip_code');
		
		$result = $this->User_model->update_customer_fino($customer_id, $data);

        if($result){

			$sdata['message'] = "Updated Successfull!!";
            $this->session->set_userdata($sdata);
            redirect('User/MyAccount');

        }else{

        	$sdata['message'] = 'Failed to Update';
            $this->session->set_userdata($sdata);
            redirect('User/MyAccount');
        }

	}//SaveUpdate

	public function CheckHistory($UserID){

		$data = array();
		$data['slider'] = 0;
		$data['testimonial'] = 0;
		$data['footer_bottom'] = 0;
		$data['title'] = "Upohar Bangla | Order History";
		$data['All_Category'] = $this->Admin_model->category();
		$data['order_info'] = $this->db->select('*')->from('tbl_order')->where('customer_id', $UserID)->get()->result();
		$data['content'] = $this->load->view('frontend/page/order_history', $data, true);
		$this->load->view('frontend/index', $data);
	}

	public function ViewOrderDetails($order_id){

		$data = array();
		$data['slider'] = 0;
		$data['testimonial'] = 0;
		$data['footer_bottom'] = 0;
		$data['title'] = "Upohar Bangla | Order Details";
		$data['All_Category'] = $this->Admin_model->category();

		$data['order_info'] = $this->Admin_model->select_order_info_by_id($order_id);
		$customer_id = $data['order_info']->customer_id;
		$shipping_id = $data['order_info']->shipping_id;
		$data['customer_info'] = $this->Admin_model->select_customer_info_by_id($customer_id);
		$data['shipping_info'] = $this->Admin_model->select_shipping_info_by_id($shipping_id);
		$data['order_details_info'] = $this->Admin_model->select_order_details_info_by_id($order_id);
		$data['content'] = $this->load->view('frontend/page/view_order', $data, true);
		$this->load->view('frontend/index', $data);

	}

	public function user_login(){

		$email = $this->input->post('email_address');
		$password = md5($this->input->post('password'));

		$result = $this->User_model->check_customer_login_info($email, $password);

        if($result){
        	$sdata = array();
			$sdata['name'] = $result->firstname.' '.$result->lastname;
            $sdata['customer_id'] = $result->customer_id;
            $this->session->set_userdata($sdata);
            redirect('User/MyAccount');

        }else{

        	$sdata['message'] = 'User Id / Password is Invalid';
            $this->session->set_userdata($sdata);
            redirect('checkout/CustomerLogin');
        }

	}//user_login

	public function ChangePassword(){

    	$data = array();
		$data['slider'] = 0;
		$data['testimonial'] = 0;
		$data['footer_bottom'] = 0;
		$data['title'] = "Upohar Bangla | My Account";
		$data['All_Category'] = $this->Admin_model->category();
		$data['content'] = $this->load->view('frontend/page/change_password', $data, true);
		$this->load->view('frontend/index', $data);
    }

    public function UpdatePassword(){

    	$UserID = $this->session->userdata('customer_id');
    	$old_pass = md5($this->input->post('old_password'));
    	$new_pass = md5($this->input->post('new_password'));
    	$con_pass = md5($this->input->post('con_password'));

    	$pre_info = $this->db->select('*')->from('tbl_customer')->where('customer_id', $UserID)->get()->row();
    	$pre_pass = $pre_info->password; 

  		if($pre_pass == $old_pass){

  			if($new_pass == $con_pass){

  				$result = $this->User_model->update_password($UserID,$new_pass);

  				if($result){

  					$this->session->unset_userdata('customer_id');
					$this->session->unset_userdata('name');
					$sdata=array();
					$sdata["message"]="Password Updated Successfully ! Login Again";
					$this->session->set_userdata($sdata);
					redirect('Checkout/CustomerLogin');

				}else{

					$sdata=array();
					$sdata["message"]="Failed to Update Password";
					$this->session->set_userdata($sdata);
					redirect('User/ChangePassword');
				}

  			}else{

  				$sdata=array();
				$sdata["message"]="Password and Confirm Password doesn't Match.!!!";
				$this->session->set_userdata($sdata);
				redirect('User/ChangePassword');

  			}
  			
  		}else{

  			$sdata=array();
			$sdata["message"]="Old Password doesn't Match.!!!";
			$this->session->set_userdata($sdata);
			redirect('User/ChangePassword');
  			
  		}

    }//update_password


}//user

?>