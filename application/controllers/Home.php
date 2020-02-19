<?php
class Home extends CI_Controller{
	public function index(){	
		$data['title'] = 'Welcome to home page';	
		$this->load->view('header/header', $data);
		$this->load->view('home/home');
		$this->load->view('footer/footer');		
	}		
}