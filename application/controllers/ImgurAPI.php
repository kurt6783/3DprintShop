<?php
class ImgurAPI extends CI_Controller {

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
		$data['title'] = "ImgurAPI串接，歡迎上傳圖片";
		$data['pictures'] = $this->Imgur_model->getImages();
		$this->load->view('header/header', $data);
		$this->load->view('imgurAPI/imgurAPI', $data);
		$this->load->view('footer/footer');		
	}
}
?>