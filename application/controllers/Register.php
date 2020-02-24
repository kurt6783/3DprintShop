<?php
class Register extends CI_Controller{

	public function __construct(){
        parent::__construct(); 
        $this->load->model('Register_model');
        $this->load->helper('url');
    }

	public function index(){	
		$this->load->helper('form');
		$data['title'] = 'Register';	
		$data['userName'] = '';
		$this->load->view('header/header', $data);
		$this->load->view('register/register');
		$this->load->view('footer/footer');		
	}	

	public function create(){	
		$data['title'] = 'Register result';	
		$data['userName'] = '';
		try {
			$isDataComplete = $this->Register_model->check_isDataComplete();
			if($isDataComplete==false){
				throw new Exception('data is not complete');
			}
			$isUserExist = $this->Register_model->get_isUserExist();	
			if($isUserExist==true){
				throw new Exception('this account had been used');
			}
			$isPasswordLegal = $this->Register_model->check_isPasswordLegal();
			if($isPasswordLegal==false){
				throw new Exception('your password is not legal');
			}
			$createUser = $this->Register_model->set_createUser();
			if($createUser==true){
				$data['result'] = 'Register success';			
				$this->load->view('header/header', $data);
				$this->load->view('register/verification', $data);
				$this->load->view('footer/footer');
			}else{
				throw new Exception('Register failed');
			}		
		} catch (Exception $e) {
			$data['result'] = $e->getMessage();
			$this->load->view('header/header', $data);			
			$this->load->view('register/verification', $data);
			$this->load->view('footer/footer');
		}
	}	

	public function create_backup(){	
		$data['title'] = 'Register result';	
		$data['userName'] = '';
		//測試區
		//$data['result'] = $this->Register_model->show_input();	
		// $this->load->view('header/header', $data);			
		// //$this->load->view('register/show', $data);
		// //$this->load->view('footer/footer');
		// $this->load->helper('date');
		// // echo unix_to_human(time());
		// echo unix_to_human(now('Asia/Taipei'),true,'us');
		// echo unix_to_human(now('Asia/Taipei'),true,'eu');
		// return ;
		//測試區

		$isDataComplete = $this->Register_model->check_isDataComplete();
		if($isDataComplete==false){
			$data['result'] = 'data is not complete';
			$this->load->view('header/header', $data);			
			$this->load->view('register/verification', $data);
			$this->load->view('footer/footer');
			return;
		}
		$isUserExist = $this->Register_model->get_isUserExist();	
		if($isUserExist==true){
			$data['result'] = 'this account had been used';
			$this->load->view('header/header', $data);			
			$this->load->view('register/verification', $data);
			$this->load->view('footer/footer');
			return;
		}
		$isPasswordLegal = $this->Register_model->check_isPasswordLegal();
		if($isPasswordLegal==false){
			$data['result'] = 'your password is not legal';
			$this->load->view('header/header', $data);			
			$this->load->view('register/verification', $data);
			$this->load->view('footer/footer');
			return;
		}
		$createUser = $this->Register_model->set_createUser();
		if($createUser==true){
			$data['result'] = 'Register success';			
			$this->load->view('header/header', $data);
			$this->load->view('register/verification', $data);
			$this->load->view('footer/footer');
		}else{
			$data['result'] = 'Register failed';
			$this->load->view('header/header', $data);
			$this->load->view('register/verification', $data);
			$this->load->view('footer/footer');
		}		
	}	
}