<?php
    class Postingan_model extends CI_Model {
        
        public function get_posts() {
            $this->load->database();
        
            $query = $this->db->get('postingan');
            
            return $query->result();
        }
        public function get_posts_cerpen() {
            $this->load->database();
            $this->db->where('kategori', 'Cerpen');
            $query = $this->db->get('postingan');
            return $query->result();
        }
            public function get_posts_novel() {
            $this->load->database();
            $this->db->where('kategori', 'Novel');
            $query = $this->db->get('postingan');
            return $query->result();
        }
        public function get_posts_puisi() {
            $this->load->database();
            $this->db->where('kategori', 'Puisi');
            $query = $this->db->get('postingan');
            return $query->result();
        }
        public function get_posts_judul($judul) {
            $this->load->database();
            $this->db->where('judul', $judul);
            $query = $this->db->get('postingan');
            return $query->result();
        }
        public function unggah_karya($data)
        {
            $this->load->database();
            $this->db->insert('postingan', $data);
        }
        public function get_post($id)
        {
            $this->load->database();
            $this->db->where('id_postingan', $id);
            $query = $this->db->get('postingan');
            return $query->result();
        }
        public function get_pengguna_posts($penulis)
        {
            $this->load->database();
            $this->db->where('penulis', $penulis);
            $query = $this->db->get('postingan');
            return $query->result();
        }
        public function get_pengguna_posts_cerpen($penulis)
        {
            $this->load->database();
            $this->db->where('kategori','Cerpen');
            $this->db->where('penulis', $penulis);
            $query = $this->db->get('postingan');
            return $query->result();
        }
        public function get_pengguna_posts_novel($penulis)
        {
            $this->load->database();
            $this->db->where('kategori','Novel');
            $this->db->where('penulis', $penulis);
            $query = $this->db->get('postingan');
            return $query->result();
        }
        public function get_pengguna_posts_puisi($penulis)
        {
            $this->load->database();
            $this->db->where('kategori','Puisi');
            $this->db->where('penulis', $penulis);
            $query = $this->db->get('postingan');
            return $query->result();
        }
    }
?>