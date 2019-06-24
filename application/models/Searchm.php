<?php
class Searchm extends CI_Model {
    public function __construct() {
        $this->load->database();
        $this->load->helper('directory');
	}  
    
    function get_Posts($topic){
          $this->db->select("email,name,url");
          $this->db->where('topic', $topic);
          $this->db->from('uploads');
          $query = $this->db->get();
          return $query->result();
     }
    
    public function getimg($topic){
        $this->db->select("email,name,des,url");
        $this->db->where('topic', $topic);
        $this->db->from('uploads');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    
    public function getinfo($url){
        $this->db->select("email,name,des,url");
        $this->db->where('url', $url);
        $this->db->from('uploads');
        $query = $this->db->get();
        $results = $query->result_array();
        return $results;
    }
    
    public function getcomment($url){
        $this->db->select("email,comments");
        $this->db->where('url', $url);
        $this->db->from('comments');
        $query = $this->db->get();
        $results = $query->result_array();
        return $results;
    }
    
    public function addcomment($url,$email,$comment){
        $data = array(
        'email' => $email,
        'url' => $url,
        'comments' => $comment
        );
     $this->db->insert('comments', $this->db->escape_str($data));
     }
}
?>