<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PermintaanModel extends CI_Model
{
    public function getById($id)
    {
        $this->db->select('keterangan,kode_barang,jumlah,permintaan.id_permintaan,status');
        $this->db->from('permintaan');
        $this->db->join('permintaan_detail', 'permintaan_detail.id_permintaan = permintaan.id_permintaan');
        $this->db->where('permintaan.id_permintaan', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function get($nip=null)
    {
        $this->db->select('*');
        $this->db->from('permintaan');
        $this->db->join('permintaan_detail', 'permintaan_detail.id_permintaan = permintaan.id_permintaan');
        $this->db->order_by('sort', 'ASC');
        if($nip != null){
            $this->db->where('permintaan.nip', $nip);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert($data_pinjam, $data_detail)
    {
        $this->db->insert('permintaan', $data_pinjam);
        $id = $this->db->insert_id();
        $data_detail['id_permintaan'] = $id;
        $this->db->insert('permintaan_detail', $data_detail);
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
        $data_permintaan = [
            'keterangan' => $keterangan,
        ];

        $query = $this->db->where('id_permintaan', $id);
        $query = $this->db->update('permintaan_detail', $data_detail);
        $query = $this->db->where('id_permintaan', $id);
        $query = $this->db->update('permintaan', $data_permintaan);

        return $query;
    }
    public function delete($id)
    {
        $query = $this->db->delete('permintaan', ['id_permintaan' => $id]);
        return $query;
    }
}
