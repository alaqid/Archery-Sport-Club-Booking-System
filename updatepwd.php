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

$id = $_SESSION["id"];
$username = $_SESSION["username"];
$sql="SELECT * FROM users where id =$id";
$result=mysqli_query($db,$sql);


  //update password
    if (isset($_POST['upd_pwd1'])) {
      $password_old = mysqli_real_escape_string($db, $_POST['password_old']);
      $password_new = mysqli_real_escape_string($db, $_POST['password_new']);
      $password_new2 = mysqli_real_escape_string($db, $_POST['password_new2']);

      if ($password_new != $password_new2) {
        array_push($errors, "The two new passwords do not match");
        }
    
      if (count($errors) == 0) {
          $password = md5($password_old);
          $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";        
          $results = mysqli_query($db, $query);
          $row = mysqli_fetch_array($results);
          if (mysqli_num_rows($results) == 1) {
            $password2 = md5($password_new);
            $query2 ="UPDATE users SET password='".$password2."' WHERE id='".$id."'";
        mysqli_query($db, $query2);
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            echo "<script>
  alert('Password Updated Succesfully');
  window.location.href='userloggedin.php';
  </script>";
          }else {
              array_push($errors, "Wrong old password");
          }
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
			<li><a href="index.php">Home</a></li>
			<li><a href="membership.php">Membership</a></li>
			<li><a href="aboutus.php">About Us</a></li>
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
    <a href="updateprofile.php"><h2 class="inactive underlineHover"> Update Profile </h2></a>
    <a href="updatepwd.php"><h2 class="active">Update Password </h2></a><br><br>
    

    <!-- Login Form -->
    <form method="post">
    <?php include('errors.php'); ?>
    <input class="fadeIn third" placeholder="Old Password" type="password" name="password_old" required><br>
    <input class="fadeIn third" placeholder="New Password" type="password" name="password_new" required><br>
	  <input class="fadeIn third" placeholder="Confirm New Password" type="password" name="password_new2" required><br><br><br>
      <button type="submit" class="btn" name="upd_pwd1">Update</button>	  
    </form>

  </div>


	

</body>

</html>