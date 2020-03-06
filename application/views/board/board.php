<?php 
// $api = curl_init();
// $data=array(
// 	'username' => "kurt6783",
// 	'password' => "you25183",
// 	'dstaddr' => "0911245920",
// 	'smbody' =>iconv("UTF-8","big5//TRANSLIT","test")
// );
// $querystring = http_build_query($data);
// curl_setopt($api,CURLOPT_URL,"https://api.kotsms.com.tw/kotsmsapi-1.php?".$querystring);
// curl_setopt($api,CURLOPT_URL,"http://httpbin.org/ip");

// curl_exec($api);
// curl_close($api);
?>

<div class="container">
	<div class="page-header">
		<h1><?php echo $title ?></h1>
	</div>
</div>

<div class="container">
	<!-- <?php var_dump($messages); ?> -->
	<?php foreach ($messages as $message){ ?>
		<div class="form-group">
			<label><?php echo $message['id'] . " "; ?></label>
			<label><?php echo $message['name'] . " "; ?></label>
			<label><?php echo $message['content'] . " "; ?></label>
			<label><?php echo $message['datetime']; ?></label>
		</div>		
	<?php } ?>
</div>

<?php echo form_open('board/addMSG') ?>
<div class="container">
	<div class="form-group">
		<label for="content">message:</label>
		<input type="message" name="message" placeholder="message">
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>	
</div>
</form>