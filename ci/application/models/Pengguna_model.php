<?php
    class Pengguna_model extends CI_Model {
        
        public function register_user($uname,$pass,$email,$alamat,$notelp) {
            $this->load->database();
            $data = array(
                'id' => 0,
                'nama' => $uname,
                'password' => $pass,
                'email' => $email,
                'alamat' => $alamat,
                'no_telp' => $notelp
        );
        
        $this->db->insert('pengguna', $data);
        }
        public function login_user($uname,$pass)
        {
            $this->load->database();
            $this->db->where('nama', $uname);
            $this->db->where('password', $pass);
            $query = $this->db->get('pengguna');
            return $query->result();
        }
    }
?>