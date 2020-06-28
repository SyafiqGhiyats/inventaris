<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send_email {
	function send($email,$password=null){
		$config = Array(
	    'protocol' => 'POP3',
	    'smtp_host' => '',
	    'smtp_port' => 995,
	    'smtp_user' => '',
	    'smtp_pass' => '',
	    'mailtype'  => 'html', 
	    'charset'   => 'iso-8859-1'
		);
		$this->CI = &get_instance();
		$this->CI->load->library('email', $config);
		$this->CI->email->set_newline("\r\n");

		// Set to, from, message, etc.	
		$this->CI->email->initialize($config);

    $this->CI->email->from('', '');
    $this->CI->email->to($email); 

    $this->CI->email->subject('Lupa Password || ');
    // '.base_url().'home/aktivasi
    // $link = "http://localhost/siap/lupaPassword/".$email."1/";
    $this->CI->email->message('Terimakasih sudah melakukan Lupa Password di .. <br> Email : '.$email.' <br> Passoword : '.$password.'');  
		$result = $this->CI->email->send();
		return $result;
	}
}
