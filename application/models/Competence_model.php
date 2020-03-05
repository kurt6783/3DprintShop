<?php
class Competence_model extends CI_Model{

	public function __construct(){
		$this->load->database();		
	}

	public function getUserDataByAccount($account){
		$data = array(
			'account' => $account
		);
		return $query = $this->db->get_where('users', $data)->result_array()[0];
	}

	public function getUserDataByPOST(){
		$this->load->helper('url');	
		$data = array(
			'account' => $this->input->post("account")
		);
		return $query = $this->db->get_where('users', $data)->result_array()[0];
	}

	public function isLoginCorrect(){
		$this->load->helper('cookie');
		$this->load->helper('url');
		$this->load->helper('security');
		$data = array(
			'account' => $this->input->POST('account')
		);
		$query = $this->db->get_where('users', $data)->result_array();		
		if(empty($query)){				
			return false ;
		}elseif($query[0]['password'] == do_hash($this->input->POST('password'),"MD5")){
			$cookie = array(
			'name' => 'loginStatus',
			'value' => 'success',
			'expire' => 86400
			);
			$this->input->set_cookie($cookie);
			$cookie = array(
				'name' => 'name',
				'value' => $query[0]['name'],
				'expire' => 86400
			);
			$this->input->set_cookie($cookie);
			$cookie = array(
				'name' => 'account',
				'value' => $query[0]['account'],
				'expire' => 86400
			);
			$this->input->set_cookie($cookie);			
			return true;
		}else{
			return false;
		}		
	}

	public function isCookieExist(){
		$this->load->helper('cookie');
		if(!is_null(get_cookie("account")) AND !is_null(get_cookie("name"))){
			return true;
		}else{
			return false;
		}
	}

	public function getUserDataByCookie(){
		$userData = array(
			'name' => get_cookie("name"),
			'account' => get_cookie("account")
		);		
		return $userData;
	}

	public function isLoginOut(){
		$this->load->helper('cookie');
		delete_cookie("name");
		delete_cookie("loginStatus");
		delete_cookie("account");
		return true;
	}



	// public function userLogin(){
	// 	$userName = $this->input->cookie("userName");
	// 	if(strlen($userName) != 0 AND $this->input->cookie("loginStatus") =="success"){
	// 		return $userName;
	// 	}else{
	// 		return "Register";
	// 	}
	// }

	// public function logOut(){
	// 	delete_cookie("userName");
	// 	delete_cookie("loginStatus");
	// }
	
	// public function isLoginLegal($account='',$password=''){
	// 	$data = array(
	// 		'account' => $account,
	// 		'password' => $password
	// 	);
	// 	$query = $this->db->get_where('users',$data)->result_array();
	// 	if(count($query)==0){
	// 		return false;
	// 	}else{
	// 		$cookie = array(
	// 			'name' => 'loginStatus',
	// 			'value' => 'success',
	// 			'expire' => 86400
	// 		);
	// 		$this->input->set_cookie($cookie);
	// 		$cookie = array(
	// 			'name' => 'userName',
	// 			'value' => $query[0]["name"],
	// 			'expire' => 86400
	// 		);
	// 		$this->input->set_cookie($cookie);
	// 		return true;
	// 	}
	// }	
}