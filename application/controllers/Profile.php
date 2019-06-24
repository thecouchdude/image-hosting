<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    function __Construct(){
        parent::__Construct ();
        $this->load->helper(array('form', 'url','directory'));
	$this->data['status'] = "";
        $this->load->library('form_validation');
        $this->load->model('userdata'); // load model 
    }
 
    public function index() {
        $this->load->view('header');
        $email = $_SESSION["email"];
        $this->data['posts'] = $this->userdata->getPosts($email); // calling Post model method getPosts()
        if($this->input->post('upload')){
            $this->userdata->do_upload();
        }
        $this->data['images'] = $this->userdata->getimg($email);
        $this->load->view('profile', $this->data); 
    }
    
    public function update(){
        //Validating Name Field
        $this->form_validation->set_rules('firstname', 'First name', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('lastname', 'Last name', 'trim|required|min_length[4]');  
        $fname = $this->input->post('fname');
        $lname=$this->input->post('lname');
        $email = $_SESSION["email"];
        //Either you can print value or you can send value to database
        $this->userdata->updateuser($fname,$lname,$email);
        $data['message'] = 'Data Inserted Successfully';
        $info = array('fname' => $this->input->post('fname'),
                      'lname'=>$this->input->post('lname')
        );
        echo json_encode($info);
    }

    public function remove($folder,$image){
	$url = './'.$folder.'/'.$image;
	$email = $_SESSION["email"];
	$this->load->model('wishlistm');
	$this->wishlistm->remove($url,$email);
	redirect(base_url().'profile');
    }
}
?>