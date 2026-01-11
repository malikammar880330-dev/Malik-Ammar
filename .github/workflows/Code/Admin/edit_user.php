<?php
include "../connection.php";

// Check User ID from URL


$id =$_GET['id'];


$query = "SELECT * FROM user WHERE id = '$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

// Update user data
if (isset($_POST['submit'])) {

    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $address  = $_POST['address'];
    $cnic     = $_POST['cnic'];
    $password = $_POST['password'];

    $update_query = "
        UPDATE user SET
            name     = '$name',
            email    = '$email',
            phone    = '$phone',
            address  = '$address',
            cnic     = '$cnic',
            password = '$password'
        WHERE id = '$id'
    ";

    if (mysqli_query($con, $update_query)) {
        echo "<script>alert('User Updated Successfully!'); window.location='view_user.php';</script>";
    } else {
        echo "<script>alert('Error updating user!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

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
                    <h3>Edit User</h3>
                </div>
                <div class="card-body">

                    <form method="post">

                        <div class="form-group">
                            <label><b>Full Name</b></label>
                            <input type="text" name="name" class="form-control"
                                   value="<?php echo $row['name']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label><b>Email</b></label>
                            <input type="email" name="email" class="form-control"
                                   value="<?php echo $row['email']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label><b>Phone Number</b></label>
                            <input type="text" name="phone" class="form-control"
                                   value="<?php echo $row['phone']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label><b>Address</b></label>
                            <input type="text" name="address" class="form-control"
                                   value="<?php echo $row['address']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label><b>CNIC</b></label>
                            <input type="text" name="cnic" class="form-control"
                                   value="<?php echo $row['cnic']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label><b>Password</b></label>
                            <input type="text" name="password" class="form-control"
                                   value="<?php echo $row['password']; ?>" required>
                        </div>

                        <button type="submit" name="submit" class="btn btn-custom btn-block">
                            Update User
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
