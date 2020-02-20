<?php
class Register extends CI_Controller{

	public function __construct(){
        parent::__construct();        
        $this->load->helper('url');
    }

	public function index(){	
		$this->load->helper('form');
		$data['title'] = 'Register';	
		$this->load->view('header/header', $data);
		$this->load->view('register/register');
		$this->load->view('footer/footer');		
	}	

	public function create(){
		$this->load->view('header/header', $data);
		$this->load->view('footer/footer');		
	}	
}