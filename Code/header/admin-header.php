<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.nav-btn {
    padding: 8px 15px;
    border-radius: 8px;
    font-weight: bold;
    display: flex;
    align-items: center;
    gap: 6px;
    transition: 0.3s;
    text-decoration: none;
    color: white !important;
}

.btn-user       { background: #007bff; }
.btn-worker     { background: #28a745; }
.btn-child      { background: #ffc107; color: black !important; }
.btn-center     { background: #6f42c1; }
.btn-campaign   { background: #e67e22; }
.btn-logout     { background: #17a2b8; }

.navbar-nav { display:flex; align-items:center; gap:15px; }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    
    <a class="navbar-brand" href="dashboard.php">
        <b style="font-size:25px;">Admin Dashboard</b>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#adminNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="adminNavbar">

        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link nav-btn btn-user" href="../Admin/view_user.php">
                    <i class="fa fa-users"></i> User
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link nav-btn btn-worker" href="../Admin/view_worker.php">
                    <i class="fa fa-user-md"></i> Health Worker
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link nav-btn btn-child" href="../Admin/view_child.php">
                    <i class="fa fa-child"></i> Child
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link nav-btn btn-center" href="../Admin/view_center.php">
                    <i class="fa fa-hospital-o"></i> Center
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link nav-btn btn-campaign" href="../Admin/campaign.php">
                    <i class="fa fa-line-chart"></i> Campaign Result
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link nav-btn btn-logout" href="../index.php">
                    <i class="fa fa-sign-out"></i> Logout
                </a>
            </li>

        </ul>

    </div>

</nav>
