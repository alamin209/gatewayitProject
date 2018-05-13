<?php
defined('BASEPATH') OR exit('Super Admin error');

class Super_admin extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->helper('admin_helper');
		 $this->load->library('pdfgenerator');
		 if ($this->session->userdata('id') == null || $this->session->userdata('id') < 1) {
            if ($this->router->class != 'login') {
                redirect(base_url('Admin/admin_login'));

            }
        }
        
	}
	
	public function index(){

		$data['result']=$this->Admin_model->products();
		$data['result4']=$this->Admin_model->manage_order();
		$data['product_info'] = $this->Admin_model->select_all_order();
		$this->load->view('admin/master',$data);
	}

//===================== slider ==============================//

	public function slider(){

		$data=array();
		$data['result']=$this->Admin_model->all_slider();
		$this->load->view('admin/slider',$data);
	}

	public function add_slider(){

		$this->load->view('admin/add_slider');
	}

	public function save_slide(){

		$data=array();

		$config['upload_path'] = 'assets/img/slider/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024;
        $config['max_width'] = 1000;
        $config['max_height'] = 1000;

        $this->load->library('upload', $config);
        $error='';
        $fdata=array();
        if ( ! $this->upload->do_upload('image')){

            $error = $this->upload->display_errors();
            $dt['img_msg'] = $error;
            $this->session->set_userdata($dt);
            redirect(current_url());

        }else{

    		$fdata=$this->upload->data();
            $data['image'] = $config['upload_path'].$fdata['file_name'];

        }

		$result = $this->Admin_model->save_slide_info($data);

		if($result){

			$sdata=array();
			$sdata["message"]="Slider Add Successfully !";
			$this->session->set_userdata($sdata);
        	redirect('super_admin/add_slider');

		}else{

			$sdata=array();
			$sdata["message"]="Failed to Upload !";
			$this->session->set_userdata($sdata);
        	redirect('super_admin/add_slider');

		}

	}

	public function edit_slider($sliderID){

		$data=array();
		$data['result']=$this->Admin_model->select_slider_by_id($sliderID);
		$this->load->view('admin/edit_slider',$data);
	}

	public function update_slide(){

		$data=array();
		$slideID = $this->input->post('slide_id');

		if($this->updateSlidePhoto() != null) {

			if(isset($slideID) && $slideID != ''){

				$data = array('slide_id' => $slideID);
				$prev_info = $this->db->get_where("tbl_slide",$data)->row();
				//echo $prev_info->image;exit();
				//delete previous image history

				if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] != '')){
					unlink($prev_info->image);
				}
			}

            $data['image'] = $this->updateSlidePhoto();
        }

		$result = $this->Admin_model->update_slide_info($data,$slideID);

		if($result){

			$sdata=array();
			$sdata["message"]="Slider Update Successfully !";
			$this->session->set_userdata($sdata);
        	redirect('super_admin/slider');

		}else{

			$sdata=array();
			$sdata["message"]="Failed to Upload !";
			$this->session->set_userdata($sdata);
        	redirect('super_admin/slider');

		}

	}

	private function updateSlidePhoto(){

        $this->load->library('upload');
        $config['upload_path'] = './assets/img/slider/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        // $config['max_size'] = 1024;
        // $config['max_width'] = 700;
        // $config['max_height'] = 800;
        $config['encrypt_name'] = false;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('image')) {
            return null;
        }
        $uploadImage = $this->upload->data();
        if ($uploadImage['is_image'] == 1)
            return $config['upload_path'] . $uploadImage['file_name'];
        else
        	$sdata=array();
			$sdata["delete"]="Invalid Image Please select jpg or png";
			$this->session->set_userdata($sdata);
			redirect('slider');
    }

    public function DeleteSlider($ID){

		$result = $this->Admin_model->delete_slide_image($ID);
		if($result){

			$sdata=array();
			$sdata["delete"]="Slide has been Delete Successfully";
			$this->session->set_userdata($sdata);
			redirect('super_admin/slider');

		}else{

			$sdata=array();
			$sdata["delete"]="Failed to Delete";
			$this->session->set_userdata($sdata);
			redirect('super_admin/slider');

		}
		
	}

