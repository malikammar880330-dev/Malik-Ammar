<?php
include "../connection.php";

$id= $_GET['id'];
$query = "DELETE FROM worker WHERE id = '$id'";
$run = mysqli_query($con,$query);

if ($run) {
    echo "<script>alert('Worker Deleted Successfully'); window.location='view_worker.php';</script>";
} else {
    echo "<script>alert('Error: Could not delete center'); window.location='view_worker.php';</script>";
}
?>
