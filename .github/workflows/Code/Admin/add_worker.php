<?php
include "../connection.php";

if (isset($_POST['submit'])) {
    $center        = $_POST['center'];
    $name        = $_POST['name'];
    $email       = $_POST['email'];
    $phone       = $_POST['phone'];
    $designation = $_POST['designation'];
    $qualification = $_POST['qualification'];
    $password    = $_POST['password'];

    $query  = "INSERT INTO worker (center_name,name,email,phone,designation,qualification,password,status) 
               VALUES('$center','$name','$email','$phone','$designation','$qualification','$password','pending')";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Health Worker Added Successfully'); window.location='view_worker.php';</script>";
    } else {
        echo "<script>alert('Error! Try Again'); window.location='add_worker.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Add Health Worker</title>
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
                    <h3>Add Health Worker</h3>
                </div>
                <div class="card-body">
                    <form method="post">
<div class="form-group">
                            <label> Center Name</label>
                            <select name="center" class="form-control" required>
                                <option value="">Select Center</option>
                                <?php
$centers = mysqli_query($con, "SELECT * FROM vaccination_centers WHERE status='active'");
    while($c = mysqli_fetch_array($centers)) {
                             
                                ?>
                                <option value="<?php echo $c['name']?>"><?php echo $c['name']?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><b>Full Name</b></label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Full Name" required>
                        </div>

                        <div class="form-group">
                            <label><b>Email</b></label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                        </div>

                        <div class="form-group">
                            <label><b>Phone Number</b></label>
                            <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" required>
                        </div>

                        <div class="form-group">
                            <label><b>Designation</b></label>
                            <input type="text" name="designation" class="form-control" placeholder="e.g. Vaccination Officer" required>
                        </div>

                        <div class="form-group">
                            <label><b>Qualification</b></label>
                            <input type="text" name="qualification" class="form-control" placeholder="Enter Qualification" required>
                        </div>

                        <div class="form-group">
                            <label><b>Password</b></label>
                            <input type="password" name="password" class="form-control" placeholder="Set Password" required>
                        </div>

                        <button type="submit" name="submit" class="btn btn-custom btn-block">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
