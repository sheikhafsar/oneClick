<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('UserModel');
        $this->load->model('CustomerModel');
        //$this->load->model('Product_list_details_model');
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->helper('mail');
    }

    public function index()
    {
        if (session_status() == PHP_SESSION_ACTIVE) {
            session_destroy();
        }
        if (!$this->session->userdata('isUserLoggedIn')) {
            $this->load->view('LoginView');
        } else {
            switch ($this->session->userdata('userType')) {
                case "retailer":
                    redirect("RetailerController/Retailer_home");
                    break;
                case "customer":
                    redirect("CustomerController/home");
                    break;
            }
        }
    }

    /* Function verifies the login data */
    public function verifyLogin()
    {
        $this->form_validation->set_rules('txtUserName', 'Username', 'required|min_length[3]');
        $this->form_validation->set_rules('txtPassword', 'Password', 'required|min_length[4]');
        $this->form_validation->set_rules('selUserType', 'User Type', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata("error", "Login Failed");
            $this->index();
        } else {
          
            $userName = $this->input->post("txtUserName");
            $password = $this->input->post("txtPassword");
            $usertype = $this->input->post("selUserType");

            $userData = array(
                'username' => $userName,
                'password' => $password, 
                'userType' => $usertype,
            );

            $check = $this->UserModel->verifyUserLoginData($userData); //returns false if user is Invalid
            if ($check) {
                //if user is valid set session data
                $this->session->set_userdata('isUserLoggedIn', true);
                $this->session->set_userdata('userId', $check[0]->user_id);
                $this->session->set_userdata('userType', $usertype);

                if ($usertype == "retailer") {
                    $data['child'] = 'Retailer_home';
                    $this->load->view('templates/Retailer/Retailer_content', $data);
                } else if ($usertype == "customer") {
                    redirect("CustomerController/home");
                } 
            } else {
                $this->session->set_flashdata("error", "Login Failed");
                redirect("LoginController/index");
            }
        }
    }

    public function register()
    {
        $this->load->view('register');
    }

    //logs out the current user
    public function logout()
    {
        //destroy session data
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->sess_destroy();
        redirect('LoginController/index');
    }

    /* This function adds a new user */

    public function addNewUser()
    {
        $this->form_validation->set_rules('txtFirstName', 'First Name', 'required|min_length[3]');
        $this->form_validation->set_rules('txtLastName', 'Last Name', 'required|min_length[3]');
        $this->form_validation->set_rules('txt_email', 'Email', 'required|valid_email|callback_validate_email');
        $this->form_validation->set_rules('txtUserName', 'Username', 'required|min_length[3]|callback_validate_username');
        $this->form_validation->set_rules('selUserType', 'User Type', 'required|in_list[customer,retailer]');
        $this->form_validation->set_rules('txtPassword', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('txtConfirmPassword', 'Confirm Password', 'required|min_length[5]|matches[txtPassword]');

        $this->form_validation->set_message('callback_validate_email', 'Email Already Exists in System');
        if ($this->form_validation->run() == false) {
            $this->register();
        } else {

            /* ----------------------------------------------Get POST data from form */

            $firstName = $this->input->post("txtFirstName");
            $lastName = $this->input->post("txtLastName");
            $userName = $this->input->post("txtUserName");
            $password = $this->input->post("txtPassword");
            $email = $this->input->post("txt_email");
            $confirmpassword = $this->input->post("txtConfirmPassword");
            $usertype = $this->input->post("selUserType");
            /* ---------------------------------------------save data in associative array */
            $userData = array(
                'firstName' => $firstName,
                'lastName' => $lastName,
                'username' => $userName,
                'password' => $password,
                'userType' => $usertype,
                'email' => $email,
            );

            $id = $this->UserModel->insertUser($userData); //returns id of records or returns false if an error occurs
            if ($id) { 
                if ($usertype == "customer") {
                    $this->session->set_flashdata("success", "Registration Successfull, We have sent you an Email");
                    redirect("LoginController");
                } else {
                    $this->session->set_flashdata("error", "Registration Failed");
                    redirect("LoginController");
                }
            }
        }
    }

    public function validate_email($email)
    {
        $emailCount = $this->UserModel->validate_UserEmail(array('email' => $email));
        if ($emailCount) {
            $this->form_validation->set_message('validate_email', 'Email Already Exists in System');
            return false;
        } else {
            return true;
        }
    }

    public function validate_username($username)
    {
        $emailCount = $this->UserModel->validate_UserEmail(array('username' => $username));
        if ($emailCount) {
            $this->form_validation->set_message('validate_username', 'Username Already Exists in System, Please Choose a new Username');
            return false;
        } else {
            return true;
        }
    }

}
