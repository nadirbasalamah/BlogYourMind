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
            
}

public function createPassword($passwd)
{
    return hash("sha256", $passwd);
}

}

?>