<?php echo form_open('register/create') ?>
<div class="container">
	<div class="form-group">
	    <label for="name">Your name</label>
	    <input type="name" class="form-control" id="name" aria-describedby="emailHelp">	    
  	</div>
	<div class="form-group">
	    <label for="email">Email address</label>
	    <input class="form-control" id="email" aria-describedby="emailHelp" placeholder="exam@gmail.com">	    
  	</div>
	<div class="form-group">
		<label for="password">Password</label>
	    <input type="password" class="form-control" id="password">
	</div>
	<div class="form-group">
		<label for="password">PasswordConfirm</label>
	    <input type="password" class="form-control" id="PasswordConfirm">
	</div>
	<div class="form-group">
		<label for="phoneNumber">Phone number</label>
	    <input class="form-control" id="phoneNumber">
	</div>	  	 	  	  
  	<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>