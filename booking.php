<?php 
	session_start(); 

	if (!isset($_SESSION['id'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
	}

	$datebook = "";
	$session    = "";
	$errors = array();

	// connect to the database
	require_once 'dbconfig.php';

	$id = $_SESSION["id"];
	$sql="SELECT * FROM users where id =$id";
	$result=mysqli_query($db,$sql);

	if (isset($_POST['book1'])) { 

		$datebook = mysqli_real_escape_string($db, $_POST['datebook']);
		$session = mysqli_real_escape_string($db, $_POST['session']);
		$username = mysqli_real_escape_string($db, $_SESSION['username']);

        $query = "INSERT INTO booking (datebook, session, username) 
  			  VALUES('$datebook', '$session', '$username')";
        mysqli_query($db, $query);
        header('location: paybook.php');		
	  }
	
	while($rows=mysqli_fetch_assoc($result)){
    $level = $rows['member_level'];
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
        <h1>Booking Form</h1><br>

        <div class=" fadeInDown">
            <div style="width: 20%; float:left" id="splitleft">
            <br><br>

            <form method="post" action="booking.php">
					<label for="datebook">Date:</label><br>
					<input type="date" id="datebook" class="fadeIn second" name="datebook" placeholder=""
						required><br><br>
					<label for="session" required>Session:</label><br>
					<select name="session" id="session" class="fadeIn third" onchange="mycalculate.call(this, event)" >
						<option value="" disabled selected>Select Session</option>
						<option value="10.00AM - 11.00AM">10.00AM - 11.00AM</option>
						<option value="11.00AM - 12.00AM">11.00AM - 12.00AM</option>
						<option value="12.00AM - 1.00PM">12.00AM - 1.00PM</option>
                        <option value="2.00PM - 3.00PM">2.00PM - 3.00PM</option>
                        <option value="3.00PM - 4.00PM">3.00PM - 4.00PM</option>
                        <option value="4.00PM - 5.00PM">4.00PM - 5.00PM</option>
                        <option value="5.00PM - 6.00PM">5.00PM - 6.00PM</option>
					</select><br><br><br>
					<!--<button type="submit" class="btn" name="book1">Submit</button>
                    <br><br>
				</form>-->
            </div>

            <div style="width: 80%; float:right" class="splitright"><br><br>
            
            <h3>Membership Level :
				<u><?php echo $level; ?></u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3><br>
                <input type="hidden" id="level" value="<?= $level ?>">
                <div id="display"></div>
                <br><br><button style="float:right; margin-right:20px; margin-bottom:20px;" type="submit" class="btn" name="book1">Confirm and Pay</button>
                    <br><br>
				</form>

            </div>

        </div>
    </div>

    <script src="assets/js/calculate.js"></script>
    
</body>

<?php 

}
?>

</html>