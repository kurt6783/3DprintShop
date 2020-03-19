

<?php
class Imgur extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function upload(){
		$id = 'f39b3baaf0ed69d';
		// $token = '43083ef3aaa8405714f433b55e75d09ed4b51cc9';
		// $album = 
		echo $_FILES["pictureURL"]['name'];
		echo $_FILES["pictureURL"]['type'];
		echo $_FILES["pictureURL"]['size'];
		echo $_FILES["pictureURL"]['tmp_name'];
		move_uploaded_file($_FILES["pictureURL"]['tmp_name'], "C:\Users\D90-045\Desktop/".$_FILES["pictureURL"]['name']);
	}

	public function test(){
		$client_id="f39b3baaf0ed69d";
		$image = 'C:\Users\D90-045\Desktop\dinasour2.jpg';
		$imageHandle = fopen($image, "r");
		$image = base64_encode(fread($imageHandle, filesize($image)));
		$curl_post_array = [
		  	'image' => $image,
		  	'title' => '123',
		];
		$timeout = 30;
		 
		$curl = curl_init();
		 curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
		 curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
		 curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
		 curl_setopt($curl, CURLOPT_POST, 1);
		 curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		 curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_array);
		 $curl_result = curl_exec($curl);
		 curl_close ($curl);
		 $Received_JsonParse = json_decode($curl_result,true);

		 if ($Received_JsonParse['success'] = true) {
		  $ImgURL = $Received_JsonParse['data']['link'];
		  echo "Uploaded<br/><br/><img src='".$ImgURL."'/>";
		 } else {
		  echo "Error<br/><br/>".$Received_JsonParse['data']['error'];
		 };
	}

	public function test2(){
		$client_id="f39b3baaf0ed69d";
		$image = 'C:\Users\D90-045\Desktop\dinasour2.jpg';
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
}
?>