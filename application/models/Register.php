<?php
class Register extends CI_Model {
    public function __construct() {
		$this->load->database();
	}    

    public function mail_check($email) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $query = $this->db->query($sql, array($email));
        $row = $query->row_array();
        if (isset($row)) {
            return TRUE;
		} 
        else {
			return FALSE;
		}

	}   
    
    public function createuser($data){
        //Inserts the value to table users
        $this->db->insert('users', $this->db->escape_str($data));
    }
}
?>