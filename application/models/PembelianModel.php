<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PembelianModel extends CI_Model
{
    public function getById($id)
    {
        $this->db->select('keterangan,kode_barang,jumlah,pembelian.id_pembelian,status');
        $this->db->from('pembelian');
        $this->db->join('pembelian_detail', 'pembelian_detail.id_pembelian = pembelian.id_pembelian');
        $this->db->where('pembelian.id_pembelian', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function get()
    {
        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->join('pembelian_detail', 'pembelian_detail.id_pembelian = pembelian.id_pembelian');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert($data_pinjam, $data_detail)
    {
        $this->db->insert('pembelian', $data_pinjam);
        $id = $this->db->insert_id();
        $data_detail['id_pembelian'] = $id;
        $this->db->insert('pembelian_detail', $data_detail);
        return $id;
    }
    public function update($id)
    {
        $jumlah = $this->input->post('jumlah', true);
        $id_barang = $this->input->post('barang', true);
        $keterangan = $this->input->post('keterangan', true);
        $data_pembelian = [
            'keterangan' => $keterangan,
        ];
        $data_detail = [
            'jumlah' => $jumlah,
            'kode_barang' => $id_barang
        ];
        $query = $this->db->where('id_pembelian_detail', $id);
        $query = $this->db->update('pembelian_detail', $data_detail);
        $query = $this->db->where('id_pembelian', $id);
        $query = $this->db->update('pembelian', $data_pembelian);
        return $query;
    }
    public function delete($id)
    {
        $query = $this->db->delete('pembelian', ['id_pembelian' => $id]);
        return $query;
    }
}