//===================== slider end =========================//

	public function add_category(){

		$this->load->view('admin/add_category');
	}

	public function category_save(){

		$this->form_validation->set_rules('name', 'name', 'required');
		if ($this->form_validation->run() == FALSE){

            redirect('add_category');

        }else{

            $data=array();
            $data['category']=$this->input->post('name');
            $data['cat_image'] = $this->uploadPhoto();
            $this->Admin_model->add_category($data);
            $sdata=array();
            $sdata['message']="Category Add Successfully";
            $this->session->set_userdata($sdata);
            redirect('add_category');
        }
	}

	private function uploadPhoto(){

        $config['upload_path'] = './assets/admin/cat_image/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        // $config['max_size'] = 1024;
        // $config['max_width'] = 300;
        // $config['max_height'] = 300;

        $this->load->library('upload', $config);
        $error='';
        $fdata=array();
        if ( ! $this->upload->do_upload('cat_image')){

            $error = $this->upload->display_errors();
            $dt['message'] = $error;
            $this->session->set_userdata($dt);
            redirect(current_url());

        }else{

    		$fdata=$this->upload->data();
            return $config['upload_path'] . $fdata['file_name'];

        }

    }//uploadPhoto

	public function category(){

		$data=array();
		$data['result']=$this->Admin_model->category();
		// var_dump($result);exit();
		$this->load->view('admin/category',$data,'true');
	}

	public function edit_category($id){

		$data=array();
		$data['result']=$this->Admin_model->edit_category($id);
		$this->load->view('admin/edit_category',$data,'true');
	}

	public function edit_category_save(){

		$id=$this->input->post('id');
		$data['category']=$this->input->post('category');
		if ($this->updatePhoto() != null) {
            $data['cat_image'] = $this->updatePhoto();
        }
		$this->Admin_model->edit_category_save($id,$data);
		$sdata=array();
		$sdata["update"]="Category Update Successfully";
		$this->session->set_userdata($sdata);
		redirect('category');
	}

	private function updatePhoto(){

        $this->load->library('upload');
        $config['upload_path'] = './assets/admin/cat_image/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 150;
        $config['max_width'] = 300;
        $config['max_height'] = 300;
        $config['encrypt_name'] = false;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('cat_image')) {
            return null;
        }
        $uploadImage = $this->upload->data();
        if ($uploadImage['is_image'] == 1)
            return $config['upload_path'] . $uploadImage['file_name'];
        else
        	$sdata=array();
            $sdata['message']="Invalid Image Please select jpg or png";
            $this->session->set_userdata($sdata);

        	redirect("Super_admin/add_category");
    }

	public function delete_category($id){

		$this->Admin_model->delete_category($id);
		$sdata=array();
		$sdata["delete"]="Category Delete Successfully";
		$this->session->set_userdata($sdata);
		redirect('category');
	}

//==================== category end =============================//

	public function add_subcategory(){

		$data=array();
		$data['category']=$this->Admin_model->category();
		$this->load->view('admin/add_subcategory',$data,'true');
	}

	public function subcategory(){

		$data=array();
		$data['subcategory']=$this->Admin_model->subcategory();
		$this->load->view('admin/subcategory',$data,'true'); 
	}

	public function subcategory_save(){

		$data=array();
		$data['subcat_catid']=$this->input->post('category');
		$data['subcategory']=$this->input->post('subcategory');

		$this->Admin_model->add_subcategory($data);
		$data['message']="Subcategory Add Successfully";
		$this->session->set_userdata($data);
		redirect('add_subcategory');
	}

	public function edit_subcategory($id){

		$data=array();
		$data['result'] = $this->Admin_model->select_subcategory_by_id($id);
		$this->load->view('admin/edit_subcategory',$data,'true');
	}

	public function update_subcategory(){

		$id = $this->input->post('id');
		$data['subcategory'] = trim($this->input->post('subcategory'));
		
		$this->Admin_model->update_subcategory_by_id($id,$data);
		$sdata = array();
		$sdata["update"] = "Subcategory Update Successfully";
		$this->session->set_userdata($sdata);
		redirect('subcategory');
	}

	public function delete_subcategory($id){

		$this->Admin_model->delete_subcategory($id);
		$sdata=array();
		$sdata["delete"]="Subcategory Delete Successfully";
		$this->session->set_userdata($sdata);
		redirect('subcategory');
	}
	

