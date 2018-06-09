<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FoodCourt_model extends CI_Model{

    public function get_foods(){

        $query = $this->db->select('*')->from('tbl_foodcourt')->join('category','category.cat_id=tbl_foodcourt.cat_id')->get()->result();
        return $query;
    }

    public function save_grocery_item($data){

        $result = $this->db->insert('tbl_foodcourt', $data);
        return $result;
    }


    public function update_grocery_item($id,$data){

        $result = $this->db->where('id',$id)->update('tbl_foodcourt',$data);
        return $result;
    }

    public function select_product_by_id($id){

        $query = $this->db->select('*')->from('tbl_foodcourt')->where('id',$id)->get()->row();
        return $query;
    }

    public function delete_grocery_by_id($id){

        return $this->db->where('id',$id)->delete('tbl_foodcourt');
    }


//------------------------ product end ---------------------------//

}//Admin_model

?>