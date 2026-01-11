
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
<?php include "../header/admin-header.php"; ?>
<br><br>

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
          
        </tr>
      </thead>
      <tbody>
     
        <?php
        include "../connection.php";
        $query = "SELECT * FROM child";
        $result = mysqli_query($con, $query);
   
            while ($row = mysqli_fetch_array($result)) {
                ?>
                   <tr>
                <td><?php echo $row['name']; ?></td>
             
               <td><?php echo $row['cnic']; ?></td>
               
                <td><?php echo $row['child_name']; ?></td>
                <td><?php echo $row['dob']; ?></td>
               
                <td><?php echo $row['age']; ?></td>
                <td>
                    
                    <?php echo $row['vaccination_status']; ?>

                </td></tr>
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
