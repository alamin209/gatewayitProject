<?php
defined('BASEPATH') OR exit('Super Admin error');

class Foodcourt extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Grocery_model');
        $this->load->helper('admin_helper');
        $this->load->model("FoodCourt_model");
    }

    public function index(){

        $data['result']=$this->Admin_model->products();
        $data['result4']=$this->Admin_model->manage_order();
        $data['product_info'] = $this->Admin_model->select_all_order();
        $this->load->view('admin/master',$data);
    }

//==================== product =============================//

    public function Foods(){

        $data = array();
        $data['slider'] = 0;
        $data['testimonial'] = 0;
        $data['footer_bottom'] = 0;
        $data['title'] = "Upohar Bangla | Grocery Items";
        $data['All_Category'] = $this->Admin_model->category();
        $data['foods']=$this->FoodCourt_model->get_foods();
        $data['content'] = $this->load->view('frontend/page/Food_item', $data, true);
        $this->load->view('frontend/index', $data);
    }

    public function FoodsItems(){

        $data=array();
        $data['result']=$this->FoodCourt_model->get_foods();
        $this->load->view('admin/Food_items',$data);
    }

    public function add_food(){

        $this->load->view('admin/add_food');
    }

    public function save_food(){

        $data=array();
        $data['cat_id'] = $this->input->post('cat_id');
        $data['prod_name'] = $this->input->post('prod_name');
        $data['prod_price'] = $this->input->post('prod_price');

        $result = $this->FoodCourt_model->save_grocery_item($data);

        if($result){
            $sdata=array();
            $sdata["message"]="Food Item Add Successfully !!!";
            redirect('Foodcourt/add_food');
        }else{
            $sdata=array();
            $sdata["message"]="Failed to Add !!!";
            $this->session->set_userdata($sdata);
            redirect('Foodcourt/add_food');
        }
    }


    public function edit_product($id){

        $data['selected_product'] = $this->FoodCourt_model->select_product_by_id($id);
        $this->load->view('admin/edit_food',$data);

    }

    public function update_food(){

        $id = $this->input->post('id');
        $data['cat_id'] = $this->input->post('cat_id');
        $data['prod_name'] = $this->input->post('prod_name');
        $data['prod_price'] = $this->input->post('prod_price');


        $result = $this->FoodCourt_model->update_grocery_item($id,$data);

        if($result){
            $sdata=array();
            $sdata["message"]="Item Update Successfully !!!";
            $this->session->set_userdata($sdata);
            redirect('Foodcourt/FoodsItems');
        }else{
            $sdata=array();
            $sdata["message"]="Failed to Update !!!";
            $this->session->set_userdata($sdata);
            redirect('Foodcourt/FoodsItems');
        }

    }//update_grocery

    public function delete_grocery($id){

        $result = $this->FoodCourt_model->delete_grocery_by_id($id);

        if($result){

            $sdata=array();
            $sdata["delete"]="Deleted Successfully";
            $this->session->set_userdata($sdata);
            redirect('Foodcourt/FoodsItems');

        }else{

            $sdata=array();
            $sdata["delete"]="Failed to Delete";
            $this->session->set_userdata($sdata);
            redirect('Foodcourt/FoodsItems');
        }

    }

} //super_admin

?>