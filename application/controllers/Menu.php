<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function __construct() {
        
        // Buat Publik Method Form_Validasi
        parent::__construct();
        is_logged_in();
        $this->load->model('Master_model');

    }

    public function index() {

        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->Master_model->getAllMenu();

        // BUat pengaturan untuk Validasi Form di menu
        $this->form_validation->set_rules('menu', 'Menu', 'required|is_unique[user_menu.menu]');

        // Validasi form validasi Menu Management
        if ($this->form_validation->run() == false ) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer', $data);
            
        }
        else {

            // Masukkan atau Insert data form menu ke tabel User_Menu
            $this->Master_model->addDataMenu();
            $this->session->set_flashdata('flash', 'added successfully');

            // $this->session->set_flashdata('message', 
            // '<div class="alert alert-success alert-dismissible fade show" role="alert">
            //     New menu added successfully!
            //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //         <span aria-hidden="true">&times;</span>
            //     </button>
            // </div>');
            redirect('menu');

        }

    }


    public function delete($id) {
        
        $this->Master_model->deleteDataMenu($id);
        // $this->session->set_flashdata('message', 
        //     '<div class="alert alert-success alert-dismissible fade show" role="alert">
        //             Menu successfully deleted!
        //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //             <span aria-hidden="true">&times;</span>
        //         </button>
        //     </div>');
        $this->session->set_flashdata('flash', 'deleted successfully!');
            redirect('menu');
    }

    public function detail_menu($id) {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Detail Menu Management';

        $data['menu'] = $this->Master_model->detailDataMenu($id);
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/detail_menu', $data);
        $this->load->view('templates/footer', $data);
    }


    public function edit_menu($id) {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Edit Menu Management';
        
        $data['menu'] = $this->Master_model->detailDataMenu($id);

        $this->form_validation->set_rules('menu', 'Menu', 'required|is_unique[user_menu.menu]');

        if ($this->form_validation->run() == false ) {

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/edit_menu', $data);
        $this->load->view('templates/footer', $data);
            
        }
        else {

            $this->Master_model->editDataMenu(); 
            $this->session->set_flashdata('flash', 'changed successfully!');
            redirect('menu');   
        }
    }

    public function subMenu() {

        $data['title'] = 'Sub Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['submenu'] = $this->Master_model->getAllSubMenu();

        $data['menu'] = $this->Master_model->getAllMenu();

        // BUat pengaturan untuk Validasi Form di menu
        $this->form_validation->set_rules('menu_id', 'Menu ID', 'required');
        $this->form_validation->set_rules('title', 'Sub Menu', 'required|is_unique[user_sub_menu.title]');
        $this->form_validation->set_rules('url', 'Url Menu', 'required|is_unique[user_sub_menu.url]');
        $this->form_validation->set_rules('icon', 'Icon Menu', 'required');

        // Validasi form validasi Menu Management
        if ($this->form_validation->run() == false ) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer', $data);
            
        }
        else {

            // Masukkan atau Insert data form menu ke tabel User_Menu
            $this->Master_model->addDataSubMenu();
            $this->session->set_flashdata('flash', 'Sub Menu added successfully');

            // $this->session->set_flashdata('message', 
            // '<div class="alert alert-success alert-dismissible fade show" role="alert">
            //     New menu added successfully!
            //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //         <span aria-hidden="true">&times;</span>
            //     </button>
            // </div>');
            redirect('menu/submenu');

        }

    }

    public function delete_submenu($id) {
        
        $this->Master_model->deleteDataSubMenu($id);
        // $this->session->set_flashdata('message', 
        //     '<div class="alert alert-success alert-dismissible fade show" role="alert">
        //             Menu successfully deleted!
        //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //             <span aria-hidden="true">&times;</span>
        //         </button>
        //     </div>');
        $this->session->set_flashdata('flash', 'deleted successfully!');
        redirect('menu/submenu');
    }

    public function detail_sub_menu($id) {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Detail Sub Menu Management';

        $data['submenu'] = $this->Master_model->detailDataSubMenu($id);
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/detail_sub_menu', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit_sub_menu($id) {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Edit Sub Menu Management';
        
        $data['submenu'] = $this->Master_model->detailDataSubMenu($id);

        $data['menu'] = $this->Master_model->getAllMenu();

         // BUat pengaturan untuk Validasi Form di sub menu
        $this->form_validation->set_rules('title', 'Sub Menu', 'required');
        $this->form_validation->set_rules('url', 'Url Menu', 'required');
        $this->form_validation->set_rules('icon', 'Icon Menu', 'required');

        if ($this->form_validation->run() == false ) {

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/edit_sub_menu', $data);
        $this->load->view('templates/footer', $data);
            
        }
        else {

            $this->Master_model->editDataSubMenu(); 
            $this->session->set_flashdata('flash', 'changed successfully!');
            redirect('menu/submenu');   
        }
    }

}