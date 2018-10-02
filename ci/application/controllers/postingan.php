<?php
    class postingan extends CI_Controller {
        public function index() {
            $this->load->helper('url');
            $this->load->model('Postingan_model');
        
            $posts = $this->Postingan_model->get_posts();
            $data['posts'] = $posts;
        
            $this->load->view('postingan', $data);
          }
    }
?>
