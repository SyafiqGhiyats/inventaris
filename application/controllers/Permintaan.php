<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Render_Controller.php';

class Permintaan extends Render_Controller
{

    public function index()
    {
        // Page Settings
        $brg = $this->db->get_where('barang', ['stok' > 0])->result_array();
        $key = $this->input->post('key');
        $this->navigation = ['Dashboard'];
        $this->plugins = [];
        $this->data['data'] = $this->model->get();
        $this->data['barang'] = $brg;
        if ($this->session->userdata('id_level') == 1) {
            $this->content = 'permintaan-teknisi';
        } elseif ($this->session->userdata('id_level') == 2) {
            $this->content = 'permintaan-petugas-gudang';
        } elseif ($this->session->userdata('id_level') == 3) {
            $this->content = 'permintaan-kepala-gudang';
        } elseif ($this->session->userdata('id_level') == 4) {
            $this->content = 'permintaan-manajer';
        }
        if ($key) {
            $this->content = 'permintaan-barang';
            $this->data['barang'] = $this->db->like('nama', $key)->get('barang')->result_array();
        }
        $this->title = $this->content;
        $this->render();
    }
    public function detail($id)
    {
        $this->title = 'Detail permintaan';
        $this->navigation = ['Dashboard'];
        $this->plugins = [];
        $this->data['barang'] = $this->db->get_where('barang', ['kode_barang' => $id])->row_array();
        $this->content = 'barang-detail';
        $this->render();
    }
    public function ubah($id)
    {
        $this->data['dataID'] = $this->model->getById($id);
        $this->data['barang'] = $this->db->get_where('barang', ['stok' > 0])->result_array();
        if ($this->data['dataID']['status'] == 'accepted') {
            echo "<script>alert('Data tidak dapat diubah karna sudah disetujui')</script>";
            redirect('permintaan', 'refresh');
        } else if ($this->data['dataID']['status'] == 'rejected') {
            echo "<script>alert('Data tidak dapat diubah karna sudah ditolak')</script>";
            redirect('permintaan', 'refresh');
        } else {
            $this->title = 'Ubah permintaan';
            $this->navigation = ['Dashboard'];
            $this->plugins = [];
            $this->content = 'permintaan-ubah';
            $this->render();
        }
    }
    public function accept_gudang($id)
    {
        $this->db->set('kepala_gudang', $this->session->userdata('nip'));
        $this->db->set('kepala_gudang_status', 'accepted');
        $this->db->where('id_permintaan_detail', $id);
        $query = $this->db->update('permintaan_detail');
        if ($query) {
            echo "<script>alert('Permintaan telah diterima, Silahkan tunggu konfirmasi dari Manager')</script>";
            redirect('permintaan', 'refresh');
        }
    }
    public function reject_gudang($id)
    {
        $this->db->set('kepala_gudang', $this->session->userdata('nip'));
        $this->db->set('kepala_gudang_status', 'rejected');
        $this->db->where('id_permintaan_detail', $id);
        $query = $this->db->update('permintaan_detail');
        if ($query) {
            echo "<script>alert('Permintaan telah ditolak')</script>";
            redirect('permintaan', 'refresh');
        }
    }
    public function accept_manajer($id)
    {
        $data_permintaan = [
            'status' => 'accepted',
            'sort' => 1
        ];
        $data_detail = [
            'manajer' => $this->session->userdata('nip'),
            'manajer_status' => 'accepted',

        ];
        $query = $this->db->select('*');
        $query = $this->db->from('permintaan_detail pd');
        $query = $this->db->join('permintaan p', 'p.id_permintaan = pd.id_permintaan', 'left');
        $query = $this->db->join('barang b', 'b.kode_barang = pd.kode_barang', 'left');
        $query = $this->db->where('id_permintaan_detail', $id);
        $data = $this->db->get()->row_array();
        if ($data['kepala_gudang_status'] != 'Pending..') {
            if ($data['manajer_status'] != 'Pending..') {
                echo "<script>alert('Barang ini telah dikonfirmasi,tidak bisa mengkonfirmasi ulang')</script>";
                redirect('pembelian', 'refresh');
            } else {
                $query = $this->db->where('id_permintaan', $id);
                $query = $this->db->update('permintaan', $data_permintaan);
                $query = $this->db->where('id_permintaan_detail', $data['id_permintaan_detail']);
                $query = $this->db->update('permintaan_detail', $data_detail);
                $data_barang = [
                    'stok' => ($data['stok'] - $data['jumlah'])
                ];
                $query = $this->db->where('kode_barang', $data['kode_barang']);
                $query = $this->db->update('barang', $data_barang);

                if ($query) {
                    echo "<script>alert('Permintaan telah diterima')</script>";
                    redirect('permintaan', 'refresh');
                }
            }
        } else {
            echo "<script>alert('Harap Tunggu konfirmasi dari kepala gudang')</script>";
            redirect('pembelian', 'refresh');
        }
    }
    public function reject_manajer($id)
    {
        $data_permintaan = [
            'status' => 'rejected'
        ];
        $data_detail = [
            'manajer' => $this->session->userdata('nip'),
            'manajer_status' => 'rejected'
        ];
        $query = $this->db->select('*');
        $query = $this->db->from('permintaan_detail pd');
        $query = $this->db->join('permintaan p', 'p.id_permintaan = pd.id_permintaan', 'left');
        $query = $this->db->where('id_permintaan_detail', $id);
        $data = $this->db->get()->row_array();
        if ($data['kepala_gudang_status'] != 'Pending..') {
            if ($data['manajer_status'] != 'Pending..') {
                echo "<script>alert('Barang ini telah Tolak,tidak bisa menyetujui lagi')</script>";
                redirect('permintaan', 'refresh');
            } else {
                $query = $this->db->where('id_permintaan', $id);
                $query = $this->db->update('permintaan', $data_permintaan);
                $query = $this->db->where('id_permintaan_detail', $data['id_permintaan_detail']);
                $query = $this->db->update('permintaan_detail', $data_detail);


                if ($query) {
                    echo "<script>alert('Permintaan telah ditolak')</script>";
                    redirect('permintaan', 'refresh');
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
        $barang = $this->input->post('barang', true);
        $stok = $this->db->get_where('barang', ['kode_barang' => $barang])->row_array();
        $data_pinjam = [
            'nip' => $nip,
            'keterangan' => $keterangan,
            'status' => 'Pending..',
            'sort' => 0
        ];
        $data_detail = [
            'kode_barang' => $barang,
            'jumlah' => $jumlah,
            'kepala_gudang_status' => 'Pending..',
            'manajer_status' => 'Pending..'
        ];
        if (empty($id)) {
            if ((int) $jumlah > (int) $stok['stok']) {
                echo "<script>alert('Jumlah tidak bisa melebihi Stok')</script>";
                redirect('permintaan', 'refresh');
            } else {
                $query = $this->model->insert($data_pinjam, $data_detail);
                if ($query) {
                    echo "<script>alert('Berhasil Ditambahkan. Silahkan tunggu konfirmasi dari kepala gudang dan manager')</script>";
                    redirect('permintaan', 'refresh');
                }
            }
        } else {
            $query = $this->model->update($id);
            if ($query) {
                echo "<script>alert('Berhasil Diubah. Silahkan tunggu konfirmasi dari kepala gudang dan manager')</script>";
                redirect('permintaan', 'refresh');
            }
        }
    }
    public function hapus($id)
    {
        $data = $this->db->get_where('permintaan', ['id_permintaan' => $id])->row_array();
        if ($data['status'] == 'accepted') {
            echo "<script>alert('Data tidak dapat dihapus karna sudah disetujui')</script>";
            redirect('permintaan', 'refresh');
        } else if ($data['status'] == 'rejected') {
            echo "<script>alert('Data tidak dapat dihapus karna sudah ditolak')</script>";
            redirect('permintaan', 'refresh');
        } else {
            $query = $this->model->delete($id);
            if ($query) {
                echo "<script>alert('Berhasil Dihapus')</script>";
                redirect('permintaan', 'refresh');
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
        $this->load->model('permintaanModel', 'model');
    }
}
