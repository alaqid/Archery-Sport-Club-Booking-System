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
    <h2 class="active"> Sign In </h2>
    

    <!-- Login Form -->
    <form method="post" action="loginadmin.php">
	<?php include('errors.php'); ?>
      <input type="text" id="login" class="fadeIn second" name="admin_username" placeholder="Username" required><br><br>
      <input type="password" id="password" class="fadeIn third" name="admin_password" placeholder="Password" required><br><br><br>
      <button type="submit" class="btn" name="login_admin">Login</button>	  
    </form>

  </div>


	

</body>

</html>