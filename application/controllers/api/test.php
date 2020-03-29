<?php
class test extends CI_Controller{

	public function __construct(){
        parent::__construct();           
    }

    public function test(){
    	$result = array(
    		"status"	=> "",
    		"data"		=> "",
    		"errormsg"	=> ""
    	);
    	if($_SERVER['REQUEST_METHOD'] == 'GET'){
    		$result["status"] = true;
    		$result["data"] = array(
    							"name" => "kurt",
    							"type" => "1"
    						);
			echo json_encode($result);
    	}else{
    		$result["status"] = false;
    		$result["errormsg"] = "呼叫方法錯誤";
    		echo json_encode($result);
    	}
    }


}
?>