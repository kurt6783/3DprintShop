<?php
class Home extends CI_Controller{

	public function __construct(){
        parent::__construct(); 
        $this->load->helper('cookie');
        $this->load->helper('url');
        $this->load->model('Competence_model');        
    }

	public function index(){	
		$data['title'] = 'Welcome to home page';
		$data['userName'] = $this->Competence_model->get_userLogin();
		$this->load->view('header/header', $data);
		$this->load->view('home/home');
		$this->load->view('footer/footer');		
	}		
}