<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->data['status'] = "";
        $this->load->model('users_model');
    }

    public function index() {
        if (isset($_SESSION["email"])) {
        $this->load->view('header');
        }
        else{
        $this->load->view('welcome_header');
        }
        $this->data['item'] = $this->users_model->topics();
        $this->load->view('login', $this->data);
        $this->load->helper('url');
        $this->load->view('footer');
    }

    public function login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $remember = $this->input->post('remember');

        if ($remember) {
            setcookie("email", $_POST["email"], time() + 60*60*7*24, "/");            
        } else {
            delete_cookie('email');
        }

        if ($this->users_model->authenticate($email, $password)) {
            $_SESSION['email'] = $email;
	    if($this->users_model->verify($email)){
            	redirect(base_url());
	    }
	    else{
		$this->data['status'] = "Account not Verified!-Check mail for activation";
		$this->index();
	    }
        } else {
            $this->data['status'] = "Your email or password is incorrect!";
            $this->index();
        }
        
    }

    public function logout() {
        session_destroy();
        redirect(base_url());
    }
    
}
