<?php
class Wishlistm extends CI_Model {
    public function __construct() {
        $this->load->database();
        $this->load->helper('directory');
	}  
    
    function wishlist($image,$email){
	if($image != './images/images'){
	$data = array(
        'email' => $email,
        'url' => $image
        );
	}
	$query = $this->db->query("SELECT * FROM wishlist WHERE email = '" . $email . "' AND url = '" . $image . "'");
	$row = $query->row_array();
	if (isset($row)) {  
		return true;
	} 
	else {
		$this->db->insert('wishlist',$data);
		echo '<script>alert("Image added");</script>';
		return false;
	}	
   }

    function remove($image,$email){
    	$this->db->where('email', $email);
	$this->db->where('url', $image);
	$this->db->delete('wishlist');    
    }
}
?>