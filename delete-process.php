<?php
require_once 'dbconfig.php';
$sql = "DELETE FROM booking WHERE booking_id='" . $_GET["booking_id"] . "'";
if (mysqli_query($db, $sql)) {
    echo "<script>alert('Booking Deleted Successfully');
    window.location.href='adminbooking.php';
    </script>";
} else {
    echo "Error deleting record: " . mysqli_error($db);
}
mysqli_close($db);
?>