<?php
defined('BASEPATH') OR exit('add cart problem');
class Add_cart extends CI_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->model('Cart_model');
		$this->load->helper('admin_helper');
        $this->load->model('Admin_model');

    }

	private function Debug($data){
		echo "<pre>";
		print_r($data);
		exit();
	}

	public function cart($cart_id){
        $this->load->library('cart');
		$flaver = $this->input->post('flaver');
		$weight = $this->input->post('weight');
		$qty = $this->input->post('qty');
        $extra = $this->input->post('extra');
		$data['pricebyweight'] = $this->db->select('price')->from('tbl_flover_weight')->where('fw_id',$weight)->get()->row();
		$pricebyweight = $data['pricebyweight']->price;
		$value = $this->Cart_model->cart_details($cart_id);

		if($weight == 0){

			$sdata = array(
	            'id' => $value->prod_id,
	            'prod_catid' => $value->prod_catid,
	            'prod_subcatid' => $value->prod_subcatid,
	            'flaver'      => $flaver,
	            'weight'      => $weight,
	            'qty'     => $qty,
	             'extra' =>$extra,
	            'price'   => $value->prod_price,
	            'code'   => $value->prod_code,
	            'name'    => $value->prod_name,
	            'image'    => $value->image
	        );

		}else{

			$sdata = array(
	            'id'      => $value->prod_id,
	            'prod_catid'      => $value->prod_catid,
	            'prod_subcatid'      => $value->prod_subcatid,
	            'flaver'      => $flaver,
	            'weight'      => $weight,
	            'qty'     => $qty,
                'extra'    =>$extra,
                'price'   => $pricebyweight,
	            'code'   => $value->prod_code,
	            'name'    => $value->prod_name,
	            'image'    => $value->image
	        );
		}



        // $sdata = array(
        //     'price'   => $value->prod_price
        // );

		//$this->Debug($sdata);
		$this->cart->product_name_rules = '^.';
//        $this->cart->product_name_rules = '\.\:\-_ a-z0-9\\\(\)\/,';


        if($this->cart->insert($sdata)){


            redirect('show_cart');

       }else{

           print 'Sorry! This is Server Problem';
       }

	}//cart

	public function show_cart(){

		$data = array();
		$data['slider'] = 0;
		$data['testimonial'] = 0;
		$data['footer_bottom'] = 0;
		$data['title'] = "Cart Details";
		$data['showcharge']=$this->Admin_model->charge();
		$data['content'] = $this->load->view('frontend/cart/show_cart', $data, true);
        $this->load->view('frontend/index', $data);

	}


	public function grocery_cart($ItemID){

		$qty = $this->input->post('qty');

		$value = $this->Cart_model->item_details($ItemID);

		$sdata = array(
			'id'    => $value->id,
			'cat_id'    => $value->cat_id,
			'qty'   => $qty,
			'name'  => $value->prod_name,
			'price' => $value->prod_price
		);



		if($this->cart->insert($sdata)){

			$msg = array();
			$msg["message"] = "Item Added!!";
			$this->session->set_userdata($msg);
			redirect('Grocery_item/Grocery');

		}else{

			echo "fail to add";
		}

	}
    public function food_cart($ItemID){

        $qty = $this->input->post('qty');
        $value = $this->Cart_model->Food_details($ItemID);
        $sdata = array(
            'id'    => $value->id,
            'cat_id'    => $value->cat_id,
            'qty'   => $qty,
            'name'  => $value->prod_name,
            'price' => $value->prod_price
        );

        if($this->cart->insert($sdata)){

            $msg = array();
            $msg["message"] = "Item Added Successfully ";
            $this->session->set_userdata($msg);
            redirect('Foodcourt/Foods');

        }else{

            echo "fail to add";
        }

    }
	//grocery_cart

	
	// public function show_grocery_cart(){

	// 	$data = array();
	// 	$data['slider'] = 0;
	// 	$data['testimonial'] = 0;
	// 	$data['footer_bottom'] = 0;
	// 	$data['title'] = "Grocery Cart Details";
	// 	$data['content'] = $this->load->view('frontend/cart/show_grocery', $data, true);
	// 	$this->load->view('frontend/index', $data);	
	// }

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

	public function Update_grocery_cart($rowid){

        $qty = $this->input->post('qty');
        $data = array(
        	'rowid' => $rowid,
        	'qty'   => $qty
        );

        $this->cart->update($data);
        redirect('Add_cart/show_grocery_cart');
	}

	public function remove_grocery($rowid){

		$data = array(
			'rowid' => $rowid,
			'qty'   => 0
		);

		$this->cart->update($data);
		redirect('Add_cart/show_grocery_cart');
	}

	public function remove_all(){

		$this->cart->destroy();
		$data = array();
		$data['slider'] = 0;
		$data['testimonial'] = 0;
		$data['footer_bottom'] = 0;
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