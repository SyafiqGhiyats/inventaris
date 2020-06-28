<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/Render_Controller.php';

class Home extends Render_Controller {

	public function index() {

		// Page config:
		$this->title 		= 'Website';
		$this->plugins 		= ['datatables','wizard','summernote'];
		$this->navigation 	= ['Website'];
		$this->content 		= 'website-home';
		$this->render();
	}


	private function output_json($data) {
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	}

	function __construct() {
		parent::__construct();
		$this->default_template = 'templates/dashboard';
		$this->load->library('plugin');
		$this->load->helper('url');
		$this->load->model('website/home_model', 'home');
		// cek session
		$this->sesion->cek_session();
	}
}