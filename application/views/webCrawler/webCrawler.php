<div class="container">
	<div class="page-header">
		<h1><?php echo $title ?></h1>
	</div>
</div>

<div class="container">
	<div class= "page-header">
		<p>爬蟲練習</p>
		<?php 
		// var_dump($bug); 
			foreach ($bug as $value) {
				echo $value."<br>";
			}
		?>
	</div>	
</div>
