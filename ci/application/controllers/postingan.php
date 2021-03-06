<?php
    class Postingan extends CI_Controller {
        public function index() {
            $this->load->helper('url');
            $this->load->model('Postingan_model');
        
            $cerpen = $this->Postingan_model->get_posts_cerpen();
            $novel = $this->Postingan_model->get_posts_novel();
            $puisi = $this->Postingan_model->get_posts_puisi();
            $data['cerpen'] = $cerpen;
            $data['novel'] = $novel;
            $data['puisi'] = $puisi;

            $this->load->view('beranda', $data);
          }
        public function cerpen()
        {
            $this->load->helper('url');
            $this->load->model('Postingan_model');
            $cerpen = $this->Postingan_model->get_posts_cerpen();
            $data['cerpen'] = $cerpen;
            $this->load->view('cerpen', $data);
        }
        public function novel()
        {
            $this->load->helper('url');
            $this->load->model('Postingan_model');
            $novel = $this->Postingan_model->get_posts_novel();
            $data['novel'] = $novel;
            $this->load->view('novel', $data);
        }
        public function puisi()
        {
            $this->load->helper('url');
            $this->load->model('Postingan_model');
            $puisi = $this->Postingan_model->get_posts_puisi();
            $data['puisi'] = $puisi;
            $this->load->view('puisi', $data);
        }
        public function register()
        {
            $this->load->helper('url');
            
            $this->load->view('daftar');
            
        }
        public function login()
        {
            $this->load->helper('url');

            $this->load->view('login');
            
        }
        public function pencarian()
        {
            $this->load->helper('url');
            $this->load->model('Postingan_model');
            $judul = $this->input->post('search');
            $hasil = $this->Postingan_model->get_posts_judul($judul);
            $data['hasil'] = $hasil;
            $this->load->view('hasil', $data);
        }
        public function baca($id)
        {
            $this->load->helper('url');
            $this->load->model('Postingan_model');
            $postingan = $this->Postingan_model->get_post($id);
            $komentar = $this->Postingan_model->getComments($id);
            $data['komentar'] = $komentar;
            $data['postingan'] = $postingan;
            $this->load->view('baca',$data);
        }
    }
?>