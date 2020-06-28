<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangModel extends CI_Model
{
    public function getById($id)
    {
        return $this->db->get_where('barang', ['kode_barang' => $id])->row_array();
    }
    public function get()
    {
        return $this->db->get('barang')->result_array();
    }

    public function insert($data)
    {
        return $this->db->insert('barang', $data);
    }
    public function update($id, $data)
    {
        return $this->db->where('kode_barang', $id)->update('barang', $data);
    }
    public function delete($id)
    {
        return $this->db->delete('barang', ['kode_barang' => $id]);
    }
}
