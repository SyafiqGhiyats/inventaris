<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PeminjamanModel extends CI_Model
{
    public function getById($id)
    {
        $this->db->select('keterangan,kode_barang,jumlah,peminjaman.id_peminjaman');
        $this->db->from('peminjaman');
        $this->db->join('peminjaman_detail', 'peminjaman_detail.id_peminjaman = peminjaman.id_peminjaman');
        $this->db->where('peminjaman.id_peminjaman', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function get()
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('peminjaman_detail', 'peminjaman_detail.id_peminjaman = peminjaman.id_peminjaman');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert($data_pinjam, $data_detail)
    {
        $this->db->insert('peminjaman', $data_pinjam);
        $id = $this->db->insert_id();
        $data_detail['id_peminjaman'] = $id;
        $this->db->insert('peminjaman_detail', $data_detail);
        return $id;
    }
    public function update($id)
    {
        $keterangan = $this->input->post('keterangan', true);
        $jumlah = $this->input->post('jumlah', true);
        $barang = $this->input->post('barang', true);

        $data_detail = [
            'jumlah' => $jumlah,
            'kode_barang' => $barang
        ];
        $data_peminjaman = [
            'keterangan' => $keterangan,
        ];

        $query = $this->db->where('id_peminjaman', $id);
        $query = $this->db->update('peminjaman_detail', $data_detail);
        $query = $this->db->where('id_peminjaman', $id);
        $query = $this->db->update('peminjaman', $data_peminjaman);

        return $query;
    }
    public function delete($id)
    {
        $query = $this->db->delete('peminjaman', ['id_peminjaman' => $id]);
        return $query;
    }
}
