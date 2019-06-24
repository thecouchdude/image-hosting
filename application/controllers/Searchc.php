<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Searchc extends CI_Controller {

    function __Construct(){
        parent::__Construct ();
        $this->load->helper(array('form', 'url','directory'));
	$this->data['status'] = "";
        $this->load->library('form_validation');
        $this->load->model('searchm'); // load model 
    }
 
    public function index() {
        $this->load->view('header');
        $topic = $this->input->post('topic');
        $topics = array('indoor','beach','mountains','water','plant');
        $this->data['posts'] = $this->searchm->get_Posts($topic); // calling Post model method
        $this->data['result'] = $this->searchm->getimg($topic);
        $this->load->view('searchv', $this->data); 
    }
    
    public function search($folder,$image) {
        $url = './'.$folder.'/'.$image;
        #$url = str(url);
        $this->load->view('header');
        $this->data['results'] = $this->searchm->getinfo($url);
        $this->data['comments'] = $this->searchm->getcomment($url);
        $this->load->view('searchv2', $this->data); 
    }
    
    function download($folder,$image) {
        $filename = './'.$folder.'/'.$image;
    // load download helder
    $this->load->helper('download');
    // read file contents
    force_download($filename,NULL);
    }
    
    public function comment($folder,$image) {
        $url = './'.$folder.'/'.$image;
        $email = $_SESSION["email"];
        $comment = $this->input->post('comment');
        $this->searchm->addcomment($url,$email,$comment);
	redirect(base_url().'searchc/search/'.$folder.'/'.$image);

    }

    public function wishlist($folder,$image) {
        $url = './'.$folder.'/'.$image;
        #$url = str(url);
	$email = $_SESSION["email"];
	$this->load->model('wishlistm');
	if($this->wishlistm->wishlist($url,$email))
	{
		#redirect(base_url().'searchc/search/'.$folder.'/'.$image);
		$this->load->view('header');
		$this->data['status'] = "Already exists";
        	$this->data['results'] = $this->searchm->getinfo($url);
       		$this->data['comments'] = $this->searchm->getcomment($url);
        	$this->load->view('searchv2', $this->data); 

	}
	else
	{
		redirect(base_url().'profile');
	}
    }

}
?>