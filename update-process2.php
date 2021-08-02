<?php

require_once 'dbconfig.php';
session_start(); 

	if (!isset($_SESSION['id'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: loginadmin.php');
	}



$id = $_GET["id"];

$sql="SELECT * FROM users where id =$id";
$result=mysqli_query($db,$sql);



if (isset($_POST['upd_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
	$member_name = mysqli_real_escape_string($db, $_POST['member_name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    

    if(count($_POST)>0) {
        $query ="UPDATE users SET username='".$username."', member_name='".$member_name."', email='".$email."' WHERE id='".$id."'";
        mysqli_query($db, $query);
        echo "<script>alert('Member Information Updated Successfully');
		window.location.href='adminmember.php';
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
            <li><a href="index3.php">Home</a></li>
            <li><a href="membership3.php">Membership</a></li>
            <li><a href="aboutus3.php">Nyanpasu</a></li>
        </ul>
    </nav>
    <button onclick="myFunction2()" class="dropbtn"><?php echo $_SESSION['admin_username']; ?> <i
            class="fas fa-caret-down"></i></button>
    <div id="myDropdown2" class="dropdown-content2">
        <a href="admin.php">Dashboard</a>
        <p> <a href="logout.php?logout='1'" style="color: red;">logout</a> </p>
    </div>
</header>

<body class="fadeIn first">

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <a href="">
                <a href=""><h2 class="active"> Update Information </h2></a>
    <a href="updatepwd2.php?id=<?php echo $rows["id"]; ?>"><h2 class="inactive underlineHover">Update Password </h2></a><br><br>
            </a><br>


            <!-- Login Form -->
            <form method="post">

                <input class="fadeIn second" placeholder="Username" type="text" name="username"
                    value="<?php echo $rows['username']; ?>" required><br>
                <input class="fadeIn second" placeholder="Full Name" type="text" name="member_name"
                    value="<?php echo $rows['member_name']; ?>" required><br>
                <input class="fadeIn second" placeholder="Email" type="text" name="email"
                    value="<?php echo $rows['email']; ?>" required><br>
                <br><br>
                <button type="submit" class="btn" name="upd_user">Update</button>
            </form>

        </div>

    </div>


</body>
<?php 

}
?>

</html>