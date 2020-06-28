<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardModel extends CI_Model {

	public function total_posting_shopee(){
		return $data['total'] = $this->db->where('prod_shopee', 'sudah')->get('produk')->num_rows();
	}
}
