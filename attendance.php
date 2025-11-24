<?php 
include 'auth.php'; 
redirectIfNotLoggedIn(); 
include 'db.php';

$empID = $_SESSION['employee_id'];
$success = $error = "";

if ($_POST && isset($_POST['mark_attendance'])) {
    $date = $_POST['date'];
    $status = $_POST['status'];

    // Check if already marked
    $check = $conn->prepare("SELECT 1 FROM attendance WHERE employeeID = ? AND date = ?");
    $check->bind_param("is", $empID, $date);
    $check->execute();
    if ($check->get_result()->num_rows > 0) {
        $error = "Attendance already marked for $date!";
    } else {
        $insert = $conn->prepare("INSERT INTO attendance (employeeID, date, status) VALUES (?, ?, ?)");
        $insert->bind_param("iss", $empID, $date, $status);
        if ($insert->execute()) {
            $success = "Attendance marked as <strong>$status</strong>!";
        } else {
            $error = "Failed to mark attendance.";
        }
    }
}

// Fetch recent attendance
$stmt = $conn->prepare("SELECT date, status FROM attendance WHERE employeeID = ? ORDER BY date DESC LIMIT 30");
$stmt->bind_param("i", $empID);
$stmt->execute();
$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <?php include 'sidebar.php'; ?>

    <div class="p-5">
        <h2><i class="bi bi-calendar-check"></i> Mark Attendance</h2>

        <?php if($success) echo "<div class='alert alert-success'>$success</div>"; ?>
        <?php if($error) echo "<div class='alert alert-danger'>$error</div>"; ?>

        <div class="card mb-4 shadow">
            <div class="card-body">
                <form method="POST" class="row g-3">
                    <div class="col-md-5">
                        <input type="date" name="date" class="form-control" value="<?=date('Y-m-d')?>" max="<?=date('Y-m-d')?>" required>
                    </div>
                    <div class="col-md-4">
                        <select name="status" class="form-select" required>
                            <option value="Present">Present</option>
                            <option value="Late">Late</option>
                            <option value="Half-day">Half Day</option>
                            <option value="Absent">Absent</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button name="mark_attendance" class="btn btn-primary w-100">Mark Attendance</button>
                    </div>
                </form>
            </div>
        </div>

        <h4>Recent Records</h4>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr><th>Date</th><th>Day</th><th>Status</th></tr>
                </thead>
                <tbody>
                    <?php foreach($records as $r): ?>
                    <tr>
                        <td><?=date('d M Y', strtotime($r['date']))?></td>
                        <td><?=date('l', strtotime($r['date']))?></td>
                        <td>
                            <span class="badge bg-<?= 
                                $r['status']=='Present' ? 'success' : 
                                ($r['status']=='Absent' ? 'danger' : 
                                ($r['status']=='Late' ? 'warning' : 'info')) 
                            ?>">
                                <?=$r['status']?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if(empty($records)): ?>
                    <tr><td colspan="3" class="text-center text-muted">No attendance records yet</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div></div>
</body>
</html>