<div class="d-flex">
    <div class="bg-dark text-white vh-100 p-4" style="width: 280px;">
        <h4 class="text-center mb-5">Employment System</h4>
        <ul class="nav flex-column">
            <li><a href="dashboard.php" class="nav-link text-white"><i class="bi bi-house"></i> Dashboard</a></li>
            <li><a href="profile.php" class="nav-link text-white"><i class="bi bi-person"></i> Profile</a></li>
            <li><a href="attendance.php" class="nav-link text-white"><i class="bi bi-calendar-check"></i> Attendance</a></li>
            <li><a href="leave.php" class="nav-link text-white"><i class="bi bi-file-earmark-text"></i> Leave</a></li>
            <li><a href="payroll.php" class="nav-link text-white"><i class="bi bi-currency-dollar"></i> Payroll</a></li>
            <li class="mt-5"><a href="logout.php" class="nav-link text-danger"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
        </ul>
        <hr><small>Hi, <strong><?php echo $_SESSION['employee_name']; ?></strong></small>
    </div>
    <div class="flex-grow-1 p-5">