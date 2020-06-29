<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Render_Controller.php';

class Peminjaman extends Render_Controller
{

    public function index()
    {
        // Page Settings
        $this->navigation = ['Dashboard'];
        $this->plugins = [];
        $this->data['data'] = $this->model->get();
        $this->data['barang'] = $this->db->get_where('barang', ['stok' > 0])->result_array();
        if ($this->session->userdata('id_level') == 1) {
            $this->content = 'peminjaman-teknisi';
        } elseif ($this->session->userdata('id_level') == 2) {
            $this->content = 'peminjaman-petugas-gudang';
        } elseif ($this->session->userdata('id_level') == 3) {
            $this->content = 'peminjaman-kepala-gudang';
        } elseif ($this->session->userdata('id_level') == 4) {
            $this->content = 'peminjaman-manajer';
        }
        $this->title = $this->content;
        $this->render();
    }
    public function ubah($id)
    {
        $this->title = 'Ubah Peminjaman';
        $this->navigation = ['Dashboard'];
        $this->plugins = [];
        $this->data['dataID'] = $this->model->getById($id);
        $this->data['barang'] = $this->db->get_where('barang', ['stok' > 0])->result_array();
        $this->content = 'peminjaman-ubah';
        $this->render();
    }
    public function accept_gudang($id)
    {
        $this->db->set('kepala_gudang', $this->session->userdata('nip'));
        $this->db->set('kepala_gudang_status', 'accepted');
        $this->db->where('id_peminjaman_detail', $id);
        $query = $this->db->update('peminjaman_detail');
        if ($query) {
            echo "<script>alert('Permintaan telah diterima')</script>";
            redirect('peminjaman', 'refresh');
        }
    }
    public function reject_gudang($id)
    {
        $this->db->set('kepala_gudang', $this->session->userdata('nip'));
        $this->db->set('kepala_gudang_status', 'rejected');
        $this->db->where('id_peminjaman_detail', $id);
        $query = $this->db->update('peminjaman_detail');
        if ($query) {
            echo "<script>alert('Permintaan telah ditolak')</script>";
            redirect('peminjaman', 'refresh');
        }
    }
    public function accept_manajer($id)
    {
        $data_peminjaman = [
            'status' => 'accepted',
        ];
        $data_detail = [
            'manajer' => $this->session->userdata('nip'),
            'manajer_status' => 'accepted',

        ];
        $query = $this->db->select('*');
        $query = $this->db->from('peminjaman_detail pd');
        $query = $this->db->join('peminjaman p', 'p.id_peminjaman = pd.id_peminjaman', 'left');
        $query = $this->db->join('barang b', 'b.kode_barang = pd.kode_barang', 'left');
        $query = $this->db->where('id_peminjaman_detail', $id);
        $data = $this->db->get()->row_array();
        $query = $this->db->where('id_peminjaman', $id);
        $query = $this->db->update('peminjaman', $data_peminjaman);
        $query = $this->db->where('id_peminjaman_detail', $data['id_peminjaman_detail']);
        $query = $this->db->update('peminjaman_detail', $data_detail);
        $data_barang = [
            'stok' => ($data['stok'] - $data['jumlah'])
        ];
        $query = $this->db->where('kode_barang', $data['kode_barang']);
        $query = $this->db->update('barang', $data_barang);

        if ($query) {
            echo "<script>alert('Permintaan telah diterima')</script>";
            redirect('peminjaman', 'refresh');
        }
    }
    public function reject_manajer($id)
    {
        $data_peminjaman = [
            'status' => 'rejected'
        ];
        $data_detail = [
            'manajer' => $this->session->userdata('nip'),
            'manajer_status' => 'rejected'
        ];
        $query = $this->db->select('*');
        $query = $this->db->from('peminjaman_detail pd');
        $query = $this->db->join('peminjaman p', 'p.id_peminjaman = pd.id_peminjaman', 'left');
        $query = $this->db->where('id_peminjaman_detail', $id);
        $data = $this->db->get()->row_array();
        $query = $this->db->where('id_peminjaman', $id);
        $query = $this->db->update('peminjaman', $data_peminjaman);
        $query = $this->db->where('id_peminjaman_detail', $data['id_peminjaman_detail']);
        $query = $this->db->update('peminjaman_detail', $data_detail);


        if ($query) {
            echo "<script>alert('Permintaan telah ditolak')</script>";
            redirect('peminjaman', 'refresh');
        }
    }
    public function save()
    {
        $id = $this->input->post('id', true);
        $nip = $this->session->userdata('nip');
        $keterangan = $this->input->post('keterangan', true);
        $jumlah = $this->input->post('jumlah', true);
        $barang = $this->input->post('barang', true);
        $data_pinjam = [
            'nip' => $nip,
            'keterangan' => $keterangan,
            'status' => 'Pending..',
        ];
        $data_detail = [
            'kode_barang' => $barang,
            'jumlah' => $jumlah,
            'kepala_gudang_status' => 'Pending..',
            'manajer_status' => 'Pending..'
        ];

        if (empty($id)) {
            $query = $this->model->insert($data_pinjam, $data_detail);
            if ($query) {
                echo "<script>alert('Berhasil Ditambahkan')</script>";
                redirect('peminjaman', 'refresh');
            }
        } else {
            $query = $this->model->update($id);
            if ($query) {
                echo "<script>alert('Berhasil Diubah')</script>";
                redirect('peminjaman', 'refresh');
            }
        }
    }
    public function hapus($id)
    {
        $query = $this->model->delete($id);
        if ($query) {
            echo "<script>alert('Berhasil Dihapus')</script>";
            redirect('peminjaman', 'refresh');
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
        $this->load->model('peminjamanModel', 'model');
    }
}
