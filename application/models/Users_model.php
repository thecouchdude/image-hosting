<?php
class Users_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
    
	public function authenticate($email, $password) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $query = $this->db->query($sql, array($email));
	$row = $query->row_array();

	if (isset($row)) {
        	$pass = $row['password'];
		return password_verify($password, $pass) ? true : false;
	} else {
		return FALSE;
		}

	}

    public function verify($email){
	$sql = "SELECT * FROM users WHERE email = ?";
        $query = $this->db->query($sql, array($email));
	$row = $query->row_array();

	if (isset($row)) {
		if($row['is_verified']==1){
		return true;
		}
		else{
			return false;
		}
	}

    }
    public function topics(){
        $this->db->select("items");
        $this->db->from('search');
        $query = $this->db->get();
        $item = $query->result_array();
        return $item;
    }
}