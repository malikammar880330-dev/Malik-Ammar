<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Vaccination Record</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include "../header/user-header.php"; ?>
<br><br>

<!-- UPDATE STATUS LOGIC -->
<?php
session_start();
include '../connection.php';

if (isset($_POST['update_status'])) {
    $child = $_POST['child'];
    mysqli_query($con, "UPDATE child SET vaccination_status='pending' WHERE child_name='$child'");
    echo "<script>alert('Vaccination request sent successfully!');</script>";
}
?>

<center>
<h3 class="text-primary">View Vaccination Record</h3>
<br>

<div class="table-responsive">
<table class="table table-hover table-bordered" style="width:80%;">
<thead>
<tr>
  <th>Parent Name</th>
  <th>CNIC</th>
  <th>Child Name</th>
  <th>DOB</th>
  <th>Age</th>
  <th>Vaccination Status</th>
  <th>Action</th>
</tr>
</thead>

<tbody>
<?php
$name = $_SESSION['name'];
$sql = "SELECT * FROM child WHERE name='$name'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
?>
<tr>
  <td><?php echo $row['name']; ?></td>
  <td><?php echo $row['cnic']; ?></td>
  <td><?php echo $row['child_name']; ?></td>
  <td><?php echo $row['dob']; ?></td>
  <td><?php echo $row['age']; ?></td>
  <td><?php echo $row['vaccination_status']; ?></td>

  <td>
    <?php if ($row['vaccination_status'] == 'unvaccinated') { ?>
        
        <!-- Button to update status to pending -->
        <form method="POST">
            <input type="hidden" name="child" value="<?php echo $row['child_name']; ?>">
            <button type="submit" name="update_status" class="btn btn-primary btn-sm">
                Request Vaccination
            </button>
        </form>

    <?php } elseif ($row['vaccination_status'] == 'pending') { ?>

        <button class="btn btn-warning btn-sm" disabled>Pending...</button>

    <?php } else { ?>

        <button class="btn btn-success btn-sm" disabled>Vaccinated</button>

    <?php } ?>
  </td>

</tr>
<?php
    }
} else {
    echo "<tr><td colspan='10' class='text-center text-danger'>No child registered yet</td></tr>";
}
?>
</tbody>
</table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
