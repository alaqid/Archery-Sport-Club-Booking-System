<?php
session_start();

// initializing variables
$username = "";
$name = "";
$email    = "";
$errors = array(); 

// connect to the database
require_once 'dbconfig.php';

// REGISTER USER
if (isset($_POST['reg_user'])&& isset($_FILES['my_image'])) {

  echo "<pre>";
  ($_FILES['my_image']);
  echo "</pre>";
  $img_name = $_FILES['my_image']['name'];
  $img_size = $_FILES['my_image']['size'];
  $tmp_name = $_FILES['my_image']['tmp_name'];
  $error = $_FILES['my_image']['error'];

  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $member_name = mysqli_real_escape_string($db, $_POST['member_name']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png"); 


                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'uploads/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (member_name, username, email, password, user_dp) 
  			  VALUES('$member_name','$username', '$email', '$password', '$new_img_name')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	echo "<script>alert('Profile Created Successfully');
		window.location.href='login.php';
		</script>";
  }
}



// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";        
        $results = mysqli_query($db, $query);
        $row = mysqli_fetch_array($results);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $row['username'];
          $_SESSION['id'] = $row['id'];
          $_SESSION['member_name'] = $row['member_name'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['member_level'] = $row['member_level'];
          $_SESSION['user_dp'] = $row['user_dp'];
          $_SESSION['success'] = "You are now logged in";
          echo "<script>
alert('You are now logged in');
window.location.href='userloggedin.php';
</script>";
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
  
// login admin

if (isset($_POST['login_admin'])) {
  $admin_username = mysqli_real_escape_string($db, $_POST['admin_username']);
  $admin_password = mysqli_real_escape_string($db, $_POST['admin_password']);

  if (count($errors) == 0) {

      $query = "SELECT * FROM admin WHERE admin_username='$admin_username' AND admin_password='$admin_password'";        
      $results = mysqli_query($db, $query);
      $row = mysqli_fetch_array($results);
      if (mysqli_num_rows($results) == 1) {
        $_SESSION['admin_username'] = $row['admin_username'];
        $_SESSION['id'] = $row['id'];
        header('location: admin.php');
      }else {
          array_push($errors, "Wrong username/password combination");
      }
  }
}


  ?>