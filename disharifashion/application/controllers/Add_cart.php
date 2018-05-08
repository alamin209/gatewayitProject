<?php
defined('BASEPATH') OR exit('add cart problem');
class Add_cart extends CI_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->model('Cart_model');
		$this->load->helper('admin_helper');
	}

	private function Debug($data){
		echo "<pre>";
		print_r($data);
		exit();
	}

	public function cart($cart_id){

		$value = $this->Cart_model->cart_details($cart_id);
		//var_dump($value);exit();

		$sdata = array(
            'id'      => $value->prod_id,
            'prod_catid'      => $value->prod_catid,
            'prod_subcatid'      => $value->prod_subcatid,
            'qty'     => '1',
            'price'   => $value->prod_price,
            'code'   => $value->prod_code,
            'name'    => $value->prod_name,
            'image'    => $value->image
        );

		//$this->Debug($sdata);
		//$this->cart->product_name_rules = '^.';

       if($this->cart->insert($sdata)){

            redirect('show_cart');
            //redirect('welcome/');

       }else{

           print 'Sorry! This is Server Problem';
       }

	}

	public function show_cart(){

		$data = array();
		$data['slider'] = 0;
		$data['title'] = "Cart Details";
		$data['content'] = $this->load->view('frontend/cart/show_cart', '', true);
		$this->load->view('frontend/index', $data);	

	}

	public function Update_cart($rowid){

        $qty = $this->input->post('qty');

        $data = array(
        	'rowid' => $rowid,
        	'qty' => $qty
        );
        $this->cart->update($data);
        redirect('show_cart');
	}

	public function remove($rowid){

		$data = array(
            'rowid' => $rowid,
            'qty'   =>0
        );
        $this->cart->update($data);
        redirect('show_cart');
	}

	public function remove_all(){

		$this->cart->destroy();
		$data = array();
		$data['slider'] = 0;
		$data['title'] = "Order Done";
		$data['content'] = $this->load->view('frontend/checkout/order_done', '', true);
		$this->load->view('frontend/index', $data);	
    
	}

	public function remove_item(){

		$this->cart->destroy();
		redirect('Welcome');
	}


}//Add_cart
?>