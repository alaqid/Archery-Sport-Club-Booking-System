<?php

session_start(); 

	if (!isset($_SESSION['id'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: loginadmin.php');
	}

	$username = "";
	$email    = "";
	$errors = array(); 

	// connect to the database
	require_once 'dbconfig.php';

	$id = $_SESSION["id"];
	$sql="SELECT * FROM users where id =$id";
	$result=mysqli_query($db,$sql);
	
	while($rows=mysqli_fetch_assoc($result)){
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
	<title>Nyanpasu Archery Sport Club</title>
</head>
<header>
	<img class="logo" src="assets/img/target.png " alt="">
	<nav>
		<ul class="nav_links">
			<li><a href="index3.php">Home</a></li>
			<li><a href="membership3.php">
					<p>Membership</p>
				</a></li>
			<li><a href="aboutus3.php">Nyanpasu</a></li>
		</ul>
	</nav>
	<button onclick="myFunction2()"class="dropbtn"><?php echo $_SESSION['admin_username']; ?> <i class="fas fa-caret-down"></i></button>
	<div id="myDropdown2" class="dropdown-content2">
	<a href="admin.php">Dashboard</a>	
		<p> <a href="logout.php?logout='1'" style="color: red;">logout</a> </p>		
	</div>
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

<?php 

}
?>

</html>