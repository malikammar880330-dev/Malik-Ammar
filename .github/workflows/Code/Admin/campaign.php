<?php
include "../connection.php";    // Only DB connection

include "../header/admin-header.php";   // Header

//----------------------------------------------
// 1. Total Children
//----------------------------------------------
$q_total_children = "SELECT COUNT(*) AS total_children FROM user";
$r_total_children = mysqli_query($con, $q_total_children);
$row_total_children = mysqli_fetch_assoc($r_total_children);
$total_children = $row_total_children['total_children'];

//----------------------------------------------
// 2. Total Vaccinated
//----------------------------------------------
$q_total_vaccinated = "SELECT COUNT(*) AS total_vaccinated FROM vaccination_record";
$r_total_vaccinated = mysqli_query($con, $q_total_vaccinated);
$row_total_vaccinated = mysqli_fetch_assoc($r_total_vaccinated);
$total_vaccinated = $row_total_vaccinated['total_vaccinated'];

//----------------------------------------------
// 3. Calculate Success Rate
//----------------------------------------------
$success_rate = 0;
if ($total_children > 0) {
    $success_rate = round(($total_vaccinated / $total_children) * 100, 2);
}

//----------------------------------------------
// 4. Monthly Vaccination Report
//----------------------------------------------
$q_monthly = "SELECT MONTH(vaccine_date) AS month, COUNT(*) AS total 
              FROM vaccination_record 
              GROUP BY MONTH(vaccine_date)";
$r_monthly = mysqli_query($con, $q_monthly);

//----------------------------------------------
// 5. Center-wise Report
//----------------------------------------------
$q_center = "SELECT center_name, COUNT(*) AS total
             FROM vaccination_record
             GROUP BY center_name";
$r_center = mysqli_query($con, $q_center);

//----------------------------------------------
// 6. Worker-wise Report
//----------------------------------------------
$q_worker = "SELECT worker_name, COUNT(*) AS total
             FROM vaccination_record
             GROUP BY worker_name";
$r_worker = mysqli_query($con, $q_worker);

?>

<!DOCTYPE html>
<html>
<head>
<title>Vaccination Reports</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

<div class="container mt-4">
<button class="btn btn-success ml-5" onclick="window.print()" class="btn btn-success">Download Report</button>
    <h2>Campaign Success Report</h2>

    <div class="alert alert-info">
        <b>Total Children:</b> <?= $total_children ?><br>
        <b>Total Vaccinated:</b> <?= $total_vaccinated ?><br>
        <b>Campaign Success Rate:</b> <?= $success_rate ?>%
    </div>

    <hr>

    <!-- Monthly Report -->
    <h3>Monthly Vaccination Report</h3>
    <table class="table table-bordered">
        <tr>
            <th>Month</th>
            <th>Total Vaccinated</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($r_monthly)) { ?>
        <tr>
            <td><?= $row['month']; ?></td>
            <td><?= $row['total']; ?></td>
        </tr>
        <?php } ?>

    </table>

    <hr>

    <!-- Center-wise -->
    <h3>Center-wise Vaccination Report</h3>
    <table class="table table-bordered">
        <tr>
            <th>Center</th>
            <th>Total</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($r_center)) { ?>
        <tr>
            <td><?= $row['center_name']; ?></td>
            <td><?= $row['total']; ?></td>
        </tr>
        <?php } ?>

    </table>

    <hr>

    <!-- Worker-wise -->
    <h3>Worker-wise Vaccination Report</h3>
    <table class="table table-bordered">
        <tr>
            <th>Worker</th>
            <th>Total</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($r_worker)) { ?>
        <tr>
            <td><?= $row['worker_name']; ?></td>
            <td><?= $row['total']; ?></td>
        </tr>
        <?php } ?>

    </table>

</div>

</body>
</html>
