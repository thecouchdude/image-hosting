<?php
class Uploadm extends CI_Model {
    public function __construct() {
        $this->load->helper(array('form', 'url','directory'));
		$this->load->database();
	}    

    public function do_upload($email, $topic, $name, $des){
        $config = array(
            'upload_path' => './images/',
            'allowed_types' => 'gif|jpg|png|jpeg',
            'max_size' => 10000
        );
        
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $image_data = $this->upload->data();
        $imgpath = $image_data['file_name'];
        //Inserts the value to table users
        $data = array(
            'email' => $email,
            'topic' => $topic,
            'name' => $name,
            'des' => $des,
            'url' => './images/'.$imgpath
        );
        $this->db->insert('uploads', $this->db->escape_str($data)); 
	$config = array(
            'image_library' => 'gd2',
            'source_image' => $image_data['full_path'],
            'maintain_ratio' => TRUE,
            'new_image'=>'./images/thumbs',
            'width'=>960,
            'height'=>540 
        );

        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

    }
    
    public function getimg($email){
        $images = array();
        $sql = "SELECT url FROM uploads WHERE email = ?";
        $query = $this->db->query($sql, array($email));
        $row = $query->result_array();
        
        #$files = scandir('./images');
        foreach($row as $img){
            $images[]=array(
                    'url' => $img['url']
            );
        }
        return $images;
    }
}
?>