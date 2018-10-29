<?php



Class Pengguna extends CI_Controller {

public function __construct() {
parent::__construct();

$this->load->helper('form');
$this->load->helper('url'); 


$this->load->library('form_validation');


$this->load->library('session');


$this->load->model('Pengguna_model');
}

// Show login page
public function index() {
$this->load->view('login');
}

// Show registration page
public function user_registration_show() {
$this->load->view('daftar');
}
function decrypt($string)
{
  $output = false;
 
  $encrypt_method = "AES-256-CBC";
  $secret_key = 'This is my secret key';
  $secret_iv = 'This is my secret iv';
 
  
  $key = hash('sha256', $secret_key);
 
  
  $iv = substr(hash('sha256', $secret_iv), 0, 16);
  
  $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
  
  return $output;
}

// Validate and store registration data in database
public function new_user_registration() {



// Check validation for user input in SignUp form
$this->form_validation->set_rules('username', 'Username', 'trim|required');
$this->form_validation->set_rules('password', 'Password', 'trim|required');
$this->form_validation->set_rules('email', 'Email', 'trim|required');

if ($this->form_validation->run() == FALSE) {
$this->load->view('daftar'); 
} else {
$data = array(
'id' => 0,
'nama' => $this->input->post('username'),
'password' => $this->createPassword($this->input->post('password')),
'email' => $this->input->post('email'),
'alamat' => $this->input->post('alamat'),
'no_telp' => $this->input->post('notelp'),
'gambar' => "default.png"
);
$result = $this->Pengguna_model->registration_insert($data);
if ($result == TRUE) {
$this->load->view('login', $data);
} else {
$data['message_display'] = 'Username already exist!';
$this->load->view('daftar', $data);
}
}
}


// Check for user login process
public function user_login_process() {

$this->form_validation->set_rules('username', 'Username', 'trim|required');
$this->form_validation->set_rules('password', 'Password', 'trim|required');

if ($this->form_validation->run() == FALSE) {
if(isset($this->session->userdata['logged_in'])){
$this->load->view('dasbor');
}else{
$this->load->view('login');
}
} else {
$data = array(
'nama' => $this->input->post('username'),
'password' => $this->createPassword($this->input->post('password'))
);
$result = $this->Pengguna_model->login($data);
if ($result == TRUE) {

$username = $this->input->post('username');
$result = $this->Pengguna_model->read_user_information($username);
if ($result != false) {
$session_data = array(
'nama' => $result[0]->nama,
'id' => $result[0]->id,
'password' => $this->decrypt($result[0]->password),
'gambar' => $result[0]->gambar
);
// Add user data in session
$this->session->set_userdata('logged_in', $session_data);
$this->load->view('dasbor');
}
} else {
$data = array(
'error_message' => 'Invalid Username or Password'
);
$this->load->view('login', $data);
}
}
}

// Logout from admin page
public function logout() {

// Removing session data
$sess_array = array(
'nama' => ''
);
$this->session->unset_userdata('logged_in', $sess_array);
$data['message_display'] = 'Successfully Logout';
$this->load->view('login', $data);
}


public function dasbor() {
            $this->load->helper('url');

            $this->load->view('dasbor');
}
public function tulis()
{
            $this->load->helper('url');

            $this->load->view('tulis');

            $this->load->model('Postingan_model');
}
public function profil()
{
            $this->load->helper('url');

            $this->load->view('profil');
}
public function unggahKarya() {
    //$config = array(
    //    'upload_path' => './users_img/',
    //    'allowed_types' => 'gif|jpg|png|svg',
    //    'overwrite' => FALSE
    //);
    $this->load->library('form_validation');
    //upload gambar
    $new_name = time().$_FILES["gambarsampul"]['name'];
            $config['upload_path'] = FCPATH ."./users_img/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config); //Loads the Uploader Library
            $this->upload->initialize($config);        
            if ( ! $this->upload->do_upload('gambarsampul'))  {
            }
            else
            { 
            $upload_data = $this->upload->data();
            $file_loc = $upload_data['file_name'];
            }
        //upload postingan
    $data = array(
        'id_postingan' => 0,
        'penulis' => $this->session->userdata['logged_in']['nama'],
        'id_penulis' => $this->session->userdata['logged_in']['id'],
        'gambar' => $file_loc,
        'judul' => $this->input->post('judul'),
        'konten' => $this->input->post('konten'),
        'kategori' => $this->input->post('gridRadios')
    );
    $this->load->helper('url');
    
    $this->load->model('Postingan_model');

    $this->Postingan_model->unggah_karya($data);
    
    redirect(base_url('index.php/Pengguna/dasbor'),'refresh');
}
public function createPassword($passwd)
{
    $output = false;
 
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'This is my secret key';
    $secret_iv = 'This is my secret iv'; 
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    $output = openssl_encrypt($passwd, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($output);

    return $output;
}
public function editProfil()
{
    $new_name = time().$_FILES["gambar"]['name'];
            $config['upload_path'] = FCPATH ."./users_profile/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config); //Loads the Uploader Library
            $this->upload->initialize($config);        
            if ( ! $this->upload->do_upload('gambar'))  {
                $file_loc = $this->session->userdata['logged_in']['gambar'];
            }
            else
            { 
            $upload_data = $this->upload->data();
            $file_loc = $upload_data['file_name'];
            }

    $this->load->helper('url');
    $this->load->model('Pengguna_model');
    $data = array(
        'nama' => $this->input->post('nama'),
        'password' => $this->createPassword($this->input->post('passwd')),
        'id' => $this->session->userdata['logged_in']['id'],
        'gambar' => $file_loc
    );
    $this->Pengguna_model->update_profile($data);
    $this->Pengguna_model->change_name($data);
    redirect(base_url('index.php/Pengguna/dasbor'),'refresh');
}
public function lihatPostingan()
{
    $this->load->helper('url');
    $this->load->model('Postingan_model');
    $penulis = $this->session->userdata['logged_in']['nama'];
    $cerpen = $this->Postingan_model->get_pengguna_posts_cerpen($penulis);
    $novel = $this->Postingan_model->get_pengguna_posts_novel($penulis);
    $puisi = $this->Postingan_model->get_pengguna_posts_puisi($penulis);
    $data['cerpen'] = $cerpen;
    $data['novel'] = $novel;
    $data['puisi'] = $puisi;
    $this->load->view('daftar_postingan',$data);
}
public function explore()
{
            $this->load->helper('url');
            $this->load->model('Postingan_model');
        
            $cerpen = $this->Postingan_model->get_posts_cerpen();
            $novel = $this->Postingan_model->get_posts_novel();
            $puisi = $this->Postingan_model->get_posts_puisi();
            $data['cerpen'] = $cerpen;
            $data['novel'] = $novel;
            $data['puisi'] = $puisi;

            $this->load->view('explore', $data);
}
public function bacaPostingan($id)
{
            $this->load->helper('url');
            $this->load->model('Postingan_model');
            $postingan = $this->Postingan_model->get_post($id);
            $data['postingan'] = $postingan;
            $this->load->view('baca_postingan',$data);
}
public function exploreCerpen()
{
            $this->load->helper('url');
            $this->load->model('Postingan_model');
            $cerpen = $this->Postingan_model->get_posts_cerpen();
            $data['cerpen'] = $cerpen;
            $this->load->view('explore_cerpen', $data);
}
public function exploreNovel()
{
            $this->load->helper('url');
            $this->load->model('Postingan_model');
            $novel = $this->Postingan_model->get_posts_novel();
            $data['novel'] = $novel;
            $this->load->view('explore_novel', $data);
}
public function explorePuisi()
{
            $this->load->helper('url');
            $this->load->model('Postingan_model');
            $puisi = $this->Postingan_model->get_posts_puisi();
            $data['puisi'] = $puisi;
            $this->load->view('explore_puisi', $data);
}
public function pencarianKarya()
{
            $this->load->helper('url');
            $this->load->model('Postingan_model');
            $judul = $this->input->post('search');
            $hasil = $this->Postingan_model->get_posts_judul($judul);
            $data['hasil'] = $hasil;
            $this->load->view('hasil_pencarian', $data);
}
public function lihatProfil($id)
{
            $this->load->helper('url');
            $this->load->model('Postingan_model');
            $profil = $this->Pengguna_model->selectProfile($id);
            $cerpen = $this->Postingan_model->get_posts_cerpen();
            $novel = $this->Postingan_model->get_posts_novel();
            $puisi = $this->Postingan_model->get_posts_puisi();
            
            $data['profil'] = $profil;
            $data['cerpen'] = $cerpen;
            $data['novel'] = $novel;
            $data['puisi'] = $puisi;

            $this->load->view('profil_pengguna',$data);
}
}

?>