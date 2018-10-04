<?php
    class postingan extends CI_Controller {
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
    }
?>
