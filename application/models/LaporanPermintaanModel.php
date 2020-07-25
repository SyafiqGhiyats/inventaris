<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanPermintaanModel extends CI_Model
{
    public function get($nip = null)
    {
        if ($nip != null) {
            $where = array('nip' => $nip);
        } else {
            $where = array();
        }
        $query = $this->db->join('permintaan_detail a', 'a.id_permintaan_detail = b.id_permintaan')->order_by('sort', 'ASC')->where($where)->get('permintaan b')->result_array();
        return $query;
    }
    public function filter_accept()
    {
        if ($this->session->userdata('level') == 'teknisi') {
            $query = $this->db->join('permintaan_detail a', 'a.id_permintaan_detail = b.id_permintaan')
                ->get_where('permintaan b', ['b.status' => 'accepted', 'nip' => $this->session->userdata('nip')])->result_array();
        } else {
            $query = $this->db->join('permintaan_detail a', 'a.id_permintaan_detail = b.id_permintaan')
                ->get_where('permintaan b', ['b.status' => 'accepted'])->result_array();
        }
        return $query;
    }
    public function filter_reject()
    {
        if ($this->session->userdata('level') == 'teknisi') {
            $query = $this->db->join('permintaan_detail a', 'a.id_permintaan_detail = b.id_permintaan')
                ->get_where('permintaan b', ['b.status' => 'rejected', 'nip' => $this->session->userdata('nip')])->result_array();
        } else {
            $query = $this->db->join('permintaan_detail a', 'a.id_permintaan_detail = b.id_permintaan')
                ->get_where('permintaan b', ['b.status' => 'rejected'])->result_array();
        }
        return $query;
    }
    public function filter_pending()
    {
        if ($this->session->userdata('level') == 'teknisi') {
            $query = $this->db->join('permintaan_detail a', 'a.id_permintaan_detail = b.id_permintaan')
                ->get_where('permintaan b', ['b.status' => 'Pending..', 'nip' => $this->session->userdata('nip')])->result_array();
        } else {
            $query = $this->db->join('permintaan_detail a', 'a.id_permintaan_detail = b.id_permintaan')
                ->get_where('permintaan b', ['b.status' => 'Pending..'])->result_array();
        }
        return $query;
    }
    public function filter_tanggal()
    {
        $tgl1 = $this->input->get('start_date');
        $tgl2 = $this->input->get('end_date');
        $tgl1 = date('Y-m-d', strtotime($tgl1) - (60 * 60 * 24));
        $tgl2 = date('Y-m-d', strtotime($tgl2) + (60 * 60 * 24));
        if ($this->session->userdata('level') == 'teknisi') {
            $query = $this->db->join('permintaan_detail a', 'a.id_permintaan_detail = b.id_permintaan');
            $query = $this->db->where("tanggal >= '$tgl1' AND tanggal <= '$tgl2' AND nip=" . $this->session->userdata('nip'));
            $query = $this->db->order_by('sort', 'ASC');
            $query = $this->db->get('permintaan b')->result_array();
        } else {
            $query = $this->db->join('permintaan_detail a', 'a.id_permintaan_detail = b.id_permintaan');
            $query = $this->db->where("tanggal >= '$tgl1' AND tanggal <= '$tgl2'");
            $query = $this->db->order_by('sort', 'ASC');
            $query = $this->db->get('permintaan b')->result_array();
        }
        return $query;
    }
    public function filter_today()
    {
        if ($this->session->userdata('level') == 'teknisi') {
            $tgl = date('Y-m-d', time());
            $query = $this->db->join('permintaan_detail a', 'a.id_permintaan_detail = b.id_permintaan');
            $query = $this->db->like("tanggal", $tgl);
            $query = $this->db->order_by('sort', 'ASC');
            $query = $this->db->where('nip', $this->session->userdata('nip'));
            $query = $this->db->get('permintaan b')->result_array();
        } else {
            $tgl = date('Y-m-d', time());
            $query = $this->db->join('permintaan_detail a', 'a.id_permintaan_detail = b.id_permintaan');
            $query = $this->db->like("tanggal", $tgl);
            $query = $this->db->order_by('sort', 'ASC');
            $query = $this->db->get('permintaan b')->result_array();
        }
        return $query;
    }
    public function last_week()
    {
        $tgl1 = date('Y-m-d', time() - (60 * 60 * 24));
        $tgl2 = date('Y-m-d', time() - (60 * 60 * 24 * 7));
        if ($this->session->userdata('level') == 'teknisi') {
            $query = $this->db->join('permintaan_detail a', 'a.id_permintaan_detail = b.id_permintaan')
                ->where("tanggal >= '$tgl2' AND tanggal <= '$tgl1' AND nip=" . $this->session->userdata('nip'))
                ->order_by('sort', 'ASC')
                ->get('permintaan b')->result_array();
        } else {
            $query = $this->db->join('permintaan_detail a', 'a.id_permintaan_detail = b.id_permintaan')
                ->where("tanggal >= '$tgl2' AND tanggal <= '$tgl1'")
                ->order_by('sort', 'ASC')
                ->get('permintaan b')->result_array();
        }
        return $query;
    }
    public function last_month()
    {
        if ($this->session->userdata('level') == 'teknisi') {
            $month = date('Y-m', time() - 60 * 60 * 24 * 30);
            $query = $this->db->join('permintaan_detail a', 'a.id_permintaan_detail = b.id_permintaan')
                ->like('tanggal', $month)
                ->order_by('sort', 'ASC')
                ->where('nip', $this->session->userdata('nip'))
                ->get('permintaan b')->result_array();
        } else {
            $month = date('Y-m', time() - 60 * 60 * 24 * 30);
            $query = $this->db->join('permintaan_detail a', 'a.id_permintaan_detail = b.id_permintaan')
                ->like('tanggal', $month)
                ->order_by('sort', 'ASC')
                ->get('permintaan b')->result_array();
        }
        return $query;
    }
}
