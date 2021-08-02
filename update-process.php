<?php

session_start(); 

	if (!isset($_SESSION['id'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: loginadmin.php');
	}

    require_once 'dbconfig.php';

$booking_id = $_GET["booking_id"];

$sql="SELECT * FROM booking where booking_id =$booking_id";
$result=mysqli_query($db,$sql);



if (isset($_POST['upd_book'])) {
    $datebook = mysqli_real_escape_string($db, $_POST['datebook']);
	$session = mysqli_real_escape_string($db, $_POST['session']);

    if(count($_POST)>0) {
        $query ="UPDATE booking SET datebook='".$datebook."', session='".$session."' WHERE booking_id='".$booking_id."'";
        mysqli_query($db, $query);
        echo "<script>alert('Booking Updated Successfully');
		window.location.href='adminbooking.php';
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
	<button onclick="myFunction2()"class="dropbtn"><?php echo $_SESSION['admin_username']; ?> <i class="fas fa-caret-down"></i></button>
	<div id="myDropdown2" class="dropdown-content2">
	<a href="admin.php">Dashboard</a>	
		<p> <a href="logout.php?logout='1'" style="color: red;">logout</a> </p>		
	</div>
</header>

<body class="fadeIn first">

    <div class="a3">
        <h1>Update Booking</h1><br>

        <div class=" fadeInDown" style="margin-left:170px; width:100%">
            <div style="width: 20%; float:left" id="splitleft">
            <br><br>

            <form method="post" >
					<label for="datebook">Date:</label><br>
					<input type="date" id="datebook" class="fadeIn second" name="datebook" placeholder=""
                    value="<?php echo $rows['datebook']; ?>" required><br><br>
					<label for="session" required>Session:</label><br>
					<select name="session" id="session" class="fadeIn third">
						<option value="<?php echo $rows['session']; ?>" selected><?php echo $rows['session'];?></option>
						<option value="10.00AM - 11.00AM">10.00AM - 11.00AM</option>
						<option value="11.00AM - 12.00AM">11.00AM - 12.00AM</option>
						<option value="12.00AM - 1.00PM">12.00AM - 1.00PM</option>
                        <option value="2.00PM - 3.00PM">2.00PM - 3.00PM</option>
                        <option value="3.00PM - 4.00PM">3.00PM - 4.00PM</option>
                        <option value="4.00PM - 5.00PM">4.00PM - 5.00PM</option>
                        <option value="5.00PM - 6.00PM">5.00PM - 6.00PM</option>
					</select><br><br><br>
                    <button style="margin-bottom:20px;" type="submit" class="btn" name="upd_book">Update</button>
                    </form>
            </div>

				

            </div>

        </div>
    </div>

    
</body>
<?php 

}
?>
</html>