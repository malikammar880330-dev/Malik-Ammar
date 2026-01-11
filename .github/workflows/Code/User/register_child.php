<?php
session_start();
include '../connection.php';

$user_id = $_SESSION['id'];
$sql = "SELECT * FROM user WHERE id='$user_id'";
$result = mysqli_query($con, $sql);
$parent = mysqli_fetch_assoc($result);


// Handle child registration
if (isset($_POST['submit'])) {
    $name=$parent['name'];
    $cnic=$parent['cnic'];
    $child = $_POST['child_name'];
    $dob       = $_POST['dob'];
    $age       = $_POST['age'];

    $insert = "INSERT INTO child (name, cnic, child_name, dob, age, vaccination_status)
           VALUES ('$name', '$cnic', '$child', '$dob', '$age', 'pending')";
    $run = mysqli_query($con, $insert );

    if ($run) {
        echo "<script>alert('Child Registered Successfully'); window.location='view_child.php';</script>";
    } else {
        echo "<script>alert('Error in Registration');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register Child</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 4.5 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <style>
    .card {
        border-radius: 15px;
        box-shadow: 0px 5px 15px rgba(0,0,0,0.2);
    }
    .card-header {
        background: #2193b0;
        color: black;
        border-radius: 15px 15px 0 0;
        text-align: center;
    }
    .form-control {
        border-radius: 10px;
    }
    .btn-custom {
        background: #2193b0;
        color: #fff;
        border-radius: 10px;
        font-weight: bold;
    }
    .btn-custom:hover {
        background: #176d82;
        color: #fff;
    }
    .form-group label {
        font-weight: bold;
    }
  </style>
</head>

<body>
<?php include "../header/user-header.php"; ?>
<br><br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Register Child</h3>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label><b>Child Full Name</b></label>
                            <input type="text" name="child_name" placeholder="Enter child's full name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label><b>Date of Birth</b></label>
                            <input type="date" name="dob" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label><b>Age</b></label>
                            <input type="number" name="age" class="form-control" required>
                        </div>

                        <button type="submit" name="submit" class="btn btn-custom btn-block">Register Child</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
