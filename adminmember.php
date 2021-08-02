<?php 
	session_start(); 

	if (!isset($_SESSION['id'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: loginadmin.php');
	}

	$datebook = "";
	$session    = "";
	$errors = array();

	// connect to the database
	require_once 'dbconfig.php';

	
	$sql="SELECT * FROM users";
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
        <h1>Member List</h1><br>

        <?php 
        echo "<table class='dataTable'>
            <thead>
                <tr>
                    <th>Member Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Member Level</th>
                    <th>Action</th>
                </tr>
            </thead>";
            while($rows=mysqli_fetch_assoc($result)){

            echo "<tbody>
                <tr>";
                    
                    echo "<td>" . $rows['member_name'] . "</td>";
                    echo "<td>" . $rows['username'] . "</td>";
                    echo "<td>" . $rows['email'] . "</td>";
                    echo "<td>" . $rows['member_level'] . "</td>";  
            ?>
            <td><a href="update-process2.php?id=<?php echo $rows["id"]; ?>"> <button style="background:grey; color:white;">Update</button></a>
            <a href="delete-process2.php?id=<?php echo $rows["id"]; ?>"> <button style="background:#b51616; color:white;">Delete</button></a></td>

            <?php }?>
        </tr>
        </tbody>
        </table>

    </div>
    





</body>

</html>