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
    }
?>