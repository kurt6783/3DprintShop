<div class="container">
	<div class="page-header">
		<h1><?php echo $title ?></h1>
	</div>
</div>
<?php echo form_open('register/create') ?>
<div class="container">
	<div class="form-group">
	    <label for="name">Your name</label>
	    <input type="name" class="form-control" name="name" placeholder="Eric">	    
  	</div>
  	<div class="form-group">
	    <label for="identityCard">IdentityCard</label>
	    <input type="name" class="form-control" name="identityCard" placeholder="A123456789">    
  	</div>
	<div class="form-group">
	    <label for="email">Email address</label>
	    <input class="form-control" name="email" aria-describedby="emailHelp" placeholder="exam@gmail.com">	    
  	</div>
  	<div class="form-group">
		<label for="account">Account</label>
	    <input class="form-control" name="account" placeholder="at least 8 char">
	</div>
	<div class="form-group">
		<label for="password">Password</label>
	    <input type="password" class="form-control" name="password" placeholder="at least 8 char">
	</div>
	<div class="form-group">
		<label for="password">PasswordConfirm</label>
	    <input type="password" class="form-control" name="passwordConfirm" placeholder="at least 8 char">
	</div>
	<div class="form-group">
		<label for="phoneNumber">Phone number</label>
	    <input class="form-control" name="phoneNumber" placeholder="09xxxxxxxx">
	</div>
	<div class="form-group">
		<label for="birthday">birthday</label>
	    <input class="form-control" name="birthday" placeholder="1992-09-29">
	</div>	  	  	 	  	  
  	<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>