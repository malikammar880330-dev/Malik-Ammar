<?php
include "../connection.php";
include "../header/admin-header.php";

// 1. Total Registered Children (pending)
$q1 = mysqli_query($con, "SELECT COUNT(*) AS total FROM child WHERE vaccination_status='pending'");
$pending = mysqli_fetch_assoc($q1)['total'];

// 2. Total Vaccinated
$q2 = mysqli_query($con, "SELECT COUNT(*) AS total FROM vaccination_record WHERE status='vaccinated'");
$vaccinated = mysqli_fetch_assoc($q2)['total'];

// 3. Total Unvaccinated (Home Visit Required)
$q3 = mysqli_query($con, "SELECT COUNT(*) AS total FROM home_visit WHERE status='unvaccinated'");
$unvaccinated = mysqli_fetch_assoc($q3)['total'];

// 4. Today Vaccinated
$q4 = mysqli_query($con, "SELECT COUNT(*) AS total FROM vaccination_record WHERE vaccine_date = CURDATE()");
$today_vaccinated = mysqli_fetch_assoc($q4)['total'];

// 5. Today Home Visits
$q5 = mysqli_query($con, "SELECT COUNT(*) AS total FROM home_visit WHERE date = CURDATE()");
$today_home = mysqli_fetch_assoc($q5)['total'];

// Chart: Vaccination by Center
$center_data = [];
$center_q = mysqli_query($con, "SELECT center_name, COUNT(*) AS total FROM vaccination_record GROUP BY center_name");
while ($r = mysqli_fetch_assoc($center_q)) {
    $center_data[] = $r;
}

// Chart: Vaccination by Worker
$worker_data = [];
$worker_q = mysqli_query($con, "SELECT worker_name, COUNT(*) AS total FROM vaccination_record GROUP BY worker_name");
while ($r = mysqli_fetch_assoc($worker_q)) {
    $worker_data[] = $r;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
.card-box{padding:25px;border-radius:12px;color:white;font-weight:bold;}
.bg1{background:#1abc9c;}
.bg2{background:#3498db;}
.bg3{background:#9b59b6;}
.bg4{background:#e67e22;}
.bg5{background:#c0392b;}
</style>
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-4">Real-Time Vaccination Dashboard</h2>

    <div class="row">

        <div class="col-md-4 mb-3">
            <div class="card-box bg1">Pending Children: <?= $pending ?></div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card-box bg2">Vaccinated Children: <?= $vaccinated ?></div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card-box bg3">Unvaccinated Cases: <?= $unvaccinated ?></div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card-box bg4">Today Vaccinated: <?= $today_vaccinated ?></div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card-box bg5">Today Home Visits: <?= $today_home ?></div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <h4>Vaccination by Center</h4>
            <canvas id="centerChart"></canvas>
        </div>

        <div class="col-md-6">
            <h4>Vaccination by Worker</h4>
            <canvas id="workerChart"></canvas>
        </div>
    </div>
</div>

<script>
// Center Chart
new Chart(document.getElementById('centerChart'), {
    type: 'bar',
    data: {
        labels: <?= json_encode(array_column($center_data, "center_name")) ?>,
        datasets: [{
            label: 'Vaccinations',
            data: <?= json_encode(array_column($center_data, "total")) ?>,
        }]
    }
});

// Worker Chart
new Chart(document.getElementById('workerChart'), {
    type: 'bar',
    data: {
        labels: <?= json_encode(array_column($worker_data, "worker_name")) ?>,
        datasets: [{
            label: 'Vaccinations',
            data: <?= json_encode(array_column($worker_data, "total")) ?>,
        }]
    }
});
</script>

</body>
</html>
