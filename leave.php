<?php include 'auth.php'; redirectIfNotLoggedIn(); include 'db.php'; $msg = "";
if ($_POST) {
    $reason = $_POST['reason']; $date = $_POST['date'];
    $conn->query("INSERT INTO leaves (employee_id, leave_date, reason, status) VALUES ('{$_SESSION['employee_id']}', '$date', '$reason', 'Pending')");
    $msg = "Leave applied!";
}
?>
<!DOCTYPE html><html><head><title>Leave Request</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="style.css" rel="stylesheet"></head><body>
<?php include 'sidebar.php'; ?>
<h2>Apply for Leave</h2>
<?php if($msg) echo "<div class='alert alert-success'>$msg</div>"; ?>
<form method="POST" class="card p-4">
    <div class="mb-3"><input type="date" name="date" class="form-control" required></div>
    <div class="mb-3"><textarea name="reason" class="form-control" placeholder="Reason" required></textarea></div>
    <button class="btn btn-success">Submit Leave Request</button>
</form>
</div></div></body></html>