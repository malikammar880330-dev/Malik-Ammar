<?php
include("connection.php");
session_start();

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin WHERE email = '$email' && password = '$password' ";
    $result = mysqli_query($con, $query);
       
    if(mysqli_num_rows($result) > 0){
      
       
          
        echo "<script>alert('Welcome to the Admin Panel'); window.location='Admin/dashboard.php';</script>";

    } else {
                echo "<script>alert('Invalid Email or Password'); window.location='Admin_Login.php';</script>";
            }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
       
        .card {
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.2);
        }
        .card-header {
            background: #2193b0;
            color:black;
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
    </style>
</head>

<body>
    <?php include "header/header.php"; ?>
    <br><br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Admin Login</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">

                            <div class="form-group">
                                <label><b>Email</b></label>
                                <input type="email" name="email" placeholder="Enter your email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label><b>Password</b></label>
                                <input type="password" name="password" placeholder="Enter your password" class="form-control" required>
                            </div>

                            <button type="submit" name="submit" class="btn btn-custom btn-block">Login</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
