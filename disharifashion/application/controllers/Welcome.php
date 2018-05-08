<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Admin_model');
	}

	private function Debug($data){
		echo "<pre>";
		print_r($data);
		exit();
	}

	public function index(){
		$data = array();
		$data['slider'] = 1;
		$data['testimonial'] = 1;
		$data['footer_bottom'] = 1;
		$data['title'] = "Welcome to DISHARI FASHION";
		$data['result']=$this->Admin_model->all_slider();
		$data['All_Category'] = $this->Admin_model->category();
		$data['All_Product'] = $this->Admin_model->products();
		$data['content'] = $this->load->view('frontend/page/body', $data, true);
		$this->load->view('frontend/index', $data);
	}


	public function Contact(){

		$data = array();
		$data['slider'] = 0;
		$data['title'] = "DISHARI FASHION | Contact Us";
		$data['content'] = $this->load->view('frontend/page/contact', $data, true);
		$this->load->view('frontend/index', $data);	
		
	}

	
	public function ProductByCatId($CatID=''){

		$data = array();
		$data['slider'] = 0;
		$data['title'] = "DISHARI FASHION | Products";
		$data['All_Category'] = $this->Admin_model->category();
		$data['All_CatProduct'] = $this->Admin_model->select_product_by_CatID($CatID);
		$data['Cat_name'] = $this->db->select('category')->from('category')->where('cat_id',$CatID)->get()->row();
		$data['content'] = $this->load->view('frontend/page/product_by_cat', $data, true);
		$this->load->view('frontend/index', $data);
		
	}
	
	public function ProductBySubId($Subid=''){

		$data = array();
		$data['slider'] = 0;
		$data['title'] = "DISHARI FASHION | Products";
		$data['All_Category'] = $this->Admin_model->category();
		$data['All_SubProduct'] = $this->Admin_model->select_product_by_subid($Subid);
		$data['SubCat_name'] = $this->db->select('subcategory')->from('subcategory')->where('subcat_id',$Subid)->get()->row();
		$data['content'] = $this->load->view('frontend/page/product', $data, true);
		$this->load->view('frontend/index', $data);
		
	}
	
	public function ProductDetails($ProdID){

		$data = array();
		$data['slider'] = 0;
		$data['title'] = "Dishari Fashion | Product Details";
		$data['All_Category'] = $this->Admin_model->category();
		$data['product_description'] = $this->db->select('*')->from('product')->where('prod_id',$ProdID)->get()->row();
		//$SubID = $data['product_description']->prod_subcatid;
		//$data['All_SubProduct'] = $this->db->select('*')->from('product')->where('prod_subcatid',$SubID)->get()->result();
		$data['content'] = $this->load->view('frontend/page/product_details', $data, true);
		$this->load->view('frontend/index', $data);	
		
	}


}//Welcome
?>