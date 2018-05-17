<?php
class User_model extends CI_Model{

	
	public function check_customer_login_info($email, $password){

		$query = $this->db->select('*')->from('tbl_customer')->where('email_address',$email)->where('password',$password)->get()->row();
		
		return $query;
	}

	public function update_customer_fino($customer_id, $data){

		return $this->db->where('customer_id', $customer_id)->update('tbl_customer', $data);
	}

	public function update_password($userID,$new_pass){

		$this->db->set('password', $new_pass);
		$query = $this->db->where('customer_id', $userID)->update('tbl_customer');
		return $query;
	}
	
	public function save_order_info(){

		/*
		#save data in order table.
		*/
		$odata=array();
		$odata['customer_id'] = $this->session->userdata('customer_id');
		$odata['shipping_id'] = $this->session->userdata('shipping_id');
		$odata['payment_id'] = $this->session->userdata('payment_id');
		$odata['order_total'] = $this->session->userdata('g_total');
		
		$this->db->insert('tbl_order',$odata);
		$order_id = $this->db->insert_id();
		
		/*
		#save data in order details table.
		*/
		$cart = $this->cart->contents();
       
        foreach ($cart as $value) {

	        $oddata = array();
		    $oddata['order_id'] = $order_id;
		    $oddata['product_id'] = $value['id'];
		    $oddata['product_name'] = $value['name'];
		    $oddata['product_price'] = $value['price'];
		    $oddata['product_sales_quantity'] = $value['qty'];
		    $oddata['product_image'] = $value['image'];
		    $oddata['flaver'] = $value['flaver'];
		    $oddata['weight'] = $value['weight'];

			$this->db->insert('tbl_order_details',$oddata);
			
		}//foreach

		$sql="update product as p, tbl_order_details as od
              set p.prod_qty = p.prod_qty - od.product_sales_quantity
              where p.prod_id=od.product_id and od.order_id='$order_id' ";
        $this->db->query($sql);

		//start emailing

		$data=array();
		$data['order_info'] = $this->Admin_model->select_order_info_by_id($order_id);
		$customer_id = $odata['customer_id'];
		$shipping_id = $odata['shipping_id'];
		$data['customer_info'] = $this->Admin_model->select_customer_info_by_id($customer_id);
		$customer_email = $data['customer_info']->email_address;
		$data['shipping_info'] = $this->Admin_model->select_shipping_info_by_id($shipping_id);
		$data['order_details_info'] = $this->Admin_model->select_order_details_info_by_id($order_id);

		/*
        * Start Send Email
        */
        $data['to_address'] = $customer_email;
        $data['subject'] = 'Order View';
        $this->mailer_model->sendEmailToCustomer($data, 'customer_mail',true);
        $this->mailer_model->sendEmailToAdmin($data, 'admin_mail',true);
        /*
        * End Send Email
        */

	}


    
}//User_model

?>