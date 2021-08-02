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

	$id = $_SESSION["username"];
	$sql="SELECT * FROM booking where username = '$id'";
	$result=mysqli_query($db,$sql);

	
	
    
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
        <h1>Booking</h1><br>

        <div class="centered"><a href="booking.php"><button>Create Booking</button></a></div>

        <?php 
        echo "<table class='dataTable'>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Session</th>
                </tr>
            </thead>";
            while($rows=mysqli_fetch_assoc($result)){
            echo "<tbody>
                <tr>";
                    
                   echo "<td>" . $rows['datebook'] . "</td>";

                   echo "<td>" . $rows['session'] . "</td>";

                    }?>
                </tr>
            </tbody>
        </table>

    </div>
    </div>





</body>



</html>