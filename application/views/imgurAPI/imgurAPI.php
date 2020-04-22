<div class="container">
	<div class="page-header">
		<h1><?php echo $title ?></h1>
	</div>
</div>

<div class="container">
	<div class="page-header">
		<h1>picture practice</h1>
		<p>串接imgur圖床API完成上傳圖片功能</p>
		<form action="Home/picture" method="POST" enctype="multipart/form-data">
			<div class="form-group">				
				<input type="file" name="pictureURL">
			</div>
			<div class="form-group">
				<label for="pictureName">picture name : </label>
				<input type="text" name="pictureName">
			</div>
			<div class="form-group">
				<label for="pictureDescription">picture description : </label>
				<input type="text" name="pictureDescription">
			</div>
			<div class="form-group">
				<button type="submit">submit</button>
			</div>
		</form>	
	</div>	
</div>

<div class="container">
	<p>串接imgur圖床API完成下載並顯示圖片功能</p>
	<div class="page-header">		
		<?php foreach (json_decode($pictures,true)['data'] as $picture ) { ?>
				<img src="<?php echo $picture['link'] ?>" width="100px" height="100px">
		<?php }?>
		<!-- <img src="<?php echo (json_decode($pictures, true)['data'][0]['link']);?>" width="30%" height="30%"> -->
	</div>	
</div>