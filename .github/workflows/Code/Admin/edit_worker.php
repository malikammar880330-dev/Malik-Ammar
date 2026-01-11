<?php
include "../connection.php";

$id = $_GET['id'];


$query = "SELECT * FROM worker WHERE id = '$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);


if (isset($_POST['submit'])) {
   
    $center_name    = $_POST['center_name'];
    $name          = $_POST['name'];
    $email         = $_POST['email'];
    $phone         = $_POST['phone'];
    $designation   = $_POST['designation'];
    $qualification = $_POST['qualification'];
    $password      = $_POST['password'];

    $update_query = "
        UPDATE worker SET
            center_name = '$center_name',
            name = '$name',
            email = '$email',
            phone = '$phone',
            designation = '$designation',
            qualification = '$qualification',
            password = '$password'
        WHERE id = '$id'
    ";

    if (mysqli_query($con, $update_query)) {
        echo "<script>alert('Health Worker Updated Successfully!'); window.location='view_worker.php';</script>";
    } else {
        echo "<script>alert('Error updating worker!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Edit Health Worker</title>
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
                    <h3>Edit Health Worker</h3>
                </div>

                <div class="card-body">
                    <form method="post">
                     
                     <div class="form-group">
                            <label>Center Name</label>
                            <input type="text" name="center_name" class="form-control"
                                   value="<?php echo $row['center_name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control"
                                   value="<?php echo $row['name']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control"
                                   value="<?php echo $row['email']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone" class="form-control"
                                   value="<?php echo $row['phone']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" name="designation" class="form-control"
                                   value="<?php echo $row['designation']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Qualification</label>
                            <input type="text" name="qualification" class="form-control"
                                   value="<?php echo $row['qualification']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control"
                                   value="<?php echo $row['password']; ?>" required>
                        </div>

                        <button type="submit" name="submit" class="btn btn-custom btn-block">
                            Update Worker
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