//----------------------product-------------------------------//

	public function products(){

		$data=array();
		$data['result']=$this->Admin_model->products(); 
		$this->load->view('admin/products',$data,'true');
	}

	public function add_product(){

		$data=array();
		$data['category']=$this->Admin_model->category();
		$data['subcategory']=$this->Admin_model->subcategory();
		$this->load->view('admin/add_product',$data,'true');
	}

	public function product_save(){

		$data=array();
		$data['prod_name'] = $this->input->post('name');
		$data['prod_catid'] = $this->input->post('category');
		$data['prod_subcatid'] = $this->input->post('subcategory');
		$data['prod_desc'] = $this->input->post('description');
		$data['prod_price'] = $this->input->post('price');
		$data['prod_code'] = $this->input->post('code');
		$data['prod_qty'] = $this->input->post('prod_qty');
		

		$config['upload_path'] = 'assets/img/product_image/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        // $config['max_size'] = 1024;
        // $config['max_width'] = 500;
        // $config['max_height'] = 700;

        $this->load->library('upload', $config);
        $error='';
        $fdata=array();
        if ( ! $this->upload->do_upload('image')){

            $error = $this->upload->display_errors();
            $dt['img_msg'] = $error;
            $this->session->set_userdata($dt);
            redirect(current_url());

        }else{
    		$fdata=$this->upload->data();
            $data['image'] = $config['upload_path'].$fdata['file_name'];
        }
		
		$result = $this->Admin_model->product_save($data);

		if($result){
			$sdata=array();
			$sdata["message"]="Product Add Successfully !!!";
			$this->session->set_userdata($sdata);
	        redirect('add_product');
		}else{
			$sdata=array();
			$sdata["message"]="Failed to Add Product !!!";
			$this->session->set_userdata($sdata);
	        redirect('add_product');
		}
	}
	

	public function edit_product($id){

		$data['selected_product'] = $this->Admin_model->select_product($id);

		$this->load->view('admin/edit_product',$data,'true');
		
	}

	public function UpdateProduct(){

		$data=array();

		$prod_id = $this->input->post('prod_id');
		$data['prod_name'] = $this->input->post('name');
		$data['prod_desc'] = $this->input->post('description');
		$data['prod_price'] = $this->input->post('price');
		$data['prod_code'] = $this->input->post('code');
		$data['prod_qty'] = $this->input->post('prod_qty');
		
		if($this->updateProductPhoto() != null) {

			if(isset($prod_id) && $prod_id != ''){

				$data = array('prod_id' => $prod_id);
				$prev_info = $this->db->get_where("product",$data)->row();
				//echo $prev_info->image;exit();
				//delete previous image history

				if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] != '')){
					unlink($prev_info->image);
				}
			}

            $data['image'] = $this->updateProductPhoto();
        }
       
		$this->Admin_model->update_product($data,$prod_id);

        $sdata=array();
		$sdata["message"]="Product Update Successfully !";
		$this->session->set_userdata($sdata);
        redirect('products');

	}

	private function updateProductPhoto(){

        $this->load->library('upload');
        $config['upload_path'] = './assets/img/product_image/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024;
        $config['max_width'] = 700;
        $config['max_height'] = 800;
        $config['encrypt_name'] = false;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('image')) {
            return null;
        }
        $uploadImage = $this->upload->data();
        if ($uploadImage['is_image'] == 1)
            return $config['upload_path'] . $uploadImage['file_name'];
        else
        	$sdata=array();
			$sdata["delete"]="Invalid Image Please select jpg or png";
			$this->session->set_userdata($sdata);
			redirect('products');
    }

	public function delete_product($prod_id){

		$this->Admin_model->delete_product($prod_id);
		$sdata=array();
		$sdata["delete"]="Product Delete Successfully";
		$this->session->set_userdata($sdata);
		redirect('products');

	}

