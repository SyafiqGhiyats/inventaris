<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filter_model extends CI_Model {

	public function getKategori($level=null)
	{
		return $this->db->select('*')->where('kate_level', $level)->get('kategori')->result_array();
	}

}