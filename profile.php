<?php 
include 'auth.php'; 
redirectIfNotLoggedIn(); 
include 'db.php';

$empID = $_SESSION['employee_id'];  // This is the employeeID from DB

// Join employees + departments to show department name
$query = "SELECT e.*, d.departmentName 
          FROM employees e 
          LEFT JOIN departments d ON e.departmentID = d.departmentID 
          WHERE e.employeeID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $empID);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>

    <div class="p-5">
        <h2 class="mb-4"><i class="bi bi-person-circle"></i> My Profile</h2>
        
        <div class="card shadow-lg p-4">
            <div class="row">
                <div class="col-md-8">
                    <h4><?php echo htmlspecialchars($user['name']); ?></h4>
                    <p class="text-muted"><?php echo $user['position']; ?></p>
                    
                    <table class="table table-borderless">
                        <tr><td><strong>Email</strong></td><td><?php echo $user['email']; ?></td></tr>
                        <tr><td><strong>Phone</strong></td><td><?php echo $user['phone'] ?: 'Not set'; ?></td></tr>
                        <tr><td><strong>Department</strong></td><td><?php echo $user['departmentName'] ?: 'Not assigned'; ?></td></tr>
                        <tr><td><strong>Salary</strong></td><td class="text-success fw-bold">$<?php echo number_format($user['salary'], 2); ?></td></tr>
                        <tr><td><strong>Role</strong></td><td><span class="badge bg-<?php echo $user['role']=='admin'?'danger':($user['role']=='manager'?'warning':'primary'); ?>">
                            <?php echo ucfirst($user['role']); ?>
                        </span></td></tr>
                        <tr><td><strong>Joined</strong></td><td><?php echo date('d M Y', strtotime($user['created_at'])); ?></td></tr>
                    </table>
                </div>
                <div class="col-md-4 text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" 
                         style="width: 150px; height: 150px; font-size: 60px;">
                        <?php echo strtoupper(substr($user['name'], 0, 1)); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div></div>
</body>
</html>