<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Vaccination Record</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<?php include "../header/worker-header.php"; ?>
<br><br>
<button class="btn btn-success ml-5" onclick="window.print()" class="btn btn-success">Download Report</button>
<?php
include "../connection.php";
session_start();

$worker_name = $_SESSION['name'];

$filter = isset($_GET['filter']) ? $_GET['filter'] : "all";

// BASE QUERY
$query = "SELECT * FROM vaccination_record WHERE worker_name='$worker_name'";

// DAILY
if ($filter == "today") {
    $query = "SELECT * FROM vaccination_record 
              WHERE worker_name='$worker_name' 
              AND vaccine_date = CURDATE()";
}


?>

<center>
  <h3 class="text-primary">View Vaccination Record</h3>
  <br>

  <!-- FILTER BUTTONS -->
  <form method="GET" class="mb-4 d-flex justify-content-center gap-2">
      <select name="filter" class="form-select" style="width:220px;">
          <option value="all"     <?php if($filter=="all") echo "selected"; ?>>All Records</option>
          <option value="today"   <?php if($filter=="today") echo "selected"; ?>>Today</option>
          
      </select>

      <button type="submit" class="btn btn-primary">Apply</button>
  </form>

  <div class="table-responsive">
    <table class="table table-hover table-bordered" style="width:90%;">
      <thead>
        <tr>
          <th>Batch No</th>
          <th>Parent Name</th>
          <th>Worker Name</th>
          <th>Center Name</th>
          <th>Child Name</th>
          <th>Vaccination Name</th>
          <th>Vaccine Date</th>
          
          <th>Status</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $result = mysqli_query($con, $query);

        while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
          <td><?php echo $row['batch_no']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['worker_name']; ?></td>
          <td><?php echo $row['center_name']; ?></td>
          <td><?php echo $row['child_name']; ?></td>
          <td><?php echo $row['vaccination_name']; ?></td>
          <td><?php echo $row['vaccine_date']; ?></td>
          
          <td><?php echo $row['status']; ?></td>
        </tr>
        <?php } ?>
      </tbody>

    </table>
  </div>
</center>

</body>
</html>
