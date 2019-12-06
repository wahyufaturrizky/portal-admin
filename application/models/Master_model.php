<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Master_model extends CI_model {

    public function getAllMenu() {

        return $this->db->get('user_menu')->result_array();


    }

    public function hiddenAdmin() {

        return $this->db->where('id !=', 1);


    }

    public function deleteDataMenu($id) {

        // $this->db->where('id', $id);
        $this->db->delete('user_menu', ['id' => $id]);


    }

    public function detailDataMenu($id) {

        return $this->db->get_where('user_menu', ['id' => $id])->row_array();


    }

    public function addDataMenu() {

        $this->db->insert('user_menu', ['menu' => htmlspecialchars($this->input->post('menu', true)),'date_created_menu' => time(), 'update_menu' => time()]);


    }

    public function editDataMenu() {


        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_menu', ['menu' => htmlspecialchars($this->input->post('menu', true)), 'update_menu' => time()]);
        


    }

    public function getAllSubMenu() {

        $query = " SELECT `user_sub_menu`.*, `user_menu`.`menu`
                   FROM `user_sub_menu` JOIN `user_menu`
                   ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                   ";

        return $this->db->query($query)->result_array();


    }

    public function addDataSubMenu() {
        
        // Buat wadah $data sebagai penampungan data yang dimasukkan ke form submenu
        $data = [
            'menu_id' => htmlspecialchars($this->input->post('menu_id', true)),
            'title' => htmlspecialchars($this->input->post('title', true)),
            'url' => htmlspecialchars($this->input->post('url', true)),
            'icon' => htmlspecialchars($this->input->post('icon', true)),
            'is_active' => htmlspecialchars($this->input->post('is_active', true)),
            'date_created_sub_menu' => time(),
            'updated_sub_menu' => time()

        ];
        
        // Lakukan INserta data ke Database portal admin ke Tabel User
        $this->db->insert('user_sub_menu', $data);
    }

    public function deleteDataSubMenu($id) {

        // $this->db->where('id', $id);
        $this->db->delete('user_sub_menu', ['id' => $id]);


    }

    public function detailDataSubMenu($id) {

        $query = " SELECT `user_sub_menu`.*, `user_menu`.`menu`
                   FROM `user_sub_menu` JOIN `user_menu`
                   ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                   WHERE `user_sub_menu`.`id` = $id
                   ";

        return $this->db->query($query)->row_array();

        // return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();


    }

    public function editDataSubMenu() {

        
        $data = [
            'title' => htmlspecialchars($this->input->post('title', true)),
            'menu_id' => htmlspecialchars($this->input->post('menu_id', true)),
            'url' => htmlspecialchars($this->input->post('url', true)),
            'icon' => htmlspecialchars($this->input->post('icon', true)),
            'is_active' => htmlspecialchars($this->input->post('is_active', true)),
            'updated_sub_menu' => time()

        ];


        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_sub_menu', $data);
        


    }

    public function getAllRole() {

        return $this->db->get('user_role')->result_array();


    }

    public function addDataRole() {

        $this->db->insert('user_role', ['role' => htmlspecialchars($this->input->post('role', true)),'date_created_role' => time(), 'updated_role' => time()]);


    }

    public function deleteDataRole($id) {

        // $this->db->where('id', $id);
        $this->db->delete('user_role', ['id' => $id]);


    }

    public function accessRole($role_id) {

        return $this->db->get_where('user_role', ['id' => $role_id])->row_array();

    }

    public function cekMenuIdAndRoleId() {

        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [

            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {

            $this->db->insert('user_access_menu', $data);

        }
        else {

            $this->db->delete('user_access_menu', $data);
        }
    }
}
?>