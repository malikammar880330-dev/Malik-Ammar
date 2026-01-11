<?php
include "../connection.php";

if (isset($_POST['submit'])) {
    // Get the data from the form
    $name               = $_POST['name'];
    $address            = $_POST['address'];
    $city               = $_POST['city'];
    $contact            = $_POST['contact'];
    $vaccines_offered   = $_POST['vaccines_offered'];
    $campaign_start     = $_POST['campaign_start'];
    $campaign_end       = $_POST['campaign_end'];
    $schedule           = $_POST['schedule'];
    $capacity           = $_POST['capacity'];
    $status             = $_POST['status'];
   
    $sql = "INSERT INTO vaccination_centers 
        (name, address, city, contact, vaccines_offered, campaign_start_date, campaign_end_date, schedule, center_capacity, status) 
        VALUES 
        ('$name', '$address', '$city', '$contact', '$vaccines_offered', '$campaign_start', '$campaign_end', '$schedule', '$capacity', '$status')";
    
    $run = mysqli_query($con, $sql);

    if ($run) {
        echo "<script>alert('Vaccination Center Added Successfully'); window.location='view_center.php';</script>";
    } else {
        echo "<script>alert('Error: Could not add Center'); window.location='add_center.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Vaccination Center</title>
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Add Vaccination Center</h3>
                </div>
                <div class="card-body">
                    <form method="post">

                        <div class="form-group">
                            <label>Center Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>City / District</label>
                            <input type="text" name="city" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Contact Info</label>
                            <input type="text" name="contact" placeholder="Phone or email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Vaccines Offered</label>
                            <input type="text" name="vaccines_offered" placeholder="e.g., Polio, OPV" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Campaign Start Date</label>
                            <input type="date" name="campaign_start" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Campaign End Date</label>
                            <input type="date" name="campaign_end" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Schedule</label>
                            <input type="text" name="schedule" placeholder="e.g., Mon-Sat, 9am-4pm" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Center Capacity</label>
                            <input type="number" name="capacity" placeholder="Max children per day" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <button type="submit" name="submit" class="btn btn-custom btn-block">Add Center</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
