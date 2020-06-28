<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GudangModel extends CI_Model
{
    public function getById($id)
    {
        return $this->db->get_where('gudang', ['id_gudang' => $id])->row_array();
    }
    public function get()
    {
        return $this->db->get('gudang')->result_array();
    }

    public function insert($data)
    {
        return $this->db->insert('gudang', $data);
    }
    public function update($id, $data)
    {
        return $this->db->where('id_gudang', $id)->update('gudang', $data);
    }
    public function delete($id)
    {
        return $this->db->delete('gudang', ['id_gudang' => $id]);
    }
}
