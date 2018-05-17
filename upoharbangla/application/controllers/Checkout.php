<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('admin_helper');
	}

	public function index(){

		$data = array();
		$data['slider'] = 0;
		$data['testimonial'] = 0;
		$data['footer_bottom'] = 0;
		$data['title'] = "Checkout";
		$data['content'] = $this->load->view('frontend/checkout/checkout', '', true);
		$this->load->view('frontend/index', $data);
	}

	public function CustomerRegistration(){

		$data = array();
		$data['slider'] = 0;
		$data['testimonial'] = 0;
		$data['footer_bottom'] = 0;
		$data['title'] = "Customer Registration";
		$data['content'] = $this->load->view('frontend/checkout/registration', '', true);
		$this->load->view('frontend/index', $data);
	}
	
	public function save_customer(){

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('firstname', 'Customer First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Customer Last Name', 'required');
        $this->form_validation->set_rules('email_address', 'Customer Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('con_password', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('address', 'Customer Address', 'required');
        $this->form_validation->set_rules('mobile_no', 'Customer Mobile No', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('district', 'State/District', 'required');
        $this->form_validation->set_rules('zip_code', 'Post/Zip Code', 'required');

        if ($this->form_validation->run() == FALSE) {

			$data = array();
			$data['slider'] = 0;
			$data['testimonial'] = 0;
			$data['footer_bottom'] = 0;
			$data['title'] = "Checkout Details";
			$data['content'] = $this->load->view('frontend/checkout/checkout', '', true);
			$this->load->view('frontend/index', $data);	

        } else {

        	$data=array();
			$data['firstname'] = $this->input->post('firstname');
			$data['lastname'] = $this->input->post('lastname');
			$data['email_address'] = $this->input->post('email_address');
			$data['password'] = md5($this->input->post('password'));
			$data['address'] = $this->input->post('address');
			$data['mobile_no'] = $this->input->post('mobile_no');
			$data['country'] = $this->input->post('country');
			$data['district'] = $this->input->post('district');
			$data['zip_code'] = $this->input->post('zip_code');

			$customer_id = $this->Checkout_model->save_customer_info($data);
			
			if($customer_id){

				$sdata=array();
				// $sdata['customer_id'] = $customer_id;
				// $sdata['name'] = $data['firstname'].' '.$data['lastname'];
				// $sdata['login_status'] = true;
				$sdata['message'] = "Registration Successful !!!";
				$this->session->set_userdata($sdata);
				redirect('Checkout/index');
			}else{

				$sdata=array();
				$sdata['message'] = "Failed to Save";
				$this->session->set_userdata($sdata);
				redirect('Checkout/CustomerRegistration');
			}
            
        }
		
	}
	
	public function Shipping_form(){

		$data = array();
		$data['slider'] = 0;
		$data['testimonial'] = 0;
		$data['footer_bottom'] = 0;
		$data['title'] = "Checkout | Shipping Details";
		$data['content'] = $this->load->view('frontend/checkout/shipping_form', '', true);
		$this->load->view('frontend/index', $data);
	}
	
	public function save_shipping(){
		
		$data=array();
		$data['name'] = $this->input->post('name');
		$data['email'] = $this->input->post('email');
		$data['phone'] = $this->input->post('phone');
		$data['address'] = $this->input->post('address');
		$data['floor'] = $this->input->post('floor');
		$data['area'] = $this->input->post('area');
		$data['zip_code'] = $this->input->post('zip_code');
		$data['country'] = $this->input->post('country');
		$data['district'] = $this->input->post('district');
		$data['city'] = $this->input->post('city');
		$data['relation'] = $this->input->post('relation');
		$data['occassion'] = $this->input->post('occassion');
		$data['take_photo'] = $this->input->post('take_photo');
		$data['give_call'] = $this->input->post('give_call');
		$data['rose'] = $this->input->post('rose');
		$data['del_time'] = $this->input->post('del_time');
		$data['del_date'] = $this->input->post('del_date');

		//print_r($data);exit;

		$shipping_id = $this->Checkout_model->save_shipping_info($data);

		if($shipping_id){
			$sdata=array();
			$sdata['shipping_id'] = $shipping_id;
			$this->session->set_userdata($sdata);
			redirect('Checkout/Payment_form');
		}else{
			$sdata=array();
			$sdata['message'] = "Failed to Insert"; 
			$this->session->set_userdata($sdata);
			redirect('Checkout/save_shipping');
		}

	}
	
	public function Payment_form(){

		$data = array();
		$data['slider'] = 0;
		$data['testimonial'] = 0;
		$data['footer_bottom'] = 0;
		$data['title'] = "Checkout | Payment Details";
		$data['content'] = $this->load->view('frontend/checkout/payment_form', '', true);
		$this->load->view('frontend/index', $data);
	}
	
	public function Confirm_Order(){
		
		$payment = $this->input->post('payment');

		if($payment == 'cash'){
			
			$pdata=array();
			$pdata['payment_type'] = $payment;
			$payment_id = $this->Checkout_model->save_payment_info($pdata);
			
			$sdata=array();
			$sdata['payment_id'] = $payment_id;
			$this->session->set_userdata($sdata);
			
			$this->Checkout_model->save_order_info();

			redirect('add_cart/remove_all');
			
			// if($result){
			// 	redirect('add_cart/remove_all');
			// }else{
			// 	echo '<script>alert("Failed to Order");</script>';
			// 	redirect('add_cart/show_cart');
			// }
			
			
		}else if($payment == 'bkash'){
			
			$pdata=array();
			$pdata['payment_type'] = $payment;
			$payment_id = $this->Checkout_model->save_payment_info($pdata);
			
			$sdata=array();
			$sdata['payment_id'] = $payment_id;
			$this->session->set_userdata($sdata);
			
			$this->Checkout_model->save_order_info();
			$this->load->view('htmlWebsiteStandardPayment');
			
		}
	}

	public function CustomerLogin(){

		$data = array();
		$data['slider'] = 0;
		$data['testimonial'] = 0;
		$data['footer_bottom'] = 0;
		$data['title'] = "Customer Login";
		$data['content'] = $this->load->view('frontend/checkout/customer_login', '', true);
		$this->load->view('frontend/index', $data);
	}

	public function login_customer(){

		$email = $this->input->post('email_address');
		$password = md5($this->input->post('password'));

		$result = $this->Checkout_model->check_customer_login_info($email, $password);
        $sdata = array();
        if($result){

			$sdata['name'] = $result->firstname.' '.$result->lastname;
            $sdata['email_address'] = $result->email_address;
            $sdata['mobile_no'] = $result->mobile_no;
            $sdata['customer_id'] = $result->customer_id;
            $this->session->set_userdata($sdata);
            redirect('checkout/Shipping_form');

        }else{

        	$sdata['message'] = 'User Id / Password Invalid';
            $this->session->set_userdata($sdata);
            redirect('checkout/index');
        }

	}

	public function logout(){

		$this->session->unset_userdata('customer_id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('email_address');
		$sdata['message'] = 'You have successfully Logged out!!!';
        $this->session->set_userdata($sdata);
        redirect('checkout/CustomerLogin'); 
	}


}//Checkout

?>