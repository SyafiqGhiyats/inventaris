<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Render_Controller.php';

class Gudang extends Render_Controller
{

    public function index()
    {
        // Page Settings
        $this->title = 'Gudang';
        $this->navigation = ['Dashboard'];
        $this->plugins = [];
        $this->data['data'] = $this->model->get();
        $this->content = 'gudang';
        $this->render();
    }
    public function ubah($id)
    {
        $this->title = 'Ubah Gudang';
        $this->navigation = ['Dashboard'];
        $this->plugins = [];
        $this->data['dataID'] = $this->model->getById($id);
        $this->content = 'gudang_ubah';
        $this->render();
    }
    public function save()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $data['nama'] = $nama;
        if (empty($id)) {
            $query = $this->model->insert($data);
            if ($query) {
                echo "<script>alert('Berhasil Ditambahkan')</script>";
                redirect('gudang', 'refresh');
            }
        } else {
            $query = $this->model->update($id, $data);
            if ($query) {
                echo "<script>alert('Berhasil Diubah')</script>";
                redirect('gudang', 'refresh');
            }
        }
    }
    public function hapus($id)
    {
        $query = $this->model->delete($id);
        if ($query) {
            echo "<script>alert('Berhasil Dihapus')</script>";
            redirect('gudang', 'refresh');
        }
    }

    function __construct()
    {
        parent::__construct();
        // Page Settings
        $this->default_template = 'templates/dashboard';
        $this->load->library('plugin');
        $this->load->helper('url');
        // cek session
        // -------------------------------------------------
        $this->sesion->cek_session();
        $this->load->model('gudangModel', 'model');
    }
}
