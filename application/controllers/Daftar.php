<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Render_Controller.php';

class Daftar extends Render_Controller
{

    public function index()
    {
        if ($this->session->userdata('status') == true) {
            redirect('dashboard', 'refresh');
        }
        $this->form_validation->set_rules('nip', 'NIP', 'required|numeric|min_length[9]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nomer_hp', 'No.HP', 'required|numeric|min_length[11]');

        if ($this->form_validation->run() == false) {
            $this->title = 'daftar';
            $this->content = 'daftar';
            $this->navigation = [];
            $this->data['level'] = $this->db->get('level')->result_array();
            $this->render();
        } else {
            $this->save();
        }
    }

    public function save()
    {
        $nip = $this->input->post('nip');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $nama = $this->input->post('nama');
        $nomer_hp = $this->input->post('nomer_hp');
        $level = $this->input->post('level');

        $data = [
            'nip' => $nip,
            'password' => $password,
            'nama' => $nama,
            'nomer_hp' => $nomer_hp,
            'id_level' => 1
        ];
        $query = $this->db->insert('users', $data);
        if ($query) {
            echo "<script>alert('Berhasil Daftar,Silahkan Login')</script>";
            redirect('login', 'refresh');
        }
    }

    function __construct()
    {
        parent::__construct();
        $this->default_template = 'templates/daftar';
        $this->load->library('plugin');
        $this->load->helper('url');

        $this->load->library(['b_password', 'form_validation']);
    }
}
