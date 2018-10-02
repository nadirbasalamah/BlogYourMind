<?php

class Blog extends CI_Controller {

  public function index() {
    $this->load->helper('url');
    $this->load->model('Blog_model');

    $posts = $this->Blog_model->get_posts();
    $data['posts'] = $posts;

    $this->load->view('read', $data);
  }
  public function create() {
    $this->load->helper('url');
    $this->load->view('blog_create');
  }

  public function create_process() {
    $judul = $this->input->post('judul');
    $konten = $this->input->post('konten');

    $this->load->helper('url');
    $this->load->model('Blog_model');

    $this->Blog_model->insert_post($judul, $konten);
    redirect('blog', 'refresh');
  }
  public function delete($id) {
    $this->load->helper('url');
    $this->load->model('Blog_model');

    $this->Blog_model->delete_post($id);
	  
    redirect('blog', 'refresh');
  }
  public function update($id) {
    $this->load->helper('url');
    $this->load->model('Blog_model');

    $posts = $this->Blog_model->get_post($id);
    $data['posts'] = $posts;

    $this->load->view('blog_update', $data);
  }
  public function update_process($id) {
    $judul = $this->input->post('judul');
    $konten = $this->input->post('konten');

    $this->load->helper('url');
    $this->load->model('Blog_model');

    $this->Blog_model->update_post($id,$judul, $konten);
    redirect('blog', 'refresh');
  }
}
