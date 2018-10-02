<?php

class Blog_model extends CI_Model {

  public function get_posts() {
    $this->load->database();

    $query = $this->db->get('post');
    
    return $query->result();
  }
  public function insert_post($judul, $konten) {
    $this->load->database();
    $data = array('judul' => $judul,'konten' => $konten);
    $this->db->insert('post', $data);
  }
  public function delete_post($id) {
    $this->load->database();
    $this->db->delete('post', array('id' => $id));
  }
  public function update_post($id,$judul,$konten) {
    $this->load->database();
    $this->db->set('judul',$judul);
    $this->db->set('konten',$konten);
    $this->db->where('id',$id);
    $this->db->update('post');
  }
  public function get_post($id) {
    $this->load->database();

    $query =$this->db->get_where('post', array('id' => $id));
    
    return $query->result();
  }

}
