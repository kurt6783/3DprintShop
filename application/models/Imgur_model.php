<?php
// "Authorization: Bearer 43083ef3aaa8405714f433b55e75d09ed4b51cc9"
// "Authorization: Client-ID f39b3baaf0ed69d"
class Imgur_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	//finish
	public function test(){
		$this->load->helper('date');	
		$arr = array();
        for ($i=0; $i <12 ; $i++) { 
            $url = 'http://astro.click108.com.tw/daily_'.$i.'.php?iAstro='.$i;
            $lines_array = file($url);
            foreach ($lines_array as $data) {
                if(strstr($data,'今日') and strstr($data,'解析')){
                    array_push($arr,mb_substr(trim(strip_tags($data)),2,3,"utf-8"));
                }elseif(strstr($data,'整體運勢')){
                    array_push($arr,trim(strip_tags($data)));
                }elseif(strstr($data,'愛情運勢')){
                    array_push($arr,trim(strip_tags($data)));
                }elseif(strstr($data,'事業運勢')){
                    array_push($arr,trim(strip_tags($data)));
                }elseif(strstr($data,'財運運勢')){
                    array_push($arr,trim(strip_tags($data)));
                }
            }
            array_push($arr,unix_to_human(now('Asia/Taipei'),true,'eu'));                
        }
   		return $arr;	
	}

	//finish
	public function postToLocal(){
		echo $_FILES["pictureURL"]['name'] ."<br>";
		echo $_FILES["pictureURL"]['type'] ."<br>";
		echo $_FILES["pictureURL"]['size'] ."<br>";
		echo $_FILES["pictureURL"]['tmp_name'] ."<br>";
		move_uploaded_file($_FILES["pictureURL"]['tmp_name'], "C:\Users\D90-045\Desktop/".$_FILES["pictureURL"]['name']);
	}

	//finish
	public function postAlbum(){
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.imgur.com/3/album",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => array(
				"title" => 'testalbum',
				"description" => "test",
			),
			CURLOPT_HTTPHEADER => array(
		    	"Authorization: Bearer 43083ef3aaa8405714f433b55e75d09ed4b51cc9"
		  	),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		echo $response;
	}
	
	//finish
	public function getAlbums(){
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.imgur.com/3/account/kurt6783/albums/0",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
		    	"Authorization: Bearer 43083ef3aaa8405714f433b55e75d09ed4b51cc9"
		  	),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		echo $response;
	}

	//finish
	public function deleteAlbum(){
		$curl = curl_init();
		$albumID = "oq3F8ev";
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.imgur.com/3/account/kurt6783/album/$albumID",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "DELETE",
			CURLOPT_HTTPHEADER => array(
		    	"Authorization: Bearer 43083ef3aaa8405714f433b55e75d09ed4b51cc9"
		  	),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		echo $response;
	}

	//finish
	public function postImage(){
		$curl = curl_init();
		$image = $_FILES["pictureURL"]['tmp_name'] ;
		$imageHandle = fopen($image, "r");
		$image = base64_encode(fread($imageHandle, filesize($image)));
		$title = $_POST['pictureName'];
		$description = $_POST['pictureDescription'];
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.imgur.com/3/image",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => array(
				"image" => $image,
				"title" => $title,
				"description" => $description,
			),
			CURLOPT_HTTPHEADER => array(
		    	"Authorization: Bearer 43083ef3aaa8405714f433b55e75d09ed4b51cc9"
		  	),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		echo $response;
	}

	//finish
	public function getImages(){
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.imgur.com/3/account/kurt6783/images/0",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 10,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
		    	"Authorization: Bearer 43083ef3aaa8405714f433b55e75d09ed4b51cc9"
		  	),
		));
		$response = curl_exec($curl);
		curl_close($curl);		
		return $response;	

		// $curl = curl_init();

		// curl_setopt_array($curl, array(
		//   CURLOPT_URL => "http://astro.click108.com.tw/daily_10.php?iAstro=10",
		//   CURLOPT_RETURNTRANSFER => true,
		//   CURLOPT_ENCODING => "",
		//   CURLOPT_MAXREDIRS => 10,
		//   CURLOPT_TIMEOUT => 0,
		//   CURLOPT_FOLLOWLOCATION => true,
		//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		//   CURLOPT_CUSTOMREQUEST => "GET",
		//   CURLOPT_HTTPHEADER => array(
		//     "Cookie: agreeGdprPop=1; PHPSESSID=83632a7a418641a23ab40851070f8b9d; FRIST_HTTP_HOST=astro.click108.com.tw"
		//   ),
		// ));

		// $response = curl_exec($curl);

		// curl_close($curl);
		// echo $response;

		// $url = "http://astro.click108.com.tw/daily_10.php?iAstro=10"; 
		// $ch = curl_init();		 
		// curl_setopt($ch, CURLOPT_URL, $url);
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// $output = curl_exec($ch);		 
		// curl_close($ch);		 
		// return $output;	

		// $url = "http://astro.click108.com.tw/daily_10.php?iAstro=10";
		// return file_get_contents($url);
	}
}
?>