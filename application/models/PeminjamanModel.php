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
    public function update($id, $data)
    {
        $query = $this->db->set('peminjaman.keterangan', $data['keterangan']);
        $query = $this->db->set('peminjaman_detail.kode_barang', $data['barang']);
        $query = $this->db->set('peminjaman_detail.jumlah', $data['jumlah']);

        $query = $this->db->where('peminjaman.id_peminjaman', $id);
        $query = $this->db->where('peminjaman_detail.id_peminjaman', $id);
        $query = $this->db->update('peminjaman JOIN peminjaman_detail ON peminjaman_detail.id_peminjaman= peminjaman.id_peminjaman');

        return $query;
    }
    public function delete($id)
    {
        $query = $this->db->delete('peminjaman', ['id_peminjaman' => $id]);
        return $query;
    }
}
