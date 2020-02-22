<?php
class Competence_model extends CI_Model{

	public function __construct(){
		$this->load->database();
		$this->load->helper('url');	
	}
	
	public function check_isLoginLegal($account='',$password=''){
		$this->load->helper('cookie');

		$data = array(
			'account' => $account,
			'password' => $password
		);
		$query = $this->db->get_where('users',$data)->result_array();
		if(count($query)==0){
			return false;
		}else{
			$cookie = array(
				'name' => 'loginStatus',
				'value' => 'success',
				'expire' => 86400
			);
			$this->input->set_cookie($cookie);
			$cookie = array(
				'name' => 'userName',
				'value' => $query[0]["name"],
				'expire' => 86400
			);
			$this->input->set_cookie($cookie);
			return true;
		}
	}	
}