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
$sql="SELECT * FROM users where id =$id";
$result=mysqli_query($db,$sql);




  //update profile
  if (isset($_POST['upd_profile'])&& isset($_FILES['my_image'])) {
	$username = mysqli_real_escape_string($db, $_POST['username']);
    $name = mysqli_real_escape_string($db, $_POST['member_name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";
	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];
  
    if(count($_POST)>0) {
		$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png"); 


                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'uploads/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
        $query ="UPDATE users SET member_name='".$name."', username='".$username."', email='".$email."', user_dp='".$new_img_name."' WHERE id='".$id."'";
        mysqli_query($db, $query);
		$_SESSION['username'] = $username;
        echo "<script>alert('Profile Updated Successfully');
		window.location.href='userloggedin.php';
		</script>";
    }
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

<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Update Profile </h2>
	<a href="updatepwd.php"><h2 class="inactive underlineHover"> Update Password </h2></a>

    

    <!-- Login Form -->
    <form method="post" enctype="multipart/form-data">
	
      <input placeholder="Username" type="text" id="login" class="fadeIn second" name="username" value="<?php echo $rows['username']; ?>" required><br>
	  <input placeholder="Name" type="text" id="login" class="fadeIn second" name="member_name" value="<?php echo $rows['member_name']; ?>" required><br>
      <input placeholder="Email" type="email" id="login" class="fadeIn second" name="email" value="<?php echo $rows['email']; ?>" required><br><br>
	  <label for="pfp" >Profile Picture : </label>
	  <input type="file"  name="my_image" /><br><br><br>
      <button type="submit" class="btn" name="upd_profile">Update</button>	  
    </form>

  </div>
</body>

<?php 

}
?>
</html>