

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>View Users</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  
</head>
<body>
  <?php include "../header/admin-header.php"; ?>
  <br><br>
<a class="btn btn-primary ml-5" href="../Admin/add_user.php">
                 Add User
                </a>

  <center>
      <h3 class="text-primary">View User Record</h3>
  <br>

 <div class="table-responsive">
      <table class="table table-hover table-bordered "  style="width:80%;">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
          <th>CNIC</th>
      
          <th>Password</th>
          <th>Status</th>
          <th>Update</th>
          <th>Delete</th>
          <th>Approve</th>
          <th>Disapprove</th>
        </tr>
      </thead>
      <tbody>
        <?php

include "../connection.php";
        $query = "SELECT * FROM user";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['phone']; ?></td>
          <td><?php echo $row['address']; ?></td>
          <td><?php echo $row['cnic']; ?></td>
        
          <td><?php echo $row['password']; ?></td>
          <td><?php echo $row['status']; ?></td>
          
            <td>
          <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
              </td>
          <td >
          <a href="delete_user.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Delete</a>
                                </td><td>
            <a href="activate_user.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Activate</a>
          </td>
          <td>
            <a href="deactivate_user.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Deactivate</a>
          </td>
          
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</center>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
