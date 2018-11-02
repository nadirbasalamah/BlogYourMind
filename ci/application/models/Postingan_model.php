<?php
    class Postingan_model extends CI_Model {
        
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
        public function get_pengguna_posts_cerpen($id)
        {
            $this->load->database();
            $this->db->where('kategori','Cerpen');
            $this->db->where('id_penulis', $id);
            $query = $this->db->get('postingan');
            return $query->result();
        }
        public function get_pengguna_posts_novel($id)
        {
            $this->load->database();
            $this->db->where('kategori','Novel');
            $this->db->where('id_penulis', $id);
            $query = $this->db->get('postingan');
            return $query->result();
        }
        public function get_pengguna_posts_puisi($id)
        {
            $this->load->database();
            $this->db->where('kategori','Puisi');
            $this->db->where('id_penulis', $id);
            $query = $this->db->get('postingan');
            return $query->result();
        }
        public function get_favorite_posts_cerpen($id)
        {
            $this->load->database();
            $this->db->select('favorit.id,favorit.id_postingan,postingan.penulis,postingan.gambar,postingan.judul,postingan.konten,postingan.kategori');
            $this->db->from('favorit');
            $this->db->join('postingan','favorit.id_postingan = postingan.id_postingan');
            $this->db->where('id',$id);
            $this->db->where('postingan.kategori','Cerpen');
            $query = $this->db->get();
            return $query->result();
        }
        public function get_favorite_posts_novel($id)
        {
            $this->load->database();
            $this->db->select('favorit.id,favorit.id_postingan,postingan.penulis,postingan.gambar,postingan.judul,postingan.konten,postingan.kategori');
            $this->db->from('favorit');
            $this->db->join('postingan','favorit.id_postingan = postingan.id_postingan');
            $this->db->where('id',$id);
            $this->db->where('postingan.kategori','Novel');
            $query = $this->db->get();
            return $query->result();
        }
        public function get_favorite_posts_puisi($id)
        {
            $this->load->database();
            $this->db->select('favorit.id,favorit.id_postingan,postingan.penulis,postingan.gambar,postingan.judul,postingan.konten,postingan.kategori');
            $this->db->from('favorit');
            $this->db->join('postingan','favorit.id_postingan = postingan.id_postingan');
            $this->db->where('id',$id);
            $this->db->where('postingan.kategori','Puisi');
            $query = $this->db->get();
            return $query->result();
        }
        public function like_post($id)
        {
            $likes = 0;
            $this->load->database();
            $row = $this->db->query('SELECT suka AS jumlah_suka FROM postingan WHERE id_postingan = ' . $id)->row();
            if($row) {
                $likes = $row->jumlah_suka;
            }
                $likes = $likes + 1;
                $this->db->set('suka',$likes);
                $this->db->where('id_postingan',$id);
                $this->db->update('postingan');
        }
        public function comment_post($data)
        {
            $this->load->database();
            $this->db->insert('komentar',$data);
        }
        public function getComments($id)
        {
            $this->load->database();
            $this->db->select('pengguna.nama, komentar.isi');
            $this->db->from('pengguna');
            $this->db->join('komentar','pengguna.id = komentar.id');
            $this->db->where('id_postingan',$id);
            $query = $this->db->get();
            return $query->result();
        }
    }
?>