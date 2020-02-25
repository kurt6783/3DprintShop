<!DOCTYPE html>
<html>
<head>
	<title>3DprintShop</title>
	<link rel="icon" type="image/x-icon" href="https://s2.coinmarketcap.com/static/img/coins/200x200/2099.png?_=cb31027">		
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>		
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="http://127.0.0.1/3DprintShop">Home</a>
			</div>
			<ul class="nav navbar-nav">
				<!-- <li><a href="http://127.0.0.1/3DprintShop/#">Register</a></li>				 -->
			</ul>
			<ul class="nav navbar-nav navbar-right">				
				<?php if($loginStatus){ ?>
					<li><a href="http://127.0.0.1/3DprintShop/competence/logOut">Log Out</a></li>
					<li><a href="http://127.0.0.1/3DprintShop/competence/user/<?php echo $userData['account']; ?>"><?php echo $userData['name']; ?></a></li>		
				<?php }else{ ?>
					<li><a href="http://127.0.0.1/3DprintShop/competence">Log in</a></li>
					<li><a href="http://127.0.0.1/3DprintShop/register">Register</a></li>		
				<?php } ?>
			</ul>			
		</div>		
	</nav>	