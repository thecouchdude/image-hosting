<?php
class Userdata extends CI_Model {
    public function __construct() {
		$this->load->database();
        $this->load->helper('directory');
	}    

    function getPosts($email){
          $this->db->select("firstname,lastname,email");
          $this->db->where('email', $email);
          $this->db->from('users');
          $query = $this->db->get();
          return $query->result();
     }
    
    function get_data($topic){
          $this->db->select("email,url,name");
          $this->db->where('topic', $topic);
          $this->db->from('uploads');
          $query = $this->db->get();
          return $query->result();
     }
    
     public function updateuser($fname,$lname,$email){
        $data = array(
        'firstname' => $fname,
        'lastname' => $lname,
        );

         $this->db->where('email', $email);
         $this->db->update('users', $this->db->escape_str($data));
     }
        
    public function getimg($email){
        $this->db->select("url");
        $this->db->where('email', $email);
        $this->db->from('wishlist');
        $query = $this->db->get();
        $images = $query->result_array();
        return $images;

    }
}
    
?>