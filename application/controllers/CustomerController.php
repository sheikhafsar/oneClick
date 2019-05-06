<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CustomerController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        //$this->load->helper('device');
        $this->load->database();
        //$this->load->model('Product_model');
        //$this->load->model('Product_list_details_model');
        $this->load->model('UserModel');
        $this->load->model('CustomerModel');
        //$this->load->model('Feedback_model');
        //$this->load->model('Offers_model');
        //$this->load->model('News_model');
        //$this->load->model('Gallery_model');
        $this->load->library('form_validation');

        if (!$this->session->userdata('isUserLoggedIn')) {
            redirect("Login");
        }
    }

    public function index()
    {
        $this->load->view('Customer_home');
    }

    //displays the user homepage
    public function home()
    {
        $data['active'] = "home";
        $data['child'] = 'Customer_home';
        /*if (isMobile())
        $this->load->view('templates/webView_customer/User_template', $data);
        else*/
        $this->load->view('templates/Customer/Customer_content', $data);
    }

}
