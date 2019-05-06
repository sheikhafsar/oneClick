<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('UserModel');
        //$this->load->model('Category_model');
       // $this->load->model('Product_list_details_model');
        //$this->load->model('Product_model');
        $this->load->library('form_validation');
        //$this->load->model('Gallery_model');
        //$this->load->model('News_model');
        
        if(!$this->session->userdata('isUserLoggedIn')){   
            redirect("Login");
        }
    }

    public function index() {
        $this->load->view('Retailer');
	}
}
