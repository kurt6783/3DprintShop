<?php
class Competence extends CI_Controller{

	public function __construct(){
        parent::__construct(); 
        $this->load->model('Competence_model');
        $this->load->helper('url');
        $this->load->helper('form');
    }

	public function index(){	
		$data['title'] = 'Login';
		$data['userName'] = '';
		$this->load->view('header/header', $data);
		$this->load->view('competence/login');
		$this->load->view('footer/footer');		
	}

	public function logOut(){
		$data['title'] = 'LogOut';
		$data['userName'] = '';
		$this->Competence_model->set_logOut();
		$this->load->view('header/header', $data);
		$this->load->view('home/home');
		$this->load->view('footer/footer');		
	}

	public function logIn(){
		$this->load->helper('security');
		$isLoginLegal = $this->Competence_model->check_isLoginLegal($this->input->post('account'),do_hash($this->input->post('password'),'MD5'));
		if($isLoginLegal==false){
			$data['title'] = 'Login failed';	
			$data['userName'] = '';
			$this->load->view('header/header', $data);
			$this->load->view('competence/login');
			$this->load->view('footer/footer');
		}else{
			$data['title'] = 'Hello';
			$data['userName'] = 'kurt';
			$this->load->view('header/header', $data);
			$this->load->view('home/home');
			$this->load->view('footer/footer');
		}
	}	
}