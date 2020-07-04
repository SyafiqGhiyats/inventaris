
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting
{

	public function index()
	{
		$return = array(
			'app_title' => 'Engineering Inventory',
			'app_name'	=> 'Engineering Inventory'
		);
		return $return;
	}
}
