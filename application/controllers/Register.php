<?php
class Register extends CI_Controller{

	public function __construct(){
        parent::__construct();           
    }

	public function index(){	
		$this->load->helper('form');
		$data['loginStatus'] = false;
		$data['title'] = 'Register';		
		$this->load->view('header/header', $data);
		$this->load->view('register/register', $data);
		$this->load->view('footer/footer');		
	}

	public function create(){	
		$this->load->model('Register_model');
		$this->load->helper('url');
		$data['title'] = 'Register result';	
		$data['loginStatus'] = false;		
		try {
			$isDataComplete = $this->Register_model->isDataComplete();
			if($isDataComplete==false){
				throw new Exception('data is not complete');
			}
			$isUserExist = $this->Register_model->isUserExist();	
			if($isUserExist==true){
				throw new Exception('this account had been used');
			}
			$isPasswordLegal = $this->Register_model->isPasswordLegal();
			if($isPasswordLegal==false){
				throw new Exception('your password is not identical');
			}
			$createUser = $this->Register_model->createUser();
			if($createUser==true){
				$data['title'] = 'Register success';
				$data['result'] = 'Welcome to join us';			
				$this->load->view('header/header', $data);
				$this->load->view('register/result', $data);
				$this->load->view('footer/footer');
			}else{
				throw new Exception('Register failed');
			}		
		} catch (Exception $e) {
			$data['title'] = "Register failed";
			$data['result'] = $e->getMessage();
			$this->load->view('header/header', $data);			
			$this->load->view('register/result', $data);
			$this->load->view('footer/footer');
		}
	}
}