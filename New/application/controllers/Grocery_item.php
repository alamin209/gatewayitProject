<?php
defined('BASEPATH') OR exit('Super Admin error');

class Grocery_item extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Grocery_model');
		$this->load->helper('admin_helper');
	}
	
	public function index(){

		$data['result']=$this->Admin_model->products();
		$data['result4']=$this->Admin_model->manage_order();
		$data['product_info'] = $this->Admin_model->select_all_order();
		$this->load->view('admin/master',$data);
	}

//==================== product =============================//

	public function Grocery(){

		$data = array();
		$data['slider'] = 0;
		$data['testimonial'] = 0;
		$data['footer_bottom'] = 0;
		$data['title'] = "Upohar Bangla | Grocery Items";
		$data['All_Category'] = $this->Admin_model->category();
		$data['Grocery_items']=$this->Grocery_model->get_grocery();
		$data['content'] = $this->load->view('frontend/page/grocery_item', $data, true);
		$this->load->view('frontend/index', $data);
	}

	public function GroceryItems(){

		$data=array();
		$data['result']=$this->Grocery_model->get_grocery();
		$this->load->view('admin/grocery',$data);
	}

	public function add_grocery(){

		$this->load->view('admin/add_grocery');
	}

	public function save_grocery(){

		$data=array();
		$data['cat_id'] = $this->input->post('cat_id');
		$data['prod_name'] = $this->input->post('prod_name');
		$data['prod_price'] = $this->input->post('prod_price');
		
		$result = $this->Grocery_model->save_grocery_item($data);

		if($result){
            $sdata["message"]="Food Item Add Successfully !!!";
	        redirect('Grocery_item/add_grocery');
		}else{
			$sdata=array();
			$sdata["message"]="Failed to Add !!!";
			$this->session->set_userdata($sdata);
	        redirect('Grocery_item/add_grocery');
		}
	}
	

	public function edit_product($id){

		$data['selected_product'] = $this->Grocery_model->select_product_by_id($id);
		$this->load->view('admin/edit_grocery',$data);
		
	}

	public function update_grocery(){

		$id = $this->input->post('id');
		$data['cat_id'] = $this->input->post('cat_id');
		$data['prod_name'] = $this->input->post('prod_name');
		$data['prod_price'] = $this->input->post('prod_price');


		$result = $this->Grocery_model->update_grocery_item($id,$data);

		if($result){
			$sdata=array();
			$sdata["message"]="Item Update Successfully !!!";
			$this->session->set_userdata($sdata);
	        redirect('Grocery_item/GroceryItems');
		}else{
			$sdata=array();
			$sdata["message"]="Failed to Update !!!";
			$this->session->set_userdata($sdata);
	        redirect('Grocery_item/GroceryItems');
		}

	}//update_grocery

	public function delete_grocery($id){

		$result = $this->Grocery_model->delete_grocery_by_id($id);

		if($result){

			$sdata=array();
			$sdata["delete"]="Deleted Successfully";
			$this->session->set_userdata($sdata);
			redirect('Grocery_item/GroceryItems');
			
		}else{

			$sdata=array();
			$sdata["delete"]="Failed to Delete";
			$this->session->set_userdata($sdata);
			redirect('Grocery_item/GroceryItems');
		}

	}

} //super_admin

?>