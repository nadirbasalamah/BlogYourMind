<?php
    class Postingan_model extends CI_Model {
        
        public function get_posts() {
            $this->load->database();
        
            $query = $this->db->get('postingan');
            
            return $query->result();
          }
    }
?>
