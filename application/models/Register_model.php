<?php
class Register_model extends CI_Model{

	public function __construct(){
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('date');
	}	

	public function createUser(){
		$this->load->helper('security');
		$this->load->helper('string');
		$data = array(
			'name' => $this->input->post('name'),
			'identityCard' => $this->input->post('identityCard'),
			'email' => $this->input->post('email'),
			'account' => $this->input->post('account'),
			'password' => do_hash($this->input->post('password'),'MD5'),
			'phoneNumber' => $this->input->post('phoneNumber'),
			'verificationCode'=> random_string('alnum',20),
			'level' => 1,
			'birthday' => $this->input->post('birthday'),
			'setDate' => unix_to_human(now('Asia/Taipei'),true,'eu'),
		);
		return $this->db->insert('users',$data);
	}

	public function isUserExist(){
		$data = array('account' => $this->input->post('account'));
		$query = $this->db->get_where('users',$data)->result_array();
		if(count($query)==0){
			return false;
		}else{
			return true;
		}
	}

	public function verificationCodeByAccount(){
		
	}

	public function isDataComplete(){
		$datas=$this->input->post();
		foreach($datas as $data){
			if(strlen($data)==0){
				return false;
			}
		}
		return true;
	}

	public function isPasswordLegal(){
		$password = $this->input->post('password');
		$passwordConfirm = $this->input->post('passwordConfirm');
		if($password==$passwordConfirm){
			return true;
		}else{
			return false;
		}
	}
}