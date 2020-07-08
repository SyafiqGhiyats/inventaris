<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanPembelianModel extends CI_Model
{
    public function get()
    {
        $query = $this->db->join('pembelian_detail a', 'a.id_pembelian_detail = b.id_pembelian')
        ->order_by('sort', 'ASC')
            ->get('pembelian b')->result_array();
        return $query;
    }
    public function filter_accept()
    {
        $query = $this->db->join('pembelian_detail a', 'a.id_pembelian_detail = b.id_pembelian')
            ->get_where('pembelian b', ['b.status' => 'accepted'])->result_array();
        return $query;
    }
    public function filter_reject()
    {
        $query = $this->db->join('pembelian_detail a', 'a.id_pembelian_detail = b.id_pembelian')
            ->get_where('pembelian b', ['b.status' => 'rejected'])->result_array();
        return $query;
    }
    public function filter_pending()
    {
        $query = $this->db->join('pembelian_detail a', 'a.id_pembelian_detail = b.id_pembelian')
            ->get_where('pembelian b', ['b.status' => 'Pending..'])->result_array();
        return $query;
    }
    public function filter_tanggal()
    {
        $tgl1 = $this->input->get('start_date');
        $tgl2 = $this->input->get('end_date');
        $tgl1 = date('Y-m-d', strtotime($tgl1) - (60 * 60 * 24));
        $tgl2 = date('Y-m-d', strtotime($tgl2) + (60 * 60 * 24));
        $query = $this->db->join('pembelian_detail a', 'a.id_pembelian_detail = b.id_pembelian');
        $query = $this->db->where("tanggal >= '$tgl1' AND tanggal <= '$tgl2'");
        $query = $this->db->order_by('sort', 'ASC');
        $query = $this->db->get('pembelian b')->result_array();
        return $query;
    }
    public function filter_today()
    {
        $tgl = date('Y-m-d', time());
        $query = $this->db->join('pembelian_detail a', 'a.id_pembelian_detail = b.id_pembelian');
        $query = $this->db->like("tanggal", $tgl);
        $query = $this->db->order_by('sort', 'ASC');
        $query = $this->db->get('pembelian b')->result_array();
        return $query;
    }
    public function last_week()
    {
        $tgl1 = date('Y-m-d', time() - (60 * 60 * 24));
        $tgl2 = date('Y-m-d', time() - (60 * 60 * 24 * 7));
        $query = $this->db->join('pembelian_detail a', 'a.id_pembelian_detail = b.id_pembelian')
            ->where("tanggal >= '$tgl2' AND tanggal <= '$tgl1'")
            ->order_by('sort', 'ASC')
            ->get('pembelian b')->result_array();
        return $query;
    }
    public function last_month()
    {
        $month = date('Y-m', time() - 60 * 60 * 24 * 30);
        $query = $this->db->join('pembelian_detail a', 'a.id_pembelian_detail = b.id_pembelian')
            ->like('tanggal', $month)
            ->order_by('sort', 'ASC')
            ->get('pembelian b')->result_array();
        return $query;
    }
}
