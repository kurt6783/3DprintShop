<?php
class webCrawler extends CI_Controller {

	public function __construct(){
        parent::__construct();        
    }
    public function index(){
    	$this->load->model('Competence_model');	
		$this->load->model('Imgur_model');		
    	$isCookieExist = $this->Competence_model->isCookieExist();
		if($isCookieExist == true){			
			$data['loginStatus'] = true;
		}else{
			$data['loginStatus'] = false;
		}
		$data['title'] = "每日爬星座解析";
		$data['userData'] = $this->Competence_model->getUserDataByCookie();
		$data['bug'] = $this->Imgur_model->test();
		$this->load->view('header/header', $data);
		$this->load->view('webCrawler/webCrawler', $data);
		$this->load->view('footer/footer');		
    }


}
?>