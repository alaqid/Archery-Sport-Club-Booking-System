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

	$sql2="SELECT username FROM users";
	$result2=mysqli_query($db,$sql2);
	$rowcount=mysqli_num_rows($result2);

	$sql3="SELECT username FROM booking";
	$result3=mysqli_query($db,$sql3);
	$rowcount2=mysqli_num_rows($result3);


	$id = $_SESSION["id"];
	$sql="SELECT * FROM admin where id =$id";

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
			<li><a href="membership3.php">Membership</a></li>
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
		<h1>Admin</h1><br><br>
		
		<div id="formContent" style="width: 20%; float:left; margin-left:250px">
			<h3>Number of Members</h3><br>
			<h1><?php echo $rowcount; ?></h1><br>			
		</div>
		

		<div id="formContent" style="width: 20%; float:right; margin-right:250px">
			<h3>Number of Booking</h3><br>
			<h1><?php echo $rowcount2; ?></h1><br>
		</div>
		<a href="adminmember.php" style="width: 20%; float:left; margin-left:310px; margin-top:15px"><button>Member List</button></a>
		<a href="adminbooking.php"  style="width: 20%; float:right; margin-right:190px; margin-top:15px"><button>Booking List</button></a>

</body>

<?php 

}
?>

</html>