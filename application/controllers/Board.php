<?php
class Board extends CI_Controller{

	public function __construct(){
        parent::__construct();         
    }

    public function index(){
        $this->load->helper('form');
		$data['loginStatus'] = false;
    	$data['title'] = "messageBoard";
    	$data['result'] = "";
    	$this->load->view('header/header', $data);
		$this->load->view('board/board', $data);
		$this->load->view('footer/footer');			
    }

    public function addMSG(){
        $this->load->helper('form');
        $data['loginStatus'] = false;
        $data['title'] = "messageBoard";
        $data['result'] = "";
        $this->load->view('header/header',$data);
        $this->load->view('board/board',$data);
        $this->load->view('footer/footer');        
    }  
}