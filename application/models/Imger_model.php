<?php
// "Authorization: Bearer 43083ef3aaa8405714f433b55e75d09ed4b51cc9"
// "Authorization: Client-ID f39b3baaf0ed69d"
class Imgur_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	//finish
	public function test(){
		$client_id="f39b3baaf0ed69d";
		// $image = 'C:\Users\D90-045\Desktop\dinasour2.jpg';
		$image = $_FILES["pictureURL"]['tmp_name'] ;
		$imageHandle = fopen($image, "r");
		$image = base64_encode(fread($imageHandle, filesize($image)));
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.imgur.com/3/image",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => array('image' => $image),
		  CURLOPT_HTTPHEADER => array("Authorization: Bearer 43083ef3aaa8405714f433b55e75d09ed4b51cc9"
		  ),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		echo $response;
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
				"title" => 'testimage',
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
	public function getImages(){
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.imgur.com/3/account/kurt6783/images/0",
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
}
?>