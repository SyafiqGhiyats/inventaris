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
        $this->data['dataID'] = $this->model->getById($id);
        $this->data['barang'] = $this->db->get_where('barang', ['stok' > 0])->result_array();
        if ($this->data['dataID']['status'] == 'accepted') {
            echo "<script>alert('Data tidak dapat diubah karna sudah disetujui')</script>";
            redirect('pembelian', 'refresh');
        } else if ($this->data['dataID']['status'] == 'rejected') {
            echo "<script>alert('Data tidak dapat diubah karna sudah ditolak')</script>";
            redirect('pembelian', 'refresh');
        } else {
            $this->title = 'Ubah pembelian';
            $this->navigation = ['Dashboard'];
            $this->plugins = [];
            $this->content = 'pembelian-ubah';
            $this->render();
        }
    }
    public function accept_gudang($id)
    {
        $data = $this->db->get_where('pembelian_detail', ['id_pembelian' => $id])->row_array();
        if ($data['kepala_gudang_status'] != 'Pending..') {
            echo "<script>alert('Barang ini telah dikonfirmasi,tidak bisa mengkonfirmasi ulang')</script>";
            redirect('pembelian', 'refresh');
        } else {
            $this->db->set('kepala_gudang', $this->session->userdata('nip'));
            $this->db->set('kepala_gudang_status', 'accepted');
            $this->db->where('id_pembelian', $id);
            $query = $this->db->update('pembelian_detail');
            if ($query) {
                echo "<script>alert('pembelian telah diterima')</script>";
                redirect('pembelian', 'refresh');
            }
        }
    }
    public function reject_gudang($id)
    {
        $data = $this->db->get_where('pembelian_detail', ['id_pembelian_detail' => $id]);
        if ($data['kepala_gudang_status'] != 'Pending..') {
            echo "<script>alert('Barang ini telah dikonfirmasi,tidak bisa mengkonfirmasi ulang')</script>";
            redirect('pembelian', 'refresh');
        } else {
            $this->db->set('kepala_gudang', $this->session->userdata('nip'));
            $this->db->set('kepala_gudang_status', 'rejected');
            $this->db->where('id_pembelian_detail', $id);
            $query = $this->db->update('pembelian_detail');
            if ($query) {
                echo "<script>alert('pembelian telah ditolak')</script>";
                redirect('pembelian', 'refresh');
            }
        }
    }
    public function accept_manajer($id)
    {
        $data_pembelian = [
            'status' => 'accepted',
            'sort' => 1
        ];
        $data_detail = [
            'manajer' => $this->session->userdata('nip'),
            'manajer_status' => 'accepted',

        ];
        $query = $this->db->select('*');
        $query = $this->db->from('pembelian_detail pd');
        $query = $this->db->join('pembelian p', 'p.id_pembelian = pd.id_pembelian', 'left');
        $query = $this->db->join('barang b', 'b.kode_barang = pd.kode_barang', 'left');
        $query = $this->db->where('p.id_pembelian', $id);
        $data = $this->db->get()->row_array();
        if ($data['kepala_gudang_status'] != 'Pending..') {
            if ($data['manajer_status'] != 'Pending..') {
                echo "<script>alert('Barang ini telah dikonfirmasi,tidak bisa mengkonfirmasi ulang')</script>";
                redirect('pembelian', 'refresh');
            } else {
                $query = $this->db->where('id_pembelian', $id);
                $query = $this->db->update('pembelian', $data_pembelian);

                $query = $this->db->where('id_pembelian_detail', $data['id_pembelian_detail']);
                $query = $this->db->update('pembelian_detail', $data_detail);
                $data_barang = [
                    'stok' => ($data['stok'] + $data['jumlah'])
                ];
                $query = $this->db->where('kode_barang', $data['kode_barang']);
                $query = $this->db->update('barang', $data_barang);

                if ($query) {
                    echo "<script>alert('pembelian telah diterima')</script>";
                    redirect('pembelian', 'refresh');
                }
            }
        } else {
            echo "<script>alert('Harap Tunggu konfirmasi dari kepala gudang')</script>";
            redirect('pembelian', 'refresh');
        }
    }
    public function reject_manajer($id)
    {
        $data_pembelian = [
            'status' => 'rejected'
        ];
        $data_detail = [
            'manajer' => $this->session->userdata('nip'),
            'manajer_status' => 'rejected'
        ];
        $query = $this->db->select('*');
        $query = $this->db->from('pembelian_detail pd');
        $query = $this->db->join('pembelian p', 'p.id_pembelian = pd.id_pembelian', 'left');
        $query = $this->db->where('p.id_pembelian', $id);
        $data = $this->db->get()->row_array();
        if ($data['kepala_gudang_status'] != 'Pending..') {

            if ($data['manajer_status'] != 'Pending..') {
                echo "<script>alert('Barang ini telah dikonfirmasi,tidak bisa mengkonfirmasi ulang')</script>";
                redirect('pembelian', 'refresh');
            } else {
                $query = $this->db->where('id_pembelian', $id);
                $query = $this->db->update('pembelian', $data_pembelian);
                $query = $this->db->where('id_pembelian_detail', $data['id_pembelian_detail']);
                $query = $this->db->update('pembelian_detail', $data_detail);

                if ($query) {
                    echo "<script>alert('pembelian telah ditolak')</script>";
                    redirect('pembelian', 'refresh');
                }
            }
        } else {
            echo "<script>alert('harap menunggu konfirmasi dari kepala gudang')</script>";
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
            'manajer_status' => 'Pending..'
        ];
        if (empty($id)) {
            $query = $this->model->insert($data_beli, $data_detail);
            if ($query) {
                echo "<script>alert('Berhasil Ditambahkan,Harap Menunggu Konfirmasi Dari Kepala Gudang dan Manager')</script>";
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
        $data = $this->db->get_where('pembelian', ['id_pembelian' => $id])->row_array();
        if ($data['status'] == 'accepted') {
            echo "<script>alert('Data tidak dapat dihapus karna sudah disetujui')</script>";
            redirect('pembelian', 'refresh');
        } else if ($data['status'] == 'rejected') {
            echo "<script>alert('Data tidak dapat dihapus karna sudah ditolak')</script>";
            redirect('pembelian', 'refresh');
        } else {
            $query = $this->model->delete($id);
            if ($query) {
                echo "<script>alert('Berhasil Dihapus')</script>";
                redirect('pembelian', 'refresh');
            }
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