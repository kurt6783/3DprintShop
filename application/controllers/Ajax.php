<?php
class AJAX extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function test(){
		$a = rand(0,100);
		echo $a;
	}

	public function datetime(){
		$this->load->helper('date');
		$a = unix_to_human(now('Asia/Taipei'),true,'eu');
		echo $a;
	}
}


?>