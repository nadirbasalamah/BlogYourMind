<?php
    class Postingan extends CI_Controller {
        public function index() {
            $this->load->helper('url');
            $this->load->model('Postingan_model');
        
            $posts = $this->Postingan_model->get_posts();
            $cerpen = $this->Postingan_model->get_posts_cerpen();
            $novel = $this->Postingan_model->get_posts_novel();
            $puisi = $this->Postingan_model->get_posts_puisi();
            $data['posts'] = $posts;
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
            $this->load->model('Pengguna_model');
            
            $this->load->view('daftar');

            //$uname = $this->input->post('username');
            //$passwd = $this->input->post('password');
            //$email = $this->input->post('email');
            //$alamat = $this->input->post('alamat');
            //$notelp = $this->input->post('notelp');

            //$this->Pengguna_model->register_user($uname, $passwd, $email, $alamat, $notelp);
            //redirect('postingan/login', 'refresh');
        }
        public function login()
        {
            $this->load->helper('url');
            $this->load->model('Pengguna_model');

            $this->load->view('login');
            
            //$uname = $this->input->post('username');
            //$passwd = $this->input->post('password');

            //$hasil = $this->Pengguna_model->login_user($uname, $password);
            //if($hasil > 0) {
            //    redirect('postingan/dasbor', 'refresh');
            //} else {
            //    redirect('postingan/login', 'refresh');
            //}
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
    }
?>