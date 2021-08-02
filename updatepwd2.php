<?php 

session_start(); 

if (!isset($_SESSION['id'])) {
$_SESSION['msg'] = "You must log in first";
header('location: login.php');
}

$username = "";
$email    = "";
$errors = array(); 

// connect to the database
require_once 'dbconfig.php';

$id = $_GET["id"];
$sql="SELECT * FROM users where id =$id";
$result=mysqli_query($db,$sql);


  //update password
  if (isset($_POST['upd_pwd2'])) {
    $password_new4 = mysqli_real_escape_string($db, $_POST['password_new4']);
	$password_new5 = mysqli_real_escape_string($db, $_POST['password_new5']);

    if ($password_new4 != $password_new5) {
        array_push($errors, "The two passwords do not match");
        }

    if(count($errors) == 0) {
        $password = md5($password_new4);
        $query ="UPDATE users SET password='".$password."' WHERE id='".$id."'";
        mysqli_query($db, $query);
        echo "<script>alert('Member Password Updated Successfully');
		window.location.href='adminmember.php';
		</script>";
    }
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
			<li><a href="aboutus3.php">About Us</a></li>
		</ul>
	</nav>
    <button onclick="myFunction2()" class="dropbtn"><?php echo $_SESSION['admin_username']; ?> <i
            class="fas fa-caret-down"></i></button>
    <div id="myDropdown2" class="dropdown-content2">
        <a href="admin.php">Dashboard</a>
        <p> <a href="logout.php?logout='1'" style="color: red;">logout</a> </p>
    </div>
</header>

<body>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <a href="update-process2.php?id=<?php echo $id; ?>"><h2 class="inactive underlineHover"> Update Profile </h2></a>
    <a href=""><h2 class="active">Update Password </h2></a><br><br>
    

    <!-- Login Form -->
    <form method="post">
    <?php include('errors.php'); ?>
    <input class="fadeIn third" placeholder="New Password" type="password" name="password_new4" required><br>
	  <input class="fadeIn third" placeholder="Confirm New Password" type="password" name="password_new5" required><br><br><br>
      <button type="submit" class="btn" name="upd_pwd2">Update</button>	  
    </form>

  </div>


	

</body>

</html>