<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main" style="overflow-y: hidden;">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="#" target="_blank">
            <h2 class="ms-1 font-weight-bold text-primary">CBMS</h2>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../pages/dashboard.php">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#submenu1" aria-controls="submenu1" aria-expanded="false">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-settings-gear-65 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Equipment</span>
                </a>
                <ul class="collapse nav flex-column ms-1 px-5" id="submenu1" data-bs-parent="#sidenav-collapse-main">
                    <li class="nav-item">
                        <a href="../pages/move.php" class="nav-link px-0"><i class="ni ni-planet text-info text-sm opacity-10"></i><span class="d-none d-sm-inline text-info">Move Item</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="../pages/all-equipment.php" class="nav-link px-0"><i class="ni ni-bullet-list-67 text-info text-sm opacity-10"></i> <span class="d-none d-sm-inline text-info">Movement Report</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="../pages/add-equipment.php" class="nav-link px-0"> <i class="ni ni-fat-add text-info text-sm opacity-10"></i><span class="d-none d-sm-inline text-info">Add Equipment</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#submenu2" aria-controls="submenu2" aria-expanded="false">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-key-25 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Workers</span>
                </a>
                <ul class="collapse nav flex-column ms-1 px-5" id="submenu2" data-bs-parent="#sidenav-collapse-main">
                    <li class="nav-item">
                        <a href="../pages/add-worker.php" class="nav-link px-0"><i class="ni ni-fat-add text-info text-sm opacity-10"></i> <span class="d-none d-sm-inline text-info">Add worker</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="../pages/all-workers.php" class="nav-link px-0"> <i class="ni ni-bullet-list-67 text-info text-sm opacity-10"></i><span class="d-none d-sm-inline text-info">Workers Report</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="../pages/assessment.php" class="nav-link px-0"> <i class="ni ni-paper-diploma text-info text-sm opacity-10"></i><span class="d-none d-sm-inline text-info">Assessment</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#submenu3" aria-controls="submenu3" aria-expanded="false">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-circle-08 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Students</span>
                </a>
                <ul class="collapse nav flex-column ms-1 px-5" id="submenu3" data-bs-parent="#sidenav-collapse-main">
                    <li class="nav-item">
                        <a href="../pages/add-student.php" class="nav-link px-0"><i class="ni ni-fat-add text-info text-sm opacity-10"></i> <span class="d-none d-sm-inline text-info">Add student</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="../pages/all-students.php" class="nav-link px-0"> <i class="ni ni-bullet-list-67 text-info text-sm opacity-10"></i><span class="d-none d-sm-inline text-info">Student Report</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../pages/new-user.php">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Register New User</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../pages/add-dept.php">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-building text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Register New Department</span>
                </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../pages/logout.php">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-button-power text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1 text-danger text-bold">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
