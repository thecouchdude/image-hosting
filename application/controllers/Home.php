<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        if (isset($_SESSION["email"])) {
        $this->load->view('header');
        }
        else{
        $this->load->view('welcome_header');
        }
        $this->load->view('home');
        $this->load->helper('url');
        $this->load->view('footer');
    }
}
