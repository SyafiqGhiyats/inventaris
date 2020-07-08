<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Render_Controller.php';

class Rak extends Render_Controller
{

    public function index()
    {
        // Page Settings
        $this->title = 'Rak';
        $this->navigation = ['Dashboard'];
        $this->plugins = [];
        $this->data['data'] = $this->model->get();
        $this->content = 'rak';
        $this->render();
    }
    public function ubah($id)
    {
        $this->title = 'Ubah Rak';
        $this->navigation = ['Dashboard'];
        $this->plugins = [];
        $this->data['dataID'] = $this->model->getById($id);
        $this->content = 'rak_ubah';
        $this->render();
    }
    public function save()
    {
        $id = $this->input->post('id');
        $gudang = $this->input->post('gudang');
        $nama = $this->input->post('nama');
        $data['nama'] = $nama;
        if (empty($id)) {
            $query = $this->model->insert($data);
            if ($query) {
                echo "<script>alert('Berhasil Ditambahkan')</script>";
                redirect('rak', 'refresh');
            }
        } else {
            $query = $this->model->update($id, $data);
            if ($query) {
                echo "<script>alert('Berhasil Diubah')</script>";
                redirect('rak', 'refresh');
            }
        }
    }
    public function hapus($id)
    {
        $query = $this->model->delete($id);
        if ($query) {
            echo "<script>alert('Berhasil Dihapus')</script>";
            redirect('rak', 'refresh');
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
        $this->load->model('rakModel', 'model');
    }
}
