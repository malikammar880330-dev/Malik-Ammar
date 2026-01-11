<?php
include "../connection.php";
$id=$_GET['id'];

    $query = "update worker set status='disapprove' where id='$id'";
    $data = mysqli_query($con, $query);
    if($data)
    {
        echo "<script>window.location='view_worker.php';alert('Deactivate User Sucessfully');</script>";
    }
    else
    {
        echo "<script>window.location='view_worker.php';alert('InValid Data');</script>"; 
    }

?>