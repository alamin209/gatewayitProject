<?php
defined('BASEPATH') OR exit('No direct script access allowed');


abstract class Base_Controller extends CI_Controller
{
    public $user_id;
    public $user_ref_id;
    public $role;
    const ADMIN = 1;
    const USER = 0;

    public abstract function index();

    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_ref_id = $this->session->userdata('ref_id');
        $this->role = $this->session->userdata('role');
    }

    public function msg($msg)
    {
        $this->session->set_flashdata('msg', $msg);
    }

    public function debug($data)
    {
        echo "<pre>";
        print_r($data);
        exit();
    }

    public function UploadPhoto($ImgPath){

        $config['upload_path'] = $ImgPath;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024;
        $config['max_width'] = 300;
        $config['max_height'] = 300;

        $this->load->library('upload', $config);
        $error='';
        $fdata=array();
        if ( ! $this->upload->do_upload('photo')){

            $error = $this->upload->display_errors();
            $dt['message'] = $error;
            $this->session->set_userdata($dt);
            redirect('super_admin/add_subcategory');

        }else{

            $fdata=$this->upload->data();
            return $config['upload_path'] . $fdata['file_name'];

        }

    }//uploadPhoto

    public function pagination($base_url, $per_page, $total)
    {
        $this->load->library('pagination');
        $config['base_url'] = $base_url;
        $config['total_rows'] = $total;
        $config['per_page'] = $per_page;
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev;_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
    }

}