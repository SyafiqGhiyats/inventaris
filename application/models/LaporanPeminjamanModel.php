<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanPeminjamanModel extends CI_Model
{
    public function get()
    {
        $query = $this->db->join('peminjaman_detail a', 'a.id_peminjaman_detail = b.id_peminjaman')
            ->get('peminjaman b')->result_array();
        return $query;
    }
    public function filter_accept()
    {
        $query = $this->db->join('peminjaman_detail a', 'a.id_peminjaman_detail = b.id_peminjaman')
            ->get_where('peminjaman b', ['b.status' => 'accepted'])->result_array();
        return $query;
    }
    public function filter_reject()
    {
        $query = $this->db->join('peminjaman_detail a', 'a.id_peminjaman_detail = b.id_peminjaman')
            ->get_where('peminjaman b', ['b.status' => 'rejected'])->result_array();
        return $query;
    }
    public function filter_pending()
    {
        $query = $this->db->join('peminjaman_detail a', 'a.id_peminjaman_detail = b.id_peminjaman')
            ->get_where('peminjaman b', ['b.status' => 'Pending..'])->result_array();
        return $query;
    }
    public function filter_tanggal()
    {
        $tgl1 = $this->input->get('start_date');
        $tgl2 = $this->input->get('end_date');
        $tgl1 = date('Y-m-d', strtotime($tgl1) - (60 * 60 * 24));
        $tgl2 = date('Y-m-d', strtotime($tgl2) + (60 * 60 * 24));
        $query = $this->db->join('peminjaman_detail a', 'a.id_peminjaman_detail = b.id_peminjaman');
        $query = $this->db->where("tanggal >= '$tgl1' AND tanggal <= '$tgl2'");
        $query = $this->db->get('peminjaman b')->result_array();
        return $query;
    }
    public function filter_today()
    {
        $tgl = date('Y-m-d', time());
        $query = $this->db->join('peminjaman_detail a', 'a.id_peminjaman_detail = b.id_peminjaman');
        $query = $this->db->like("tanggal", $tgl);
        $query = $this->db->get('peminjaman b')->result_array();
        return $query;
    }
    public function last_week()
    {
        $tgl1 = date('Y-m-d', time() - (60 * 60 * 24));
        $tgl2 = date('Y-m-d', time() - (60 * 60 * 24 * 7));
        $query = $this->db->join('peminjaman_detail a', 'a.id_peminjaman_detail = b.id_peminjaman')
            ->where("tanggal >= '$tgl2' AND tanggal <= '$tgl1'")
            ->get('peminjaman b')->result_array();
        return $query;
    }
    public function last_month()
    {
        $month = date('Y-m', time() - 60 * 60 * 24 * 30);
        $query = $this->db->join('peminjaman_detail a', 'a.id_peminjaman_detail = b.id_peminjaman')
            ->like('tanggal', $month)
            ->get('peminjaman b')->result_array();
        return $query;
    }
}
