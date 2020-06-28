<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Render_Controller.php';

class Dashboard extends Render_Controller
{

	public function index()
	{
		// Page Settings
		$this->title = 'Dashboard';
		$this->navigation = ['Dashboard'];
		$this->plugins = [];
		$this->data['menu_home'] = TRUE;
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
		$this->load->model('dashboardModel', 'model');
	}
}
