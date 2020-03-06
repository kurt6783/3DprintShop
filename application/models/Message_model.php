<?php
class Message_model extends CI_model{

	public function __construct(){
		$this->load->database();
	}

	public function getMessage(){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('message','users.id = message.user_id');
		// $query = $this->db->get('message')->result_array();	
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function setMessage($user){		
		$this->load->helper('url');
		$this->load->helper('date');
		$arr=array(
			'account' => $user['account']
		);
		$query = $this->db->get_where('users',$arr)->result_array()[0];
		$data = array(
			'user_id' => $query['id'],
			'content' => $this->input->POST('message'),
			'datetime' => unix_to_human(now('Asia/Taipei'),true,'eu')			
		);
		return $this->db->insert('message',$data);
	}
}