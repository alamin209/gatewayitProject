<?php
class Cart_model extends CI_model{

	public function __construct(){
        parent::__construct();
    }

	public function cart_details($cart_id){

        $row = $this->db->select('*')->from('product')->where('prod_id',$cart_id)->get()->row();
        return $row;
    }

    public function item_details($ItemID){

    	$query = $this->db->select('*')->from('tbl_grocery')->where('id', $ItemID)->get()->row();
    	return $query;
    }


}//Cart_model

?>