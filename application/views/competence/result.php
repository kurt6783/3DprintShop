<div class="container">
	<div class="page-header">
		<h1><?php echo $title ?></h1>
	</div>
</div>
<div class="container">
	<div class="form-group">		
		<?php if(is_null($userData['name'])){ ?>
			<p>Login failed</p>
		<?php }else{ ?>
			<p>Hello <?php echo $userData['name'] ?></p>
		<?php } ?>
	</div>
</div>