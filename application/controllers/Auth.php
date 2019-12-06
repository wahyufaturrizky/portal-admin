<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        
        // Buat Publik Method Form_Validasi
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_auth');

    }

    public function goToDefaultPage() {
        if ($this->session->userdata('role_id') == 1) {
          redirect('admin');
        } else if ($this->session->userdata('role_id') == 2) {
          redirect('user');
        } else {
          // jika ada role_id yg lain maka tambahkan disini
        }
      }

    public function index() {

        $this->goToDefaultPage();

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {

            // Buat Tittle ke semua page
            $title['title'] = 'Login Page';
    
            // Template ke semua page Auth untuk Header
            $this->load->view('templates/auth_header', $title);
            // Konten login
            $this->load->view('auth/login');
            // Template kesemua page Auth untuk Fotter
            $this->load->view('templates/auth_footer'); 

        } else {

            // Validasinya sukses
            $this-> _login();
        }
    }

    private function _login() {

        
        $password = $this->input->post('password');

        // Query ke database dengan MODEL di folder Model dan file Model_auth
        $this->load->model('Model_auth');
        $user = $this->Model_auth->loginUser();
        // $user = $this->db->get_where('user', ['email' => $email])->row_array();
        
        // Jika User atau email nya ada dan terdaftar
        if ($user) {

            // Jika Email nya terdaftar dan emailnya aktif
            if ( $user['is_active'] == 1 ) {

                // Cek Password nya sesuai atau tidak
                if (password_verify($password, $user['password'])) {
                    
                    // Kalau passwordnya bener
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    
                    // Kalau lolos semua pengecekkan di Auth maka arahkan ke Halaman User
                    $this->session->set_userdata($data);

                    if ($user['role_id'] == 1) {

                        redirect('admin');
                    }
                    else {
                        redirect('user');
                    }
                    

                }
                else {
                        $this->session->set_flashdata('message', 
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Wrong password!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('auth');
                }


            }
            // Jika belum aktif
            else {
                
                $this->session->set_flashdata('message', 
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Warning! The email is not active, please <a class="alert-link" href="#">Click This</a> to activate
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('auth');

            }

        } 
        // Jika email nya tidak terdaftar
        else {

            $this->session->set_flashdata('message', 
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Warning! Email is not registered!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('auth');

        }

    }

    public function  registration() {

        $this->goToDefaultPage();

        $this->form_validation->set_rules('username', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
            'is_unique' => 'This email has already registered !'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[repassword]', [
            'matches' => 'password dont match!',
            'min_length' => 'password to short!'
        ]);
        $this->form_validation->set_rules('repassword', 'Password', 'required|trim|matches[password]');

        // Cek Form validasi registrasi
        if ($this->form_validation->run() == false ) {

            $title['title'] = 'Registration Page'; 
            $this->load->view('templates/auth_header', $title); 
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');

        } else {

            // Query ke database dengan MODEL di folder Model dan file Model_auth pada Fungsi 'registerUser'
             $this->Model_auth->regiserUser();

            // Setelah data regristrasi berhasil masuk, kasi Alert bahwa data berhasil dimasukkan
            $this->session->set_flashdata('message', 
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Congratulation! Your account has been create. Please login
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('auth');
        }
    }

    public function logout() {

        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', 
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                You have been logged out!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('auth');
    }

    public function blocked() {

        $this->load->view('auth/blocked');
    }
}