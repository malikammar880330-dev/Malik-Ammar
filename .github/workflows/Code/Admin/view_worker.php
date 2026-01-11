<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>View Health Workers</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    
</head>
<body>
  <?php include "../header/admin-header.php"; ?>
  <br><br>

  <a class="btn btn-primary ml-5" href="../Admin/add_worker.php">
                 Add Health Worker
                </a>

    <center>
      <h3 class="text-primary ">View Health Workers Record</h3>

    <div class="table-responsive"><br>

      <table class="table table-hover table-bordered "  style="width:80%;">
        <thead>
          <tr>
            <th>Center Name</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Designation</th>
            <th>Qualification</th>
            <th>Password</th>
            <th>Status</th>
            <th>Approve</th>
            <th>Disapprove</th>
             <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include "../connection.php";
          $query = "SELECT * FROM worker";
          $result = mysqli_query($con, $query);
          while ($row = mysqli_fetch_array($result)) {
          ?>
          <tr>
            <td><?php echo $row['center_name']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['designation']; ?></td>
            <td><?php echo $row['qualification']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td>
              <a href="activate_worker.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Activate</a>
            </td>
            <td>
              <a href="deactivate_worker.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Deactivate</a>
            </td>
            <td>
          <a href="edit_worker.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
              </td>
          <td >
          <a href="delete_worker.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Delete</a>
                                </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
   </div></center>
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
