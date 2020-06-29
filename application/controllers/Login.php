<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Render_Controller.php';

class Login extends Render_Controller
{

	public function index()
	{
		if ($this->session->userdata('status') == true) {
			redirect('dashboard', 'refresh');
		}
		// Page Settings
		$this->title = 'Login';
		$this->navigation = [];
		$this->render();
	}

	public function doLogin()
	{
		if ($this->session->userdata('status') == true) {
			redirect('dashboard', 'refresh');
		}
		$nip 		= $this->input->post('nip');
		$password = $this->input->post('password');
		$login = $this->db->get_where('users', ['nip' => $nip])->row_array();
		if ($login) {
			if (password_verify($password, $login['password'])) {
				$data = [
					'status' => true,
					'id_level' => $login['id_level'],
					'nama' => $login['nama'],
					'nip' => $login['nip']
				];
				$this->session->set_userdata($data);
				redirect('', 'refresh');
			} else {
				echo "<script>alert('Login gagal,NIP atau Password salah')</script>";
				redirect('login', 'refresh');
			}
		} else {
			echo "<script>alert('Login gagal,NIP atau Password salah')</script>";
			redirect('login', 'refresh');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login', 'refresh');
	}

	function __construct()
	{
		parent::__construct();
		$this->default_template = 'templates/login';
		$this->load->model('loginModel', 'model');
		$this->load->library('plugin');
		$this->load->helper('url');

		$this->load->library('b_password');
	}
}
