<?php echo form_open('register/create') ?>
<div class="container">
	<div class="form-group">
	    <label for="name">Your name</label>
	    <input type="name" class="form-control" name="name" placeholder="Eric">	    
  	</div>
  	<div class="form-group">
	    <label for="identity_card">Identity_card</label>
	    <input type="name" class="form-control" name="identity_card" placeholder="A123456789">    
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
	    <input type="password" class="form-control" name="PasswordConfirm"placeholder="at least 8 char">
	</div>
	<div class="form-group">
		<label for="phoneNumber">Phone number</label>
	    <input class="form-control" name="phoneNumber" placeholder="09xxxxxxxx">
	</div>	  	 	  	  
  	<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>