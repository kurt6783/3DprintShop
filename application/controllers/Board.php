<?php
class Board extends CI_Controller{

	public function __construct(){
        parent::__construct();
        $this->load->helper('form'); 
        $this->load->helper('url'); 
        $this->load->helper('cookie'); 
        $this->load->model('Message_model'); 
        $this->load->model('Competence_model');        
    }

    public function index(){
        $isCookieExist = $this->Competence_model->isCookieExist();
        if($isCookieExist == true){         
            $data['loginStatus'] = true;
        }else{
            $data['loginStatus'] = false;
        }
		// $data['loginStatus'] = true;
    	$data['title'] = "messageBoard";
        $data['paragraph'] = "";
    	$data['result'] = "";
        $data['userData'] = $this->Competence_model->getUserDataByCookie();
        $data['messages'] = $this->Message_model->getMessage();
    	$this->load->view('header/header', $data);
		$this->load->view('board/board', $data);
		$this->load->view('footer/footer');			
    }

    public function addMSG(){
        $loginStatus = $this->Competence_model->isCookieExist();
        if($loginStatus == false){ 
            $data['loginStatus'] = $loginStatus;
            $data['title'] = "messageBoard";
            $data['paragraph'] = "請先登入";
            $data['result'] = "";
            $data['userData'] = $this->Competence_model->getUserDataByCookie();
            $data['messages'] = $this->Message_model->getMessage();
            $this->load->view('header/header',$data);
            $this->load->view('board/board',$data);
            $this->load->view('footer/footer');        
        }else{
            $user = $this->Competence_model->getUserDataByCookie();
            $this->Message_model->setMessage($user);
            $data['loginStatus'] = $loginStatus;
            $data['title'] = "messageBoard";
            $data['paragraph'] = "成功";
            $data['result'] = "";
            $data['userData'] = $this->Competence_model->getUserDataByCookie();
            $data['messages'] = $this->Message_model->getMessage();
            $this->load->view('header/header',$data);
            $this->load->view('board/board',$data);
            $this->load->view('footer/footer');        
        }           
    }  
}
?>