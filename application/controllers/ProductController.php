<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        //$this->load->helper('device');
        $this->load->database();
        $this->load->model('ProductModel');
        //$this->load->model('Category_model');
        //$this->load->model('Offers_model');
        //$this->load->model('Product_list_details_model');
        $this->load->library('form_validation');

        if (!$this->session->userdata('isUserLoggedIn')) {
            redirect("LoginView");
        }
    }

    public function index() {
        $this->load->view('Login/LoginView');
    }

    public function viewProducts($sub_cat_id = null, $prod_name = null) {

        if ($sub_cat_id == null) {
            $sub_cat_id = $this->input->post("sel_Category");
        }
        //$brand = $this->input->post("filterBrand");
        $price = $this->input->post("filterPrice");

        $filterData = array();
        if ($prod_name == null) {
            //-------------------------------------
            if ($sub_cat_id != null || $price != null) {
                $where_in = array();
                if ($sub_cat_id != null && $sub_cat_id != "0") {
                    $where_in['category'] = $sub_cat_id;
                    $filterData['category'] = $sub_cat_id;
                }
                if ($price != null) {
                    $where = array();
                    foreach ($price as $p) {
                        $tarray = array();
                        $ind = explode(",", $p);
                        array_push($tarray, array('price>=' => $ind[0]));
                        array_push($tarray, array('price<=' => $ind[1]));
                        array_push($where, $tarray);
                    }
                    $filterData['price'] = $price;
                } else {
                    $where = null;
                }
                $data['products'] = $this->ProductModel->getAllProducts($where_in, $where);
            } else {
                $data['products'] = $this->ProductModel->getAllProducts();
            }
            //----------------------------------------------------
        } else {
            $data['products'] = $this->ProductModel->searchProductsByName($prod_name);
        }
        $data['filterData'] = $filterData;
        
        //$data['product_list_details'] = $this->Product_list_details_model->getActiveproduct_list_details($this->session->userdata('userId'));

        //$data['categories'] = $this->Category_model->getAllCategories();
        //$data['brands'] = $this->ProductModel->getProductManufacturers(20);
        $data['active'] = "products";
        $data['child'] = 'customer_products_view';
        
          $this->load->view('templates/Customer/Customer_content', $data);
          var_dump($data['products'] );
    }
}
?>