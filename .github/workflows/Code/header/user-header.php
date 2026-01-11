<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
/* Navbar buttons style */
.navbar-btn {
    padding: 8px 15px;
    border-radius: 8px;
    font-weight: bold;
    display: flex;
    align-items: center;
    gap: 5px;
    transition: 0.3s;
    text-decoration: none !important;
    color: white !important;
}

.navbar-btn.register-child { background: #007bff; }
.navbar-btn.view-child { background: #28a745; }
.navbar-btn.upcoming-schedule { background: #ffc107; color: black !important; }
.navbar-btn.logout { background: #17a2b8; }

.navbar-nav { 
    display: flex; 
    align-items: center; 
    gap: 15px; 
}
</style>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><b style="font-size:25px;">User Dashboard</b></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link navbar-btn register-child" href="../user/register_child.php">
                    Register Children
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link navbar-btn view-child" href="../user/view_child.php">
                    View Registered Children
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link navbar-btn upcoming-schedule" href="../user/view_upcoming.php">
                     Upcoming Schedule
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link navbar-btn upcoming-schedule" href="../user/view_vaccinated.php">
                    Vaccinated Child
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link navbar-btn upcoming-schedule" href="../user/view_home.php">
                    Miss Vaccination
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link navbar-btn logout" href="../index.php">
                    Logout
                </a>
            </li>

        </ul>
    </div>
</nav>
