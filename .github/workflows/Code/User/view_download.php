<!DOCTYPE html>
<html lang="en">
<head>
  <title>Download Certificate </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<?php include "../header/user-header.php"; ?>
<br><br>
<button class="btn btn-success ml-5" onclick="window.print()" class="btn btn-success">Download Certificate</button>
<center>
  <h3 class="text-primary">Download Certificate</h3>
  <br>

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
        include "../connection.php";
$id=$_GET['id'];
        $query = "SELECT * FROM vaccination_record where id='$id'";
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
