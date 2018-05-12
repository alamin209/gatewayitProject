<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{
	
	public function admin_login(){

		$name=$this->input->post('name');
		$password=md5($this->input->post('password'));
		$this->db->select('*');
		$this->db->from('a_panel');
		$this->db->where('username',$name);
		$this->db->where('password',$password);
		$get=$this->db->get();
		$get2=$get->row();
		//var_dump($get2);exit();
		return $get2;
	}

//================ slider ===================//

	public function save_slide_info($data){

		$result = $this->db->insert('tbl_slide',$data);
		return $result;
	}

	public function all_slider(){

		$query = $this->db->select('*')->from('tbl_slide')->get()->result();
		return $query;

	}

	public function select_slider_by_id($sliderID){

		$query = $this->db->select('*')->from('tbl_slide')->where('slide_id',$sliderID)->get()->row();
		return $query;

	}

	public function update_slide_info($data,$slideID){

		$result = $this->db->where('slide_id',$slideID)->update('tbl_slide',$data);
		return $result;
	}

	public function delete_slide_image($ID){

		$data = array('slide_id' => $ID);
		$prev_info = $this->db->get_where("tbl_slide",$data)->row();
		unlink($prev_info->image);
		$result = $this->db->where('slide_id',$ID)->delete('tbl_slide');
		return $result;
	}

//================ slider end ===============//
	
	public function add_category($data){

		$this->db->insert('category',$data);
	}

	public function category(){

		$query = $this->db->select('*')->from('category')->get()->result();
		
		return $query;
	}

	public function edit_category($id){

		$query = $this->db->select('*')->from('category')->where('cat_id',$id)->get()->row();
		
		return $query;
	}

	public function edit_category_save($id,$data){

		$this->db->where('cat_id',$id);
		$this->db->update('category',$data);
	}

	public function delete_category($id){

		$data = array('cat_id' => $id);
		$prev_info = $this->db->get_where("category",$data)->row();
		unlink($prev_info->cat_image);
		$result = $this->db->where('cat_id',$id)->delete('category');
		return $result;
	}

//=========================== category end ===========================//

	public function subcategory(){

		$this->db->select('*');
		$this->db->from('subcategory');
		$this->db->join('category','category.cat_id=subcategory.subcat_catid');
		$query = $this->db->get(); 
		return $query->result();
	}

	public function add_subcategory($data){

		$this->db->insert('subcategory',$data);
	}

	public function select_subcategory_by_id($id){

		$query = $this->db->select('*')->from('subcategory')->where('subcat_id',$id)->get()->row();
		
		return $query;
	}
	
	public function select_subcategory_byID($CatID){

		$query = $this->db->select('*')->from('subcategory')->where('subcat_catid',$CatID)->get()->result();
		
		return $query;
	}

	public function update_subcategory_by_id($id,$data){

		$this->db->where('subcat_id',$id);
		$this->db->update('subcategory',$data);
	}

	public function delete_subcategory($id){

		$this->db->where('subcat_id',$id);
		$this->db->delete('subcategory');
	}
	

//-----------------------------product start------------------------//

	public function products(){

		$this->db->select('*');
		$this->db->from('product'); 
		$this->db->join('category','category.cat_id=prod_catid');
		//$this->db->join('subcategory','subcategory.subcat_id=prod_subcatid');
		$query = $this->db->get(); 
		return $query->result();
	}

	public function product_save($data){

		$result = $this->db->insert('product', $data);
		return $result;
	}


	public function update_product($data,$prod_id){

		$this->db->where('prod_id',$prod_id);
		$this->db->update('product',$data);
	}

	public function select_product($id){

		$query = $this->db->select('*')->from('product')->where('prod_id',$id)->get()->row();
		return $query;
	}

	public function delete_product($prod_id){

		$data = array('prod_id' => $prod_id);
		$prev_info = $this->db->get_where("product",$data)->row();
		unlink($prev_info->image);

		$this->db->where('prod_id',$prod_id);
		$this->db->delete('product');
	}

	public function select_product_by_CatID($CatID){

		$query = $this->db->select('*')->from('product')->where('prod_catid',$CatID)->get()->result();
		return $query;
	}

	public function select_product_by_subid($Subid){

		$query = $this->db->select('*')->from('product')->where('prod_subcatid',$Subid)->get()->result();
		return $query;
	}
//------------------------ product end ---------------------------//

//======================== Order Summary ============================//

	public function manage_order(){

		$query = $this->db->select('*')->from('tbl_order')->where('order_status','pending')->order_by('order_id', 'desc')->get()->result();
				 
		return $query;
	}
	
	public function select_order_info_by_id($order_id){

		$query = $this->db->select('*')->from('tbl_order')->where('order_id',$order_id)->get()->row();
				 
		return $query;

	}

	public function select_customer_info_by_id($customer_id){

		$query = $this->db->select('*')->from('tbl_customer')->where('customer_id',$customer_id)->get()->row();
				 
		return $query;

	}

	public function select_shipping_info_by_id($shipping_id){

		$query = $this->db->select('*')->from('tbl_shipping')->where('shipping_id',$shipping_id)->get()->row();
				 
		return $query;

	}

	public function select_order_details_info_by_id($order_id){

		$query = $this->db->select('*')->from('tbl_order_details')->where('order_id',$order_id)->get()->result();
				 
		return $query;

	}

	public function select_all_product_info(){

		$query = $this->db->select('*')->from('product')->limit(3)->get()->result();
				 
		return $query;
	}

	public function select_all_order(){

		$query = $this->db->select('*')->from('tbl_order')->get()->result();
		
		return $query;
	}

	public function view_delivered_product(){

		$query = $this->db->select('*')->from('tbl_order')->where('order_status','delivered')->get()->result();
		
		return $query;
	}

	public function delivered_product($order_id){

		$this->db->set('order_status','delivered');
		$this->db->where('order_id',$order_id);
		$this->db->update('tbl_order');
	}

	public function view_cancle_order(){

		$query = $this->db->select('*')->from('tbl_order')->where('order_status','cancle')->get()->result();
		
		return $query;
	}

	public function cancle_order($order_id){

		$this->db->set('order_status','cancle');
		$this->db->where('order_id',$order_id);
		$this->db->update('tbl_order');
	}
	public function getlldailyReport()
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $query = $this->db->get();
        return $query->result();


    }
    //////////////// search order by id //////////////////////////////

    public  function viewAllReportByorder($orderID)
    {

        $this->db->select('*');
        $this->db->where('order_id =', $orderID);
        $this->db->from('tbl_order');
        $query = $this->db->get();
        return $query->result();
    }
    //////////////// searech order by date ///////////////////////////////////////////
    public  function viewAllReportBydate($startdate, $enddate)
    {

        $this->db->select('*');
        $this->db->where('order_date BETWEEN "'. date('Y-m-d', strtotime($startdate)). '" and "'. date('Y-m-d', strtotime($enddate)).'"');
        $this->db->from('tbl_order');
        $query = $this->db->get();
        return $query->result();


    }

//-=========================== Order Summary End =========================-//

	public function select_all_division(){

		$query = $this->db->select('*')->from('shipping_cost')->get()->result();
		return $query;
	}

}//Admin_model

?>