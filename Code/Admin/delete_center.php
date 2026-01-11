<?php
include "../connection.php";

$id= $_GET['id'];
$query = "DELETE FROM vaccination_centers WHERE center_id = '$id'";
$run = mysqli_query($con,$query);

if ($run) {
    echo "<script>alert('Center Deleted Successfully'); window.location='view_center.php';</script>";
} else {
    echo "<script>alert('Error: Could not delete center'); window.location='view_center.php';</script>";
}
?>
