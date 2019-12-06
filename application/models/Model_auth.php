<?php 

class Model_auth extends CI_model {

    public function loginUser() {
        $email = $this->input->post('email');

        return $this->db->get_where('user', ['email' => $email])->row_array();
    }

    public function regiserUser() {
        
        // Buat wadah $data sebagai penampungan data yang masu dimasukkan ke form regristrasi
        $data = [
            'name' => htmlspecialchars($this->input->post('username', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'image' => 'default.png',
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 1,
            'date_created' => time()

        ];
        
        // Lakukan INserta data ke Database portal admin ke Tabel User
        $this->db->insert('user', $data);
    }
}
?>