<div class="container">
	<div class="page-header">
		<h1><?php echo $title ?></h1>
	</div>
</div>

<div class="container">
	<div class="page-header">
		<h1>picture practice</h1>
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
		<h2 id="div1">AJAX</h2>
		<button id = "submit">Submit</button>
		<script>	
			$("#submit").click(function(){
				$.ajax({url:"AJAX/test",
					success:function(result){$("#div1").html(result);console.log(result);},
					error:function(){$("#div1").html("error");}
				});
			});
		</script>

		<script >
			setInterval(function(){
				$.ajax({url:"AJAX/test",
					success:function(result){$("#div1").html(result);console.log(result);},
					error:function(){$("#div1").html("error");}
				});
			},1000);
		</script>
	</div>	
</div>