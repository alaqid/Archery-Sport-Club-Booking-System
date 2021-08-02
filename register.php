<?php include('server.php') ?>

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
			<li><a href="membership.php">Membership</a></li>
			<li><a href="aboutus.php">Nyanpasu</a></li>
		</ul>
	</nav>
	<button onclick="myFunction()" class="dropbtn">Login <i class="fas fa-caret-down"></i></button>
	<div id="myDropdown" class="dropdown-content1">
		<a href="login.php">Customer</a>
		<a href="loginadmin.php">Admin</a>	
</header>

<body>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <a href="login.php"><h2 class="inactive underlineHover"> Sign In </h2></a>
    <a href="register.php"><h2 class="active">Sign Up </h2></a><br><br>
    

    <!-- Login Form -->
    <form method="post" action="register.php" enctype="multipart/form-data">
	<?php include('errors.php'); ?>
	<input class="fadeIn second" placeholder="Username" type="text" name="username" value="" required><br>
	<input class="fadeIn second" placeholder="Full Name" type="text" name="member_name" value="" required><br>
	<input class="fadeIn second" placeholder="Email" type="text" name="email" value="" required><br>
	<input class="fadeIn third" placeholder="Password" type="password" name="password_1" required><br>
	<input class="fadeIn third" placeholder="Confirm Password" type="password" name="password_2" required><br><br>
	<label for="pfp" >Profile Picture : </label>
	<input type="file"  name="my_image" /><br><br><br>
      <button type="submit" class="btn" name="reg_user">Login</button>	  
    </form>

  </div>


	

</body>

</html>