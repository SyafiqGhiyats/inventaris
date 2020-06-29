<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Render_Controller.php';

class Pembelian extends Render_Controller
{

    public function index()
    {
        // Page Settings
        $this->navigation = ['Dashboard'];
        $this->plugins = [];
        $this->data['data'] = $this->model->get();
        $this->data['barang'] = $this->db->get_where('barang', ['stok' > 0])->result_array();
        if ($this->session->userdata('id_level') == 1) {
            $this->content = 'pembelian-petugas-gudang';
        } elseif ($this->session->userdata('id_level') == 2) {
            $this->content = 'pembelian-petugas-gudang';
        } elseif ($this->session->userdata('id_level') == 3) {
            $this->content = 'pembelian-kepala-gudang';
        } elseif ($this->session->userdata('id_level') == 4) {
            $this->content = 'pembelian-manajer';
        }
        $this->title = $this->content;
        $this->render();
    }
    public function ubah($id)
    {
        $this->title = 'Ubah pembelian';
        $this->navigation = ['Dashboard'];
        $this->plugins = [];
        $this->data['dataID'] = $this->model->getById($id);
        $this->data['barang'] = $this->db->get_where('barang', ['stok' > 0])->result_array();
        $this->content = 'pembelian-ubah';
        $this->render();
    }
    public function accept_gudang($id)
    {
        $data = $this->db->select('kepala_gudang_status,jumlah,kode_barang,manajer_status');
        $data = $this->db->get_where('pembelian_detail', ['id_pembelian_detail' => $id])->row_array();
        if ($data['kepala_gudang_status'] == 'Pending..') {
            $this->db->set('kepala_gudang', $this->session->userdata('nip'));
            $this->db->set('kepala_gudang_status', 'accepted');
            $this->db->where('id_pembelian_detail', $id);
            $query = $this->db->update('pembelian_detail');
            if ($query) {
                echo "<script>alert('Permintaan telah diterima')</script>";
                redirect('pembelian', 'refresh');
            }
        } else {
            $this->db->select('stok');
            $barang = $this->db->get_where('barang', ['kode_barang' => $data['kode_barang']])->row_array();
            $this->db->set('kepala_gudang2', $this->session->userdata('nip'));
            $this->db->set('kepala_gudang2_status', 'accepted');
            $this->db->where('id_pembelian_detail', $id);
            $query = $this->db->update('pembelian_detail');
            if ($data['manajer_status'] == 'accepted') {
                $this->db->set('stok', ((int) $barang['stok'] + $data['jumlah']));
                $this->db->where('kode_barang', $data['kode_barang']);
                $stok = $this->db->update('barang');
                $this->db->set('status', 'accepted');
                $this->db->where('id_pembelian', $id);
                $status = $this->db->update('pembelian');
            }
            if ($query) {
                echo "<script>alert('Permintaan telah diterima')</script>";
                redirect('pembelian', 'refresh');
            }
        }

        if ($query) {
            echo "<script>alert('Permintaan telah diterima')</script>";
            redirect('pembelian', 'refresh');
        }
    }
    public function reject_gudang($id)
    {
        $this->db->select('kepala_gudang_status,manajer_status');
        $data = $this->db->get_where('pembelian_detail', ['id_pembelian_detail' => $id])->row_array();
        if ($data['kepala_gudang_status'] != 'Pending..') {
            $this->db->set('kepala_gudang2', $this->session->userdata('nip'));
            $this->db->set('kepala_gudang2_status', 'rejected');
            $this->db->where('id_pembelian_detail', $id);
            $query = $this->db->update('pembelian_detail');
            if (isset($data['manajer_status'])) {
                $this->db->set('status', 'rejected');
                $this->db->where('id_pembelian', $id);
                $status = $this->db->update('pembelian');;
            }
        } else {
            $this->db->set('kepala_gudang', $this->session->userdata('nip'));
            $this->db->set('kepala_gudang_status', 'rejected');
            $this->db->where('id_pembelian_detail', $id);
            $query = $this->db->update('pembelian_detail');
        }
        if ($query) {
            echo "<script>alert('Permintaan telah ditolak')</script>";
            redirect('pembelian', 'refresh');
        }
    }
    public function accept_manajer($id)
    {
        $this->db->set('manajer', $this->session->userdata('nip'));
        $this->db->set('manajer_status', 'accepted');
        $this->db->where('id_pembelian_detail', $id);
        $query = $this->db->update('pembelian_detail');
        if ($query) {
            echo "<script>alert('Permintaan telah diterima')</script>";
            redirect('pembelian', 'refresh');
        }
        if ($query) {
            echo "<script>alert('Permintaan telah diterima')</script>";
            redirect('pembelian', 'refresh');
        }
    }
    public function reject_manajer($id)
    {
        $this->db->set('manajer', $this->session->userdata('nip'));
        $this->db->set('manajer_status', 'rejected');
        $this->db->where('id_pembelian_detail', $id);
        $query = $this->db->update('pembelian_detail');
        if ($query) {
            echo "<script>alert('Permintaan telah ditolak')</script>";
            redirect('pembelian', 'refresh');
        }
    }
    public function save()
    {
        $id = $this->input->post('id', true);
        $nip = $this->session->userdata('nip');
        $keterangan = $this->input->post('keterangan', true);
        $jumlah = $this->input->post('jumlah', true);
        $id_barang = $this->input->post('barang', true);
        $barang = $this->db->get_where('barang', ['kode_barang' => $id_barang])->row_array();
        $data_beli = [
            'nip' => $nip,
            'keterangan' => $keterangan,
            'status' => 'Pending..',
        ];
        $data_detail = [
            'kode_barang' => $id_barang,
            'jumlah' => $jumlah,
            'total_harga' => ((int) $jumlah * $barang['harga']),
            'kepala_gudang_status' => 'Pending..',
            'kepala_gudang2_status' => 'Pending..',
            'manajer_status' => 'Pending..'
        ];
        if (empty($id)) {
            $query = $this->model->insert($data_beli, $data_detail);
            if ($query) {
                echo "<script>alert('Berhasil Ditambahkan')</script>";
                redirect('pembelian', 'refresh');
            }
        } else {
            $query = $this->model->update($id);
            if ($query) {
                echo "<script>alert('Berhasil Diubah')</script>";
                redirect('pembelian', 'refresh');
            }
        }
    }
    public function hapus($id)
    {
        $query = $this->model->delete($id);
        if ($query) {
            echo "<script>alert('Berhasil Dihapus')</script>";
            redirect('pembelian', 'refresh');
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
        $this->load->model('PembelianModel', 'model');
    }
}
