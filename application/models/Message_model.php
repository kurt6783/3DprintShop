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

	public function setMessage($user,$message){
		$this->load->helper('date');
		$data = array(
			'user_id' => $user['id'],
			'content' => $message['content'],
			'datetime' => unix_to_human(now('Asia/Taipei'),true,'eu')			
		);
		return $this->db->insert('message',$data);
	}
}