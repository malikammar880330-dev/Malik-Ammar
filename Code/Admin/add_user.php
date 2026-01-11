<?php
include "../connection.php";

if (isset($_POST['submit'])) {
    $name       = $_POST['name'];
    $email      = $_POST['email'];
    $phone      = $_POST['phone'];  
    $address    = $_POST['address'];
    $cnic       = $_POST['cnic'];
    $password   = $_POST['password'];

    // Insert into database
    $sql = "INSERT INTO user (name, email, phone, address, cnic, password, status) 
            VALUES ('$name','$email','$phone','$address','$cnic','$password','pending')";
    $run = mysqli_query($con, $sql);

    if ($run) {
        echo "<script>alert('Add User Successfully'); window.location='add_user.php';</script>";
    } else {
        echo "<script>alert('Invalid Data'); window.location='view_user.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add User</title>
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
 <?php include "../header/admin-header.php"; ?>
 <br><br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h3>Add User</h3>
                </div>
                <div class="card-body">
                    <form method="post">

                        <div class="form-group">
                            <label><b>Full Name</b></label>
                            <input type="text" name="name" placeholder="Enter full name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label><b>Email</b></label>
                            <input type="email" name="email" placeholder="Enter email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label><b>Phone Number</b></label>
                            <input type="text" name="phone" placeholder="Enter phone number" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label><b>Address</b></label>
                            <input type="text" name="address" placeholder="Enter address" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label><b>CNIC</b></label>
                            <input type="text" name="cnic" placeholder="Enter CNIC" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label><b>Password</b></label>
                            <input type="password" name="password" placeholder="Enter password" class="form-control" required>
                        </div>

                        <button type="submit" name="submit" class="btn btn-custom btn-block">Add User</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
