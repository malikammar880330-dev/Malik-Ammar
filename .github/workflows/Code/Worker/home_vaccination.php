<?php
include "../connection.php";
session_start();

$id = $_GET['id'];
$sql = "update child set vaccination_status='unvaccinated' where id='$id'";
$data = mysqli_query($con, $sql);
// Fetch user record
$query = "SELECT * FROM child WHERE id = '$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

// When form is submitted
if (isset($_POST['submit'])) {

    // Getting form data
    $parent_name = $_POST['name'];
    $child_name  = $_POST['child_name'];
    $date  = $_POST['date'];
    $reason      = $_POST['reason'];
    $vaccination_name = $_POST['vaccination_name'];
    $center_name = $_POST['center_name'];
    $worker_name = $_POST['worker_name'];
    $status      = "unvaccinated";

    // Insert Query
    $query1 = "
        INSERT INTO home_visit 
        (child_name, name, date, reason,vaccination_name, worker_name,center_name, status)
        VALUES 
        ('$child_name', '$parent_name', '$date', '$reason','$vaccination_name', '$worker_name','$center_name', '$status')
    ";

    $result1 = mysqli_query($con, $query1);

    if ($result1) {
        echo "<script>alert('Record Saved Successfully'); 
        window.location='view_home.php';</script>";
    } else {
        echo "<script>alert('Error! Try Again');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Miss Vaccination</title>
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

<?php include "../header/worker-header.php"; ?>
<br><br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h3>Miss Vaccination</h3>
                </div>
                <div class="card-body">

                    <form method="post">

                        <div class="form-group">
                            <label><b>Parent Name</b></label>
                            <input type="text" name="name" class="form-control"
                                   value="<?php echo $row['name']; ?>" readonly>
                        </div>
<div class="form-group">
                            <label><b>Center Name</b></label>
                            <input type="text" name="center_name" class="form-control"
                                   value="<?php echo $_SESSION['center_name']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label><b>Worker Name</b></label>
                            <input type="text" name="worker_name" class="form-control"
                                   value="<?php echo $_SESSION['name']; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label><b>Child Name</b></label>
                            <input type="text" name="child_name" class="form-control"
                                   value="<?php echo $row['child_name']; ?>" readonly>
                        </div>
 <div class="form-group">
                            <label><b>Vaccination Name</b></label>
                            <input type="text" name="vaccination_name" class="form-control"
                                    required>
                        </div>
                        <div class="form-group">
                            <label><b>Visit Date</b></label>
                            <input type="date" name="date" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label><b>Reason</b></label>
                            <input type="text" name="reason" class="form-control" placeholder="Enter reason" required>
                        </div>

                        <button type="submit" name="submit" class="btn btn-custom btn-block">
                            Save Vaccination Record
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
