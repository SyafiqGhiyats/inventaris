<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model {

	public function getProfile($user_id){
		$where = array(
			'user_id' => $user_id
		);
		$query = $this->db->get_where('users',$where)->result_array();
		return $query;
	}
	
	public function getProfileMobile($email){
		$where = array(
			'user_email' => $email
		);
		$query = $this->db->get_where('users',$where)->result_array();
		return $query;
	}


	public function lupaPassword($email){
		$get = $this->db->select('*')
						 ->where('a.user_email',$email)
						 ->get('users a')
						 ->row_array();
		return $get;
	}

}
