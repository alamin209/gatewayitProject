<?php
class Cart_model extends CI_model{

	public function __construct(){
        parent::__construct();
    }

	public function cart_details($cart_id){

        $row = $this->db->select('*')->from('product')->where('prod_id',$cart_id)->get()->row();
        return $row;
    }


}//Cart_model

?>