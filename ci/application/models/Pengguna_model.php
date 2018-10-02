<?php
    class Pengguna_model extends CI_Model {
        
        public function get_user($uname,$pass) {
            $this->load->database();
        
            $query =$this->db->get_where('pengguna', array('nama' => $uname, 'password' => $pass));
            
            return $query->result();
          }
    }
?>