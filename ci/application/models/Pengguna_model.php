<?php
    class Pengguna_model extends CI_Model {
        public function __construct()
        {
            $this->load->database();
            $this->load->model('Pengguna_model');
        }
        
        public function registration_insert($data) {

            // Query to check whether username already exist or not
            $condition = "nama =" . "'" . $data['nama'] . "'";
            $this->db->where('nama',$data['nama']);
            $query = $this->db->get('pengguna',1);
            if ($query->num_rows() == 0) {
            
            // Query to insert data in database
            $this->db->insert('pengguna', $data);
            if ($this->db->affected_rows() > 0) {
            return true;
            }
            } else {
            return false;
            }
            }
            
            // Read data using username and password
            public function login($data) {
            $this->db->where('nama',$data['nama']);
            $this->db->where('password',$data['password']);
            $query = $this->db->get('pengguna',1);
            
            if ($query->num_rows() == 1) {
            return true;
            } else {
            return false;
            }
            }
            
            // Read data from database to show data in admin page
            public function read_user_information($username) {
            $this->db->where('nama',$username);
            $query = $this->db->get('pengguna',1);
            
            if ($query->num_rows() == 1) {
            return $query->result();
            } else {
            return false;
            }
            }
            public function update_profile($data)
            {
                $this->db->set('nama',$data['nama']);
                $this->db->set('password',$data['password']);
                $this->db->set('gambar',$data['gambar']);
                $this->db->where('id',$data['id']);
                $this->db->update('pengguna');
            }
            public function selectProfile($id)
            {
                $this->db->where('id',$id);
                $this->db->select('nama');
                $this->db->select('gambar');
                $query = $this->db->get('pengguna');
                return $query->result();
            }
            public function change_name($data) 
            {
            $this->load->database();
            $this->db->set('penulis',$data['nama']);
            $this->db->where('id_penulis',$data['id']);
            $this->db->update('postingan');
            }
            public function addtoFavorite($data)
            {
                $this->load->database();
                $this->db->insert('favorit',$data);
            }
    }
?>