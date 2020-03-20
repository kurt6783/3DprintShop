<?php
class Home extends CI_Controller{

	public function __construct(){
        parent::__construct();        
    }

	public function index(){
		$this->load->model('Competence_model');	
		$isCookieExist = $this->Competence_model->isCookieExist();
		if($isCookieExist == true){			
			$data['loginStatus'] = true;
		}else{
			$data['loginStatus'] = false;
		}
		$data['userData'] = $this->Competence_model->getUserDataByCookie();
		$data['title'] = "Welcome to 3DprintShop.";
		$this->load->view('header/header', $data);
		$this->load->view('home/home', $data);
		$this->load->view('footer/footer');		
	}

	public function picture(){
		$this->load->model('Imgur_model');
		$this->Imgur_model->postImage();
	}
}