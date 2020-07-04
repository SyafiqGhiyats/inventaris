<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Render_Controller.php';

class Test extends Render_Controller
{
    public function index()
    {
        echo  date('Y-d', time());
    }
}
