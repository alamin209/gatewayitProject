<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->helper('admin_helper');
        $this->load->model('FoodCourt_model');

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
		$data['title'] = "Welcome to Upohar Bangla";
		$data['All_Category'] = $this->Admin_model->category();
		$data['All_Product'] = $this->Admin_model->products();
		$data['content'] = $this->load->view('frontend/page/body', $data, true);
		$this->load->view('frontend/index', $data);	
	}
	
	public function Catelog(){

		$data = array();
		$data['slider'] = 0;
		$data['testimonial'] = 0;
		$data['footer_bottom'] = 0;
		$data['title'] = "Upohar Bangla | Product Catelog";
		$data['All_Category'] = $this->Admin_model->category();
		$data['content'] = $this->load->view('frontend/page/catelog', $data, true);
		$this->load->view('frontend/index', $data);	
		
	}
	
	public function HowToOrder(){

		$data = array();
		$data['slider'] = 0;
		$data['testimonial'] = 0;
		$data['footer_bottom'] = 0;
		$data['title'] = "Upohar Bangla | How to order gifts";
		$data['All_Category'] = $this->Admin_model->category();
		$data['content'] = $this->load->view('frontend/page/howtoorder', $data, true);
		$this->load->view('frontend/index', $data);	
		
	}

	public function HowToPay(){

		$data = array();
		$data['slider'] = 0;
		$data['testimonial'] = 0;
		$data['footer_bottom'] = 0;
		$data['title'] = "Upohar Bangla | How to pay";
		$data['All_Category'] = $this->Admin_model->category();
		$data['content'] = $this->load->view('frontend/page/howtopay', $data, true);
		$this->load->view('frontend/index', $data);	
		
	}

	public function FAQ(){

		$data = array();
		$data['slider'] = 0;
		$data['testimonial'] = 0;
		$data['footer_bottom'] = 0;
		$data['title'] = "Upohar Bangla | How to pay";
		$data['All_Category'] = $this->Admin_model->category();
		$data['content'] = $this->load->view('frontend/page/faq', $data, true);
		$this->load->view('frontend/index', $data);	
		
	}

	public  function About()
    {
        $data = array();
        $data['slider'] = 0;
        $data['testimonial'] = 0;
        $data['footer_bottom'] = 0;
        $data['title'] = "Upohar Bangla | Contact Us";
        $data['All_Category'] = $this->Admin_model->category();
        $data['content'] = $this->load->view('frontend/page/aboutUs', $data, true);
        $this->load->view('frontend/index', $data);

    }

	public function Contact(){

		$data = array();
		$data['slider'] = 0;
		$data['testimonial'] = 0;
		$data['footer_bottom'] = 0;
		$data['title'] = "Upohar Bangla | Contact Us";
		$data['All_Category'] = $this->Admin_model->category();
		$data['content'] = $this->load->view('frontend/page/contact', $data, true);
		$this->load->view('frontend/index', $data);	
		
	}


	public function sortingCatIdProduct()
    {
        $p_id = $this->input->post('id');
        $cat_id=$this->input->post('cat_id');

    if ($p_id=="df")
    {
        $data['code'] = $this->Admin_model->getProductByLatest($cat_id);
        $this->load->view('frontend/page/sortedBycode', $data);
    }

        elseif($p_id=="low")
        {

            $data['low'] = $this->Admin_model->getProductBylow($cat_id);
            $this->load->view('frontend/page/sortedBylow', $data);
        }
       elseif ($p_id=="high")
       {
           $data['high'] = $this->Admin_model->getProductByHigh($cat_id);
           $this->load->view('frontend/page/sortedByhigh', $data);
       }
        elseif ($p_id=="code")
        {
            $data['code'] = $this->Admin_model->getProductByCode($cat_id);
            $this->load->view('frontend/page/sortedBycode', $data);
        }

         elseif ($p_id=="lat")
    {
    $data['code'] = $this->Admin_model->getProductByLatest($cat_id);
            $this->load->view('frontend/page/sortedBycode', $data);
        }

    }

    public function sortingSubcatIdProduct()
    {
        $p_id = $this->input->post('id');
        $cat_id=$this->input->post('sub_cat');
        if($p_id=="df")
        {
            $data['latest'] = $this->Admin_model->getProductBySubLatest($cat_id);
            $this->load->view('frontend/page/sortedByLatest', $data);
        }
        elseif($p_id=="low")
        {

            $data['low'] = $this->Admin_model->getsubProductBylow($cat_id);
            $this->load->view('frontend/page/sortedBylow', $data);
        }

        elseif ($p_id=="high")
        {
            $data['high'] = $this->Admin_model->getsubProductByHigh($cat_id);
            $this->load->view('frontend/page/sortedByhigh', $data);
        }
        elseif ($p_id=="code")
        {
            $data['code'] = $this->Admin_model->getsubProductByCode($cat_id);
            $this->load->view('frontend/page/sortedBycode', $data);
        }

        elseif ($p_id=="lat")
        {
            $data['latest'] = $this->Admin_model->getProductBySubLatest($cat_id);
            $this->load->view('frontend/page/sortedByLatest.php', $data);
        }

    }





    /* public function GiftPackage(){

        $data = array();
        $data['slider'] = 0;
        $data['testimonial'] = 0;
        $data['footer_bottom'] = 0;
        $data['title'] = "Upohar Bangla";
        $data['All_Category'] = $this->Admin_model->category();
        $data['content'] = $this->load->view('frontend/page/gift_package', $data, true);
        $this->load->view('frontend/index', $data);

    } */
	
	public function SubCategory($CatID){
		
		$data = array();
		$data['slider'] = 0;
		$data['testimonial'] = 0;
		$data['footer_bottom'] = 0;
		$data['title'] = "Upohar Bangla | Products";
		$data['All_Category'] = $this->Admin_model->category();
		$data['Category_Name'] = $this->db->select('category')->from('category')->where('cat_id', $CatID)->get()->row();
		$data['All_SubCategory'] = $this->Admin_model->select_subcategory_byID($CatID);
		$data['content'] = $this->load->view('frontend/page/sub_category', $data, true);
		$this->load->view('frontend/index', $data);	
		
	}
	
	public function ProductByCatID($CatID=''){

		$data = array();
		$data['slider'] = 0;
		$data['testimonial'] = 0;
		$data['footer_bottom'] = 0;
		$data['title'] = "Upohar Bangla | Products";
		$data['All_Category'] = $this->Admin_model->category();
		$data['All_CatProduct'] = $this->Admin_model->select_product_by_CatID($CatID);
		$data['Cat_name'] = $this->db->select('category,cat_id')->from('category')->where('cat_id',$CatID)->get()->row();
		$data['content'] = $this->load->view('frontend/page/product_by_cat', $data, true);
		$this->load->view('frontend/index', $data);
		
	}
	
	public function ProductBySubID($Subid=''){

		$data = array();
		$data['slider'] = 0;
		$data['testimonial'] = 0;
		$data['footer_bottom'] = 0;
		$data['title'] = "Upohar Bangla | Gift For Him";
		$data['All_Category'] = $this->Admin_model->category();
		$data['All_SubProduct'] = $this->Admin_model->select_product_by_subid($Subid);
		$data['SubCat_name'] = $this->db->select('subcategory,subcat_id')->from('subcategory')->where('subcat_id',$Subid)->get()->row();
        $data['SubCat_names'] = $this->db->select('subcat_id')->from('subcategory')->where('subcat_id',$Subid)->get()->row();


		foreach ($data['SubCat_names']  as $s ) {

            if ($s == 108) {
                redirect("Foodcourt/Foods");
            }
        else
        {
            $data['content'] = $this->load->view('frontend/page/product', $data, true);
            $this->load->view('frontend/index', $data);
        }
		}
	}


    public function searchByProductName()
    {

        $data = array();
        $data['slider'] = 0;
        $data['testimonial'] = 0;
        $data['footer_bottom'] = 0;
        $data['title'] = "Upohar Bangla | Product Details";
        $data['All_Category'] = $this->Admin_model->category();
        $productName=$this->input->post("searchStr");
        $data['product']=$this->Admin_model->search($productName);
        $data['content'] = $this->load->view('frontend/page/afterSearch', $data, true);
        $this->load->view('frontend/index', $data);

    }
	
	public function ProductDetails($ProdID){


		$data = array();
		$data['slider'] = 0;
		$data['testimonial'] = 0;
		$data['footer_bottom'] = 0;
		$data['title'] = "Upohar Bangla | Product Details";
		$data['All_Category'] = $this->Admin_model->category();
		$data['product_description'] = $this->db->select('*')->from('product')->where('prod_id',$ProdID)->get()->row();
		//$SubID = $data['product_description']->prod_subcatid;
		//$data['All_SubProduct'] = $this->db->select('*')->from('product')->where('prod_subcatid',$SubID)->get()->result();
        $data['product_d'] = $this->Admin_model->getProductDetails();
        $data['product_e'] = $this->Admin_model->getProductExtra();
        $data['content'] = $this->load->view('frontend/page/product_details', $data, true);
		$this->load->view('frontend/index', $data);	
		
	}

