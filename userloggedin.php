<?php 
require_once 'dbconfig.php';
	session_start(); 

	if (!isset($_SESSION['id'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
	}

	$username = "";
	$email    = "";
	$errors = array(); 

	// connect to the database
	

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
			<li><a href="index2.php">Home</a></li>
			<li><a href="membership2.php">Membership</a></li>
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

<body class="fadeIn first">

	<div class="a3">
		<h1>Profile</h1>
		
		<div class="pfpcontainer">
			<!--<img class="pfp" src="assets/img/pfp.jpg" alt="Italian Trulli">-->
			<?php 
          $res = mysqli_query($db, $sql);

          if (mysqli_num_rows($res) > 0) {
              while ($images = mysqli_fetch_assoc($res)) {  ?>

                                  <img src="uploads/<?=$images['user_dp']?>" class="pfp"  width="25" height="25"> 

          <?php } }?>

			
		</div>


		<div class="a2">
			<h3>Membership Level :
				<u><?php echo $rows['member_level']; ?></u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btnlgn" href="membership2.php"><button>Change Plan</button></a></h3>
			<h3>Name : <u><?php echo $rows['member_name']; ?></u>
			</h3>
			<h3>Email : <u><?php echo $rows['email']; ?></u>
			</h3>
		</div>

		<div class="a4">
		<a class="btnlgn" href="updateprofile.php"><button>Update Profile</button></a>
		</div>
		

</body>

<?php 

}

?>

</html>