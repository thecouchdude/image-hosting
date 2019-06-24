<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Uploadc extends CI_Controller {
    public function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url'));
		$this->load->model('uploadm');
		$this->load->library('form_validation');
 
	}
 
	public function index()
	{
		$this->load->view('header');
        $email = $_SESSION["email"];
        if($this->input->post('upload')){
            $topic = $this->input->post('topic');
            $name = $this->input->post('name');
            $des = $this->input->post('des');
            $this->uploadm->do_upload($email, $topic, $name, $des);
        }
        $this->data['images'] = $this->uploadm->getimg($email);
        $this->load->view('uploadv', $this->data); 
	}
}