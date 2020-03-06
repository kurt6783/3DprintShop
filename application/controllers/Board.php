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
		$data['loginStatus'] = false;
    	$data['title'] = "messageBoard";
    	$data['result'] = "";
        $data['messages'] = $this->Message_model->getMessage();
    	$this->load->view('header/header', $data);
		$this->load->view('board/board', $data);
		$this->load->view('footer/footer');			
    }

    public function addMSG(){


        $data['loginStatus'] = false;
        $data['title'] = "messageBoard";
        $data['result'] = "";
        $data['messages'] = $this->Message_model->getMessage();
        $this->load->view('header/header',$data);
        $this->load->view('board/board',$data);
        $this->load->view('footer/footer');        
    }  
}