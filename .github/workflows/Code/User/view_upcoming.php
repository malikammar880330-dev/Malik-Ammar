<!DOCTYPE html>
<html lang="en">
<head>
  <title>Upcoming Vaccination Schedules</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  
</head>
<body>
<?php include "../header/user-header.php"; ?>
<br><br>



    <div class="container-fluid">
        <center>
            <h3 class="text-primary mb-4">Upcoming Vaccination Schedules</h3>
        </center>
      
              <div class="table-responsive">
            <table class="table table-hover table-bordered table-custom mx-auto" style="width:95%;">
                <thead class="table-dark">
                    <tr>
                        <th>Center Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Contact</th>
                        <th>Vaccines Offered</th>
                        <th>Campaign Start</th>
                        <th>Campaign End</th>
                        <th>Schedule</th>
                        <th>Capacity</th>
                        <th>Status</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "../connection.php";
                    $query = "SELECT * FROM vaccination_centers";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td><?php echo $row['vaccines_offered']; ?></td>
                        <td><?php echo $row['campaign_start_date']; ?></td>
                        <td><?php echo $row['campaign_end_date']; ?></td>
                        <td><?php echo $row['schedule']; ?></td>
                        <td><?php echo $row['center_capacity']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                       
                    </tr>
                    <?php 
                    } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
