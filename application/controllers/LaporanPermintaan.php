<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Render_Controller.php';

class LaporanPermintaan extends Render_Controller
{
    public function index()
    {
        // Page Settings
        $this->title = 'Laporan permintaan';
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
            if($this->session->userdata('level') == 'teknisi'){
                $this->data['data'] = $this->model->get($this->session->userdata('nip'));
            }else{                
                $this->data['data'] = $this->model->get();
            }
        }
        $this->content = 'laporan-permintaan';
        $this->render();
    }

    public function cetak()
    {
        if ($this->input->get('filter') == 'accepted') {
            $data['records'] = $this->model->filter_accept();
        } elseif ($this->input->get('filter') == 'rejected') {
            $data['records'] = $this->model->filter_reject();
        } elseif ($this->input->get('filter') == 'pending') {
            $data['records'] = $this->model->filter_pending();
        } elseif ($this->input->get('start_date') != '' && $this->input->get('end_date') != '') {
            $data['records'] = $this->model->filter_tanggal();
        } elseif ($this->input->get('filter') == 'today') {
            $data['records'] = $this->model->filter_today();
        } elseif ($this->input->get('filter') == 'last-week') {
            $data['records'] = $this->model->last_week();
        } elseif ($this->input->get('filter') == 'last-month') {
            $data['records'] = $this->model->last_month();
        } else {
            if($this->session->userdata('level') == 'teknisi'){
                $this->data['records'] = $this->model->get($this->session->userdata('nip'));
            }else{                
                $this->data['records'] = $this->model->get();
            }
        }

        // var_dump($this->data);
        // exit();
        // Config PDF
        $config['html'] = 'templates/cetak/laporan-permintaan';
        $config['data'] = $data;
        $config['filename'] = 'LAPORAN_PERMINTAAN_' . date('y-m-d');

        $this->pdf->render($config);
    }

    function __construct()
    {
        parent::__construct();
        // Page Settings
        $this->default_template = 'templates/dashboard';
        $this->load->library('plugin');
        $this->load->library('pdf');
        $this->load->helper('url');
        // cek session
        // -------------------------------------------------
        $this->sesion->cek_session();
        $this->load->model('LaporanPermintaanModel', 'model');
    }
}
