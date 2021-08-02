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
			<li><a href="index.php">
					<p>Home</p>
				</a></li>
			<li><a href="membership.php">Membership</a></li>
			<li><a href="aboutus.php">Nyanpasu</a></li>
		</ul>
	</nav>
	<button onclick="myFunction()" class="dropbtn">Login <i class="fas fa-caret-down"></i></button>
	<div id="myDropdown" class="dropdown-content1">
		<a href="login.php">Customer</a>
		<a href="loginadmin.php">Admin</a>
		<!--<a class="btnlgn" href="login.php"><button>Login</button></a>	-->
</header>

<body class="fadeIn first">

	<div class="slider">
		<div class="slides">
			<input type="radio" name="radio-btn" id="radio1">
			<input type="radio" name="radio-btn" id="radio2">
			<input type="radio" name="radio-btn" id="radio3">

			<div class="slide first">
				<img src="assets/img/111.png" alt="">
			</div>
			<div class="slide">
				<img src="assets/img/112.png" alt="">
			</div>
			<div class="slide">
				<img src="assets/img/113.png" alt="">
			</div>

			<div class="navigation-auto">
				<div class="auto-btn1"></div>
				<div class="auto-btn2"></div>
				<div class="auto-btn3"></div>

			</div>
		</div>
		<div class="navigation-manual">
			<label for="radio1" class="manual-btn"></label>
			<label for="radio2" class="manual-btn"></label>
			<label for="radio3" class="manual-btn"></label>

		</div>
	</div>

	<div class="bookbuttondiv">
		<a href="membership.php"><button class="header">Book Now!!!</button></a>
	</div>

	<div class="a1">
		<h2>Special Offer</h2>
		<h3>GET YOUR ARCHERY GAMES on this DEAL ! <br><br>
			<hr><br>
			Get RM 5 OFF a day
			in conjunction with
			"MERDEKA" month
			August 1st - August 31st

			<br><br>
			<hr><br>

			Today, we gonna celebrate our freedom in the name of "Malaysia",
			there is only one word we know which define liberty, peace and happiness
			<br><br>
			Happy National Day</h3>
	</div>
	<div class="a1">
		<h2>Opening Hours</h2>
		<h3>Kindly refer to our operating hours: <br><br>

			10am - 10pm <br>
			(Tue - Sun) <br><br>

			Closed every Mon <br></h3>

		
		<h2><strong>Contact Number</strong>	</h2>
		<h3>
		Mr Aqid - 012-345 6789 <br>
		Ms Yana - 011-233 6789
		</h3>

		<h2><strong>Location</strong>	</h2>
		<h3>
		14-2, Jalan 1/76C, Desa Pandan, 55100 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur
		</h3>
	</div>

	<div id="map"></div>

	<footer>
		<a href="https://www.instagram.com/al.aqid/"><i class="fa fa-instagram fa-2x"></i> Nyanpasu Archery</a><br><br>
		<a href="https://www.instagram.com/al.aqid/"><i class="fa fa-facebook fa-2x"></i> &nbsp; Nyanpasu
			Archery</a><br><br>
		<a href="https://www.instagram.com/al.aqid/"><i class="fa fa-envelope fa-2x"></i>Nyanpasu Archery</a>
	</footer>


	<script
		src="https://maps.googleapis.com/maps/api/js?key=(YOUR API KEY)&callback=initMap&libraries=&v=weekly"
		async></script>

	<script type="text/javascript">
		var counter = 1;
		setInterval(function () {
			document.getElementById('radio' + counter).checked = true;
			counter++;
			if (counter > 4) {
				counter = 1;
			}
		}, 5000);
	</script>
</body>

</html>
