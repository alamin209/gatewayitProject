<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{
	
	public function admin_login(){

		$name = $this->input->post('name');
		$password = md5($this->input->post('password'));
		$this->db->select('*');
		$this->db->from('a_panel');
		$this->db->where('username',$name);
		$this->db->where('password',$password);
		$get = $this->db->get();
		$get2 = $get->row();
		return $get2;
	}

	public function update_password($userID,$new_pass){

		$this->db->set('password', $new_pass);
		$query = $this->db->where('id', $userID)->update('a_panel');
		return $query;
	}

//================ slider ===================//

	public function save_slide_info($data){

		$result = $this->db->insert('tbl_slide',$data);
		return $result;
	}

	public function all_slider(){

		$query = $this->db->select('*')->from('tbl_slide')->get()->result_array();
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

//================ slider end ===============//
	
	public function add_category($data){

		return $this->db->insert('category',$data);
	}

	public function category(){

		$query = $this->db->select('*')->from('category')->get()->result();
		
		return $query;
	}

	public function edit_category($id){

		$query = $this->db->select('*')->from('category')->where('cat_id',$id)->get()->row();
		
		return $query;
	}

	public function Update_category($id){

		return $this->db->where('cat_id',$id)->update('category');
	}

	public function delete_category($id){

		$data = array('cat_id' => $id);
		$prev_info = $this->db->get_where("category",$data)->row();
		unlink($prev_info->cat_image);

		return $this->db->where('cat_id',$id)->delete('category');
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

		return $this->db->insert('subcategory',$data);
	}

	public function select_subcategory_by_id($id){

		$query = $this->db->select('*')->from('subcategory')->where('subcat_id',$id)->get()->row();
		
		return $query;
	}
	
	public function select_subcategory_byID($CatID){

		$query = $this->db->select('*')->from('subcategory')->where('subcat_catid',$CatID)->get()->result();
		
		return $query;
	}

	public function update_subcategory($id){

		return $this->db->where('subcat_id',$id)->update('subcategory');
	}

	public function insertproductSizedata1($productSizedata1)
    {
        $this->security->xss_clean($productSizedata1);
        $error = $this->db->insert('optional', $productSizedata1);
        if (empty($error)) {
            return $this->db->error();
        } else {

            return $error = null;
        }

    }

	public function getOptionalProductId($optional_id)
    {
        $this->db->from('optional');
        $this->db->where('optional_id', $optional_id)->select('*');
        $query = $this->db->get();
        return $query->result();
    }

    public function deleteOptional($id)
    {
        $this->db->where('optional_id', $id)->delete('optional');

    }

    public function updateoptional($id, $productSizedata)
    {
        $error = $this->db->where('optional_id', $id)->update('optional', $productSizedata);

        if (empty($error)) {
            return $this->db->error();
        } else {

            return $error = null;
        }

    }

	public function delete_subcategory($id){

		$data = array('subcat_id' => $id);
		$prev_info = $this->db->get_where("subcategory",$data)->row();
		unlink($prev_info->photo);

		return $this->db->where('subcat_id',$id)->delete('subcategory');
	}
	
//=========================== product ===========================//

	public function products(){

		$this->db->select('*');
		$this->db->from('product');
        $this->db->order_by("prod_id", "DESC");
        $this->db->join('category','category.cat_id=prod_catid');
		//$this->db->join('subcategory','subcategory.subcat_id=prod_subcatid');
		$query = $this->db->get(); 
		return $query->result();
	}

	public function product_save($data){

//		$result = $this->db->insert('product', $data);
        $this->security->xss_clean($data);
        $this->db->insert('product', $data);
        $product_id=$this->db->insert_id();
        return $product_id;
	}


	public function update_product($prod_id){

		$result = $this->db->where('prod_id',$prod_id)->update('product');
		return $result;
	}

	public function select_product($id){

		$query = $this->db->select('*')->from('product')->where('prod_id',$id)->get()->row();
		return $query;
	}

	public function delete_product($prod_id){

		$data = array('prod_id' => $prod_id);
		$prev_info = $this->db->get_where("product",$data)->row();
		unlink($prev_info->image);

		return $this->db->where('prod_id',$prod_id)->delete('product');
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

//=========================== flover_weight ===========================//

	public function flover_weight(){

		$query = $this->db->select('*')->from('tbl_flover_weight')->join('category','category.cat_id=prod_catid')->get()->result(); 
		return $query;
	}

	public function save_flover_weight($data){

		$result = $this->db->insert('tbl_flover_weight', $data);
		return $result;
	}

	public function update_flover_weight($fwID,$data){

		$result = $this->db->where('fw_id',$fwID)->update('tbl_flover_weight',$data);
		return $result;
	}

	public function delete_flover_weight($fwID){

		$result = $this->db->where('fw_id',$fwID)->delete('tbl_flover_weight');
		return $result;
	}


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

//-=========================== Order Summary End =========================-//

	public function select_all_division(){

		$query = $this->db->select('*')->from('shipping_cost')->get()->result();
		return $query;
	}
//-=========================== Search=========================-//

public function search($productName)
{
    $this->db->select("*");
    $this->db->like('prod_name', $productName);
    $this->db->from('product');
    $query = $this->db->get();
    return $query->result();

}

public function getProductDetails()
{
    $query = $this->db->select('*')->from('optional')->get()->result();
    return $query;

}

public function getProductBylow($cat_id)
{
    $this->db->from("product");
    $this->db->order_by("prod_price", "asc");
    $this->db->where('prod_catid',$cat_id);
    $query = $this->db->get();
    return $query->result();

}
public function getProductsubBylow($cat_id)
{
    $this->db->from("product");
    $this->db->order_by("prod_price", "asc");
    $this->db->where('subcat_catid',$cat_id);
    $query = $this->db->get();
    return $query->result();
}

public function insertproductSizedata($productSizedata)
{
    $this->security->xss_clean($productSizedata);
    $error = $this->db->insert('optional', $productSizedata);
    if (empty($error)) {
        return $this->db->error();
    } else {

        return $error = null;
    }
}

public function getProductByHigh($cat_id)
{
    $this->db->from("product");
    $this->db->order_by("prod_price", "desc");
    $this->db->where('prod_catid',$cat_id);
    $query = $this->db->get();
    return $query->result();
}

public function getProductByCode($cat_id)
{
    $this->db->from("product");
    $this->db->order_by("prod_code", "desc");
    $this->db->where('prod_catid',$cat_id);
    $query = $this->db->get();
    return $query->result();
}

public function getProductByLatest($cat_id)
{
    $this->db->from("product");
    $this->db->order_by("prod_id", "desc");
    $this->db->limit(10);
    $this->db->where('prod_catid',$cat_id);
    $query = $this->db->get();
    return $query->result();
}

}//Admin_model

?>