//==================== Order Summary ====================//

	public function ManageOrder(){

		$data=array();
		$data['result'] = $this->Admin_model->manage_order();
		$this->load->view('admin/manage_order',$data,'true');
	}
	

	public function ViewOrderDetails($order_id){

		$data=array();
		$data['order_info'] = $this->Admin_model->select_order_info_by_id($order_id);
		$customer_id = $data['order_info']->customer_id;
		$shipping_id = $data['order_info']->shipping_id;
		$data['customer_info'] = $this->Admin_model->select_customer_info_by_id($customer_id);
		$customer_email = $data['customer_info']->email_address;
		// echo '<pre>';
		// print_r($data['customer_info']);exit;
		$data['shipping_info'] = $this->Admin_model->select_shipping_info_by_id($shipping_id);
		$data['order_details_info'] = $this->Admin_model->select_order_details_info_by_id($order_id);

		/*
        * Start Send Email
        */
        // $data['to_address'] = $customer_email;
        // $data['subject'] = 'Order View';
        // $this->mailer_model->sendEmailToCustomer($data, 'customer_mail',true);
        // $this->mailer_model->sendEmailToAdmin($data, 'admin_mail',true);
        /*
        * End Send Email
        */

        $this->load->view('admin/invoice',$data);

	}

	public function CreateInvoice($order_id){

		$data=array();
		$data['order_info'] = $this->Admin_model->select_order_info_by_id($order_id);
		$customer_id = $data['order_info']->customer_id;
		$shipping_id = $data['order_info']->shipping_id;
		$data['customer_info'] = $this->Admin_model->select_customer_info_by_id($customer_id);
		$customer_email = $data['customer_info']->email_address;
		// echo '<pre>';
		// print_r($data['customer_info']);exit;
		$data['shipping_info'] = $this->Admin_model->select_shipping_info_by_id($shipping_id);
		$data['order_details_info'] = $this->Admin_model->select_order_details_info_by_id($order_id);

		$html = $this->load->view('admin/invoicePdf', $data, true);
		$filename = 'invoiceGateway';
		//$filename1='invoiceGateway';
        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
        // $this->load->view('admin/invoicePdf',$data);   

	}

	public function GraphicalReport(){

		$data['product_info'] = $this->Admin_model->select_all_product_info();
		$this->load->view('admin/pie_chart_test',$data);
	}


	public function ViewDeliveredProduct(){

		$data['result'] = $this->Admin_model->view_delivered_product();
		$this->load->view('admin/delivered_product',$data,'true');
	}

	public function ProductDelivered($order_id){

		$data=array();
		$data['result'] = $this->Admin_model->delivered_product($order_id);
		$sdata = array();
		$sdata["msg"]="Order has been Delivered !";
		$this->session->set_userdata($sdata);
		redirect('super_admin/ViewDeliveredProduct');
	}

	public function ViewCancleProduct(){

		$data['result'] = $this->Admin_model->view_cancle_order();
		$this->load->view('admin/cancle_order',$data,'true');
	}

	public function CancleOrder($order_id){

		$data=array();
		$data['result'] = $this->Admin_model->cancle_order($order_id);
		$sdata = array();
		$sdata["msg"]="Order has been cancle !";
		$this->session->set_userdata($sdata);
		redirect('super_admin/ViewCancleProduct');
	}

//==========================================others==============================//

    public function getSubcatByCatId($id = null){
        
        if ($id != null) {
            $this->load->helper('admin_helper');
            getAllSubcatByCatId($id);
        }
    }
	
	 public function getSubcatByCatId2($id = null){
        
        if ($id != null) {
            $this->load->helper('admin_helper');
            getAllSubcatByCatId2($id);
        }
    }

    public function getStateByCountryId($id = null){
        
        if ($id != null) {
            $this->load->helper('admin_helper');
            getAllStatesByCountryId($id);
        }
    }
    
//==================== Get Shipping cost =============================//

    public function check_shippingCost($val = null)
    {

        $data = $this->db->select('id,shipping_cost')->from('states')->where('id', $val)->get()->row();

        $ShippingCost = $data->shipping_cost;

        if ($data) {
            echo $ShippingCost;
        } else {
            echo 0;
        }
    }
	
//==================== End Shipping cost =============================//
	
	
	///////////////// order ////////////////////////////////////
	public  function  dailyReport()
    {
        $data['orders']= $this->Admin_model->getlldailyReport();
       $this->load->view("admin/ReportBydaily_monthly",$data);

    }

    public function searchByDate()
    {

        $startdate= $this->input->post('startdate');
        $enddate= $this->input->post('enddate');

        $this->data['allreport']= $this->Admin_model->viewAllReportBydate($startdate, $enddate);
        $this->load->view('admin/ReportFilterByDate', $this->data);
    }

    public function searchByOrderId()
    {
        $orderID= $this->input->post('orderid');
        $this->data['allreport']= $this->Admin_model->viewAllReportByorder($orderID);
        $this->load->view('admin/ReportFilterByOrderId', $this->data);

    }


//==================== password change & logout ======================//

    public function cpassword(){

    	$this->load->view('admin/change_password');
    }

    public function change_password(){

    	$this->Admin_model->change_password();
    }

	public function logout(){

		$this->session->unset_userdata('id');
		$this->session->unset_userdata('username');
		redirect('Admin');
	}

}//super_admin

?>