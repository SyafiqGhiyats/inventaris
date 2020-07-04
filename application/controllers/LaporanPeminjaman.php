<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Render_Controller.php';

class LaporanPeminjaman extends Render_Controller
{
    public function index()
    {
        // Page Settings
        $this->title = 'Laporan peminjaman';
        $this->navigation = ['Dashboard'];
        $this->plugins = [];
        if ($this->input->get('filter') == 'accepted') {
            $this->data['data'] = $this->model->filter_accept();
        } elseif ($this->input->get('filter') == 'rejected') {
            $this->data['data'] = $this->model->filter_reject();
        } elseif ($this->input->get('filter') == 'pending') {
            $this->data['data'] = $this->model->filter_pending();
        } elseif ($this->input->get('start_date') != null && $this->input->get('end_date') != null) {
            $this->data['data'] = $this->model->filter_tanggal();
        } elseif ($this->input->get('filter') == 'today') {
            $this->data['data'] = $this->model->filter_today();
        } elseif ($this->input->get('filter') == 'last-week') {
            $this->data['data'] = $this->model->last_week();
        } elseif ($this->input->get('filter') == 'last-month') {
            $this->data['data'] = $this->model->last_month();
        } else {
            $this->data['data'] = $this->model->get();
        }
        $this->content = 'laporan-peminjaman';
        $this->render();
    }

    function __construct()
    {
        parent::__construct();
        // Page Settings
        $this->default_template = 'templates/dashboard';
        $this->load->library('plugin');
        $this->load->helper('url');
        // cek session
        // -------------------------------------------------
        $this->sesion->cek_session();
        $this->load->model('LaporanPeminjamanModel', 'model');
    }
}
