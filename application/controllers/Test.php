<?php
class Test extends CI_Controller {

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
		$data['userData'] = $this->Competence_model->getUserDataByCookie();
		$data['title'] = "這個頁面是用來測試功能用的";
		$data['pictures'] = $this->Imgur_model->getImages();		
		$this->load->view('header/header', $data);
		$this->load->view('test/test', $data);
		$this->load->view('footer/footer');		
	}

}
?>