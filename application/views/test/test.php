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
				<img src="<?php echo $picture['link'] ?>" width="30%" height="30%">
		<?php }?>
		<!-- <img src="<?php echo (json_decode($pictures, true)['data'][0]['link']);?>" width="30%" height="30%"> -->
	</div>
	
</div>

<div class="container">
	<div class="page-header">
		<h1>AJAX practice</h1>
		<p>利用AJAX向後端隨機取0-100數字</p>
		<h2 id="div1">AJAX</h2>
		<button id = "submit">Submit</button>
		<script>	
			$("#submit").click(function(){
				$.ajax({url:"Ajax/test",
					success:function(result){$("#div1").html(result);console.log(result);},
					error:function(){$("#div1").html("error");}
				});
			});
		</script>

		<script >
			setInterval(function(){
				$.ajax({url:"Ajax/test",
					success:function(result){$("#div1").html(result);console.log(result);},
					error:function(){$("#div1").html("error");}
				});
			},1000);
		</script>
	</div>	
</div>