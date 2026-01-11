<!DOCTYPE html>
<html lang="en">
<head>
  <title>Miss Vaccination </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<?php include "../header/worker-header.php"; ?>
<br><br>
<button class="btn btn-success ml-5" onclick="window.print()" class="btn btn-success">Download Report</button>
<center>
  
  <h3 class="text-primary">Miss Vaccination</h3>
  <br>

  <div class="table-responsive">
    <table class="table table-hover table-bordered" style="width:90%;">
      <thead>
        <tr>
          <th>Parent Name</th>
          <th>Center Name</th>
          <th>Worker Name</th>
          <th>Child Name</th>
          <th>Vaccination Name</th>
          <th>Visit Date</th>
          <th>Reason</th>

          <th>Status</th>
          
        </tr>
      </thead>

      <tbody>
        <?php
        include "../connection.php";
session_start();
$name=$_SESSION['name'];
        $query = "SELECT * FROM home_visit where worker_name='$name' ";
        $result = mysqli_query($con, $query);

        while ($row = mysqli_fetch_array($result)) {

            
        ?>
        <tr>
          <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['center_name']; ?></td>
          <td><?php echo $row['worker_name']; ?></td>
          <td><?php echo $row['child_name']; ?></td>
          <td><?php echo $row['vaccination_name']; ?></td>
          <td><?php echo $row['date']; ?></td>
          <td><?php echo $row['reason']; ?></td>
          <td><?php echo $row['status']; ?></td>

          
        
        </tr>

        <?php } ?>
      </tbody>

    </table>
  </div>
</center>

</body>
</html>
