
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting
{

	public function index()
	{
		$return = array(
			'app_title' => 'Sistem Inventaris',
			'app_name'	=> 'Sistem Inventaris'
		);
		return $return;
	}
}
