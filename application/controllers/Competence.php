<?php
class Competence extends CI_Controller{

	public function __construct(){
        parent::__construct();         
    }

    public function index(){
    	$this->load->helper('form');
    	$data['loginStatus'] = false;
    	$data['title'] = "Login";
    	$data['result'] = "";
    	$this->load->view('header/header', $data);
		$this->load->view('competence/login', $data);
		$this->load->view('footer/footer');			
    }

    public function logIn(){
    	$this->load->model('Competence_model');
    	$loginStatus = $this->Competence_model->isLoginCorrect();
    	if($loginStatus == true){  
    		$data['loginStatus'] = true;
	    	$data['title'] = "Login result";    	
	    	$data['userData'] = $this->Competence_model->getUserDataByPOST();
	    	$this->load->view('header/header', $data);
			$this->load->view('competence/result', $data);
			$this->load->view('footer/footer');			
    	}else{
    		$data['loginStatus'] = false;
	    	$data['title'] = "Login result"; 	
	    	$data['userData'] = $this->Competence_model->getUserDataByCookie();
	    	$this->load->view('header/header', $data);
			$this->load->view('competence/result', $data);
			$this->load->view('footer/footer');		
    	}    		
    }

    public function logOut(){
    	$this->load->model('Competence_model');
    	$isLoginOut = $this->Competence_model->isLoginOut();    	
		if($isLoginOut == true){			
			$data['loginStatus'] = false;
		}else{
			$data['loginStatus'] = true;
		}
		$data['userData'] = $this->Competence_model->getUserDataByCookie();
		$data['title'] = "Welcome to 3DprintShop.";
		$this->load->view('header/header', $data);
		$this->load->view('home/home', $data);
		$this->load->view('footer/footer');		
    }

    public function user($userAccount=''){
    	$this->load->model('Competence_model');
    	$data['loginStatus'] = true;
    	$data['title'] = "Your data";
    	$data['userData'] = $this->Competence_model->getUserDataByAccount($userAccount);
    	$this->load->view('header/header', $data);
		$this->load->view('competence/userData', $data);
		$this->load->view('footer/footer');	
    }

	// public function index(){	
	// 	$data['title'] = 'Login';
	// 	$data['userName'] = '';
	// 	$this->load->view('header/header', $data);
	// 	$this->load->view('competence/login');
	// 	$this->load->view('footer/footer');		
	// }

	// public function userData(){
	// 	$data['title'] = 'Your data';
	// 	$this->Competence_model->logOut();
	// 	$this->load->view('header/header', $data);
	// 	$this->load->view('competence/userData' ,$data);
	// 	$this->load->view('footer/footer');		
	// }

	// public function logOut(){
	// 	$data['title'] = 'LogOut';
	// 	$data['userName'] = '';
	// 	$this->Competence_model->logOut();
	// 	$this->load->view('header/header', $data);
	// 	$this->load->view('home/home');
	// 	$this->load->view('footer/footer');		
	// }

	// public function logIn(){
	// 	$this->load->helper('security');
	// 	$isLoginLegal = $this->Competence_model->isLoginLegal($this->input->post('account'),do_hash($this->input->post('password'),'MD5'));
	// 	if($isLoginLegal==false){
	// 		$data['title'] = 'Login failed';	
	// 		$data['userName'] = '';
	// 		$this->load->view('header/header', $data);
	// 		$this->load->view('competence/login');
	// 		$this->load->view('footer/footer');
	// 	}else{
	// 		$data['title'] = 'Hello';
	// 		$data['userName'] = 'kurt';
	// 		$this->load->view('header/header', $data);
	// 		$this->load->view('home/home');
	// 		$this->load->view('footer/footer');
	// 	}
	// }	
}