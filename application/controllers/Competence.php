<?php
class Competence extends CI_Controller{

	public function __construct(){
        parent::__construct(); 
        $this->load->model('Competence_model');
        $this->load->helper('url');
    }

	public function index(){	
		$this->load->helper('form');
		$data['title'] = 'Login';	
		$this->load->view('header/header', $data);
		$this->load->view('competence/login');
		$this->load->view('footer/footer');		
	}	
}