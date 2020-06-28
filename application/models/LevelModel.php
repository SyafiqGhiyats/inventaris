<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LevelModel extends CI_Model
{
    public function getById($id)
    {
        return $this->db->get_where('level', ['id_level' => $id])->row_array();
    }
    public function get()
    {
        return $this->db->get('level')->result_array();
    }

    public function insert($data)
    {
        return $this->db->insert('level', $data);
    }
    public function update($id, $data)
    {
        return $this->db->where('id_level', $id)->update('level', $data);
    }
    public function delete($id)
    {
        return $this->db->delete('level', ['id_level' => $id]);
    }
}
