<?php



Class User_Authentication extends CI_Controller {

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
'no_telp' => $this->input->post('notelp')
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
'email' => $result[0]->email,
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
public function unggahKarya() {
    $this->load->library('form_validation');
    $this->load->library('upload');
    //upload gambar
    $files = $_FILES;
        $_FILES['gambarsampul']['name']		= $files['gambarsampul']['name'];
        $_FILES['gambarsampul']['type']		= $files['gambarsampul']['type'];
        $_FILES['gambarsampul']['tmp_name']	= $files['gambarsampul']['tmp_name'];
        $_FILES['gambarsampul']['error']	= $files['gambarsampul']['error'];
        $_FILES['gambarsampul']['size']		= $files['gambarsampul']['size'];    
 
	    $this->upload->initialize($this->set_upload_options());
	    $this->upload->do_upload();
 
	        $upload_data 	= $this->upload->data();
		    $file_name 	=   $upload_data['file_name'];
		    $file_type 	=   $upload_data['file_type'];
		    $file_size 	=   $upload_data['file_size'];
 
	    // Output control
			//$data['getfiledata_file_name'] = $file_name;
			//$data['getfiledata_file_type'] = $file_type;
            //$data['getfiledata_file_size'] = $file_size;
    //upload postingan
    $data = array(
        'id_postingan' => 0,
        'penulis' => $this->session->userdata['logged_in']['nama'],
        'gambar' => addslashes($upload_data['file_name']),
        'judul' => $this->input->post('judul'),
        'konten' => $this->input->post('konten'),
        'kategori' => $this->input->post('gridRadios')
    );
    $this->load->helper('url');
    
    $this->load->model('Postingan_model');

    $this->Postingan_model->unggah_karya($data);

    redirect(base_url('index.php/user_authentication/dasbor'),'refresh');
}
private function set_upload_options(){   
	//  upload an image options
    $config = array();
    $config['upload_path'] = './users_img/';
    $config['allowed_types'] = 'gif|jpg|png|svg';
    $config['max_size']      = '0';
    $config['overwrite']     = FALSE;

    return $config;
}

public function createPassword($passwd)
{
    return hash("sha256", $passwd);
}


}

?>