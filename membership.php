<?php



?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/style.css">
	<script src="assets/js/index.js"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
		integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Nyanpasu Archery Sport Club</title>
</head>
<header>
	<img class="logo" src="assets/img/target.png " alt="">
	<nav>
		<ul class="nav_links">
			<li><a href="index.php">Home</a></li>
			<li><a href="membership.php">
					<p>Membership</p>
				</a></li>
			<li><a href="aboutus.php">Nyanpasu</a></li>
		</ul>
	</nav>
	<button onclick="myFunction()" class="dropbtn">Login <i class="fas fa-caret-down"></i></button>
	<div id="myDropdown" class="dropdown-content1">
		<a href="login.php">Customer</a>
		<a href="loginadmin.php">Admin</a>	
</header>

<body class="fadeIn first">
	

	<div class="a3">
		<h1>Membership Benefits</h1>
	</div><br><br>


	<div class="pricing">

		<div class="columns">
			<ul class="price">
				<li class="header">Non-member</li>
				
				<li>5% Off for NEW customers </li>

				
			</ul>
		</div>

		<div class="columns">
			<ul class="price">
				<li class="header" style="background-color:#808080">Silver</li>
				<li style="background-color:#c8e6c9">RM 150 / year</li>
				<li>10% Off fees</li>
				<li>Earn rewards point to redeem FREE 1 day</li>
				<li>3 months : 500 points</li>
				<li>6 months : 1500 points</li>
				<li>9 months : 2000 points</li>
				<li>12 months : 2500 points</li>
				<li>FREE food and drink on Friday <br> & Saturday only</li>
				<li>Exclusive Nyanpasu member monthly promo & FREE gifts</li>
				<li style="background-color:#c8e6c9"><a href="login.php" class="button">Sign Up</a></li>
			</ul>
		</div>

		<div class="columns">
			<ul class="price">
				<li class="header" style="background-color:#D4AF37">Gold</li>
				<li style="background-color:#c8e6c9">RM 200 / year</li>
				<li>15% Off fees</li>
				<li>Earn rewards point to redeem FREE 2 day</li>
				<li>3 months : 500 points</li>
				<li>6 months : 1500 points</li>
				<li>9 months : 2000 points</li>
				<li>12 months : 2500 points</li>
				<li>FREE food and drink on Friday, <br> Saturday, and Sunday</li>
				<li>Exclusive Nyanpasu member monthly promo & FREE gifts</li>
				<li style="background-color:#c8e6c9"><a href="login.php" class="button">Sign Up</a></li>
			</ul>
		</div>

	</div>

</body>

</html>