<?php
require_once 'dbconfig.php';
$sql = "DELETE FROM users WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($db, $sql)) {
    echo "<script>alert('Member Deleted Successfully');
    window.location.href='adminmember.php';
    </script>";
} else {
    echo "Error deleting record: " . mysqli_error($db);
}
mysqli_close($db);
?>