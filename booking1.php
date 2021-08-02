<?php
session_start(); 
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
    
  }
?>