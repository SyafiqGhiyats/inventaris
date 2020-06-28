<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RakModel extends CI_Model
{
    public function getById($id)
    {
        return $this->db->get_where('rak', ['id_rak' => $id])->row_array();
    }
    public function get()
    {
        return $this->db->get('rak')->result_array();
    }

    public function insert($data)
    {
        return $this->db->insert('rak', $data);
    }
    public function update($id, $data)
    {
        return $this->db->where('id_rak', $id)->update('rak', $data);
    }
    public function delete($id)
    {
        return $this->db->delete('rak', ['id_rak' => $id]);
    }
}
