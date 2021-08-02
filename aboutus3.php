<?php

session_start(); 

if (!isset($_SESSION['id'])) {
$_SESSION['msg'] = "You must log in first";
header('location: loginadmin.php');
}

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
			<li><a href="index3.php">Home</a></li>
			<li><a href="membership3.php">Membership</a></li>
			<li><a href="aboutus3.php"><p>Nyanpasu</p></a></li>
		</ul>
	</nav>
	<button onclick="myFunction2()"class="dropbtn"><?php echo $_SESSION['admin_username']; ?> <i class="fas fa-caret-down"></i></button>
	<div id="myDropdown2" class="dropdown-content2">
	<a href="admin.php">Dashboard</a>	
		<p> <a href="logout.php?logout='1'" style="color: red;">logout</a> </p>		
	</div>
</header>

<body class="fadeIn first">

	<div class="popup" id="popup-1">
		<div class="content">
			<div class="close-btn" onclick="togglePopup()">
			<i class="fa fa-times-circle fa-2x"></i></div><br><br>

			<h1>Log in</h1>
			<form action="#" method="post">
			<div class="input-field"><input placeholder="Email" class="validate" name="email1" required></div>
			<div class="input-field"><input placeholder="Password" class="validate" name="password" type="password" required></div>
			<input type="submit" value="Login" class="second-button" name="submit">
			</form>
			<p>Don't have an account? <a href="signup.php">Sign Up</a></p>


		</div>
	</div>

	<div class="a3">
		<h1>About Us</h1>
		<img src="assets/img/us.png" alt="">
	</div>

</body>

</html>