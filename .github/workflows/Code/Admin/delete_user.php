<?php
include "../connection.php";

$id= $_GET['id'];
$query = "DELETE FROM user WHERE id = '$id'";
$run = mysqli_query($con,$query);

if ($run) {
    echo "<script>alert('User Deleted Successfully'); window.location='view_user.php';</script>";
} else {
    echo "<script>alert('Error: Could not delete center'); window.location='view_user.php';</script>";
}
?>
