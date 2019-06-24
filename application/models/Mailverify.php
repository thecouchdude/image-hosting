<?php
class Mailverify extends CI_Model {
    public function __construct() {
        $this->load->database();
        $this->load->helper('directory');
	}  
    function verify_user($code) {
	$this->db->set('is_verified', '1');
        $this->db->where('code', $code);
        $this->db->update('users'); 
	}
}
?>