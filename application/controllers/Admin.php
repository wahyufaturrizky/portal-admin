<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {

        parent::__construct();
        is_logged_in();
        $this->load->model('Master_model');
    }

    public function index() {

        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function role() {

        $data['title'] = 'Role Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->Master_model->getAllRole();

        // BUat pengaturan untuk Validasi Form di menu
        $this->form_validation->set_rules('role', 'Role', 'required|is_unique[user_role.role]');

        
        if ($this->form_validation->run() == false ) {
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer', $data);
        }
        else {

            // Masukkan atau Insert data form menu ke tabel User_Menu
            $this->Master_model->addDataRole();
            $this->session->set_flashdata('flash', 'added successfully');
            redirect('admin/role');

        }
    }

    public function delete_role($id) {
        
        $this->Master_model->deleteDataRole($id);
        $this->session->set_flashdata('flash', 'deleted successfully!');
            redirect('admin/role');
    }

    public function access_role($role_id) {
        
        $data['title'] = 'Role Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->Master_model->accessRole($role_id);

        $this->Master_model->hiddenAdmin();
        $data['menu'] = $this->Master_model->getAllMenu();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/access_role', $data);
        $this->load->view('templates/footer', $data);
    }

    public function changeaccess() {
        
        $this->Master_model->cekMenuIdAndRoleId();
        $this->session->set_flashdata('flash', 'change successfully');
        redirect('admin/access_role');

    }

}