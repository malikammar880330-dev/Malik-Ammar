

<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Vaccination Record </title>
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
      <h3 class="text-primary">View Vaccination Record</h3>
  <br>

 <div class="table-responsive">
      <table class="table table-hover table-bordered "  style="width:80%;">
      <thead>
        <tr>
          <th>Parent Name</th>
        
          <th>CNIC</th>
       
          <th>Child Name</th>
          <th>DOB</th>
         
          <th>Age</th>
          <th>Status</th>
          <th>Mark Vaccination</th>
          <th>Home Vaccination</th>
        </tr>
      </thead>
      <tbody>
        <?php
         include "../connection.php";
        $query = "SELECT * FROM child where vaccination_status='pending'";
        $result = mysqli_query($con, $query);
       
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                <td><?php echo $row['name']; ?></td>
              
               <td><?php echo $row['cnic']; ?></td>
               
                <td><?php echo $row['child_name']; ?></td>
                <td><?php echo $row['dob']; ?></td>
              
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['vaccination_status']; ?></td>
               <td >
            <a href="mark_vaccination.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning text-white">Mark Vaccination</a></td>
            <td>
            <a href="home_vaccination.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger";>Miss Vaccination</a>
          </td></tr>
         <?php
            }
        
        ?>
      </tbody>
    </table>
</center>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
