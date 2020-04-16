<div class="container">
	<div class="page-header">
		<h1><?php echo $title ?></h1>
	</div>
</div>
<div class="container">
	<div class="form-group">
		<p><?php echo $result ?></p>
	</div>
</div>
<?php echo form_open('/competence/login') ?>
<div class="container">
	<div class="form-group">
		<label for="account">Account</label>
	    <input class="form-control" name="account">
	</div>
	<div class="form-group">
		<label for="password">Password</label>
	    <input type="password" class="form-control" name="password">
	</div>	  	 	  	  
  	<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>