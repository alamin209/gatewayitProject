<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PdfMaker extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdfgenerator');
    }
    public function index()
    {

    }

    public function testPdf()
    {
//        if ($this->session->userdata('userType')) {

            $data='';

            $html = $this->load->view('admin/testPdf', $data, true);
            $filename = 'testPdf';
            $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');


//        } else {
//            redirect('Login');
//        }

    }

    public function OrderBillPdf($orderId)
    {
//        if ($this->session->userdata('userType') == "Admin") {

         $this->load->model('Admin_model');
            $this->data['orders'] = $this->Admin_model->viewOrderInfoByOrderId($orderId);
            $html = $this->load->view('admin/invoicePdf', $this->data, true);
//        $this->data1['shiping'] = $this->Admin_model->viewOrderInfoByshipping($orderId);
//        print_r( $this->data1['shiping']);
//        $html1 = $this->load->view('admin/shippingPdf', $this->data1, true);
        $filename = 'invoiceGateway';
//        $filename1='invoiceGateway';
        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');



//        } else {
//            redirect('Login');
//        }




    }


}