//-----------------------// menu end //-------------------


	// public function ProductBySubId($subcatid){

	// 	$this->load->view('frontend/page/top_bar');
	// 	$this->load->view('frontend/page/header');
	// 	$this->load->view('frontend/page/menu');
	// 	$data['all_subcatproduct'] = $this->Admin_model->select_product_by_subid($subcatid);
	// 	$this->load->view('frontend/page/product_by_subid',$data);
	// 	$this->load->view('frontend/page/footer');
	// }
	// public function ProductBySubId2($subcatid2){

	// 	$this->load->view('frontend/page/top_bar');
	// 	$this->load->view('frontend/page/header');
	// 	$this->load->view('frontend/page/menu');
	// 	$data['all_subcatproduct2'] = $this->Admin_model->select_product_by_subid2($subcatid2);
	// 	$this->load->view('frontend/page/product_by_subid2',$data);
	// 	$this->load->view('frontend/page/footer');
	// }


	//--RONI--//
	// public function subcat($subcat)
	// {
	// 	$data['subcat']=$this->db->select('*')->from('subcategory')->where('subcat_catid',$subcat)->get()->result();
	// 	$this->load->view('frontend/page/top_bar');
	// 	$this->load->view('frontend/page/header');
	// 	$this->load->view('frontend/page/menu');
	// 	//$this->load->view('frontend/page/left_slider.php');
	// 	$this->load->view('frontend/page/subcategory',$data);
	// 	$this->load->view('frontend/page/footer');
	// }


	// public function subcat2($subcat2)
	// {
	// 	$data['subcat2']=$this->db->select('*')->from('subcategory_two')->where('subcat_subcatid',$subcat2)->get()->result();
	// 	$this->load->view('frontend/page/top_bar');
	// 	$this->load->view('frontend/page/header');
	// 	$this->load->view('frontend/page/menu');
	// 	//$this->load->view('frontend/page/left_slider.php');
	// 	$this->load->view('frontend/page/subcategory2',$data);
	// 	$this->load->view('frontend/page/footer');
	// }


}//Welcome
?>