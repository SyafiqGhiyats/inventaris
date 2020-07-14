<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Render_Controller.php';

class Barang extends Render_Controller
{

    public function index()
    {
        // Page Settings
        $this->title = 'barang';
        $this->navigation = ['Dashboard'];
        $this->plugins = [];
        $this->data['data'] = $this->model->get();
        $this->data['rak'] = $this->db->get('rak')->result_array();
        $this->content = 'barang';
        $this->render();
    }
    public function _uploadImage($file)
    {
        $config['upload_path']      = './gambar/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['file_name']        = $file;
        $config['overwrite']        = true;
        $config['max_size']         = 8024;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }
    }
    public function detail($id)
    {
        $data = $this->model->getById($id);
        echo json_encode($data);
    }
    public function kode()
    {
        $this->db->select('RIGHT(barang.kode_barang,2) as kode_barang', FALSE);
        $this->db->order_by('kode_barang', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('barang');  //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->kode_barang) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodetampil = "BRG" . $batas;  //format kode
        return $kodetampil;
    }
    public function ubah($id)
    {
        $this->title = 'Ubah barang';
        $this->navigation = ['Dashboard'];
        $this->plugins = [];
        $this->data['dataID'] = $this->model->getById($id);
        $this->data['rak'] = $this->db->get('rak')->result_array();
        $this->content = 'barang_ubah';
        $this->render();
    }
    public function save()
    {
        $id = $this->input->post('id');
        $id_rak = $this->input->post('id_rak');
        $file = $_FILES['gambar']['name'];
        $nama = $this->input->post('nama');
        $keterangan = $this->input->post('keterangan');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $data = [
            'nama' => $nama,
            'id_rak' => $id_rak,
            'keterangan' => $keterangan,
            'harga' => $harga,
            'stok' => $stok
        ];
        if (empty($id)) {
            $data['gambar'] = $this->_uploadImage($file);
            $data['kode_barang'] = $this->kode();
            $query = $this->model->insert($data);
            redirect('barang', 'refresh');
        } else {
            if ($file) {
                $data['gambar'] = $this->_uploadImage($file);
            }
            $query = $this->model->update($id, $data);
            redirect('barang', 'refresh');
        }
    }
    public function hapus($id)
    {
        $query = $this->model->delete($id);
        if ($query) {
            echo "<script>alert('Berhasil Dihapus')</script>";
            redirect('barang', 'refresh');
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
        $this->load->model('BarangModel', 'model');
    }
}
