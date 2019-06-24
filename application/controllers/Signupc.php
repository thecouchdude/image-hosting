<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signupc extends CI_Controller {

    public function __construct() {
        parent::__construct();
        #$this->data['status'] = "";
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('register');
    }
    
    public function index() {
        $this->load->view('welcome_header');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        //Validating Name Field
        $this->form_validation->set_rules('firstname', 'First name', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('lastname', 'Last name', 'trim|required|min_length[4]');  
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('Cpassword', 'Password Confirmation', 'trim|required|matches[password]');
        $code = rand(1000,9999);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('signup');
        } 
        else {
            $password = $this->input->post('password');
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $input = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'email' => $this->input->post('email'),
                'password' => $hash,
		'code' => $code
            );
            //Setting values for tabel columns
            $email = $this->input->post('email');
            
            if ($this->register->mail_check($email)) {
                $this->data['status'] = "Email already exists";
                $this->index();
            } 
            else {
               //Transfering data to Model
                $this->register->createuser($input);
                $data['message'] = 'Data Inserted Successfully';
                //Loading View
                $this->load->view('home');
            }
	   
        $this->load->library('phpmailer_lib');
 
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'mailhub.eait.uq.edu.au';
        $mail->SMTPAuth = false;
        $mail->Username = '';
        $mail->Password = '';
        $mail->SMTPSecure = 'tls';
        $mail->Port     = 25;
        
        $mail->setFrom('s.shet@uqconnect.edu.au', 'Shet');
        $mail->addReplyTo('s.shet@uqconnect.edu.au', 'Shet');
        
        // Add a recipient
        $mail->addAddress($email);
                
        // Email subject
        $mail->Subject = 'Verify email';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
        $mailContent = "<h1>Registration successful</h1>
            <p>Click link to activate account</p>
	    <a href='".base_url()."signupc/activate/".$code."'>Activate</a>";
        $mail->Body = $mailContent;
	$mail->send();
        
          }
    }
	public function activate($code){
        		$this->load->model('mailverify');
        		$this->mailverify->verify_user($code);
		$this->load->view('welcome_header');
        		$this->load->view('verify');
	}

}

?>