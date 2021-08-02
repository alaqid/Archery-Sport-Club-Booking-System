<?php

session_start(); 

	if (!isset($_SESSION['id'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
	}


	// connect to the database
	require_once 'dbconfig.php';

	$id = $_SESSION["id"];
	$sql="SELECT * FROM users where id =$id";
	$result=mysqli_query($db,$sql);

	  if (isset($_POST['paysilver'])) { 
        $query ="UPDATE users SET member_level='SILVER' WHERE id='".$id."'";
        mysqli_query($db, $query);
		echo "<script>
alert('Successfully Subscribed to Silver');
window.location.href='userloggedin.php';
</script>";
	  }
	
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
			<li><a href="index2.php">Home</a></li>
			<li><a href="membership2.php">
					<p>Membership</p>
				</a></li>
			<li><a href="aboutus2.php">Nyanpasu</a></li>
		</ul>
	</nav>
	<button onclick="myFunction()"class="dropbtn"><?php echo $_SESSION['username']; ?> <i class="fas fa-caret-down"></i></button>
	<div id="myDropdown" class="dropdown-content">
		<a href="userloggedin.php">Profile</a>
		<a href="bookinglist.php">Booking</a>

		<p> <a href="logout.php?logout='1'" style="color: red;">logout</a> </p>

	</div>
</header>

<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Payment </h2><br><br>
	<div class="a3">
		<h3>Silver = RM 150 / year </h3>
	</div><br>


    

    <!-- Login Form -->
    <form method="post" action="paymentSilver.php">
	
      <input type="text" placeholder="Card Number" required><br>
      <input type="text" placeholder="Name on Card" required><br>
      <input class="half" type="" placeholder="MM/YY" required><input class="half" type="" placeholder="CCV" required><br><br>
      <button type="submit" class="btn" name="paysilver">Pay</button>	  
    </form>

  </div>
</body>

<?php 

}
?>
</html>