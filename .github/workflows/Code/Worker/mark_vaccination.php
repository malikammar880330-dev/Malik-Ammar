<?php
include "../connection.php";



session_start();

 $id=$_GET['id'];
$query = "SELECT * FROM child WHERE id = '$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$sql = "update child set vaccination_status='vaccinated' where id='$id'";
$data = mysqli_query($con, $sql);

if (isset($_POST['submit'])) {

    // Form fields
    $name         = $_POST['name'];
      $center_name  = $_POST['center_name'];          // parent or record name
    $worker_name  = $_POST['worker_name'];   // logged-in health worker
    $child_name   = $_POST['child_name']; 
    $vaccination_name = $_POST['vaccination_name'];   // selected child
    $vaccine_date = $_POST['vaccine_date'];  // date of vaccination
    $batch_no     = $_POST['batch_no'];      // vial batch number
    $status       = "vaccinated";

    // Insert Query
    $query1 = "
        INSERT INTO vaccination_record 
        (name, worker_name, child_name,center_name,vaccination_name, vaccine_date, batch_no, status)
        VALUES 
        ('$name', '$worker_name', '$child_name','$center_name', '$vaccination_name','$vaccine_date', '$batch_no', '$status')
    ";

    $result1 = mysqli_query($con, $query1);

    if ($result1) {
        echo "<script>alert('Child Marked as Vaccinated Successfully'); 
        window.location='view_vaccination.php';</script>";
    } else {
        echo "<script>alert('Error! Try Again');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mark Children as Vaccinated</title>
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
                    <h3>Mark Children as Vaccinated </h3>
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
        <label><b>Vaccination Date</b></label>
        <input type="date" name="vaccine_date" class="form-control" required>
    </div>

    <div class="form-group">
        <label><b>Batch Number</b></label>
        <input type="text" name="batch_no" placeholder="Enter batch number" class="form-control" required>
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
