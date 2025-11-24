<?php include 'auth.php'; redirectIfNotLoggedIn(); include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard • Employment System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="d-flex">
        <div class="bg-dark text-white vh-100 p-4" style="width: 280px;">
            <h4 class="text-center mb-5">Employment System</h4>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="dashboard.php" class="nav-link text-white"><i class="bi bi-house"></i> Dashboard</a></li>
                <li class="nav-item"><a href="profile.php" class="nav-link text-white"><i class="bi bi-person"></i> My Profile</a></li>
                <li class="nav-item"><a href="attendance.php" class="nav-link text-white"><i class="bi bi-calendar-check"></i> Attendance</a></li>
                <li class="nav-item"><a href="leave.php" class="nav-link text-white"><i class="bi bi-file-earmark-text"></i> Leave Request</a></li>
                <li class="nav-item"><a href="payroll.php" class="nav-link text-white"><i class="bi bi-currency-dollar"></i> Payroll</a></li>
                <li class="nav-item mt-5"><a href="logout.php" class="nav-link text-danger"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
            </ul>
            <hr>
            <div class="text-center">
                <small>Hi, <strong><?php echo htmlspecialchars($_SESSION['employee_name']); ?></strong></small>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1 p-5">
            <h1 class="display-5 fw-bold mb-4">Welcome back!</h1>
            <div class="row g-4">
                <div class="col-md-4"><a href="attendance.php" class="text-decoration-none"><div class="card p-4 text-center bg-primary text-white"><h3>Mark Attendance</h3></div></a></div>
                <div class="col-md-4"><a href="leave.php" class="text-decoration-none"><div class="card p-4 text-center bg-success text-white"><h3>Apply Leave</h3></div></a></div>
                <div class="col-md-4"><a href="payroll.php" class="text-decoration-none"><div class="card p-4 text-center bg-warning text-white"><h3>View Payroll</h3></div></a></div>
            </div>
        </div>
    </div>
</body>
</html>