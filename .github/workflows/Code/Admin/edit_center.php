<?php
include "../connection.php";

$center_id = $_GET['id'];
$query = "SELECT * FROM vaccination_centers WHERE center_id = '$center_id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

if (isset($_POST['submit'])) {

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

    $update_sql = "
        UPDATE vaccination_centers SET 
        name               = '$name',
        address            = '$address',
        city               = '$city',
        contact            = '$contact',
        vaccines_offered   = '$vaccines_offered',
        campaign_start_date= '$campaign_start',
        campaign_end_date  = '$campaign_end',
        schedule           = '$schedule',
        center_capacity    = '$capacity',
        status             = '$status'
        WHERE center_id = '$center_id'
    ";

    if (mysqli_query($con, $update_sql)) {
        echo "<script>alert('Center updated successfully'); window.location='view_center.php';</script>";
    } else {
        echo "<script>alert('Error updating record!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Edit Vaccination Center</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
.card { border-radius: 15px; box-shadow: 0px 5px 15px rgba(0,0,0,0.2); }
.card-header { background: #2193b0; color: black; border-radius: 15px 15px 0 0; text-align: center; }
.form-control { border-radius: 10px; }
.btn-custom { background: #2193b0; color: #fff; border-radius: 10px; font-weight: bold; }
.btn-custom:hover { background: #176d82; }
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
                    <h3>Edit Vaccination Center</h3>
                </div>
                <div class="card-body">
                    <form method="post">

                        <div class="form-group">
                            <label>Center Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $row['address']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>City / District</label>
                            <input type="text" name="city" class="form-control" value="<?php echo $row['city']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Contact Info</label>
                            <input type="text" name="contact" class="form-control" value="<?php echo $row['contact']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Vaccines Offered</label>
                            <input type="text" name="vaccines_offered" class="form-control" value="<?php echo $row['vaccines_offered']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Campaign Start Date</label>
                            <input type="date" name="campaign_start" class="form-control" value="<?php echo $row['campaign_start_date']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Campaign End Date</label>
                            <input type="date" name="campaign_end" class="form-control" value="<?php echo $row['campaign_end_date']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Schedule</label>
                            <input type="text" name="schedule" class="form-control" value="<?php echo $row['schedule']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Center Capacity</label>
                            <input type="number" name="capacity" class="form-control" value="<?php echo $row['center_capacity']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                                <option value="active" <?php if($row['status']=='active') echo 'selected'; ?>>Active</option>
                                <option value="inactive" <?php if($row['status']=='inactive') echo 'selected'; ?>>Inactive</option>
                            </select>
                        </div>

                        <button type="submit" name="submit" class="btn btn-custom btn-block">Update Center</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
